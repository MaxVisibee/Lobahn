<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobApply;
use App\Models\Opportunity;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class JobApplyController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data = JobApply::all();
        return view('admin.job_applies.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
    	$jobs  = Opportunity::all(); 
        return view('admin.job_applies.create',compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            // 'id' => 'required',
        ]);
    
        $input = $request->all();
        $opportunity = JobApply::create($input);
    
        return redirect()->route('job_applies.index')
                        ->with('success','JobApply created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = JobApply::find($id);
        return view('admin.job_applies.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = JobApply::find($id);
        $jobs  = Opportunity::all();  
        return view('admin.job_applies.edit',compact('data','jobs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $this->validate($request, [
            // 'id' => 'required',
        ]);
    
        $input = $request->all();
        $job = JobApply::find($id);
        $job->update($input);

        return redirect()->route('job_applies.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = JobApply::find($id);
        $data->delete();
        return redirect()->route('job_applies.index')->with('info', 'Deleted Successfully.');
    }
}

