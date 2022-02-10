<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobShift;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

use App\Exports\JobShiftExport;
use App\Imports\JobShiftImport;
use Maatwebsite\Excel\Facades\Excel;

class JobShiftController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data = JobShift::all();
        return view('admin.job_shifts.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.job_shifts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'job_shift' => 'required',
        ]);

        $job_shift = new JobShift();
        $job_shift->job_shift = $request->input('job_shift');
        // $job_shift->is_active = $request->input('is_active');
        $job_shift->is_default = $request->input('is_default');
        $job_shift->save();
    
        return redirect()->route('job_shifts.index')
                        ->with('success','JobShift created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = JobShift::find($id);
        return view('admin.job_shifts.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = JobShift::find($id);    
        return view('admin.job_shifts.edit',compact('data'));
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
            'job_shift' => 'required',
        ]);

        $job_shift = JobShift::find($id);
        $job_shift->job_shift = $request->input('job_shift');
        // $job_shift->is_active = $request->input('is_active');
        $job_shift->is_default = $request->input('is_default');
        $job_shift->save();

        return redirect()->route('job_shifts.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = JobShift::find($id);
        $data->delete();
        return redirect()->route('job_shifts.index')->with('info', 'Deleted Successfully.');
    }

    public function exportExcel()
    {
        return Excel::download(new JobShiftExport(), 'contract_hour_'.time().'.xlsx');
    }

    public function importExcel(Request $request)
    {

        if ($request->hasFile('import_file')) {

        // validate incoming request
        $this->validate($request, [
            'import_file' => 'required|file|mimes:xls,xlsx,csv|max:10240', //max 10Mb
        ]);

            if ($request->file('import_file')->isValid()) {
                Excel::import(new JobShiftImport, request()->file('import_file'));
            }
        }

        return back()->with('success','Contract Hour import successfully');
    }
}