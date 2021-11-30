<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CarrierLevel;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class CarrierLevelController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data = CarrierLevel::all();
        return view('admin.carrier_levels.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.carrier_levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'carrier_level' => 'required',
        ]);
    
        // $input = $request->all();
        $carrier_level = new CarrierLevel();
        $carrier_level->carrier_level = $request->input('carrier_level');
        $carrier_level->is_active = $request->input('is_active');
        $carrier_level->is_default = $request->input('is_default');
        $carrier_level->save();
    
        return redirect()->route('carrier_levels.index')
                        ->with('success','CarrierLevel created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = CarrierLevel::find($id);
        return view('admin.carrier_levels.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = CarrierLevel::find($id);    
        return view('admin.carrier_levels.edit',compact('data'));
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
            'carrier_level' => 'required',
        ]);
    
        // $input = $request->all();
        $carrier_level = CarrierLevel::find($id);
        $carrier_level->carrier_level = $request->input('carrier_level');
        $carrier_level->is_active = $request->input('is_active');
        $carrier_level->is_default = $request->input('is_default');
        $carrier_level->save();

        return redirect()->route('carrier_levels.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = CarrierLevel::find($id);
        $data->delete();
        return redirect()->route('carrier_levels.index')->with('info', 'Deleted Successfully.');
    }
}



