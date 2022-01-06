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
use App\Models\TargetPay;
use Illuminate\Support\Facades\Auth;

trait MultiSelectTrait
{
    public function getCountries($id,$type)
    {
        return
        $type == "opportunity" ?
         CountryUsage::where('opportunity_id',$id)->pluck('country_id')->toarray() :
         CountryUsage::where('user_id',$id)->pluck('country_id')->toarray();
    }

    public function getCountryDetails($id,$type)
    {
        return
        $type == "opportunity" ?
         CountryUsage::where('opportunity_id',$id)->get():
         CountryUsage::where('user_id',$id)->get();
    }

    public function getKeywords($id,$type)
    {
        return 
        $type == "opportunity" ?
         KeywordUsage::where('opportunity_id',$id)->pluck('keyword_id')->toarray():
         KeywordUsage::where('user_id',$id)->pluck('keyword_id')->toarray();
    }

    public function getKeywordDetails($id,$type)
    {
        return 
        $type == "opportunity" ?
         KeywordUsage::where('opportunity_id',$id)->get():
         KeywordUsage::where('user_id',$id)->get();
    }

    public function getJobTypes($id,$type)
    {
        return 
        $type == "opportunity" ?
         JobTypeUsage::where('opportunity_id',$id)->pluck('job_type_id')->toarray():
         JobTypeUsage::where('user_id',$id)->pluck('job_type_id')->toarray();
    }

    public function getJobTypeDetails($id,$type)
    {
        return 
        $type == "opportunity" ?
         JobTypeUsage::where('opportunity_id',$id)->get():
         JobTypeUsage::where('user_id',$id)->get();
    }

    public function getJobShifts($id,$type)
    {
        return 
        $type == "opportunity" ?
         JobShiftUsage::where('opportunity_id',$id)->pluck('contract_hour_id')->toarray():
         JobShiftUsage::where('user_id',$id)->pluck('contract_hour_id')->toarray();
    }

    public function getJobShiftDetails($id,$type)
    {
        return 
        $type == "opportunity" ?
         JobShiftUsage::where('opportunity_id',$id)->get():
         JobShiftUsage::where('user_id',$id)->get();
    }

    public function getInstitutes($id,$type)
    {
        return 
        $type == "opportunity" ?
         InstitutionUsage::where('opportunity_id',$id)->pluck('institution_id')->toarray():
         InstitutionUsage::where('user_id',$id)->pluck('institution_id')->toarray();
    }

    public function getInstituteDetails($id,$type)
    {
        return 
        $type == "opportunity" ?
         InstitutionUsage::where('opportunity_id',$id)->get():
         InstitutionUsage::where('user_id',$id)->get();
    }

    public function getLanguages($id,$type)
    {
        return 
        $type == "opportunity" ?
         LanguageUsage::where('job_id',$id)->get()->toArray():
         LanguageUsage::where('user_id',$id)->get()->toArray();
    }

    public function getLanguageDetails($id,$type)
    {
        return 
        $type == "opportunity" ?
         LanguageUsage::where('job_id',$id)->get():
         LanguageUsage::where('user_id',$id)->get();
    }

    public function languageAction($type,$id,$language_1,$level_1,$language_2,$level_2,$language_3,$level_3)
    {
        $type == "opportunity" ? $column = 'job_id': $column = 'user_id';
        LanguageUsage::where($column,$id)->delete();
        if($type == "opportunity")
        {
            if($language_1!=NULL)
            LanguageUsage::create([
                'job_id' => $id,
                'language_id' => $language_1,
                'level' => $level_1,
            ]);
            if($language_2!=NULL)
            LanguageUsage::create([
                'job_id' => $id,
                'language_id' => $language_2,
                'level' => $level_2,
            ]);
            if($language_3!=NULL)
            LanguageUsage::create([
                'job_id' => $id,
                'language_id' => $language_3,
                'level' => $level_3,
            ]);
        }
        else {
            if($language_1!=NULL)
            LanguageUsage::create([
                'user_id' => $id,
                'language_id' => $language_1,
                'level' => $level_1,
            ]);
            if($language_2!=NULL)
            LanguageUsage::create([
                'user_id' => $id,
                'language_id' => $language_2,
                'level' => $level_2,
            ]);
            if($language_3!=NULL)
            LanguageUsage::create([
                'user_id' => $id,
                'language_id' => $language_3,
                'level' => $level_3,
            ]);
        }
        
    }

    public function getGeographicals($id,$type)
    {
        return 
        $type == "opportunity" ?
         GeographicalUsage::where('opportunity_id',$id)->pluck('geographical_id')->toarray():
         GeographicalUsage::where('user_id',$id)->pluck('geographical_id')->toarray();
    }

    public function getGeographicalDetails($id,$type)
    {
        return 
        $type == "opportunity" ?
         GeographicalUsage::where('opportunity_id',$id)->get():
         GeographicalUsage::where('user_id',$id)->get();
    }

