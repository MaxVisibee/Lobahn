<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meta;


class MetaController extends Controller
{
    public function index()
    {
        $data = Meta::all();
        return view('admin.meta.index',compact('data'));
    }

    public function show($id){
        $data = Meta::find($id);
        return view('admin.meta.show',compact('data'));
    }
    
    public function create()
    {
        return view('admin.meta.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'page_name' => 'required',
        ]);
        $meta = new Meta();
        $meta->page_name = $request->input('page_name');
        $meta->page_url = $request->input('page_url');
        $meta->title = $request->input('title');
        $meta->description = $request->input('description');
        $meta->save();
        return redirect()->route('meta.index')->with('success','new meta created successfully');
    }

    public function edit($id)
    {
        $data = Meta::find($id);    
        return view('admin.meta.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'page_name' => 'required',
        ]);
        $meta = Meta::find($id);
        $meta->page_name = $request->input('page_name');
        $meta->page_url = $request->input('page_url');
        $meta->title = $request->input('title');
        $meta->description = $request->input('description');
        $meta->save();
        return redirect()->route('meta.index')->with('success','Updated successfully');
    }

     public function destroy($id){
        $data = Meta::find($id);
        $data->delete();
        return redirect()->route('meta.index')->with('info', 'Deleted Successfully.');
    }
}
