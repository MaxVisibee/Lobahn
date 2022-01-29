<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TalentDiscovery;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class TalentDiscoveryController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $TalentDiscovery
     * @return \Illuminate\Http\Response
     */
    public function show($TalentDiscovery){
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $talentDiscovery = TalentDiscovery::first();
        
        return view('admin.talent_discovery.edit', compact('talentDiscovery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $TalentDiscovery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        $input = $request->except('_token');
        $talentDiscovery = TalentDiscovery::findOrFail($id);

        if ($request->file('image_one')) {
            if (!empty($talentDiscovery->image_one)) {
                $imageOnePath = public_path('uploads/talent_discovery/' . $talentDiscovery->image_one);
                if (file_exists($imageOnePath)) {
                    unlink($imageOnePath);
                }
            }
            $fileNameOne = 'logo_' . time() . '.' . $request->file('image_one')->guessExtension();
            $request->file('image_one')->move(public_path('uploads/talent_discovery'), $fileNameOne);
            $input['image_one'] = $fileNameOne;
        }

        if ($request->file('image_two')) {
            if (!empty($talentDiscovery->image_two)) {
                $imageTwoPath = public_path('uploads/talent_discovery/' . $talentDiscovery->image_two);
                if (file_exists($imageTwoPath)) {
                    unlink($imageTwoPath);
                }
            }
            $fileNameTwo = 'logo_' . time() . '.' . $request->file('image_two')->guessExtension();
            $request->file('image_two')->move(public_path('uploads/talent_discovery'), $fileNameTwo);
            $input['image_two'] = $fileNameTwo;
        }

        if ($request->file('image_three')) {
            if (!empty($talentDiscovery->image_three)) {
                $imageThreePath = public_path('uploads/talent_discovery/' . $talentDiscovery->image_three);
                if (file_exists($imageThreePath)) {
                    unlink($imageThreePath);
                }
            }
            $fileNameThree = 'logo_' . time() . '.' . $request->file('image_three')->guessExtension();
            $request->file('image_three')->move(public_path('uploads/talent_discovery'), $fileNameThree);
            $input['image_three'] = $fileNameThree;
        }

        if ($request->file('image_four')) {
            if (!empty($talentDiscovery->image_four)) {
                $imageFourPath = public_path('uploads/talent_discovery/' . $talentDiscovery->image_four);
                if (file_exists($imageFourPath)) {
                    unlink($imageFourPath);
                }
            }
            $fileNameFour = 'logo_' . time() . '.' . $request->file('image_four')->guessExtension();
            $request->file('image_four')->move(public_path('uploads/talent_discovery'), $fileNameFour);
            $input['image_four'] = $fileNameFour;
        }

        if ($request->file('image_five')) {
            if (!empty($talentDiscovery->image_five)) {
                $imageFivePath = public_path('uploads/talent_discovery/' . $talentDiscovery->image_five);
                if (file_exists($imageFivePath)) {
                    unlink($imageFivePath);
                }
            }
            $fileNameFive = 'logo_' . time() . '.' . $request->file('image_five')->guessExtension();
            $request->file('image_five')->move(public_path('uploads/talent_discovery'), $fileNameFive);
            $input['image_five'] = $fileNameFive;
        }

        if ($request->file('image_six')) {
            if (!empty($talentDiscovery->image_six)) {
                $imageSixPath = public_path('uploads/talent_discovery/' . $talentDiscovery->image_six);
                if (file_exists($imageSixPath)) {
                    unlink($imageSixPath);
                }
            }
            $fileNameSix = 'logo_' . time() . '.' . $request->file('image_six')->guessExtension();
            $request->file('image_six')->move(public_path('uploads/talent_discovery'), $fileNameSix);
            $input['image_six'] = $fileNameSix;
        }
        
        $talentDiscovery->update($input);

        return redirect('/admin/edit-talent-discovery')->with('success', 'Successful updated talent discovery!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $TalentDiscovery
     * @return \Illuminate\Http\Response
     */
    public function destroy(TalentDiscovery $TalentDiscovery){
        
        
    }
}