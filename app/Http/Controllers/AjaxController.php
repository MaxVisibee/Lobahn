<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\District;
use App\Models\Country;
use App\Models\Industry;
use App\Models\SubSector;

class AjaxController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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

    public function filterSectors(Request $request){
        $industry_id = $request->input('industry_id');
        $sectors      = SubSector::where('industry_id', $industry_id)->select('id', 'sub_sector_name as text')->get();
       
        return response()->json([
            'status'    => 200,
            'data'      => $sectors,
        ]);
    }

}
