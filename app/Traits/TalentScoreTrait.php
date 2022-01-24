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

            // 1
            if(is_array(json_decode($job->country_id)) && is_array(json_decode($user->country_id))) {
                if(!empty(array_intersect(json_decode($job->country_id), json_decode($user->country_id)))) {
                    $talent_points = $talent_points + $ratios[0]->talent_num;
                    $position_points = $position_points + $ratios[0]->position_num;
                }
            }

            // 2
            if(is_array(json_decode($job->job_type_id)) && is_array(json_decode($user->contract_term_id))) {
                if(!empty(array_intersect(json_decode($job->job_type_id), json_decode($user->contract_term_id)))) {
                    $talent_points = $talent_points + $ratios[1]->talent_num;
                    $position_points = $position_points + $ratios[1]->position_num;
                }                
            }
            
            // 3
            if($job->target_salary <= $user->target_salary) {
                $talent_points = $talent_points + $ratios[2]->talent_num;
                $position_points = $position_points + $ratios[2]->position_num;
            }

            // 4
            if(is_array(json_decode($job->contract_hour_id)) && is_array(json_decode($user->contract_hour_id))) {
                if(!empty(array_intersect(json_decode($job->contract_hour_id), json_decode($user->contract_hour_id)))) {
                    $talent_points = $talent_points + $ratios[3]->talent_num;
                    $position_points = $position_points + $ratios[3]->position_num;
                }
            }
            
            // 5
            if(is_array(json_decode($job->keyword_id)) && is_array(json_decode($user->keyword_id))) {
                if(!empty(array_intersect(json_decode($job->keyword_id), json_decode($user->keyword_id)))) {
                    $talent_points = $talent_points + $ratios[4]->talent_num;
                    $position_points = $position_points + $ratios[4]->position_num;
                }
            }
            
            // 6
            if($job->carrier_level_id == $user->management_level_id) {
                $talent_points = $talent_points + $ratios[5]->talent_num;
                $position_points = $position_points + $ratios[5]->position_num;
            }
            // 7
            if($job->job_experience_id == $user->experience_id) {
                $talent_points = $talent_points + $ratios[6]->talent_num;
                $position_points = $position_points + $ratios[6]->position_num;
            }

            // 8
            if($job->degree_level_id == $user->education_level_id) {
                $talent_points = $talent_points + $ratios[7]->talent_num;
                $position_points = $position_points + $ratios[7]->position_num;
            }

            // 9
            if(is_array(json_decode($job->institution_id)) && is_array(json_decode($user->institution_id))) {
                if(!empty(array_intersect(json_decode($job->institution_id), json_decode($user->institution_id)))) {
                    $talent_points = $talent_points + $ratios[8]->talent_num;
                    $position_points = $position_points + $ratios[8]->position_num;
                }
            }
            
            // 10
            if(is_array(json_decode($job->language_id)) && is_array(json_decode($user->language_id))) {
                if(!empty(array_intersect(json_decode($job->language_id), json_decode($user->language_id)))) {
                    $talent_points = $talent_points + $ratios[9]->talent_num;
                    $position_points = $position_points + $ratios[9]->position_num;
                }
            }
            
            // 11
            if(is_array(json_decode($job->geographical_id)) && is_array(json_decode($user->geographical_id))) {
                if(!empty(array_intersect(json_decode($job->geographical_id), json_decode($user->geographical_id)))) {
                    $talent_points = $talent_points + $ratios[10]->talent_num;
                    $position_points = $position_points + $ratios[10]->position_num;
                }
            }
            
            // 12
            if($job->people_management == $user->people_management_id) {
                $talent_points = $talent_points + $ratios[11]->talent_num;
                $position_points = $position_points + $ratios[11]->position_num;
            }

            // 13
            if(is_array(json_decode($job->job_skill_id)) && is_array(json_decode($user->skill_id))) {
                if(!empty(array_intersect(json_decode($job->job_skill_id), json_decode($user->skill_id)))) {
                    $talent_points = $talent_points + $ratios[12]->talent_num;
                    $position_points = $position_points + $ratios[12]->position_num;
                }
            }
            
            // 14
            if(is_array(json_decode($job->field_study_id)) && is_array(json_decode($user->field_study_id))) {
                if(!empty(array_intersect(json_decode($job->field_study_id), json_decode($user->field_study_id)))) {
                    $talent_points = $talent_points + $ratios[13]->talent_num;
                    $position_points = $position_points + $ratios[13]->position_num;
                }    
            }
            
            // 15
            if(is_array(json_decode($job->qualification_id)) && is_array(json_decode($user->qualification_id))) {
                if(!empty(array_intersect(json_decode($job->qualification_id), json_decode($user->qualification_id)))) {
                    $talent_points = $talent_points + $ratios[14]->talent_num;
                    $position_points = $position_points + $ratios[14]->position_num;
                }
            }
            
            // 16
            if(is_array(json_decode($job->key_strength_id)) && is_array(json_decode($user->key_strength_id))) {
                if(!empty(array_intersect(json_decode($job->key_strength_id), json_decode($user->key_strength_id)))) {
                    $talent_points = $talent_points + $ratios[15]->talent_num;
                    $position_points = $position_points + $ratios[15]->position_num;
                } 
            }
            
            // 17
            if(is_array(json_decode($job->job_title_id)) && is_array(json_decode($user->position_title_id))) {
                if(!empty(array_intersect(json_decode($job->job_title_id), json_decode($user->position_title_id)))) {
                    $talent_points = $talent_points + $ratios[16]->talent_num;
                    $position_points = $position_points + $ratios[16]->position_num;
                }
            }
            
            // 18
            if(is_array(json_decode($job->industry_id)) && is_array(json_decode($user->industry_id))) {
                if(!empty(array_intersect(json_decode($job->industry_id), json_decode($user->industry_id)))) {
                    $talent_points = $talent_points + $ratios[17]->talent_num;
                    $position_points = $position_points + $ratios[17]->position_num;
                }  
            }
            
            // 19
            if(is_array(json_decode($job->sub_sector_id)) && is_array(json_decode($user->sub_sector_id))) {
                if(!empty(array_intersect(json_decode($job->sub_sector_id), json_decode($user->sub_sector_id)))) {
                    $talent_points = $talent_points + $ratios[18]->talent_num;
                    $position_points = $position_points + $ratios[18]->position_num;
                }
            }
            
            // 20
            if(is_array(json_decode($job->functional_area_id)) && is_array(json_decode($user->functional_area_id))) {
                if(!empty(array_intersect(json_decode($job->functional_area_id), json_decode($user->functional_area_id)))) {
                    $talent_points = $talent_points + $ratios[19]->talent_num;
                    $position_points = $position_points + $ratios[19]->position_num;
                }
            }
            
            // 21
            if(is_array(json_decode($job->specialist_id)) && is_array(json_decode($user->specialist_id))) {
                if(!empty(array_intersect(json_decode($job->specialist_id), json_decode($user->specialist_id)))) {
                    $talent_points = $talent_points + $ratios[20]->talent_num;
                    $position_points = $position_points + $ratios[20]->position_num;
                }
            }
            
            // 22
            if(is_array(json_decode($job->target_employer_id)) && is_array(json_decode($user->target_employer_id))) {
                if(!empty(array_intersect(json_decode($job->target_employer_id), json_decode($user->target_employer_id)))) {
                    $talent_points = $talent_points + $ratios[21]->talent_num;
                    $position_points = $position_points + $ratios[21]->position_num;
                }
            }

            $total_points = $talent_points + $position_points;
            $jsr_points = $total_points/2;

            $total_tsr = $ratios->sum('talent_num');
            $tsr_percent = ($talent_points * 100)/$total_tsr;

            $total_psr = $ratios->sum('position_num');
            $psr_percent = ($position_points * 100)/$total_psr;

            $total_percent = $tsr_percent + $psr_percent;
            $jsr_percent = $total_percent/2;

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
        // $jobs = Opportunity::get();
        $seekers = User::get();
        $ratios = SuitabilityRatio::get();

        foreach($seekers as $seeker)
        {
            $talent_points = 0;
            $position_points = 0;

            // 1
            if(is_array(json_decode($seeker->country_id)) && is_array(json_decode($opportunity->country_id))) {
                if(!empty(array_intersect(json_decode($seeker->country_id), json_decode($opportunity->country_id)))) {
                    $talent_points = $talent_points + $ratios[0]->talent_num;
                    $position_points = $position_points + $ratios[0]->position_num;
                }
            }

            // 2
            if(is_array(json_decode($seeker->contract_term_id)) && is_array(json_decode($opportunity->job_type_id))) {
                if(!empty(array_intersect(json_decode($seeker->contract_term_id), json_decode($opportunity->job_type_id)))) {
                    $talent_points = $talent_points + $ratios[1]->talent_num;
                    $position_points = $position_points + $ratios[1]->position_num;
                }                
            }
            
            // 3
            if($seeker->target_salary <= $opportunity->target_salary) {
                $talent_points = $talent_points + $ratios[2]->talent_num;
                $position_points = $position_points + $ratios[2]->position_num;
            }

            // 4
            if(is_array(json_decode($seeker->contract_hour_id)) && is_array(json_decode($opportunity->contract_hour_id))) {
                if(!empty(array_intersect(json_decode($seeker->contract_hour_id), json_decode($opportunity->contract_hour_id)))) {
                    $talent_points = $talent_points + $ratios[3]->talent_num;
                    $position_points = $position_points + $ratios[3]->position_num;
                }
            }
            
            // 5
            if(is_array(json_decode($seeker->keyword_id)) && is_array(json_decode($opportunity->keyword_id))) {
                if(!empty(array_intersect(json_decode($seeker->keyword_id), json_decode($opportunity->keyword_id)))) {
                    $talent_points = $talent_points + $ratios[4]->talent_num;
                    $position_points = $position_points + $ratios[4]->position_num;
                }
            }
            
            // 6
            if($seeker->management_level_id == $opportunity->carrier_level_id) {
                $talent_points = $talent_points + $ratios[5]->talent_num;
                $position_points = $position_points + $ratios[5]->position_num;
            }
            // 7
            if($seeker->experience_id == $opportunity->job_experience_id) {
                $talent_points = $talent_points + $ratios[6]->talent_num;
                $position_points = $position_points + $ratios[6]->position_num;
            }

            // 8
            if($seeker->education_level_id == $opportunity->degree_level_id) {
                $talent_points = $talent_points + $ratios[7]->talent_num;
                $position_points = $position_points + $ratios[7]->position_num;
            }

            // 9
            if(is_array(json_decode($seeker->institution_id)) && is_array(json_decode($opportunity->institution_id))) {
                if(!empty(array_intersect(json_decode($seeker->institution_id), json_decode($opportunity->institution_id)))) {
                    $talent_points = $talent_points + $ratios[8]->talent_num;
                    $position_points = $position_points + $ratios[8]->position_num;
                }
            }
            
            // 10
            if(is_array(json_decode($seeker->language_id)) && is_array(json_decode($opportunity->language_id))) {
                if(!empty(array_intersect(json_decode($seeker->language_id), json_decode($opportunity->language_id)))) {
                    $talent_points = $talent_points + $ratios[9]->talent_num;
                    $position_points = $position_points + $ratios[9]->position_num;
                }
            }
            
            // 11
            if(is_array(json_decode($seeker->geographical_id)) && is_array(json_decode($opportunity->geographical_id))) {
                if(!empty(array_intersect(json_decode($seeker->geographical_id), json_decode($opportunity->geographical_id)))) {
                    $talent_points = $talent_points + $ratios[10]->talent_num;
                    $position_points = $position_points + $ratios[10]->position_num;
                }
            }
            
            // 12
            if($seeker->people_management == $opportunity->people_management_id) {
                $talent_points = $talent_points + $ratios[11]->talent_num;
                $position_points = $position_points + $ratios[11]->position_num;
            }

            // 13
            if(is_array(json_decode($seeker->skill_id)) && is_array(json_decode($opportunity->job_skill_id))) {
                if(!empty(array_intersect(json_decode($seeker->skill_id), json_decode($opportunity->job_skill_id)))) {
                    $talent_points = $talent_points + $ratios[12]->talent_num;
                    $position_points = $position_points + $ratios[12]->position_num;
                }
            }
            
            // 14
            if(is_array(json_decode($seeker->field_study_id)) && is_array(json_decode($opportunity->field_study_id))) {
                if(!empty(array_intersect(json_decode($seeker->field_study_id), json_decode($opportunity->field_study_id)))) {
                    $talent_points = $talent_points + $ratios[13]->talent_num;
                    $position_points = $position_points + $ratios[13]->position_num;
                }    
            }
            
            // 15
            if(is_array(json_decode($seeker->qualification_id)) && is_array(json_decode($opportunity->qualification_id))) {
                if(!empty(array_intersect(json_decode($seeker->qualification_id), json_decode($opportunity->qualification_id)))) {
                    $talent_points = $talent_points + $ratios[14]->talent_num;
                    $position_points = $position_points + $ratios[14]->position_num;
                }
            }
            
            // 16
            if(is_array(json_decode($seeker->key_strength_id)) && is_array(json_decode($opportunity->key_strength_id))) {
                if(!empty(array_intersect(json_decode($seeker->key_strength_id), json_decode($opportunity->key_strength_id)))) {
                    $talent_points = $talent_points + $ratios[15]->talent_num;
                    $position_points = $position_points + $ratios[15]->position_num;
                } 
            }
            
            // 17
            if(is_array(json_decode($seeker->position_title_id)) && is_array(json_decode($opportunity->job_title_id))) {
                if(!empty(array_intersect(json_decode($seeker->position_title_id), json_decode($opportunity->job_title_id)))) {
                    $talent_points = $talent_points + $ratios[16]->talent_num;
                    $position_points = $position_points + $ratios[16]->position_num;
                }
            }
            
            // 18
            if(is_array(json_decode($seeker->industry_id)) && is_array(json_decode($opportunity->industry_id))) {
                if(!empty(array_intersect(json_decode($seeker->industry_id), json_decode($opportunity->industry_id)))) {
                    $talent_points = $talent_points + $ratios[17]->talent_num;
                    $position_points = $position_points + $ratios[17]->position_num;
                }  
            }
            
            // 19
            if(is_array(json_decode($seeker->sub_sector_id)) && is_array(json_decode($opportunity->sub_sector_id))) {
                if(!empty(array_intersect(json_decode($seeker->sub_sector_id), json_decode($opportunity->sub_sector_id)))) {
                    $talent_points = $talent_points + $ratios[18]->talent_num;
                    $position_points = $position_points + $ratios[18]->position_num;
                }
            }
            
            // 20
            if(is_array(json_decode($seeker->functional_area_id)) && is_array(json_decode($opportunity->functional_area_id))) {
                if(!empty(array_intersect(json_decode($seeker->functional_area_id), json_decode($opportunity->functional_area_id)))) {
                    $talent_points = $talent_points + $ratios[19]->talent_num;
                    $position_points = $position_points + $ratios[19]->position_num;
                }
            }
            
            // 21
            if(is_array(json_decode($seeker->specialist_id)) && is_array(json_decode($opportunity->specialist_id))) {
                if(!empty(array_intersect(json_decode($seeker->specialist_id), json_decode($opportunity->specialist_id)))) {
                    $talent_points = $talent_points + $ratios[20]->talent_num;
                    $position_points = $position_points + $ratios[20]->position_num;
                }
            }
            
            // 22
            if(is_array(json_decode($seeker->target_employer_id)) && is_array(json_decode($opportunity->target_employer_id))) {
                if(!empty(array_intersect(json_decode($seeker->target_employer_id), json_decode($opportunity->target_employer_id)))) {
                    $talent_points = $talent_points + $ratios[21]->talent_num;
                    $position_points = $position_points + $ratios[21]->position_num;
                }
            }

            $total_points = $talent_points + $position_points;
            $jsr_points = $total_points/2;

            $total_tsr = $ratios->sum('talent_num');
            $tsr_percent = ($talent_points * 100)/$total_tsr;

            $total_psr = $ratios->sum('position_num');
            $psr_percent = ($position_points * 100)/$total_psr;

            $total_percent = $tsr_percent + $psr_percent;
            $jsr_percent = $total_percent/2;

            JobStreamScore::where('user_id', $seeker->id)->where('job_id', $opportunity->id)->delete();  

            $score = new JobStreamScore();
            // $score->user_id = $user->id;
            // $score->company_id = $job->company_id;
            // $score->job_id = $job->id;
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