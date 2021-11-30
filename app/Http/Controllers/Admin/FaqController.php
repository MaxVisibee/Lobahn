<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Faq;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class FaqController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = Faq::orderBy('id','DESC')->get();
        $data = Faq::all();
        return view('admin.faqs.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'question' => 'required',
        ]);
    
        //$input = $request->all();
        $faq = new Faq();
        $faq->question   = $request->input('question');
        $faq->answer     = $request->input('answer');
        $faq->created_by = $request->input('created_by');
        $faq->is_active  = $request->input('is_active');
        $faq->is_default = $request->input('is_default');
        $faq->save();
    
        return redirect()->route('faqs.index')
                        ->with('success','Faq created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Faq::find($id);
        return view('admin.faqs.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Faq::find($id);    
        return view('admin.faqs.edit',compact('data'));
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
            'question' => 'required',
        ]);
    
        // $input = $request->all();
        $faq = Faq::find($id);
        $faq->question   = $request->input('question');
        $faq->answer     = $request->input('answer');
        $faq->created_by = $request->input('created_by');
        $faq->is_active  = $request->input('is_active');
        $faq->is_default = $request->input('is_default');
        $faq->save();


        return redirect()->route('faqs.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Faq::find($id);
        $data->delete();
        return redirect()->route('faqs.index')->with('info', 'Deleted Successfully.');
    }
}

