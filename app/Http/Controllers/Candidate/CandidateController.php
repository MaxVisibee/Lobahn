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
use App\Models\JobSkill;
use App\Models\JobExperience;
use App\Models\KeyStrength;
use App\Models\Qualification;
use App\Models\Institution;
use App\Models\JobStreamScore;
use App\Models\ProfileCv;
use App\Models\EducationHistroy;
use App\Models\EmploymentHistory;
use Illuminate\Support\Facades\DB;
use App\Helpers\MiscHelper;
use Image;

class CandidateController extends Controller
{

    public function profile()
    {
        $data = [ 
            'user' => auth()->user(),
            'cvs' => ProfileCV::where('user_id',Auth()->user()->id)->get(),
            'keyword_usages' => KeywordUsage::where('user_id',Auth()->user()->id)->get(),
            'employment_histories' => EmploymentHistory::where('user_id',Auth()->user()->id)->get()
        ];

        return view('candidate.profile',$data);
    }

    public function edit()
    {
        
        $keywords = KeywordUsage::where('user_id',Auth()->user()->id)->get('keyword_id');
        $keyword_selected = [];

        foreach($keywords as $keyword)
        {
            array_push($keyword_selected, $keyword['keyword_id']);
        }

        $data = [ 
            'user' => auth()->user(),
            'countries' => Country::all(),
            'targetPays' => TargetPay::all(),
            'manangementLevels' => CarrierLevel::all(),
            'people_managements'=>MiscHelper::getNumEmployees(),
            'contract_hours' => JobShift::all(),
            'keywords' => Keyword::all(),
            'keyword_usages' => KeywordUsage::where('user_id',Auth()->user()->id)->get(),
            'keyword_selected' => $keyword_selected,
            'education_levels' => DegreeLevel::all(),
            'geo_experiences' => Geographical::all(),
            'functional_areas' => FunctionalArea::all(),
            'industries' => Industry::all(),
            'companies' => Company::all(),
            'study_fields' => StudyField::all(),
            'job_titles' => JobTitle::all(),
            'job_shifts' => JobShift::all(),
            'job_skills' => JobSkill::all(),
            'job_experiences' => JobExperience::all(),
            'key_strengths' => KeyStrength::all(),
            'qualifications' => Qualification::all(),
            'institutions' => Institution::all(),
            'educations' => EducationHistroy::where('user_id',Auth()->user()->id)->get(),
            'cvs' => ProfileCV::where('user_id',Auth()->user()->id)->get(),
            'employment_histories' => EmploymentHistory::where('user_id',Auth()->user()->id)->get()
        ];

   
        return view('candidate.profile-edit',$data);
    }

    public function updatePassword(Request $request)
    {
        $user = User::find(Auth()->user()->id);
        $user->password = bcrypt($request->password);
        $user->save();
        $msg = "Success!";
        return response()->json(array('msg'=> $msg), 200);
    }

    public function keywords(Request $request)
    {
        KeywordUsage::where('user_id',Auth()->user()->id)->delete();

        foreach($request->keywords as $key => $value)
        {
            $keyword = new KeywordUsage;
            $keyword->user_id = Auth()->user()->id;
            $keyword->keyword_id = $value;
            $keyword->save();
        }

        $msg = "Success";
        return response()->json(array('msg'=>$msg),200);
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
                $user_name = User::where('id',Auth()->user()->id)->first()->user_name;

                $cv = new ProfileCV();
                if($user_name != NULL)
                {
                    $cv->title = $user_name.'_'.$fileName;
                }
                $cv->cv_file = $fileName;
                $cv->user_id = Auth()->user()->id;
                $cv->save();
                $msg = "Success!";
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
        ProfileCv::find($request->id)->delete();
        $msg = "Success";
        return response()->json(array('msg'=> $msg), 200);
    }

    public function updateAccount(Request $request)
    {
        if(isset($request->image)) {
            $photo = $_FILES['image'];
            if(!empty($photo['name'])){
                $file_name = $photo['name'].'-'.time().'.'.$request->file('image')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/profile_photos/'.$file_name));
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

    public function updateField(Request $request)
    {
        DB::table('users')
            ->where('id', Auth()->user()->id)
            ->update(array($request->name => $request->value));

        $msg = "Success";
        $status = true;
        return response()->json(array('msg'=> $msg,'status'=>$status), 200);
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

    public function dashboard()
    {
        $partners = Partner::all();
        $companies = Company::all();
        $events = NewsEvent::take(3)->get();
        $opportunities =Opportunity::orderBy('id','desc')->take(5)->get();
        $seekers = User::orderBy('created_at', 'desc')->take(3)->get();
        $user = auth()->user();
        $data = [
            'user'=> $user,
            'seekers' => $seekers,
            'partners' => $partners,
            'events' => $events,
            'opportunities' => $opportunities,
        ];
        return view('candidate.dashboard',$data);
    }

    public function updateViewCount(Request $request)
    {
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
        $opportunity = Opportunity::find($id);
        $count = JobConnected::where('user_id', Auth()->user()->id)->where('opportunity_id',$id)->count();
        ($count == 1) ? $is_connected = true : $is_connected = false;
        $data = [
            'opportunity' => $opportunity,
            'keywords' => KeywordUsage::where('opportunity_id',$opportunity->id)->get(),
            'is_connected' => $is_connected,
        ];
        return view('candidate.opportunity',$data);
    }

    public function connect(Request $request)
    {
        $opportunity_id = $request->opportunity_id;
        $is_exit = JobConnected::where('user_id', Auth()->user()->id)->where('opportunity_id',$opportunity_id)->count();
        if($is_exit == 0)
        {   
            $jobConnected = new JobConnected();
            $jobConnected->opportunity_id = $opportunity_id;
            $jobConnected->user_id = Auth()->user()->id;
            $jobConnected->is_connected = "connected";
            $jobConnected->employer_viewed = 0;
            $jobConnected->save();
            $company_name = Opportunity::where('id',$opportunity_id)->first()->company->company_name;
            return redirect()->back()->with('status',$company_name);
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
        return view('candidate.setting');
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
}
