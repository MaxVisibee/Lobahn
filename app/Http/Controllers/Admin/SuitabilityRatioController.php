<?php

namespace App\Http\Controllers\Admin;

use App\Models\SuitabilityRatio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuitabilityRatioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratios = SuitabilityRatio::get();

        return view('admin.suitability_ratios.index', compact('ratios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.suitability_ratios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'talent_num' => 'required',
            'talent_percent' => 'required',
            'position_num' => 'required',
            'position_percent' => 'required',
        ]);

        $input = $request->all();
        $ratios = SuitabilityRatio::create($input);

        return redirect('/admin/suitability-ratios')->with('success','Suitability Ratio created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuitabilityRatio  $suitabilityRatio
     * @return \Illuminate\Http\Response
     */
    public function show(SuitabilityRatio $suitabilityRatio)
    {
        return view('admin.suitability_ratios.show', compact('suitabilityRatio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuitabilityRatio  $suitabilityRatio
     * @return \Illuminate\Http\Response
     */
    public function edit(SuitabilityRatio $suitabilityRatio)
    {
        return view('admin.suitability_ratios.edit', compact('suitabilityRatio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuitabilityRatio  $suitabilityRatio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuitabilityRatio $suitabilityRatio)
    {
        $this->validate($request, [
            'name' => 'required',
            'talent_num' => 'required',
            'talent_percent' => 'required',
            'position_num' => 'required',
            'position_percent' => 'required',
        ]);
        
        $input = $request->all();
        $suitabilityRatio->update($input);

        return redirect('/admin/suitability-ratios')->with('success','Suitability Ratio updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuitabilityRatio  $suitabilityRatio
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuitabilityRatio $suitabilityRatio)
    {
        $suitabilityRatio->delete();

        return redirect('/admin/suitability-ratios')->with('success','Suitability Ratio deleted successfully');
    }
}
