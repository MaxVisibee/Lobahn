<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Opportunity;
use App\Models\Company;
use App\Models\JobType;
use App\Models\JobSkill;
use App\Models\JobStreamScore;
use App\Models\OpportunitySkill;
use App\Models\JobSkillOpportunity;
use App\Models\JobTitle;
use App\Models\JobShift;
use App\Models\JobExperience;
use App\Models\Country;
use App\Models\Notification;
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
use App\Models\KeywordUsage;
use App\Models\CountryUsage;
use App\Models\StudyFieldUsage;
use App\Models\FunctionalAreaUsage;
use App\Models\GeographicalUsage;
use App\Models\TargetEmployerUsage;
use App\Models\IndustryUsage;
use App\Models\InstitutionUsage;
use App\Models\JobShiftUsage;
use App\Models\JobTitleUsage;
use App\Models\JobTypeUsage;
use App\Models\KeyStrengthUsage;
use App\Models\LanguageLevel;
use App\Models\LanguageUsage;
use App\Models\PeopleManagementLevel;
use App\Models\QualificationUsage;
use App\Models\SpecialityUsage;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use App\Models\TargetPay;
use App\Traits\MultiSelectTrait;
use App\Traits\TalentScoreTrait;

class OpportunityController extends Controller{
    use TalentScoreTrait;
    use MultiSelectTrait;
    
