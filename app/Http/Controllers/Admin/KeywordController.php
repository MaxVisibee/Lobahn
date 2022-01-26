<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Keyword;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

use App\Exports\KeywordExport;
use App\Imports\KeywordImport;
use Maatwebsite\Excel\Facades\Excel;

class KeywordController extends Controller{
    /**
     * Display a listing of the resource.
     
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = Keyword::orderBy('id','DESC')->get();
        $data = Keyword::where('is_active', 1)->get();
        return view('admin.keywords.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.keywords.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'keyword_name' => 'required',
        ]);
    
        //$input = $request->all();
        $keyword = new Keyword();
        $keyword->keyword_name = $request->input('keyword_name');
        $keyword->is_active = $request->input('is_active');
        $keyword->is_default = $request->input('is_default');
        $keyword->save();
    
        return redirect()->route('keywords.index')
                        ->with('success','Keyword created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Keyword::find($id);
        return view('admin.keywords.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Keyword::find($id);    
        return view('admin.keywords.edit',compact('data'));
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
            'keyword_name' => 'required',
        ]);
    
        // $input = $request->all();
        $keyword = Keyword::find($id);
        $keyword->keyword_name = $request->input('keyword_name');
        $keyword->is_active = $request->input('is_active');
        $keyword->is_default = $request->input('is_default');
        $keyword->save();


        return redirect()->route('keywords.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Keyword::find($id);
        $data->delete();
        return redirect()->route('keywords.index')->with('info', 'Deleted Successfully.');
    }

    public function exportExcel()
    {
        return Excel::download(new KeywordExport(), 'keyword_'.time().'.xlsx');
    }

    public function importExcel(Request $request)
    {

        if ($request->hasFile('import_file')) {

        // validate incoming request
        $this->validate($request, [
            'import_file' => 'required|file|mimes:xls,xlsx,csv|max:10240', //max 10Mb
        ]);

            if ($request->file('import_file')->isValid()) {
                Excel::import(new KeywordImport, request()->file('import_file'));
            }
        }

        return back()->with('success','Keyword import successfully');
    }

}

