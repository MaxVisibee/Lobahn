<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Carbon\Carbon;

use DB;
use Hash;
use Mail;
use Image;

use App\Models\User;
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
use App\Models\Notification;
use App\Models\Institution;
use App\Models\KeyStrength;
use App\Models\Speciality;
use App\Models\Qualification;
use App\Models\TargetPay;
use App\Models\JobSkillOpportunity;
use App\Models\LanguageLevel;
use App\Models\LanguageUsage;
use App\Models\ProfileCv;
use App\Models\Opportunity;
use App\Models\PeopleManagementLevel;

use App\Traits\JobSeekerPackageTrait;
use App\Traits\MultiSelectTrait;
use App\Traits\TalentScoreTrait;
use App\Traits\SeekerTrait;

class UserController extends Controller
{
    use JobSeekerPackageTrait;
    use TalentScoreTrait;
    use SeekerTrait;
    use MultiSelectTrait;

    public function index()
    {
        $users = User::orderBy('id','DESC')->get();
        return view('admin.seekers.index',compact('users'));
    }

    public function create(){
        $countries  = Country::pluck('country_name','id')->toArray();
        $industries = Industry::pluck('industry_name','id')->toArray();
        $packages   = Package::where('package_for', '=', 'individual')->pluck('package_title','id')->toArray();
        $sectors    = SubSector::pluck('sub_sector_name','id')->toArray();
        $job_titles = JobTitle::pluck('job_title','id')->toArray();
        $job_types  = JobType::pluck('job_type','id')->toArray();
        $languages  = Language::pluck('language_name','id')->toArray();
        $language_levels = LanguageLevel::pluck('level', 'id')->toArray();
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
        $packages = Package::where('package_for','=','individual')->pluck('package_title','id')->toArray();
        $peopleManagementLevel = PeopleManagementLevel::pluck('level', 'id')->toArray();
        return view('admin.seekers.create', compact('language_levels', 'peopleManagementLevel', 'countries', 'industries','packages','skills','job_titles','languages','degree_levels','carrier_levels','experiences','study_fields','functionals','job_types','sectors','companies','payments','geographicals','keywords','institutions','key_strengths','specialities','qualifications','job_shifts','packages'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'user_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm_password|min:6',
        ]);

        $user = new User();
        
        if (isset($request->image)) {
            $photo = $_FILES['image'];
            if (!empty($photo['name'])) {
                $file_name = 'profile_' . time() . '.' . $request->file('image')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(400, 400)->save(public_path('/uploads/profile_photos/' . $file_name));
                $img->save(public_path('/uploads/profile_photos/' . $file_name));
                $user->image = $file_name;
            }
        }

        if (!is_null($request->country_id)) $user->country_id = json_encode($request->country_id); else $user->country_id = NULL;
        if (!is_null($request->contract_term_id)) $user->contract_term_id = json_encode($request->contract_term_id); else $user->contract_term_id = NULL;
        if (!is_null($request->contract_hour_id)) $user->contract_hour_id = json_encode($request->contract_hour_id); else $user->contract_hour_id = NULL;
        if (!is_null($request->keyword_id)) $user->keyword_id = json_encode($request->keyword_id); else $user->keyword_id = NULL;
        if (!is_null($request->institution_id)) $user->institution_id = json_encode($request->institution_id); else $user->institution_id = NULL;
        if (!is_null($request->language_id)) $user->language_id = json_encode($request->language_id); else $user->language_id = NULL;
        if (!is_null($request->language_level)) $user->language_level = json_encode($request->language_level); else $user->language_level = NULL;
        if (!is_null($request->geographical_id)) $user->geographical_id = json_encode($request->geographical_id); else $user->geographical_id = NULL;
        if (!is_null($request->skill_id)) $user->skill_id = json_encode($request->skill_id); else $user->skill_id = NULL;
        if (!is_null($request->field_study_id)) $user->field_study_id = json_encode($request->field_study_id); else $user->field_study_id = NULL;
        if (!is_null($request->qualification_id)) $user->qualification_id = json_encode($request->qualification_id); else $user->qualification_id = NULL;
        if (!is_null($request->key_strength_id)) $user->key_strength_id = json_encode($request->key_strength_id); else $user->key_strength_id = NULL;
        if (!is_null($request->position_title_id)) $user->position_title_id = json_encode($request->position_title_id); else $user->position_title_id = NULL;
        if (!is_null($request->industry_id)) $user->industry_id = json_encode($request->industry_id); else $user->industry_id = NULL;
        if (!is_null($request->functional_area_id)) $user->functional_area_id = json_encode($request->functional_area_id); else $user->functional_area_id = NULL;
        if (!is_null($request->target_employer_id)) $user->target_employer_id = json_encode($request->target_employer_id); else $user->target_employer_id = NULL;
        if (!is_null($request->sub_sector_id)) $user->sub_sector_id = json_encode($request->sub_sector_id); else $user->sub_sector_id = NULL;
        if (!is_null($request->specialist_id)) $user->specialist_id = json_encode($request->specialist_id); else $user->specialist_id = NULL;

        
        if (!empty($request->input('password'))) 
        $user->is_trial         = true;
        $user->trial_days       = 30;
        $user->password         = Hash::make($request->input('password'));
        $user->name             = $request->input('name');
        $user->user_name        = $request->input('user_name');
        $user->email            = $request->input('email');
        $user->phone            = $request->input('phone');
        $user->dob              = $request->input('dob');
        $user->gender           = $request->input('gender');
        $user->nric             = $request->input('nric');
        $user->full_time_salary = $request->fulltime_amount;
        $user->part_time_salary = $request->parttime_amount;
        $user->freelance_salary = $request->freelance_amount;
        $user->target_salary    = $request->target_salary;
        $user->is_active        = $request->input('is_active');
        $user->verified         = $request->input('verified');
        $user->marital_status   = $request->input('marital_status');
        $user->description      = $request->input('description');
        $user->highlight_1      = $request->input('highlight_1');
        $user->highlight_2      = $request->input('highlight_2');
        $user->highlight_3      = $request->input('highlight_3');
        $user->experience_id    = $request->input('experience_id');
        $user->management_level_id    = $request->input('management_level_id');
        $user->education_level_id     = $request->input('education_level_id');
        $user->people_management_id   = $request->input('people_management_id');
        $user->is_immediate_available = $request->input('is_immediate_available');
        $user->save();

        if (isset($request['language_id'])) {
            foreach ($request['language_id'] as $key => $val) {
                $language = new LanguageUsage();
                $language->user_id = '';
                $language->job_id = $user->id;
                $language->language_id = $val;
                $language->level_id = $request['language_level'][$key];
                $language->save();
            }
        }

        if ($request->has('package_id') && $request->input('package_id') > 0) {
            $package_id = $request->input('package_id');
            $package = Package::find($package_id);
            $this->addJobSeekerPackage($user, $package);
        }

        if (isset($request['cv'])) {
            $upload_cv = [];
            for ($i = 0; $i < count($request->cv); $i++) {
                $cv_file = $request->file('cv')[$i];
                $fileName = 'cv_' . time() . '.' . $cv_file->guessExtension();
                $cv_file->move(public_path('uploads/cv_files'), $fileName);
                $upload_cv[] = $fileName;
                $cv['user_id'] = $user->id;
                $cv['cv_file'] = $fileName;
                ProfileCv::create($cv);
            }
            $user->cv = $upload_cv;
            $user->update();
        }
        $type = "candidate";
        $this->languageAction($type, $user->id, $request->language_1, $request->level_1, $request->language_2, $request->level_2, $request->language_3, $request->level_3);
        $this->action($type, $user->id, $request->keyword_id, $request->country_id, $request->job_type_id, $request->contract_hour_id, $request->institution_id, $request->geographical_id, $request->job_skill_id, $request->field_study_id, $request->qualification_id, $request->key_strength_id, $request->job_title_id, $request->industry_id, $request->functional_area_id, $request->target_employer_id, $request->specialist_id, $request->sub_sector_id);
        $this->addTalentScore($user);
        return redirect()->route('seekers.index')->with('success','Seeker has been created!');
    }

