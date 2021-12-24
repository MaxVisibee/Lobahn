<?php

namespace App\Traits;

use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Company;
use App\Models\Opportunity;
use App\Models\SuitabilityRatio;
use App\Models\JobStreamScore;

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

            if($job->country_id == $user->country_id) {
                $talent_points = $talent_points + $ratios[0]->talent_num;
                $position_points = $position_points + $ratios[0]->position_num;
            }
            if($job->job_type_id == $user->contract_term_id) {
                $talent_points = $talent_points + $ratios[1]->talent_num;
                $position_points = $position_points + $ratios[1]->position_num;
            }
            if($job->target_pay_id == $user->target_pay_id) {
                $talent_points = $talent_points + $ratios[2]->talent_num;
                $position_points = $position_points + $ratios[2]->position_num;
            }
            if($job->contract_hour_id == $user->contract_hour_id) {
                $talent_points = $talent_points + $ratios[3]->talent_num;
                $position_points = $position_points + $ratios[3]->position_num;
            }
            if($job->keyword_id == $user->keyword_id) {
                $talent_points = $talent_points + $ratios[4]->talent_num;
                $position_points = $position_points + $ratios[4]->position_num;
            }
            if($job->management_level_id == $user->management_level_id) {
                $talent_points = $talent_points + $ratios[5]->talent_num;
                $position_points = $position_points + $ratios[5]->position_num;
            }
            if($job->job_experience_id == $user->experience_id) {
                $talent_points = $talent_points + $ratios[6]->talent_num;
                $position_points = $position_points + $ratios[6]->position_num;
            }
            if($job->degree_level_id == $user->education_level_id) {
                $talent_points = $talent_points + $ratios[7]->talent_num;
                $position_points = $position_points + $ratios[7]->position_num;
            }
            if($job->institution_id == $user->institution_id) {
                $talent_points = $talent_points + $ratios[8]->talent_num;
                $position_points = $position_points + $ratios[8]->position_num;
            }
            if($job->language_id == $user->language_id) {
                $talent_points = $talent_points + $ratios[9]->talent_num;
                $position_points = $position_points + $ratios[9]->position_num;
            }
            if($job->geographical_id == $user->geographical_id) {
                $talent_points = $talent_points + $ratios[10]->talent_num;
                $position_points = $position_points + $ratios[10]->position_num;
            }
            if($job->management_id == $user->people_management_id) {
                $talent_points = $talent_points + $ratios[11]->talent_num;
                $position_points = $position_points + $ratios[11]->position_num;
            }
            if($job->job_skill_id == $user->skill_id) {
                $talent_points = $talent_points + $ratios[12]->talent_num;
                $position_points = $position_points + $ratios[12]->position_num;
            }
            if($job->field_study_id == $user->field_study_id) {
                $talent_points = $talent_points + $ratios[13]->talent_num;
                $position_points = $position_points + $ratios[13]->position_num;
            }
            if($job->qualification_id == $user->qualification_id) {
                $talent_points = $talent_points + $ratios[14]->talent_num;
                $position_points = $position_points + $ratios[14]->position_num;
            }
            if($job->key_strnegth_id == $user->key_strength_id) {
                $talent_points = $talent_points + $ratios[15]->talent_num;
                $position_points = $position_points + $ratios[15]->position_num;
            }
            if($job->job_title_id == $user->position_title_id) {
                $talent_points = $talent_points + $ratios[16]->talent_num;
                $position_points = $position_points + $ratios[16]->position_num;
            }
            if($job->industry_id == $user->industry_id) {
                $talent_points = $talent_points + $ratios[17]->talent_num;
                $position_points = $position_points + $ratios[17]->position_num;
            }
            if($job->sub_sector_id == $user->sub_sector_id) {
                $talent_points = $talent_points + $ratios[18]->talent_num;
                $position_points = $position_points + $ratios[18]->position_num;
            }
            if($job->functional_area_id == $user->functional_area_id) {
                $talent_points = $talent_points + $ratios[19]->talent_num;
                $position_points = $position_points + $ratios[19]->position_num;
            }
            if($job->specialist_id == $user->specialist_id) {
                $talent_points = $talent_points + $ratios[20]->talent_num;
                $position_points = $position_points + $ratios[20]->position_num;
            }
            if($job->target_employer_id == $user->target_employer_id) {
                $talent_points = $talent_points + $ratios[21]->talent_num;
                $position_points = $position_points + $ratios[21]->position_num;
            }

            $total_points = $talent_points + $position_points;
            $jsr_points = $total_points/2;

            $score = new JobStreamScore();
            $score->user_id = $user->id;
            $score->company_id = $job->company_id;
            $score->job_id = $job->id;
            $score->tsr_score = $talent_points;
            $score->psr_score = $position_points;
            $score->jsr_score = $jsr_points;
            $score->save();
        }
    }

}
