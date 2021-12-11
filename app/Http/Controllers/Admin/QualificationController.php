<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Qualification;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class QualificationController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = Qualification::orderBy('id','DESC')->get();
        $data = Qualification::all();
        return view('admin.qualifications.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.qualifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'qualification_name' => 'required',
        ]);
    
        //$input = $request->all();
        $qualify = new Qualification();
        $qualify->qualification_name = $request->input('qualification_name');
        $qualify->is_active = $request->input('is_active');
        $qualify->is_default = $request->input('is_default');
        $qualify->save();
    
        return redirect()->route('qualifications.index')
                        ->with('success','Qualification created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Qualification::find($id);
        return view('admin.qualifications.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = Qualification::find($id);    
        return view('admin.qualifications.edit',compact('data'));
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
            'qualification_name' => 'required',
        ]);
    
        // $input = $request->all();
        $qualification = Qualification::find($id);
        $qualification->qualification_name = $request->input('qualification_name');
        $qualification->is_active = $request->input('is_active');
        $qualification->is_default = $request->input('is_default');
        $qualification->save();


        return redirect()->route('qualifications.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Qualification::find($id);
        $data->delete();
        return redirect()->route('qualifications.index')->with('info', 'Deleted Successfully.');
    }
}

