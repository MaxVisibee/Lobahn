<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Partner;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Image;
use Illuminate\Support\Arr;

class PartnerController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        //$data = Partner::all();
        $data = Partner::orderBy('sorting','Asc')->get();
        return view('admin.partners.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'partner_name' => 'required',
        ]);
    
        //$input = $request->all();
        $partner = new Partner();

        // for image upload
        if ($request->hasFile('partner_logo')) {
            $logo = $request->file('partner_logo');
            $name = $logo->getClientOriginalName();
            $logo->move(public_path().'/uploads/partner_logo', $name);
            //$image->move(public_path('/uploads/partners/'.$name));
            $partner['partner_logo'] = $name;
        }
        $partner->partner_name = $request->input('partner_name');
        $partner->description = $request->input('description');
        $partner->is_active = $request->input('is_active');
        $partner->is_default = $request->input('is_default');
        $partner->save();
    
        return redirect()->route('partners.index')
                        ->with('success','partners created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Partner::find($id);
        return view('admin.partners.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = Partner::find($id);    
        return view('admin.partners.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Partner $partner){
        $this->validate($request, [
            'partner_name' => 'required',
        ]);

        if(isset($request->partner_logo)) {
            $photo = $_FILES['partner_logo'];
            if(!empty($photo['name'])){
                $file_name = $photo['name'].'-'.time().'.'.$request->file('partner_logo')->guessExtension();
                //$file_name = $photo['name'];
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/partner_logo/'.$file_name));
                $img->save(public_path('/uploads/partner_logo/'.$file_name));

                $partner->partner_logo = $file_name;
            }
        }
        $partner->partner_name = $request->input('partner_name');
        $partner->description = $request->input('description');
        $partner->is_active = $request->input('is_active');
        $partner->is_default = $request->input('is_default');
        $partner->update();    

        return redirect()->route('partners.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Partner::find($id);
        $data->delete();
        return redirect()->route('partners.index')->with('info', 'Deleted Successfully.');
    }

    public function sortPartner(Request $request, $id){
        $partner_sort = Partner::find($id);
        \Log::info($partner_sort);
        $partner_sort->sorting = $request->sorting;

        if ($partner_sort->save()) {
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['success'=>false]);
        }
    }
}