<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banner;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Image;
use Illuminate\Support\Arr;

class BannerController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        $data = Banner::orderBy('sorting','Asc')->get();
        //$data = Banner::all();
        return view('admin.banners.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.banners.create');
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
        $banner = new Banner();

        // for image upload
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/uploads/banner_images', $name);
            //$image->move(public_path('/uploads/banners/'.$name));
            $banner['banner_image'] = $name;
        }
        $banner->title = $request->input('title');
        $banner->description = $request->input('description');
        $banner->is_active = $request->input('is_active');
        $banner->is_default = $request->input('is_default');
        $banner->save();
    
        return redirect()->route('banners.index')
                        ->with('success','banners created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Banner::find($id);
        return view('admin.banners.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = Banner::find($id);    
        return view('admin.banners.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Banner $banner){
        $this->validate($request, [
            'title' => 'required',
        ]);
        // dd($request->all());    
        // $input = $request->all();
        // $banner = Banner::find($id);
        // if ($request->hasFile('banners_image')) {
        //     $image = $request->file('banners_image');
        //     $name = $image->getClientOriginalName();
        //     $image->move(public_path().'/uploads/new_image', $name);
        //     //$image->move(public_path('/uploads/banners/'.$name));
        //     $banner['banners_image'] = $name;
        // }
        // $banner->title = $request->input('title');
        // $banner->description = $request->input('description');
        // $banner->is_active = $request->input('is_active');
        // $banner->is_default = $request->input('is_default');
        // $banner->save();
        if(isset($request->banner_image)) {
            $photo = $_FILES['banner_image'];
            if(!empty($photo['name'])){
                $file_name = $photo['name'].'-'.time().'.'.$request->file('banner_image')->guessExtension();
                //$file_name = $photo['name'];
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/banner_images/'.$file_name));
                $img->save(public_path('/uploads/banner_images/'.$file_name));

                $banner->banner_image = $file_name;
            }
        }
        $banner->title = $request->input('title');
        $banner->description = $request->input('description');
        $banner->is_active = $request->input('is_active');
        $banner->is_default = $request->input('is_default');
        $banner->update();    

        return redirect()->route('banners.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Banner::find($id);
        $data->delete();
        return redirect()->route('banners.index')->with('info', 'Deleted Successfully.');
    }

    public function sortBanner(Request $request, $id){
        $banner_sort = Banner::find($id);
        \Log::info($banner_sort);
        $banner_sort->sorting = $request->sorting;

        if ($banner_sort->save()) {
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['success'=>false]);
        }
    }
}


