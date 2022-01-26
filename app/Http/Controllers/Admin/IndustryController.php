<?php

namespace App\Http\Controllers\Admin;

use App\Models\Industry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\IndustryExport;
use App\Imports\IndustryImport;
use Maatwebsite\Excel\Facades\Excel;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:industry-list|industry-create|industry-edit|industry-delete', ['only' => ['index','store']]);
        $this->middleware('permission:industry-create', ['only' => ['create','store']]);
        $this->middleware('permission:industry-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:industry-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industries = Industry::All();

        return view('admin.industries.index', compact('industries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.industries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'industry_name' => 'required',
        ]);

        $input = $request->except(['_token']);

        $industry = Industry::create($input);
        
        return redirect()->route('industries.index')->with('success', 'Industry created successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function show(Industry $industry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function edit(Industry $industry)
    {
        return view('admin.industries.edit', compact('industry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Industry $industry)
    {
        $this->validate($request, [
            'industry_name' => 'required',
        ]);

        $input = $request->except(['_token']);

        $industry->update($input);
        
        return redirect()->route('industries.index')->with('success', 'Industry updated successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Industry $industry)
    {
        $industry->delete();

        return redirect()->route('industries.index')->with('success', 'Industry deleted successful!');
    }

    public function exportExcel(){
        return Excel::download(new IndustryExport(), 'industry_'.time().'.xlsx');
    }

    public function importExcel(Request $request){
        if ($request->hasFile('import_file')) {
        // validate incoming request
        $this->validate($request, [
            'import_file' => 'required|file|mimes:xls,xlsx,csv|max:10240', //max 10Mb
        ]);
            if ($request->file('import_file')->isValid()) {
                Excel::import(new IndustryImport, request()->file('import_file'));
            }
        }
        return back()->with('success','Industry Import successfully');
    }
}