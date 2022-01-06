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
use App\Models\SpecialityUsage;
use App\Models\TargetEmployerUsage;

use Illuminate\Support\Facades\Log;

trait SeekerTrait
{

    public function storeSeekerDependency($request, $user_id)
    {
        if(isset($request['country_id'])) {
            foreach($request['country_id'] as $val) {
                $country = new CountryUsage();
                $country->user_id = $user_id;
                $country->opportunity_id = '';
                $country->country_id = $val;
                $country->save();
            }
        }
        if(isset($request['contract_term_id'])) {
            foreach($request['contract_term_id'] as $val) {
                $job_type = new JobTypeUsage();
                $job_type->user_id = $user_id;
                $job_type->opportunity_id = '';
                $job_type->job_type_id = $val;
                $job_type->save();
            }
        }
        if(isset($request['contract_hour_id'])) {
            foreach($request['contract_hour_id'] as $val) {
                $job_shift = new JobShiftUsage();
                $job_shift->user_id = $user_id;
                $job_shift->opportunity_id = '';
                $job_shift->contract_hour_id = $val;
                $job_shift->save();
            }
        }
        if (isset($request['keyword_id'])){
            foreach($request['keyword_id'] as $val){
                $keyword = new KeywordUsage();
                $keyword->user_id = $user_id;
                $keyword->opportunity_id = '';
                $keyword->keyword_id = $val;
                $keyword->save();
            }
        }
        if (isset($request['institution_id'])){
            foreach($request['institution_id'] as $val){
                $institu = new InstitutionUsage();
                $institu->user_id = $user_id;
                $institu->opportunity_id = '';
                $institu->institution_id = $val;
                $institu->save();
            }
        }
        if (isset($request['language_id'])){
            foreach($request['language_id'] as $key=>$val){
                $language = new LanguageUsage();
                $language->user_id = $user_id;
                $language->job_id = '';
                $language->language_id = $val;
                $language->level = $request['language_level'][$key];
                $language->save();
            }
        }
        if (isset($request['geographical_id'])){
            foreach($request['geographical_id'] as $val){
                $geo = new GeographicalUsage();
                $geo->user_id = $user_id;
                $geo->opportunity_id = '';
                $geo->geographical_id = $val;
                $geo->save();
            }
        }
        if (isset($request['skill_id'])){
            foreach($request['skill_id'] as $val){
                $skill = new JobSkillOpportunity();
                $skill->user_id = $user_id;
                $skill->opportunity_id = '';
                $skill->job_skill_id = $val;
                $skill->save();
            }
        }
        if (isset($request['field_study_id'])){
            foreach($request['field_study_id'] as $val){
                $study = new StudyFieldUsage();
                $study->user_id = $user_id;
                $study->opportunity_id = '';
                $study->field_study_id = $val;
                $study->save();
            }
        }
        if (isset($request['qualification_id'])){
            foreach($request['qualification_id'] as $val){
                $quali = new QualificationUsage();
                $quali->user_id = $user_id;
                $quali->opportunity_id = '';
                $quali->qualification_id = $val;
                $quali->save();
            }
        }
        if (isset($request['key_strength_id'])){
            foreach($request['key_strength_id'] as $val){
                $key_strength = new KeyStrengthUsage();
                $key_strength->user_id = $user_id;
                $key_strength->opportunity_id = '';
                $key_strength->key_strength_id = $val;
                $key_strength->save();
            }
        }
        if (isset($request['position_title_id'])){
            foreach($request['position_title_id'] as $val){
                $job_title = new JobTitleUsage();
                $job_title->user_id = $user_id;
                $job_title->opportunity_id = '';
                $job_title->job_title_id = $val;
                $job_title->save();
            }
        }
        if (isset($request['industry_id'])){
            foreach($request['industry_id'] as $val){
                $industry = new IndustryUsage();
                $industry->user_id = $user_id;
                $industry->opportunity_id = '';
                $industry->industry_id = $val;
                $industry->save();
            }
        }
        if (isset($request['sub_sector_id'])){
            foreach($request['sub_sector_id'] as $val){
                $subsector = new SubSectorUsage();
                $subsector->user_id = $user_id;
                $subsector->opportunity_id = '';
                $subsector->sub_sector_id = $val;
                $subsector->save();
            }
        }
        if (isset($request['functional_area_id'])){
            foreach($request['functional_area_id'] as $val){
                $functional = new FunctionalAreaUsage();
                $functional->user_id = $user_id;
                $functional->opportunity_id = '';
                $functional->functional_area_id = $val;
                $functional->save();
            }
        }
        if (isset($request['specialist_id'])){
            foreach($request['specialist_id'] as $val){
                $speciality = new SpecialityUsage();
                $speciality->user_id = $user_id;
                $speciality->opportunity_id = '';
                $speciality->specialist_id = $val;
                $speciality->save();
            }
        }
        if (isset($request['target_employer_id'])){
            foreach($request['target_employer_id'] as $val){
                $target_employer = new TargetEmployerUsage();
                $target_employer->user_id = $user_id;
                $target_employer->opportunity_id = '';
                $target_employer->target_employer_id = $val;
                $target_employer->save();
            }
        }
        
    }
    

