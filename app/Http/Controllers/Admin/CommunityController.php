<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Community;
use App\Models\CommunityImage;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class CommunityController extends Controller{

    public function index(Request $request){    	
         $data = Community::latest('created_at')->get();
        return view('admin.communities.index',compact('data'));
    }

    public function approve(Request $request)
    {
        $posts = explode(",",$request->selected);
        foreach($posts as $key=>$value)
        {
            $community = Community::where('id',intval($value))->first(); 
            $community->approved = true;
            $community->save();
        }
        return redirect()->back();
    }

    public function unApprove(Request $request)
    {
        $posts = explode(",",$request->selected);
        foreach($posts as $key=>$value)
        {
            $community = Community::where('id',intval($value))->first(); 
            $community->approved = false;
            $community->save();
        }
        return redirect()->back();
    }

    public function create(){
        $users = User::all();
        return view('admin.communities.create',compact('users'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
        ]);

        $community_image =[];
        $input =$request->except(['image']);

        $community = Community::create($input);
        if($request->hasfile('image')){
            $data = [];
            foreach($request->file('image') as $index => $file){
                // $name = $file->getClientOriginalName().'.'.$file->extension();
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/storage/community_image/', $name);
                $comm_image= new CommunityImage();
                $comm_image->image= $name;
                $comm_image->community_id = $community->id;
                // $comm_image->image = $data[$index];

                $comm_image->save(); 
            }
         }
        return redirect()->route('communities.index')
                        ->with('success','Term created successfully');
    }

    public function show($id){
        $data = Community::find($id);
        return view('admin.communities.show',compact('data'));
    }

    public function edit($id){
        $data = Community::find($id);
        $users = User::all();
        $files =  DB::table('community_images')->where('community_id',$id)->get();
        return view('admin.communities.edit',compact('data','files','users'));
    }

    public function update(Request $request,Community $community){
        $this->validate($request, [
            'title' => 'required',
        ]);
    
        // $input = $request->all();
        // $community = Community::find($id);
        // $community->title      = $request->input('title');
        // $community->description= $request->input('description');
        // $community->created_by = $request->input('created_by');
        // $community->is_active  = $request->input('is_active');
        // $community->is_default = $request->input('is_default');
        // $community->save();

        $community_image =[];
        $input =$request->except(['image']);

        $community->update($input);

        if($request->hasfile('image')){            
            $image = $request->image;
            foreach($request->image as $index => $title){
                $fileObject= CommunityImage::find($index) ?? new CommunityImage ;
                $fileObject->community_id = $community->id;
                // $fileObject->pdf_title = $pdf_title[$index];
                if(isset($image[$index])){
                    $file = $image[$index];
                    $name = $file->getClientOriginalName();
                    $file->move(public_path().'/storage/community_image/', $name);
                    $fileObject->image= $name;
                }
                $fileObject->save();
            }
        }
        return redirect()->route('communities.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Community::find($id);
        $data->delete();
        return redirect()->route('communities.index')->with('info', 'Deleted Successfully.');
    }

    public function deleteimage($id){
        \Log::info($id);
        CommunityImage::find($id)->delete($id);  
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function approved(Request $request, $id){
        $community = Community::find($id);

        $community->approved = $request->data;

        if ($community->save()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}