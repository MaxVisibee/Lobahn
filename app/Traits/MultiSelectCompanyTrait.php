<?php

namespace App\Traits;

use DB;
use Carbon\Carbon;
use App\Models\KeywordUsage;
use App\Models\CountryUsage;
use App\Models\JobTypeUsage;
use App\Models\JobShiftUsage;
use App\Models\InstitutionUsage;
use App\Models\GeographicalUsage;
use App\Models\JobSkillOpportunity;
use App\Models\StudyFieldUsage;
use App\Models\QualificationUsage;
use App\Models\KeyStrengthUsage;
use App\Models\JobTitleUsage;
use App\Models\IndustryUsage;
use App\Models\FunctionalAreaUsage;
use App\Models\LanguageUsage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Opportunity;
use Illuminate\Support\Facades\Validator;
use Image;
use App\Models\Partner;
use App\Models\NewsEvent;
use App\Models\Country;
use App\Models\Payment;
use App\Models\JobApply;
use App\Models\TargetPay;
use App\Models\CarrierLevel;
use App\Models\JobShift;
use App\Models\Keyword;
use App\Models\SkillUsage;
use App\Models\DegreeLevel;
use App\Models\Geographical;
use App\Models\FunctionalArea;
use App\Models\Industry;
use App\Models\StudyField;
use App\Models\JobType;
use App\Models\JobTitle;
use App\Models\JobSkill;
use App\Models\JobExperience;
use App\Models\KeyStrength;
use App\Models\Qualification;
use App\Models\Institution;
use App\Models\JobStreamScore;
use App\Models\ProfileCv;
use App\Models\EmploymentHistory;
use App\Helpers\MiscHelper;
use App\Models\Language;
use App\Models\Package;
use App\Models\PaymentMethod;
use App\Models\Speciality;
use App\Models\SubSector;
use Illuminate\Support\Facades\Auth;

trait MultiSelectCompanyTrait
{
    public function getCountries()
    {
        return CountryUsage::where('opportunity_id',Auth::guard('company')->user()->id)->pluck('country_id')->toarray();
    }

    public function getKeywords()
    {
        return KeywordUsage::where('opportunity_id',Auth::guard('company')->user()->id)->pluck('keyword_id')->toarray();
    }

    public function getKeywordDetails()
    {
        return KeywordUsage::where('opportunity_id',Auth::guard('company')->user()->id)->get();
    }

    public function getJobTypes()
    {
        return JobTypeUsage::where('opportunity_id',Auth::guard('company')->user()->id)->pluck('job_type_id')->toarray();
    }

    public function getJobShifts()
    {
        return JobShiftUsage::where('opportunity_id',Auth::guard('company')->user()->id)->pluck('contract_hour_id')->toarray();
    }

    public function getInstitutes()
    {
        return InstitutionUsage::where('opportunity_id',Auth::guard('company')->user()->id)->pluck('institution_id')->toarray();
    }

    public function getLanguages()
    {
        return LanguageUsage::where('job_id',Auth::guard('company')->user()->id)->get()->toArray();
    }

    public function getGeographicals(){
        return GeographicalUsage::where('opportunity_id',Auth::guard('company')->user()->id)->pluck('geographical_id')->toarray();
    }

    public function getJobSkills()
    {
        return JobSkillOpportunity::where('opportunity_id',Auth::guard('company')->user()->id)->pluck('job_skill_id')->toarray();
    }

    public function getStudyFields()
    {
        return StudyFieldUsage::where('opportunity_id',Auth::guard('company')->user()->id)->pluck('field_study_id')->toarray();
    }

    public function getQualifications()
    {
        return QualificationUsage::where('opportunity_id',Auth::guard('company')->user()->id)->pluck('qualification_id')->toarray();
    }

    public function getKeyStrengths()
    {
        return KeyStrengthUsage::where('opportunity_id',Auth::guard('company')->user()->id)->pluck('key_strength_id')->toarray();
    }

    public function getJobtitles()
    {
        return JobTitleUsage::where('opportunity_id',Auth::guard('company')->user()->id)->pluck('job_title_id')->toarray();
    }

    public function getIndustries()
    {
        return IndustryUsage::where('opportunity_id',Auth::guard('company')->user()->id)->pluck('industry_id')->toarray();
    }

