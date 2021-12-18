<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Opportunity;
use App\Models\Company;
use App\Models\JobType;
use App\Models\JobSkill;
use App\Models\OpportunitySkill;
use App\Models\JobSkillOpportunity;
use App\Models\JobTitle;
use App\Models\JobShift;
use App\Models\JobExperience;
use App\Models\Country;
use App\Models\Area;
use App\Models\District;
use App\Models\DegreeLevel;
use App\Models\CarrierLevel;
use App\Models\FunctionalArea;
use App\Models\Package;
use App\Models\Industry;
use App\Models\SubSector;
use App\Models\Language;
use App\Models\StudyField;
use App\Models\PaymentMethod;
use App\Models\Geographical;
use App\Models\Keyword;
use App\Models\Institution;
use App\Models\KeyStrength;
use App\Models\Speciality;
use App\Models\Qualification;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Carbon\Carbon;

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
        $packages   = Package::all();
        $industries = Industry::all();
        $sectors    = SubSector::all();
        $languages  = Language::all();
        $degree_levels  = DegreeLevel::all();
        $study_fields = StudyField::all();
        $payments = PaymentMethod::all();
        $geographicals  = Geographical::all();
        $keywords  = Keyword::all();
        $institutions = Institution::all();
        $key_strengths = KeyStrength::all();
        $specialities = Speciality::all();
        $qualifications = Qualification::all();

        return view('admin.opportunities.create',compact('companies','job_types','job_skills','job_titles','job_shifts','job_exps','areas','districts','degrees','carriers','fun_areas','countries','packages','industries','sectors','languages','degree_levels','study_fields','payments','geographicals','keywords','institutions','key_strengths','specialities','qualifications'));
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
        $opportunity->is_featured = $request->input('is_featured');
        $opportunity->is_subscribed = $request->input('is_subscribed');
        $opportunity->address = $request->input('address');
        $opportunity->contract_hour_id = $request->input('contract_hour_id');
        $opportunity->keyword_id = $request->input('keyword_id');
        $opportunity->institution_id = $request->input('institution_id');
        $opportunity->language_id = $request->input('language_id');
        $opportunity->geographical_id = $request->input('geographical_id');
        $opportunity->management_id = $request->input('management_id');
        $opportunity->field_study_id = $request->input('field_study_id');
        $opportunity->qualification_id = $request->input('qualification_id');
        $opportunity->key_strnegth_id = $request->input('key_strnegth_id');
        $opportunity->industry_id = $request->input('industry_id');
        $opportunity->sub_sector_id = $request->input('sub_sector_id');
        $opportunity->specialist_id = $request->input('specialist_id');
        $opportunity->website_address = $request->input('website_address');
        // $opportunity->target_employer = $request->input('target_employer');
        $opportunity->package_id = $request->input('package_id');
        $opportunity->payment_id = $request->input('payment_id');
        $opportunity->package_start_date = $request->input('package_start_date');
        $opportunity->package_end_date = $request->input('package_end_date');
        $opportunity->listing_date = $request->input('listing_date');

        // if($request->has('job_skill_id')){
        //    $opportunity->job_skill_id = implode(',', $request->input('job_skill_id'));
        // }

        $opportunity->save();

        $opportunity->skills()->sync($request->input('job_skill_id'));
    
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
        $job_skills = JobSkill::all()->pluck('job_skill', 'id');
        $job_titles = JobTitle::all();
        $job_shifts = JobShift::all();
        $job_exps   = JobExperience::all();
        $areas      = Area::all();
        $districts  = District::all();
        $degrees    = DegreeLevel::all();
        $carriers   = CarrierLevel::all();
        $fun_areas  = FunctionalArea::all();
        $countries  = Country::all();
        $packages   = Package::all();
        $industries = Industry::all();
        $sectors    = SubSector::all();
        $languages  = Language::all();
        $degree_levels  = DegreeLevel::all();
        $study_fields = StudyField::all();
        $payments = PaymentMethod::all();
        $geographicals  = Geographical::all();
        $keywords  = Keyword::all();
        $institutions = Institution::all();
        $key_strengths = KeyStrength::all();
        $specialities = Speciality::all();
        $qualifications = Qualification::all();

        return view('admin.opportunities.edit',compact('data','companies','job_skills','job_shifts','job_exps','job_types','job_titles','areas','districts','degrees','carriers','fun_areas','countries','packages','industries','sectors','languages','degree_levels','study_fields','payments','geographicals','keywords','institutions','key_strengths','specialities','qualifications'));
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

        // if($request->has('job_skill_id')){
        //    $opportunity->job_skill_id = implode(',', $request->input('job_skill_id'));
        // }
        $opportunity->is_featured = $request->input('is_featured');
        $opportunity->is_subscribed = $request->input('is_subscribed');
        $opportunity->address = $request->input('address');
        $opportunity->contract_hour_id = $request->input('contract_hour_id');
        $opportunity->keyword_id = $request->input('keyword_id');
        $opportunity->institution_id = $request->input('institution_id');
        $opportunity->language_id = $request->input('language_id');
        $opportunity->geographical_id = $request->input('geographical_id');
        $opportunity->management_id = $request->input('management_id');
        $opportunity->field_study_id = $request->input('field_study_id');
        $opportunity->qualification_id = $request->input('qualification_id');
        $opportunity->key_strnegth_id = $request->input('key_strnegth_id');
        $opportunity->industry_id = $request->input('industry_id');
        $opportunity->sub_sector_id = $request->input('sub_sector_id');
        $opportunity->specialist_id = $request->input('specialist_id');
        $opportunity->website_address = $request->input('website_address');
        // $opportunity->target_employer = $request->input('target_employer');
        $opportunity->package_id = $request->input('package_id');
        $opportunity->payment_id = $request->input('payment_id');
        $opportunity->package_start_date = $request->input('package_start_date');
        $opportunity->package_end_date = $request->input('package_end_date');
        $opportunity->listing_date = $request->input('listing_date');
        //Carbon::createFromFormat('m/d/Y', $request->listing_date)->format('Y-m-d');
        $opportunity->save();
        $opportunity->skills()->sync($request->input('job_skill_id'));

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
