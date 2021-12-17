<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
use Session;
use Image;

use App\Traits\VerifiesUsersTrait;
use App\Models\Industry;
use App\Models\SubSector;
use App\Models\FunctionalArea;
use App\Models\JobTitle;
use App\Models\Geographical;
use App\Models\Country;
use App\Models\Company;
use App\Models\JobType;
use App\Models\Package;
use App\Models\Payment;

class RegisterController extends Controller
{
    use RegistersUsers;
    // use VerifiesUsers;
    use VerifiesUsersTrait;

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
            'email'         => 'required|email|unique:users,email',
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
        UserVerification::send($user, 'User Verification', 'zwelinnhtetag.test@gmail.com', 'Lobahn Technoly Company');

        Session::put('verified', 'verified');

        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    public function showRegistrationForm(Request $request)
    {
        $user = User::where('email','=',$request->email)->where('verified', 1)->first();

        // check user is already register 
        if($user->password)
        {
            return redirect()->route('login');
        }

        $conuntries = Country::all();
        $job_titles = JobTitle::all();
        $industries = Industry::all();
        $functionals = FunctionalArea::all();
        $employers = Company::all();
        $job_types = JobType::all();
        $packages = Package::all();
        return view('auth.register_career', compact('user','conuntries','industries','job_titles','functionals','employers','job_types','packages'));
    }
 
    public function register(Request $request)
    {
        // $this->validate($request, [
        //     'user_name'  => 'required',
        //     'password' => 'required|same:confirm_password|min:6',
        // ]);
        $user = User::find($request->user_id);

        // User Data 
        $user->user_name = $request->user_name;
        $user->password = bcrypt($request->password);

        // Profile Data
        $user->country_id = $request->location_id;
        $user->position_title_id = $request->position_title_id;
        $user->industry_id = $request->industry_id;
        $user->functional_area_id = $request->functional_area_id;
        $user->target_employer_id = $request->target_employer_id;
        $user->contract_term_id = $request->contract_term_id;
        $user->target_pay_id = $request->target_pay_id;

        // CV File 
        if(isset($request->cv)) {
            $cv_file = $request->file('cv');
            $fileName = 'cv_'.time().'.'.$cv_file->guessExtension();
            $cv_file->move(public_path('uploads/cv_files'), $fileName);
            $user->cv = $fileName;
        }

        // Image File 
        if(isset($request->image)) {
            $photo = $_FILES['image'];
            if(!empty($photo['name'])){
                $file_name = $photo['name'].'-'.time().'.'.$request->file('image')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/profile_photos/'.$file_name));
                $img->save(public_path('/uploads/profile_photos/'.$file_name));

                $user->image = $file_name;
            }
        }

        // Membership / Package
        $user->package_id = $request->package_id;

        // Other Fields
        $user->package_start_date = date('d-m-Y');
        $num_days = Package::where('id',$request->package_id)->first()->package_num_days;
        $user->package_end_date = date('d-m-Y',strtotime('+'.$num_days.' days',strtotime(date('d-m-Y'))));
        $user->payment_id = Payment::where('user_id',$request->user_id)->latest('created_at')->first()->id;
        $user->is_active = 1;
        $user->save();

        /***********************/
        Session::forget('verified');
        event(new Registered($user));
        // event(new UserRegistered($company));
        
        Session::flash('status', 'register-success');
        return redirect()->back();
    }

    /*******
     * 
     *  After Registration Success PopUp
     * 
     *******/

    public function registeredDashboard(Request $request)
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

    public function registeredProfile(Request $request)
    {
        if(User::where('id',$request->user_id)->where('is_active',1)->count()>0)
        {
            $user = User::where('id',$request->user_id)->first();
            $this->guard()->login($user);
            return redirect()->route('candidate.profile');
        }
        else{
            return redirect()->back();
        }
    }

}
