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
        $user->save();
    }

    public function dashboard()
    {
        $partners = Partner::all();
        $companies = Company::all();
        $events = NewsEvent::take(3)->get();
        $opportunities =Opportunity::take(5)->get();
        $seekers = User::orderBy('created_at', 'desc')->take(3)->get();
        $user = auth()->user();
        $data = [
            'user'=> $user,
            'seekers' => $seekers,
            'partners' => $partners,
            'events' => $events,
            'opportunities' => $opportunities
        ];
        return view('candidate.dashboard',$data);
    }

    public function opportunity($id)
    {
        $opportunity = Opportunity::find($id);
        $data = [
            'opportunity' => $opportunity];
        return view('candidate.opportunity',$data);
    }

    public function connect(Request $request)
    {
        // $this->validate($request, [
        //     'area_name' => 'required',
        // ]);
    
        $input = $request->all();
        JobApply::create($input);
    
        return redirect()->back();
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
