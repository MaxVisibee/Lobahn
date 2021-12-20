<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\Area;
use App\Models\District;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class DistrictController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $countries = Country::pluck('country_name','id')->toArray();
        $states = Area::pluck('area_name','id')->toArray();        
        
        return view('admin.districts.index', compact('countries','states'));

        // $data = District::where('deleted_at',NULL);
        // $countries = Country::all();
        // $areas     = Area::all();

        // if($request->has('area_id') && isset($request->area_id)) {
        //     $area = $request->area_id;
        //     $data->where('area_id',$area);
        // }else{
        //     $data->where('area_id',1636);
        // }
        // $data = $data->orderBy('created_at', 'desc')->get();
        
        // return view('admin.districts.index', compact('data','countries','areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
    	// $areas = Area::all()->pluck('area_name', 'id');
        $countries = Country::all();
        $areas = Area::where('country_id', $countries[0]->id)->get();
        return view('admin.districts.create',compact('areas','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'district_name' => 'required',
        ]);
    
        $input = $request->all();
        $district = District::create($input);
    
        return redirect()->route('districts.index')
                        ->with('success','District created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = District::find($id);
        return view('admin.districts.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = District::find($id); 
        // $areas = Area::all();
        // $countries = Country::all();
        $countries = Country::pluck('country_name','id')->toArray();
        $areas = Area::where('id', $data->area_id)->pluck('area_name','id')->toArray();

        $selected_area = Area::where('id', $data->area_id)->first();

        return view('admin.districts.edit',compact('data','areas','countries','selected_area'));
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
            'district_name' => 'required',
        ]);
    
        $input = $request->all();
        $district = District::find($id);
        $district->update($input);

        return redirect()->route('districts.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = District::find($id);
        $data->delete();
        return redirect()->route('districts.index')->with('info', 'Deleted Successfully.');
    }
}


