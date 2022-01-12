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
use App\Models\JobShift;
use App\Models\Language;
use App\Models\JobSkill;
use App\Models\DegreeLevel;
use App\Models\CarrierLevel;
use App\Models\JobExperience;
use App\Models\StudyField;
use App\Models\FunctionalArea;
use App\Models\Company;
use App\Models\PaymentMethod;
use App\Models\Geographical;
use App\Models\Keyword;

use App\Models\Institution;
use App\Models\KeyStrength;
use App\Models\Speciality;
use App\Models\Qualification;
use App\Models\TargetPay;
use App\Models\JobSkillOpportunity;
use App\Models\ProfileCv;
use App\Models\Opportunity;

use Mail;
use App\Traits\JobSeekerPackageTrait;
use App\Traits\TalentScoreTrait;
use App\Traits\SeekerTrait;

class UserController extends Controller
{

    use JobSeekerPackageTrait;
    use TalentScoreTrait;
    use SeekerTrait;
    
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
        $industries = Industry::pluck('industry_name','id')->toArray();
        $packages   = Package::where('package_for', '=', 'individual')->pluck('package_title','id')->toArray();
        $sectors    = SubSector::pluck('sub_sector_name','id')->toArray();
        $job_titles = JobTitle::pluck('job_title','id')->toArray();
        $job_types  = JobType::pluck('job_type','id')->toArray();
        $languages  = Language::pluck('language_name','id')->toArray();
        $skills = JobSkill::pluck('job_skill','id')->toArray();
        $degree_levels  = DegreeLevel::pluck('degree_name','id')->toArray();
        $carrier_levels = CarrierLevel::pluck('carrier_level','id')->toArray();
        $experiences = JobExperience::pluck('job_experience','id')->toArray();
        $study_fields = StudyField::pluck('study_field_name','id')->toArray();
        $functionals = FunctionalArea::pluck('area_name','id')->toArray();
        $companies   = Company::pluck('company_name', 'id')->toArray();
        $payments   = PaymentMethod::pluck('payment_name', 'id')->toArray();
        $geographicals  = Geographical::pluck('geographical_name','id')->toArray();
        $keywords  = Keyword::pluck('keyword_name','id')->toArray();
        $institutions = Institution::pluck('institution_name','id')->toArray();
        $key_strengths = KeyStrength::pluck('key_strength_name','id')->toArray();
        $specialities = Speciality::pluck('speciality_name','id')->toArray();
        $qualifications = Qualification::pluck('qualification_name','id')->toArray();
        $job_shifts  = JobShift::pluck('job_shift','id')->toArray();
        $target_pays = TargetPay::pluck('target_amount','id')->toArray();
        $packages = Package::where('package_for','=','individual')->pluck('package_title','id')->toArray();

        return view('admin.seekers.create', compact('countries', 'industries','packages','skills','job_titles','languages','degree_levels','carrier_levels','experiences','study_fields','functionals','job_types','sectors','companies','payments','geographicals','keywords','institutions','key_strengths','specialities','qualifications','job_shifts','target_pays','packages'));
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
                // $file_name = $photo['name'].'-'.time().'.'.$request->file('image')->guessExtension();
                $file_name = $photo['name'];
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(300, 300)->save(public_path('/uploads/profile_photos/'.$file_name));
                $img->save(public_path('/uploads/profile_photos/'.$file_name));

