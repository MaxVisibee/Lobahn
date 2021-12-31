<?php

namespace App\Http\Controllers\Candidate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmploymentHistory;

class EmploymentHistoryController extends Controller
{
    public function add(Request $request)
    {
        $history = new EmploymentHistory;
        $history->position_title = $request->position_title;
        $history->employer_name = $request->employer_name;
        $history->user_id = Auth()->user()->id;
        $history->from = $request->from;
        $history->to = $request->to;
        $history->save();
    }

    public function delete(Request $request)
    {
        EmploymentHistory::find($request->id)->delete();
    }

    public function update(Request $request)
    {
        EmploymentHistory::where('id',$request->id)->update([
            'position_title'=> $request->position_title,
            'employer_name' => $request->employer_name,
            'from' => $request->from,
            'to' => $request->to,
        ]);
    }

}
