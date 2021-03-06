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
use App\Models\TargetCompany;
use App\Models\JobType;
use App\Models\Package;
use App\Models\Payment;
use App\Traits\JobSeekerPackageTrait;
use App\Traits\TalentScoreTrait;
use App\Traits\MultiSelectTrait;
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
    use MultiSelectTrait;

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
            'phone'         => 'required|',
        ]);

        $user                    = new User();
        $user->name              = $request->name;
        $user->email             = $request->email;

        // phone add space
        $phone = trim(str_replace(' ', '', $request->phone));
        $phone_arr = str_split($phone, 4);
        $phone_string ="";
        foreach($phone_arr as $one){
            $phone_string .= $one .' ';
        }

        $user->phone             = $request->country_code.' '.$phone_string;
        //end phone add space
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
        $employers = TargetCompany::all();
        $job_types = JobType::all();
        $packages = Package::where('package_for','individual')->where('package_type','basic')->get();
        return view('auth.register_career', compact('user','stripe_key','conuntries','industries','job_titles','functionals','employers','job_types','packages'));
    }
 
    public function register(Request $request)
    {
        //return $request;
        $user = User::find($request->user_id);

        // User Data 
        $user->user_name = $request->user_name;
        $user->password = bcrypt($request->password);
        $user->country_id = $request->location_id;

        // Preference 
        if(!is_null($request->job_title_id)) 
        {
            $job_title_id = explode(",",$request->job_title_id);
            $user->position_title_id = json_encode($job_title_id);
        } else  $job_title_id = $user->position_title_id = NULL;

        if(!is_null($request->custom_job_title_id)) 
        {
            $custom_job_title_id = explode(",",$request->custom_job_title_id);
            $user->custom_position_title_id = json_encode($custom_job_title_id);
        } else  $custom_job_title_id = $user->custom_position_title_id = NULL;

        if(!is_null($request->industry_id)) 
        {
            $industry_id = explode(",",$request->industry_id);
            $user->industry_id = json_encode($industry_id);
        } else  $industry_id = $user->industry_id = NULL;

        if(!is_null($request->custom_industry_id)) 
        {
            $custom_industry_id = explode(",",$request->custom_industry_id);
            $user->custom_industry_id = json_encode($custom_industry_id);
        } else  $custom_industry_id = $user->custom_industry_id = NULL;

        if(!is_null($request->functional_id)) 
        {
            $functional_id = explode(",",$request->functional_id);
            $user->functional_area_id = json_encode($functional_id);
        } else  $functional_id = $user->functional_area_id = NULL;

        if(!is_null($request->custom_functional_id)) 
        {
            $custom_functional_id = explode(",",$request->custom_functional_id);
            $user->custom_functional_area_id = json_encode($custom_functional_id);
        } else  $custom_functional_id = $user->custom_functional_area_id = NULL;

        if(!is_null($request->employer_id)) 
        {
            $employer_id = explode(",",$request->employer_id);
            $user->target_employer_id = json_encode($employer_id);
        } else  $employer_id = $user->target_employer_id = NULL;

        if(!is_null($request->custom_employer_id)) 
        {
            $custom_employer_id = explode(",",$request->custom_employer_id);
            $user->custom_target_employer_id = json_encode($custom_employer_id);
        } else  $custom_employer_id = $user->custom_target_employer_id = NULL;

        if(!is_null($request->job_type_id)) 
        {
            $job_type_id = explode(",",$request->job_type_id);
            $user->contract_term_id = json_encode($job_type_id);
        } else  $job_type_id = $user->contract_term_id = NULL;

        //$user->contract_term_id = $request->preference_checkbox;
        $user->full_time_salary = $request->full_time_salary;
        $user->part_time_salary = $request->part_time_salary;
        $user->freelance_salary = $request->freelance_salary;

        // CV File 

        if(isset($request->cv))
        {
            $user_name = str_replace(' ', '_', $request->user_name);
            $cv_file = $request->file('cv');
            $fileName = 'LOB_'.$user_name.time().'.'.$cv_file->guessExtension();
            $fileSize = $request->file('cv')->getSize();
            $cv_file->move(public_path('uploads/cv_files'), $fileName);
            $cv = new ProfileCv();
            if($user_name != NULL)
            {
                $cv->title = $user_name.'_'.$fileName;
            }
            $cv->cv_file = $fileName;
            $cv->user_id = $user->id;
            $cv->size = $fileSize/1000000;
            $cv->save();
            $cv = ProfileCv::latest()->first();
            $user->default_cv= $cv->id;
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

        $user->package_start_date = Carbon::now();
        $user->package_end_date = date('d-m-Y',strtotime('+ 30 days',strtotime(date('d-m-Y'))));
        $user->is_trial = true;
        $user->trial_days = 30;
        $user->is_active = 1;

        //$payment = Payment::where('user_id',$request->user_id)->latest('created_at')->first();
        //if($payment) $user->payment_id = $payment->id;
        //$user->package_id = $request->has('package_id');
        //$package = Package::find($request->package_id);
        //if($package->package_type == "premium") $user->is_featured = 1;
        // if($payment)
        // {
        //     # Email Notification
        //     $email = $user->email;
        //     $name = $user->name;
        //     $type = "Individual";
        //     $plan_name = $user->package->package_title;
        //     $invoice_num = Payment::where('user_id',$request->user_id)->latest('created_at')->first()->invoice_num;
        //     $start_date = $user->package_start_date;
        //     $end_date = $user->package_end_date;
        //     $amount = $user->package->package_price;
        //     $this->recipt($email,$name,$type,$plan_name,$invoice_num,$start_date,$end_date,$amount);
        // }
        // if ($request->has('package_id') && $request->input('package_id') > 0) {
        //     $package_id = $request->package_id;
        //     $package = Package::find($package_id);
        //     $this->addJobSeekerPackage($user, $package);
        // }

        $type = "candidate";
        $this->action($type, $user->id, [], [], $job_type_id, [], [], [], [], [], [], [], $job_title_id, $industry_id, $functional_id, $employer_id, [], NULL);
        $user->save();
        $this->addTalentScore($user);
        Session::forget('verified');
        $this->guard()->login($user);
        //event(new Registered($user));
        //event(new UserRegistered($company));
        
        Session::flash('status', 'register-success');
        Session::flash('registration-success', true);
        return redirect()->route('candidate.dashboard');
    }

    public function toDashboard(Request $request)
    {
        return redirect()->back();
        // if(User::where('id',$request->user_id)->where('is_active',1)->count()>0)
        // {
        //     $user = User::where('id',$request->user_id)->first();
        //     $this->guard()->login($user);
        //     return redirect()->route('candidate.dashboard');
        // }
        // else{
        //     return redirect()->back();
        // }
    }

    public function toOptimize(Request $request)
    {
        return redirect()->back();
        // if(User::where('id',$request->user_id)->where('is_active',1)->count()>0)
        // {
        //     $user = User::where('id',$request->user_id)->first();
        //     $this->guard()->login($user);
        //     return redirect()->route('career.opitimize');
        // }
        // else{
        //     return redirect()->back();
        // }
    }

}
