<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobType;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

use App\Exports\JobTypeExport;
use App\Imports\JobTypeImport;
use Maatwebsite\Excel\Facades\Excel;

class JobTypeController extends Controller{

    function __construct(){
        // $this->middleware('auth');
        // $this->middleware('permission:job_type-list|job_type-create|job_type-edit|job_type-delete', ['only' => ['index','store']]);
        // $this->middleware('permission:job_type-create', ['only' => ['create','store']]);
        // $this->middleware('permission:job_type-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:job_type-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = JobType::orderBy('id','DESC')->get();
        $data = JobType::where('is_active', 1)->get();
        return view('admin.job_types.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.job_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'job_type' => 'required',
        ]);
    
        //$input = $request->all();
        $job_type = new JobType();
        $job_type->job_type = $request->input('job_type');
        $job_type->is_active = $request->input('is_active');
        $job_type->is_default = $request->input('is_default');
        $job_type->save();
    
        return redirect()->route('job_types.index')
                        ->with('success','JobType created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = JobType::find($id);
        return view('admin.job_types.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = JobType::find($id);    
        return view('admin.job_types.edit',compact('data'));
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
            'job_type' => 'required',
        ]);
    
        // $input = $request->all();
        $job_type = JobType::find($id);
        $job_type->job_type = $request->input('job_type');
        $job_type->is_active = $request->input('is_active');
        $job_type->is_default = $request->input('is_default');
        $job_type->save();


        return redirect()->route('job_types.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = JobType::find($id);
        $data->delete();
        return redirect()->route('job_types.index')->with('info', 'Deleted Successfully.');
    }

    public function exportExcel()
    {
        return Excel::download(new JobTypeExport(), 'contract_terms_'.time().'.xlsx');
    }

    public function importExcel(Request $request)
    {

        if ($request->hasFile('import_file')) {

        // validate incoming request
        $this->validate($request, [
            'import_file' => 'required|file|mimes:xls,xlsx,csv|max:10240', //max 10Mb
        ]);

            if ($request->file('import_file')->isValid()) {
                Excel::import(new JobTypeImport, request()->file('import_file'));
            }
        }

        return back()->with('success','Contract Term import successfully');
    }

}