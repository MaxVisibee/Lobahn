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
use App\Models\EducationHistroy;
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
use App\Models\User;
use App\Models\SeekerViewed;
use App\Models\JobConnected;
use App\Models\SpecialityUsage;
use App\Models\TargetEmployerUsage;
use App\Traits\MultiSelectTrait;
use App\Traits\TalentScoreTrait;
use App\Traits\EmailTrait;

class CompanyController extends Controller
{
    use MultiSelectTrait;
    use TalentScoreTrait;
    use EmailTrait;

    public function __construct()
    {
        $this->middleware('company', ['except' => ['companyDetail', 'sendContactForm']]);
    }

    public function index()
    {
        $company = Auth::guard('company')->user();
        $data = [
            'company' => $company,
            'listings' => Opportunity::where('company_id', $company->id)->get(),
        ];

        return view('company.dashboard', $data);
    }

    public function company_listing()
    {
        $data['companies'] = Company::paginate(20);
        return view('company.listing')->with($data);
    }

    public function positionListing(Opportunity $opportunity)
    {
        $users = collect();
        $feature_users = collect();
        $scores = JobStreamScore::where('job_id',$opportunity->id)->get()->where('is_deleted',false);
        
        foreach($scores as $score)
        {
            if(floatval($score->jsr_percent)>=70.0 && $score->user->is_featured == true) $feature_users->push($score);

            elseif(floatval($score->jsr_percent)>=75.0) $users->push($score);
            
        }

        //return $users;

        $data = [
            'opportunity' => $opportunity,
            'feature_user_scores' => $feature_users,
            'user_scores' => $users,
        ];

        return view('company.position_listing', $data);
    }

    public function updateViewCount(Request $request)
    {
        $count = SeekerViewed::where('user_id', $request->user_id)->where('opportunity_id', $request->opportunity_id)->count();
        if ($count != 1) {
            $SeekerViewed = new SeekerViewed();
            $SeekerViewed->user_id = $request->user_id;
            $SeekerViewed->opportunity_id = $request->opportunity_id;
            $SeekerViewed->is_viewed = 'viewed';
            $SeekerViewed->count = 1;
            $SeekerViewed->save();
        } else {
            $SeekerViewed = SeekerViewed::where('user_id', $request->user_id)->where('opportunity_id', $request->opportunity_id)->first();
            $SeekerViewed->count += 1;
            $SeekerViewed->save();
        }
    }

    public function StaffDetail($opportunity_id,$user_id)
    {
        $num_profile_views = User::where('id', $user_id)->first()->num_profile_views;
        $num_clicks = User::where('id', $user_id)->first()->num_clicks;
        $num_impressions = User::where('id', $user_id)->first()->num_impressions;

        User::where('id', $user_id)->update([
            "num_profile_views" => $num_profile_views + 1,
            "num_clicks" => $num_clicks + 1,
            "num_impressions" => $num_impressions + 1
        ]);

        $type = "candidate";
        $data = [
            "opportunity_id" => $opportunity_id,
            "user" => User::where('id', $user_id)->first(),
            "countries" => $this->getCountryDetails($user_id, $type),
            "fun_areas" => $this->getFunctionalAreaDetails($user_id, $type),
            "job_types" => $this->getJobTypeDetails($user_id, $type),
            "industries" => $this->getIndustryDetails($user_id, $type),
            "languages" => $this->getLanguageDetails($user_id, $type),
            "employment_histories" => EmploymentHistory::where('user_id', $user_id)->get(),
            "education_histories" => EducationHistroy::where('user_id', $user_id)->get(),
        ];
        return view('company.staff_detail', $data);
    }

    public function clickToStaff(Request $request)
    {
        $num_clicks = User::where('id', $request->user_id)->first()->num_clicks;
        $num_impressions = User::where('id', $request->user_id)->first()->num_impressions;
        User::where('id', $request->user_id)->update([
            "num_clicks" => $num_clicks + 1,
            "num_impressions" => $num_impressions + 1
        ]);

        $count = SeekerViewed::where('user_id', $request->user_id)->where('opportunity_id', $request->opportunity_id)->count();
        if ($count != 1) {
            $SeekerViewed = new SeekerViewed();
            $SeekerViewed->user_id = $request->user_id;
            $SeekerViewed->opportunity_id = $request->opportunity_id;
            $SeekerViewed->is_viewed = 'viewed';
            $SeekerViewed->count = 1;
            $SeekerViewed->save();
        } else {
            $SeekerViewed = SeekerViewed::where('user_id', $request->user_id)->where('opportunity_id', $request->opportunity_id)->first();
            $SeekerViewed->count += 1;
            $SeekerViewed->save();
        }
    }

