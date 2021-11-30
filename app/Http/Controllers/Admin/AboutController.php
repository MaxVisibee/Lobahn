<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\About;
use Spatie\Permission\Models\Role;
use Image;
use DB;
use Hash;
use Illuminate\Support\Arr;

class AboutController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = About::orderBy('id','DESC')->get();
        $data = About::all();
        return view('admin.abouts.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.abouts.create');
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
        $about = new About();

        // for image upload
        if ($request->hasFile('about_image')) {
            $image = $request->file('about_image');
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/uploads/about', $name);
            //$image->move(public_path('/uploads/abouts/'.$name));
            $about['about_image'] = $name;
        }
        $about->title = $request->input('title');
        $about->description = $request->input('description');
        $about->is_active = $request->input('is_active');
        $about->is_default = $request->input('is_default');
        $about->save();
    
        return redirect()->route('abouts.index')
                        ->with('success','abouts created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = About::find($id);
        return view('admin.abouts.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = About::find($id);    
        return view('admin.abouts.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,About $about){
        $this->validate($request, [
            'title' => 'required',
        ]);
        
        if(isset($request->about_image)){
            $photo = $_FILES['about_image'];
            if(!empty($photo['name'])){
                $file_name = $photo['name'].'-'.time().'.'.$request->file('about_image')->guessExtension();
                //$file_name = $photo['name'];
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/about/'.$file_name));
                $img->save(public_path('/uploads/about/'.$file_name));
                $about->about_image = $file_name;
            }
        }
        $about->title = $request->input('title');
        $about->description = $request->input('description');
        $about->is_active = $request->input('is_active');
        $about->is_default = $request->input('is_default');
        $about->update();    

        return redirect()->route('abouts.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = About::find($id);
        $data->delete();
        return redirect()->route('abouts.index')->with('info', 'Deleted Successfully.');
    }
}


