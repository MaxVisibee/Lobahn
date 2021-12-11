<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KeyStrength;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class KeyStrengthController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = KeyStrength::orderBy('id','DESC')->get();
        $data = KeyStrength::all();
        return view('admin.key_strengths.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.key_strengths.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'key_strength_name' => 'required',
        ]);
    
        //$input = $request->all();
        $key_strenght = new KeyStrength();
        $key_strenght->key_strength_name = $request->input('key_strength_name');
        $key_strenght->is_active = $request->input('is_active');
        $key_strenght->is_default = $request->input('is_default');
        $key_strenght->save();
    
        return redirect()->route('key_strengths.index')
                        ->with('success','JobType created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = KeyStrength::find($id);
        return view('admin.key_strengths.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = KeyStrength::find($id);    
        return view('admin.key_strengths.edit',compact('data'));
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
            'key_strength_name' => 'required',
        ]);
    
        // $input = $request->all();
        $key_strength = KeyStrength::find($id);
        $key_strength->key_strength_name = $request->input('key_strength_name');
        $key_strength->is_active = $request->input('is_active');
        $key_strength->is_default = $request->input('is_default');
        $key_strength->save();


        return redirect()->route('key_strengths.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = KeyStrength::find($id);
        $data->delete();
        return redirect()->route('key_strengths.index')->with('info', 'Deleted Successfully.');
    }
}

