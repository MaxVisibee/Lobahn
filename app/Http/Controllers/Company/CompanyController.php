<?php

namespace App\Http\Controllers\Company;
use Image;
use Session;
use Carbon\Carbon;
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
use App\Models\CompanyActivity;
use App\Models\LanguageLevel;
use App\Models\SpecialityUsage;
use App\Models\TargetEmployerUsage;
use App\Models\TargetCompany;
use App\Models\PeopleManagementLevel;
use App\Traits\MultiSelectTrait;
use App\Traits\TalentScoreTrait;
use App\Traits\EmailTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\CustomInput;

class CompanyController extends Controller
{
    use MultiSelectTrait;
    use TalentScoreTrait;
    use EmailTrait;
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('company', ['except' => ['companyDetail', 'sendContactForm',]]);
    }

    public function optimizeProfile()
    {
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
        return view('auth.talent_optimized',$data);
    }

    public function saveOptimizedProfile(Request $request)
    {
        
        $opportunity = new Opportunity;

        if(!is_null($request->keyword_id)) 
        {
            $keyword_id = explode(",",$request->keyword_id);
            $opportunity->keyword_id = json_encode($keyword_id);
        } else $keyword_id = $opportunity->keyword_id = NULL;

        $opportunity->management_id = $request->carrier;
        $opportunity->job_experience_id = $request->job_experience;
        $opportunity->degree_level_id = $request->education_level;

        if(!is_null($request->language_id)) 
        {
            $language_id = explode(",",$request->language_id);
            $opportunity->language_id = json_encode($language_id);
        } else $language_id = $opportunity->language_id = NULL;

        if(!is_null($request->geographical_id)) 
        {
            $geographical_id = explode(",",$request->geographical_id);
            $opportunity->geographical_id = json_encode($geographical_id);
        } else  $geographical_id = $opportunity->geographical_id = NULL;

        $opportunity->people_management = $request->management_level;

        if(!is_null($request->job_skill_id)) 
        {
            $job_skill_id = explode(",",$request->job_skill_id);
            $opportunity->job_skill_id = json_encode($job_skill_id);
        } else  $job_skill_id = $opportunity->job_skill_id = NULL;

        if(!is_null($request->institution_id)) 
        {
            $institution_id = explode(",",$request->institution_id);
            $opportunity->institution_id = json_encode($institution_id);
        } else  $institution_id = $opportunity->institution_id = NULL;

        if(!is_null($request->field_study_id)) 
        {
            $field_study_id = explode(",",$request->field_study_id);
            $opportunity->field_study_id = json_encode($field_study_id);
        } else  $field_study_id= $opportunity->field_study_id = NULL;

        if(!is_null($request->qualification_id)) 
        {
            $qualification_id = explode(",",$request->qualification_id);
            $opportunity->qualification_id = json_encode($qualification_id);
        } else  $qualification_id = $opportunity->qualification_id = NULL;

        if(!is_null($request->contract_hour_id)) 
        {
            $contract_hour_id = explode(",",$request->contract_hour_id);
            $opportunity->job_type_id = json_encode($contract_hour_id);
        } else $contract_hour_id = $opportunity->job_type_id = NULL;

        $opportunity->company_id = Auth::guard('company')->user()->id;
        $opportunity->save();
        $opportunity = Opportunity::latest('id')->first();        

        $type = "opportunity";
        if(!is_null($request->language_id))
        {
            LanguageUsage::where('job_id',$opportunity->id)->delete();
            foreach($language_id as $id) LanguageUsage::create([ 'job_id' => $opportunity->id,'language_id' => $id]);
        } 

        $this->action($type,$opportunity->id,$keyword_id,[],[],$contract_hour_id,$institution_id,$geographical_id,$job_skill_id,$field_study_id,$qualification_id,[],[],[],[],[],[],[]);
        $this->addJobTalentScore($opportunity);
        return redirect()->route('company.home');
    }

    public function index()
    {
        $date_sort = $status_sort = false;
        $company = Auth::guard('company')->user();
        $impressions = CompanyActivity::where('company_id',$company->id)->where('impression',true)->count();
        $clicks = CompanyActivity::where('company_id',$company->id)->where('click',true)->count();

        if(isset($_GET['status']))
        {
            // sorted by listing date
            $status_sort = true;
            $listings = Opportunity::where('company_id', $company->id)->orderByRaw("FIELD(is_active , 'true') ASC")->paginate(10);
        }
        else  
        {
            // default - sorted by listing date
            $date_sort = true;
            $listings =  Opportunity::where('company_id', $company->id)->latest('created_at')->paginate(10);
        }  
        $data = [
                'company' => $company,
                'impressions' => $impressions,
                'clicks' => $clicks,
                'listings' => $listings,
                'date_sort' => $date_sort,
                'status_sort' => $status_sort,
            ];
        
        return view('company.dashboard', $data);
    }

    public function positionListing(Opportunity $opportunity)
    {
        $users = collect();
        $feature_users = collect();

        $jsr_sort = $status_sort = false;
        if(isset($_GET['jsr']))
        {
            $jsr_sort = true;
            $scores = JobStreamScore::where('job_id',$opportunity->id)
                      ->where('is_deleted',false)
                      ->orderBy('jsr_percent','DESC')->get();

            foreach($scores as $score)
            {
                if(floatval($score->jsr_percent)>=70.0 && $score->user->is_featured == true) $feature_users->push($score);
                elseif(floatval($score->jsr_percent)>=80.0) $users->push($score); 
            }
        }
        else {
            // default 
            $status_sort = true;

            $unsorted_users = collect();
            $shortlisted_users = collect();
            $connected_users = collect();
            $unviewed_users = collect();
            $viewed_users = collect();

            $scores = JobStreamScore::where('job_id',$opportunity->id)->where('is_deleted',false)->get();
           
            foreach($scores as $score)
            {
                if(floatval($score->jsr_percent)>=70.0 && $score->user->is_featured == true) $feature_users->push($score);
                elseif(floatval($score->jsr_percent)>=80.0) $unsorted_users->push($score); 
            }
            
            foreach($unsorted_users as $unsorted_user)
            {
                if($unsorted_user->user->isconnected($opportunity->id, $unsorted_user->user->id) != null && $unsorted_user->user->isconnected($opportunity->id, $unsorted_user->user->id)->is_shortlisted == true)
                {
                    $shortlisted_users->push($unsorted_user);
                }
                elseif ($unsorted_user->user->isconnected($opportunity->id, $unsorted_user->user->id) != null && $unsorted_user->user->isconnected($opportunity->id, $unsorted_user->user->id)->is_connected == 'connected')
                {
                    $connected_users->push($unsorted_user);
                }
                elseif ($unsorted_user->user->isviewed($opportunity->id, $unsorted_user->user->id) == null)
                {
                    $unviewed_users->push($unsorted_user);
                }
                else{
                    $viewed_users->push($unsorted_user);
                }
            }
            $users = $users->merge($shortlisted_users);
            $users = $users->merge($connected_users);
            $users = $users->merge($unviewed_users);
            $users = $users->merge($viewed_users);
        } 
        
        $data = [
            'opportunity' => $opportunity,
            'feature_user_scores' => $feature_users,
            'user_scores' => $users,
            'jsr_sort' => $jsr_sort,
            'status_sort' => $status_sort,
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
        $candidate = User::where('id', $request->user_id)->first();
        $num_clicks = $candidate->num_clicks;
        $num_impressions = $candidate->num_impressions;
        $opportunity_id = $request->opportunity_id;
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

        $opportunity = Opportunity::where('id',$opportunity_id)->first();
        $opportunity->connected += 1;
        $opportunity->save();

        CompanyActivity::create([
        'connection'=>true,
        'company_id'=> $opportunity->company->id
        ]);

        $opportunity = Opportunity::where("id",$opportunity_id)->first();
        $is_exit = JobConnected::where('user_id', $request->user_id)->where('opportunity_id', $opportunity_id)->count();
        if ($is_exit == 0) {
            $jobConnected = new JobConnected();
            $jobConnected->opportunity_id = $opportunity_id;
            $jobConnected->corporate_id = $opportunity->company->id;
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

        CompanyActivity::create([
        'shortlist'=>true,
        'company_id'=> $opportunity->company->id
        ]);
        
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
            'language_levels' => LanguageLevel::all(),
            'degree_levels'  => DegreeLevel::all(),
            'study_fields' => StudyField::all(),
            'payments' => PaymentMethod::all(),
            'geographicals'  => Geographical::all(),
            'keywords'  => Keyword::all(),
            'institutions' => Institution::all(),
            'key_strengths' => KeyStrength::all(),
            'specialties' => Speciality::all(),
            'qualifications' => Qualification::all(),
            'people_management_levels' => PeopleManagementLevel::all(),
            'sub_sectors' => SubSector::all(),
            'target_companies' => TargetCompany::all(),
        ];
        
        return view('company.position_detail_add', $data);
    }

    public function positionStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $opportunity = new Opportunity();
        $opportunity->title = $request->title;
        $opportunity->ref_no = $request->ref_no;
        $opportunity->description = $request->description;
        $opportunity->highlight_1 = $request->highlight_1;
        $opportunity->highlight_2 = $request->highlight_2;
        $opportunity->highlight_3 = $request->highlight_3;

        // Expire Date 
        $current = strtotime(date("Y-m-d"));
        $expire_date    = strtotime($request->expire_date);
        $datediff = $expire_date - $current;
        $difference = floor($datediff/(60*60*24));
        $expire_date = $difference == 0 ?  date('d M Y',strtotime('+ 90 days',strtotime($request->expire_date))): $request->expire_date;
        $opportunity->expire_date = date('Y-m-d', strtotime($expire_date));

        $request->is_active == $request->is_active;
        if (isset($request->supporting_document)) {
            $doc = $request->file('supporting_document');
            $fileName = 'job_support_doc_' . time() . '.' . $doc->guessExtension();
            $doc->move(public_path('uploads/job_support_docs'), $fileName);
            $opportunity->supporting_document = $fileName;
        }
        // if(!is_null($request->country_id)) 
        // {
        //     $country_id = explode(",",$request->country_id);
        //     $opportunity->country_id = json_encode($country_id);
        // } else $country_id = $opportunity->country_id = NULL;

        $opportunity->country_id = $request->country_id;

        if(!is_null($request->industry_id)) 
        {
            $industry_id = explode(",",$request->industry_id);
            $opportunity->industry_id = json_encode($industry_id);
        } else   $industry_id = $opportunity->industry_id = NULL;
        
        if(!is_null($request->functional_area_id)) 
        {
            $functional_area_id = explode(",",$request->functional_area_id);
            $opportunity->functional_area_id = json_encode($functional_area_id);
        } else  $functional_area_id = $opportunity->functional_area_id = NULL;
        
        if(!is_null($request->job_type_id)) 
        {
            $job_type_id = explode(",",$request->job_type_id);
            $opportunity->job_type_id = json_encode($job_type_id);
        } else  $job_type_id = $opportunity->job_type_id = NULL;
        
        if(!is_null($request->job_title_id)) 
        {
            $job_title_id = explode(",",$request->job_title_id);
            $opportunity->job_title_id = json_encode($job_title_id);
        } else  $job_title_id = $opportunity->job_title_id = NULL;
        
        if(!is_null($request->keyword_id)) 
        {
            $keyword_id = explode(",",$request->keyword_id);
            $opportunity->keyword_id = json_encode($keyword_id);
        } else  $keyword_id = $opportunity->keyword_id = NULL;
        
        $opportunity->company_id = Auth::guard('company')->user()->id;
        $opportunity->job_experience_id = $request->job_experience_id;
        $opportunity->carrier_level_id = $request->management_level;
        $opportunity->people_management = $request->people_management_level;

        // $opportunity->target_salary = $request->salary_from;
        // $opportunity->salary_from = $request->salary_from;
        // $opportunity->salary_to = $request->salary_to;

        $opportunity->full_time_salary = $request->fulltime_amount;
        $opportunity->full_time_salary_max = $request->fulltime_amount_max;
        $opportunity->part_time_salary = $request->parttime_amount;
        $opportunity->part_time_salary_max = $request->parttime_amount_max;
        $opportunity->freelance_salary = $request->freelance_amount;
        $opportunity->freelance_salary_max = $request->freelance_amount_max;
        

        $languageId = $languageLevel = [];
        if(isset($request->language_1)) $languageId[] = $request->language_1;
        if (isset($request->language_2)) $languageId[] = $request->language_2;
        if (isset($request->language_3)) $languageId[] = $request->language_3;
        if (isset($request->level_1))    $languageLevel[] = $request->level_1;
        if (isset($request->level_2))    $languageLevel[] = $request->level_2;
        if (isset($request->level_3))    $languageLevel[] = $request->level_3;
        $opportunity->language_id        = empty($languageId) ? NULL : json_encode($languageId);
        $opportunity->language_level     = empty($languageLevel) ? NULL : json_encode($languageLevel);

        if(!is_null($request->job_skill_id)) 
        {
            $job_skill_id = explode(",",$request->job_skill_id);
            $opportunity->job_skill_id = json_encode($job_skill_id);
        } else  $job_skill_id = $opportunity->job_skill_id = NULL;

        if(!is_null($request->geographical_id)) 
        {
            $geographical_id = explode(",",$request->geographical_id);
            $opportunity->geographical_id = json_encode($geographical_id);
        } else $geographical_id = $opportunity->geographical_id = NULL;

        $opportunity->degree_level_id = $request->degree_level_id;
        if(!is_null($request->institution_id)) 
        {
            $institution_id = explode(",",$request->institution_id);
            $opportunity->institution_id = json_encode($institution_id);
        } else  $institution_id = $opportunity->institution_id = NULL;

        if(!is_null($request->field_study_id)) 
        {
            $field_study_id = explode(",",$request->field_study_id);
            $opportunity->field_study_id = json_encode($field_study_id);
        } else  $field_study_id= $opportunity->field_study_id = NULL;

        if(!is_null($request->qualification_id)) 
        {
            $qualification_id = explode(",",$request->qualification_id);
            $opportunity->qualification_id = json_encode($qualification_id);
        } else  $qualification_id = $opportunity->qualification_id = NULL;

        if(!is_null($request->key_strength_id)) 
        {
            $key_strength_id = explode(",",$request->key_strength_id);
            $opportunity->key_strength_id = json_encode($key_strength_id);
        } else  $key_strength_id = $opportunity->key_strength_id = NULL;

        if(!is_null($request->contract_hour_id)) 
        {
            $contract_hour_id = explode(",",$request->contract_hour_id);
            $opportunity->contract_hour_id = json_encode($contract_hour_id);
        } else  $contract_hour_id = $opportunity->contract_hour_id = NULL;

        if(!is_null($request->specialist_id)) 
        {
            $specialist_id = explode(",",$request->specialist_id);
            $opportunity->specialist_id = json_encode($specialist_id);
        } else  $specialist_id = $opportunity->specialist_id = NULL;

        if(!is_null($request->target_employer_id)) 
        {
            $target_employer_id = explode(",",$request->target_employer_id);
            $opportunity->target_employer_id = json_encode($target_employer_id);
        } else $target_employer_id = $opportunity->target_employer_id = NULL; 
        $opportunity->save();
        $opportunity = Opportunity::latest('created_at')->first();
        CompanyActivity::create(['position'=>true,'company_id'=> Auth::guard('company')->user()->id,]);
        $type = "opportunity";
        $this->addJobTalentScore($opportunity);
        $this->languageAction($type, $opportunity->id, $request->language_1, $request->level_1, $request->language_2, $request->level_2, $request->language_3, $request->level_3);
        $this->action($type, $opportunity->id, $keyword_id,NULL, $job_type_id, $contract_hour_id, $institution_id, $geographical_id, $job_skill_id, $field_study_id, $qualification_id, $key_strength_id, $job_title_id, $industry_id, $functional_area_id, $target_employer_id, $specialist_id, NULL);
        return redirect()->route('company.position', $opportunity->id)->with('status', 'Data has been created successfully');
    }

    public function positionDetail(Opportunity $opportunity)
    {
        $type = "opportunity";
        $job_id = $opportunity->id;
        $data = [
            'opportunity' => $opportunity,
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
            'sub_sectors' => $this->getSubSectorsDetails($job_id, $type),
        ];
        return view('company.position_detail', $data);
    }

    public function positionEdit(Opportunity $opportunity)
    {
        $type = "opportunity";
        $job_id = $opportunity->id;

        if($opportunity->target_employer_id!=NULL) $target_employer_id = json_decode($opportunity->target_employer_id);
        else $target_employer_id = [];
         
        $data = [
            'opportunity' => $opportunity,
            'companies' => Company::all(),
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
            'degrees'    => DegreeLevel::all(),
            'institutions' => Institution::all(),
            'institute_selected' => $this->getInstitutes($job_id, $type),
            'languages'  => Language::all(),
            'language_levels' => LanguageLevel::all(),
            'user_language' => $this->getLanguages($job_id, $type),
            'geographicals'  => Geographical::all(),
            'geographical_selected' => $this->getGeographicals($job_id, $type),
            'people_management_levels' => PeopleManagementLevel::all(),
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
            'sub_sectors' => SubSector::all(),
            'sub_sector_selected' => $this->getSubSector($job_id, $type),
            'target_companies' => TargetCompany::all(),
            'target_companies_selected' => $target_employer_id,
        ];
        
        return view('company.position_detail_edit', $data);
    }

    public function positionUpdate(Request $request, Opportunity $opportunity)
    {
        //return $request;
        $opportunity->title = $request->title;
        $opportunity->description = $request->description;
        $opportunity->highlight_1 = $request->highlight_1;
        $opportunity->highlight_2 = $request->highlight_2;
        $opportunity->highlight_3 = $request->highlight_3;

        // Expire Date 
        $current = strtotime(date("Y-m-d"));
        $expire_date    = strtotime($request->expire_date);
        $datediff = $expire_date - $current;
        $difference = floor($datediff/(60*60*24));
        $expire_date = $difference == 0 ?  date('d M Y',strtotime('+ 90 days',strtotime($request->expire_date))): $request->expire_date;
        $opportunity->expire_date = date('Y-m-d', strtotime($expire_date));

        $request->is_active == "Open" ?  $opportunity->is_active = true : $opportunity->is_active = false;
        if (isset($request->supporting_document)) {
            $doc = $request->file('supporting_document');
            $fileName = 'job_support_doc_' . time() . '.' . $doc->guessExtension();
            $doc->move(public_path('uploads/job_support_docs'), $fileName);
            $opportunity->supporting_document = $fileName;
        }
        $opportunity->ref_no = $request->ref_no;
        $opportunity->company_id = Auth::guard('company')->user()->id;
        
        //  Matching Factors 
        // if(!is_null($request->country_id)) 
        // {
        //     $country_id = explode(",",$request->country_id);
        //     $opportunity->country_id = json_encode($country_id);
        // } else  $country_id = $opportunity->country_id = NULL;

        $opportunity->country_id = $request->country_id;

        //return $request->country_id;

        if(!is_null($request->industry_id)) 
        {
            $industry_id = explode(",",$request->industry_id);
            $opportunity->industry_id = json_encode($industry_id);
        } else  $industry_id = $opportunity->industry_id = NULL;

        if(!is_null($request->functional_area_id)) 
        {
            $functional_area_id = explode(",",$request->functional_area_id);
            $opportunity->functional_area_id = json_encode($functional_area_id);
        } else  $functional_area_id = $opportunity->functional_area_id = NULL;

        if(!is_null($request->job_type_id)) 
        {
            $job_type_id = explode(",",$request->job_type_id);
            $opportunity->job_type_id = json_encode($job_type_id);
        } else  $job_type_id = $opportunity->job_type_id = NULL;
        
        // $opportunity->salary_to = $request->salary_to;
        // $opportunity->salary_from = $request->salary_from;
        // $opportunity->target_salary = $request->target_salary;

        $opportunity->full_time_salary = $request->fulltime_amount;
        $opportunity->full_time_salary_max = $request->fulltime_amount_max;
        $opportunity->part_time_salary = $request->parttime_amount;
        $opportunity->part_time_salary_max = $request->parttime_amount_max;
        $opportunity->freelance_salary = $request->freelance_amount;
        $opportunity->freelance_salary_max = $request->freelance_amount_max;
        
        if(!is_null($request->job_title_id)) 
        {
            $job_title_id = explode(",",$request->job_title_id);
            $opportunity->job_title_id = json_encode($job_title_id);
        } else  $job_title_id = $opportunity->job_title_id = NULL;

        if(!is_null($request->keyword_id)) 
        {
            $keyword_id = explode(",",$request->keyword_id);
            $opportunity->keyword_id = json_encode($keyword_id);
        } else $keyword_id = $opportunity->keyword_id = NULL;
        
        $opportunity->job_experience_id = $request->job_experience_id;
        $opportunity->carrier_level_id = $request->management_level;
        $opportunity->people_management = $request->people_management_level;
        
        $languageId =$languageLevel = [];
        if (isset($request->language_1))    $languageId[] = $request->language_1;
        if (isset($request->language_2))    $languageId[] = $request->language_2;
        if (isset($request->language_3))    $languageId[] = $request->language_3;
        if (isset($request->level_1))       $languageLevel[] = $request->level_1;
        if (isset($request->level_2))       $languageLevel[] = $request->level_2;
        if (isset($request->level_3))       $languageLevel[] = $request->level_3;
        $opportunity->language_id        = empty($languageId) ? null : json_encode($languageId);
        $opportunity->language_level     = empty($languageLevel) ? null : json_encode($languageLevel);
        
        if(!is_null($request->job_skill_id)) 
        {
            $job_skill_id = explode(",",$request->job_skill_id);
            $opportunity->job_skill_id = json_encode($job_skill_id);
        } else  $job_skill_id = $opportunity->job_skill_id = NULL;
        
        if(!is_null($request->geographical_id)) 
        {
            $geographical_id = explode(",",$request->geographical_id);
            $opportunity->geographical_id = json_encode($geographical_id);
        } else  $geographical_id = $opportunity->geographical_id = NULL;
        
        $opportunity->degree_level_id = $request->degree_level_id;

        if(!is_null($request->institution_id)) 
        {
            $institution_id = explode(",",$request->institution_id);
            $opportunity->institution_id = json_encode($institution_id);
        } else  $institution_id = $opportunity->institution_id = NULL;
        
        if(!is_null($request->field_study_id)) 
        {
            $field_study_id = explode(",",$request->field_study_id);
            $opportunity->field_study_id = json_encode($field_study_id);
        } else  $field_study_id= $opportunity->institution_id = NULL;
        
        if(!is_null($request->qualification_id)) 
        {
            $qualification_id = explode(",",$request->qualification_id);
            $opportunity->qualification_id = json_encode($qualification_id);
        } else  $qualification_id = $opportunity->qualification_id = NULL;
        
        if(!is_null($request->key_strength_id)) 
        {
            $key_strength_id = explode(",",$request->key_strength_id);
            $opportunity->key_strength_id = json_encode($key_strength_id);
        } else  $key_strength_id = $opportunity->key_strength_id = NULL;
        
        if(!is_null($request->contract_hour_id)) 
        {
            $contract_hour_id = explode(",",$request->contract_hour_id);
            $opportunity->contract_hour_id = json_encode($contract_hour_id);
        } else $contract_hour_id = $opportunity->contract_hour_id = NULL;
        
        if(!is_null($request->specialist_id)) 
        {
            $specialist_id = explode(",",$request->specialist_id);
            $opportunity->specialist_id = json_encode($specialist_id);
        } else $specialist_id = $opportunity->specialist_id = NULL;
    
        if(!is_null($request->target_employer_id)) 
        {
            $target_employer_id = explode(",",$request->target_employer_id);
            $opportunity->target_employer_id = json_encode($target_employer_id);
        } else  $target_employer_id = $opportunity->target_employer_id = NULL;
        
        $opportunity->save();
        
        $type = "opportunity";
        $this->addJobTalentScore($opportunity);
        $this->languageAction($type, $opportunity->id, $request->language_1, $request->level_1, $request->language_2, $request->level_2, $request->language_3, $request->level_3);
        $this->action($type, $opportunity->id, $keyword_id, NULL, $job_type_id, $contract_hour_id, $institution_id, $geographical_id, $job_skill_id, $field_study_id, $qualification_id, $key_strength_id, $job_title_id, $industry_id, $functional_area_id, $target_employer_id, $specialist_id, NULL);
        Session::put('success','POSITION DETAIL IS UPDATED!');
        //return redirect()->back();
        return redirect()->route('company.position', $opportunity->id);
    }

    public function account()
    {
        $company = Auth::guard('company')->user();
        $active_payments = Payment::where('company_id',$company->id)->where('status',true)->paginate(10);
        $payments = Payment::where('company_id',$company->id)->paginate(10);
        
        $data = [
            'company' => $company,
            'active_payments' => $active_payments,
            'payments' => $payments
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

    public function uploadCropImage(Request $request)
    {
        $folderPath = public_path('/uploads/company_logo/');
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $imageName = uniqid() . '.png';
        $imageFullPath = $folderPath.$imageName;
        file_put_contents($imageFullPath, $image_base64);
        return response()->json(['success'=>'Crop Image Uploaded Successfully','name'=>$imageName]);
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
        // if (isset($request->company_logo)) {
        //     $photo = $_FILES['company_logo'];
        //     if (!empty($photo['name'])) {
        //         $file_name = $photo['name'] . '-' . time() . '.' . $request->file('company_logo')->guessExtension();
        //         $tmp_file = $photo['tmp_name'];
        //         $img = Image::make($tmp_file);
        //         //$img->resize(300, 300)->save(public_path('/uploads/company_logo/' . $file_name));
        //         $img->save(public_path('/uploads/company_logo/' . $file_name));
        //         $company->company_logo = $file_name;
        //     }
        // }
        $company->company_logo = $request->input('cropped_image');
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
        Session::put('success','COMPANY ACCOUNT DATA ARE SAVED !');
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
        Session::put('success','COMPANY PROFILE DATA ARE SAVED !');
        return redirect()->route('company.profile.edit')->with('data');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:5|confirmed'
        ]);
        if ($validator->fails()){
            $company = Auth::guard('company')->user();
            $data = [
                'company' => $company,
                'errors' => $validator->errors(),
                'listings' => Opportunity::where('company_id', $company->id)->get()
            ];
            //Session::put('error','EROORS FOUND ,TRY AGAIN !');
            return view('company.profile', $data);
        }else{
            $company = Company::find(Auth::guard('company')->user()->id);
            $company->password = bcrypt($request->password);
            $company->save();
            Session::put('success','NEW PASSWORDS ARE SAVED !');
            return redirect('company-profile-edit');
            //$this->guard('company')->logout();
            //$request->session()->invalidate();
            //return redirect('/');
        }
    }

    public function activity()
    {
        $company = Auth::guard('company')->user();
        $day_7 = $day_30 = $month_3 =$month_6 = $year_last = $life_time = false;
        $date_sort = $status_sort = false;
        if(isset($_GET['7-days']))
        {
            $day_7 = true;
            $date = Carbon::now()->subDays(7);
            $activity_data = CompanyActivity::where('company_id', $company->id)->where('created_at', '>=', $date)->get();
        }
        elseif(isset($_GET['30-days']))
        {
            $day_30 = true;
            $date = Carbon::now()->subDays(30);
            $activity_data = CompanyActivity::where('company_id', $company->id)->where('created_at', '>=', $date)->get();
        }
        elseif(isset($_GET['3-months']))
        {
            $month_3 = true;
            $date = Carbon::now()->subDays(90);
            $activity_data = CompanyActivity::where('company_id', $company->id)->where('created_at', '>=', $date)->get();
        }
        elseif(isset($_GET['6-months']))
        {
            $month_6 = true;
            $date = Carbon::now()->subDays(180);
            $activity_data = CompanyActivity::where('company_id', $company->id)->where('created_at', '>=', $date)->get();
        }
        elseif(isset($_GET['last-year']))
        {
            $year_last = true;
            $activity_data = CompanyActivity::where('company_id', $company->id)->whereYear('created_at', date('Y', strtotime('-1 year')))->get();
        }
        else 
        {
            // default - life time
            $life_time = true;
            $activity_data = CompanyActivity::where('company_id', $company->id)->get();
        }

        $position_list = $activity_data->where('position',true)->count();
        $impressions = $activity_data->where('impression',true)->count();
        $total_clicks = $activity_data->where('click',true)->count();
        $total_received_profiles = $activity_data->where('profile',true)->count();
        $total_shortlists = $activity_data->where('shortlist',true)->count();
        $total_connections = $activity_data->where('connection',true)->count();
        $data = [
            'position_list' => $position_list,
            'impressions' => $impressions,
            'total_clicks' => $total_clicks,
            'total_received_profiles' => $total_received_profiles,
            'total_shortlists' => $total_shortlists,
            'total_connections' =>  $total_connections,

            'life_time' => $life_time,
            'day_7' => $day_7,
            'day_30' => $day_30,
            'month_3' => $month_3,
            'month_6' => $month_6,
            'year_last' => $year_last,
            'life_time' => $life_time,
        ];
        return view('company.activity', $data);
    }

    public function generate_numbers($start, $count, $digits)
    {
        for ($n = $start; $n < $start + $count; $n++) {
            $result = str_pad($n, $digits, "0", STR_PAD_LEFT);
        }
        return $result;
    }

    public function featureStaffDetail()
    {
        return view('company.feature_staff_detail');
    }

    public function keyphraseCheck(Request $request)
    {
            $keyword =Keyword::where('keyword_name',$request->keyphrase)->first();
            if($keyword){
               return ["data"=>$keyword->id];

            }else{
                $custom_input =new CustomInput();
                $custom_input->name =$request->keyphrase;
                $custom_input->field ='keyword';
                $custom_input->company_id =Auth::guard('company')->user()->id;
                $custom_input->save();

                return ["data"=>"success"];
               
            }
        
    }
}