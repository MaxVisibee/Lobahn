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
        $history->user_id = Auth()->user()->id;
        $history->position_title = $request->position_title;
        $history->from = $request->from;
        $history->to = $request->to;
        $history->employer_id = $request->employer_id;
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
            'employer_id' => $request->employer_id,
            'from' => $request->from,
            'to' => $request->to,
        ]);
    }

}
