<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Privacy;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;
use Illuminate\Support\Arr;

class PrivacyController extends Controller{

    public function index(Request $request){    	
        // $data = Privacy::orderBy('id','DESC')->get();
        $data = Privacy::all();
        return view('admin.privacies.index',compact('data'));
    }

    public function create(){
        return view('admin.privacies.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
        ]);
    
        //$input = $request->all();
        $term = new Privacy();
        $term->title       = $request->input('title');
        $term->updated_date= $request->input('updated_date');
        $term->description = $request->input('description');
        $term->created_by  = Auth::user()->id;
        $term->is_active   = $request->input('is_active');
        $term->is_default  = $request->input('is_default');
        $term->save();
    
        return redirect()->route('privacies.index')
                        ->with('success','Term created successfully');
    }

    public function show($id){
        $data = Privacy::find($id);
        return view('admin.privacies.show',compact('data'));
    }

    public function edit($id)
    {
        $data = Privacy::find($id);    
        return view('admin.privacies.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
        ]);
        $term = Privacy::find($id);
        $term->title      = $request->input('title');
        $term->updated_date= $request->input('updated_date');
        $term->description= $request->input('description');
        $term->created_by = Auth::user()->id;
        $term->is_active  = $request->input('is_active');
        $term->is_default = $request->input('is_default');
        $term->save();

        return redirect()->route('privacies.edit',$term->id)
                        ->with('success','Updated successfully');
    }

    public function destroy($id){
        $data = Privacy::find($id);
        $data->delete();
        return redirect()->route('privacies.index')->with('info', 'Deleted Successfully.');
    }
}

