<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\Company;
use App\Mail\talentVerification;
use Mail;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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

    public function signupTalent()
    {
        return view('auth.signup_talent');
    }
    
    public function signupCareerOpportunities()
    {
        return view('auth.signup_career_opportunities');
    }

    public function signupTalentStore(Request $request)
    {
        $this->validate($request, [
            'company_name'  => 'required',
            'name'          => 'required',
            'email'         => 'required|email|unique:companies,email',
            'phone'         => 'required',
            'position_title' => 'required',
        ]);

        $company                    = new Company();
        $company->company_name      = $request->company_name;
        $company->name              = $request->name;
        $company->email             = $request->email;
        $company->phone             = $request->phone;
        $company->position_title    = $request->position_title;
        $company->save();

        if($company) {
            Mail::to($company->email)->send(new talentVerification($company));
        }

        return redirect('/signup-talent');
    }

    public function talentVerification($uniqid)
    {
        dd($uniqid);
    }
    
    public function careerOpportunitiesStore(Request $request)
    {
        dd('hello');
    }

}
