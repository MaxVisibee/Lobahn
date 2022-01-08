<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Geographical;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use App\Exports\GeographicalExport;
use App\Imports\GeographicalImport;
use Maatwebsite\Excel\Facades\Excel;

class GeographicalController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = Geographical::orderBy('id','DESC')->get();
        $data = Geographical::all();
        return view('admin.geographicals.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.geographicals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'geographical_name' => 'required',
        ]);
    
        //$input = $request->all();
        $geo = new Geographical();
        $geo->geographical_name = $request->input('geographical_name');
        $geo->is_active = $request->input('is_active');
        $geo->is_default = $request->input('is_default');
        $geo->save();
    
        return redirect()->route('geographicals.index')
                        ->with('success','JobType created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Geographical::find($id);
        return view('admin.geographicals.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Geographical::find($id);    
        return view('admin.geographicals.edit',compact('data'));
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
            'geographical_name' => 'required',
        ]);
    
        // $input = $request->all();
        $geo = Geographical::find($id);
        $geo->geographical_name = $request->input('geographical_name');
        $geo->is_active = $request->input('is_active');
        $geo->is_default = $request->input('is_default');
        $geo->save();


        return redirect()->route('geographicals.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Geographical::find($id);
        $data->delete();
        return redirect()->route('geographicals.index')->with('info', 'Deleted Successfully.');
    }

    public function exportExcel(){
        return Excel::download(new GeographicalExport(), 'geographical_'.time().'.xlsx');
    }

    public function importExcel(Request $request){
        if ($request->hasFile('import_file')) {
        // validate incoming request
        $this->validate($request, [
            'import_file' => 'required|file|mimes:xls,xlsx,csv|max:10240', //max 10Mb
        ]);
            if ($request->file('import_file')->isValid()) {
                Excel::import(new GeographicalImport, request()->file('import_file'));
            }
        }
        return back()->with('success','Geographical import successfully');
    }
}

