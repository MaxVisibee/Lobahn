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
use App\Models\JobShift;

trait TalentScoreTrait
{
    public function addTalentScore($user)
    {
        $jobs = Opportunity::get();
        $ratios = SuitabilityRatio::get();
        $total_tsr = $ratios->sum('talent_num');
        $total_psr = $ratios->sum('position_num');
        foreach($jobs as $job)
        {
            $talent_points = 0;
            $position_points = 0;

            // 1 Location
            if(is_array(json_decode($job->country_id)) && is_array(json_decode($user->country_id))) {
                if(!empty(array_intersect(json_decode($job->country_id), json_decode($user->country_id)))) {
                    $talent_points = $talent_points + $ratios[0]->talent_num;
                    $position_points = $position_points + $ratios[0]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[0]->talent_num;
                    $total_psr -= $ratios[0]->position_num;
                }

            // 2 Contract terms
            if(is_array(json_decode($job->job_type_id)) && is_array(json_decode($user->contract_term_id))) {
                if(!empty(array_intersect(json_decode($job->job_type_id), json_decode($user->contract_term_id)))) {
                    $talent_points = $talent_points + $ratios[1]->talent_num;
                    $position_points = $position_points + $ratios[1]->position_num;
                }                
            }
            else { 
                    $total_tsr -= $ratios[1]->talent_num;
                    $total_psr -= $ratios[1]->position_num;
                }
            
            // 3 Target pay ( First Checked )
            if( $job->full_time_salary >= $user->full_time_salary || $job->part_time_salary >= $user->part_time_salary || $job->freelance_salary >= $user->freelance_salary || $user->target_salary <= $job->salary_to )
            {
                $talent_points = $talent_points + $ratios[2]->talent_num;
                $position_points = $position_points + $ratios[2]->position_num;
            }
            else { 
                    $total_tsr -= $ratios[2]->talent_num;
                    $total_psr -= $ratios[2]->position_num;
                }

            // 4 Contract hours
            if(is_array(json_decode($job->contract_hour_id)) && is_array(json_decode($user->contract_hour_id))) {
                if(!empty(array_intersect(json_decode($job->contract_hour_id), json_decode($user->contract_hour_id)))) {
                    $talent_points = $talent_points + $ratios[3]->talent_num;
                    $position_points = $position_points + $ratios[3]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[3]->talent_num;
                    $total_psr -= $ratios[3]->position_num;
                }
            
            // 5 Keywords
            if(is_array(json_decode($job->keyword_id)) && is_array(json_decode($user->keyword_id))) {
                if(!empty(array_intersect(json_decode($job->keyword_id), json_decode($user->keyword_id)))) {
                    $talent_points = $talent_points + $ratios[4]->talent_num;
                    $position_points = $position_points + $ratios[4]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[4]->talent_num;
                    $total_psr -= $ratios[4]->position_num;
                }
            
            // 6 Management level
            if($job->carrier_level_id != NULL && $user->carrier->management_level_id != NULL)
            {
                if($job->carrier->priority-1 <= $user->carrier->priority) 
                {
                    $talent_points = $talent_points + $ratios[5]->talent_num;
                    $position_points = $position_points + $ratios[5]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[5]->talent_num;
                    $total_psr -= $ratios[5]->position_num;
                }

            // 7 Years
            if($job->job_experience_id != NULL && $user->job_experience_id != NULL)
            {
                if($job->jobExperience->priority <= $user->jobExperience->priority) {
                    $talent_points = $talent_points + $ratios[6]->talent_num;
                    $position_points = $position_points + $ratios[6]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[6]->talent_num;
                    $total_psr -= $ratios[6]->position_num;
                }


            // 8 Educational level
            if($job->degree_level_id != NULL && $user->education_level_id != NULL)
            {
                if($job->degree->priority <= $user->degree->priority) {
                    $talent_points = $talent_points + $ratios[7]->talent_num;
                    $position_points = $position_points + $ratios[7]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[7]->talent_num;
                    $total_psr -= $ratios[7]->position_num;
                }

            // 9 Academic institutions
            if(is_array(json_decode($job->institution_id)) && is_array(json_decode($user->institution_id))) {
                if(!empty(array_intersect(json_decode($job->institution_id), json_decode($user->institution_id)))) {
                    $talent_points = $talent_points + $ratios[8]->talent_num;
                    $position_points = $position_points + $ratios[8]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[8]->talent_num;
                    $total_psr -= $ratios[8]->position_num;
                }
            
            // 10 Languages
            $language_deduction = $user->languages != NUll && $job->language != NULL ? true : false;
            if($language_deduction)
                {
                    foreach($user->languages as $user_language)
                    {
                        foreach($job->language as $job_language)
                        {
                            if($user_language->language_id ==  $job_language->language_id &&  $user_language->level->priority >= $job_language->level->priority)
                            {
                            $talent_points = $talent_points + $ratios[9]->talent_num;
                            $position_points = $position_points + $ratios[9]->position_num;
                            $language_deduction = false;
                            break 2;
                            }
                        }
                    }
                }
            if($language_deduction)
            {
                    $total_tsr -= $ratios[9]->talent_num;
                    $total_psr -= $ratios[9]->position_num;
            }

            // 11 Geographic experience
            if(is_array(json_decode($job->geographical_id)) && is_array(json_decode($user->geographical_id))) {
                if(!empty(array_intersect(json_decode($job->geographical_id), json_decode($user->geographical_id)))) {
                    $talent_points = $talent_points + $ratios[10]->talent_num;
                    $position_points = $position_points + $ratios[10]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[10]->talent_num;
                    $total_psr -= $ratios[10]->position_num;
                 }
            
            // 12 People management
            if($job->people_management != NULL &&  $user->people_management_id) 
                {
                if($job->peopleManagementLevel->priority-1 <= $user->peopleManagementLevel->priority) {
                    $talent_points = $talent_points + $ratios[11]->talent_num;
                    $position_points = $position_points + $ratios[11]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[11]->talent_num;
                    $total_psr -= $ratios[11]->position_num;
                }

            //13 Software & tech knowledge
            if(is_array(json_decode($job->job_skill_id)) && is_array(json_decode($user->skill_id))) {
                if(!empty(array_intersect(json_decode($job->job_skill_id), json_decode($user->skill_id)))) {
                    $talent_points = $talent_points + $ratios[12]->talent_num;
                    $position_points = $position_points + $ratios[12]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[12]->talent_num;
                    $total_psr -= $ratios[12]->position_num;
                }
            
            // 14 Fields of study
            if(is_array(json_decode($job->field_study_id)) && is_array(json_decode($user->field_study_id))) {
                if(!empty(array_intersect(json_decode($job->field_study_id), json_decode($user->field_study_id)))) {
                    $talent_points = $talent_points + $ratios[13]->talent_num;
                    $position_points = $position_points + $ratios[13]->position_num;
                } 
            }
            else { 
                    $total_tsr -= $ratios[13]->talent_num;
                    $total_psr -= $ratios[13]->position_num;
                }
            
            // 15 Qualifications & certifications
            if(is_array(json_decode($job->qualification_id)) && is_array(json_decode($user->qualification_id))) {
                if(!empty(array_intersect(json_decode($job->qualification_id), json_decode($user->qualification_id)))) {
                    $talent_points = $talent_points + $ratios[14]->talent_num;
                    $position_points = $position_points + $ratios[14]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[14]->talent_num;
                    $total_psr -= $ratios[14]->position_num;
                }
            
            // 16 Professional strengths
            if(is_array(json_decode($job->key_strength_id)) && is_array(json_decode($user->key_strength_id))) {
                if(!empty(array_intersect(json_decode($job->key_strength_id), json_decode($user->key_strength_id)))) {
                    $talent_points = $talent_points + $ratios[15]->talent_num;
                    $position_points = $position_points + $ratios[15]->position_num;
                } 
            }
            else { 
                    $total_tsr -= $ratios[15]->talent_num;
                    $total_psr -= $ratios[15]->position_num;
                }
            
            // 17 Position title
            if(is_array(json_decode($job->job_title_id)) && is_array(json_decode($user->position_title_id))) {
                if(!empty(array_intersect(json_decode($job->job_title_id), json_decode($user->position_title_id)))) {
                    $talent_points = $talent_points + $ratios[16]->talent_num;
                    $position_points = $position_points + $ratios[16]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[16]->talent_num;
                    $total_psr -= $ratios[16]->position_num;
                }
            
            //18 Industry
            if(is_array(json_decode($job->industry_id)) && is_array(json_decode($user->industry_id))) {
                if(!empty(array_intersect(json_decode($job->industry_id), json_decode($user->industry_id)))) {
                    $talent_points = $talent_points + $ratios[17]->talent_num;
                    $position_points = $position_points + $ratios[17]->position_num;
                } 
            }
            else { 
                    $total_tsr -= $ratios[17]->talent_num;
                    $total_psr -= $ratios[17]->position_num;
                }
            
            // 19 Function
            if(is_array(json_decode($job->functional_area_id)) && is_array(json_decode($user->functional_area_id))) {
                if(!empty(array_intersect(json_decode($job->functional_area_id), json_decode($user->functional_area_id)))) {
                    $talent_points = $talent_points + $ratios[18]->talent_num;
                    $position_points = $position_points + $ratios[18]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[18]->talent_num;
                    $total_psr -= $ratios[18]->position_num;
                }

            // 20 Target Companies
            if(is_array(json_decode($job->target_employer_id)) && is_array(json_decode($user->target_employer_id))) {
                if(!empty(array_intersect(json_decode($job->target_employer_id), json_decode($user->target_employer_id)))) {
                    $talent_points = $talent_points + $ratios[19]->talent_num;
                    $position_points = $position_points + $ratios[19]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[19]->talent_num;
                    $total_psr -= $ratios[19]->position_num;
                }

            $total_points = $talent_points + $position_points;
            $jsr_points = $total_points/2;

            $tsr_percent = ($talent_points * 100)/$total_tsr;
            // $tsr_percent = $total_tsr;
            $psr_percent = ($position_points * 100)/$total_psr;
            $jsr_percent = ($tsr_percent + $psr_percent)/2;

            JobStreamScore::where('user_id',$user->id)->where('job_id',$job->id)->delete();
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

    public function addJobTalentScore($opportunity){

        $seekers = User::get();
        $ratios = SuitabilityRatio::get();
        $total_tsr = $ratios->sum('talent_num');
        $total_psr = $ratios->sum('position_num');

        foreach($seekers as $seeker)
        {
            $talent_points = 0;
            $position_points = 0;

            // 1 Location
            if(is_array(json_decode($seeker->country_id)) && is_array(json_decode($opportunity->country_id))) {
                if(!empty(array_intersect(json_decode($seeker->country_id), json_decode($opportunity->country_id)))) {
                    $talent_points = $talent_points + $ratios[0]->talent_num;
                    $position_points = $position_points + $ratios[0]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[0]->talent_num;
                    $total_psr -= $ratios[0]->position_num;
                }

            // 2 Contract terms
            if(is_array(json_decode($seeker->contract_term_id)) && is_array(json_decode($opportunity->job_type_id))) {
                if(!empty(array_intersect(json_decode($seeker->contract_term_id), json_decode($opportunity->job_type_id)))) {
                    $talent_points = $talent_points + $ratios[1]->talent_num;
                    $position_points = $position_points + $ratios[1]->position_num;
                }              
            }
            else { 
                    $total_tsr -= $ratios[1]->talent_num;
                    $total_psr -= $ratios[1]->position_num;
                }
            
            // 3 Target pay
            if( $opportunity->full_time_salary >= $seeker->full_time_salary || $opportunity->part_time_salary >= $seeker->part_time_salary || $opportunity->freelance_salary >= $seeker->freelance_salary || $seeker->target_salary <= $opportunity->salary_to )
            {
                $talent_points = $talent_points + $ratios[2]->talent_num;
                $position_points = $position_points + $ratios[2]->position_num;
            }
            else { 
                    $total_tsr -= $ratios[2]->talent_num;
                    $total_psr -= $ratios[2]->position_num;
                }

            // 4 Contract hours
            if(is_array(json_decode($seeker->contract_hour_id)) && is_array(json_decode($opportunity->contract_hour_id))) {
                if(!empty(array_intersect(json_decode($seeker->contract_hour_id), json_decode($opportunity->contract_hour_id)))) {
                    $talent_points = $talent_points + $ratios[3]->talent_num;
                    $position_points = $position_points + $ratios[3]->position_num;
                }
                else { 
                    $total_tsr -= $ratios[3]->talent_num;
                    $total_psr -= $ratios[3]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[3]->talent_num;
                    $total_psr -= $ratios[3]->position_num;
                }
            
            // 5 Keywords
            if(is_array(json_decode($seeker->keyword_id)) && is_array(json_decode($opportunity->keyword_id))) {
                if(!empty(array_intersect(json_decode($seeker->keyword_id), json_decode($opportunity->keyword_id)))) {
                    $talent_points = $talent_points + $ratios[4]->talent_num;
                    $position_points = $position_points + $ratios[4]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[4]->talent_num;
                    $total_psr -= $ratios[4]->position_num;
                }

            // 6 Management level
            if($opportunity->carrier_level_id != NULL && $seeker->carrier->management_level_id != NULL)
            {
                if($seeker->carrier->priority >= $opportunity->carrier->priority-1) {
                    $talent_points = $talent_points + $ratios[5]->talent_num;
                    $position_points = $position_points + $ratios[5]->position_num;
                }
            }
             else { 
                    $total_tsr -= $ratios[5]->talent_num;
                    $total_psr -= $ratios[5]->position_num;
                }

            // 7 Years
            if($job->job_experience_id != NULL && $user->job_experience_id != NULL)
            {
                if($seeker->jobExperience->priority >= $opportunity->jobExperience->priority) {
                    $talent_points = $talent_points + $ratios[6]->talent_num;
                    $position_points = $position_points + $ratios[6]->position_num;
                }   
            }
            else { 
                    $total_tsr -= $ratios[6]->talent_num;
                    $total_psr -= $ratios[6]->position_num;
                }
            

            // 8 Educational level
            if($opportunity->degree_level_id != NULL && $seeker->education_level_id != NULL)
            {
                if($seeker->degree->priority  >= $opportunity->degree->priority ) {
                    $talent_points = $talent_points + $ratios[7]->talent_num;
                    $position_points = $position_points + $ratios[7]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[7]->talent_num;
                    $total_psr -= $ratios[7]->position_num;
                }

            // 9 Academic institutions
            if(is_array(json_decode($seeker->institution_id)) && is_array(json_decode($opportunity->institution_id))) {
                if(!empty(array_intersect(json_decode($seeker->institution_id), json_decode($opportunity->institution_id)))) {
                    $talent_points = $talent_points + $ratios[8]->talent_num;
                    $position_points = $position_points + $ratios[8]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[8]->talent_num;
                    $total_psr -= $ratios[8]->position_num;
                }
            
            // 10 Languages
            $language_deduction = $seeker->languages != NUll && $opportunity->language != NULL ? true : false;
            if($language_deduction)
                {
                    foreach($seeker->languages as $user_language)
                    {
                        foreach($opportunity->language as $job_language)
                        {
                            if($user_language->language_id ==  $job_language->language_id &&  $user_language->level->priority >= $job_language->level->priority)
                            {
                            $talent_points = $talent_points + $ratios[9]->talent_num;
                            $position_points = $position_points + $ratios[9]->position_num;
                            $language_deduction = false;
                            break 2;
                            }
                        }
                    }
                }
            if($language_deduction)
            {
                    $total_tsr -= $ratios[9]->talent_num;
                    $total_psr -= $ratios[9]->position_num;
            }
            
            // 11 Geographic experience
            if(is_array(json_decode($seeker->geographical_id)) && is_array(json_decode($opportunity->geographical_id))) {
                if(!empty(array_intersect(json_decode($seeker->geographical_id), json_decode($opportunity->geographical_id)))) {
                    $talent_points = $talent_points + $ratios[10]->talent_num;
                    $position_points = $position_points + $ratios[10]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[10]->talent_num;
                    $total_psr -= $ratios[10]->position_num;
                }
            
            // 12 People management
            if($opportunity->people_management != NULL &&  $seeker->people_management_id) 
                {
                if( $seeker->peopleManagementLevel->priority >= $opportunity->peopleManagementLevel->priority-1 ) {
                    $talent_points = $talent_points + $ratios[11]->talent_num;
                    $position_points = $position_points + $ratios[11]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[11]->talent_num;
                    $total_psr -= $ratios[11]->position_num;
                }

            // 13 Software & tech knowledge
            if(is_array(json_decode($seeker->skill_id)) && is_array(json_decode($opportunity->job_skill_id))) {
                if(!empty(array_intersect(json_decode($seeker->skill_id), json_decode($opportunity->job_skill_id)))) {
                    $talent_points = $talent_points + $ratios[12]->talent_num;
                    $position_points = $position_points + $ratios[12]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[12]->talent_num;
                    $total_psr -= $ratios[12]->position_num;
                }
            
            // 14 Fields of study
            if(is_array(json_decode($seeker->field_study_id)) && is_array(json_decode($opportunity->field_study_id))) {
                if(!empty(array_intersect(json_decode($seeker->field_study_id), json_decode($opportunity->field_study_id)))) {
                    $talent_points = $talent_points + $ratios[13]->talent_num;
                    $position_points = $position_points + $ratios[13]->position_num;
                }  
            }
            else { 
                    $total_tsr -= $ratios[13]->talent_num;
                    $total_psr -= $ratios[13]->position_num;
                }
            
            // 15 Qualifications & certifications
            if(is_array(json_decode($seeker->qualification_id)) && is_array(json_decode($opportunity->qualification_id))) {
                if(!empty(array_intersect(json_decode($seeker->qualification_id), json_decode($opportunity->qualification_id)))) {
                    $talent_points = $talent_points + $ratios[14]->talent_num;
                    $position_points = $position_points + $ratios[14]->position_num;
                }
            }
            
            // 16 Professional strengths
            if(is_array(json_decode($seeker->key_strength_id)) && is_array(json_decode($opportunity->key_strength_id))) {
                if(!empty(array_intersect(json_decode($seeker->key_strength_id), json_decode($opportunity->key_strength_id)))) {
                    $talent_points = $talent_points + $ratios[15]->talent_num;
                    $position_points = $position_points + $ratios[15]->position_num;
                } 
            }
            else { 
                    $total_tsr -= $ratios[15]->talent_num;
                    $total_psr -= $ratios[15]->position_num;
                }
            
            // 17 Position title
            if(is_array(json_decode($seeker->position_title_id)) && is_array(json_decode($opportunity->job_title_id))) {
                if(!empty(array_intersect(json_decode($seeker->position_title_id), json_decode($opportunity->job_title_id)))) {
                    $talent_points = $talent_points + $ratios[16]->talent_num;
                    $position_points = $position_points + $ratios[16]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[16]->talent_num;
                    $total_psr -= $ratios[16]->position_num;
                }
            
            // 18 Industry
            if(is_array(json_decode($seeker->industry_id)) && is_array(json_decode($opportunity->industry_id))) {
                if(!empty(array_intersect(json_decode($seeker->industry_id), json_decode($opportunity->industry_id)))) {
                    $talent_points = $talent_points + $ratios[17]->talent_num;
                    $position_points = $position_points + $ratios[17]->position_num;
                } 
            }
            else { 
                    $total_tsr -= $ratios[17]->talent_num;
                    $total_psr -= $ratios[17]->position_num;
                }
            
            // 19 Function
            if(is_array(json_decode($seeker->functional_area_id)) && is_array(json_decode($opportunity->functional_area_id))) {
                if(!empty(array_intersect(json_decode($seeker->functional_area_id), json_decode($opportunity->functional_area_id)))) {
                    $talent_points = $talent_points + $ratios[18]->talent_num;
                    $position_points = $position_points + $ratios[18]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[18]->talent_num;
                    $total_psr -= $ratios[18]->position_num;
                }
            
            // 20 Target companies
            if(is_array(json_decode($seeker->target_employer_id)) && is_array(json_decode($opportunity->target_employer_id))) {
                if(!empty(array_intersect(json_decode($seeker->target_employer_id), json_decode($opportunity->target_employer_id)))) {
                    $talent_points = $talent_points + $ratios[19]->talent_num;
                    $position_points = $position_points + $ratios[19]->position_num;
                }
            }
            else { 
                    $total_tsr -= $ratios[19]->talent_num;
                    $total_psr -= $ratios[19]->position_num;
                }
            

            $total_points = $talent_points + $position_points;
            $jsr_points = $total_points/2;
            $tsr_percent = ($talent_points * 100)/$total_tsr;
            $psr_percent = ($position_points * 100)/$total_psr;

            $total_percent = $tsr_percent + $psr_percent;
            $jsr_percent = $total_percent/2;

            JobStreamScore::where('user_id', $seeker->id)->where('job_id', $opportunity->id)->delete();  

            $score = new JobStreamScore();
            $score->job_id = $opportunity->id;
            $score->user_id = $seeker->id;
            $score->company_id = $opportunity->company_id;            

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