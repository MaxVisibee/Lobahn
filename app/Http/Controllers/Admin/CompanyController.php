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
use App\Models\JobShift;
use App\Models\StudyField;
use App\Models\FunctionalArea;
use App\Models\PaymentMethod;
use App\Models\Geographical;
use App\Models\Keyword;
use App\Models\Institution;
use App\Models\KeyStrength;
use App\Models\Speciality;
use App\Models\Qualification;
use App\Models\User;
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
        $packages   = Package::where('package_for', '=', 'employer')->pluck('package_title','id')->toArray();
        $industries = Industry::pluck('industry_name','id')->toArray();
        $countries  = Country::pluck('country_name','id')->toArray();
        // $areas      = Area::pluck('area_name','id')->toArray();
        // $districts  = District::pluck('district_name','id')->toArray();
        $sectors    = SubSector::pluck('sub_sector_name','id')->toArray();
        $job_titles = JobTitle::pluck('job_title','id')->toArray();
        $job_types  = JobType::pluck('job_type','id')->toArray();
        $job_shifts  = JobShift::pluck('job_shift','id')->toArray();
        $languages  = Language::pluck('language_name','id')->toArray();
        $skills = JobSkill::pluck('job_skill','id')->toArray();
        $degree_levels  = DegreeLevel::pluck('degree_name','id')->toArray();
        $carrier_levels = CarrierLevel::pluck('carrier_level','id')->toArray();
        $experiences = JobExperience::pluck('job_experience','id')->toArray();
        $study_fields = StudyField::pluck('study_field_name','id')->toArray();
        $functionals = FunctionalArea::pluck('area_name','id')->toArray();
        $payments = PaymentMethod::pluck('payment_name','id')->toArray();
        $geographicals  = Geographical::pluck('geographical_name','id')->toArray();
        $keywords  = Keyword::pluck('keyword_name','id')->toArray();
        $institutions = Institution::pluck('institution_name','id')->toArray();
        $key_strengths = KeyStrength::pluck('key_strength_name','id')->toArray();
        $specialities = Speciality::pluck('speciality_name','id')->toArray();
        $qualifications = Qualification::pluck('qualification_name','id')->toArray();
        $seekers = User::pluck('name','id')->toArray();


        return view('admin.companies.create', compact('packages','industries','countries','sectors','job_titles','job_types','languages','skills','degree_levels','carrier_levels','experiences','study_fields','functionals','job_shifts','payments','geographicals','keywords','institutions','key_strengths','specialities','qualifications','seekers'));
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
            'email'     => 'required|email|unique:companies,email',
            'password' => 'required|same:confirm_password|min:6',
            'phone'     => 'required',
        ]);

        $company = new Company();
        /* ***************************************** */
        
        if(isset($request->company_logo)) {
            $photo = $_FILES['company_logo'];
            if(!empty($photo['name'])){
                $file_name = $photo['name'].'-'.time().'.'.$request->file('company_logo')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/company_logo/'.$file_name));
                $img->save(public_path('/uploads/company_logo/'.$file_name));

                $company->company_logo = $file_name;
            }
        }
        
        /*         * ************************************** */
        $company->company_name = $request->input('company_name');
        $company->name      = $request->input('name');
        $company->user_name = $request->input('user_name');
        $company->email = $request->input('email');
        $company->phone = $request->input('phone');
        $company->position_title = $request->input('position_title');
        if (!empty($request->input('password'))) {
            $company->password = Hash::make($request->input('password'));
        }     
        $company->country_id = $request->input('country_id');
        // $company->area_id = $request->input('area_id');
        // $company->district_id = $request->input('district_id');
        // $company->address = $request->input('address');
        $company->website_address = $request->input('website_address');       
        $company->no_of_employees = $request->input('no_of_employees');
        $company->no_of_offices = $request->input('no_of_offices');
        $company->established_in = $request->input('established_in');
        $company->payment_id  = $request->input('payment_id');        
        $company->verified    = $request->input('verified');
        $company->is_active = $request->input('is_active');
        $company->is_featured = $request->input('is_featured');
        $company->is_subscribed = $request->input('is_subscribed');
        $company->package_id   = $request->input('package_id');
        $company->map   = $request->input('map');
        $company->facebook   = $request->input('facebook');
        $company->twitter   = $request->input('twitter');
        $company->linkedin   = $request->input('linkedin');
        $company->instagram   = $request->input('instagram');
        $company->target_employer_id = $request->input('target_employer_id');
        $company->preferred_school_id = $request->input('preferred_school_id');
        $company->keyword_id = $request->input('keyword_id');
        $company->key_strength_id = $request->input('key_strength_id');
        $company->description = $request->input('description');
        $company->industry_id = $request->input('industry_id');
        $company->sub_sector_id = $request->input('sub_sector_id');
        $company->total_impressions = $request->input('total_impressions');
        $company->total_clicks = $request->input('total_clicks');
        $company->total_position_listings = $request->input('total_position_listings');
        $company->total_received_profiles = $request->input('total_received_profiles');
        $company->total_shortlists = $request->input('total_shortlists');
        $company->total_connections = $request->input('sub_sector_id');        
        // $company->website_address = (false === strpos($website_address, 'http')) ? 'http://' . $website_address : $website_address;
        // $company->package_start_date  = $request->input('package_start_date')? Carbon::createFromFormat('d/m/Y', $request->get('package_start_date'))->format('Y-m-d'):null;
        // $company->package_end_date  = $request->input('package_end_date')? Carbon::createFromFormat('d/m/Y', $request->get('package_end_date'))->format('Y-m-d'):null;
        // $company->password_updated_date   = $request->input('password_updated_date');
        $company->save();
        /*         * ******************************* */
        $company->slug = str_slug($company->company_name, '-') . '-' . $company->id;
        /*         * ******************************* */
        $company->update();
        /* * ************************************ */
        if ($request->has('package_id') && $request->input('package_id') > 0) {
            $package_id = $request->input('package_id');
            $package = Package::find($package_id);
            $this->addCompanyPackage($company, $package);
        }
        /* * ************************************ */
        
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
        $packages   = Package::where('package_for', '=', 'employer')->pluck('package_title','id')->toArray();
        $industries = Industry::pluck('industry_name','id')->toArray();
        $countries  = Country::pluck('country_name','id')->toArray();
        // $areas      = Area::pluck('area_name','id')->toArray();
        // $districts  = District::pluck('district_name','id')->toArray();
        $sectors    = SubSector::pluck('sub_sector_name','id')->toArray();
        $job_titles = JobTitle::pluck('job_title','id')->toArray();
        $job_types  = JobType::pluck('job_type','id')->toArray();
        $job_shifts  = JobShift::pluck('job_shift','id')->toArray();
        $languages  = Language::pluck('language_name','id')->toArray();
        $skills = JobSkill::pluck('job_skill','id')->toArray();
        $degree_levels  = DegreeLevel::pluck('degree_name','id')->toArray();
        $carrier_levels = CarrierLevel::pluck('carrier_level','id')->toArray();
        $experiences = JobExperience::pluck('job_experience','id')->toArray();
        $study_fields = StudyField::pluck('study_field_name','id')->toArray();
        $functionals = FunctionalArea::pluck('area_name','id')->toArray();
        $payments = PaymentMethod::pluck('payment_name','id')->toArray();
        $geographicals  = Geographical::pluck('geographical_name','id')->toArray();
        $keywords  = Keyword::pluck('keyword_name','id')->toArray();
        $institutions = Institution::pluck('institution_name','id')->toArray();
        $key_strengths = KeyStrength::pluck('key_strength_name','id')->toArray();
        $specialities = Speciality::pluck('speciality_name','id')->toArray();
        $qualifications = Qualification::pluck('qualification_name','id')->toArray();
        $seekers = User::pluck('name','id')->toArray();

        return view('admin.companies.edit', compact('company','packages','industries','countries','sectors','job_titles','job_types','languages','skills','degree_levels','carrier_levels','experiences','study_fields','functionals','job_shifts','payments','geographicals','keywords','institutions','key_strengths','specialities','qualifications','seekers'));
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
            'company_name' => 'required',
            'user_name' => 'required',
            'email'     => 'required|email|unique:companies,email,'.$company->id,
            'phone'     => 'required',
        ]);

        // $company = Company::findOrFail($id);
        /*         * **************************************** */
        if(isset($request->company_logo)) {
            $photo = $_FILES['company_logo'];
            if(!empty($photo['name'])){
                $file_name = $photo['name'].'-'.time().'.'.$request->file('company_logo')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/company_logo/'.$file_name));
                $img->save(public_path('/uploads/company_logo/'.$file_name));

                $company->company_logo = $file_name;
            }
        }
        /*         * ************************************** */
        $company->company_name = $request->input('company_name');
        $company->name      = $request->input('name');
        $company->user_name = $request->input('user_name');
        $company->email = $request->input('email');
        $company->phone = $request->input('phone');
        $company->position_title = $request->input('position_title');
        if (!empty($request->input('password'))) {
            $company->password = Hash::make($request->input('password'));
        }     
        $company->country_id = $request->input('country_id');
        // $company->area_id = $request->input('area_id');
        // $company->district_id = $request->input('district_id');
        // $company->address = $request->input('address');
        $company->website_address = $request->input('website_address');       
        $company->no_of_employees = $request->input('no_of_employees');
        $company->no_of_offices = $request->input('no_of_offices');
        $company->established_in = $request->input('established_in');
        $company->payment_id  = $request->input('payment_id');        
        $company->verified    = $request->input('verified');
        $company->is_active = $request->input('is_active');
        $company->is_featured = $request->input('is_featured');
        $company->is_subscribed = $request->input('is_subscribed');
        $company->package_id   = $request->input('package_id');
        $company->map   = $request->input('map');
        $company->facebook   = $request->input('facebook');
        $company->twitter   = $request->input('twitter');
        $company->linkedin   = $request->input('linkedin');
        $company->instagram   = $request->input('instagram');
        $company->target_employer_id = $request->input('target_employer_id');
        $company->preferred_school_id = $request->input('preferred_school_id');
        $company->keyword_id = $request->input('keyword_id');
        $company->key_strength_id = $request->input('key_strength_id');
        $company->description = $request->input('description');
        $company->industry_id = $request->input('industry_id');
        $company->sub_sector_id = $request->input('sub_sector_id');
        $company->total_impressions = $request->input('total_impressions');
        $company->total_clicks = $request->input('total_clicks');
        $company->total_position_listings = $request->input('total_position_listings');
        $company->total_received_profiles = $request->input('total_received_profiles');
        $company->total_shortlists = $request->input('total_shortlists');
        $company->total_connections = $request->input('sub_sector_id');
        // $company->website_address = (false === strpos($website_address, 'http')) ? 'http://' . $website_address : $website_address;
        $company->password_updated_date   = $request->input('password_updated_date');        
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
    public function destroy(Company $company){
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company has been deleted!');
    }
}
