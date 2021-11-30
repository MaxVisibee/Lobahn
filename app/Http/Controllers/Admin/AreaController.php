<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Area;
use App\Models\Country;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class AreaController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        // $data = Area::all();
        $data = Area::where('deleted_at',NULL);
        $countries = Country::all();

        if($request->has('country_id') && isset($request->country_id)) {
            $country = $request->country_id;
            $data->where('country_id',$country);
        }

        $data = $data->orderBy('created_at', 'desc')->get();
        return view('admin.areas.index',compact('data','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $countries = Country::all();
        return view('admin.areas.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'area_name' => 'required',
        ]);
    
        $input = $request->all();
        $area = Area::create($input);
    
        return redirect()->route('areas.index')
                        ->with('success','Area created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Area::find($id);
        return view('admin.areas.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Area::find($id);
        $countries = Country::all();    
        return view('admin.areas.edit',compact('data','countries'));
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
            'area_name' => 'required',
        ]);
    
        $input = $request->all();    
        $area = Area::find($id);
        $area->update($input);

        return redirect()->route('areas.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Area::find($id);
        $data->delete();
        return redirect()->route('areas.index')->with('info', 'Deleted Successfully.');
    }
}


