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
use App\Models\JobSkillOpportunity;
use App\Models\Language;
use App\Models\Package;
use App\Models\PaymentMethod;
use App\Models\Speciality;
use App\Models\SubSector;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('company', ['except' => ['companyDetail', 'sendContactForm']]);
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

    public function positionDetail(Opportunity $opportunity)
    {
        $job_skills = [];
        $keyword = [];
        foreach ($opportunity->jobSkillOpportunity as $value) {
            $job_skills[$value->job_skill_id] = JobSkill::find($value->job_skill_id)->job_skill;
        }

        foreach ($opportunity->mykeywords as $value) {
            $keyword[$value->keyword_id] = Keyword::find($value->keyword_id)->keyword_name;
        }
        $data = [
            'data' => $opportunity,
            'keywords' => $keyword,
            'job_skills' => $job_skills
        ];

        return view('company.position_detail', $data);
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

        $this->validate($request, [
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
        // $company->website_address = $request->input('website_address');
        // $company->description = $request->input('description');

        $company->update();

        $company = Auth::guard('company')->user();
        $data = [
            'company' => $company,
            'listings' => Opportunity::where('company_id', $company->id)->get()
        ];

        return redirect()->route('company.profile.edit')->with('data');
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
            'target_pays' => TargetPay::all()
        ];

        return view('company.position_detail_add', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        //$input = $request->all();    
        // $opportunity = Opportunity::create($input);
        $opportunity = new Opportunity();

        if (isset($request->supporting_document)) {
            $doc = $request->file('supporting_document');
            $fileName = 'job_support_doc_' . time() . '.' . $doc->guessExtension();
            $doc->move(public_path('uploads/job_support_docs'), $fileName);
            $opportunity->supporting_document = $fileName;
        }

        $opportunity->title = $request->input('title');
        $opportunity->company_id = $request->input('company_id');
        $opportunity->country_id = $request->input('country_id');

        $opportunity->job_title_id = $request->input('job_title_id');
        $opportunity->job_type_id = $request->input('job_type_id');
        $opportunity->job_experience_id = $request->input('job_experience_id');
        $opportunity->degree_level_id = $request->input('degree_level_id');
        $opportunity->carrier_level_id = $request->input('carrier_level_id');
        $opportunity->functional_area_id = $request->input('functional_area_id');
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
        // $opportunity->address = $request->input('address');
        $opportunity->contract_hour_id = $request->input('contract_hour_id');
        //$opportunity->keyword_id = $request->input('keyword_id');
        $opportunity->institution_id = $request->input('institution_id');
        $opportunity->language_id = $request->input('language_id');
        $opportunity->geographical_id = $request->input('geographical_id');
        $opportunity->management_id = $request->input('management_id');
        $opportunity->field_study_id = $request->input('field_study_id');
        $opportunity->qualification_id = $request->input('qualification_id');
        $opportunity->key_strnegth_id = $request->input('key_strnegth_id');
        $opportunity->specialist_id = $request->input('specialist_id');
        $opportunity->website_address = $request->input('website_address');
        // $opportunity->target_employer = $request->input('target_employer');
        $opportunity->package_id = $request->input('package_id');
        $opportunity->payment_id = $request->input('payment_id');
        $opportunity->package_start_date = $request->input('package_start_date');
        $opportunity->package_end_date = $request->input('package_end_date');
        $opportunity->listing_date = $request->input('listing_date');
        $opportunity->target_employer_id = $request->input('target_employer_id');
        $opportunity->target_pay_id = $request->input('target_pay_id');

        if (isset($opportunity->company_id)) {
            $company_id = $opportunity->company_id;
            $company = Company::where('id', $company_id)->first();
        }
        $opportunity->industry_id = $company->industry_id;
        $opportunity->sub_sector_id = $company->sub_sector_id;
        $opportunity->save();

        $opportunity->ref_no = 'SW'.$this->generate_numbers((int) $opportunity->id, 1, 5);
        $opportunity->update();

        if (isset($request->keyword_id)) {
            foreach ($request->keyword_id as $key => $value) {
                $keyword = new KeywordUsage;
                // $keyword->user_id = Auth()->user()->id;
                $keyword->type = "opportunity";
                $keyword->opportunity_id = $opportunity->id;
                $keyword->keyword_id = $value;
                $keyword->save();
            }
        }

        if (isset($request->job_skill_id)) {
            foreach ($request->job_skill_id as $key => $value) {
                $skill = new JobSkillOpportunity();
                // $skill->user_id = Auth()->user()->id;
                $skill->type = "opportunity";
                $skill->opportunity_id = $opportunity->id;
                $skill->job_skill_id = $value;
                $skill->save();
            }
        }

        //$opportunity->skills()->sync($request->input('job_skill_id'));

        return redirect()->route('company.home')
            ->with('success', 'Opportunity created successfully');
    }

    public function positionEdit(Opportunity $opportunity)
    {
        $skills = [];
        $keyword = [];
        foreach ($opportunity->jobSkillOpportunity as $value) {
            $skills[] = $value->job_skill_id;
        }

        foreach ($opportunity->mykeywords as $value) {
            $keyword[] = $value->keyword_id;
        }


        $data = [
            'data' => $opportunity,
            'keyword' => $keyword,
            'skills' => $skills,
            'company' => Company::find($opportunity->company_id),
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
            'target_pays' => TargetPay::all()
        ];

        return view('company.position_detail_edit', $data);
    }

    public function positionUpdate(Request $request, Opportunity $opportunity)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        // $input = $request->all();
        // $job = Opportunity::find($id);

        if (isset($request->supporting_document)) {
            $doc = $request->file('supporting_document');
            $fileName = 'job_support_doc_' . time() . '.' . $doc->guessExtension();
            $doc->move(public_path('uploads/job_support_docs'), $fileName);
            $opportunity->supporting_document = $fileName;
        }

        $opportunity->ref_no = $opportunity->ref_no ? $opportunity->ref_no : 'SW'.$this->generate_numbers((int) $opportunity->id, 1, 5);

        $opportunity->title = $request->input('title');
        $opportunity->company_id = $request->input('company_id');
        $opportunity->country_id = $request->input('country_id');
        // $opportunity->area_id = $request->input('area_id');
        // $opportunity->district_id = $request->input('district_id');
        $opportunity->job_title_id = $request->input('job_title_id');
        $opportunity->job_type_id = $request->input('job_type_id');
        $opportunity->job_experience_id = $request->input('job_experience_id');
        $opportunity->degree_level_id = $request->input('degree_level_id');
        $opportunity->carrier_level_id = $request->input('carrier_level_id');
        $opportunity->functional_area_id = $request->input('functional_area_id');
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

        // if($request->has('job_skill_id')){
        //    $opportunity->job_skill_id = implode(',', $request->input('job_skill_id'));
        // }
        $opportunity->is_featured = $request->input('is_featured');
        $opportunity->is_subscribed = $request->input('is_subscribed');
        // $opportunity->address = $request->input('address');
        $opportunity->contract_hour_id = $request->input('contract_hour_id');
        //$opportunity->keyword_id = $request->input('keyword_id');
        $opportunity->institution_id = $request->input('institution_id');
        $opportunity->language_id = $request->input('language_id');
        $opportunity->geographical_id = $request->input('geographical_id');
        $opportunity->management_id = $request->input('management_id');
        $opportunity->field_study_id = $request->input('field_study_id');
        $opportunity->qualification_id = $request->input('qualification_id');
        $opportunity->key_strnegth_id = $request->input('key_strnegth_id');
        $opportunity->specialist_id = $request->input('specialist_id');
        $opportunity->website_address = $request->input('website_address');
        // $opportunity->target_employer = $request->input('target_employer');
        $opportunity->package_id = $request->input('package_id');
        $opportunity->payment_id = $request->input('payment_id');
        $opportunity->package_start_date = $request->input('package_start_date');
        $opportunity->package_end_date = $request->input('package_end_date');
        $opportunity->listing_date = $request->input('listing_date');
        $opportunity->target_employer_id = $request->input('target_employer_id');
        $opportunity->target_pay_id = $request->input('target_pay_id');
        //Carbon::createFromFormat('m/d/Y', $request->listing_date)->format('Y-m-d');

        if (isset($opportunity->company_id)) {
            $company_id = $opportunity->company_id;
            $company = Company::where('id', $company_id)->first();
        }
        $opportunity->industry_id = $company->industry_id;
        $opportunity->sub_sector_id = $company->sub_sector_id;

        $opportunity->save();
        //$opportunity->skills()->sync($request->input('job_skill_id'));

        if (isset($request->keyword_id)) {
            $opportunity->jobKeywords()->detach();
            foreach ($request->keyword_id as $key => $value) {
                $keyword = new KeywordUsage;
                $keyword->type = "company";
                $keyword->opportunity_id = $opportunity->id;
                $keyword->keyword_id = $value;
                $keyword->save();
            }
        }

        if (isset($request->job_skill_id)) {
            $opportunity->skills()->detach();
            foreach ($request->job_skill_id as $key => $value) {
                $skill = new JobSkillOpportunity;
                // $skill->user_id = Auth()->user()->id;
                $skill->type = "opportunity";
                $skill->opportunity_id = $opportunity->id;
                $skill->job_skill_id = $value;
                $skill->save();
            }
        }

        $company = Auth::guard('company')->user();
        $data = [
            'company' => $company,
            'listings' => Opportunity::where('company_id', $company->id)->paginate(10),
        ];

        return redirect()->route('company.home')
            ->with('success', 'Updated successfully');
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