    public function connectToStaff(Request $request)
    {
        $candidate = User::where('id', $request->user_id)->first();
        $num_clicks = $candidate->num_clicks;
        $num_impressions = $candidate->num_impressions;
        $opportunity_id = $request->opportunity_id;
        

        User::where('id', $request->user_id)->update([
            "num_clicks" => $num_clicks + 1,
            "num_impressions" => $num_impressions + 1
        ]);

       
        $opportunity = Opportunity::where("id",$opportunity_id)->first();
        $is_exit = JobConnected::where('user_id', $request->user_id)->where('opportunity_id', $opportunity_id)->count();
        if ($is_exit == 0) {
            $jobConnected = new JobConnected();
            $jobConnected->opportunity_id = $opportunity_id;
            $jobConnected->user_id = $request->user_id;
            $jobConnected->is_connected = "connected";
            $jobConnected->employer_viewed = 1;
            $jobConnected->save();
            
            $this->connectToCandidate($candidate->email,$opportunity->company->name);
            $seeker_name = User::where('id', $request->user_id)->first()->name;
            return redirect()->back()->with('status', $seeker_name);
        }

        return redirect()->back();
    }

    public function shortlistToStaff(Request $request)
    {
        $num_clicks = User::where('id', $request->user_id)->first()->num_clicks;
        $num_impressions = User::where('id', $request->user_id)->first()->num_impressions;
        User::where('id', $request->user_id)->update([
            "num_clicks" => $num_clicks + 1,
            "num_impressions" => $num_impressions + 1
        ]);

        $opportunity_id = $request->opportunity_id;
        $opportunity = Opportunity::where('id',$opportunity_id)->first();
        $opportunity->shortlist += 1;
        $opportunity->save();
        
        $is_exit = JobConnected::where('user_id', $request->user_id)->where('opportunity_id', $opportunity_id)->count();
        if ($is_exit == 0) {
            $jobConnected = new JobConnected();
            $jobConnected->opportunity_id = $opportunity_id;
            $jobConnected->user_id = $request->user_id;
            $jobConnected->is_shortlisted = true;
            $jobConnected->employer_viewed = 1;
            $jobConnected->save();
        } else {
            JobConnected::where('user_id', $request->user_id)->where('opportunity_id', $opportunity_id)->update([
                "is_shortlisted" => true,
            ]);
        }
        // Email Sending
        $opportunity = Opportunity::where('id',$opportunity_id)->first();
        $email = User::where('id', $request->user_id)->first()->email;
        $company_name = $opportunity->company->company_name;
        $listed_date = $opportunity->listing_date;
        $title = $opportunity->title;
        $job_stream_score =JobStreamScore::where('user_id',$request->user_id)->where('job_id',$opportunity_id)->first();
        $job_stream_score!=NULL ? $jsr_score = $job_stream_score->jsr_score : $jsr_score = NULL;
        $this->shortlist($email,$company_name,$opportunity_id,$listed_date,$title,$jsr_score);

        return redirect()->back();
    }

    public function removeStaff(Request $request)
    {
        $num_clicks = User::where('id', $request->user_id)->first()->num_clicks;
        $num_impressions = User::where('id', $request->user_id)->first()->num_impressions;

        User::where('id', $request->user_id)->update([
            "num_clicks" => $num_clicks + 1,
            "num_impressions" => $num_impressions + 1
        ]);

        $staff = JobStreamScore::where('job_id', $request->opportunity_id)->where('user_id', $request->user_id)->first();
        $staff->is_deleted = true;
        $staff->save();
        return redirect()->back();
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
            'specialties' => Speciality::all(),
            'qualifications' => Qualification::all(),
            'target_pays' => TargetPay::all(),
            'people_managements' => MiscHelper::getNumEmployees(),
        ];