    public function updateSeekerDependency($request, $user_id)
    {
        // $user = User::find($user_id);

        if(isset($request['country_id'])) {
            $arr_country = [];
            foreach($request['country_id'] as $val) {
                $country_usage = CountryUsage::where('country_id', $val)->where('user_id', $user_id)->first();
                if(empty($country_usage)) {
                    $country = new CountryUsage();
                    $country->user_id = $user_id;
                    $country->opportunity_id = '';
                    $country->country_id = $val;
                    $country->save();

                    $arr_country[]  =$country->id;
                }else {
                    $arr_country[]  =$country_usage->id;
                }
            }

            if (count($arr_country) > 0) {
				CountryUsage::whereNotIn('id', $arr_country)->where('user_id', '=', $user_id)->delete();
			}
        }
        if(isset($request['contract_term_id'])) {
            $arr_jobtype = [];
            foreach($request['contract_term_id'] as $val) {
                $jobtype_usage = JobTypeUsage::where('job_type_id', $val)->where('user_id', $user_id)->first();
                if(empty($jobtype_usage)) {
                    $job_type = new JobTypeUsage();
                    $job_type->user_id = $user_id;
                    $job_type->opportunity_id = '';
                    $job_type->job_type_id = $val;
                    $job_type->save();

                    $arr_jobtype[] =  $job_type->id;
                }else {
                    $arr_jobtype[] =  $jobtype_usage->id;
                }
            }
            if (count($arr_jobtype) > 0) {
				JobTypeUsage::whereNotIn('id', $arr_jobtype)->where('user_id', '=', $user_id)->delete();
			}
        }
        if(isset($request['contract_hour_id'])) {
            $arr_jobshift = [];
            foreach($request['contract_hour_id'] as $val) {
                $jobshift_usage = JobShiftUsage::where('contract_hour_id', $val)->where('user_id', $user_id)->first();
                if(empty($jobshift_usage)) {
                    $job_shift = new JobShiftUsage();
                    $job_shift->user_id = $user_id;
                    $job_shift->opportunity_id = '';
                    $job_shift->contract_hour_id = $val;
                    $job_shift->save();

                    $arr_jobshift[] = $job_shift->id;
                }else {
                    $arr_jobshift[] = $jobshift_usage->id;
                }
            }
            if (count($arr_jobshift) > 0) {
				JobShiftUsage::whereNotIn('id', $arr_jobshift)->where('user_id', '=', $user_id)->delete();
			}
        }
        if (isset($request['keyword_id'])){
            $arr_keyword = [];
            foreach($request['keyword_id'] as $val){
                $keyword_usage = KeywordUsage::where('keyword_id', $val)->where('user_id', $user_id)->first();
                if(empty($keyword_usage)) {
                    $keyword = new KeywordUsage();
                    $keyword->user_id = $user_id;
                    $keyword->opportunity_id = '';
                    $keyword->keyword_id = $val;
                    $keyword->save();

                    $arr_keyword[] = $keyword->id;
                }else {
                    $arr_keyword[] = $keyword_usage->id;
                }
            }
            if (count($arr_keyword) > 0) {
				KeywordUsage::whereNotIn('id', $arr_keyword)->where('user_id', '=', $user_id)->delete();
			}
        }
        if (isset($request['institution_id'])){
            $arr_institution = [];
            foreach($request['institution_id'] as $val){
                $insittution_usage = InstitutionUsage::where('institution_id', $val)->where('user_id', $user_id)->first();
                if(empty($insittution_usage)) {
                    $institu = new InstitutionUsage();
                    $institu->user_id = $user_id;
                    $institu->opportunity_id = '';
                    $institu->institution_id = $val;
                    $institu->save();

                    $arr_institution[] = $institu->id;
                }else {
                    $arr_institution[] = $insittution_usage->id;
                }
            }
            if (count($arr_institution) > 0) {
				InstitutionUsage::whereNotIn('id', $arr_institution)->where('user_id', '=', $user_id)->delete();
			}
        }
        if (isset($request['language_id'])){
            $arr_language = [];
            foreach($request['language_id'] as $key=>$val){
                $language_usage = LanguageUsage::where('language_id', $val)->where('level', $request['language_level'][$key])->where('user_id', $user_id)->first();
                if(empty($language_usage)) {
                    $language = new LanguageUsage();
                    $language->user_id = $user_id;
                    $language->job_id = '';
                    $language->language_id = $val;
                    $language->level = $request['language_level'][$key];
                    $language->save();
                    $arr_language[] = $language->id;
                }else {
                    $arr_language[] = $language_usage->id;
                }
            }
            if (count($arr_language) > 0) {
				LanguageUsage::whereNotIn('id', $arr_language)->where('user_id', '=', $user_id)->delete();
			}
        }
        if (isset($request['geographical_id'])){
            $arr_geo = [];
            foreach($request['geographical_id'] as $val){
                $geo_usage = GeographicalUsage::where('geographical_id', $val)->where('user_id', $user_id)->first();
                if(empty($geo_usage)) {
                    $geo = new GeographicalUsage();
                    $geo->user_id = $user_id;
                    $geo->opportunity_id = '';
                    $geo->geographical_id = $val;
                    $geo->save();

                    $arr_geo[] = $geo->id;
                }else {
                    $arr_geo[] = $geo_usage->id;
                }
            }
            if (count($arr_geo) > 0) {
				GeographicalUsage::whereNotIn('id', $arr_geo)->where('user_id', '=', $user_id)->delete();
			}
        }
        if (isset($request['skill_id'])){
            $arr_jobskill = [];
            foreach($request['skill_id'] as $val){
                $jobskill_usage = JobSkillOpportunity::where('job_skill_id', $val)->where('user_id', $user_id)->first();
                if(empty($jobskill_usage)) {
                    $skill = new JobSkillOpportunity();
                    $skill->user_id = $user_id;
                    $skill->opportunity_id = '';
                    $skill->job_skill_id = $val;
                    $skill->save();

                    $arr_jobskill[] = $skill->id;
                }else {
                    $arr_jobskill[] = $jobskill_usage->id;
                }
            }
            if (count($arr_jobskill) > 0) {
				JobSkillOpportunity::whereNotIn('id', $arr_jobskill)->where('user_id', '=', $user_id)->delete();
			}
        }
        if (isset($request['field_study_id'])){
            $arr_study = [];
            foreach($request['field_study_id'] as $val){
                $study_usage = StudyFieldUsage::where('field_study_id', $val)->where('user_id', $user_id)->first();
                if(empty($study_usage)) {
                    $study = new StudyFieldUsage();
                    $study->user_id = $user_id;
                    $study->opportunity_id = '';
                    $study->field_study_id = $val;
                    $study->save();

                    $arr_study[] = $study->id;
                }else {
                    $arr_study[] = $study_usage->id;
                }
            }
            if (count($arr_study) > 0) {
				StudyFieldUsage::whereNotIn('id', $arr_study)->where('user_id', '=', $user_id)->delete();
			}
        }
        if (isset($request['qualification_id'])){
            $arr_quali = [];
            foreach($request['qualification_id'] as $val){
                $quali_usage = QualificationUsage::where('qualification_id', $val)->where('user_id', $user_id)->first();
                if(empty($quali_usage)) {
                    $quali = new QualificationUsage();
                    $quali->user_id = $user_id;
                    $quali->opportunity_id = '';
                    $quali->qualification_id = $val;
                    $quali->save();

                    $arr_quali[] = $quali->id;
                }else {
                    $arr_quali[] = $quali_usage->id;
                }
            }
            if (count($arr_quali) > 0) {
				QualificationUsage::whereNotIn('id', $arr_quali)->where('user_id', '=', $user_id)->delete();
			}
        }
        if (isset($request['key_strength_id'])){
            $arr_strength = [];
            foreach($request['key_strength_id'] as $val){
                $key_strength = new KeyStrengthUsage();
                $key_strength->user_id = $user_id;
                $key_strength->opportunity_id = '';
                $key_strength->key_strength_id = $val;
                $key_strength->save();
                $strength_usage = KeyStrengthUsage::where('key_strnegth_id', $val)->where('user_id', $user_id)->first();
                if(empty($strength_usage)) {
                    $key_strength = new KeyStrengthUsage();
                    $key_strength->user_id = $user_id;
                    $key_strength->opportunity_id = '';
                    $key_strength->key_strnegth_id = $val;
                    $key_strength->save();

                    $arr_strength[] = $key_strength->id;
                }else {
                    $arr_strength[] = $strength_usage->id;
                }
            }
            if (count($arr_strength) > 0) {
				KeyStrengthUsage::whereNotIn('id', $arr_strength)->where('user_id', '=', $user_id)->delete();
			}
        }
        if (isset($request['position_title_id'])){
            $arr_jobtitle = [];
            foreach($request['position_title_id'] as $val){
                $jobtitle_usage = JobTitleUsage::where('job_title_id', $val)->where('user_id', $user_id)->first();
                if(empty($jobtitle_usage)) {
                    $job_title = new JobTitleUsage();
                    $job_title->user_id = $user_id;
                    $job_title->opportunity_id = '';
                    $job_title->job_title_id = $val;
                    $job_title->save();

                    $arr_jobtitle = $job_title->id;
                }else {
                    $arr_jobtitle = $jobtitle_usage->id;
                }
            }
            if (count($arr_jobtitle) > 0) {
				JobTitleUsage::whereNotIn('id', $arr_jobtitle)->where('user_id', '=', $user_id)->delete();
			}
        }
        if (isset($request['industry_id'])){
            $arr_industry = [];
            foreach($request['industry_id'] as $val){
                $industry_usage = IndustryUsage::where('industry_id', $val)->where('user_id', $user_id)->first();
                if(empty($industry_usage)) {
                    $industry = new IndustryUsage();
                    $industry->user_id = $user_id;
                    $industry->opportunity_id = '';
                    $industry->industry_id = $val;
                    $industry->save();

                    $arr_industry[] = $industry->id;
                }else {
                    $arr_industry[] = $industry_usage->id;
                }
            }
            if (count($arr_industry) > 0) {
				IndustryUsage::whereNotIn('id', $arr_industry)->where('user_id', '=', $user_id)->delete();
			}
        }
        if (isset($request['sub_sector_id'])){
            $arr_sector = [];
            foreach($request['sub_sector_id'] as $val){
                $sector_usage = SubSectorUsage::where('sub_sector_id', $val)->where('user_id', $user_id)->first();
                if(empty($sector_usage)) {
                    $subsector = new SubSectorUsage();
                    $subsector->user_id = $user_id;
                    $subsector->opportunity_id = '';
                    $subsector->sub_sector_id = $val;
                    $subsector->save();

                    $arr_sector[] = $subsector->id;
                }else {
                    $arr_sector[] = $sector_usage->id;
                }
            }
            if (count($arr_sector) > 0) {
				SubSectorUsage::whereNotIn('id', $arr_sector)->where('user_id', '=', $user_id)->delete();
			}
        }
        if (isset($request['functional_area_id'])){
            $arr_function = [];
            foreach($request['functional_area_id'] as $val){
                $functional_usage = FunctionalAreaUsage::where('functional_area_id', $val)->where('user_id', $user_id)->first();
                if(empty($functional_usage)) {
                    $functional = new FunctionalAreaUsage();
                    $functional->user_id = $user_id;
                    $functional->opportunity_id = '';
                    $functional->functional_area_id = $val;
                    $functional->save();

                    $arr_function[] = $functional->id;
                }else {
                    $arr_function[] = $functional_usage->id;
                }
            }
            if (count($arr_function) > 0) {
				FunctionalAreaUsage::whereNotIn('id', $arr_function)->where('user_id', '=', $user_id)->delete();
			}
        }
        if (isset($request['specialist_id'])){
            $arr_speciality = [];
            foreach($request['specialist_id'] as $val){
                $speciality_usage = SpecialityUsage::where('specialist_id', $val)->where('user_id', $user_id)->first();
                if(empty($speciality_usage)) {
                    $speciality = new SpecialityUsage();
                    $speciality->user_id = $user_id;
                    $speciality->opportunity_id = '';
                    $speciality->specialist_id = $val;
                    $speciality->save();

                    $arr_speciality[] = $speciality->id;
                }else {
                    $arr_speciality[] = $speciality_usage->id;
                }
            }
            if (count($arr_speciality) > 0) {
				SpecialityUsage::whereNotIn('id', $arr_speciality)->where('user_id', '=', $user_id)->delete();
			}
        }
        if (isset($request['target_employer_id'])){
            $arr_employer = [];
            foreach($request['target_employer_id'] as $val){
                $employer_usage = TargetEmployerUsage::where('target_employer_id', $val)->where('user_id', $user_id)->first();
                if(empty($employer_usage)) {
                    $target_employer = new TargetEmployerUsage();
                    $target_employer->user_id = $user_id;
                    $target_employer->opportunity_id = '';
                    $target_employer->target_employer_id = $val;
                    $target_employer->save();

                    $arr_employer[] = $target_employer->id;
                }else {
                    $arr_employer[] = $employer_usage->id;
                }
            }
            if (count($arr_employer) > 0) {
				TargetEmployerUsage::whereNotIn('id', $arr_employer)->where('user_id', '=', $user_id)->delete();
			}
        }
        
    }

}
