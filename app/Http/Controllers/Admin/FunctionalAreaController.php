<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FunctionalArea;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use App\Exports\FunctionalAreaExport;
use App\Imports\FunctionalAreaImport;
use Maatwebsite\Excel\Facades\Excel;

class FunctionalAreaController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data = FunctionalArea::all();
        return view('admin.functional_areas.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.functional_areas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'area_name' => 'required',
        ]);
    
        //$input = $request->all();
        $area = new FunctionalArea();
        $area->area_name = $request->input('area_name');
        $area->is_active = $request->input('is_active');
        $area->is_default = $request->input('is_default');
        $area->save();
    
        return redirect()->route('functional_areas.index')
                        ->with('success','FunctionalArea created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = FunctionalArea::find($id);
        return view('admin.functional_areas.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = FunctionalArea::find($id);    
        return view('admin.functional_areas.edit',compact('data'));
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
            'area_name' => 'required',
        ]);

        $area = FunctionalArea::find($id);
        $area->area_name = $request->input('area_name');
        $area->is_active = $request->input('is_active');
        $area->is_default = $request->input('is_default');
        $area->save();

        return redirect()->route('functional_areas.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = FunctionalArea::find($id);
        $data->delete();
        return redirect()->route('functional_areas.index')->with('info', 'Deleted Successfully.');
    }

    public function exportExcel(){
        return Excel::download(new FunctionalAreaExport(), 'functional_area_'.time().'.xlsx');
    }

    public function importExcel(Request $request){
        if ($request->hasFile('import_file')) {
        // validate incoming request
        $this->validate($request, [
            'import_file' => 'required|file|mimes:xls,xlsx,csv|max:10240', //max 10Mb
        ]);
            if ($request->file('import_file')->isValid()) {
                Excel::import(new FunctionalAreaImport, request()->file('import_file'));
            }
        }
        return back()->with('success','Functional Area Import successfully');
    }
}


