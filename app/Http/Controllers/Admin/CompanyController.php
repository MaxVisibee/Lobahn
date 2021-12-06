<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\CompanyPackageTrait;
use Hash;
use Image;
use App\Models\Package;
use App\Models\Industry;
use App\Models\Area;
use App\Models\District;
use App\Models\Country;
use App\Models\SubSector;
use App\Models\JobTitle;
use App\Models\JobType;
use App\Models\Language;
use App\Models\JobSkill;
use App\Models\DegreeLevel;
use App\Models\CarrierLevel;
use App\Models\JobExperience;
use App\Models\StudyField;
use App\Models\FunctionalArea;
use Carbon\Carbon;

class CompanyController extends Controller{
    use CompanyPackageTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:company-list|company-create|company-edit|company-delete', ['only' => ['index','store']]);
        $this->middleware('permission:company-create', ['only' => ['create','store']]);
        $this->middleware('permission:company-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:company-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderby('id','DESC')->get();
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $packages   = Package::pluck('package_title','id')->toArray();
        $industries = Industry::pluck('industry_name','id')->toArray();
        $countries  = Country::pluck('country_name','id')->toArray();
        $areas      = Area::pluck('area_name','id')->toArray();
        $districts  = District::pluck('district_name','id')->toArray();
        $sectors    = SubSector::pluck('sub_sector_name','id')->toArray();
        $job_titles = JobTitle::pluck('job_title','id')->toArray();
        $job_types  = JobType::pluck('job_type','id')->toArray();
        $languages  = Language::pluck('language_name','id')->toArray();
        $job_skills = JobSkill::pluck('job_skill','id')->toArray();
        $job_skills = JobSkill::pluck('job_skill','id')->toArray();
        $degree_levels  = DegreeLevel::pluck('degree_name','id')->toArray();
        $carrier_levels = CarrierLevel::pluck('carrier_level','id')->toArray();
        $experiences = JobExperience::pluck('job_experience','id')->toArray();
        $studu_fields = StudyField::pluck('study_field_name','id')->toArray();
        $functionals = FunctionalArea::pluck('area_name','id')->toArray();

        return view('admin.companies.create', compact('packages','industries','countries','areas','districts','sectors','job_titles','job_types','languages','job_skills','degree_levels','carrier_levels','experiences','studu_fields','functionals'));
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
            'company_name' => 'required',
            'user_name' => 'required',
            'name'      => 'required',
            'email'     => 'required|email|unique:companies,email',
            // 'password'  => 'required|min:6',
            'password' => 'required|same:confirm_password|min:6',
            'phone'     => 'required',
        ]);

        $company = new Company();
        /* ***************************************** */
        
        if(isset($request->logo)) {
            $photo = $_FILES['logo'];
            if(!empty($photo['name'])){
                $file_name = $photo['name'].'-'.time().'.'.$request->file('logo')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/company_logo/'.$file_name));
                $img->save(public_path('/uploads/company_logo/'.$file_name));

                $company->logo = $file_name;
            }
        }
        /*         * ************************************** */
        $company->company_name = $request->input('company_name');
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        if (!empty($request->input('password'))) {
            $company->password = Hash::make($request->input('password'));
        }
        $company->user_name = $request->input('user_name');
        $company->industry_id = $request->input('industry_id');
        $company->description = $request->input('description');
        $company->location = $request->input('location');
        $company->map = $request->input('map');
        $website = $request->input('website');
        $company->website = (false === strpos($website, 'http')) ? 'http://' . $website : $website;
        $company->no_of_employees = $request->input('no_of_employees');
        $company->phone = $request->input('phone');
        $company->country_id = $request->input('country_id');
        $company->state_id = $request->input('state_id');
        $company->city_id = $request->input('city_id');
        $company->is_active = $request->input('is_active');
        $company->is_featured = $request->input('is_featured');

        // $company->position_title   = $request->input('position_title');
        // $company->main_industry    = $request->input('main_industry');
        // $company->preferred_school = $request->input('preferred_school');
        // $company->target_employers = $request->input('target_employers');

        $company->sub_sector_id     = $request->input('sub_sector_id');
        $company->position_title_id = $request->input('position_title_id');
        $company->working_hour_id   = $request->input('working_hour_id');
        $company->preferred_school  = $request->input('preferred_school');
        $company->degree_level_id     = $request->input('degree_level_id');
        $company->carrier_level_id     = $request->input('carrier_level_id');
        $company->experience_id  = $request->input('experience_id');
        $company->language_id    = $request->input('language_id');
        $company->study_field_id = $request->input('study_field_id');
        $company->adjacent_position = $request->input('adjacent_position');
        $company->package_id   = $request->input('package_id');
        $company->keyword      = $request->input('keyword');
        $company->reference    = $request->input('reference');
        $company->min_salary   = $request->input('min_salary');
        $company->max_salary   = $request->input('max_salary');
        $company->function     = $request->input('function');
        $company->speciality    = $request->input('speciality');
        $company->description  = $request->input('description');
        $company->geographical_experience = $request->input('geographical_experience');
        $company->people_management = $request->input('people_management');
        $company->tech_knowledge = $request->input('tech_knowledge');
        $company->qualification = $request->input('qualification');
        $company->key_strength  = $request->input('key_strength');
        $company->contract_term = $request->input('contract_term');
        $company->map           = $request->input('map');
        $company->listing_date  = $request->input('listing_date');
        $company->expire_date   = $request->input('expire_date');
        // $company->listing_date  = $request->input('listing_date')? Carbon::createFromFormat('d/m/Y', $request->get('listing_date'))->format('Y-m-d'):null;
        // $company->expire_date   = $request->input('expire_date')? Carbon::createFromFormat('d/m/Y', $request->get('expire_date'))->format('Y-m-d'):null;
        $company->save();
        /*         * ******************************* */
        $company->slug = str_slug($company->name, '-') . '-' . $company->id;
        /*         * ******************************* */
        $company->update();
        /*         * ************************************ */
        if ($request->has('package_id') && $request->input('package_id') > 0) {
            $package_id = $request->input('package_id');
            $package = Package::find($package_id);
            $this->addCompanyPackage($company, $package);
        }
        /*         * ************************************ */
        
        return redirect()->route('companies.index')->with('success', 'Company has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Company::find($id);
        return view('admin.companies.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company){
        $packages   = Package::pluck('package_title','id')->toArray();
        $industries = Industry::pluck('industry_name','id')->toArray();
        $countries  = Country::pluck('country_name','id')->toArray();
        $areas      = Area::pluck('area_name','id')->toArray();
        $districts  = District::pluck('district_name','id')->toArray();
        $sectors    = SubSector::pluck('sub_sector_name','id')->toArray();
        $job_titles = JobTitle::pluck('job_title','id')->toArray();
        $job_types  = JobType::pluck('job_type','id')->toArray();
        $languages  = Language::pluck('language_name','id')->toArray();
        $job_skills = JobSkill::pluck('job_skill','id')->toArray();
        $job_skills = JobSkill::pluck('job_skill','id')->toArray();
        $degree_levels  = DegreeLevel::pluck('degree_name','id')->toArray();
        $carrier_levels = CarrierLevel::pluck('carrier_level','id')->toArray();
        $experiences = JobExperience::pluck('job_experience','id')->toArray();
        $studu_fields = StudyField::pluck('study_field_name','id')->toArray();
        $functionals = FunctionalArea::pluck('area_name','id')->toArray();

        return view('admin.companies.edit', compact('company','packages','industries','countries','areas','districts','sectors','job_titles','job_types','languages','job_skills','degree_levels','carrier_levels','experiences','studu_fields','functionals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $this->validate($request, [
            'user_name' => 'required',
            'name'      => 'required',
            'email'     => 'required|email|unique:companies,email,'.$company->id,
            'password'  => 'required|same:confirm_password|min:6',
            'phone'     => 'required',
        ]);

        // $company = Company::findOrFail($id);
        /*         * **************************************** */
        if(isset($request->logo)) {
            $photo = $_FILES['logo'];
            if(!empty($photo['name'])){
                $file_name = $photo['name'].'-'.time().'.'.$request->file('logo')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/company_logo/'.$file_name));
                $img->save(public_path('/uploads/company_logo/'.$file_name));

                $company->logo = $file_name;
            }
        }
        /*         * ************************************** */
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        if (!empty($request->input('password'))) {
            $company->password = Hash::make($request->input('password'));
        }
        $company->user_name = $request->input('user_name');
        $company->industry_id = $request->input('industry_id');
        $company->description = $request->input('description');
        $company->location = $request->input('location');
        $company->map = $request->input('map');
        $website = $request->input('website');
        $company->website = (false === strpos($website, 'http')) ? 'http://' . $website : $website;
        $company->no_of_employees = $request->input('no_of_employees');
        $company->phone = $request->input('phone');
        $company->country_id = $request->input('country_id');
        $company->state_id = $request->input('state_id');
        $company->city_id = $request->input('city_id');
        $company->is_active = $request->input('is_active');
        $company->is_featured = $request->input('is_featured');

        $company->slug = str_slug($company->name, '-') . '-' . $company->id;
        // $company->position_title   = $request->input('position_title');
        // $company->main_industry    = $request->input('main_industry');
        // $company->main_sub_sector  = $request->input('main_sub_sector');
        // $company->preferred_school = $request->input('preferred_school');
        // $company->target_employers = $request->input('target_employers');
        $company->sub_sector_id     = $request->input('sub_sector_id');
        $company->position_title_id = $request->input('position_title_id');
        $company->working_hour_id   = $request->input('working_hour_id');
        $company->preferred_school  = $request->input('preferred_school');
        $company->degree_level_id     = $request->input('degree_level_id');
        $company->carrier_level_id     = $request->input('carrier_level_id');
        $company->experience_id  = $request->input('experience_id');
        $company->language_id    = $request->input('language_id');
        $company->study_field_id = $request->input('study_field_id');
        $company->adjacent_position = $request->input('adjacent_position');
        $company->package_id   = $request->input('package_id');
        $company->keyword      = $request->input('keyword');
        $company->reference    = $request->input('reference');
        $company->min_salary   = $request->input('min_salary');
        $company->max_salary   = $request->input('max_salary');
        $company->function     = $request->input('function');
        $company->speciality    = $request->input('speciality');
        $company->description  = $request->input('description');
        $company->geographical_experience = $request->input('geographical_experience');
        $company->people_management = $request->input('people_management');
        $company->tech_knowledge = $request->input('tech_knowledge');
        $company->qualification = $request->input('qualification');
        $company->key_strength  = $request->input('key_strength');
        $company->contract_term = $request->input('contract_term');
        $company->map           = $request->input('map');
        // $company->listing_date  = $request->input('listing_date')? Carbon::createFromFormat('d/m/Y', $request->get('listing_date'))->format('Y-m-d'):null;
        // $company->expire_date   = $request->input('expire_date')? Carbon::createFromFormat('d/m/Y', $request->get('expire_date'))->format('Y-m-d'):null;
        $company->listing_date  = $request->input('listing_date');
        $company->expire_date   = $request->input('expire_date');
        
        $company->update();

        /*         * ************************************ */
        if ($request->has('package_id') && $request->input('package_id') > 0) {
            $package_id = $request->input('package_id');
            $package = Package::find($package_id);
            if ($company->package_id > 0) {
                $this->updateCompanyPackage($company, $package);
            } else {
                $this->addCompanyPackage($company, $package);
            }
        }
        /*         * ************************************ */
        
        return redirect()->route('companies.index')->with('success', 'Company has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company has been deleted!');
    }
}
