<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Partner;
use App\Models\NewsEvent;
use App\Models\Country;
use App\Models\Company;
use App\Models\Payment;
use App\Models\Opportunity;
use App\Models\JobViewed;
use App\Models\TargetPay;
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
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Helpers\MiscHelper;
use App\Traits\MultiSelectTrait;
use App\Traits\TalentScoreTrait;
use App\Traits\EmailTrait;
use Image;
use Response;

class CandidateController extends Controller
{
    use MultiSelectTrait;
    use EmailTrait;
    use TalentScoreTrait;

    public function updateData()
    {
        $user = new User();
        $user->id = 1000;
        $user->country_id = json_encode(["1","2"]);
        $user->position_title_id = json_encode(["1"]);
        $user->contract_term_id = json_encode(["1","2","3"]);
        $user->skill_id = json_encode(["1","2"]);
        $user->experience_id = 7;
        $user->education_level_id = 1;
        $user->functional_area_id = json_encode(["1","2","3"]);
        $user->contract_hour_id = json_encode(["1","2"]);
        $user->institution_id = json_encode(["1"]);
        $user->geographical_id = json_encode(["1","2","3","4","5"]);
        $user->field_study_id = json_encode(["1"]);
        $user->field_study_id = json_encode(["1"]);
        $user->qualification_id = json_encode(["1","2","3","4","5"]);
        $user->key_strength_id = json_encode(["1","2","3","4","5"]);
        $user->keyword_id = json_encode(["1","2","3","4","5"]);
        $user->expected_salary = 1000;
        $user->target_employer_id = json_encode(['8']);
        $this->addTalentScore($user);
        // $users = User::all();
        // $listings = Opportunity::all();
        // foreach($users as $user)
        // {
        //     $this->addTalentScore($user);
        // }
    }

    public function dashboard()
    {
        $partners = Partner::all();
        $companies = Company::all();
        $events = NewsEvent::take(3)->get();
        $seekers = User::orderBy('created_at', 'desc')->take(3)->get();
        $user = auth()->user();

        $opportunities = collect();
        $feature_opportunities = collect();
        $scores = JobStreamScore::where('user_id',Auth()->user()->id)->get();

        foreach($scores as $score)
        {
            if(floatval($score->jsr_percent)>=70.0 && $score->company->is_featured == true) $feature_opportunities->push($score);

            elseif(floatval($score->jsr_percent)>=75.0) $opportunities->push($score);
            
        }

        $data = [
            'user'=> $user,
            'seekers' => $seekers,
            'partners' => $partners,
            'events' => $events,
            'featured_opportunities' => $feature_opportunities,
            'opportunities' => $opportunities,
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
            'target_pay' => TargetPay::where('user_id',$user->id)->first(),
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
            'fun_areas' => $this->getFunctionalAreaDetails($user->id,$type),
            'target_employers' => $this->getTargetEmployerDetails($user->id,$type)
        ];

        return view('candidate.profile',$data);
    }

    public function edit()
    {   
        
        $user = Auth()->user();
        $type = "candidate";
        $data = [
            'user' => $user,
            'educations' => EducationHistroy::where('user_id',Auth()->user()->id)->get(),
            'cvs' => ProfileCV::where('user_id',Auth()->user()->id)->get(),
            'employment_histories' => EmploymentHistory::where('user_id',Auth()->user()->id)->get(),
            'companies' => Company::all(),
            'target_pay' => TargetPay::where('user_id',$user->id)->first(),
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
            'degree_levels'  => DegreeLevel::all(),
            'institutions' => Institution::all(),
            'institute_selected' =>$this->getInstitutes($user->id,$type),
            'languages'  => Language::all(),
            'user_language' => $this->getLanguages($user->id,$type),
            'geographicals'  => Geographical::all(),
            'geographical_selected' => $this->getGeographicals($user->id,$type),
            'people_managements'=>MiscHelper::getNumEmployees(),
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
            'fun_areas'  => FunctionalArea::all(),
            'fun_area_selected' => $this->getFunctionalAreas($user->id,$type),
            'target_employer_selected' => $this->getTargetEmployers($user->id,$type)
        ];

        //return $data['job_type_selected'];
   
        return view('candidate.profile-edit',$data);
    }