    public function show($id){
        $data         = User::find($id);
        $specialities = Speciality::All();
        $companies    = Company::All();
        $study_fields = StudyField::All();
        return view('admin.seekers.show',compact('data','specialities','companies','study_fields'));
    }

    public function edit($id)
    {
        $user            = User::find($id);
        $cvs             = ProfileCv::where('user_id', $user->id)->get();
        $countries       = Country::pluck('country_name','id')->toArray();
        $industries      = Industry::pluck('industry_name','id')->toArray();
        $sectors         = SubSector::pluck('sub_sector_name','id')->toArray();
        $job_titles      = JobTitle::pluck('job_title','id')->toArray();
        $job_types       = JobType::pluck('job_type','id')->toArray();
        $languages       = Language::pluck('language_name','id')->toArray();
        $language_levels = LanguageLevel::pluck('level', 'id')->toArray();
        $skills          = JobSkill::pluck('job_skill','id')->toArray();
        $degree_levels   = DegreeLevel::pluck('degree_name','id')->toArray();
        $carrier_levels  = CarrierLevel::pluck('carrier_level','id')->toArray();
        $experiences     = JobExperience::pluck('job_experience','id')->toArray();
        $study_fields    = StudyField::pluck('study_field_name','id')->toArray();
        $functionals     = FunctionalArea::pluck('area_name','id')->toArray();
        $companies       = Company::pluck('company_name', 'id')->toArray();
        $payments        = PaymentMethod::pluck('payment_name', 'id')->toArray();
        $geographicals   = Geographical::pluck('geographical_name','id')->toArray();
        $keywords        = Keyword::pluck('keyword_name','id')->toArray();
        $institutions    = Institution::pluck('institution_name','id')->toArray();
        $key_strengths   = KeyStrength::pluck('key_strength_name','id')->toArray();
        $specialities    = Speciality::pluck('speciality_name','id')->toArray();
        $qualifications  = Qualification::pluck('qualification_name','id')->toArray();
        $job_shifts      = JobShift::pluck('job_shift','id')->toArray();
        $peopleManagementLevel = PeopleManagementLevel::pluck('level', 'id')->toArray();
        $packages   = Package::where('package_for', '=', 'individual')->pluck('package_title','id')->toArray();
    
        return view('admin.seekers.edit',compact('language_levels', 'peopleManagementLevel', 'user', 'cvs', 'countries', 'industries','packages','sectors','job_titles','job_types','languages','skills','degree_levels','carrier_levels','experiences','study_fields','functionals','companies','payments','geographicals','keywords','institutions','key_strengths','specialities','qualifications','job_shifts','packages'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required',
            'user_name' => 'required',
            'email'     => 'required|email|unique:users,email,'.$id,
        ]);

        $user = User::findOrFail($id);

        if (isset($request->image)) {
            $photo = $_FILES['image'];
            if (!empty($photo['name'])) {
                $file_name = 'profile_' . time() . '.' . $request->file('image')->guessExtension();
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                $img->resize(400, 400)->save(public_path('/uploads/profile_photos/' . $file_name));
                $img->save(public_path('/uploads/profile_photos/' . $file_name));
                $user->image = $file_name;
            }
        }

        if (!is_null($request->country_id)) $user->country_id = json_encode($request->country_id);else $user->country_id = NULL;
        if (!is_null($request->contract_term_id)) $user->contract_term_id = json_encode($request->contract_term_id);else $user->contract_term_id = NULL;
        if (!is_null($request->contract_hour_id)) $user->contract_hour_id = json_encode($request->contract_hour_id);else $user->contract_hour_id = NULL;
        if (!is_null($request->keyword_id)) $user->keyword_id = json_encode($request->keyword_id);else $user->keyword_id = NULL;
        if (!is_null($request->institution_id)) $user->institution_id = json_encode($request->institution_id);else $user->institution_id = NULL;
        if (!is_null($request->language_id)) $user->language_id = json_encode($request->language_id);else $user->language_id = NULL;
        if (!is_null($request->language_level)) $user->language_level = json_encode($request->language_level);else $user->language_level = NULL;
        if (!is_null($request->geographical_id)) $user->geographical_id = json_encode($request->geographical_id);else $user->geographical_id = NULL;
        if (!is_null($request->skill_id)) $user->skill_id = json_encode($request->skill_id);else $user->skill_id = NULL;
        if (!is_null($request->field_study_id)) $user->field_study_id = json_encode($request->field_study_id);else $user->field_study_id = NULL;
        if (!is_null($request->qualification_id)) $user->qualification_id = json_encode($request->qualification_id);else $user->qualification_id = NULL;
        if (!is_null($request->key_strength_id)) $user->key_strength_id = json_encode($request->key_strength_id);else $user->key_strength_id = NULL;
        if (!is_null($request->position_title_id)) $user->position_title_id = json_encode($request->position_title_id);else $user->position_title_id = NULL;
        if (!is_null($request->industry_id)) $user->industry_id = json_encode($request->industry_id);else $user->industry_id = NULL;
        if (!is_null($request->functional_area_id)) $user->functional_area_id = json_encode($request->functional_area_id);else $user->functional_area_id = NULL;
        if (!is_null($request->target_employer_id)) $user->target_employer_id = json_encode($request->target_employer_id);else $user->target_employer_id = NULL;
        if (!is_null($request->sub_sector_id)) $user->sub_sector_id = json_encode($request->sub_sector_id);else $user->sub_sector_id = NULL;
        if (!is_null($request->specialist_id)) $user->specialist_id = json_encode($request->specialist_id);else $user->specialist_id = NULL;

        
        if (!empty($request->input('password'))) 
        $user->password = Hash::make($request->input('password'));
        $user->name                 = $request->input('name');
        $user->user_name            = $request->input('user_name');
        $user->email                = $request->input('email');
        $user->phone                = $request->input('phone');        
        $user->dob                  = $request->input('dob');
        $user->gender               = $request->input('gender');
        $user->nric                 = $request->input('nric');
        $user->marital_status       = $request->input('marital_status');
        $user->description          = $request->input('description');
        $user->highlight_1          = $request->input('highlight_1');
        $user->highlight_2          = $request->input('highlight_2');
        $user->highlight_3          = $request->input('highlight_3');
        $user->experience_id        = $request->input('experience_id');
        $user->management_level_id  = $request->input('management_level_id');
        $user->education_level_id   = $request->input('education_level_id');
        $user->people_management_id = $request->input('people_management_id');
        $user->full_time_salary     = $request->fulltime_amount;
        $user->part_time_salary     = $request->parttime_amount;
        $user->freelance_salary     = $request->freelance_amount;
        $user->target_salary        = $request->target_salary;
        $user->is_immediate_available = $request->input('is_immediate_available');
        $user->is_active            = $request->input('is_active');
        $user->verified             = $request->input('verified');
        $user->save();
        if (isset($request['language_id'])) {
            foreach ($request['language_id'] as $key => $val) {
                $language = new LanguageUsage();
                $language->user_id = '';
                $language->job_id = $user->id;
                $language->language_id = $val;
                $language->level_id = $request['language_level'][$key];
                $language->save();
            }
        }

        if ($request->has('package_id') && $request->input('package_id') > 0) {
            $package_id = $request->input('package_id');
            $package = Package::find($package_id);
            $this->addJobSeekerPackage($user, $package);
        }

        if (isset($request['cv'])) {
            $upload_cv = [];
            for ($i = 0; $i < count($request->cv); $i++) {
                $cv_file = $request->file('cv')[$i];
                $fileName = 'cv_' . time() . '.' . $cv_file->guessExtension();
                $cv_file->move(public_path('uploads/cv_files'), $fileName);
                $upload_cv[] = $fileName;
                $cv['user_id'] = $user->id;
                $cv['cv_file'] = $fileName;
                ProfileCv::create($cv);
            }
            $user->cv = $upload_cv;
            $user->update();
        }

        $type = "candidate";
        $this->languageAction($type, $user->id, $request->language_1, $request->level_1, $request->language_2, $request->level_2, $request->language_3, $request->level_3);
        $this->action($type, $user->id, $request->keyword_id, $request->country_id, $request->job_type_id, $request->contract_hour_id, $request->institution_id, $request->geographical_id, $request->job_skill_id, $request->field_study_id, $request->qualification_id, $request->key_strength_id, $request->position_title_id, $request->industry_id, $request->functional_area_id, $request->target_employer_id, $request->specialist_id, $request->sub_sector_id);
        $this->addTalentScore($user);
        return redirect()->route('seekers.index')->with('success','Seeker has been updated!');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        JobStreamScore::where('user_id',$id)->delete();
        Notification::where('candidate_id',$id)->delete();
        return redirect()->route('seekers.index')->with('success','Seeker has been deleted!');
    }

    public function cvDelete(Request $request, $cv_id)
    {
        $cv = ProfileCv::find($cv_id);
        $user = User::find($request->user_id);
        $cv_arr = json_decode($user->cv);
        if (($key = array_search($cv->cv_file, $cv_arr)) !== false) unset($cv_arr[$key]);
        $user->cv = json_encode($cv_arr);
        $user->save();
        $cv->delete();
        return response()->json('success');
    }

    public function destroyAll(Request $request)
    {
        $data = User::destroy($request->data);
        Notification::truncate();
        JobStreamScore::truncate();        
        if ($data) return response()->json(['success' => true]);
        else return response()->json(['success' => false]);
    }
}