<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Membership;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class MembershipController extends Controller
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
     * @param  int  $membership
     * @return \Illuminate\Http\Response
     */
    public function show($membership)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $membership = Membership::first();

        return view('admin.membership.edit', compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        $input = $request->except('_token');
        $membership = Membership::findOrFail($id);

        if ($request->file('image_one')) {
            if (!empty($membership->image_one)) {
                $imageOnePath = public_path('uploads/membership/' . $membership->image_one);
                if (file_exists($imageOnePath)) {
                    unlink($imageOnePath);
                }
            }
            $fileNameOne = 'image_one_' . time() . '.' . $request->file('image_one')->guessExtension();
            $request->file('image_one')->move(public_path('uploads/membership'), $fileNameOne);

            $input['image_one'] = $fileNameOne;
        }

        if ($request->file('image_two')) {
            if (!empty($membership->image_two)) {
                $imageTwoPath = public_path('uploads/membership/' . $membership->image_two);
                if (file_exists($imageTwoPath)) {
                    unlink($imageTwoPath);
                }
            }
            $fileNameTwo = 'image_two_' . time() . '.' . $request->file('image_two')->guessExtension();
            $request->file('image_two')->move(public_path('uploads/membership'), $fileNameTwo);
            $input['image_two'] = $fileNameTwo;
        }

        if ($request->file('image_three')) {
            if (!empty($membership->image_three)) {
                $imageThreePath = public_path('uploads/membership/' . $membership->image_three);
                if (file_exists($imageThreePath)) {
                    unlink($imageThreePath);
                }
            }
            $fileNameThree = 'image_three_' . time() . '.' . $request->file('image_three')->guessExtension();
            $request->file('image_three')->move(public_path('uploads/membership'), $fileNameThree);
            $input['image_three'] = $fileNameThree;
        }

        if ($request->file('image_four')) {
            if (!empty($membership->image_four)) {
                $imageFourPath = public_path('uploads/membership/' . $membership->image_four);
                if (file_exists($imageFourPath)) {
                    unlink($imageFourPath);
                }
            }
            $fileNameFour = 'image_four_' . time() . '.' . $request->file('image_four')->guessExtension();
            $request->file('image_four')->move(public_path('uploads/membership'), $fileNameFour);
            $input['image_four'] = $fileNameFour;
        }

        if ($request->file('image_five')) {
            if (!empty($membership->image_five)) {
                $imageFivePath = public_path('uploads/membership/' . $membership->image_five);
                if (file_exists($imageFivePath)) {
                    unlink($imageFivePath);
                }
            }
            $fileNameFive = 'image_five_' . time() . '.' . $request->file('image_five')->guessExtension();
            $request->file('image_five')->move(public_path('uploads/membership'), $fileNameFive);
            $input['image_five'] = $fileNameFive;
        }

        if ($request->file('image_six')) {
            if (!empty($membership->image_six)) {
                $imageSixPath = public_path('uploads/membership/' . $membership->image_six);
                if (file_exists($imageSixPath)) {
                    unlink($imageSixPath);
                }
            }
            $fileNameSix = 'image_six_' . time() . '.' . $request->file('image_six')->guessExtension();
            $request->file('image_six')->move(public_path('uploads/membership'), $fileNameSix);
            $input['image_six'] = $fileNameSix;
        }


        $membership->update($input);

        return redirect('/admin/edit-membership')->with('success', 'Successful updated Membership!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
    }
}