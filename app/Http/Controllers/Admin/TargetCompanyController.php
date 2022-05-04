<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TargetCompany;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use App\Exports\TargetCompanyExport;
use App\Imports\TargetCompanyImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Arr;

class TargetCompanyController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = StudyField::orderBy('id','DESC')->get();
        $data = TargetCompany::all();
        return view('admin.target_company.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.target_company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'company_name' => 'required',
        ]);
    
        //$input = $request->all();
        $target_company = new TargetCompany();
        $target_company->company_name = $request->input('company_name');
        $target_company->is_active = $request->input('is_active');
        $target_company->save();
    
        return redirect()->route('target_companies.index')
                        ->with('success','Target Company created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = TargetCompany::find($id);
        return view('admin.target_company.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TargetCompany::find($id);    
        return view('admin.target_company.edit',compact('data'));
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
            'company_name' => 'required',
        ]);
    
        // $input = $request->all();
        $target_company = TargetCompany::find($id);
        $target_company->company_name = $request->input('company_name');
        $target_company->is_active = $request->input('is_active');
        $target_company->save();


        return redirect()->route('target_companies.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = TargetCompany::find($id);
        $data->delete();
        return redirect()->route('target_companies.index')->with('info', 'Deleted Successfully.');
    }

    public function exportExcel()
    {
        return Excel::download(new TargetCompanyExport(), 'target_companies_'.time().'.xlsx');
    }

    public function importExcel(Request $request)
    {

        if ($request->hasFile('import_file')) {

        // validate incoming request
        $this->validate($request, [
            'import_file' => 'required|file|mimes:xls,xlsx,csv|max:10240', //max 10Mb
        ]);

            if ($request->file('import_file')->isValid()) {
                Excel::import(new TargetCompanyImport, request()->file('import_file'));
            }
        }

        return back()->with('success','Target Company import successfully');
    }

}


