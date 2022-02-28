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

use App\Traits\VerifiesUsersTrait;
use App\Models\Industry;
use App\Models\SubSector;
use App\Models\Payment;
use App\Models\Package;
use App\Models\Institution;
use App\Models\SiteSetting;
use App\Traits\EmailTrait;

class RegisterController extends Controller
{
    use RegistersUsers;
    // use VerifiesUsers;
    use VerifiesUsersTrait;
    use EmailTrait;

    // protected $redirectTo = RouteServiceProvider::HOME;

    //protected $redirectTo = '/signup-talent';
    protected $userTable = 'companies';

    // protected $redirectIfVerified = '/company/register';
    // protected $redirectAfterVerification = '/company/register';

    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware('company.guest', ['except' => ['getVerification', 'getVerificationError']]);
    }

    protected function guard()
    {
        return Auth::guard('company');
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
            'email'         => 'required|email|unique:companies,email||unique:users,email',
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

        Session::put('verified', 'verified');
        return redirect()->back();
        //return $this->registered($request, $company) ?: redirect($this->redirectPath());
    }

    public function showRegistrationForm(Request $request)
    {
        // unverified access
        $company = Company::where('email','=',$request->email)->where('verified', 1)->first();
        if(!$company) return redirect()->route('signup');

        // already registered Link access
        if(!session('status'))
        {
        $is_active = Company::where('email','=',$request->email)->first()->is_active;
        if($is_active) return redirect()->route('login');
        }

        $company = Company::where('email','=',$request->email)->where('verified', 1)->first();
        $stripe_key = SiteSetting::first()->stripe_key;
        $industries = Industry::all();
        $sectors    = [];
        //$packages = Package::where('package_for','corporate')->where('package_type','basic')->get();
        $packages = Package::where('package_for','corporate')->get();
        $institutions = Institution::all();
        $companies = Company::all();

        return view('auth.register_talent', compact('company','stripe_key','industries','sectors','institutions','packages','companies'));
    }

    public function getSectors($id)
    {
        $sectors =  SubSector::where('industry_id',$id)->get();
        return response()->json(array('sectors'=> $sectors), 200);
    }

    public function register(Request $request)
    {
        $company = Company::find($request->company_id);

        if(isset($request->logo)) {
            $photo = $_FILES['logo'];
            if(!empty($photo['name'])){
                $file_name = $photo['name'].'-'.time().'.'.$request->file('logo')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/company_logo/'.$file_name));
                $img->save(public_path('/uploads/company_logo/'.$file_name));
                $company->company_logo = $file_name;
            }
        }

        $company->user_name = $request->user_name;
        $company->password = bcrypt($request->password);
        $company->website_address = $request->website;
        $company->industry_id = $request->industry_id;
        $company->sub_sector_id = $request->sub_sector_id;
        $company->preferred_school_id = $request->preferred_school;
        $company->target_employer_id = $request->target_employer;
        $company->description = $request->description;
        $company->package_id = $request->package_id;
        $payment = Payment::where('company_id',$request->company_id)->latest('created_at')->first();
        if($payment) $company->payment_id = $payment->id;
        else
        {
             $company->is_trial = true;
             $company->trial_days = 30;
             $company->package_start_date = date('d-m-Y');
             $company->package_end_date = date('d-m-Y',strtotime('+ 30 days',strtotime(date('d-m-Y'))));
        }
        //$num_days = Package::where('id',$request->package_id)->first()->package_num_days;
        $company->is_active = 1;

        $package = Package::find($request->package_id);
        if($package->package_type == "premium") 
        $company->is_featured = 1;

        $company->save();
        
        Session::forget('verified');
        
        event(new Registered($company));
        //event(new CompanyRegistered($company));

        if($payment)
        {
            // Email Notification
            $email = $company->email;
            $name = $company->name;
            $type = "Corporate";
            $plan_name = $company->package->package_title;
            $invoice_num = Payment::where('company_id',$company->id)->latest('created_at')->first()->invoice_num;
            $start_date = $company->package_start_date;
            $end_date = $company->package_end_date;
            $amount = $company->package->package_price;
            $this->recipt($email,$name,$type,$plan_name,$invoice_num,$start_date,$end_date,$amount);
        }
        
        Session::flash('status', 'register-success');
        return redirect()->back();
    }

    public function toDashboard(Request $request)
    {
        if(Company::where('id',$request->company_id)->where('is_active',1)->count()>0)
        {
            $company = Company::where('id',$request->company_id)->first();
            $this->guard()->login($company);
            return redirect()->route('company.home');
        }
        else{
            return redirect()->back();
        }
    }

    public function toOptimizeListing(Request $request)
    {
        if(Company::where('id',$request->company_id)->where('is_active',1)->count()>0)
        {  
            $company = Company::where('id',$request->company_id)->first();
            $this->guard()->login($company);
            return redirect()->route('talent.opitimize');
        }
        else{
            return redirect()->back();
        }
    }
}
