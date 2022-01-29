<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Connect;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class ConnectController extends Controller
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
     * @param  int  $connect
     * @return \Illuminate\Http\Response
     */
    public function show($connect)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $connect = Connect::first();

        return view('admin.connect.edit', compact('connect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $connect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        $input = $request->except('_token');
        $connect = Connect::findOrFail($id);

        if ($request->file('image_one')) {
            if (!empty($connect->image_one)) {
                $imageOnePath = public_path('uploads/connect/' . $connect->image_one);
                if (file_exists($imageOnePath)) {
                    unlink($imageOnePath);
                }
            }
            $fileNameOne = 'image_one_' . time() . '.' . $request->file('image_one')->guessExtension();
            $request->file('image_one')->move(public_path('uploads/connect'), $fileNameOne);

            $input['image_one'] = $fileNameOne;
        }

        if ($request->file('image_two')) {
            if (!empty($connect->image_two)) {
                $imageTwoPath = public_path('uploads/connect/' . $connect->image_two);
                if (file_exists($imageTwoPath)) {
                    unlink($imageTwoPath);
                }
            }
            $fileNameTwo = 'image_two_' . time() . '.' . $request->file('image_two')->guessExtension();
            $request->file('image_two')->move(public_path('uploads/connect'), $fileNameTwo);
            $input['image_two'] = $fileNameTwo;
        }

        if ($request->file('image_three')) {
            if (!empty($connect->image_three)) {
                $imageThreePath = public_path('uploads/connect/' . $connect->image_three);
                if (file_exists($imageThreePath)) {
                    unlink($imageThreePath);
                }
            }
            $fileNameThree = 'image_three_' . time() . '.' . $request->file('image_three')->guessExtension();
            $request->file('image_three')->move(public_path('uploads/connect'), $fileNameThree);
            $input['image_three'] = $fileNameThree;
        }

        if ($request->file('image_four')) {
            if (!empty($connect->image_four)) {
                $imageFourPath = public_path('uploads/connect/' . $connect->image_four);
                if (file_exists($imageFourPath)) {
                    unlink($imageFourPath);
                }
            }
            $fileNameFour = 'image_four_' . time() . '.' . $request->file('image_four')->guessExtension();
            $request->file('image_four')->move(public_path('uploads/connect'), $fileNameFour);
            $input['image_four'] = $fileNameFour;
        }

        if ($request->file('image_five')) {
            if (!empty($connect->image_five)) {
                $imageFivePath = public_path('uploads/connect/' . $connect->image_five);
                if (file_exists($imageFivePath)) {
                    unlink($imageFivePath);
                }
            }
            $fileNameFive = 'image_five_' . time() . '.' . $request->file('image_five')->guessExtension();
            $request->file('image_five')->move(public_path('uploads/connect'), $fileNameFive);
            $input['image_five'] = $fileNameFive;
        }

        if ($request->file('image_six')) {
            if (!empty($connect->image_six)) {
                $imageSixPath = public_path('uploads/connect/' . $connect->image_six);
                if (file_exists($imageSixPath)) {
                    unlink($imageSixPath);
                }
            }
            $fileNameSix = 'image_six_' . time() . '.' . $request->file('image_six')->guessExtension();
            $request->file('image_six')->move(public_path('uploads/connect'), $fileNameSix);
            $input['image_six'] = $fileNameSix;
        }


        $connect->update($input);

        return redirect('/admin/edit-connect')->with('success', 'Successful updated Connect!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $connect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Connect $connect)
    {
    }
}