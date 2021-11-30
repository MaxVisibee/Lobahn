<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobExperience;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class JobExperienceController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data = JobExperience::all();
        return view('admin.job_experiences.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.job_experiences.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'job_experience' => 'required',
        ]);
    
        //$input = $request->all();
        $job_experience = new JobExperience();
        $job_experience->job_experience = $request->input('job_experience');
        $job_experience->is_active = $request->input('is_active');
        $job_experience->is_default = $request->input('is_default');
        $job_experience->save();
    
        return redirect()->route('job_experiences.index')
                        ->with('success','JobExperience created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = JobExperience::find($id);
        return view('admin.job_experiences.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = JobExperience::find($id);    
        return view('admin.job_experiences.edit',compact('data'));
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
            'job_experience' => 'required',
        ]);
    
        // $input = $request->all();
        $job_experience = JobExperience::find($id);
        $job_experience->job_experience = $request->input('job_experience');
        $job_experience->is_active = $request->input('is_active');
        $job_experience->is_default = $request->input('is_default');
        $job_experience->save();

        return redirect()->route('job_experiences.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = JobExperience::find($id);
        $data->delete();
        return redirect()->route('job_experiences.index')->with('info', 'Deleted Successfully.');
    }
}

