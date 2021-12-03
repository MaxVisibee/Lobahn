<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudyField;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class StudyFieldController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = StudyField::orderBy('id','DESC')->get();
        $data = StudyField::all();
        return view('admin.study_fields.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.study_fields.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'study_field_name' => 'required',
        ]);
    
        //$input = $request->all();
        $job_type = new StudyField();
        $job_type->study_field_name = $request->input('study_field_name');
        $job_type->is_active = $request->input('is_active');
        $job_type->is_default = $request->input('is_default');
        $job_type->save();
    
        return redirect()->route('study_fields.index')
                        ->with('success','Study Field created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = StudyField::find($id);
        return view('admin.study_fields.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = StudyField::find($id);    
        return view('admin.study_fields.edit',compact('data'));
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
            'study_field_name' => 'required',
        ]);
    
        // $input = $request->all();
        $sector = StudyField::find($id);
        $sector->study_field_name = $request->input('study_field_name');
        $sector->is_active = $request->input('is_active');
        $sector->is_default = $request->input('is_default');
        $sector->save();


        return redirect()->route('study_fields.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = StudyField::find($id);
        $data->delete();
        return redirect()->route('study_fields.index')->with('info', 'Deleted Successfully.');
    }
}


