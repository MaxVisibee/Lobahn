<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PaymentMethod;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class PaymentMethodController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = PaymentMethod::orderBy('id','DESC')->get();
        $data = PaymentMethod::all();
        return view('admin.payment_methods.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.payment_methods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'payment_name' => 'required',
        ]);
    
        //$input = $request->all();
        $payment = new PaymentMethod();
        $payment->payment_name = $request->input('payment_name');
        $payment->is_active = $request->input('is_active');
        $payment->is_default = $request->input('is_default');
        $payment->save();
    
        return redirect()->route('payment_methods.index')
                        ->with('success','Payment Method created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = PaymentMethod::find($id);
        return view('admin.payment_methods.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PaymentMethod::find($id);    
        return view('admin.payment_methods.edit',compact('data'));
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
            'payment_name' => 'required',
        ]);
    
        // $input = $request->all();
        $payment = PaymentMethod::find($id);
        $payment->payment_name = $request->input('payment_name');
        $payment->is_active = $request->input('is_active');
        $payment->is_default = $request->input('is_default');
        $payment->save();


        return redirect()->route('payment_methods.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = PaymentMethod::find($id);
        $data->delete();
        return redirect()->route('payment_methods.index')->with('info', 'Deleted Successfully.');
    }
}