    public function index(Request $request){    	
        // $data = Opportunity::orderBy('id','DESC')->paginate(5);
        $data = Opportunity::latest('id')->get();
        return view('admin.opportunities.index',compact('data'));
            // ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create(){
        
        $companies  = Company::pluck('company_name', 'id')->toArray();
        $job_types  = JobType::pluck('job_type', 'id')->toArray();
        $job_skills = JobSkill::pluck('job_skill', 'id')->toArray();
        $job_titles = JobTitle::pluck('job_title', 'id')->toArray();
        $job_shifts = JobShift::pluck('job_shift', 'id')->toArray();
        $job_exps   = JobExperience::pluck('job_experience', 'id')->toArray();
        // $areas      = Area::all();
        // $districts  = District::all();
        $degrees    = DegreeLevel::pluck('degree_name', 'id')->toArray();
        $carriers   = CarrierLevel::pluck('carrier_level', 'id')->toArray();
        $fun_areas  = FunctionalArea::pluck('area_name', 'id')->toArray();
        $countries  = Country::pluck('country_name', 'id')->toArray();
        // $packages   = Package::all();
        $industries = Industry::pluck('industry_name', 'id')->toArray();
        $sectors    = SubSector::pluck('sub_sector_name', 'id')->toArray();
        //$languages  = Language::all();
        $languages  = Language::pluck('language_name','id')->toArray();
        $language_levels = LanguageLevel::pluck('level','id')->toArray();
        // $degree_levels  = DegreeLevel::all();
        $study_fields = StudyField::pluck('study_field_name', 'id')->toArray();
        $payments = PaymentMethod::all();
        $geographicals  = Geographical::pluck('geographical_name', 'id')->toArray();
        $keywords  = Keyword::pluck('keyword_name', 'id')->toArray();
        $institutions = Institution::pluck('institution_name', 'id')->toArray();
        $key_strengths = KeyStrength::pluck('key_strength_name', 'id')->toArray();
        $specialities = Speciality::pluck('speciality_name', 'id')->toArray();
        $qualifications = Qualification::pluck('qualification_name', 'id')->toArray();
        $peopleManagementLevel = PeopleManagementLevel::pluck('level', 'id')->toArray();
      
        return view('admin.opportunities.create',compact('companies', 'peopleManagementLevel', 'language_levels', 'job_types','job_skills','job_titles','job_shifts','job_exps','degrees','carriers','fun_areas','countries','industries','sectors','languages','study_fields','geographicals','keywords','institutions','key_strengths','specialities','qualifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'title' => 'required',

        ]);

        $opportunity = new Opportunity();

        if (isset($request->supporting_document)) {
            $doc = $request->file('supporting_document');
            $fileName = 'job_support_doc_' . time() . '.' . $doc->guessExtension();
            $doc->move(public_path('uploads/job_support_docs'), $fileName);
            $opportunity->supporting_document = $fileName;
        }

        $opportunity->title = $request->title;
        $opportunity->country_id = $request->location_id;
        $opportunity->ref_no = $request->ref_no;
        $opportunity->description = $request->description;
        $opportunity->highlight_1 = $request->highlight_1;
        $opportunity->highlight_2 = $request->highlight_2;
        $opportunity->highlight_3 = $request->highlight_3;
        $opportunity->gender = $request->gender;
        $opportunity->website_address = $request->website_address;
        $opportunity->no_of_position = $request->no_of_position;
        $opportunity->benefits = $request->benefits;
        $opportunity->about_company = $request->about_company;
        
        $opportunity->listing_date = date('Y-m-d', strtotime($request->listing_date));
        $opportunity->expire_date = date('Y-m-d', strtotime($request->expire_date));
        $request->is_active == $request->is_active;
        if (isset($request->management_level)) {
            $opportunity->carrier_level_id = CarrierLevel::where('carrier_level', $request->management_level)->first()->id;
        }
        $opportunity->job_experience_id = $request->job_experience_id;
        $opportunity->degree_level_id = $request->degree_level_id;
        $opportunity->people_management = $request->people_management;
        $opportunity->full_time_salary = $request->full_time_salary;
        $opportunity->full_time_salary_max = $request->full_time_salary_max;
        $opportunity->part_time_salary = $request->part_time_salary;
        $opportunity->part_time_salary_max = $request->part_time_salary_max;
        $opportunity->freelance_salary = $request->freelance_salary;
        $opportunity->freelance_salary_max = $request->freelance_salary_max;
        $opportunity->carrier_level_id = $request->carrier_level_id;
        $opportunity->company_id = $request->company_id;

          if (!is_null($request->job_type_id)) $opportunity->job_type_id = json_encode($request->job_type_id);
        else $opportunity->job_type_id = NULL;

        if (!is_null($request->contract_hour_id)) $opportunity->contract_hour_id = json_encode($request->contract_hour_id);
        else $opportunity->contract_hour_id = NULL;

        if (!is_null($request->keyword_id)) $opportunity->keyword_id = json_encode($request->keyword_id);
        else $opportunity->keyword_id = NULL;

        if (!is_null($request->institution_id)) $opportunity->institution_id = json_encode($request->institution_id);
        else $opportunity->institution_id = NULL;

        if (!is_null($request->institution_id)) $opportunity->institution_id = json_encode($request->institution_id);
        else $opportunity->institution_id = NULL;

        if (!is_null($request->geographical_id)) $opportunity->geographical_id = json_encode($request->geographical_id);
        else $opportunity->geographical_id = NULL;

        if (!is_null($request->job_skill_id)) $opportunity->job_skill_id = json_encode($request->job_skill_id);
        else $opportunity->job_skill_id = NULL;

        if (!is_null($request->field_study_id)) $opportunity->field_study_id = json_encode($request->field_study_id);
        else $opportunity->field_study_id = NULL;

        if (!is_null($request->qualification_id)) $opportunity->qualification_id = json_encode($request->qualification_id);
        else $opportunity->qualification_id = NULL;

        if (!is_null($request->key_strength_id)) $opportunity->key_strength_id = json_encode($request->key_strength_id);
        else $opportunity->key_strength_id = NULL;

        if (!is_null($request->job_title_id)) $opportunity->job_title_id = json_encode($request->job_title_id);
        else $opportunity->job_title_id = NULL;

        if (!is_null($request->job_title_id)) $opportunity->job_title_id = json_encode($request->job_title_id);
        else $opportunity->job_title_id = NULL;

        if (!is_null($request->functional_area_id)) $opportunity->functional_area_id = json_encode($request->functional_area_id);
        else $opportunity->functional_area_id = NULL;

        if (!is_null($request->target_employer_id)) $opportunity->target_employer_id = json_encode($request->target_employer_id);
        else $opportunity->target_employer_id = NULL;

        if (!is_null($request->industry_id)) $opportunity->industry_id = json_encode($request->industry_id);
        else $opportunity->industry_id = NULL;

        if (!is_null($request->language_id)) $opportunity->language_id = json_encode($request->language_id);
        else $opportunity->language_id = NULL;

        if (!is_null($request->language_level)) $opportunity->language_level = json_encode($request->language_level);
        else $opportunity->language_level = NULL;

        //return $opportunity;
        $opportunity->save();

        $type = "opportunity";
        $opportunity = Opportunity::latest('created_at')->first();
        if( $request->language_id[0] !=""){
        $this->languageAction($type,$opportunity->id,$request->language_id,$request->language_level); #to save language usage table
        }

        
        $this->addJobTalentScore($opportunity);
        //$this->languageAction($type, $opportunity->id, $request->language_1, $request->level_1, $request->language_2, $request->level_2, $request->language_3, $request->level_3);
        $this->action($type, $opportunity->id, $request->keyword_id, $request->country_id, $request->job_type_id, $request->contract_hour_id, $request->institution_id, $request->geographical_id, $request->job_skill_id, $request->field_study_id, $request->qualification_id, $request->key_strength_id, $request->job_title_id, $request->industry_id, $request->functional_area_id, $request->target_employer_id, $request->specialist_id, $request->sub_sector_id);
        return redirect()->route('opportunities.index')->with('success','Opportunity created successfully');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Opportunity::find($id);
        //return $data->contractHour;
        // return $data->contract_hour_id;
        // dd($data);
        $employers = Company::All();
        $languages = Language::All();
        //dd($data->job_skill_id);
        return view('admin.opportunities.show',compact('data','employers','languages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = Opportunity::find($id);

        $companies  = Company::pluck('company_name', 'id')->toArray();
        $employers  = Company::pluck('company_name', 'id')->toArray();
        $job_types  = JobType::pluck('job_type', 'id')->toArray();
        $job_skills = JobSkill::pluck('job_skill', 'id')->toArray();
        $job_titles = JobTitle::pluck('job_title', 'id')->toArray();
        $job_shifts = JobShift::pluck('job_shift', 'id')->toArray();
        $job_exps   = JobExperience::pluck('job_experience', 'id')->toArray();
        // $areas      = Area::all();
        // $districts  = District::all();
        $degrees    = DegreeLevel::pluck('degree_name', 'id')->toArray();
        $carriers   = CarrierLevel::pluck('carrier_level', 'id')->toArray();
        $fun_areas  = FunctionalArea::pluck('area_name', 'id')->toArray();
        $countries  = Country::pluck('country_name', 'id')->toArray();
        // $packages   = Package::all();
        $industries = Industry::pluck('industry_name', 'id')->toArray();
        $sectors    = SubSector::pluck('sub_sector_name', 'id')->toArray();
        //$languages  = Language::all();
        $languages  = Language::pluck('language_name', 'id')->toArray();
        $language_levels = LanguageLevel::pluck('level','id')->toArray();
        // $degree_levels  = DegreeLevel::all();
        $study_fields = StudyField::pluck('study_field_name', 'id')->toArray();
        $payments = PaymentMethod::all();
        $geographicals  = Geographical::pluck('geographical_name', 'id')->toArray();
        $keywords  = Keyword::pluck('keyword_name', 'id')->toArray();
        $institutions = Institution::pluck('institution_name', 'id')->toArray();
        $key_strengths = KeyStrength::pluck('key_strength_name', 'id')->toArray();
        $specialities = Speciality::pluck('speciality_name', 'id')->toArray();
        $qualifications = Qualification::pluck('qualification_name', 'id')->toArray();
        $peopleManagementLevel = PeopleManagementLevel::pluck('level', 'id')->toArray();

        $langs =  DB::table('language_usages')->where('job_id',$data->id)->get();
        $type = "opportunity";
        $specialty_selected = $this->getSpecialties($id, $type);
        $study_field_selected = $this->getStudyFields($id,$type);
        return view('admin.opportunities.edit',compact('data', 'study_field_selected', 'peopleManagementLevel','specialty_selected', 'language_levels', 'companies','job_skills','job_shifts','job_exps','job_types','job_titles','degrees','carriers','fun_areas','countries','industries','sectors','languages','study_fields','payments','geographicals','keywords','institutions','key_strengths','specialities','qualifications','langs','employers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',

        ]);

        $opportunity = Opportunity::find($id);

        if (isset($request->supporting_document)) {
            $doc = $request->file('supporting_document');
            $fileName = 'job_support_doc_' . time() . '.' . $doc->guessExtension();
            $doc->move(public_path('uploads/job_support_docs'), $fileName);
            $opportunity->supporting_document = $fileName;
        }

        $opportunity->title = $request->title;
        $opportunity->ref_no = $request->ref_no;
        $opportunity->description = $request->description;
        $opportunity->highlight_1 = $request->highlight_1;
        $opportunity->highlight_2 = $request->highlight_2;
        $opportunity->highlight_3 = $request->highlight_3;
        $opportunity->gender = $request->gender;
        $opportunity->website_address = $request->website_address;
        $opportunity->no_of_position = $request->no_of_position;
        $opportunity->benefits = $request->benefits;
        $opportunity->about_company = $request->about_company;
        
        $opportunity->listing_date = date('Y-m-d', strtotime($request->listing_date));
        $opportunity->expire_date = date('Y-m-d', strtotime($request->expire_date));
        $request->is_active == $request->is_active;
        if (isset($request->management_level)) {
            $opportunity->carrier_level_id = CarrierLevel::where('carrier_level', $request->management_level)->first()->id;
        }
        $opportunity->job_experience_id = $request->job_experience_id;
        $opportunity->degree_level_id = $request->degree_level_id;
        $opportunity->people_management = $request->people_management;
        $opportunity->target_salary = $request->target_salary;
        $opportunity->full_time_salary = $request->fulltime_amount;
        $opportunity->part_time_salary = $request->parttime_amount;
        $opportunity->freelance_salary = $request->freelance_amount;
        $opportunity->salary_from = $request->salary_from;
        $opportunity->salary_to = $request->salary_to;
        $opportunity->carrier_level_id = $request->carrier_level_id;
        $opportunity->company_id = $request->company_id;
        $opportunity->country_id = $request->location_id;

        if (!is_null($request->job_type_id)) $opportunity->job_type_id = json_encode($request->job_type_id);
        else $opportunity->job_type_id = NULL;

        if (!is_null($request->contract_hour_id)) $opportunity->contract_hour_id = json_encode($request->contract_hour_id);
        else $opportunity->contract_hour_id = NULL;

        if (!is_null($request->keyword_id)) $opportunity->keyword_id = json_encode($request->keyword_id);
        else $opportunity->keyword_id = NULL;

        if (!is_null($request->institution_id)) $opportunity->institution_id = json_encode($request->institution_id);
        else $opportunity->institution_id = NULL;

        if (!is_null($request->institution_id)) $opportunity->institution_id = json_encode($request->institution_id);
        else $opportunity->institution_id = NULL;

        if (!is_null($request->geographical_id)) $opportunity->geographical_id = json_encode($request->geographical_id);
        else $opportunity->geographical_id = NULL;

        if (!is_null($request->job_skill_id)) $opportunity->job_skill_id = json_encode($request->job_skill_id);
        else $opportunity->job_skill_id = NULL;

        if (!is_null($request->field_study_id)) $opportunity->field_study_id = json_encode($request->field_study_id);
        else $opportunity->field_study_id = NULL;

        if (!is_null($request->qualification_id)) $opportunity->qualification_id = json_encode($request->qualification_id);
        else $opportunity->qualification_id = NULL;

        if (!is_null($request->key_strength_id)) $opportunity->key_strength_id = json_encode($request->key_strength_id);
        else $opportunity->key_strength_id = NULL;

        if (!is_null($request->job_title_id)) $opportunity->job_title_id = json_encode($request->job_title_id);
        else $opportunity->job_title_id = NULL;

        if (!is_null($request->job_title_id)) $opportunity->job_title_id = json_encode($request->job_title_id);
        else $opportunity->job_title_id = NULL;

        if (!is_null($request->functional_area_id)) $opportunity->functional_area_id = json_encode($request->functional_area_id);
        else $opportunity->functional_area_id = NULL;

        if (!is_null($request->target_employer_id)) $opportunity->target_employer_id = json_encode($request->target_employer_id);
        else $opportunity->target_employer_id = NULL;

        if (!is_null($request->industry_id)) $opportunity->industry_id = json_encode($request->industry_id);
        else $opportunity->industry_id = NULL;

        if (!is_null($request->specialist_id)) $opportunity->specialist_id = json_encode($request->specialist_id);
        else $opportunity->specialist_id = NULL;

        if (!is_null($request->sub_sector_id)) $opportunity->sub_sector_id = json_encode($request->sub_sector_id);
        else $opportunity->sub_sector_id = NULL;

        if (!is_null($request->language_id)) $opportunity->language_id = json_encode($request->language_id);
        else $opportunity->language_id = NULL;

        if (!is_null($request->language_level)) $opportunity->language_level = json_encode($request->language_level);
        else $opportunity->language_level = NULL;

        //return $opportunity;
        $opportunity->save();

        $type = "opportunity";
        if( $request->language_id[0] !=""){
        $this->languageAction($type,$opportunity->id,$request->language_id,$request->language_level); #to save language usage table
        }

        
        $this->addJobTalentScore($opportunity);
        //$this->languageAction($type, $opportunity->id, $request->language_1, $request->level_1, $request->language_2, $request->level_2, $request->language_3, $request->level_3);
        $this->action($type, $opportunity->id, $request->keyword_id, $request->country_id, $request->job_type_id, $request->contract_hour_id, $request->institution_id, $request->geographical_id, $request->job_skill_id, $request->field_study_id, $request->qualification_id, $request->key_strength_id, $request->job_title_id, $request->industry_id, $request->functional_area_id, $request->target_employer_id, $request->specialist_id, $request->sub_sector_id);
        
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
        Notification::where('opportunity_id',$id)->delete();
        JobStreamScore::where('job_id',$id)->delete();
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
    public function deleteLang(Request $request, $id){
        // \Log::info("HI");
        LanguageUsage::find($id)->delete($id);  
        return response()->json([
            'success' => 'Deleted successfully!'
        ]);
    }

    public function destroyAll(Request $request){
        $data = Opportunity::destroy($request->data);
        JobStreamScore::truncate();
        Notification::truncate();

        if ($data) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
        
    }
}