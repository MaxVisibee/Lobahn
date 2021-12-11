<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TechKnowledge;
use App\Models\JobType;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class TechKnowledgeController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = TechKnowledge::orderBy('id','DESC')->get();
        $data = TechKnowledge::all();
        return view('admin.tech_knowledges.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.tech_knowledges.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'tech_name' => 'required',
        ]);
    
        //$input = $request->all();
        $tech = new TechKnowledge();
        $tech->tech_name = $request->input('tech_name');
        $tech->is_active = $request->input('is_active');
        $tech->is_default = $request->input('is_default');
        $tech->save();
    
        return redirect()->route('tech_knowledges.index')
                        ->with('success','JobType created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = TechKnowledge::find($id);
        return view('admin.tech_knowledges.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TechKnowledge::find($id);    
        return view('admin.tech_knowledges.edit',compact('data'));
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
            'tech_name' => 'required',
        ]);
    
        // $input = $request->all();
        $tech = TechKnowledge::find($id);
        $tech->tech_name = $request->input('tech_name');
        $tech->is_active = $request->input('is_active');
        $tech->is_default = $request->input('is_default');
        $tech->save();


        return redirect()->route('tech_knowledges.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = TechKnowledge::find($id);
        $data->delete();
        return redirect()->route('tech_knowledges.index')->with('info', 'Deleted Successfully.');
    }
}


