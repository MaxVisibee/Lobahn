<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DegreeLevel;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class DegreeLevelController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data = DegreeLevel::all();
        return view('admin.degree_levels.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.degree_levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'degree_name' => 'required',
        ]);

        // $input = $request->all();
        // dd($input);
        $degree = new DegreeLevel();
        $degree->degree_name = $request->input('degree_name');
        $degree->is_active = $request->input('is_active');
        $degree->is_default = $request->input('is_default');
        $degree->save();
    
        return redirect()->route('degree_levels.index')
                        ->with('success','DegreeLevel created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = DegreeLevel::find($id);
        return view('admin.degree_levels.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DegreeLevel::find($id);    
        return view('admin.degree_levels.edit',compact('data'));
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
            'degree_name' => 'required',
        ]);

        $degree = DegreeLevel::find($id);
        $degree->degree_name = $request->input('degree_name');
        $degree->is_active = $request->input('is_active');
        $degree->is_default = $request->input('is_default');
        $degree->save();

        return redirect()->route('degree_levels.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = DegreeLevel::find($id);
        $data->delete();
        return redirect()->route('degree_levels.index')->with('info', 'Deleted Successfully.');
    }
}


