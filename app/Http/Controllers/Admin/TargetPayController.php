<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TargetPay;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class TargetPayController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = JobType::orderBy('id','DESC')->get();
        $data = TargetPay::all();
        return view('admin.target_pays.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.target_pays.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'target_amount' => 'required',
        ]);
    
        //$input = $request->all();
        $target = new TargetPay();
        $target->target_amount = $request->input('target_amount');
        $target->is_active = $request->input('is_active');
        $target->is_default = $request->input('is_default');
        $target->save();
    
        return redirect()->route('target_pays.index')
                        ->with('success','TargetPay created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = TargetPay::find($id);
        return view('admin.target_pays.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TargetPay::find($id);    
        return view('admin.target_pays.edit',compact('data'));
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
            'target_amount' => 'required',
        ]);
    
        // $input = $request->all();
        $target = TargetPay::find($id);
        $target->target_amount = $request->input('target_amount');
        $target->is_active = $request->input('is_active');
        $target->is_default = $request->input('is_default');
        $target->save();


        return redirect()->route('target_pays.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = TargetPay::find($id);
        $data->delete();
        return redirect()->route('target_pays.index')->with('info', 'Deleted Successfully.');
    }
}

