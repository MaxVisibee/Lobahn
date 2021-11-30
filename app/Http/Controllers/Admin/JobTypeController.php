<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobType;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class JobTypeController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = JobType::orderBy('id','DESC')->get();
        $data = JobType::all();
        return view('admin.job_types.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.job_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'job_type' => 'required',
        ]);
    
        //$input = $request->all();
        $job_type = new JobType();
        $job_type->job_type = $request->input('job_type');
        $job_type->is_active = $request->input('is_active');
        $job_type->is_default = $request->input('is_default');
        $job_type->save();
    
        return redirect()->route('job_types.index')
                        ->with('success','JobType created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = JobType::find($id);
        return view('admin.job_types.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = JobType::find($id);    
        return view('admin.job_types.edit',compact('data'));
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
            'job_type' => 'required',
        ]);
    
        // $input = $request->all();
        $job_type = JobType::find($id);
        $job_type->job_type = $request->input('job_type');
        $job_type->is_active = $request->input('is_active');
        $job_type->is_default = $request->input('is_default');
        $job_type->save();


        return redirect()->route('job_types.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = JobType::find($id);
        $data->delete();
        return redirect()->route('job_types.index')->with('info', 'Deleted Successfully.');
    }
}

