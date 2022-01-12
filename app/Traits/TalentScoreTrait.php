<?php

namespace App\Traits;

use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Company;
use App\Models\Opportunity;
use App\Models\SuitabilityRatio;
use App\Models\JobStreamScore;
use App\Models\KeywordUsage;

trait TalentScoreTrait
{

    public function addTalentScore($user)
    {
        $jobs = Opportunity::get();
        $ratios = SuitabilityRatio::get();

        foreach($jobs as $job)
        {
            $talent_points = 0;
            $position_points = 0;

            if(!empty(array_intersect(json_decode($job->country_id), json_decode($data->country_id)))) {
                $talent_points = $talent_points + $ratios[0]->talent_num;
                $position_points = $position_points + $ratios[0]->position_num;
            }
            
            if(!empty(array_intersect(json_decode($job->job_type_id), json_decode($user->contract_term_id)))) {
                $talent_points = $talent_points + $ratios[1]->talent_num;
                $position_points = $position_points + $ratios[1]->position_num;
            }
            if(!empty(array_intersect(json_decode($job->target_pay_id), json_decode($user->target_pay_id)))) {
                $talent_points = $talent_points + $ratios[2]->talent_num;
                $position_points = $position_points + $ratios[2]->position_num;
            }
            if(!empty(array_intersect(json_decode($job->contract_hour_id), json_decode($user->contract_hour_id)))) {
                $talent_points = $talent_points + $ratios[3]->talent_num;
                $position_points = $position_points + $ratios[3]->position_num;
            }

            // if(is_array($job->mykeywords())) {
            //     $job_keywords = $job->mykeywords();
            //     $user_keywords = $user->mykeywords();
            //     $same_keywords = array_intersect($job_keywords, $user_keywords);
            //     if(count($same_keywords) > 0) {
            //         $talent_points = $talent_points + $ratios[4]->talent_num;
            //         $position_points = $position_points + $ratios[4]->position_num;
            //     }
            // }

            if(!empty(array_intersect(json_decode($job->keyword_id), json_decode($user->keyword_id)))) {
                $talent_points = $talent_points + $ratios[4]->talent_num;
                $position_points = $position_points + $ratios[4]->position_num;
            }

            if(!empty(array_intersect(json_decode($job->carrier_level_id), json_decode($user->management_level_id)))) {
                $talent_points = $talent_points + $ratios[5]->talent_num;
                $position_points = $position_points + $ratios[5]->position_num;
            }
            if(!empty(array_intersect(json_decode($job->job_experience_id), json_decode($user->experience_id)))) {
                $talent_points = $talent_points + $ratios[6]->talent_num;
                $position_points = $position_points + $ratios[6]->position_num;
            }
            if(!empty(array_intersect(json_decode($job->degree_level_id), json_decode($user->education_level_id)))) {
                $talent_points = $talent_points + $ratios[7]->talent_num;
                $position_points = $position_points + $ratios[7]->position_num;
            }
            if(!empty(array_intersect(json_decode($job->institution_id), json_decode($user->institution_id)))) {
                $talent_points = $talent_points + $ratios[8]->talent_num;
                $position_points = $position_points + $ratios[8]->position_num;
            }
            if(!empty(array_intersect(json_decode($job->language_id), json_decode($user->language_id)))) {
                $talent_points = $talent_points + $ratios[9]->talent_num;
                $position_points = $position_points + $ratios[9]->position_num;
            }
            if(!empty(array_intersect(json_decode($job->geographical_id), json_decode($user->geographical_id)))) {
                $talent_points = $talent_points + $ratios[10]->talent_num;
                $position_points = $position_points + $ratios[10]->position_num;
            }
            if(!empty(array_intersect(json_decode($job->management_id), json_decode($user->people_management_id)))) {
                $talent_points = $talent_points + $ratios[11]->talent_num;
                $position_points = $position_points + $ratios[11]->position_num;
            }

            // if(is_array($job->skillOpportunity())) {
            //     $job_skills = $job->skillOpportunity();
            //     $user_skills = $user->seekerSkills();
            //     $same_skills = array_intersect($job_skills, $user_skills);
            //     if(count($same_skills) > 0) {
            //         $talent_points = $talent_points + $ratios[12]->talent_num;
            //         $position_points = $position_points + $ratios[12]->position_num;
            //     }
            // }

            if(!empty(array_intersect(json_decode($job->job_skill_id), json_decode($user->skill_id)))) {
                $talent_points = $talent_points + $ratios[12]->talent_num;
                $position_points = $position_points + $ratios[12]->position_num;
            }
            
            if(!empty(array_intersect(json_decode($job->field_study_id), json_decode($user->field_study_id)))) {
                $talent_points = $talent_points + $ratios[13]->talent_num;
                $position_points = $position_points + $ratios[13]->position_num;
            }
            if(!empty(array_intersect(json_decode($job->qualification_id), json_decode($user->qualification_id)))) {
                $talent_points = $talent_points + $ratios[14]->talent_num;
                $position_points = $position_points + $ratios[14]->position_num;
            }
            if(!empty(array_intersect(json_decode($job->key_strnegth_id), json_decode($user->key_strength_id)))) {
                $talent_points = $talent_points + $ratios[15]->talent_num;
                $position_points = $position_points + $ratios[15]->position_num;
            }
            if(!empty(array_intersect(json_decode($job->job_title_id), json_decode($user->position_title_id)))) {
                $talent_points = $talent_points + $ratios[16]->talent_num;
                $position_points = $position_points + $ratios[16]->position_num;
            }
            if(!empty(array_intersect(json_decode($job->industry_id), json_decode($user->industry_id)))) {
                $talent_points = $talent_points + $ratios[17]->talent_num;
                $position_points = $position_points + $ratios[17]->position_num;
            }
            if(!empty(array_intersect(json_decode($job->sub_sector_id), json_decode($user->sub_sector_id)))) {
                $talent_points = $talent_points + $ratios[18]->talent_num;
                $position_points = $position_points + $ratios[18]->position_num;
            }
            if(!empty(array_intersect(json_decode($job->functional_area_id), json_decode($user->functional_area_id)))) {
                $talent_points = $talent_points + $ratios[19]->talent_num;
                $position_points = $position_points + $ratios[19]->position_num;
            }
            if(!empty(array_intersect(json_decode($job->specialist_id), json_decode($user->specialist_id)))) {
                $talent_points = $talent_points + $ratios[20]->talent_num;
                $position_points = $position_points + $ratios[20]->position_num;
            }
            if(!empty(array_intersect(json_decode($job->target_employer_id), json_decode($user->target_employer_id)))) {
                $talent_points = $talent_points + $ratios[21]->talent_num;
                $position_points = $position_points + $ratios[21]->position_num;
            }

            $total_points = $talent_points + $position_points;
            $jsr_points = $total_points/2;

            $total_tsr = $ratios->sum('talent_num');
            $tsr_percent = ($talent_points * 100)/$total_tsr;

            $total_psr = $ratios->sum('position_num');
            $psr_percent = ($position_points * 100)/$total_psr;

            $total_percent = $tsr_percent + $psr_percent;
            $jsr_percent = $total_percent/2;

            $score = new JobStreamScore();
            $score->user_id = $user->id;
            $score->company_id = $job->company_id;
            $score->job_id = $job->id;
            $score->tsr_score = $talent_points;
            $score->psr_score = $position_points;
            $score->jsr_score = $jsr_points;

            $score->tsr_percent = $tsr_percent;
            $score->psr_percent = $psr_percent;
            $score->jsr_percent = $jsr_percent;
            
            $score->save();
        }
    }

}
