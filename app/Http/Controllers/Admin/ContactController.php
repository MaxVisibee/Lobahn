<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class ContactController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = Contact::orderBy('id','DESC')->get();
        $data = Contact::all();
        return view('admin.contacts.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.contacts.create');
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
        $contact = new Contact();
        $contact->title = $request->input('title');
        $contact->fax = $request->input('fax');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->website = $request->input('website');
        $contact->address = $request->input('address');
        $contact->map = $request->input('map');
        $contact->save();
    
        return redirect()->route('contacts.index')
                        ->with('success','Contact created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Contact::find($id);
        return view('admin.contacts.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Contact::find($id);    
        return view('admin.contacts.edit',compact('data'));
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
            'title' => 'required',
        ]);
    
        // $input = $request->all();
        $contact = Contact::find($id);
        $contact->title = $request->input('title');
        $contact->fax = $request->input('fax');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->website = $request->input('website');
        $contact->address = $request->input('address');
        $contact->map = $request->input('map');
        $contact->save();


        return redirect()->route('contacts.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Contact::find($id);
        $data->delete();
        return redirect()->route('contacts.index')->with('info', 'Deleted Successfully.');
    }
}

