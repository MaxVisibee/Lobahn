<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Speciality;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class SpecialityController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = Speciality::orderBy('id','DESC')->get();
        $data = Speciality::all();
        return view('admin.specialities.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.specialities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'speciality_name' => 'required',
        ]);
    
        //$input = $request->all();
        $speciality = new Speciality();
        $speciality->speciality_name = $request->input('speciality_name');
        $speciality->is_active = $request->input('is_active');
        $speciality->is_default = $request->input('is_default');
        $speciality->save();
    
        return redirect()->route('specialities.index')
                        ->with('success','Speciality created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Speciality::find($id);
        return view('admin.specialities.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Speciality::find($id);    
        return view('admin.specialities.edit',compact('data'));
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
            'speciality_name' => 'required',
        ]);
    
        // $input = $request->all();
        $speciality = Speciality::find($id);
        $speciality->speciality_name = $request->input('speciality_name');
        $speciality->is_active = $request->input('is_active');
        $speciality->is_default = $request->input('is_default');
        $speciality->save();


        return redirect()->route('specialities.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Speciality::find($id);
        $data->delete();
        return redirect()->route('specialities.index')->with('info', 'Deleted Successfully.');
    }
}