    public function getJobSkills($id,$type)
    {
        return 
        $type == "opportunity" ?
         JobSkillOpportunity::where('opportunity_id',$id)->pluck('job_skill_id')->toarray():
         JobSkillOpportunity::where('user_id',$id)->pluck('job_skill_id')->toarray();
    }

    public function getJobSkillDetails($id,$type)
    {
        return 
        $type == "opportunity" ?
         JobSkillOpportunity::where('opportunity_id',$id)->get():
         JobSkillOpportunity::where('user_id',$id)->get();
    }

    public function getStudyFields($id,$type)
    {
        return 
        $type == "opportunity" ?
         StudyFieldUsage::where('opportunity_id',$id)->pluck('field_study_id')->toarray():
         StudyFieldUsage::where('user_id',$id)->pluck('field_study_id')->toarray();
    }

    public function getStudyFieldDetails($id,$type)
    {
        return 
        $type == "opportunity" ?
         StudyFieldUsage::where('opportunity_id',$id)->get():
         StudyFieldUsage::where('user_id',$id)->get();
    }

    public function getQualifications($id,$type)
    {
        return 
        $type == "opportunity" ?
         QualificationUsage::where('opportunity_id',$id)->pluck('qualification_id')->toarray():
         QualificationUsage::where('user_id',$id)->pluck('qualification_id')->toarray();
    }

    public function getQualificationDetails($id,$type)
    {
        return 
        $type == "opportunity" ?
         QualificationUsage::where('opportunity_id',$id)->get():
         QualificationUsage::where('user_id',$id)->get();
    }


    public function getKeyStrengths($id,$type)
    {
        return 
        $type == "opportunity" ?
         KeyStrengthUsage::where('opportunity_id',$id)->pluck('key_strength_id')->toarray():
         KeyStrengthUsage::where('user_id',$id)->pluck('key_strength_id')->toarray();
    }

    public function getKeyStrengthDetails($id,$type)
    {
        return 
        $type == "opportunity" ?
         KeyStrengthUsage::where('opportunity_id',$id)->get():
         KeyStrengthUsage::where('user_id',$id)->get();
    }

    public function getJobtitles($id,$type)
    {
        return 
        $type == "opportunity" ?
         JobTitleUsage::where('opportunity_id',$id)->pluck('job_title_id')->toarray():
         JobTitleUsage::where('user_id',$id)->pluck('job_title_id')->toarray();
    }

    public function getJobtitleDetails($id,$type)
    {
        return 
        $type == "opportunity" ?
         JobTitleUsage::where('opportunity_id',$id)->get():
         JobTitleUsage::where('user_id',$id)->get();
    }

    public function getIndustries($id,$type)
    {
        return 
        $type == "opportunity" ?
         IndustryUsage::where('opportunity_id',$id)->pluck('industry_id')->toarray():
         IndustryUsage::where('user_id',$id)->pluck('industry_id')->toarray();
    }
    

    public function getIndustryDetails($id,$type)
    {
        return 
        $type == "opportunity" ?
         IndustryUsage::where('opportunity_id',$id)->get():
         IndustryUsage::where('user_id',$id)->get();
    }

    public function getFunctionalAreas($id,$type)
    {
        return 
        $type == "opportunity" ?
         FunctionalAreaUsage::where('opportunity_id',$id)->pluck('functional_area_id')->toarray():
         FunctionalAreaUsage::where('user_id',$id)->pluck('functional_area_id')->toarray();
    }

    public function getFunctionalAreaDetails($id,$type)
    {
        return 
        $type == "opportunity" ?
         FunctionalAreaUsage::where('opportunity_id',$id)->get():
         FunctionalAreaUsage::where('user_id',$id)->get();
    }

    public function targetPayAction($type,$id,$target_amount,$fulltime_amount,$parttime_amount,$freelance_amount)
    {
        $type == "opportunity" ? $column = 'opportunity_id': $column = 'user_id';
        if($type == "opportunity")
        {
            TargetPay::where('opportunity_id',$id)->count() == 1 ?
            TargetPay::where('opportunity_id',$id)->update(['target_amount' => $target_amount]):
            TargetPay::create(['opportunity_id'=>$id,'target_amount' => $target_amount]);
        }
        else {
            TargetPay::where('user_id',$id)->count() == 1 ?
            TargetPay::where('user_id',$id)->update(['target_amount' => $target_amount,'fulltime_amount' => $fulltime_amount,'parttime_amount' => $parttime_amount,'freelance_amount' => $freelance_amount,]):
            TargetPay::create(['user_id'=>$id,'target_amount' => $target_amount,'fulltime_amount' => $fulltime_amount,'parttime_amount' => $parttime_amount,'freelance_amount' => $freelance_amount,]);
        }
    }

