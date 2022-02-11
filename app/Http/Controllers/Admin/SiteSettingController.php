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

        if ($request->file('site_logo')) {
            if (!empty($siteSetting->site_logo)) {
                $oldImagePath = public_path('uploads/site_setting/'.$siteSetting->site_logo);
                if (file_exists($oldImagePath)) { unlink($oldImagePath); }
            }
            $fileName = 'logo_'.time().'.'.$request->file('site_logo')->guessExtension();
            $request->file('site_logo')->move(public_path('uploads/site_setting'), $fileName);
            $input['site_logo'] = $fileName;
        }
        if ($request->file('front_site_logo')) {
            if (!empty($siteSetting->front_site_logo)) {
                $oldFrontImagePath = public_path('uploads/site_setting/'.$siteSetting->front_site_logo);
                if (file_exists($oldFrontImagePath)) { unlink($oldFrontImagePath); }
            }
            $fileName = 'logo_'.time().'.'.$request->file('front_site_logo')->guessExtension();
            $request->file('front_site_logo')->move(public_path('uploads/site_setting'), $fileName);
            $input['front_site_logo'] = $fileName;
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

    public function payment(Request $request){
        $siteSetting = SiteSetting::first();

        return view('admin.payment_methods.payment', compact('siteSetting'));
    }

    public function paymentUpdate(Request $request, $id){
        
        $input = $request->except('_token');
        $siteSetting = SiteSetting::findOrFail($id);
        $siteSetting->update($input);

        return redirect('/admin/edit-payment')->with('success', 'Successful updated payment settings!');
    }
}