<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PeopleManagementLevel;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use App\Exports\PeopleManagementLevelExport;
use App\Imports\PeopleManagementLevelImport;
use Maatwebsite\Excel\Facades\Excel;

class PeopleManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = PeopleManagementLevel::all();
        return view('admin.people_management.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.people_management.create');
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
        $peopleManagementLevel = PeopleManagementLevel::create($input);
        
        return redirect()->route('people-management.index')
            ->with('success', 'People Management created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PeopleManagementLevel::find($id);
        return view('admin.people_management.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PeopleManagementLevel::find($id);
        return view('admin.people_management.edit', compact('data'));
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
        $peopleManagementLevel = PeopleManagementLevel::find($id);
        $peopleManagementLevel->update($input);

        return redirect()->route('people-management.index')
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
        $data = PeopleManagementLevel::find($id);
        $data->delete();
        return redirect()->route('people-management.index')->with('info', 'Deleted Successfully.');
    }

    public function exportExcel()
    {
        return Excel::download(new PeopleManagementLevelExport(), 'people_management_' . time() . '.xlsx');
    }

    public function importExcel(Request $request)
    {
        // ini_set('max_execution_time', 5000);
        // ini_set('upload_max_filesize', '70000M');
        // ini_set('post_max_size', '70000M');
        // ini_set('memory_limit', '70000M');

        if ($request->hasFile('import_file')) {

            // validate incoming request
            $this->validate($request, [
                'import_file' => 'required|file|mimes:xls,xlsx,csv|max:10240', //max 10Mb
            ]);

            if ($request->file('import_file')->isValid()) {
                Excel::import(new PeopleManagementLevelImport, request()->file('import_file'));
            }
        }

        return back()->with('success', 'People Management import successfully');
    }

    public function sortpeoplemanagement(Request $request, $id)
    {
        $peopleManagement_sort = PeopleManagementLevel::find($id);
        \Log::info($peopleManagement_sort);
        $peopleManagement_sort->priority = $request->sorting;

        if ($peopleManagement_sort->save()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}