    public function getFunctionalAreas()
    {
        return FunctionalAreaUsage::where('opportunity_id',Auth::guard('company')->user()->id)->pluck('functional_area_id')->toarray();
    }

    public function action($keywords,$countries,$job_types,$job_shifts,$institutions,$geographicals,$job_skills,$study_fields,$qualifications,$key_strengths,$job_titles,$industries,$fun_areas)
    {
        KeywordUsage::where('opportunity_id',Auth::guard('company')->user()->id)->delete();
        foreach($keywords as $key => $value)
        {
            $keyword = new KeywordUsage;
            $keyword->opportunity_id = Auth::guard('company')->user()->id;
            $keyword->keyword_id = $value;
            $keyword->type = "opportunity";
            $keyword->save();
        }

        CountryUsage::where('opportunity_id',Auth::guard('company')->user()->id)->delete();
        foreach($countries as $key => $value)
        {
            $country = new CountryUsage;
            $country->opportunity_id = Auth::guard('company')->user()->id;
            $country->country_id = $value;
            $country->save();
        }

        JobTypeUsage::where('opportunity_id',Auth::guard('company')->user()->id)->delete();
        foreach($job_types as $key => $value)
        {
            $job_type = new JobTypeUsage;
            $job_type->opportunity_id = Auth::guard('company')->user()->id;
            $job_type->job_type_id = $value;
            $job_type->save();
        }

        JobShiftUsage::where('opportunity_id',Auth::guard('company')->user()->id)->delete();
        foreach($job_shifts as $key => $value)
        {
            $job_shift = new JobShiftUsage;
            $job_shift->opportunity_id = Auth::guard('company')->user()->id;
            $job_shift->contract_hour_id = $value;
            $job_shift->save();
        }

        InstitutionUsage::where('opportunity_id',Auth::guard('company')->user()->id)->delete();
        foreach($institutions as $key => $value)
        {
            $institute = new InstitutionUsage;
            $institute->opportunity_id = Auth::guard('company')->user()->id;
            $institute->institution_id = $value;
            $institute->save();
        }

        GeographicalUsage::where('opportunity_id',Auth::guard('company')->user()->id)->delete();
        foreach($geographicals as $key => $value)
        {
            $geographical = new GeographicalUsage;
            $geographical->opportunity_id = Auth::guard('company')->user()->id;
            $geographical->geographical_id = $value;
            $geographical->save();
        }

        JobSkillOpportunity::where('opportunity_id',Auth::guard('company')->user()->id)->delete();
        foreach($job_skills as $key => $value)
        {
            $job_skill = new JobSkillOpportunity;
            $job_skill->opportunity_id = Auth::guard('company')->user()->id;
            $job_skill->job_skill_id = $value;
            $job_skill->save();
        }

        StudyFieldUsage::where('opportunity_id',Auth::guard('company')->user()->id)->delete();
        foreach($study_fields as $key => $value)
        {
            $study_field = new StudyFieldUsage;
            $study_field->opportunity_id = Auth::guard('company')->user()->id;
            $study_field->field_study_id = $value;
            $study_field->save();
        }

        QualificationUsage::where('opportunity_id',Auth::guard('company')->user()->id)->delete();
        foreach($qualifications as $key => $value)
        {
            $qualification = new QualificationUsage;
            $qualification->opportunity_id = Auth::guard('company')->user()->id;
            $qualification->qualification_id = $value;
            $qualification->save();
        }

        KeyStrengthUsage::where('opportunity_id',Auth::guard('company')->user()->id)->delete();
        foreach($key_strengths as $key => $value)
        {
            $key_strength = new KeyStrengthUsage;
            $key_strength->opportunity_id = Auth::guard('company')->user()->id;
            $key_strength->key_strength_id = $value;
            $key_strength->save();
        }

        JobTitleUsage::where('opportunity_id',Auth::guard('company')->user()->id)->delete();
        foreach($job_titles as $key => $value)
        {
            $job_title = new JobTitleUsage;
            $job_title->opportunity_id = Auth::guard('company')->user()->id;
            $job_title->job_title_id = $value;
            $job_title->save();
        }

        IndustryUsage::where('opportunity_id',Auth::guard('company')->user()->id)->delete();
        foreach($industries as $key => $value)
        {
            $industry = new IndustryUsage;
            $industry->opportunity_id = Auth::guard('company')->user()->id;
            $industry->industry_id = $value;
            $industry->save();
        }

        FunctionalAreaUsage::where('opportunity_id',Auth::guard('company')->user()->id)->delete();
        foreach($fun_areas as $key => $value)
        {
            $functional_area = new FunctionalAreaUsage;
            $functional_area->opportunity_id = Auth::guard('company')->user()->id;
            $functional_area->functional_area_id = $value;
            $functional_area->save();
        }

    }

