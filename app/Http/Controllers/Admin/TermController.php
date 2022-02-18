<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Term;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;
use Illuminate\Support\Arr;

class TermController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = Term::orderBy('id','DESC')->get();
        $data = Term::all();
        return view('admin.terms.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.terms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
        ]);
    
        //$input = $request->all();
        $term               = new Term();
        $term->title        = $request->input('title');
        $term->updated_date = $request->input('updated_date');
        $term->description  = $request->input('description');
        $term->created_by   = Auth::user()->id;
        $term->is_active    = $request->input('is_active');
        $term->is_default   = $request->input('is_default');
        $term->save();
    
        return redirect()->route('terms.index')
                        ->with('success','Term created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Term::find($id);
        return view('admin.terms.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Term::find($id);    
        return view('admin.terms.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
        ]);
    
        // $input = $request->all();
        $term = Term::find($id);
        $term->title        = $request->input('title');
        $term->updated_date = $request->input('updated_date');
        $term->description  = $request->input('description');
        $term->created_by   = Auth::user()->id;
        $term->is_active    = $request->input('is_active');
        $term->is_default   = $request->input('is_default');
        $term->save();


        return redirect()->route('terms.index')
                        ->with('success','Updated successfully');
    }

    public function destroy($id){
        $data = Term::find($id);
        $data->delete();
        return redirect()->route('terms.index')->with('info', 'Deleted Successfully.');
    }
}

