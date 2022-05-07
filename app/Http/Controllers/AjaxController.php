<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomInput;
use App\Models\Area;
use App\Models\District;
use App\Models\Country;
use App\Models\Industry;
use App\Models\SubSector;

class AjaxController extends Controller
{
    
    public function __construct()
    {
        //
    }

    public function saveCustomInput(Request $request)
    {
        $data = CustomInput::where('name',$request->name)->where('field',$request->field)->first();
        if($data)  return response()->json(['status'    => 200]);
        if($request->user_id)
        CustomInput::create([
            'name' => $request->name,
            'field' => $request->field,
            'user_id' => $request->user_id,
        ]);
        else
        CustomInput::create([
            'name' => $request->name,
            'field' => $request->field,
            'company_id' => $request->company_id,
        ]); 

        return response()->json([
            'status'    => 200
        ]);
    }

    public function filterStates(Request $request)
    {
        $country_id = $request->input('country_id');
        $areas = Area::where('country_id', $country_id)->select('id', 'area_name as text')->get();

        return response()->json([
            'status'    => 200,
            'data'    => $areas,
        ]);
    }

    public function filterCities(Request $request)
    {
        $area_id = $request->input('area_id');
        $districts = District::where('area_id', $area_id)->select('id', 'district_name as text')->get();
       
        return response()->json([
            'status'    => 200,
            'data'      => $districts,
        ]);
    }
    
    public function filterCitiesDataTable(Request $request)
    {
        $area_id = $request->input('area_id');
        $districts = District::join('areas','areas.id','=','districts.area_id')
        ->join('countries','countries.id','=','areas.country_id')
        ->where('area_id', $area_id)
        ->select('districts.*', 'districts.id as action','areas.area_name as area_name','countries.country_name as country_name')
        ->get();
       
        return response()->json($districts);
    }

    public function filterSectors(Request $request){
        $industry_id = $request->input('industry_id');
        $sectors      = SubSector::where('industry_id', $industry_id)->select('id', 'sub_sector_name as text')->get();
       
        return response()->json([
            'status'    => 200,
            'data'      => $sectors,
        ]);
    }

}
