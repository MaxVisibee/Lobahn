<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SubSector;
use App\Models\Industry;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class SubSectorController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = JobType::orderBy('id','DESC')->get();
        $data = SubSector::all();
        return view('admin.sub_sectors.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $industries = Industry::all();
        return view('admin.sub_sectors.create',compact('industries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'sub_sector_name' => 'required',
        ]);
    
        //$input = $request->all();
        $sector = new SubSector();
        $sector->sub_sector_name = $request->input('sub_sector_name');
        $sector->industry_id = $request->input('industry_id');
        $sector->is_active = $request->input('is_active');
        $sector->is_default = $request->input('is_default');
        $sector->save();
    
        return redirect()->route('sub_sectors.index')
                        ->with('success','Sub Sector created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = SubSector::find($id);
        return view('admin.sub_sectors.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = SubSector::find($id); 
        $industries = Industry::all();   
        return view('admin.sub_sectors.edit',compact('data','industries'));
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
            'sub_sector_name' => 'required',
        ]);
    
        // $input = $request->all();
        $sector = SubSector::find($id);
        $sector->sub_sector_name = $request->input('sub_sector_name');
        $sector->industry_id = $request->input('industry_id');
        $sector->is_active = $request->input('is_active');
        $sector->is_default = $request->input('is_default');
        $sector->save();


        return redirect()->route('sub_sectors.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = SubSector::find($id);
        $data->delete();
        return redirect()->route('sub_sectors.index')->with('info', 'Deleted Successfully.');
    }
}


