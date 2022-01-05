<?php

namespace App\Traits;

use DB;
use App\Models\User;
use App\Models\CountryUsage;
use App\Models\JobTypeUsage;
use App\Models\JobShiftUsage;
use App\Models\KeywordUsage;
use App\Models\InstitutionUsage;
use App\Models\LanguageUsage;
use App\Models\GeographicalUsage;
use App\Models\JobSkillOpportunity;
use App\Models\StudyFieldUsage;
use App\Models\QualificationUsage;
use App\Models\KeyStrengthUsage;
use App\Models\JobTitleUsage;
use App\Models\IndustryUsage;
use App\Models\SubSectorUsage;
use App\Models\FunctionalAreaUsage;

trait SeekerTrait
{

    public function storeSeekerDependency($request, $user_id)
    {
        if(isset($request->country_id)) {
            foreach($request->country_id as $val) {
                $country = new CountryUsage();
                $country->user_id = $user_id;
                $country->opportunity_id = '';
                $country->country_id = $val;
                $country->save();
            }
        }
        if(isset($request->contract_term_id)) {
            foreach($request->contract_term_id as $val) {
                $job_type = new JobTypeUsage();
                $job_type->user_id = $user_id;
                $job_type->opportunity_id = '';
                $job_type->job_type_id = $val;
                $job_type->save();
            }
        }
        if(isset($request->contract_hour_id)) {
            foreach($request->contract_hour_id as $val) {
                $job_shift = new JobShiftUsage();
                $job_shift->user_id = $user_id;
                $job_shift->opportunity_id = '';
                $job_shift->contract_hour_id = $val;
                $job_shift->save();
            }
        }
        if (isset($request->keyword_id)){
            foreach($request->keyword_id as $val){
                $keyword = new KeywordUsage();
                $keyword->user_id = $user_id;
                $keyword->opportunity_id = '';
                $keyword->keyword_id = $val;
                $keyword->save();
            }
        }
        if (isset($request->institution_id)){
            foreach($request->institution_id as $val){
                $institu = new InstitutionUsage();
                $institu->user_id = $user_id;
                $institu->opportunity_id = '';
                $institu->institution_id = $val;
                $institu->save();
            }
        }
        if (isset($request->language_id)){
            foreach($request->language_id as $key=>$val){
                $language = new LanguageUsage();
                $language->user_id = $user_id;
                $language->opportunity_id = '';
                $language->language_id = $val;
                $language->level = $request->level[$key];
                $language->save();
            }
        }
        if (isset($request->geographical_id)){
            foreach($request->geographical_id as $val){
                $geo = new GeographicalUsage();
                $geo->user_id = $user_id;
                $geo->opportunity_id = '';
                $geo->geographical_id = $val;
                $geo->save();
            }
        }
        if (isset($request->skill_id)){
            foreach($request->skill_id as $val){
                $skill = new JobSkillOpportunity();
                $skill->user_id = $user_id;
                $skill->opportunity_id = '';
                $skill->job_skill_id = $val;
                $skill->save();
            }
        }
        if (isset($request->field_study_id)){
            foreach($request->field_study_id as $val){
                $study = new StudyFieldUsage();
                $study->user_id = $user_id;
                $study->opportunity_id = '';
                $study->field_study_id = $val;
                $study->save();
            }
        }
        if (isset($request->qualification_id)){
            foreach($request->qualification_id as $val){
                $study = new QualificationUsage();
                $study->user_id = $user_id;
                $study->opportunity_id = '';
                $study->qualification_id = $val;
                $study->save();
            }
        }
        if (isset($request->key_strength_id)){
            foreach($request->key_strength_id as $val){
                $study = new KeyStrengthUsage();
                $study->user_id = $user_id;
                $study->opportunity_id = '';
                $study->key_strnegth_id = $val;
                $study->save();
            }
        }
        if (isset($request->position_title_id)){
            foreach($request->position_title_id as $val){
                $study = new JobTitleUsage();
                $study->user_id = $user_id;
                $study->opportunity_id = '';
                $study->job_title_id = $val;
                $study->save();
            }
        }
        if (isset($request->industry_id)){
            foreach($request->industry_id as $val){
                $study = new IndustryUsage();
                $study->user_id = $user_id;
                $study->opportunity_id = '';
                $study->industry_id = $val;
                $study->save();
            }
        }
        if (isset($request->sub_sector_id)){
            foreach($request->sub_sector_id as $val){
                $study = new SubSectorUsage();
                $study->user_id = $user_id;
                $study->opportunity_id = '';
                $study->sub_sector_id = $val;
                $study->save();
            }
        }
        if (isset($request->functional_area_id)){
            foreach($request->functional_area_id as $val){
                $study = new FunctionalAreaUsage();
                $study->user_id = $user_id;
                $study->opportunity_id = '';
                $study->functional_area_id = $val;
                $study->save();
            }
        }
        
    }

}
