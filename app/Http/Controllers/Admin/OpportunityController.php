<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Opportunity;
use App\Models\Company;
use App\Models\JobType;
use App\Models\JobSkill;
use App\Models\JobTitle;
use App\Models\JobShift;
use App\Models\JobExperience;
use App\Models\Country;
use App\Models\Area;
use App\Models\District;
use App\Models\DegreeLevel;
use App\Models\CarrierLevel;
use App\Models\FunctionalArea;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class OpportunityController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){    	
        // $data = Opportunity::orderBy('id','DESC')->paginate(5);
        $data = Opportunity::all();
        return view('admin.opportunities.index',compact('data'));
            // ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        // $companies    = Company::all()->pluck('name','id');
        $companies  = Company::all();
        $job_types  = JobType::all();
        $job_skills = JobSkill::all();
        $job_titles = JobTitle::all();
        $job_shifts = JobShift::all();
        $job_exps   = JobExperience::all();
        $areas      = Area::all();
        $districts  = District::all();
        $degrees    = DegreeLevel::all();
        $carriers   = CarrierLevel::all();
        $fun_areas  = FunctionalArea::all();
        $countries  = Country::all();

        return view('admin.opportunities.create',compact('companies','job_skills','job_shifts','job_exps','job_types','job_titles','areas','districts','degrees','carriers','fun_areas','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
        ]);
    
        //$input = $request->all();    
        // $opportunity = Opportunity::create($input);
        $opportunity = new Opportunity();
        $opportunity->title = $request->input('title');
        $opportunity->company_id = $request->input('company_id');
        $opportunity->country_id = $request->input('country_id');
        $opportunity->area_id = $request->input('area_id');
        $opportunity->district_id = $request->input('district_id');
        $opportunity->job_title_id = $request->input('job_title_id');
        $opportunity->job_type_id = $request->input('job_type_id');
        $opportunity->job_experience_id = $request->input('job_experience_id');
        $opportunity->degree_level_id = $request->input('degree_level_id');
        $opportunity->carrier_level_id = $request->input('carrier_level_id');
        $opportunity->functional_area_id = $request->input('functional_area_id');
        $opportunity->salary_from = $request->input('salary_from');
        $opportunity->salary_to = $request->input('salary_to');
        $opportunity->salary_currency = $request->input('salary_currency');
        $opportunity->gender = $request->input('gender');
        $opportunity->no_of_position = $request->input('no_of_position');
        $opportunity->requirement = $request->input('requirement');
        $opportunity->about_company = $request->input('about_company');
        $opportunity->description = $request->input('description');
        $opportunity->benefits = $request->input('benefits');
        $opportunity->expire_date = $request->input('expire_date');
        $opportunity->slug = $request->input('slug');
        $opportunity->hide_salary = $request->input('hide_salary');
        $opportunity->is_freelance = $request->input('is_freelance');
        $opportunity->is_active = $request->input('is_active');
        $opportunity->is_default = $request->input('is_default');

        if($request->has('job_skill_id')){
           $opportunity->job_skill_id = implode(',', $request->input('job_skill_id'));
        }

        $opportunity->save();
    
        return redirect()->route('opportunities.index')
                        ->with('success','Opportunity created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Opportunity::find($id);
        //dd($data->job_skill_id);
        return view('admin.opportunities.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = Opportunity::find($id);
        // $company    = Company::all()->pluck('name','id');
        $companies  = Company::all();
        $job_types  = JobType::all();
        $job_skills = JobSkill::all();
        $job_titles = JobTitle::all();
        $job_shifts = JobShift::all();
        $job_exps   = JobExperience::all();
        $areas      = Area::all();
        $districts  = District::all();
        $degrees    = DegreeLevel::all();
        $carriers   = CarrierLevel::all();
        $fun_areas  = FunctionalArea::all();
        $countries  = Country::all(); 
        return view('admin.opportunities.edit',compact('data','companies','job_skills','job_shifts','job_exps','job_types','job_titles','areas','districts','degrees','carriers','fun_areas','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
        ]);
    
        // $input = $request->all();
        // $job = Opportunity::find($id);
        $opportunity = Opportunity::find($id);
        $opportunity->title = $request->input('title');
        $opportunity->company_id = $request->input('company_id');
        $opportunity->country_id = $request->input('country_id');
        $opportunity->area_id = $request->input('area_id');
        $opportunity->district_id = $request->input('district_id');
        $opportunity->job_title_id = $request->input('job_title_id');
        $opportunity->job_type_id = $request->input('job_type_id');
        $opportunity->job_experience_id = $request->input('job_experience_id');
        $opportunity->degree_level_id = $request->input('degree_level_id');
        $opportunity->carrier_level_id = $request->input('carrier_level_id');
        $opportunity->functional_area_id = $request->input('functional_area_id');
        $opportunity->salary_from = $request->input('salary_from');
        $opportunity->salary_to = $request->input('salary_to');
        $opportunity->salary_currency = $request->input('salary_currency');
        $opportunity->gender = $request->input('gender');
        $opportunity->no_of_position = $request->input('no_of_position');
        $opportunity->requirement = $request->input('requirement');
        $opportunity->about_company = $request->input('about_company');
        $opportunity->description = $request->input('description');
        $opportunity->benefits = $request->input('benefits');
        $opportunity->expire_date = $request->input('expire_date');
        $opportunity->slug = $request->input('slug');
        $opportunity->hide_salary = $request->input('hide_salary');
        $opportunity->is_freelance = $request->input('is_freelance');
        $opportunity->is_active = $request->input('is_active');
        $opportunity->is_default = $request->input('is_default');

        if($request->has('job_skill_id')){
           $opportunity->job_skill_id = implode(',', $request->input('job_skill_id'));
        }
        $opportunity->save();

        return redirect()->route('opportunities.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Opportunity::find($id);
        $data->delete();
        return redirect()->route('opportunities.index')->with('info', 'Deleted Successfully.');
    }
    
    public function getArea($id){
        $areas = Area::where('country_id', $id)->select('id','area_name as text')->get();
        return response()->json([
            'status' => 200,
            'areas' => $areas,
        ]);
    }
    public function getDistrict($id){
        $districts = District::where('area_id', $id)->select('id','district_name as text')->get();
        return response()->json([
            'status' => 200,
            'districts' => $districts,
        ]);
    }
}
