<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobTitle;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use App\Exports\JobTitleExport;
use App\Imports\JobTitleImport;
use Maatwebsite\Excel\Facades\Excel;

class JobTitleController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data = JobTitle::all();
        return view('admin.job_titles.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.job_titles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'job_title' => 'required',
        ]);    
        // $input = $request->all();
        // $opportunity = JobTitle::create($input);
        $job_title = new JobTitle();
        $job_title->job_title = $request->input('job_title');
        $job_title->is_active = $request->input('is_active');
        $job_title->is_default = $request->input('is_default');
        $job_title->save();
    
        return redirect()->route('job_titles.index')
                        ->with('success','JobTitle created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = JobTitle::find($id);
        return view('admin.job_titles.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = JobTitle::find($id);    
        return view('admin.job_titles.edit',compact('data'));
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
            'job_title' => 'required',
        ]);
    
        //$input = $request->all(); 
        $job_title = JobTitle::find($id);
        $job_title->job_title = $request->input('job_title');
        $job_title->is_active = $request->input('is_active');
        $job_title->is_default = $request->input('is_default');
        $job_title->save();

        return redirect()->route('job_titles.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = JobTitle::find($id);
        $data->delete();
        return redirect()->route('job_titles.index')->with('info', 'Deleted Successfully.');
    }

    public function exportExcel(){
        return Excel::download(new JobTitleExport(), 'position_tilte_'.time().'.xlsx');
    }

    public function importExcel(Request $request){
        if ($request->hasFile('import_file')) {
        // validate incoming request
        $this->validate($request, [
            'import_file' => 'required|file|mimes:xls,xlsx,csv|max:10240', //max 10Mb
        ]);
            if ($request->file('import_file')->isValid()) {
                Excel::import(new JobTitleImport, request()->file('import_file'));
            }
        }
        return back()->with('success','Position Title import successfully');
    }
}

