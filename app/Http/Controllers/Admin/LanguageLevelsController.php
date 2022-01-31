<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LanguageLevel;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Facades\Excel;

class LanguageLevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = LanguageLevel::all();
        return view('admin.language_levels.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.language_levels.create');
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
            'level' => 'required',
        ]);

        $input = $request->all();
        unset($input['_token']);
        $languageLevel = LanguageLevel::create($input);

        return redirect()->route('language-levels.index')
            ->with('success', 'language levels created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = LanguageLevel::find($id);
        return view('admin.language_levels.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = LanguageLevel::find($id);
        return view('admin.language_levels.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'level' => 'required',
        ]);

        $input = $request->all();
        $languageLevels = LanguageLevel::find($id);
        $languageLevels->update($input);

        return redirect()->route('language-levels.index')
            ->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = LanguageLevel::find($id);
        $data->delete();
        return redirect()->route('language-levels.index')->with('info', 'Deleted Successfully.');
    }

    public function sortLanguageLevels(Request $request, $id)
    {
        $languageLevel_sort = LanguageLevel::find($id);
        \Log::info($languageLevel_sort);
        $languageLevel_sort->priority = $request->sorting;

        if ($languageLevel_sort->save()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}