    public function updateProfile(Request $request)
    {
        $candidate = User::where('id',Auth()->user()->id)->first();
        if($request->management_level != NULL)
        $candidate->people_management_id = $request->management_level;
        if($request->year != NULL)
        $candidate->experience_id = JobExperience::where('job_experience',$request->year)->first()->id;
        if($request->carrier_level != NULL)
        $candidate->management_level_id = CarrierLevel::where('carrier_level',$request->carrier_level)->first()->id;
        if($request->degree_level != NULL)
        $candidate->education_level_id = DegreeLevel::where('degree_name',$request->degree_level)->first()->id;
        if($request->people_management != NULL)
        $candidate->people_management = $request->people_management;

        $candidate->country_id = $request->countries;
        $candidate->keyword_id = $request->keywords;
        $candidate->contract_term_id = $request->job_types;
        $candidate->contract_hour_id = $request->job_shifts;
        $candidate->institution_id = $request->institutions;
        $candidate->geographical_id = $request->geographicals;
        $candidate->skill_id = $request->job_skills;
        $candidate->field_study_id = $request->study_fields;
        $candidate->qualification_id = $request->qualifications;
        $candidate->key_strength_id = $request->key_strengths;
        $candidate->position_title_id = $request->job_titles;
        $candidate->functional_area_id = $request->fun_areas;
         

        $candidate->range_from = $request->range_from;
        $candidate->range_to = $request->range_to;
        $candidate->target_salary = $request->target_pay;
        $candidate->full_time_salary = $request->fulltime_amount;
        $candidate->part_time_salary = $request->parttime_amount;
        $candidate->freelance_salary = $request->freelance_amount;
        $candidate->save();

        $type = "candidate";
        $this->languageAction($type,$candidate->id,$request->language_1,$request->level_1,$request->language_2,$request->level_2,$request->language_3,$request->level_3);
        $this->action($type,$candidate->id,$request->keywords,$request->countries,$request->job_types,$request->job_shifts,$request->institutions,$request->geographicals,$request->job_skills,$request->study_fields,$request->qualifications,$request->key_strengths,$request->job_titles,$request->industries,$request->fun_areas,$request->desirable_employers);

        $this->addTalentScore($candidate);

        return redirect()->route("candidate.profile");
    }

    public function updateViewCount(Request $request)
    {
        $opportunity = Opportunity::where('id',$request->opportunity_id)->first();
        $opportunity->impression += 1;
        $opportunity->save();

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

        return view('candidate.opportunity',$data);
    }

    public function connect(Request $request)
    {
        $opportunity_id = $request->opportunity_id;
        $opportunity = Opportunity::where('id',$opportunity_id)->first();
        $is_exit = JobConnected::where('user_id', Auth()->user()->id)->where('opportunity_id',$opportunity_id)->count();
        if($is_exit == 0)
        {   
            $jobConnected = new JobConnected();
            $jobConnected->opportunity_id = $opportunity_id;
            $jobConnected->user_id = Auth()->user()->id;
            $jobConnected->is_connected = "connected";
            $jobConnected->employer_viewed = 0;
            $jobConnected->save();
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
        $job = JobStreamScore::where('job_id',$request->opportunity_id)->where('user_id',Auth()->user()->id)->first();
        $job->is_deleted = true;
        $job->save();
        return redirect('/home');
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
        $last_payment = Payment::where('user_id',$user->id)->latest('id')->first();

        $data = [ 'user' => $user,'last_payment'=>$last_payment];
        return view('candidate.account',$data);
    }

    
    public function updatePassword(Request $request)
    {
        $user = User::find(Auth()->user()->id);
        $user->password = bcrypt($request->password);
        $user->password_updated_date = Carbon::now();
        $user->save();
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
    }

    public function deleteEducation(Request $request)
    {
        EducationHistroy::where('id',$request->id)->delete();
    }

    public function addCV(Request $request)
    {
        $count = ProfileCv::where('user_id',Auth::user()->id)->count();
        if($count<3)
        {
            
                $cv_file = $request->file('cv');
                $fileName = 'cv_'.time().'.'.$cv_file->guessExtension();
                $cv_file->move(public_path('uploads/cv_files'), $fileName);
                $user_name = str_replace(' ', '_', User::where('id',Auth()->user()->id)->first()->user_name);
                $cv = new ProfileCv();
                if($user_name != NULL)
                {
                    $cv->title = $user_name.'_'.$fileName;
                }
                $cv->cv_file = $fileName;
                $cv->user_id = Auth()->user()->id;
                $cv->save();

                if($count == 0){
                    $id  = ProfileCv::latest('created_at')->first()->id;
                    User::where('id',Auth()->user()->id)->update([
                        'default_cv' => $id
                    ]);
                } 
                $msg = "Success";
                $status = true;
        }
        else
        {   
            $msg = "You have maximum CV. Please delete some CV and try again";
            $status = false;
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
        return response()->json(array('msg'=> $msg), 200);
    }

    public function defaultCV(Request $request)
    {
        User::where('id',Auth()->user()->id)->update([
            'default_cv' => $request->id
        ]);
        $msg = "Success";
        return response()->json(array('msg'=> $msg), 200);
    }

    public function cv($id)
    {
        // $cv_name = ProfileCv::where('id',$id)->first()->title;
        // $file = public_path('/uploads/cv_files/' . $cv_name);
        // $headers = array('Content-Type: application/pdf',);
        // return response()->download($file, 'cv.pdf',$headers);
         return redirect()->back();

    }

    public function updateAccount(Request $request)
    {
        if(isset($request->image)) {
            $photo = $_FILES['image'];
            if(!empty($photo['name'])){
                $file_name = 'profile_'.time().'.'.$request->file('image')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(400, 400)->save(public_path('/uploads/profile_photos/'.$file_name));
                $img->save(public_path('/uploads/profile_photos/'.$file_name));
                User::where('id',Auth()->user()->id)->update([
                    'user_name' => $request->user_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'image' => $file_name,
                ]);
            }
        }
        else{
            User::where('id',Auth()->user()->id)->update([
                'user_name' => $request->user_name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
        }
        return redirect()->back();
    }

    public function description(Request $request)
    {
        $user = User::find(Auth()->user()->id);
        $user->remark = $request->remark;
        $user->highlight_1 = $request->highlight1;
        $user->highlight_2 = $request->highlight2;
        $user->highlight_3 = $request->highlight3;
        $user->save();
    }


}
