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

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use VerifiesUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    protected $redirectTo = '/home';
    protected $userTable = 'users';
    protected $redirectIfVerified = '/register';
    protected $redirectAfterVerification = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware('guest', ['except' => ['getVerification', 'getVerificationError']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
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
        UserVerification::send($user, 'User Verification', 'khinzawlwin.mm@gmail.com', 'Lobahn Technoly Company');

        Session::put('user', $user);

        return redirect('/signup-career-opportunities')->with('verified', 'verified');
    }

    public function showRegistrationForm()
    {
        $user = Session::get('user');

        return view('auth.register_career', compact('user'));
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'user_name'  => 'required',
            'password' => 'required|same:confirm_password|min:6',
        ]);

        // $company = new Company();
        $user = User::find($request->user_id);

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

        if(isset($request->cv)) {
            $cv_file = $request->file('cv');
            $fileName = 'cv_'.time().'.'.$cv_file->extension();
            $cv_file->move(public_path('/uploads/cv_files/'.$fileName));
            $user->cv = $fileName;
        }

        $user->user_name = $request->input('user_name');
        $user->password = bcrypt($request->input('password'));
        // $user->location_id = $request->input('location_id');
        $user->position_title_id = $request->input('position_title_id');
        $user->industry_id = $request->input('industry_id');
        $user->sub_sector_id = $request->input('sub_sector_id');
        $user->functional_area_id = $request->input('functional_area_id');
        // $user->specialty_id = $request->input('specialty_id');
        // $user->employer_id = $request->input('employer_id');
        $user->contract_term_id = $request->input('contract_term_id');
        $user->pay_id = $request->input('pay_id');
        $user->package_id = $request->input('package_id');
        $user->is_active = 1;
        $user->save();
        /*         * ******************** */

        event(new Registered($user));
        // event(new UserRegistered($company));
        $this->guard()->login($user);
        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

}
