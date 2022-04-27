<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
use Session;
use Image;
use Illuminate\Support\Facades\Auth;
use App\Traits\VerifiesUsersTrait;
use App\Models\CountryUsage;
use App\Models\JobTitleUsage;  
use App\Models\IndustryUsage;
use App\Models\FunctionalAreaUsage;
use App\Models\TargetEmployerUsage;
use App\Models\Industry;
use App\Models\SubSector;
use App\Models\ProfileCv;
use App\Models\FunctionalArea;
use App\Models\JobTitle;
use App\Models\Geographical;
use App\Models\Country;
use App\Models\Company;
use App\Models\JobType;
use App\Models\Package;
use App\Models\Payment;
use App\Traits\JobSeekerPackageTrait;
use App\Traits\TalentScoreTrait;
use App\Traits\EmailTrait;
use Carbon\Carbon;

class RegisterController extends Controller
{
    use RegistersUsers;
    // use VerifiesUsers;
    use VerifiesUsersTrait;
    use JobSeekerPackageTrait;
    use TalentScoreTrait;
    use EmailTrait;

    protected $redirectTo = '/signup-career-opportunities';
    protected $userTable = 'users';
    // protected $redirectIfVerified = '/register';
    // protected $redirectAfterVerification = '/register';

    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware('guest', ['except' => ['getVerification', 'getVerificationError']]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function selectSignup()
    {
        return view('auth.signup');
    }
    
    public function signupCareerOpportunities()
    {
        return view('auth.signup_career_opportunities');
    }
    
    public function careerStore(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required|email|unique:users,email|unique:companies,email',
            'phone'         => 'required',
        ]);

        $user                    = new User();
        $user->name              = $request->name;
        $user->email             = $request->email;
        $user->phone             = $request->phone;
        $user->is_active         = 0;
        $user->verified          = 0;
        $user->save();

        UserVerification::generate($user);
        UserVerification::send($user, 'User Verification', SiteSetting::first()->mail_from_address,SiteSetting::first()->mail_from_name);
        Session::put('verified', 'verified');

        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    public function showRegistrationForm(Request $request)
    {
        // unverified access
        $user = User::where('email','=',$request->email)->where('verified', 1)->first();
        if(!$user) return redirect()->route('signup');

        // already registered Link access
        if(!session('status'))
        {
        $is_active = User::where('email','=',$request->email)->first()->is_active;
        if($is_active) return redirect()->route('login');
        }

        $stripe_key = SiteSetting::first()->stripe_key;
        $conuntries = Country::all();
        $job_titles = JobTitle::all();
        $industries = Industry::all();
        $functionals = FunctionalArea::all();
        $employers = Company::all();
        $job_types = JobType::all();
        $packages = Package::where('package_for','individual')->where('package_type','basic')->get();
        return view('auth.register_career', compact('user','stripe_key','conuntries','industries','job_titles','functionals','employers','job_types','packages'));
    }
 
    public function register(Request $request)
    {
        $user = User::find($request->user_id);

        // User Data 
        $user->user_name = $request->user_name;
        $user->password = bcrypt($request->password);

        //return $request->location_id;

        // Profile Data
        if($request->location_id[0])
        {
            CountryUsage::create(['user_id'=>$request->user_id,'country_id'=>$request->location_id[0]]);
            $user->country_id = json_encode($request->location_id);
         }
        if($request->position_title_id[0])
        {
            JobTitleUsage::create(['user_id'=>$request->user_id,'job_title_id'=>$request->position_title_id[0]]);
            $user->position_title_id = json_encode($request->position_title_id);
        }
        if($request->industry_id[0])
        {
            IndustryUsage::create(['user_id'=>$request->user_id,'industry_id'=>$request->industry_id[0]]);
            $user->industry_id = json_encode($request->industry_id);
        }
        if($request->functional_area_id[0])
        {
            FunctionalAreaUsage::create(['user_id'=>$request->user_id,'functional_area_id'=>$request->functional_area_id[0]]);
            $user->functional_area_id = json_encode($request->functional_area_id);
        }
        if($request->target_employer_id[0])
        {
            TargetEmployerUsage::create(['user_id'=>$request->user_id,'target_employer_id'=>$request->target_employer_id[0]]);
            $user->target_employer_id = json_encode($request->target_employer_id);
        }
        
        //$user->contract_term_id = $request->preference_checkbox;
        $user->full_time_salary = $request->full_time_salary;
        $user->part_time_salary = $request->part_time_salary;
        $user->freelance_salary = $request->freelance_salary;

        // CV File 
        if(isset($request->cv)) {
            $cv_file = $request->file('cv');
            $fileName = 'cv_'.time().'.'.$cv_file->guessExtension();
            $cv_file->move(public_path('uploads/cv_files'), $fileName);
            ProfileCv::create(['user_id'=>$request->user_id,'cv_file'=>$fileName]);
            $user->default_cv = ProfileCv::latest('created_at')->first()->id;
        }

        // Image File 
        if(isset($request->image)) {
            $photo = $_FILES['image'];
            if(!empty($photo['name'])){
                $file_name = 'profile_'.time().'.'.$request->file('image')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(400, 400)->save(public_path('/uploads/profile_photos/'.$file_name));
                $img->save(public_path('/uploads/profile_photos/'.$file_name));
                $user->image = $file_name;
            }
        }

        $payment = Payment::where('user_id',$request->user_id)->latest('created_at')->first();
        if($payment) $user->payment_id = $payment->id;
         
        $user->is_trial = true;
        $user->trial_days = 30;
        $user->package_start_date = Carbon::now();
        $user->package_end_date = date('d-m-Y',strtotime('+ 30 days',strtotime(date('d-m-Y'))));
        
        $user->package_id = $request->has('package_id');

        $package = Package::find($request->package_id);
        //if($package->package_type == "premium") $user->is_featured = 1;

        $user->is_active = 1;
        $user->save();
        $this->addTalentScore($user);

        // if ($request->has('package_id') && $request->input('package_id') > 0) {
        //     $package_id = $request->package_id;
        //     $package = Package::find($package_id);
        //     $this->addJobSeekerPackage($user, $package);
        // }
        //$this->addTalentScore($user);
    
        Session::forget('verified');
        //event(new Registered($user));
        // event(new UserRegistered($company));
        if($payment)
        {
            // Email Notification
            $email = $user->email;
            $name = $user->name;
            $type = "Individual";
            $plan_name = $user->package->package_title;
            $invoice_num = Payment::where('user_id',$request->user_id)->latest('created_at')->first()->invoice_num;
            $start_date = $user->package_start_date;
            $end_date = $user->package_end_date;
            $amount = $user->package->package_price;
            $this->recipt($email,$name,$type,$plan_name,$invoice_num,$start_date,$end_date,$amount);
        }
        
        Session::flash('status', 'register-success');

        // to show optimized pop up in register blade , 
        //$this->guard()->login($user);

        return redirect()->back();
    }

    public function toDashboard(Request $request)
    {
        if(User::where('id',$request->user_id)->where('is_active',1)->count()>0)
        {
            $user = User::where('id',$request->user_id)->first();
            $this->guard()->login($user);
            return redirect()->route('candidate.dashboard');
        }
        else{
            return redirect()->back();
        }
    }

    public function toOptimize(Request $request)
    {
        if(User::where('id',$request->user_id)->where('is_active',1)->count()>0)
        {
            $user = User::where('id',$request->user_id)->first();
            $this->guard()->login($user);
            return redirect()->route('career.opitimize');
        }
        else{
            return redirect()->back();
        }
    }

}
