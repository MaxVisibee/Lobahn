<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CareerPartner;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class CareerPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $CareerPartner
     * @return \Illuminate\Http\Response
     */
    public function show($CareerPartner)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $careerPartner = CareerPartner::first();

        return view('admin.career_partner.edit', compact('careerPartner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $careerPartner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        $input = $request->except('_token');
        $careerPartner = CareerPartner::findOrFail($id);

        if ($request->file('image_one')) {
            if (!empty($careerPartner->image_one)) {
                $imageOnePath = public_path('uploads/career_partner/' . $careerPartner->image_one);
                if (file_exists($imageOnePath)) {
                    unlink($imageOnePath);
                }
            }
            $fileNameOne = 'image_one_' . time() . '.' . $request->file('image_one')->guessExtension();
            $request->file('image_one')->move(public_path('uploads/career_partner'), $fileNameOne);
          
            $input['image_one'] = $fileNameOne;
        }

        if ($request->file('image_two')) {
            if (!empty($careerPartner->image_two)) {
                $imageTwoPath = public_path('uploads/career_partner/' . $careerPartner->image_two);
                if (file_exists($imageTwoPath)) {
                    unlink($imageTwoPath);
                }
            }
            $fileNameTwo = 'image_two_' . time() . '.' . $request->file('image_two')->guessExtension();
            $request->file('image_two')->move(public_path('uploads/career_partner'), $fileNameTwo);
            $input['image_two'] = $fileNameTwo;
        }

        if ($request->file('image_three')) {
            if (!empty($careerPartner->image_three)) {
                $imageThreePath = public_path('uploads/career_partner/' . $careerPartner->image_three);
                if (file_exists($imageThreePath)) {
                    unlink($imageThreePath);
                }
            }
            $fileNameThree = 'image_three_' . time() . '.' . $request->file('image_three')->guessExtension();
            $request->file('image_three')->move(public_path('uploads/career_partner'), $fileNameThree);
            $input['image_three'] = $fileNameThree;
        }

        if ($request->file('image_four')) {
            if (!empty($careerPartner->image_four)) {
                $imageFourPath = public_path('uploads/career_partner/' . $careerPartner->image_four);
                if (file_exists($imageFourPath)) {
                    unlink($imageFourPath);
                }
            }
            $fileNameFour = 'image_four_' . time() . '.' . $request->file('image_four')->guessExtension();
            $request->file('image_four')->move(public_path('uploads/career_partner'), $fileNameFour);
            $input['image_four'] = $fileNameFour;
        }

        if ($request->file('image_five')) {
            if (!empty($careerPartner->image_five)) {
                $imageFivePath = public_path('uploads/career_partner/' . $careerPartner->image_five);
                if (file_exists($imageFivePath)) {
                    unlink($imageFivePath);
                }
            }
            $fileNameFive = 'image_five_' . time() . '.' . $request->file('image_five')->guessExtension();
            $request->file('image_five')->move(public_path('uploads/career_partner'), $fileNameFive);
            $input['image_five'] = $fileNameFive;
        }

        if ($request->file('image_six')) {
            if (!empty($careerPartner->image_six)) {
                $imageSixPath = public_path('uploads/career_partner/' . $careerPartner->image_six);
                if (file_exists($imageSixPath)) {
                    unlink($imageSixPath);
                }
            }
            $fileNameSix = 'image_six_' . time() . '.' . $request->file('image_six')->guessExtension();
            $request->file('image_six')->move(public_path('uploads/career_partner'), $fileNameSix);
            $input['image_six'] = $fileNameSix;
        }
      

        $careerPartner->update($input);

        return redirect('/admin/edit-career-partner')->with('success', 'Successful updated Career Partner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $careerPartner
     * @return \Illuminate\Http\Response
     */
    public function destroy(CareerPartner $careerPartner)
    {
    }
}