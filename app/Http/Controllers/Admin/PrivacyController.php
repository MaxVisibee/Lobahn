<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Privacy;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class PrivacyController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = Privacy::orderBy('id','DESC')->get();
        $data = Privacy::all();
        return view('admin.privacies.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.privacies.create');
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
        $term = new Privacy();
        $term->title       = $request->input('title');
        $term->description = $request->input('description');
        $term->created_by  = $request->input('created_by');
        $term->is_active   = $request->input('is_active');
        $term->is_default  = $request->input('is_default');
        $term->save();
    
        return redirect()->route('privacies.index')
                        ->with('success','Term created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Privacy::find($id);
        return view('admin.privacies.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Privacy::find($id);    
        return view('admin.privacies.edit',compact('data'));
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
            'title' => 'required',
        ]);
    
        // $input = $request->all();
        $term = Privacy::find($id);
        $term->title      = $request->input('title');
        $term->description= $request->input('description');
        $term->created_by = $request->input('created_by');
        $term->is_active  = $request->input('is_active');
        $term->is_default = $request->input('is_default');
        $term->save();


        return redirect()->route('privacies.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Privacy::find($id);
        $data->delete();
        return redirect()->route('privacies.index')->with('info', 'Deleted Successfully.');
    }
}

