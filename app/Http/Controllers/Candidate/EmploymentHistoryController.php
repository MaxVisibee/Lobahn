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
        $history->employer_name = $request->employer_name;
        $history->user_id = Auth()->user()->id;
        $history->from = $request->from;
        $history->to = $request->to;
        $history->save();
        $msg = "Success";
        return response()->json(array('msg'=> $msg), 200);
    }

    public function delete(Request $request)
    {
        EmploymentHistory::find($request->id)->delete();
        $msg = "Success";
        return response()->json(array('msg'=> $msg), 200);
    }
}
