<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Image;
use Carbon\Carbon;
use App\Models\Area;
use App\Models\District;
use App\Models\Industry;
use App\Models\Country;
use App\Models\Package;
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
use App\Models\Company;
use App\Models\PaymentMethod;
use Mail;

class UserController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','DESC')->get();

        return view('admin.seekers.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $countries  = Country::pluck('country_name','id')->toArray();
        $areas      = Area::pluck('area_name','id')->toArray();
        // $districts  = District::pluck('district_name','id')->toArray();
        $industries = Industry::pluck('industry_name','id')->toArray();
        $packages   = Package::pluck('package_title','id')->toArray();
        $districts  = District::pluck('district_name','id')->toArray();
        $sectors    = SubSector::pluck('sub_sector_name','id')->toArray();
        $job_titles = JobTitle::pluck('job_title','id')->toArray();
        $job_types  = JobType::pluck('job_type','id')->toArray();
        $languages  = Language::pluck('language_name','id')->toArray();
        $job_skills = JobSkill::pluck('job_skill','id')->toArray();
        $degree_levels  = DegreeLevel::pluck('degree_name','id')->toArray();
        $carrier_levels = CarrierLevel::pluck('carrier_level','id')->toArray();
        $experiences = JobExperience::pluck('job_experience','id')->toArray();
        $study_fields = StudyField::pluck('study_field_name','id')->toArray();
        $functionals = FunctionalArea::pluck('area_name','id')->toArray();
        $companies   = Company::pluck('name', 'id')->toArray();
        $payments   = PaymentMethod::pluck('payment_name', 'id')->toArray();

        return view('admin.seekers.create', compact('areas', 'countries', 'industries','packages','districts','job_skills','job_titles','languages','degree_levels','carrier_levels','experiences','study_fields','functionals','job_types','sectors','companies','payments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'user_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm_password|min:6',
        ]);

        $user = new User();
        /*         * **************************************** */
        if(isset($request->image)) {
            $photo = $_FILES['image'];
            if(!empty($photo['name'])){
                $file_name = $photo['name'].'-'.time().'.'.$request->file('image')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/profile_photos/'.$file_name));
                $img->save(public_path('/uploads/profile_photos/'.$file_name));

                $user->image = $file_name;
            }
        }

        if(isset($request->cv)) {
            $cv_file = $request->file('cv');
            $fileName = 'cv_'.time().'.'.$cv_file->guessExtension();
            $cv_file->move(public_path('uploads/cv_files'), $fileName);
            $user->cv = $fileName;
        }

        /* *************************************** */
        $user->name = $request->input('name');
        $user->user_name = $request->input('user_name');
        $user->email = $request->input('email');
        if (!empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->father_name = $request->input('father_name');
        // $user->dob = $request->input('dob')? Carbon::createFromFormat('d/m/Y', $request->get('dob'))->format('Y-m-d'):null;
        $user->dob = $request->input('dob');
        $user->gender = $request->input('gender');
        $user->marital_status = $request->input('marital_status');
        $user->nationality = $request->input('nationality');
        $user->nric = $request->input('nric');
        $user->country_id = $request->input('country_id');
        $user->state_id = $request->input('state_id');
        $user->city_id = $request->input('city_id');
        $user->phone = $request->input('phone');
        $user->mobile_phone = $request->input('mobile_phone');
        $user->experience_id = $request->input('experience_id');
        $user->career_level_id = $request->input('career_level_id');
        $user->industry_id = $request->input('industry_id');
        $user->functional_area_id = $request->input('functional_area_id');
        $user->current_salary = $request->input('current_salary');
        $user->expected_salary = $request->input('expected_salary');
        $user->street_address = $request->input('street_address');
        $user->is_immediate_available = $request->input('is_immediate_available');
        $user->is_active = $request->input('is_active');
        $user->verified = $request->input('verified');

        // $user->desired_location   = $request->input('desired_location');
        // $user->desired_position_title = $request->input('desired_position_title');
        // $user->desired_industries = $request->input('desired_industries');
        // $user->desired_sub_sector = $request->input('desired_sub_sector');
        // $user->desired_functions  = $request->input('desired_functions');
        // $user->desired_specialists  = $request->input('desired_specialists');
        // $user->desired_employers  = $request->input('desired_employers');
        // $user->desired_contract_terms  = $request->input('desired_contract_terms');
        // $user->desired_pay  = $request->input('desired_pay');

        $user->position_title_id = $request->input('position_title_id');
        $user->experience_id  = $request->input('experience_id');
        $user->sub_sector_id     = $request->input('sub_sector_id');
        $user->functional_area_id = $request->input('functional_area_id');
        $user->company_id        = $request->input('company_id');
        $user->payment_id        = $request->input('payment_id');
        $user->contract_hour_id  = $request->input('contract_hour_id');
        $user->experience_id     = $request->input('experience_id');
        $user->degree_level_id   = $request->input('degree_level_id');
        $user->language_id       = $request->input('language_id');
        $user->carrier_level_id  = $request->input('carrier_level_id');
        $user->study_field_id    = $request->input('study_field_id');
        $user->geographical_experience = $request->input('geographical_experience');
        $user->people_management= $request->input('people_management');
        $user->qualification    = $request->input('qualification');
        $user->tech_knowledge    = $request->input('tech_knowledge');
        $user->contract_term    = $request->input('contract_term');
        $user->academic_institution    = $request->input('academic_institution');        

        $user->save();

        /*         * *********************** */
        // $user->name = $user->getName();
        // $user->update();

        Mail::send('emails.customer_register', ['user' => $user],
            function ($m) use ($user){
                $m->from('developer@visibleone.com', 'Visible One');
                $m->to('visibleone.max@gmail.com',$user->name)->subject('Register Successfully Mail !');
        });
       

        /*         * *********************** */

        return redirect()->route('seekers.index')->with('success','Seeker has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = User::find($id);
        return view('admin.seekers.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $countries  = Country::pluck('country_name','id')->toArray();
        $areas      = Area::pluck('area_name','id')->toArray();
        $industries = Industry::pluck('industry_name','id')->toArray();
        $packages   = Package::pluck('package_title','id')->toArray();
        $districts  = District::pluck('district_name','id')->toArray();
        $sectors    = SubSector::pluck('sub_sector_name','id')->toArray();
        $job_titles = JobTitle::pluck('job_title','id')->toArray();
        $job_types  = JobType::pluck('job_type','id')->toArray();
        $languages  = Language::pluck('language_name','id')->toArray();
        $job_skills = JobSkill::pluck('job_skill','id')->toArray();
        $degree_levels  = DegreeLevel::pluck('degree_name','id')->toArray();
        $carrier_levels = CarrierLevel::pluck('carrier_level','id')->toArray();
        $experiences = JobExperience::pluck('job_experience','id')->toArray();
        $study_fields = StudyField::pluck('study_field_name','id')->toArray();
        $functionals = FunctionalArea::pluck('area_name','id')->toArray();
        $companies   = Company::pluck('name', 'id')->toArray();
        $payments   = PaymentMethod::pluck('payment_name', 'id')->toArray();
    
        return view('admin.seekers.edit',compact('user', 'areas', 'countries', 'industries','packages','districts','sectors','job_titles','job_types','languages','job_skills','degree_levels','carrier_levels','experiences','study_fields','functionals','companies','payments'));
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
            'name'      => 'required',
            'user_name' => 'required',
            'email'     => 'required|email|unique:users,email,'.$id,
            'password'  => 'required|same:confirm_password|min:6',
        ]);
    
        $user = User::findOrFail($id);
        /*         * **************************************** */
        if(isset($request->image)) {
            $photo = $_FILES['image'];
            if(!empty($photo['name'])){
                $file_name = $photo['name'].'-'.time().'.'.$request->file('image')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/profile_photos/'.$file_name));
                $img->save(public_path('/uploads/profile_photos/'.$file_name));

                $user->image = $file_name;
            }
        }
        
        if(isset($request->cv)) {
            $cv_file = $request->file('cv');
            $fileName = 'cv_'.time().'.'.$cv_file->guessExtension();
            $cv_file->move(public_path('uploads/cv_files'), $fileName);
            $user->cv = $fileName;
        }
        /*         * ************************************** */
        $user->name = $request->input('name');
        $user->user_name = $request->input('user_name');
        /*         * *********************** */
        $user->email = $request->input('email');
        if (!empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->father_name = $request->input('father_name');
        // $user->dob = $request->input('dob')? Carbon::createFromFormat('d/m/Y', $request->get('dob'))->format('Y-m-d'):null;
        $user->dob = $request->input('dob');
        $user->gender = $request->input('gender');
        $user->marital_status = $request->input('marital_status');
        $user->nationality = $request->input('nationality');
        $user->nric = $request->input('nric');
        
        $user->country_id = $request->input('country_id');
        $user->state_id = $request->input('state_id');
        $user->city_id = $request->input('city_id');
        $user->phone = $request->input('phone');
        $user->mobile_phone = $request->input('mobile_phone');
        $user->experience_id = $request->input('experience_id');
        $user->career_level_id = $request->input('career_level_id');
        $user->industry_id = $request->input('industry_id');
        $user->functional_area_id = $request->input('functional_area_id');
        $user->current_salary = $request->input('current_salary');
        $user->expected_salary = $request->input('expected_salary');
        
        $user->street_address = $request->input('street_address');
        $user->is_immediate_available = $request->input('is_immediate_available');
        $user->is_active = $request->input('is_active');
        $user->verified = $request->input('verified');

        $user->position_title_id = $request->input('position_title_id');
        $user->experience_id  = $request->input('experience_id');
        $user->sub_sector_id     = $request->input('sub_sector_id');
        $user->functional_area_id = $request->input('functional_area_id');
        $user->company_id        = $request->input('company_id');
        $user->payment_id        = $request->input('payment_id');
        $user->contract_hour_id  = $request->input('contract_hour_id');
        $user->experience_id     = $request->input('experience_id');
        $user->degree_level_id   = $request->input('degree_level_id');
        $user->language_id       = $request->input('language_id');
        $user->carrier_level_id  = $request->input('carrier_level_id');
        $user->study_field_id    = $request->input('study_field_id');
        $user->geographical_experience = $request->input('geographical_experience');
        $user->people_management= $request->input('people_management');
        $user->qualification    = $request->input('qualification');
        $user->tech_knowledge    = $request->input('tech_knowledge');
        $user->contract_term    = $request->input('contract_term');
        $user->academic_institution    = $request->input('academic_institution');        
        
        $user->update();

        /*         * ************************************ */

        return redirect()->route('seekers.index')->with('success','Seeker has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('seekers.index')
                        ->with('success','Seeker has been deleted!');
    }
}
