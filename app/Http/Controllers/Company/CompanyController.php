<?php

namespace App\Http\Controllers\Company;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Opportunity;
use Illuminate\Support\Facades\Validator;
use Image;
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
use App\Models\SkillUsage;
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
use App\Models\CountryUsage;
use App\Models\FunctionalAreaUsage;
use App\Models\GeographicalUsage;
use App\Models\IndustryUsage;
use App\Models\InstitutionUsage;
use App\Models\JobShiftUsage;
use App\Models\JobSkillOpportunity;
use App\Models\JobTitleUsage;
use App\Models\JobTypeUsage;
use App\Models\KeyStrengthUsage;
use App\Models\Language;
use App\Models\LanguageUsage;
use App\Models\Package;
use App\Models\PaymentMethod;
use App\Models\QualificationUsage;
use App\Models\Speciality;
use App\Models\StudyFieldUsage;
use App\Models\SubSector;
use App\Traits\MultiSelectTrait;

class CompanyController extends Controller
{
    use MultiSelectTrait;

    public function __construct()
    {
        $this->middleware('company', ['except' => ['companyDetail', 'sendContactForm']]);
    }

    public function positionDetail(Opportunity $opportunity)
    {
        $type = "opportunity";
        $job_id = $opportunity->id;
        $data = [
            'opportunity' => $opportunity,
            'target_pay' => TargetPay::where('opportunity_id',Auth::guard('company')->user()->id)->first(),
            'countries' => $this->getCountryDetails($job_id,$type),
            'job_types' => $this->getJobTypeDetails($job_id,$type),
            'job_shifts' => $this->getJobShiftDetails($job_id,$type),
            'keywords' => $this->getKeywordDetails($job_id,$type),
            'instituties' =>$this->getInstituteDetails($job_id,$type),
            'languages' => $this->getLanguageDetails($job_id,$type),
            'geographicals' => $this->getGeographicalDetails($job_id,$type),
            'job_skills' => $this->getJobSkillDetails($job_id,$type),
            'study_fields' => $this->getStudyFielddetails($job_id,$type),
            'qualifications' => $this->getQualificationDetails($job_id,$type),
            'key_strengths' => $this->getKeyStrengthDetails($job_id,$type),
            'job_titles' => $this->getJobtitleDetails($job_id,$type),
            'industries' => $this->getIndustryDetails($job_id,$type),
            'fun_areas' => $this->getFunctionalAreaDetails($job_id,$type)
        ];

        return view('company.position_detail', $data);
    }

    public function positionEdit(Opportunity $opportunity)
    {
        $type = "opportunity";
        $job_id = $opportunity->id;
        $data = [
            'opportunity' => $opportunity,
            'companies' => Company::all(),
            'target_pay' => TargetPay::where('opportunity_id',Auth::guard('company')->user()->id)->first(),
            'countries'  => Country::all(),
            'country_selected' => $this->getCountries($job_id,$type),
            'job_types' => JobType::all(),
            'job_type_selected' => $this->getJobTypes($job_id,$type),
            'job_shifts' => JobShift::all(),
            'job_shift_selected' => $this->getJobShifts($job_id,$type),
            'keywords'  => Keyword::all(),
            'keyword_selected' => $this->getKeywords($job_id,$type),
            'keyword_selected_detail' => $this->getKeywordDetails($job_id,$type),
            'carriers'   => CarrierLevel::all(),
            'job_exps' => JobExperience::all(),
            'degree_levels'  => DegreeLevel::all(),
            'institutions' => Institution::all(),
            'institute_selected' =>$this->getInstitutes($job_id,$type),
            'languages'  => Language::all(),
            'user_language' => $this->getLanguages($job_id,$type),
            'geographicals'  => Geographical::all(),
            'geographical_selected' => $this->getGeographicals($job_id,$type),
            'people_managements'=>MiscHelper::getNumEmployees(),
            'job_skills' => JobSkill::all(),
            'job_skill_selected' => $this->getJobSkills($job_id,$type),
            'study_fields' => StudyField::all(),
            'study_field_selected' => $this->getStudyFields($job_id,$type),
            'qualifications' => Qualification::all(),
            'qualification_selected' => $this->getQualifications($job_id,$type),
            'key_strengths' => KeyStrength::all(),
            'key_strength_selected' => $this->getKeyStrengths($job_id,$type),
            'job_titles' => JobTitle::all(),
            'job_title_selected' => $this->getJobtitles($job_id,$type),
            'industries' => Industry::all(),
            'industry_selected' => $this->getIndustries($job_id,$type),
            'fun_areas'  => FunctionalArea::all(),
            'fun_area_selected' => $this->getFunctionalAreas($job_id,$type),
        ];

        return view('company.position_detail_edit', $data);
    }

