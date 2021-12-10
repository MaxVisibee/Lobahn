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

    protected $redirectTo = '/company-home';
    protected $userTable = 'companies';
    protected $redirectIfVerified = '/company/register';
    protected $redirectAfterVerification = '/company/register';

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

    public function showRegistrationForm()
    {
        $company = Session::get('company');

        return view('auth.register_talent', compact('company'));
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'user_name'  => 'required',
            'password' => 'required|same:confirm_password|min:6',
        ]);

        // $company = new Company();
        $company = Company::find($request->company_id);

        if(isset($request->logo)) {
            $photo = $_FILES['logo'];
            if(!empty($photo['name'])){
                $file_name = $photo['name'].'-'.time().'.'.$request->file('logo')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/company_logo/'.$file_name));
                $img->save(public_path('/uploads/company_logo/'.$file_name));
                $company->logo = $file_name;
            }
        }

        $company->user_name = $request->input('user_name');
        $company->password = bcrypt($request->input('password'));
        $company->website = $request->input('website');
        $company->industry_id = $request->input('industry_id');
        $company->sub_sector_id = $request->input('sub_sector_id');
        $company->preferred_school = $request->input('preferred_school');
        $company->target_employer = $request->input('target_employer');
        $company->description = $request->input('description');
        $company->package_id = $request->input('package_id');
        $company->is_active = 1;
        $company->save();
        /*         * ******************** */

        event(new Registered($company));
        // event(new CompanyRegistered($company));
        $this->guard()->login($company);
        return $this->registered($request, $company) ?: redirect($this->redirectPath());
    }

    public function signupTalent()
    {
        return view('auth.signup_talent');
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
        $company->is_active         = 0;
        $company->verified          = 0;
        $company->save();

        $company->slug = str_slug($company->company_name, '-') . '-' . $company->id;
        $company->update();

        UserVerification::generate($company);
        UserVerification::send($company, 'Company Verification', 'khinzawlwin.mm@gmail.com', 'Lobahn Technology Limited');

        Session::put('company', $company);

        return redirect('/signup-talent')->with('verified', 'verified');
    }

}