        return view('company.position_detail_add', $data);
    }

    public function positionStore(Request $request)
    {
        $request->validate([
            'title' => 'required',

        ]);

        $opportunity = new Opportunity();

        if (isset($request->supporting_document)) {
            $doc = $request->file('supporting_document');
            $fileName = 'job_support_doc_' . time() . '.' . $doc->guessExtension();
            $doc->move(public_path('uploads/job_support_docs'), $fileName);
            $opportunity->supporting_document = $fileName;
        }

        $opportunity->title = $request->title;
        $opportunity->ref_no = 'SW' . $this->generate_numbers((int) $opportunity->id, 1, 5);
        $opportunity->description = $request->description;
        $opportunity->highlight_1 = $request->highlight_1;
        $opportunity->highlight_2 = $request->highlight_2;
        $opportunity->highlight_3 = $request->highlight_3;
        $opportunity->expire_date = date('Y-m-d', strtotime($request->expire_date));
        $request->is_active == $request->is_active;
        $opportunity->company_id = $request->company_id;
        if (isset($request->management_level)) {
            $opportunity->management_id = CarrierLevel::where('carrier_level', $request->management_level)->first()->id;
            $opportunity->carrier_level_id = CarrierLevel::where('carrier_level', $request->management_level)->first()->id;
        }
        $opportunity->job_experience_id = $request->job_experience_id;
        $opportunity->degree_level_id = $request->degree_level_id;
        $opportunity->people_management = $request->people_management;
        $opportunity->target_salary = $request->salary_from;
        $opportunity->full_time_salary = $request->fulltime_amount;
        $opportunity->part_time_salary = $request->parttime_amount;
        $opportunity->freelance_salary = $request->freelance_amount;
        $opportunity->salary_from = $request->salary_from;
        $opportunity->salary_to = $request->salary_to;
        $opportunity->carrier_level_id = $request->carrier_level_id;

        $languageId = [];
        if(isset($request->language_1)){
            $languageId[] = $request->language_1;
        }

        if (isset($request->language_2)) {
            $languageId[] = $request->language_2;
        }

        if (isset($request->language_3)) {
            $languageId[] = $request->language_3;
        }

        $languageLevel = [];
        if (isset($request->level_1)) {
            $languageLevel[] = $request->level_1;
        }

        if (isset($request->level_2)) {
            $languageLevel[] = $request->level_2;
        }

        if (isset($request->level_3)) {
            $languageLevel[] = $request->level_3;
        }
        
        $opportunity->country_id         = json_encode($request->input('country_id'));
        $opportunity->job_type_id        = json_encode($request->input('job_type_id'));
        $opportunity->contract_hour_id   = json_encode($request->input('contract_hour_id'));
        $opportunity->keyword_id         = json_encode($request->input('keyword_id'));
        $opportunity->institution_id     = json_encode($request->input('institution_id'));
        $opportunity->language_id        = empty($languageId) ? null : json_encode($languageId);
        $opportunity->language_level     = empty($languageLevel) ? null : json_encode($languageLevel);
        $opportunity->geographical_id    = json_encode($request->input('geographical_id'));
        $opportunity->job_skill_id       = json_encode($request->input('job_skill_id'));
        $opportunity->field_study_id     = json_encode($request->input('field_study_id'));
        $opportunity->qualification_id   = json_encode($request->input('qualification_id'));
        $opportunity->key_strength_id    = json_encode($request->input('key_strength_id'));
        $opportunity->job_title_id       = json_encode($request->input('job_title_id'));
        $opportunity->functional_area_id = json_encode($request->input('functional_area_id'));
        $opportunity->target_employer_id = json_encode($request->input('target_employer_id'));
        $opportunity->industry_id = json_encode($request->input('industry_id'));
        $opportunity->specialist_id = json_encode($request->input('specialist_id'));

        if (isset($opportunity->company_id)) {
            $company_id = $opportunity->company_id;
            $company = Company::where('id', $company_id)->first();
        }
        
        $opportunity->sub_sector_id = $company->sub_sector_id;
        $opportunity->save();

        $type = "opportunity";
        $this->addJobTalentScore($opportunity);
        //$this->targetPayAction($type, $opportunity->id, $request->target_amount, $request->fulltime_amount, $request->parttime_amount, $request->freelance_amount);
        $this->languageAction($type, $opportunity->id, $request->language_1, $request->level_1, $request->language_2, $request->level_2, $request->language_3, $request->level_3);
        $this->action($type, $opportunity->id, $request->keyword_id, $request->country_id, $request->job_type_id, $request->contract_hour_id, $request->institution_id, $request->geographical_id, $request->job_skill_id, $request->field_study_id, $request->qualification_id, $request->key_strength_id, $request->job_title_id, $request->industry_id, $request->functional_area_id, $request->target_employer_id, $request->specialist_id);
               
        return redirect()->route('company.position', $opportunity->id);
    }

    public function positionDetail(Opportunity $opportunity)
    {
        $type = "opportunity";
        $job_id = $opportunity->id;
        $data = [
            'opportunity' => $opportunity,
            'target_pay' => TargetPay::where('opportunity_id', Auth::guard('company')->user()->id)->first(),
            'countries' => $this->getCountryDetails($job_id, $type),
            'job_types' => $this->getJobTypeDetails($job_id, $type),
            'job_shifts' => $this->getJobShiftDetails($job_id, $type),
            'keywords' => $this->getKeywordDetails($job_id, $type),
            'instituties' => $this->getInstituteDetails($job_id, $type),
            'languages' => $this->getLanguageDetails($job_id, $type),
            'geographicals' => $this->getGeographicalDetails($job_id, $type),
            'job_skills' => $this->getJobSkillDetails($job_id, $type),
            'study_fields' => $this->getStudyFielddetails($job_id, $type),
            'qualifications' => $this->getQualificationDetails($job_id, $type),
            'key_strengths' => $this->getKeyStrengthDetails($job_id, $type),
            'job_titles' => $this->getJobtitleDetails($job_id, $type),
            'industries' => $this->getIndustryDetails($job_id, $type),
            'fun_areas' => $this->getFunctionalAreaDetails($job_id, $type),
            'target_employers' => TargetEmployerUsage::where('opportunity_id', $job_id)->get(),
            'specialties' => SpecialityUsage::where('opportunity_id', $job_id)->get(),
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
            'target_pay' => TargetPay::where('opportunity_id', $job_id)->first(),
            'countries'  => Country::all(),
            'country_selected' => $this->getCountries($job_id, $type),
            'job_types' => JobType::all(),
            'job_type_selected' => $this->getJobTypes($job_id, $type),
            'job_shifts' => JobShift::all(),
            'job_shift_selected' => $this->getJobShifts($job_id, $type),
            'keywords'  => Keyword::all(),
            'keyword_selected' => $this->getKeywords($job_id, $type),
            'keyword_selected_detail' => $this->getKeywordDetails($job_id, $type),
            'carriers'   => CarrierLevel::all(),
            'job_exps' => JobExperience::all(),
            'degree_levels'  => DegreeLevel::all(),
            'institutions' => Institution::all(),
            'institute_selected' => $this->getInstitutes($job_id, $type),
            'languages'  => Language::all(),
            'user_language' => $this->getLanguages($job_id, $type),
            'geographicals'  => Geographical::all(),
            'geographical_selected' => $this->getGeographicals($job_id, $type),
            'people_managements' => MiscHelper::getNumEmployees(),
            'job_skills' => JobSkill::all(),
            'job_skill_selected' => $this->getJobSkills($job_id, $type),
            'study_fields' => StudyField::all(),
            'study_field_selected' => $this->getStudyFields($job_id, $type),
            'qualifications' => Qualification::all(),
            'qualification_selected' => $this->getQualifications($job_id, $type),
            'key_strengths' => KeyStrength::all(),
            'key_strength_selected' => $this->getKeyStrengths($job_id, $type),
            'job_titles' => JobTitle::all(),
            'job_title_selected' => $this->getJobtitles($job_id, $type),
            'industries' => Industry::all(),
            'industry_selected' => $this->getIndustries($job_id, $type),
            'fun_areas'  => FunctionalArea::all(),
            'fun_area_selected' => $this->getFunctionalAreas($job_id, $type),
            'companies' => Company::all(),
            'target_employer_selected' => $this->getTargetEmployer($job_id, $type),
            'specialties' => Speciality::all(),
            'specialty_selected' => $this->getSpecialties($job_id, $type),
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
        
        if(isset($request->management_level)) {
            $opportunity->management_id = CarrierLevel::where('carrier_level', $request->management_level)->first()->id;
            $opportunity->carrier_level_id = CarrierLevel::where('carrier_level', $request->management_level)->first()->id;
        }

        if (isset($request->company_name)) {
            $opportunity->company_id = Company::where('company_name', $request->company_name)->first()->id;
        }

        if (isset($request->year)) {
            $opportunity->job_experience_id = JobExperience::where('job_experience', $request->year)->first()->id;
        }

        if (isset($request->degree_level)) {
            $opportunity->degree_level_id = DegreeLevel::where('degree_name', $request->degree_level)->first()->id;
        }

        $opportunity->description = $request->description;
        $opportunity->expire_date = date('Y-m-d', strtotime($request->expire_date));
        $request->is_active == "Open" ?  $opportunity->is_active = true : $opportunity->is_active = false;
        $opportunity->people_management = $request->people_management;
        $opportunity->target_salary = $request->salary_from;
        $opportunity->full_time_salary = $request->fulltime_amount;
        $opportunity->part_time_salary = $request->parttime_amount;
        $opportunity->freelance_salary = $request->freelance_amount;
        $opportunity->salary_from = $request->salary_from;
        $opportunity->salary_to = $request->salary_to;

        $languageId = [];
        if (isset($request->language_1)) {
            $languageId[] = $request->language_1;
        }

        if (isset($request->language_2)) {
            $languageId[] = $request->language_2;
        }

        if (isset($request->language_3)) {
            $languageId[] = $request->language_3;
        }

        $languageLevel = [];
        if (isset($request->level_1)) {
            $languageLevel[] = $request->level_1;
        }

        if (isset($request->level_2)) {
            $languageLevel[] = $request->level_2;
        }

        if (isset($request->level_3)) {
            $languageLevel[] = $request->level_3;
        }

        $opportunity->country_id         = json_encode($request->input('countries'));
        $opportunity->job_type_id        = json_encode($request->input('job_types'));
        $opportunity->contract_hour_id   = json_encode($request->input('job_shifts'));
        $opportunity->keyword_id         = json_encode($request->input('keywords'));
        $opportunity->institution_id     = json_encode($request->input('institutions'));
        $opportunity->language_id        = empty($languageId) ? null : json_encode($languageId);
        $opportunity->language_level     = empty($languageLevel) ? null : json_encode($languageLevel);
        $opportunity->geographical_id    = json_encode($request->input('geographicals'));
        $opportunity->job_skill_id       = json_encode($request->input('job_skills'));
        $opportunity->field_study_id     = json_encode($request->input('study_fields'));
        $opportunity->qualification_id   = json_encode($request->input('qualifications'));
        $opportunity->key_strength_id    = json_encode($request->input('key_strengths'));
        $opportunity->job_title_id       = json_encode($request->input('job_titles'));
        $opportunity->functional_area_id = json_encode($request->input('fun_areas'));
        $opportunity->target_employer_id = json_encode($request->input('target_employer_id'));
        $opportunity->industry_id = json_encode($request->input('industries'));
        $opportunity->specialist_id = json_encode($request->input('specialist_id'));

        if (isset($opportunity->company_id)) {
            $company_id = $opportunity->company_id;
            $company = Company::where('id', $company_id)->first();
        }

        $opportunity->sub_sector_id = $company->sub_sector_id;

        $opportunity->save();
        $type = "opportunity";

        $this->addJobTalentScore($opportunity);
        //$this->targetPayAction($type, $opportunity->id, $request->target_pay, $request->fulltime_amount, $request->parttime_amount, $request->freelance_amount);
        $this->languageAction($type, $opportunity->id, $request->language_1, $request->level_1, $request->language_2, $request->level_2, $request->language_3, $request->level_3);
        $this->action($type, $opportunity->id, $request->keywords, $request->countries, $request->job_types, $request->job_shifts, $request->institutions, $request->geographicals, $request->job_skills, $request->study_fields, $request->qualifications, $request->key_strengths, $request->job_titles, $request->industries, $request->fun_areas, $request->target_employer_id, $request->specialist_id);
        return redirect()->route('company.position', $opportunity->id);
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
        return view('company.settings', $data);
    }

    public function updateSetting(Request $request)
    {
        $company = Company::where('id', Auth::guard('company')->user()->id)->first();
        switch ($request->name) {
            case "new_opportunities":
                $flag = $company->new_opportunities;
                break;
            case "change_of_status":
                $flag = $company->change_of_status;
                break;
            case "connection":
                $flag = $company->connection;
                break;
            case "lobahn_connect":
                $flag = $company->lobahn_connect;
                break;
        }

        Company::where('id', Auth::guard('company')->user()->id)->update([
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
        $company = Auth::guard('company')->user();
        $data = [
            'position_list' => Opportunity::where('company_id', $company->id)->count(),
            'impressions' => Company::find($company->id)->total_impressions,
            'total_clicks' => Company::find($company->id)->total_clicks,
            'total_received_profiles' => Company::find($company->id)->total_received_profiles,
            'total_shortlists' => Company::find($company->id)->total_shortlists,
            'total_connections' => Company::find($company->id)->total_connections,

        ];
        return view('company.activity', $data);
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

    public function generate_numbers($start, $count, $digits)
    {

        for ($n = $start; $n < $start + $count; $n++) {

            $result = str_pad($n, $digits, "0", STR_PAD_LEFT);
        }
        return $result;
    }
}