    public function action($type,$id,$keywords,$countries,$job_types,$job_shifts,$institutions,$geographicals,$job_skills,$study_fields,$qualifications,$key_strengths,$job_titles,$industries,$fun_areas)
    {
        $type == "opportunity" ? $column = 'opportunity_id': $column = 'user_id';

        KeywordUsage::where($column,$id)->delete();
        if(!is_null($keywords))
        foreach( $keywords as $key => $value)
        {
        $keyword = new KeywordUsage;
        $type == "opportunity" ?
        $keyword->opportunity_id = $id:
        $keyword->user_id = $id;
        $keyword->keyword_id = $value;
        $keyword->type = $type;
        $keyword->save();
        }
        
        CountryUsage::where($column,$id)->delete();
        if(!is_null($countries))
        foreach($countries as $key => $value)
        {
            $country = new CountryUsage;
            $type == "opportunity" ?
            $country->opportunity_id = $id:
            $country->user_id = $id;
            $country->country_id = $value;
            $country->save();
        }

        JobTypeUsage::where($column,$id)->delete();
        if(!is_null($job_types))
        foreach($job_types as $key => $value)
        {
            $job_type = new JobTypeUsage;
            $type == "opportunity" ?
            $job_type->opportunity_id = $id:
            $job_type->user_id = $id;
            $job_type->opportunity_id = $id;
            $job_type->job_type_id = $value;
            $job_type->save();
        }

        JobShiftUsage::where($column,$id)->delete();
        if(!is_null($job_shifts))
        foreach($job_shifts as $key => $value)
        {
            $job_shift = new JobShiftUsage;
            $type == "opportunity" ?
            $job_shift->opportunity_id = $id:
            $job_shift->user_id = $id;
            $job_shift->contract_hour_id = $value;
            $job_shift->save();
        }

        InstitutionUsage::where($column,$id)->delete();
        if(!is_null($institutions))
        foreach($institutions as $key => $value)
        {
            $institute = new InstitutionUsage;
            $type == "opportunity" ?
            $institute->opportunity_id = $id:
            $institute->user_id = $id;
            $institute->institution_id = $value;
            $institute->save();
        }

        GeographicalUsage::where($column,$id)->delete();
        if(!is_null($geographicals))
        foreach($geographicals as $key => $value)
        {
            $geographical = new GeographicalUsage;
            $type == "opportunity" ?
            $geographical->opportunity_id = $id:
            $geographical->user_id = $id;
            $geographical->geographical_id = $value;
            $geographical->save();  
        }

        JobSkillOpportunity::where($column,$id)->delete();
        if(!is_null($job_skills))
        foreach($job_skills as $key => $value)
        {
            $job_skill = new JobSkillOpportunity;
            $type == "opportunity" ?
            $job_skill->opportunity_id = $id:
            $job_skill->user_id = $id;
            $job_skill->job_skill_id = $value;
            $job_skill->save();
        }

        StudyFieldUsage::where($column,$id)->delete();
        if(!is_null($study_fields))
        foreach($study_fields as $key => $value)
        {
            $study_field = new StudyFieldUsage;
            $type == "opportunity" ?
            $study_field->opportunity_id = $id:
            $study_field->user_id = $id;
            $study_field->field_study_id = $value;
            $study_field->save();
        }

        QualificationUsage::where($column,$id)->delete();
        if(!is_null($qualifications))
        foreach($qualifications as $key => $value)
        {
            $qualification = new QualificationUsage;
            $type == "opportunity" ?
            $qualification->opportunity_id = $id:
            $qualification->user_id = $id;
            $qualification->qualification_id = $value;
            $qualification->save();
        }

        KeyStrengthUsage::where($column,$id)->delete();
        if(!is_null($key_strengths))
        foreach($key_strengths as $key => $value)
        {
            $key_strength = new KeyStrengthUsage;
            $type == "opportunity" ?
            $key_strength->opportunity_id = $id:
            $key_strength->user_id = $id;
            $key_strength->key_strength_id = $value;
            $key_strength->save();
        }

        JobTitleUsage::where($column,$id)->delete();
        if(!is_null($job_titles))
        foreach($job_titles as $key => $value)
        {
            $job_title = new JobTitleUsage;
            $type == "opportunity" ?
            $job_title->opportunity_id = $id:
            $job_title->user_id = $id;
            $job_title->job_title_id = $value;
            $job_title->save();
        }

        IndustryUsage::where($column,$id)->delete();
        if(!is_null($industries))
        foreach($industries as $key => $value)
        {
            $industry = new IndustryUsage;
            $type == "opportunity" ?
            $industry->opportunity_id = $id:
            $industry->user_id = $id;
            $industry->industry_id = $value;
            $industry->save();
        }

        FunctionalAreaUsage::where($column,$id)->delete();
        if(!is_null($fun_areas))
        foreach($fun_areas as $key => $value)
        {
            $functional_area = new FunctionalAreaUsage;
            $type == "opportunity" ?
            $functional_area->opportunity_id = $id:
            $functional_area->user_id = $id;
            $functional_area->functional_area_id = $value;
            $functional_area->save();
        }

    }
}