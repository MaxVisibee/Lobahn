<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobSkill;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use App\Exports\JobSkillExport;
use App\Imports\JobSkillImport;
use Maatwebsite\Excel\Facades\Excel;

class JobSkillController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = JobSkill::orderBy('id','DESC')->get();
        $data = JobSkill::all();
        return view('admin.job_skills.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.job_skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'job_skill' => 'required',
        ]);    
        // $input = $request->all();
        $job_skill = new JobSkill();
        $job_skill->job_skill = $request->input('job_skill');
        $job_skill->is_active = $request->input('is_active');
        $job_skill->is_default = $request->input('is_default');
        $job_skill->save();
    
        return redirect()->route('job_skills.index')
                        ->with('success','JobSkill created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = JobSkill::find($id);
        return view('admin.job_skills.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = JobSkill::find($id);    
        return view('admin.job_skills.edit',compact('data'));
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
            'job_skill' => 'required',
        ]);
    
        // $input = $request->all();
        $job_skill = JobSkill::find($id);
        $job_skill->job_skill = $request->input('job_skill');
        $job_skill->is_active = $request->input('is_active');
        $job_skill->is_default = $request->input('is_default');
        $job_skill->save();

        return redirect()->route('job_skills.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = JobSkill::find($id);
        $data->delete();
        return redirect()->route('job_skills.index')->with('info', 'Deleted Successfully.');
    }
    public function exportExcel(){
        return Excel::download(new JobSkillExport(), 'software_tech_knowledge_'.time().'.xlsx');
    }

    public function importExcel(Request $request){
        if ($request->hasFile('import_file')) {
        // validate incoming request
        $this->validate($request, [
            'import_file' => 'required|file|mimes:xls,xlsx,csv|max:10240', //max 10Mb
        ]);
            if ($request->file('import_file')->isValid()) {
                Excel::import(new JobSkillImport, request()->file('import_file'));
            }
        }
        return back()->with('success','Software & Teck Knowledge import successfully');
    }
}


