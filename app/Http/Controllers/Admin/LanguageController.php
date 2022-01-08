<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Language;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use App\Exports\LanguageExport;
use App\Imports\LanguageImport;
use Maatwebsite\Excel\Facades\Excel;

class LanguageController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = Language::orderBy('id','DESC')->get();
        $data = Language::all();
        return view('admin.languages.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'language_name' => 'required',
        ]);
    
        //$input = $request->all();
        $language = new Language();
        $language->language_name = $request->input('language_name');
        $language->is_active = $request->input('is_active');
        $language->is_default = $request->input('is_default');
        $language->save();
    
        return redirect()->route('languages.index')
                        ->with('success','Language created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Language::find($id);
        return view('admin.languages.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Language::find($id);    
        return view('admin.languages.edit',compact('data'));
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
            'language_name' => 'required',
        ]);
    
        // $input = $request->all();
        $language = Language::find($id);
        $language->language_name = $request->input('language_name');
        $language->is_active = $request->input('is_active');
        $language->is_default = $request->input('is_default');
        $language->save();


        return redirect()->route('languages.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Language::find($id);
        $data->delete();
        return redirect()->route('languages.index')->with('info', 'Deleted Successfully.');
    }

    public function exportExcel(){
        return Excel::download(new LanguageExport(), 'language_'.time().'.xlsx');
    }

    public function importExcel(Request $request){
        if ($request->hasFile('import_file')) {
        // validate incoming request
        $this->validate($request, [
            'import_file' => 'required|file|mimes:xls,xlsx,csv|max:10240', //max 10Mb
        ]);
            if ($request->file('import_file')->isValid()) {
                Excel::import(new LanguageImport, request()->file('import_file'));
            }
        }
        return back()->with('success','Language import successfully');
    }
}