    public function positionUpdate(Request $request, Opportunity $opportunity)
    {
        if (isset($request->supporting_document)) {
            $doc = $request->file('supporting_document');
            $fileName = 'job_support_doc_' . time() . '.' . $doc->guessExtension();
            $doc->move(public_path('uploads/job_support_docs'), $fileName);
            $opportunity->supporting_document = $fileName;
        }
        $opportunity->description = $request->description;
        $opportunity->expire_date = $request->expire_date;
        $request->is_active == "Open" ?  $opportunity->is_active = true : $opportunity->is_active = false;
        $opportunity->company_id = Company::where('company_name',$request->company_name)->first()->id;
        $opportunity->carrier_level_id = CarrierLevel::where('carrier_level',$request->management_level)->first()->id ;
        $opportunity->job_experience_id = JobExperience::where('job_experience',$request->year)->first()->id;
        $opportunity->degree_level_id = DegreeLevel::where('degree_name',$request->degree_level)->first()->id;
        $opportunity->people_manangement = $request->people_manangement;
        $opportunity->save();
        
        TargetPay::where('opportunity_id',$opportunity->id)->count() == 1 ?
        TargetPay::where('opportunity_id',$opportunity->id)->update(['target_amount' => $request->target_pay]):
        TargetPay::create(['opportunity_id'=>$opportunity->id,'target_amount' => $request->target_pay]);

        $type = "opportunity";
        $this->action($type,$opportunity->id,$request->keywords,$request->countries,$request->job_types,$request->job_shifts,$request->institutions,$request->geographicals,$request->job_skills,$request->study_fields,$request->qualifications,$request->key_strengths,$request->job_titles,$request->industries,$request->fun_areas);
        return redirect()->back();

    }


    public function index()
    {
        $company = Auth::guard('company')->user();
        $data = [
            'company' => $company,
            'listings' => Opportunity::where('company_id', $company->id)->paginate(10),
        ];

        return view('company.dashboard', $data);
    }



    public function update_detail(Request $request)
    {
        $company = Auth::guard('company')->user();
        $company->website_address = $request->input('website_address');
        $company->description = $request->input('description');
        $company->update();

        $company = Auth::guard('company')->user();
        $data = [
            'company' => $company,
            'listings' => Opportunity::where('company_id', $company->id)->get()
        ];

        return redirect()->route('company.profile.edit')->with('data');
    }

    public function account()
    {
        $company = Auth::guard('company')->user();
        $last_payment = Payment::where('company_id', $company->id)->latest('id')->first();

        $data = [
            'company' => $company,
            'last_payment' => $last_payment
        ];

        return view('company.account', $data);
    }

    public function settings()
    {
        $data = [
            'company' => Auth::guard('company')->user(),
        ];
        return view('company.settings',$data);
    }

    public function updateSetting(Request $request)
    {
        $company = Company::where('id',Auth::guard('company')->user()->id)->first();
        switch($request->name){
            case "new_opportunities": $flag = $company->new_opportunities; break;
            case "change_of_status": $flag = $company->change_of_status; break;
            case "connection": $flag = $company->connection; break;
            case "lobahn_connect": $flag = $company->lobahn_connect; break;
        }

        Company::where('id',Auth::guard('company')->user()->id)->update([
            $request->name => !$flag
        ]);
    }

