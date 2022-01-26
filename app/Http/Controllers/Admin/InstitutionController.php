<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Institution;
use App\Models\Country;
use App\Models\Area;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use App\Exports\InstitutionExport;
use App\Imports\InstitutionImport;
use Maatwebsite\Excel\Facades\Excel;

class InstitutionController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = Institution::orderBy('id','DESC')->get();
        $data = Institution::where('is_active', 1)->get();
        return view('admin.institutions.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
    	$areas      = Area::all();
        $countries  = Country::all();
        return view('admin.institutions.create',compact('areas','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'institution_name' => 'required',
        ]);
    
        //$input = $request->all();
        $institute = new Institution();
        $institute->institution_name = $request->input('institution_name');
        $institute->country_id = $request->input('country_id');
        $institute->area_id = $request->input('area_id');
        $institute->is_active = $request->input('is_active');
        $institute->is_default = $request->input('is_default');
        $institute->save();
    
        return redirect()->route('institutions.index')
                        ->with('success','JobType created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Institution::find($id);
        return view('admin.institutions.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = Institution::find($id);
        $areas      = Area::all();
        $countries  = Country::all();    
        return view('admin.institutions.edit',compact('data','areas','countries'));
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
            'institution_name' => 'required',
        ]);
    
        // $input = $request->all();
        $institute = Institution::find($id);
        $institute->institution_name = $request->input('institution_name');
        $institute->country_id = $request->input('country_id');
        $institute->area_id = $request->input('area_id');
        $institute->is_active = $request->input('is_active');
        $institute->is_default = $request->input('is_default');
        $institute->save();


        return redirect()->route('institutions.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Institution::find($id);
        $data->delete();
        return redirect()->route('institutions.index')->with('info', 'Deleted Successfully.');
    }

    public function exportExcel(){
        return Excel::download(new InstitutionExport(), 'academin_institution_'.time().'.xlsx');
    }

    public function importExcel(Request $request){
        if ($request->hasFile('import_file')) {
        // validate incoming request
        $this->validate($request, [
            'import_file' => 'required|file|mimes:xls,xlsx,csv|max:10240', //max 10Mb
        ]);
            if ($request->file('import_file')->isValid()) {
                Excel::import(new InstitutionImport, request()->file('import_file'));
            }
        }
        return back()->with('success','Academic Institution import successfully');
    }
}


