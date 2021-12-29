<?php

namespace App\Http\Controllers\Company;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Opportunity;

use App\Models\Partner;
use App\Models\NewsEvent;
use App\Models\Country;
use App\Models\Payment;
use App\Models\JobApply;
use App\Models\TargetPay;
use App\Models\CarrierLevel;
use App\Models\JobShift;
use App\Models\Keyword;
use App\Models\KeywordUsage;
use App\Models\DegreeLevel;
use App\Models\Geographical;
use App\Models\FunctionalArea;
use App\Models\Industry;
use App\Models\StudyField;
use App\Models\JobType;
use App\Models\JobTitle;
use App\Models\JobSkill;
use App\Models\JobExperience;
use App\Models\KeyStrength;
use App\Models\Qualification;
use App\Models\Institution;
use App\Models\JobStreamScore;
use App\Models\ProfileCv;
use App\Models\EmploymentHistory;
use Illuminate\Support\Facades\DB;
use App\Helpers\MiscHelper;

class CompanyController extends Controller
{

    public function __construct()
    {
        // $this->middleware('company', ['except' => ['companyDetail', 'sendContactForm']]);
    }

    public function index(){
        $company = Auth::guard('company')->user();
        $data = [
            'company' => $company,
            'listings' => Opportunity::where('company_id',$company->id)->get()
        ];
        return view('company.dashboard',$data);
    }

    public function positionDetail($id){
        $data = [
            'listing' => Opportunity::where('id',$id)->first(),
        ];
        return view('company.position_detail',$data);
    }

    public function account()
    {
        return view('company.account');
    }
    public function settings()
    {
        return view('company.settings');
    }
    public function profile()
    {
        return view('company.profile');
    }

    public function edit()
    {
        return view('company.profile_edit');
    }

    public function activity()
    {
        return view('company.activity');
    }

    public function company_listing()
    {
        $data['companies']=Company::paginate(20);
        return view('company.listing')->with($data);
    }

    public function positionListing($id)
    {
        return view('company.position_listing');
    }

    public function positionAdd($company_id)
    {

        $data = [ 
            'company' => Company::find($company_id),
            'countries' => Country::all(),
            'targetPays' => TargetPay::all(),
            'manangementLevels' => CarrierLevel::all(),
            'people_managements'=>MiscHelper::getNumEmployees(),
            'contract_hours' => JobShift::all(),
            'keywords' => Keyword::all(),
            'education_levels' => DegreeLevel::all(),
            'geo_experiences' => Geographical::all(),
            'functional_areas' => FunctionalArea::all(),
            'industries' => Industry::all(),
            'companies' => Company::all(),
            'study_fields' => StudyField::all(),
            'job_types' => JobType::all(),
            'job_titles' => JobTitle::all(),
            'job_skills' => JobSkill::all(),
            'job_experiences' => JobExperience::all(),
            'key_strengths' => KeyStrength::all(),
            'qualifications' => Qualification::all(),
            'institutions' => Institution::all(),
        ];

        return view('company.position_detail_add', $data);
    }

    

    // public function companyProfile()
    // {
    //     $countries = DataArrayHelper::defaultCountriesArray();
    //     $industries = DataArrayHelper::defaultIndustriesArray();
    //     $ownershipTypes = DataArrayHelper::defaultOwnershipTypesArray();
    //     $company = Company::findOrFail(Auth::guard('company')->user()->id);
    //     return view('company.edit_profile')
    //                     ->with('company', $company)
    //                     ->with('countries', $countries)
    //                     ->with('industries', $industries)
    //                     ->with('ownershipTypes', $ownershipTypes);
    // }

    // public function companyDetail(Request $request, $company_slug)
    // {
    //     $company = Company::where('slug', 'like', $company_slug)->firstOrFail();
    //     /*         * ************************************************** */
    //     $seo = $this->getCompanySEO($company);
    //     /*         * ************************************************** */
    //     return view('company.detail')
    //                     ->with('company', $company)
    //                     ->with('seo', $seo);
    // }

    // public function sendContactForm(Request $request)
    // {
    //     $msgresponse = Array();
    //     $rules = array(
    //         'from_name' => 'required|max:100|between:4,70',
    //         'from_email' => 'required|email|max:100',
    //         'subject' => 'required|max:200',
    //         'message' => 'required',
    //         'to_id' => 'required',
    //         'g-recaptcha-response' => 'required|captcha',
    //     );
    //     $rules_messages = array(
    //         'from_name.required' => __('Name is required'),
    //         'from_email.required' => __('E-mail address is required'),
    //         'from_email.email' => __('Valid e-mail address is required'),
    //         'subject.required' => __('Subject is required'),
    //         'message.required' => __('Message is required'),
    //         'to_id.required' => __('Recieving Company details missing'),
    //         'g-recaptcha-response.required' => __('Please verify that you are not a robot'),
    //         'g-recaptcha-response.captcha' => __('Captcha error! try again'),
    //     );
    //     $validation = Validator::make($request->all(), $rules, $rules_messages);
    //     if ($validation->fails()) {
    //         $msgresponse = $validation->messages()->toJson();
    //         echo $msgresponse;
    //         exit;
    //     } else {
    //         $receiver_company = Company::findOrFail($request->input('to_id'));
    //         $data['company_id'] = $request->input('company_id');
    //         $data['company_name'] = $request->input('company_name');
    //         $data['from_id'] = $request->input('from_id');
    //         $data['to_id'] = $request->input('to_id');
    //         $data['from_name'] = $request->input('from_name');
    //         $data['from_email'] = $request->input('from_email');
    //         $data['from_phone'] = $request->input('from_phone');
    //         $data['subject'] = $request->input('subject');
    //         $data['message_txt'] = $request->input('message');
    //         $data['to_email'] = $receiver_company->email;
    //         $data['to_name'] = $receiver_company->name;
    //         $msg_save = CompanyMessage::create($data);
    //         $when = Carbon::now()->addMinutes(5);
    //         Mail::send(new CompanyContactMail($data));
    //         $msgresponse = ['success' => 'success', 'message' => __('Message sent successfully')];
    //         echo json_encode($msgresponse);
    //         exit;
    //     }
    // }
}
