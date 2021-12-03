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
        $states = Area::where('country_id', $country_id)->select('id', 'area_name as text')->get();

        return response()->json([
            'status'    => 200,
            'data'    => $states,
        ]);
    }

    public function filterCities(Request $request)
    {
        $state_id = $request->input('state_id');
        $cities = District::where('area_id', $state_id)->select('id', 'district_name as text')->get();
       
        return response()->json([
            'status'    => 200,
            'data'      => $cities,
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
