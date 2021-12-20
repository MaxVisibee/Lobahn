<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Partner;
use App\Models\NewsEvent;
use App\Models\Company;
use App\Models\Payment;
use App\Models\Opportunity;
use App\Models\JobApply;

class CandidateController extends Controller
{

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
    
    public function profile()
    {
        $user = auth()->user();
        $data = [ 'user' => $user];
        return view('candidate.profile',$data);
    }



    public function setting()
    {
        return view('candidate.setting');
    }
    
    public function activity()
    {
        return view('candidate.activity');
    }

    public function account()
    {
        $user = auth()->user();
        $last_payment = Payment::where('user_id',$user->id)->latest('id')->first();

        $data = [ 'user' => $user,'last_payment'=>$last_payment];
        return view('candidate.account',$data);
    }
}