    public function profile()
    {
        $company = Auth::guard('company')->user();
        $data = [
            'company' => $company,
            'listings' => Opportunity::where('company_id', $company->id)->get()
        ];

        return view('company.profile', $data);
    }

    public function edit()
    {
        $company = Auth::guard('company')->user();
        $data = [
            'company' => $company,
            'listings' => Opportunity::where('company_id', $company->id)->get()
        ];

        return view('company.profile_edit', $data);
    }

    public function featureStaffDetail()
    {
        return view('company.feature_staff_detail');
    }

    public function StaffDetail()
    {
        return view('company.staff_detail');
    }

    public function update(Request $request)
    {
        $company = Auth::guard('company')->user();

        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'user_name' => 'required',
            'email'     => 'required|email',
            'phone'     => 'required',
        ]);

        if (isset($request->company_logo)) {

            $photo = $_FILES['company_logo'];
            if (!empty($photo['name'])) {
                $file_name = $photo['name'] . '-' . time() . '.' . $request->file('company_logo')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/company_logo/' . $file_name));
                $img->save(public_path('/uploads/company_logo/' . $file_name));

                $company->company_logo = $file_name;
            }
        }

        $company->company_name = $request->input('company_name');
        $company->user_name = $request->input('user_name');
        $company->email = $request->input('email');
        $company->phone = $request->input('phone');
        $company->update();

        $company = Auth::guard('company')->user();
        $data = [
            'company' => $company,
            'errors' => $validator->errors(),
            'listings' => Opportunity::where('company_id', $company->id)->get()
        ];

        return redirect()->route('company.profile.edit')->with('data');
    }

    public function activity()
    {
        return view('company.activity');
    }

    public function company_listing()
    {
        $data['companies'] = Company::paginate(20);
        return view('company.listing')->with($data);
    }

    public function positionListing(Opportunity $opportunity)
    {
        $data['opportunity'] = $opportunity;

        return view('company.position_listing')->with($data);
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|confirmed'
        ]);

        $company = Company::find(Auth::guard('company')->user()->id);
        $company->password = bcrypt($request->password);
        $company->save();

        $company = Auth::guard('company')->user();
        $data = [
            'company' => $company,
            'errors' => $validator->errors(),
            'listings' => Opportunity::where('company_id', $company->id)->get()
        ];

        return view('company.profile', $data);
    }

    public function positionAdd($company_id)
    {
        $data = [
            'company' => Company::find($company_id),
            'companies' => Company::all(),
            'job_types' => JobType::all(),
            'job_skills' => JobSkill::all(),
            'job_titles' => JobTitle::all(),
            'job_shifts' => JobShift::all(),
            'job_exps' => JobExperience::all(),
            'degrees'    => DegreeLevel::all(),
            'carriers'   => CarrierLevel::all(),
            'fun_areas'  => FunctionalArea::all(),
            'countries'  => Country::all(),
            'packages'   => Package::all(),
            'industries' => Industry::all(),
            'sectors'    => SubSector::all(),
            'languages'  => Language::all(),
            'degree_levels'  => DegreeLevel::all(),
            'study_fields' => StudyField::all(),
            'payments' => PaymentMethod::all(),
            'geographicals'  => Geographical::all(),
            'keywords'  => Keyword::all(),
            'institutions' => Institution::all(),
            'key_strengths' => KeyStrength::all(),
            'specialities' => Speciality::all(),
            'qualifications' => Qualification::all(),
            'target_pays' => TargetPay::all(),
            'people_managements' => MiscHelper::getNumEmployees(),
        ];

        return view('company.position_detail_add', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        $opportunity = new Opportunity();

        // dd($request->all());

        if (isset($request->supporting_document)) {
            $doc = $request->file('supporting_document');
            $fileName = 'job_support_doc_' . time() . '.' . $doc->guessExtension();
            $doc->move(public_path('uploads/job_support_docs'), $fileName);
            $opportunity->supporting_document = $fileName;
        }

        $opportunity->title = $request->input('title');
        $opportunity->company_id = $request->input('company_id');
        $opportunity->job_experience_id = $request->input('job_experience_id');
        $opportunity->degree_level_id = $request->input('degree_level_id');
        $opportunity->carrier_level_id = $request->input('carrier_level_id');
        $opportunity->salary_from = $request->input('salary_from');
        $opportunity->salary_to = $request->input('salary_to');
        $opportunity->salary_currency = $request->input('salary_currency');
        $opportunity->gender = $request->input('gender');
        $opportunity->no_of_position = $request->input('no_of_position');
        $opportunity->requirement = $request->input('requirement');
        $opportunity->about_company = $request->input('about_company');
        $opportunity->description = $request->input('description');
        $opportunity->highlight_1 = $request->input('highlight_1');
        $opportunity->highlight_2 = $request->input('highlight_2');
        $opportunity->highlight_3 = $request->input('highlight_3');
        $opportunity->benefits = $request->input('benefits');
        $opportunity->expire_date = $request->input('expire_date');
        $opportunity->slug = $request->input('slug');
        $opportunity->hide_salary = $request->input('hide_salary');
        $opportunity->is_freelance = $request->input('is_freelance');
        $opportunity->is_active = $request->input('is_active');
        $opportunity->is_default = $request->input('is_default');
        $opportunity->is_featured = $request->input('is_featured');
        $opportunity->is_subscribed = $request->input('is_subscribed');
        $opportunity->language_id = $request->input('language_id');
        $opportunity->management_id = $request->input('management_id');
        $opportunity->specialist_id = $request->input('specialist_id');
        $opportunity->website_address = $request->input('website_address');
        $opportunity->package_id = $request->input('package_id');
        $opportunity->payment_id = $request->input('payment_id');
        $opportunity->package_start_date = $request->input('package_start_date');
        $opportunity->package_end_date = $request->input('package_end_date');
        $opportunity->listing_date = $request->input('listing_date');
        $opportunity->target_employer_id = $request->input('target_employer_id');

        if (isset($opportunity->company_id)) {
            $company_id = $opportunity->company_id;
            $company = Company::where('id', $company_id)->first();
        }
        
        $opportunity->sub_sector_id = $company->sub_sector_id;
        $opportunity->save();

        $opportunity->ref_no = 'SW'.$this->generate_numbers((int) $opportunity->id, 1, 5);
        $opportunity->update();

        if (isset($request->keyword_id)) {
            foreach ($request->keyword_id as $key => $value) {
                $keyword = new KeywordUsage;
                $keyword->type = "opportunity";
                $keyword->opportunity_id = $opportunity->id;
                $keyword->keyword_id = $value;
                $keyword->save();
            }
        }

        if (isset($request->job_skill_id)) {
            foreach ($request->job_skill_id as $key => $value) {
                $skill = new JobSkillOpportunity();
                $skill->type = "opportunity";
                $skill->opportunity_id = $opportunity->id;
                $skill->job_skill_id = $value;
                $skill->save();
            }
        }

        if(isset($request->country_id)) {
            foreach ($request->country_id as $key => $value) {
                $country = new CountryUsage();
                $country->opportunity_id = $opportunity->id;
                $country->country_id = $value;
                $country->save();
            }

        }

        if (isset($request->job_type_id)) {
            foreach ($request->job_type_id as $key => $value) {
                $jobType = new JobTypeUsage();
                $jobType->opportunity_id = $opportunity->id;
                $jobType->job_type_id = $value;
                $jobType->save();
            }
        }

        if (isset($request->job_type_id)) {

            $targetPay = new TargetPay();
            $targetPay->opportunity_id = $opportunity->id;
            $targetPay->target_amount = $request->input('target_amount');
            $targetPay->fulltime_amount = $request->input('fulltime_amount');
            $targetPay->parttime_amount = $request->input('parttime_amount');
            $targetPay->freelance_amount = $request->input('freelance_amount');
            $targetPay->save();
            
        }

        if (isset($request->contract_hour_id)) {
            foreach ($request->contract_hour_id as $key => $value) {
                $jobShiftUsage = new JobShiftUsage();
                $jobShiftUsage->opportunity_id = $opportunity->id;
                $jobShiftUsage->contract_hour_id = $value;
                $jobShiftUsage->save();
            }
        }

        if (isset($request->institution_id)) {
            foreach ($request->institution_id as $key => $value) {
                $institutionUsage = new InstitutionUsage();
                $institutionUsage->opportunity_id = $opportunity->id;
                $institutionUsage->institution_id = $value;
                $institutionUsage->save();
            }
        }

        if (isset($request->geographical_id)) {
            foreach ($request->geographical_id as $key => $value) {
                $geographicalUsage = new GeographicalUsage();
                $geographicalUsage->opportunity_id = $opportunity->id;
                $geographicalUsage->geographical_id = $value;
                $geographicalUsage->save();
            }
        }

        if (isset($request->field_study_id)) {
            foreach ($request->field_study_id as $key => $value) {
                $studyFieldUsage = new StudyFieldUsage();
                $studyFieldUsage->opportunity_id = $opportunity->id;
                $studyFieldUsage->field_study_id = $value;
                $studyFieldUsage->save();
            }
        }

        if (isset($request->qualification_id)) {
            foreach ($request->qualification_id as $key => $value) {
                $qualificationUsage = new QualificationUsage();
                $qualificationUsage->opportunity_id = $opportunity->id;
                $qualificationUsage->qualification_id = $value;
                $qualificationUsage->save();
            }
        }

        if (isset($request->key_strnegth_id)) {
            foreach ($request->key_strnegth_id as $key => $value) {
                $keyStrengthUsage = new KeyStrengthUsage();
                $keyStrengthUsage->opportunity_id = $opportunity->id;
                $keyStrengthUsage->key_strnegth_id = $value;
                $keyStrengthUsage->save();
            }
        }

        if (isset($request->job_title_id)) {
            foreach ($request->job_title_id as $key => $value) {
                $jobTitleUsage = new JobTitleUsage();
                $jobTitleUsage->opportunity_id = $opportunity->id;
                $jobTitleUsage->job_title_id = $value;
                $jobTitleUsage->save();
            }
        }

        if (isset($request->industry_id)) {
            foreach ($request->industry_id as $key => $value) {
                $industryUsage = new IndustryUsage();
                $industryUsage->opportunity_id = $opportunity->id;
                $industryUsage->industry_id = $value;
                $industryUsage->save();
            }
        }

        if (isset($request->functional_area_id)) {
            foreach ($request->functional_area_id as $key => $value) {
                $functionalAreaUsage = new FunctionalAreaUsage();
                $functionalAreaUsage->opportunity_id = $opportunity->id;
                $functionalAreaUsage->functional_area_id = $value;
                $functionalAreaUsage->save();
            }
        }

        if (isset($request->language_id1)) {

            $languageUsage = new LanguageUsage();
            $languageUsage->level = $request->level1;
            $languageUsage->job_id = $opportunity->id;
            $languageUsage->language_id = $request->language_id1;
            $languageUsage->save();
        }

        if (isset($request->language_id2)) {

            $languageUsage = new LanguageUsage();
            $languageUsage->level = $request->level2;
            $languageUsage->job_id = $opportunity->id;
            $languageUsage->language_id = $request->language_id2;
            $languageUsage->save();
        }

        if (isset($request->language_id3)) {

            $languageUsage = new LanguageUsage();
            $languageUsage->level = $request->level3;
            $languageUsage->job_id = $opportunity->id;
            $languageUsage->language_id = $request->language_id3;
            $languageUsage->save();
        }

        return redirect()->route('company.home')
            ->with('success', 'Opportunity created successfully');
    }

    public function generate_numbers($start, $count, $digits) {

		for ($n = $start; $n < $start+$count; $n++) {

			$result = str_pad($n, $digits, "0", STR_PAD_LEFT);

		}
		return $result;
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