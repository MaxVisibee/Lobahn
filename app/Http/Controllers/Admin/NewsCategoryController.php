<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NewsCategory;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class NewsCategoryController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = NewsCategory::orderBy('id','DESC')->get();
        $data = NewsCategory::all();
        return view('admin.news_categories.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.news_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'category_name' => 'required',
        ]);
    
        //$input = $request->all();
        $category = new NewsCategory();
        $category->category_name = $request->input('category_name');
        $category->is_active = $request->input('is_active');
        $category->is_default = $request->input('is_default');
        $category->save();
    
        return redirect()->route('news_categories.index')
                        ->with('success','JobType created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = NewsCategory::find($id);
        return view('admin.news_categories.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = NewsCategory::find($id);    
        return view('admin.news_categories.edit',compact('data'));
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
            'category_name' => 'required',
        ]);
    
        // $input = $request->all();
        $category = NewsCategory::find($id);
        $category->category_name = $request->input('category_name');
        $category->is_active = $request->input('is_active');
        $category->is_default = $request->input('is_default');
        $category->save();


        return redirect()->route('news_categories.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = NewsCategory::find($id);
        $data->delete();
        return redirect()->route('news_categories.index')->with('info', 'Deleted Successfully.');
    }
}


