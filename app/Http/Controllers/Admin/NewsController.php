<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;
use App\Models\NewsCategory;
use Spatie\Permission\Models\Role;
use Image;
use DB;
use Hash;
use Illuminate\Support\Arr;

class NewsController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = News::orderBy('id','DESC')->get();
        $data = News::all();
        return view('admin.news.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categories = NewsCategory::all();
        return view('admin.news.create',compact('categories'));
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
        $new = new News();

        // for image upload
        if ($request->hasFile('news_image')) {
            $image = $request->file('news_image');
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/uploads/new_image', $name);
            //$image->move(public_path('/uploads/news/'.$name));
            $new['news_image'] = $name;
        }
        $new->title = $request->input('title');
        $new->category_id = $request->input('category_id');
        $new->created_by = $request->input('created_by');
        $new->description = $request->input('description');
        $new->is_active = $request->input('is_active');
        $new->is_default = $request->input('is_default');
        $new->save();
    
        return redirect()->route('news.index')
                        ->with('success','News created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = News::find($id);
        return view('admin.news.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = News::find($id);
        $categories = NewsCategory::all();   
        return view('admin.news.edit',compact('data','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,News $news){
        $this->validate($request, [
            'title' => 'required',
        ]);
        
        if(isset($request->news_image)){
            $photo = $_FILES['news_image'];
            if(!empty($photo['name'])){
                // $file_name = $photo['name'].'-'.time().'.'.$request->file('news_image')->guessExtension();
                $file_name = $photo['name'];
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                //$img->resize(300, 300)->save(public_path('/uploads/new_image/'.$file_name));
                $img->save(public_path('/uploads/new_image/'.$file_name));
                $news->news_image = $file_name;
            }
        }

        if ($request->hasFile('news_image')) {
            $image = $request->file('news_image');
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/uploads/new_image', $name);
            //$image->move(public_path('/uploads/news/'.$name));
            $new['news_image'] = $name;
        }

        $news->title = $request->input('title');
        $news->category_id = $request->input('category_id');
        $news->created_by = $request->input('created_by');
        $news->description = $request->input('description');
        $news->is_active = $request->input('is_active');
        $news->is_default = $request->input('is_default');
        $news->update();    

        return redirect()->route('news.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = News::find($id);
        $data->delete();
        return redirect()->route('news.index')->with('info', 'Deleted Successfully.');
    }
}

