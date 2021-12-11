<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobFunction;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class JobFunctionController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = JobFunction::orderBy('id','DESC')->get();
        $data = JobFunction::all();
        return view('admin.job_functions.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.job_functions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'function_name' => 'required',
        ]);
    
        //$input = $request->all();
        $job_function = new JobFunction();
        $job_function->function_name = $request->input('function_name');
        $job_function->is_active = $request->input('is_active');
        $job_function->is_default = $request->input('is_default');
        $job_function->save();
    
        return redirect()->route('job_functions.index')
                        ->with('success','job_function created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = JobFunction::find($id);
        return view('admin.job_functions.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = JobFunction::find($id);    
        return view('admin.job_functions.edit',compact('data'));
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
            'function_name' => 'required',
        ]);
    
        // $input = $request->all();
        $job_function = JobFunction::find($id);
        $job_function->function_name = $request->input('function_name');
        $job_function->is_active = $request->input('is_active');
        $job_function->is_default = $request->input('is_default');
        $job_function->save();


        return redirect()->route('job_functions.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = JobFunction::find($id);
        $data->delete();
        return redirect()->route('job_functions.index')->with('info', 'Deleted Successfully.');
    }
}


