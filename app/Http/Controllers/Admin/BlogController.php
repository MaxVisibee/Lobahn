<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use Spatie\Permission\Models\Role;
use Image;
use DB;
use Hash;
use Illuminate\Support\Arr;

class BlogController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = blog::orderBy('id','DESC')->get();
        $data = Blog::all();
        return view('admin.blogs.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.blogs.create');
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
        $blog = new Blog();

        // for image upload
        if ($request->hasFile('blog_image')) {
            $image = $request->file('blog_image');
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/uploads/blog', $name);
            //$image->move(public_path('/uploads/blogs/'.$name));
            $blog['blog_image'] = $name;
        }
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->is_active = $request->input('is_active');
        $blog->is_default = $request->input('is_default');
        $blog->save();
    
        return redirect()->route('blogs.index')
                        ->with('success','blogs created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Blog::find($id);
        return view('admin.blogs.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = Blog::find($id);    
        return view('admin.blogs.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Blog $blog){
        $this->validate($request, [
            'title' => 'required',
        ]);
        
        if(isset($request->blog_image)){
            $photo = $_FILES['blog_image'];
            if(!empty($photo['name'])){
                $file_name = $photo['name'].'-'.time().'.'.$request->file('blog_image')->guessExtension();
                //$file_name = $photo['name'];
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/blog/'.$file_name));
                $img->save(public_path('/uploads/blog/'.$file_name));
                $blog->blog_image = $file_name;
            }
        }
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->is_active = $request->input('is_active');
        $blog->is_default = $request->input('is_default');
        $blog->update();    

        return redirect()->route('blogs.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Blog::find($id);
        $data->delete();
        return redirect()->route('blogs.index')->with('info', 'Deleted Successfully.');
    }
}


