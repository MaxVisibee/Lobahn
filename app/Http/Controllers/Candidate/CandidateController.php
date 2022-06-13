<?php

namespace App\Http\Controllers\Candidate;

use Session;
use Image;
use Response;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Partner;
use App\Models\NewsEvent;
use App\Models\Country;
use App\Models\Company;
use App\Models\Payment;
use App\Models\Opportunity;
use App\Models\JobViewed;
use App\Models\CarrierLevel;
use App\Models\JobShift;
use App\Models\JobConnected;
use App\Models\Keyword;
use App\Models\KeywordUsage;
use App\Models\DegreeLevel;
use App\Models\Geographical;
use App\Models\FunctionalArea;
use App\Models\Industry;
use App\Models\StudyField;
use App\Models\JobTitle;
use App\Models\Language;
use App\Models\LanguageUsage;
use App\Models\JobSkill;
use App\Models\JobType;
use App\Models\JobExperience;
use App\Models\KeyStrength;
use App\Models\Qualification;
use App\Models\Institution;
use App\Models\JobStreamScore;
use App\Models\ProfileCv;
use App\Models\EducationHistroy;
use App\Models\EmploymentHistory;
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
use App\Models\QualificationUsage;
use App\Models\Speciality;
use App\Models\TargetCompany;
use App\Models\LanguageLevel;
use App\Models\SpecialityUsage;
use App\Models\StudyFieldUsage;
use App\Models\CompanyActivity;
use App\Models\SubSector;
use App\Models\Notification;
use App\Models\TargetEmployerUsage;
use App\Models\PeopleManagementLevel;
use App\Traits\MultiSelectTrait;
use App\Traits\TalentScoreTrait;
use App\Traits\EmailTrait;
use App\Helpers\MiscHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CandidateController extends Controller
{
    use MultiSelectTrait;
    use EmailTrait;
    use TalentScoreTrait;
    use AuthenticatesUsers;

    public function optimizeProfile()
    {
        if(Auth::guard('company')->user() || !Auth::check()) return redirect()->back();
    
        $data =[
            'contract_hours' => JobShift::all(),
            'keywords' => Keyword::all(),
            'carriers'   => CarrierLevel::all(),
            'years' => JobExperience::all(),
            'education_levels' => DegreeLevel::all(),
            'institutions' => Institution::all(),
            'languages' => Language::all(),
            'georophical_experiences' => Geographical::all(),
            'people_management_levels'=>PeopleManagementLevel::all(),
            'job_skills' => JobSkill::all(),
            'study_fields' => StudyField::all(),
            'qualifications' => Qualification::all(),
            'specialties' => Speciality::all(),
        ];
        return view('auth.career_optimized',$data);
    }

    public function saveOptimizedProfile(Request $request)
    {
        $candidate_id = Auth::user()->id;
        $candidate = User::where('id',$candidate_id)->first();

        if(!is_null($request->contract_hour_id)) 
        {
            $contract_hour_id = explode(",",$request->contract_hour_id);
            $candidate->contract_hour_id = json_encode($contract_hour_id);
        } else $contract_hour_id = $candidate->contract_hour_id = NULL;


        if(!is_null($request->keyword_id)) 
        {
            $keyword_id = explode(",",$request->keyword_id);
            $candidate->keyword_id = json_encode($keyword_id);
        } else $keyword_id = $candidate->keyword_id = NULL;

        if(!is_null($request->custom_keyword_id)) 
        {
            $custom_keyword_id = explode(",",$request->custom_keyword_id);
            $candidate->custom_keyword_id = json_encode($custom_keyword_id);
        } else $custom_keyword_id = $candidate->custom_keyword_id = NULL;

        $candidate->management_level_id = $request->carrier;
        $candidate->experience_id = $request->job_experience;           ## years
        $candidate->education_level_id = $request->education_level;

        if(!is_null($request->institution_id)) 
        {
            $institution_id = explode(",",$request->institution_id);
            $candidate->institution_id = json_encode($institution_id);
        } else  $institution_id = $candidate->institution_id = NULL;

        if(!is_null($request->custom_institution_id)) 
        {
            $custom_institution_id = explode(",",$request->custom_institution_id);
            $candidate->custom_institution_id = json_encode($custom_institution_id);
        } else  $custom_institution_id = $candidate->custom_institution_id = NULL;

        if(!is_null($request->language_id)) 
        {
            $language_id = explode(",",$request->language_id);
            $candidate->language_id = json_encode($language_id);
        } else $language_id = $candidate->language_id = NULL;

        if(!is_null($request->geographical_id)) 
        {
            $geographical_id = explode(",",$request->geographical_id);
            $candidate->geographical_id = json_encode($geographical_id);
        } else  $geographical_id = $candidate->geographical_id = NULL;

        $candidate->people_management_id = $request->management_level;

        if(!is_null($request->job_skill_id)) 
        {
            $job_skill_id = explode(",",$request->job_skill_id);
            $candidate->skill_id = json_encode($job_skill_id);
        } else  $job_skill_id = $candidate->skill_id = NULL;

        if(!is_null($request->custom_skill_id)) 
        {
            $custom_skill_id = explode(",",$request->custom_skill_id);
            $candidate->skill_id = json_encode($custom_skill_id);
        } else  $custom_skill_id = $candidate->custom_skill_id = NULL;

        if(!is_null($request->field_study_id)) 
        {
            $field_study_id = explode(",",$request->field_study_id);
            $candidate->field_study_id = json_encode($field_study_id);
        } else  $field_study_id= $candidate->field_study_id = NULL;

        if(!is_null($request->custom_field_study_id)) 
        {
            $custom_field_study_id = explode(",",$request->custom_field_study_id);
            $candidate->custom_field_study_id = json_encode($custom_field_study_id);
        } else  $custom_field_study_id= $candidate->custom_field_study_id = NULL;

        if(!is_null($request->qualification_id)) 
        {
            $qualification_id = explode(",",$request->qualification_id);
            $candidate->qualification_id = json_encode($qualification_id);
        } else  $qualification_id = $candidate->qualification_id = NULL;

        if(!is_null($request->custom_qualification_id)) 
        {
            $custom_qualification_id = explode(",",$request->custom_qualification_id);
            $candidate->custom_qualification_id = json_encode($custom_qualification_id);
        } else  $custom_qualification_id = $candidate->custom_qualification_id = NULL;

        $candidate->save();
        
        $type = "candidate";
        if(!is_null($request->language_id))
        {
            LanguageUsage::where('user_id',$candidate->id)->delete();
            foreach($language_id as $id) LanguageUsage::create([ 'user_id' => $candidate->id,'language_id' => $id]);
        } 
        //json_decode($candidate->contract_term_id)
        $this->action($type,$candidate->id,$keyword_id,[],json_decode($candidate->contract_term_id),$contract_hour_id,$institution_id,$geographical_id,$job_skill_id,$field_study_id,$qualification_id,[],json_decode($candidate->position_title_id),json_decode($candidate->industry_id),json_decode($candidate->functional_area_id),json_decode($candidate->target_employer_id),[],[]);
        $this->addTalentScore($candidate);

        return redirect()->route('candidate.dashboard');
    }

    public function dashboard()
    { 
        $partners = Partner::all();
        $companies = Company::all();
        $events = NewsEvent::take(3)->get();
        $seekers = User::orderBy('created_at', 'desc')->take(3)->get();
        $user = auth()->user();
        $opportunities_with_date = collect();
        $feature_opportunities_with_date = collect();

        $opportunities_with_jsr = collect();
        $feature_opportunities_with_jsr = collect();

        $opportunities_with_jsr_reverse = collect();
        $feature_opportunities_with_jsr_reverse = collect();

        $opportunities_with_status = collect();
        $feature_opportunities_with_status = collect();

        // $jsr_sort = $jsr_resort = $status_sort = $date_sort = false;
            $jsr_scores = JobStreamScore::where('is_deleted',false)
                      ->where('user_id',Auth()->user()->id)
                      ->orderBy('jsr_percent','DESC')->get();
      
            $jsr_reverse_scores = JobStreamScore::where('is_deleted',false)
                      ->where('user_id',Auth()->user()->id)
                      ->orderBy('jsr_percent','ASC')->get();
        
       
           
            $status_scores = JobStreamScore::where('is_deleted',false)
                      ->where('user_id',Auth()->user()->id)
                  ->orderByRaw("FIELD(is_active , 'true') ASC")->get();
        
       
            $date_scores = JobStreamScore::where('is_deleted',false)
                      ->where('user_id',Auth()->user()->id)
                      ->latest('listing_date')->get();

        foreach($date_scores as $datescore)
        {
            if(floatval($datescore->jsr_percent)>=70.0 && $datescore->company->is_featured == true) $feature_opportunities_with_date->push($datescore);
            elseif(floatval($datescore->jsr_percent)>=80.0) $opportunities_with_date->push($datescore);  
        }

        foreach($status_scores as $statuscore)
        {
            if(floatval($statuscore->jsr_percent)>=70.0 && $statuscore->company->is_featured == true) $feature_opportunities_with_status->push($statuscore);
            elseif(floatval($statuscore->jsr_percent)>=80.0) $opportunities_with_status->push($statuscore);  
        }

        foreach($jsr_reverse_scores as $reversecore)
        {
            if(floatval($reversecore->jsr_percent)>=70.0 && $reversecore->company->is_featured == true) $feature_opportunities_with_jsr_reverse->push($reversecore);
            elseif(floatval($reversecore->jsr_percent)>=80.0) $opportunities_with_jsr_reverse->push($reversecore);  
        }

        foreach($jsr_scores as $jsrscore)
        {
            if(floatval($jsrscore->jsr_percent)>=70.0 && $jsrscore->company->is_featured == true) $feature_opportunities_with_jsr->push($jsrscore);
            elseif(floatval($jsrscore->jsr_percent)>=80.0) $opportunities_with_jsr->push($jsrscore);  
        }

        $data = [
            'user'=> $user,
            'seekers' => $seekers,
            'partners' => $partners,
            'events' => $events,
            'feature_opportunities_with_jsr' => $feature_opportunities_with_jsr,
            'opportunities_with_jsr' => $opportunities_with_jsr,

            'feature_opportunities_with_jsr_reverse' => $feature_opportunities_with_jsr_reverse,
            'opportunities_with_jsr_reverse' => $opportunities_with_jsr_reverse,

            'feature_opportunities_with_status' => $feature_opportunities_with_status,
            'opportunities_with_status' => $opportunities_with_status,

            'feature_opportunities_with_date' => $feature_opportunities_with_date,
            'opportunities_with_date' => $opportunities_with_date,

            'fun_selected' => array_unique($this->getFunctionalAreas($user->id,"candidate")),
        ];
        return view('candidate.dashboard',$data);
    }

    public function profile()
    {
        $user = auth()->user();
        $type = "candidate";
        $data = [
            'user' => $user,
            'cvs' => ProfileCV::where('user_id',Auth()->user()->id)->get(),
            'employment_histories' => EmploymentHistory::where('user_id',Auth()->user()->id)->get(),
            'educations' => EducationHistroy::where('user_id',Auth()->user()->id)->get(),
            'countries' => $this->getCountryDetails($user->id,$type),
            'job_types' => $this->getJobTypeDetails($user->id,$type),
            'job_shifts' => $this->getJobShiftDetails($user->id,$type),
            'keywords' => $this->getKeywordDetails($user->id,$type),
            'instituties' =>$this->getInstituteDetails($user->id,$type),
            'languages' => $this->getLanguageDetails($user->id,$type),
            'geographicals' => $this->getGeographicalDetails($user->id,$type),
            'job_skills' => $this->getJobSkillDetails($user->id,$type),
            'study_fields' => $this->getStudyFielddetails($user->id,$type),
            'qualifications' => $this->getQualificationDetails($user->id,$type),
            'key_strengths' => $this->getKeyStrengthDetails($user->id,$type),
            'job_titles' => $this->getJobtitleDetails($user->id,$type),
            'industries' => $this->getIndustryDetails($user->id,$type),
            'sub_sectors' => $this->getSubSectorsDetails($user->id, $type),
            'fun_areas' => $this->getFunctionalAreaDetails($user->id,$type),
            'target_employers' => $this->getTargetEmployerDetails($user->id,$type),
            'specialties' => SpecialityUsage::where('user_id', Auth()->user()->id)->get(),
            'specialty_selected' => $this->getSpecialties($user->id, $type),
        ];
        return view('candidate.profile',$data);
    }

    public function edit()
    {   
        $user = Auth()->user();

        //return $user->custom_position_title_id;
        $type = "candidate";
        $data = [
            'user' => $user,
            'educations' => EducationHistroy::where('user_id',Auth()->user()->id)->get(),
            'cvs' => ProfileCV::where('user_id',Auth()->user()->id)->get(),
            'employment_histories' => EmploymentHistory::where('user_id',Auth()->user()->id)->get(),
            'employment_histories_count'=>EmploymentHistory::where('user_id',Auth()->user()->id)->count(),
            'companies' => Company::all(),
            'countries'  => Country::all(),
            'country_selected' => $this->getCountries($user->id,$type),
            'job_types' => JobType::all(),
            'job_type_selected' => $this->getJobTypes($user->id,$type),
            'job_shifts' => JobShift::all(),
            'job_shift_selected' => $this->getJobShifts($user->id,$type),
            'keywords'  => Keyword::all(),
            'keyword_selected' => $this->getKeywords($user->id,$type),
            'keyword_selected_detail' => $this->getKeywordDetails($user->id,$type),
            'carriers'   => CarrierLevel::all(),
            'job_exps' => JobExperience::all(),
            'degrees'  => DegreeLevel::all(),
            'institutions' => Institution::all(),
            'institute_selected' =>$this->getInstitutes($user->id,$type),
            'languages'  => Language::all(),
            'language_levels' => LanguageLevel::all(),
            'user_language' => $this->getLanguages($user->id,$type),
            'usages' =>$user->languageUsage,
            'geographicals'  => Geographical::all(),
            'geographical_selected' => $this->getGeographicals($user->id,$type),
            'people_management_levels'=> PeopleManagementLevel::all(),
            'job_skills' => JobSkill::all(),
            'job_skill_selected' => $this->getJobSkills($user->id,$type),
            'study_fields' => StudyField::all(),
            'study_field_selected' => $this->getStudyFields($user->id,$type),
            'qualifications' => Qualification::all(),
            'qualification_selected' => $this->getQualifications($user->id,$type),
            'key_strengths' => KeyStrength::all(),
            'key_strength_selected' => $this->getKeyStrengths($user->id,$type),
            'job_titles' => JobTitle::all(),
            'job_title_selected' => $this->getJobtitles($user->id,$type),
            'industries' => Industry::all(),
            'industry_selected' => $this->getIndustries($user->id,$type),
            'sub_sectors' => SubSector::all(),
            'sub_sector_selected' => $this->getSubSector($user->id, $type),
            'fun_areas'  => FunctionalArea::all(),
            'fun_area_selected' => $this->getFunctionalAreas($user->id,$type),
            'specialties' => Speciality::all(),
            'specialty_selected' => $this->getSpecialties($user->id, $type),
            'target_companies' => TargetCompany::all(),
            'target_employer_selected' => $this->getTargetEmployers($user->id,$type),
        ];

        return view('candidate.profile-edit',$data);
    }

    public function updateProfile(Request $request)
    {   
        $candidate = User::where('id',Auth()->user()->id)->first();
        $request->language_id = explode (",", $request->language_id); 
        $request->language_level =explode (",", $request->language_level);
        //  Matching Factors 
        // if(!is_null($request->country_id)) 
        // {
        //     $country_id = explode(",",$request->country_id);
        //     $candidate->country_id = json_encode($country_id);
        // } else  $country_id = $candidate->country_id = NULL;

        $candidate->country_id = $request->country_id;
        if(!is_null($request->industry_id)) 
        {
            $industry_id = explode(",",$request->industry_id);
            $candidate->industry_id = json_encode($industry_id);
        } else  $industry_id = $candidate->industry_id = NULL;

        if(!is_null($request->custom_industry_id)) 
        {
            if($request->custom_industry_id != "on")
            {
                $custom_industry_id = explode(",",$request->custom_industry_id);
                $candidate->custom_industry_id = json_encode($custom_industry_id);
            }
        } else  $custom_industry_id = $candidate->custom_industry_id = NULL;

        if(!is_null($request->functional_area_id)) 
        {
            $functional_area_id = explode(",",$request->functional_area_id);
            $candidate->functional_area_id = json_encode($functional_area_id);
        } else  $functional_area_id = $candidate->functional_area_id = NULL;

        if(!is_null($request->custom_functional_area_id)) 
        {
            if($request->custom_functional_area_id != "on")
            {
                $custom_functional_area_id = explode(",",$request->custom_functional_area_id);
                $candidate->custom_functional_area_id = json_encode($custom_functional_area_id);
            }
        } else  $custom_functional_area_id = $candidate->custom_functional_area_id = NULL;

        if(!is_null($request->job_type_id)) 
        {
            $job_type_id = explode(",",$request->job_type_id);
            $candidate->contract_term_id = json_encode($job_type_id);
        } else  $job_type_id = $candidate->contract_term_id = NULL;

        if(!is_null($request->job_title_id)) 
        {
            $job_title_id = explode(",",$request->job_title_id);
            $candidate->position_title_id = json_encode($job_title_id);
        } else  $job_title_id = $candidate->position_title_id = NULL;

        if(!is_null($request->custom_job_title_id)) 
        {
            if($request->custom_job_title_id != "on")
            {
                $custom_job_title_id = explode(",",$request->custom_job_title_id);
                $candidate->custom_position_title_id = json_encode($custom_job_title_id);
            }
        } else  $custom_job_title_id = $candidate->custom_position_title_id = NULL;


        if(!is_null($request->keyword_id)) 
        {
            $keyword_id = explode(",",$request->keyword_id);
            $candidate->keyword_id = json_encode($keyword_id);
        } else $keyword_id = $candidate->keyword_id = NULL;

        if(!is_null($request->custom_keyword_id)) 
        {
            if($request->custom_keyword_id !="on")
            {
                $custom_keyword_id = explode(",",$request->custom_keyword_id);
                $candidate->custom_keyword_id = json_encode($custom_keyword_id);
            }
        } else $custom_keyword_id = $candidate->custom_keyword_id = NULL;
        
        if(!is_null($request->job_skill_id)) 
        {
            $job_skill_id = explode(",",$request->job_skill_id);
            $candidate->skill_id = json_encode($job_skill_id);
        } else  $job_skill_id = $candidate->skill_id = NULL;

        if(!is_null($request->custom_job_skill_id)) 
        {
            if($request->custom_job_skill_id != "on")
            {
                $custom_job_skill_id = explode(",",$request->custom_job_skill_id);
                $candidate->custom_skill_id = json_encode($custom_job_skill_id);
            }
        } else  $custom_job_skill_id = $candidate->custom_skill_id = NULL;
        
        if(!is_null($request->geographical_id)) 
        {
            $geographical_id = explode(",",$request->geographical_id);
            $candidate->geographical_id = json_encode($geographical_id);
        } else  $geographical_id = $candidate->geographical_id = NULL;

        if(!is_null($request->institution_id)) 
        {
            $institution_id = explode(",",$request->institution_id);
            $candidate->institution_id = json_encode($institution_id);
        } else  $institution_id = $candidate->institution_id = NULL;

        if(!is_null($request->custom_institution_id)) 
        {
            if($request->custom_institution_id != "on")
            {   
                $custom_institution_id = explode(",",$request->custom_institution_id);
                $candidate->custom_institution_id = json_encode($custom_institution_id);
            }
        } else  $custom_institution_id = $candidate->custom_institution_id = NULL;
        
        if(!is_null($request->field_study_id)) 
        {
            $field_study_id = explode(",",$request->field_study_id);
            $candidate->field_study_id = json_encode($field_study_id);
        } else  $field_study_id= $candidate->field_study_id = NULL;

        if(!is_null($request->custom_field_study_id)) 
        {
            if($request->custom_field_study_id != "on")
            {
                $custom_field_study_id = explode(",",$request->custom_field_study_id);
                $candidate->custom_field_study_id = json_encode($custom_field_study_id);
            }
        } else  $custom_field_study_id= $candidate->custom_field_study_id = NULL;
        
        if(!is_null($request->qualification_id)) 
        {
            $qualification_id = explode(",",$request->qualification_id);
            $candidate->qualification_id = json_encode($qualification_id);
        } else  $qualification_id = $candidate->qualification_id = NULL;

        if(!is_null($request->custom_qualification_id)) 
        {
            if($request->custom_qualification_id != "on")
            {
                $custom_qualification_id = explode(",",$request->custom_qualification_id);
                $candidate->custom_qualification_id = json_encode($custom_qualification_id);
            }
        } else  $custom_qualification_id = $candidate->custom_qualification_id = NULL;
        
        if(!is_null($request->key_strength_id)) 
        {
            $key_strength_id = explode(",",$request->key_strength_id);
            $candidate->key_strength_id = json_encode($key_strength_id);
        } else  $key_strength_id = $candidate->key_strength_id = NULL;

        if(!is_null($request->custom_key_strength_id)) 
        {
            if($request->custom_key_strength_id != "on")
            {
                $custom_key_strength_id = explode(",",$request->custom_key_strength_id);
                $candidate->custom_key_strength_id = json_encode($custom_key_strength_id);
            }
        } else  $custom_key_strength_id = $candidate->custom_key_strength_id = NULL;
        
        if(!is_null($request->contract_hour_id)) 
        {
            $contract_hour_id = explode(",",$request->contract_hour_id);
            $candidate->contract_hour_id = json_encode($contract_hour_id);
        } else $contract_hour_id = $candidate->contract_hour_id = NULL;
        
        if(!is_null($request->specialist_id)) 
        {
            $specialist_id = explode(",",$request->specialist_id);
            $candidate->specialist_id = json_encode($specialist_id);
        } else $specialist_id = $candidate->specialist_id = NULL;
    
        if(!is_null($request->target_employer_id)) 
        {
            $target_employer_id = explode(",",$request->target_employer_id);
            $candidate->target_employer_id = json_encode($target_employer_id);
        } else  $target_employer_id = $candidate->target_employer_id = NULL;

        if(!is_null($request->custom_target_employer_id)) 
        {
            if($request->custom_target_employer_id!= "on")
            {
                $custom_target_employer_id = explode(",",$request->custom_target_employer_id);
                $candidate->custom_target_employer_id = json_encode($custom_target_employer_id);
            }
        } else  $custom_target_employer_id = $candidate->custom_target_employer_id = NULL;

        $candidate->experience_id = $request->job_experience_id;
        $candidate->management_level_id = $request->management_level;
        $candidate->people_management_id = $request->people_management_level;
        $candidate->education_level_id = $request->degree_level_id;
        $candidate->full_time_salary = $request->fulltime_amount;
        $candidate->part_time_salary = $request->parttime_amount;
        $candidate->freelance_salary = $request->freelance_amount;
        $candidate->target_salary = $request->target_salary;

        if(count($request->language_id) != 0) $candidate->language_id = json_encode($request->language_id);
        if(count($request->language_level) != 0) $candidate->language_level = json_encode($request->language_level);
        $type = "candidate";
        if( $request->language_id[0] !=""){
        $this->languageAction($type,$candidate->id,$request->language_id,$request->language_level); #to save language usage table
        }
        
        $candidate->save();
        $this->action($type, $candidate->id, $keyword_id, [], $job_type_id, $contract_hour_id, $institution_id, $geographical_id, $job_skill_id, $field_study_id, $qualification_id, $key_strength_id, $job_title_id, $industry_id, $functional_area_id, $target_employer_id, $specialist_id, NULL);
        $this->addTalentScore($candidate);
        return redirect()->back()->with('success',"YOUR MATCHING FACTORS ARE SAVED !");
    }

    public function clickToCompany(Request $request)
    {
        $opportunity = Opportunity::where('id',$request->opportunity_id)->first();
        CompanyActivity::create(['company_id'=>$opportunity->company->id,'connection'=>true]);
        CompanyActivity::create(['company_id'=>$opportunity->company->id,'impression'=>true]);
        CompanyActivity::create(['company_id'=>$opportunity->company->id,'click'=>true]);
        $count = JobViewed::where('user_id',Auth()->user()->id)->where('opportunity_id',$request->opportunity_id)->count();
        if($count != 1)
        {
            $jobViewed = new JobViewed();
            $jobViewed->user_id = Auth()->user()->id;
            $jobViewed->opportunity_id = $request->opportunity_id;
            $jobViewed->is_viewed = 'viewed';
            $jobViewed->count = 1;
            $jobViewed->save();
        }
        else{
            $jobViewed = JobViewed::where('user_id',Auth()->user()->id)->where('opportunity_id',$request->opportunity_id)->first();
            $jobViewed->count += 1;
            $jobViewed->save(); 
        }
    }

    public function opportunity($id)
    {
        $opportunity = Opportunity::where('id',$id)->first();
        $opportunity->impression += 1;
        $opportunity->click += 1;
        $opportunity->save();

        $type = "opportunity";
        $job_id = $opportunity->id;
        $count = JobConnected::where('user_id', Auth()->user()->id)->where('opportunity_id',$id)->count();
        ($count == 1) ? $is_connected = true : $is_connected = false;
        $data = [
            'opportunity' => $opportunity,
            'is_connected' => $is_connected,
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
            'fun_areas' => $this->getFunctionalAreaDetails($job_id, $type)
        ];

        $view_count = JobViewed::where('user_id',Auth()->user()->id)->where('opportunity_id',$opportunity->id)->count();
        if($view_count != 1)
        {
            $jobViewed = new JobViewed();
            $jobViewed->user_id = Auth()->user()->id;
            $jobViewed->opportunity_id = $opportunity->id;
            $jobViewed->is_viewed = 'viewed';
            $jobViewed->count = 1;
            $jobViewed->save();
        }
        else{
            $jobViewed = JobViewed::where('user_id',Auth()->user()->id)->where('opportunity_id',$opportunity->id)->first();
            $jobViewed->count += 1;
            $jobViewed->save(); 
        }

        return view('candidate.opportunity',$data);
    }

    public function connect(Request $request)
    {
        
        $opportunity_id = $request->opportunity_id;
        $opportunity = Opportunity::where('id',$opportunity_id)->first();
        CompanyActivity::create(['company_id'=>$opportunity->company->id,'connection'=>true]);
        CompanyActivity::create(['company_id'=>$opportunity->company->id,'impression'=>true]);
        CompanyActivity::create(['company_id'=>$opportunity->company->id,'click'=>true]);
        
        $is_exit = JobConnected::where('user_id', Auth()->user()->id)->where('opportunity_id',$opportunity_id)->count();
        if($is_exit == 0)
        {   
            $jobConnected = new JobConnected();
            $jobConnected->opportunity_id = $opportunity_id;
            $jobConnected->corporate_id = $opportunity->company->id;
            $jobConnected->user_id = Auth()->user()->id;
            $jobConnected->is_connected = "connected";
            $jobConnected->employer_viewed = 0;
            $jobConnected->save();

            $user = Auth()->user();
            $user->num_sent_profiles += 1;
            $user->save();

            $email = $opportunity->company->email;
            $candidate_id = User::where('id',Auth()->user()->id)->first()->id;
            $candidate_name = User::where('id',Auth()->user()->id)->first()->name;
            $position_title = $opportunity->title;
            $job_stream_score =JobStreamScore::where('user_id',$request->user_id)->where('job_id',$opportunity_id)->first();
            $job_stream_score!=NULL ? $jsr_score = $job_stream_score->jsr_score : $jsr_score = NULL;
            $this->connectToCompany($email,$candidate_name,$position_title,$jsr_score,$opportunity_id,$candidate_id);
            return redirect()->back()->with('status',$opportunity->company->company_name);
        }
        return redirect()->back();
    }

    public function deleteOpportunity(Request $request)
    {
        $job = JobStreamScore::where('Job_id',$request->opportunity_id)->where('user_id',Auth::user()->id)->first();
        $job->is_deleted = true;
        $job->save();
        JobViewed::where('opportunity_id', $request->opportunity_id)->where('user_id',Auth::user()->id)->delete();
        return redirect()->route('candidate.dashboard');
    }


    public function company($id)
    {
        $company = Company::find($id);
        $data = [
            'company' => $company
        ];
        return view('candidate.company',$data);
    }

    public function setting()
    {
        $data =  [
            'user' =>  User::where('id',Auth()->user()->id)->first(),
        ];
        return view('candidate.setting',$data);
    }

    public function updateSetting(Request $request)
    {
        $user = User::where('id',Auth()->user()->id)->first();
        switch($request->name){
            case "new_opportunities": $flag = $user->new_opportunities; break;
            case "change_of_status": $flag = $user->change_of_status; break;
            case "connection": $flag = $user->connection; break;
            case "lobahn_connect": $flag = $user->lobahn_connect; break;
            case "auto_connect": $flag = $user->auto_connect; break;
            case "feature_member_display": $flag = $user->feature_member_display; break;
        }

        User::where('id',Auth()->user()->id)->update([
            $request->name => !$flag
        ]);
         
    }
    
    public function activity()
    {
        $user = auth()->user();
        $data = [
            'user' => $user, 
        ];
        return view('candidate.activity',$data);
    }

    public function account()
    {
        $user = auth()->user();
        $payments = Payment::where('user_id',$user->id)->paginate(10);
        $active_payments = Payment::where('user_id',$user->id)->where('status',1)->paginate(10);
        $data = [ 
            'user' => $user,
            'active_payments'=> $active_payments,
            'payments' => $payments
        ];
        return view('candidate.account',$data);
    }

    
    public function updatePassword(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'password' => 'required|min:8|confirmed'
        // ]);
        // if ($validator->fails()){
            //     return 'false';
        // }else{
        $user = User::find(Auth()->user()->id);
            $user->password = bcrypt($request->password);
            $user->password_updated_date = Carbon::now();
            $user->save();
            $date = $user->updated_at;
            //auth()->logout();
            //Session::put('success', 'YOUR PASSWORD IS UPDATED !');
            return response()->json(['status'=>'true','date'=>$date]);
        //}        
    }

    public function checkPassword(Request $request)
    {
        $user = Auth::user();
        $password = $request->password;
        if(Hash::check($password, $user->password)) {
        return response()->json(['status'=>'true',]);
        } else {
            return response()->json(['status'=>'false']);
        }
    }
    

    public function keywords(Request $request)
    {
        KeywordUsage::where('user_id',Auth()->user()->id)->delete();
        foreach($request->keywords as $key => $value)
        {
            $keyword = new KeywordUsage;
            $keyword->user_id = Auth()->user()->id;
            $keyword->keyword_id = $value;
            $keyword->type = "seeker";
            $keyword->save();
        }
    }

    public function addEducation(Request $request)
    {
        $education = new EducationHistroy();
        $education->level = $request->level;
        $education->field = $request->field;
        $education->institution = $request->institution;
        $education->location = $request->location;
        $education->year = $request->year;
        $education->user_id = Auth()->user()->id;
        Session::put('success', 'YOUR EDUCATION DATA IS SAVED !');
        $education->save();
    }

    public function updateEducation(Request $request)
    {
        EducationHistroy::where('id',$request->id)->update(
            [
                'level' => $request->level,
                'field' => $request->field,
                'institution' => $request->institution,
                'location' => $request->location,
                'year' => $request->year,
                'user_id' => Auth()->user()->id
            ]
        );
        Session::put('success', 'YOUR EDUCATION DATA IS UPDATED !');
    }

    public function deleteEducation(Request $request)
    {
        //Session::put('success', 'YOUR EDUCATION DATA IS DELETED !');
        EducationHistroy::where('id',$request->id)->delete();
    }

    public function addCV(Request $request)
    {
        $count = ProfileCv::where('user_id',Auth::user()->id)->count();
        if($count<3)
        {
            $user_name = str_replace(' ', '_', User::where('id',Auth()->user()->id)->first()->user_name);
            $cv_file = $request->file('cv');
            $fileName = 'LOB_'.$user_name.time().'.'.$cv_file->guessExtension();
            $fileSize = $request->file('cv')->getSize();
            $cv_file->move(public_path('uploads/cv_files'), $fileName);
            $cv = new ProfileCv();
            if($user_name != NULL)
            {
                $cv->title = $user_name.'_'.$fileName;
            }
            $cv->cv_file = $fileName;
            $cv->user_id = Auth()->user()->id;
            $cv->size = $fileSize/1000000;
            $cv->save();

            $cv = ProfileCv::latest('created_at')->first();

            if($count == 0)
            User::where('id',Auth()->user()->id)->update(['default_cv' => $cv->id]);
             
            $msg = "Success";
            $status = true;
            return response()->json(array('msg'=> $msg,'status'=>$status,'id'=>$cv->id,'cv_file'=>$cv->cv_file,'size'=>$cv->size), 200);
        }
        else
        {   
            $msg = "You have maximum CV. Please delete some CV !";
            $status = false;
            Session::put('error', $msg);
        }
        return response()->json(array('msg'=> $msg,'status'=>$status), 200); 
    }

    public function deleteCV(Request $request)
    {
        $default_cv = User::where('id',Auth()->user()->id)->first()->default_cv;
        if($default_cv == $request->id)
        {
            User::where('id',Auth()->user()->id)->update([
                'default_cv' => NULL
            ]);
        }
        ProfileCv::find($request->id)->delete();
        $msg = "Success";
        //Session::put('success', 'YOUR CV IS DELETED !');
        return response()->json(array('msg'=> $msg), 200);
    }

    public function defaultCV(Request $request)
    {
        User::where('id',Auth()->user()->id)->update([
            'default_cv' => $request->id
        ]);
        $msg = "Success";
        //Session::put('success', 'DEFAULT CV IS SAVED !');
        return response()->json(array('msg'=> $msg), 200);
    }

    public function uploadCropImage(Request $request)
    {
        $folderPath = public_path('/uploads/profile_photos/');
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $imageName = uniqid() . '.png';
        $imageFullPath = $folderPath.$imageName;
        file_put_contents($imageFullPath, $image_base64);
        return response()->json(['success'=>'Crop Image Uploaded Successfully','name'=>$imageName]);
    }

    public function updateAccount(Request $request)
    {
        //return $request;
        User::where('id',Auth()->user()->id)->update([
                'user_name' => $request->user_name,
                'name' => $request->name,
                'email' => $request->email,
                'image' => $request->cropped_image,
                'phone' => $request->phone,
                'current_employer_id' => $request->current_employer_id,
        ]);

        $user = User::where('id',Auth()->user()->id)->first();
        $this->addTalentScore($user);
        return (['success',"YOUR ACCOUNT DATA ARE SAVED !",'user'=>$user]);
    }

    public function description(Request $request)
    {
        $user = User::find(Auth()->user()->id);
        $user->remark = $request->remark;
        $user->highlight_1 = $request->highlight1;
        $user->highlight_2 = $request->highlight2;
        $user->highlight_3 = $request->highlight3;
        Session::put('success', 'YOUR PROFILE DATA ARE SAVED !');
        $user->save();
    }

    // Resetting up JS Data
    public function resetJobScoreData()
    {
        JobViewed::truncate();
        Notification::truncate();
        JobStreamScore::truncate();
        $users = User::where('is_active',true)->get();
        foreach($users as $user)
        {
            $this->addTalentScore($user); 
        }
        
        return redirect()->route('home');
    }
}