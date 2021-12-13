<?php

namespace App\Http\Controllers\Admin;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function show(SiteSetting $siteSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $siteSetting = SiteSetting::first();

        return view('admin.site_settings.edit', compact('siteSetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'site_name' => 'required',
        ]);
        $input = $request->except('_token');
        $siteSetting = SiteSetting::findOrFail($id);

        if(isset($request->site_logo)) {
            $site_logo = $_FILES['site_logo'];
            if(!empty($site_logo['name'])){
                $file_name = 'logo_'.time().'.'.$request->file('site_logo')->guessExtension();
                $tmp_file = $site_logo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->save(public_path('/uploads/site_setting/'.$file_name));
                $input['site_logo'] = $file_name;
            }
        }
        $siteSetting->update($input);
        
        return redirect('/admin/edit-site-settings')->with('success', 'Successful updated site settings!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteSetting $siteSetting)
    {
        //
    }
}
