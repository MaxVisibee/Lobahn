<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

use App\Exports\CountryExport;
use App\Imports\CountryImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Auth;
use App\Traits\ActivityLogTrait;
use Spatie\Activitylog\Models\Activity;

class CountryController extends Controller{
    use ActivityLogTrait;

    public function index(Request $request){
        $data = Country::all();
        return view('admin.countries.index',compact('data'));
    }

    public function create(){
        return view('admin.countries.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'country_name' => 'required',
        ]);
    
        $input = $request->all();
        $country = Country::create($input);
        // $this->log(Auth::user()->name,'add','Added '.$request->country_name.'in conuntries data.');
        return redirect()->route('countries.index')->with('success','Country created successfully');
    }

    public function show($id){
        $data = Country::find($id);
        return view('admin.countries.show',compact('data'));
    }

    public function edit($id)
    {
        $data = Country::find($id);    
        return view('admin.countries.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'country_name' => 'required',
        ]);
    
        $input = $request->all();    
        $country = Country::find($id);
        $old_name = $country->country_name;
        $country->update($input);        
        // $this->log(Auth::user()->name,'update','Updated '.$old_name.' to '.$request->country_name.' in conuntries data.');
        return redirect()->route('countries.index')
                        ->with('success','Updated successfully');
    }

    public function destroy($id){
        $data = Country::find($id);
        $country_name = $data->country_name;
        $data->delete();
        // $this->log(Auth::user()->name,'delete','Deleted '.$country_name.'in conuntries data.');
        return redirect()->route('countries.index')->with('info', 'Deleted Successfully.');
    }

    public function exportExcel()
    {
        // $this->log(Auth::user()->name,'export','Exported the conuntries data.');
        return Excel::download(new CountryExport(), 'countries_'.time().'.xlsx');
    }

    public function importExcel(Request $request)
    {
        // ini_set('max_execution_time', 5000);
        // ini_set('upload_max_filesize', '70000M');
        // ini_set('post_max_size', '70000M');
        // ini_set('memory_limit', '70000M');

        if ($request->hasFile('import_file')) {

        // validate incoming request
        $this->validate($request, [
            'import_file' => 'required|file|mimes:xls,xlsx,csv|max:10240', //max 10Mb
        ]);

            if ($request->file('import_file')->isValid()) {
                Excel::import(new CountryImport, request()->file('import_file'));
            }
        }

        return back()->with('success','Country import successfully');
    }
    
}