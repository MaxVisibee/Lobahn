<?php

namespace App\Http\Controllers\Company\Auth;

use Auth;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;

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

    protected $redirectTo = '/company-home';
    protected $userTable = 'companies';
    protected $redirectIfVerified = '/company-home';
    protected $redirectAfterVerification = '/company-home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware('company.guest', ['except' => ['getVerification', 'getVerificationError']]);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('company');
    }

    public function register(Request $request)
    {
        $company = new Company();
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->password = bcrypt($request->input('password'));
        $company->is_active = 0;
        $company->verified = 0;
        $company->save();
        /*         * ******************** */
        $company->slug = str_slug($company->name, '-') . '-' . $company->id;
        $company->update();
        /*         * ******************** */

        // event(new Registered($company));
        // event(new CompanyRegistered($company));
        // $this->guard()->login($company);
        UserVerification::generate($company);
        UserVerification::send($company, 'Company Verification', 'khinzawlwin.mm@gmail.com', 'Khin Zaw Lwin');
        // UserVerification::send($company, 'Company Verification', config('mail.recieve_to.address'), config('mail.recieve_to.name'));
        return $this->registered($request, $company) ?: redirect($this->redirectPath());
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

        UserVerification::generate($company);
        UserVerification::send($company, 'Company Verification', 'khinzawlwin.mm@gmail.com', 'Khin Zaw Lwin');

        return redirect('/signup-talent');
    }
}
