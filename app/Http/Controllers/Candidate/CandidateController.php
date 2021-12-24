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
use App\Models\DegreeLevel;
use App\Models\Geographical;
use App\Models\FunctionalArea;
use App\Models\Industry;
use App\Models\StudyField;
use App\Models\JobTitle;
use App\Models\KeyStrength;
use App\Models\Qualification;
use App\Models\Institution;

class CandidateController extends Controller
{

    public function profile()
    {
        $data = [ 
            'user' => auth()->user(),
            'countries' => Country::all(),
            'targetPays' => TargetPay::all(),
            'manangementLevels' => CarrierLevel::all(),
            'contract_hours' => JobShift::all(),
            'keywords' => Keyword::all(),
            'education_levels' => DegreeLevel::all(),
            'geo_experiences' => Geographical::all(),
            'functional_areas' => FunctionalArea::all(),
            'industries' => Industry::all(),
            'companies' => Company::all(),
            'study_fields' => StudyField::all(),
            'job_titles' => JobTitle::all(),
            'key_strengths' => KeyStrength::all(),
            'qualifications' => Qualification::all(),
            'institutions' => Institution::all()
        ];
        return view('candidate.profile',$data);
    }

    public function edit()
    {
        $data = [ 
            'user' => auth()->user(),
            'countries' => Country::all(),
            'targetPays' => TargetPay::all(),
            'manangementLevels' => CarrierLevel::all(),
            'contract_hours' => JobShift::all(),
            'keywords' => Keyword::all(),
            'education_levels' => DegreeLevel::all(),
            'geo_experiences' => Geographical::all(),
            'functional_areas' => FunctionalArea::all(),
            'industries' => Industry::all(),
            'companies' => Company::all(),
            'study_fields' => StudyField::all(),
            'job_titles' => JobTitle::all(),
            'key_strengths' => KeyStrength::all(),
            'qualifications' => Qualification::all(),
            'institutions' => Institution::all()
        ];
        return view('candidate.profile-edit',$data);
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
