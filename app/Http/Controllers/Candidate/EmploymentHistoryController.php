<?php

namespace App\Http\Controllers\Candidate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmploymentHistory;
use App\Models\JobTitle;
use Session;

class EmploymentHistoryController extends Controller
{
    public function add(Request $request)
    {
        $history = new EmploymentHistory;
        $history->user_id = Auth()->user()->id;
        $history->position_title = $request->position_title;
        $history->from = $request->from;
        $history->to = $request->to;
        $history->employer_id = $request->employer_id;
        // Session::put('success', 'YOUR EMPLOYMENT DATA IS SAVED !');
        $history->save();
        $job_title = JobTitle::find($history->position_title)->job_title;
        $company_name =$history->company->company_name;
        $count =EmploymentHistory::where('user_id',Auth()->user()->id)->count();

        return ['history' => $history,'count' => $count,'job_title'=>$job_title];
    }

    public function delete(Request $request)
    {
        Session::put('success', 'YOUR EMPLOYMENT DATA IS DELETED !');
        EmploymentHistory::find($request->id)->delete();
    }

    public function update(Request $request)
    {
        $history = EmploymentHistory::where('id',$request->id)->update([
            'position_title'=> $request->position_title,
            'employer_id' => $request->employer_id,
            'from' => $request->from,
            'to' => $request->to,
        ]);

        $count =EmploymentHistory::where('user_id',Auth()->user()->id)->count();
        $history =EmploymentHistory::find($request->id);
        $company_name = EmploymentHistory::find($request->id)->company->company_name;
        $job_title= JobTitle::find($history->position_title)->job_title;
        // Session::put('success', 'YOUR EMPLOYMENT DATA IS UPDATED !');
        return ['history' => $history,'count' => $count,'job_title' => $job_title,'company_name' => $company_name];
    }

}