    public function create($request){
        $opportunity = new Opportunity();

        // dd($request->all());

        if (isset($request->supporting_document)) {
            $doc = $request->file('supporting_document');
            $fileName = 'job_support_doc_' . time() . '.' . $doc->guessExtension();
            $doc->move(public_path('uploads/job_support_docs'), $fileName);
            $opportunity->supporting_document = $fileName;
        }

        $opportunity->title = $request->input('title');
        $opportunity->company_id = $request->input('company_id');
        $opportunity->job_experience_id = $request->input('job_experience_id');
        $opportunity->degree_level_id = $request->input('degree_level_id');
        $opportunity->carrier_level_id = $request->input('carrier_level_id');
        $opportunity->salary_from = $request->input('salary_from');
        $opportunity->salary_to = $request->input('salary_to');
        $opportunity->salary_currency = $request->input('salary_currency');
        $opportunity->gender = $request->input('gender');
        $opportunity->no_of_position = $request->input('no_of_position');
        $opportunity->requirement = $request->input('requirement');
        $opportunity->about_company = $request->input('about_company');
        $opportunity->description = $request->input('description');
        $opportunity->highlight_1 = $request->input('highlight_1');
        $opportunity->highlight_2 = $request->input('highlight_2');
        $opportunity->highlight_3 = $request->input('highlight_3');
        $opportunity->benefits = $request->input('benefits');
        $opportunity->expire_date = $request->input('expire_date');
        $opportunity->slug = $request->input('slug');
        $opportunity->hide_salary = $request->input('hide_salary');
        $opportunity->is_freelance = $request->input('is_freelance');
        $opportunity->is_active = $request->input('is_active');
        $opportunity->is_default = $request->input('is_default');
        $opportunity->is_featured = $request->input('is_featured');
        $opportunity->is_subscribed = $request->input('is_subscribed');
        $opportunity->language_id = $request->input('language_id');
        $opportunity->management_id = $request->input('management_id');
        $opportunity->specialist_id = $request->input('specialist_id');
        $opportunity->website_address = $request->input('website_address');
        $opportunity->package_id = $request->input('package_id');
        $opportunity->payment_id = $request->input('payment_id');
        $opportunity->package_start_date = $request->input('package_start_date');
        $opportunity->package_end_date = $request->input('package_end_date');
        $opportunity->listing_date = $request->input('listing_date');
        $opportunity->target_employer_id = $request->input('target_employer_id');

        if (isset($opportunity->company_id)) {
            $company_id = $opportunity->company_id;
            $company = Company::where('id', $company_id)->first();
        }

        $opportunity->sub_sector_id = $company->sub_sector_id;
        $opportunity->save();

        $opportunity->ref_no = 'SW' . $this->generate_numbers((int) $opportunity->id, 1, 5);
        $opportunity->update();

        if (isset($request->keyword_id)) {
            foreach ($request->keyword_id as $key => $value) {
                $keyword = new KeywordUsage;
                $keyword->type = "opportunity";
                $keyword->opportunity_id = $opportunity->id;
                $keyword->keyword_id = $value;
                $keyword->save();
            }
        }

        if (isset($request->job_skill_id)) {
            foreach ($request->job_skill_id as $key => $value) {
                $skill = new JobSkillOpportunity();
                $skill->type = "opportunity";
                $skill->opportunity_id = $opportunity->id;
                $skill->job_skill_id = $value;
                $skill->save();
            }
        }

        if (isset($request->country_id)) {
            foreach ($request->country_id as $key => $value) {
                $country = new CountryUsage();
                $country->opportunity_id = $opportunity->id;
                $country->country_id = $value;
                $country->save();
            }
        }

        if (isset($request->job_type_id)) {
            foreach ($request->job_type_id as $key => $value) {
                $jobType = new JobTypeUsage();
                $jobType->opportunity_id = $opportunity->id;
                $jobType->job_type_id = $value;
                $jobType->save();
            }
        }

        if (isset($request->job_type_id)) {

            $targetPay = new TargetPay();
            $targetPay->opportunity_id = $opportunity->id;
            $targetPay->target_amount = $request->input('target_amount');
            $targetPay->fulltime_amount = $request->input('fulltime_amount');
            $targetPay->parttime_amount = $request->input('parttime_amount');
            $targetPay->freelance_amount = $request->input('freelance_amount');
            $targetPay->save();
        }

        if (isset($request->contract_hour_id)) {
            foreach ($request->contract_hour_id as $key => $value) {
                $jobShiftUsage = new JobShiftUsage();
                $jobShiftUsage->opportunity_id = $opportunity->id;
                $jobShiftUsage->contract_hour_id = $value;
                $jobShiftUsage->save();
            }
        }

        if (isset($request->institution_id)) {
            foreach ($request->institution_id as $key => $value) {
                $institutionUsage = new InstitutionUsage();
                $institutionUsage->opportunity_id = $opportunity->id;
                $institutionUsage->institution_id = $value;
                $institutionUsage->save();
            }
        }

        if (isset($request->geographical_id)) {
            foreach ($request->geographical_id as $key => $value) {
                $geographicalUsage = new GeographicalUsage();
                $geographicalUsage->opportunity_id = $opportunity->id;
                $geographicalUsage->geographical_id = $value;
                $geographicalUsage->save();
            }
        }

        if (isset($request->field_study_id)) {
            foreach ($request->field_study_id as $key => $value) {
                $studyFieldUsage = new StudyFieldUsage();
                $studyFieldUsage->opportunity_id = $opportunity->id;
                $studyFieldUsage->field_study_id = $value;
                $studyFieldUsage->save();
            }
        }

        if (isset($request->qualification_id)) {
            foreach ($request->qualification_id as $key => $value) {
                $qualificationUsage = new QualificationUsage();
                $qualificationUsage->opportunity_id = $opportunity->id;
                $qualificationUsage->qualification_id = $value;
                $qualificationUsage->save();
            }
        }

        if (isset($request->key_strnegth_id)) {
            foreach ($request->key_strnegth_id as $key => $value) {
                $keyStrengthUsage = new KeyStrengthUsage();
                $keyStrengthUsage->opportunity_id = $opportunity->id;
                $keyStrengthUsage->key_strnegth_id = $value;
                $keyStrengthUsage->save();
            }
        }

        if (isset($request->job_title_id)) {
            foreach ($request->job_title_id as $key => $value) {
                $jobTitleUsage = new JobTitleUsage();
                $jobTitleUsage->opportunity_id = $opportunity->id;
                $jobTitleUsage->job_title_id = $value;
                $jobTitleUsage->save();
            }
        }

        if (isset($request->industry_id)) {
            foreach ($request->industry_id as $key => $value) {
                $industryUsage = new IndustryUsage();
                $industryUsage->opportunity_id = $opportunity->id;
                $industryUsage->industry_id = $value;
                $industryUsage->save();
            }
        }

        if (isset($request->functional_area_id)) {
            foreach ($request->functional_area_id as $key => $value) {
                $functionalAreaUsage = new FunctionalAreaUsage();
                $functionalAreaUsage->opportunity_id = $opportunity->id;
                $functionalAreaUsage->functional_area_id = $value;
                $functionalAreaUsage->save();
            }
        }

        if (isset($request->language_id1)) {

            $languageUsage = new LanguageUsage();
            $languageUsage->level = $request->level1;
            $languageUsage->job_id = $opportunity->id;
            $languageUsage->language_id = $request->language_id1;
            $languageUsage->save();
        }

        if (isset($request->language_id2)) {

            $languageUsage = new LanguageUsage();
            $languageUsage->level = $request->level2;
            $languageUsage->job_id = $opportunity->id;
            $languageUsage->language_id = $request->language_id2;
            $languageUsage->save();
        }

        if (isset($request->language_id3)) {

            $languageUsage = new LanguageUsage();
            $languageUsage->level = $request->level3;
            $languageUsage->job_id = $opportunity->id;
            $languageUsage->language_id = $request->language_id3;
            $languageUsage->save();
        }
    }


}