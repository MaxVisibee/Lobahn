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
}