                $user->image = $file_name;
            }
        }

        /* *************************************** */
        $user->name         = $request->input('name');
        $user->user_name    = $request->input('user_name');
        $user->email        = $request->input('email');
        $user->phone        = $request->input('phone');
        if (!empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->dob              = $request->input('dob');
        $user->gender           = $request->input('gender');
        $user->nric             = $request->input('nric');
        $user->marital_status   = $request->input('marital_status');
        $user->description      = $request->input('description');
        $user->highlight_1      = $request->input('highlight_1');
        $user->highlight_2      = $request->input('highlight_2');
        $user->highlight_3      = $request->input('highlight_3');
        
        $user->target_pay_id        = $request->input('target_pay_id');
        $user->management_level_id  = $request->input('management_level_id');
        $user->experience_id        = $request->input('experience_id');
        $user->education_level_id   = $request->input('education_level_id');
        $user->people_management_id = $request->input('people_management_id');

        $user->country_id           = json_encode($request->input('country_id'));
        $user->contract_term_id     = json_encode($request->input('contract_term_id'));
        $user->contract_hour_id     = json_encode($request->input('contract_hour_id'));
        $user->keyword_id           = json_encode($request->input('keyword_id'));
        $user->institution_id       = json_encode($request->input('institution_id'));
        $user->language_id          = json_encode($request->input('language_id'));
        $user->language_level       = json_encode($request->input('language_level'));
        $user->geographical_id      = json_encode($request->input('geographical_id'));
        $user->skill_id             = json_encode($request->input('skill_id'));
        $user->field_study_id       = json_encode($request->input('field_study_id'));
        $user->qualification_id     = json_encode($request->input('qualification_id'));
        $user->key_strength_id      = json_encode($request->input('key_strength_id'));
        $user->position_title_id    = json_encode($request->input('position_title_id'));
        $user->industry_id          = json_encode($request->input('industry_id'));
        $user->sub_sector_id        = json_encode($request->input('sub_sector_id'));
        $user->functional_area_id   = json_encode($request->input('functional_area_id'));
        $user->specialist_id        = json_encode($request->input('specialist_id'));
        $user->target_employer_id   = json_encode($request->input('target_employer_id'));
        
        $user->is_immediate_available   = $request->input('is_immediate_available');
        $user->is_active                = $request->input('is_active');
        $user->verified                 = $request->input('verified');
        $user->target_salary       = $request->input('target_salary');
        $user->full_time_salary    = $request->input('full_time_salary');
        $user->part_time_salary    = $request->input('part_time_salary');
        $user->freelance_salary    = $request->input('freelance_salary');
        
        $user->save();

        if(isset($request['cv'])) {
            $upload_cv = [];
            for ($i = 0; $i < count($request->cv); $i++) {
                $cv_file = $request->file('cv')[$i];
                $fileName = 'cv_'.time().'.'.$cv_file->guessExtension();
                $cv_file->move(public_path('uploads/cv_files'), $fileName);
                $upload_cv[] = $fileName;

                $cv['user_id'] = $user->id;
                $cv['cv_file'] = $fileName;
                ProfileCv::create($cv);
            }
            $user->cv = $upload_cv;
            $user->update();
        }

        $this->storeSeekerDependency($request->all(), $user->id);

        /*         * ************************************ */
        if ($request->has('package_id') && $request->input('package_id') > 0) {
            $package_id = $request->input('package_id');
            $package = Package::find($package_id);
            $this->addJobSeekerPackage($user, $package);
        }
        /*         * ************************************ */

        // $this->addTalentScore($user);

        Mail::send('emails.customer_register', ['user' => $user],
            function ($m) use ($user){
                $m->from('developer@visibleone.com', 'Lobahn Technology');
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
        $specialities = Speciality::All();
        $companies = Company::All();
        $study_fields = StudyField::All();
        $job = Opportunity::find(6);
        
        // if(!empty(array_intersect(json_decode($job->country_id), json_decode($data->country_id)))) {
        //     dd('true');
        // }else {
        //     dd('false');
        // }

        return view('admin.seekers.show',compact('data','specialities','companies','study_fields'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user       = User::find($id);
        $cvs = ProfileCv::where('user_id', $user->id)->get();
        $countries  = Country::pluck('country_name','id')->toArray();
        $industries = Industry::pluck('industry_name','id')->toArray();
        $sectors    = SubSector::pluck('sub_sector_name','id')->toArray();
        $job_titles = JobTitle::pluck('job_title','id')->toArray();
        $job_types  = JobType::pluck('job_type','id')->toArray();
        $languages  = Language::pluck('language_name','id')->toArray();
        $skills     = JobSkill::pluck('job_skill','id')->toArray();
        $degree_levels  = DegreeLevel::pluck('degree_name','id')->toArray();
        $carrier_levels = CarrierLevel::pluck('carrier_level','id')->toArray();
        $experiences    = JobExperience::pluck('job_experience','id')->toArray();
        $study_fields   = StudyField::pluck('study_field_name','id')->toArray();
        $functionals    = FunctionalArea::pluck('area_name','id')->toArray();
        $companies      = Company::pluck('company_name', 'id')->toArray();
        $payments       = PaymentMethod::pluck('payment_name', 'id')->toArray();
        $geographicals  = Geographical::pluck('geographical_name','id')->toArray();
        $keywords       = Keyword::pluck('keyword_name','id')->toArray();
        $institutions   = Institution::pluck('institution_name','id')->toArray();
        $key_strengths  = KeyStrength::pluck('key_strength_name','id')->toArray();
        $specialities   = Speciality::pluck('speciality_name','id')->toArray();
        $qualifications = Qualification::pluck('qualification_name','id')->toArray();
        $job_shifts     = JobShift::pluck('job_shift','id')->toArray();
        $target_pays    = TargetPay::pluck('target_amount','id')->toArray();
        $packages   = Package::where('package_for', '=', 'individual')->pluck('package_title','id')->toArray();
    
        return view('admin.seekers.edit',compact('user', 'cvs', 'countries', 'industries','packages','sectors','job_titles','job_types','languages','skills','degree_levels','carrier_levels','experiences','study_fields','functionals','companies','payments','geographicals','keywords','institutions','key_strengths','specialities','qualifications','job_shifts','target_pays','packages'));
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

        /*         * ************************************** */
        $user->name = $request->input('name');
        $user->user_name = $request->input('user_name');
        /*         * *********************** */
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        if (!empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->dob = $request->input('dob');
        $user->gender = $request->input('gender');
        $user->marital_status = $request->input('marital_status');
        $user->nric = $request->input('nric');
        $user->description = $request->input('description');
        $user->highlight_1 = $request->input('highlight_1');
        $user->highlight_2 = $request->input('highlight_2');
        $user->highlight_3 = $request->input('highlight_3');


        $user->target_pay_id     = $request->input('target_pay_id');
        $user->management_level_id = $request->input('management_level_id');
        $user->experience_id = $request->input('experience_id');
        $user->education_level_id = $request->input('education_level_id');
        $user->people_management_id = $request->input('people_management_id');

        $user->is_immediate_available = $request->input('is_immediate_available');
        $user->is_active = $request->input('is_active');
        $user->verified = $request->input('verified');
        $user->target_salary       = $request->input('target_salary');
        $user->full_time_salary    = $request->input('full_time_salary');
        $user->part_time_salary    = $request->input('part_time_salary');
        $user->freelance_salary    = $request->input('freelance_salary');

        $user->country_id       = json_encode($request->input('country_id'));
        $user->contract_term_id = json_encode($request->input('contract_term_id'));
        $user->contract_hour_id = json_encode($request->input('contract_hour_id'));
        $user->keyword_id       = json_encode($request->input('keyword_id'));
        $user->institution_id   = json_encode($request->input('institution_id'));
        $user->language_id      = json_encode($request->input('language_id'));
        $user->language_level   = json_encode($request->input('language_level'));
        $user->geographical_id  = json_encode($request->input('geographical_id'));
        $user->skill_id         = json_encode($request->input('skill_id'));
        $user->field_study_id   = json_encode($request->input('field_study_id'));
        $user->qualification_id = json_encode($request->input('qualification_id'));
        $user->key_strength_id  = json_encode($request->input('key_strength_id'));
        $user->position_title_id = json_encode($request->input('position_title_id'));
        $user->industry_id      = json_encode($request->input('industry_id'));
        $user->sub_sector_id    = json_encode($request->input('sub_sector_id'));
        $user->functional_area_id = json_encode($request->input('functional_area_id'));
        $user->specialist_id    = json_encode($request->input('specialist_id'));
        $user->target_employer_id = json_encode($request->input('target_employer_id'));
        
        $user->save();

        if(isset($request['cv'])) {
            $upload_cv = [];
            for ($i = 0; $i < count($request->cv); $i++) {
                $cv_file = $request->file('cv')[$i];
                $fileName = 'cv_'.time().'.'.$cv_file->guessExtension();
                $cv_file->move(public_path('uploads/cv_files'), $fileName);
                $upload_cv[] = $fileName;

                $cv['user_id'] = $user->id;
                $cv['cv_file'] = $fileName;
                ProfileCv::create($cv);
            }
            $user->cv = $upload_cv;
            $user->update();
        }

        $this->updateSeekerDependency($request->all(), $user->id);

        /*         * ************************************ */
        if ($request->has('package_id') && $request->input('package_id') > 0) {
            $package_id = $request->input('package_id');
            $package = Package::find($package_id);
            if ($user->package_id > 0) {
                $this->updateJobSeekerPackage($user, $package);
            } else {
                $this->addJobSeekerPackage($user, $package);
            }
        }
        /*         * ************************************ */

        // $this->addTalentScore($user);

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

    public function cvDelete(Request $request, $cv_id)
    {
        $cv = ProfileCv::find($cv_id);

        $user = User::find($request->user_id);
        $cv_arr = json_decode($user->cv);
        if (($key = array_search($cv->cv_file, $cv_arr)) !== false) {
            unset($cv_arr[$key]);
        }
        $user->cv = json_encode($cv_arr);
        $user->save();

        $cv->delete();

        return response()->json('success');
    }
}
