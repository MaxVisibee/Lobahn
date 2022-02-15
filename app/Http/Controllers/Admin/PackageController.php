<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:package-list|package-create|package-edit|package-delete', ['only' => ['index','store']]);
        $this->middleware('permission:package-create', ['only' => ['create','store']]);
        $this->middleware('permission:package-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:package-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $packages = Package::All();

        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'package_title' => 'required',
            'package_price' => 'required',
            'package_num_days' => 'required',
            // 'package_num_listings' => 'required',
        ]);

        $input = $request->except(['_token']);

        $package = Package::create($input);
        
        return redirect()->route('packages.index')->with('success', 'Package created successful!');
    }

    public function show(Package $package)
    {
        //
    }

    public function edit(Package $package){
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package){
        $this->validate($request, [
            'package_title' => 'required',
            'package_price' => 'required',
            'package_num_days' => 'required',
            // 'package_num_listings' => 'required',
        ]);

        $input = $request->except(['_token']);

        $package->package_title = $request->package_title ;
        $package->package_for = $request->package_for ;
        $package->package_price = $request->package_price ;
        $package->package_num_days = $request->package_num_days ;
        $package->package_num_listings = $request->package_num_listings ;
        $package->save();
        //$package->update($input);
        
        return redirect()->route('packages.index')->with('success', 'Package updated successful!');
    }
    
    // public function destroy(Package $package)
    // {
    //     $package->delete();

    //     return redirect()->route('packages.index')->with('success', 'Package deleted successful!');
    // }
    public function destroy($id){
        $data = Package::find($id);
        $data->delete();
        return redirect()->route('packages.index')->with('info', 'Deleted Successfully.');
    }
}
