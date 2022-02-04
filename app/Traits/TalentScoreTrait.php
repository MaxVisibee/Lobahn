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
use App\Models\JobTitle;
use App\Models\EmploymentHistory;

trait TalentScoreTrait
{
    public function addTalentScore($seeker)
    {
        $opportunities = Opportunity::get();
        foreach($opportunities as $opportunity)
        {

        $ratios = SuitabilityRatio::get();
        $tsr_percent = $psr_percent = 0;
        $tsr_score = $psr_score = 0;

        // 1 Location (checked)
        if(is_null($seeker->country_id) || is_null($opportunity->country_id))
            {
                // Data Empty
                $tsr_score += $ratios[0]->talent_num;
                $psr_score += $ratios[0]->position_num;

                $tsr_percent += $ratios[0]->talent_percent;
                $psr_percent += $ratios[0]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->country_id)) && is_array(json_decode($opportunity->country_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->country_id), json_decode($opportunity->country_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[0]->talent_num;
                    $psr_score += $ratios[0]->position_num;

                    $tsr_percent += $ratios[0]->talent_percent;
                    $psr_percent += $ratios[0]->position_percent;
                }
            }

        // 2 Contract terms (checked)
        if(is_null($seeker->contract_term_id) || is_null($opportunity->job_type_id))
            {
                // Data Empty
                $tsr_score += $ratios[1]->talent_num;
                $psr_score += $ratios[1]->position_num;

                $tsr_percent += $ratios[1]->talent_percent;
                $psr_percent += $ratios[1]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->contract_term_id)) && is_array(json_decode($opportunity->job_type_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->contract_term_id), json_decode($opportunity->job_type_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[1]->talent_num;
                    $psr_score += $ratios[1]->position_num;

                    $tsr_percent += $ratios[1]->talent_percent;
                    $psr_percent += $ratios[1]->position_percent;
                }
            }
            
        // 3 Target pay (checked)

        $is_null = false;
        $fulltime_status = $parttime_status = $freelance_status = $target_status = false;
        $fulltime_check = (is_null($seeker->full_time_salary) || is_null($opportunity->full_time_salary)) ?  true : false;
        $parttime_check = (is_null($seeker->part_time_salary) || is_null($opportunity->part_time_salary)) ?  true : false;
        $freelance_check = (is_null($seeker->freelance_salary) || is_null($opportunity->freelance_salary)) ?  true : false;
        $target_check = (is_null($seeker->target_salary) || is_null($opportunity->salary_to)) ?  true : false;
        $is_null = $fulltime_check && $parttime_check && $freelance_check && $target_check ?  true: false ;
        if($is_null)
        {
            // Data Empty
            $tsr_score += $ratios[2]->talent_num;
            $psr_score += $ratios[2]->position_num;

            $tsr_percent += $ratios[2]->talent_percent;
            $psr_percent += $ratios[2]->position_percent; 
        }
        elseif( (!is_null($opportunity->full_time_salary) && !is_null($seeker->full_time_salary) ) &&  $opportunity->full_time_salary >= $seeker->full_time_salary )
        {
            // Fulltime Salry Match
            $fulltime_status = true;
        }

        elseif( (!is_null($opportunity->part_time_salary) && !is_null($seeker->part_time_salary) ) && $opportunity->part_time_salary >= $seeker->part_time_salary )
        {
            // Parttime Salry Match
            $parttime_status = true;
        }

        elseif((!is_null($opportunity->freelance_salary) && !is_null($seeker->freelance_salary)) && $opportunity->freelance_salary >= $seeker->freelance_salary )
        {
            // Freelance Salry Match
            $freelance_status = true;   
        }

        elseif((!is_null($opportunity->salary_to) && !is_null($seeker->target_salary)) && $opportunity->salary_to >= $seeker->target_salary )
        {
            // Traget Salary Match
            $target_status = true;
        }

        if($fulltime_status || $parttime_status || $freelance_status || $target_status)
        {
            // At Least One Match
            $tsr_score += $ratios[2]->talent_num;
            $psr_score += $ratios[2]->position_num;

            $tsr_percent += $ratios[2]->talent_percent;
            $psr_percent += $ratios[2]->position_percent;
        }
     

        // 4 Contract hours (checked)

        if(is_null($seeker->contract_hour_id) || is_null($opportunity->contract_hour_id))
            {
                // Data Empty
                $tsr_score += $ratios[3]->talent_num;
                $psr_score += $ratios[3]->position_num;

                $tsr_percent += $ratios[3]->talent_percent;
                $psr_percent += $ratios[3]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->contract_hour_id)) && is_array(json_decode($opportunity->contract_hour_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->contract_hour_id), json_decode($opportunity->contract_hour_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[3]->talent_num;
                    $psr_score += $ratios[3]->position_num;

                    $tsr_percent += $ratios[3]->talent_percent;
                    $psr_percent += $ratios[3]->position_percent;
                }
            }
        
        // 5 Keywords (checked)

        if(is_null($seeker->keyword_id) || is_null($opportunity->keyword_id))
            {
                // Data Empty
                $tsr_score += $ratios[4]->talent_num;
                $psr_score += $ratios[4]->position_num;

                $tsr_percent += $ratios[4]->talent_percent;
                $psr_percent += $ratios[4]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->keyword_id)) && is_array(json_decode($opportunity->keyword_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->keyword_id), json_decode($opportunity->keyword_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[4]->talent_num;
                    $psr_score += $ratios[4]->position_num;

                    $tsr_percent += $ratios[4]->talent_percent;
                    $psr_percent += $ratios[4]->position_percent;
                }
            }

        // 6 Management level (checked)

        if(is_null($opportunity->carrier_level_id) || is_null($seeker->management_level_id))
        {
            // empty data
            $tsr_score += $ratios[5]->talent_num;
            $psr_score += $ratios[5]->position_num;

            $tsr_percent += $ratios[5]->talent_percent;
            $psr_percent += $ratios[5]->position_percent;
        }
        elseif($seeker->carrier->priority >= $opportunity->carrier->priority-1)
        {   
            // match data
            $tsr_score += $ratios[5]->talent_num;
            $psr_score += $ratios[5]->position_num;

            $tsr_percent += $ratios[5]->talent_percent;
            $psr_percent += $ratios[5]->position_percent;
        }
        
        // 7 Years (checked)
        if(is_null($opportunity->job_experience_id) || is_null($seeker->experience_id))
        {   
            //empty data
            $tsr_score += $ratios[6]->talent_num;
            $psr_score += $ratios[6]->position_num;

            $tsr_percent += $ratios[6]->talent_percent;
            $psr_percent += $ratios[6]->position_percent;
        }
        elseif($seeker->jobExperience->priority >= $opportunity->jobExperience->priority) 
        {
            //match data
            $tsr_score += $ratios[6]->talent_num;
            $psr_score += $ratios[6]->position_num;

            $tsr_percent += $ratios[6]->talent_percent;
            $psr_percent += $ratios[6]->position_percent;
        } 
        

        // 8 Educational level (checked)
        if(is_null($opportunity->job_experience_id) || is_null($seeker->experience_id))
        {
            //empty data
            $tsr_score += $ratios[7]->talent_num;
            $psr_score += $ratios[7]->position_num;

            $tsr_percent += $ratios[7]->talent_percent;
            $psr_percent += $ratios[7]->position_percent;
        }
        elseif($seeker->degree->priority  >= $opportunity->degree->priority ) 
        {   
            //empty data
            $tsr_score += $ratios[7]->talent_num;
            $psr_score += $ratios[7]->position_num;

            $tsr_percent += $ratios[7]->talent_percent;
            $psr_percent += $ratios[7]->position_percent;

        }
    

        // 9 Academic institutions (checked)

        if(is_null($seeker->institution_id) || is_null($opportunity->institution_id))
            {
                // Data Empty
                $tsr_score += $ratios[8]->talent_num;
                $psr_score += $ratios[8]->position_num;

                $tsr_percent += $ratios[8]->talent_percent;
                $psr_percent += $ratios[8]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->institution_id)) && is_array(json_decode($opportunity->institution_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->institution_id), json_decode($opportunity->institution_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[8]->talent_num;
                    $psr_score += $ratios[8]->position_num;

                    $tsr_percent += $ratios[8]->talent_percent;
                    $psr_percent += $ratios[8]->position_percent;
                }
            }
        
        // 10 Languages

        if( is_null($seeker->languages) || is_null($opportunity->language ) )
        {
                $tsr_score += $ratios[9]->talent_num;
                $psr_score += $ratios[9]->position_num;
                $tsr_percent += $ratios[9]->tsr_percent;
                $psr_percent += $ratios[9]->psr_percent;
        }
        else {
                foreach($seeker->languages as $seeker_language)
                {
                    foreach($opportunity->language as $opportunity_language)
                    {
                        if($seeker_language->language_id ==  $opportunity_language->language_id &&  $seeker_language->level->priority >= $opportunity_language->level->priority)
                        {
                            $tsr_score += $ratios[9]->talent_num;
                            $psr_score += $ratios[9]->position_num;
                            $tsr_percent += $ratios[9]->tsr_percent;
                            $psr_percent += $ratios[9]->psr_percent;
                            break 2;
                        }
                    }
                }
        }
        
        // 11 Geographic experience (checked)

        if(is_null($seeker->geographical_id) || is_null($opportunity->geographical_id))
            {
                // Data Empty
                $tsr_score += $ratios[10]->talent_num;
                $psr_score += $ratios[10]->position_num;

                $tsr_percent += $ratios[10]->talent_percent;
                $psr_percent += $ratios[10]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->geographical_id)) && is_array(json_decode($opportunity->geographical_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->geographical_id), json_decode($opportunity->geographical_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[10]->talent_num;
                    $psr_score += $ratios[10]->position_num;

                    $tsr_percent += $ratios[10]->talent_percent;
                    $psr_percent += $ratios[10]->position_percent;
                }
            }
        
        // 12 People management (checked)
 
        if(is_null($opportunity->people_management) || is_null($seeker->people_management_id))
        {
            // Data Empty
            $tsr_score += $ratios[11]->talent_num;
            $psr_score += $ratios[11]->position_num;

            $tsr_percent += $ratios[11]->talent_percent;
            $psr_percent += $ratios[11]->position_percent; 
        }
        elseif( $seeker->peopleManagementLevel->priority >= $opportunity->peopleManagementLevel->priority-1 )
        {
            // Data Match
            $tsr_score += $ratios[11]->talent_num;
            $psr_score += $ratios[11]->position_num;

            $tsr_percent += $ratios[11]->talent_percent;
            $psr_percent += $ratios[11]->position_percent;
        }
       

        // 13 Software & tech knowledge (checked)

        if(is_null($seeker->skill_id) || is_null($opportunity->job_skill_id))
            {
                // Data Empty
                $tsr_score += $ratios[12]->talent_num;
                $psr_score += $ratios[12]->position_num;

                $tsr_percent += $ratios[12]->talent_percent;
                $psr_percent += $ratios[12]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->skill_id)) && is_array(json_decode($opportunity->job_skill_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->skill_id), json_decode($opportunity->job_skill_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[12]->talent_num;
                    $psr_score += $ratios[12]->position_num;

                    $tsr_percent += $ratios[12]->talent_percent;
                    $psr_percent += $ratios[12]->position_percent;
                }
            }
        
        // 14 Fields of study (checked)

        if(is_null($seeker->field_study_id) || is_null($opportunity->field_study_id))
            {
                // Data Empty
                $tsr_score += $ratios[13]->talent_num;
                $psr_score += $ratios[13]->position_num;

                $tsr_percent += $ratios[13]->talent_percent;
                $psr_percent += $ratios[13]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->field_study_id)) && is_array(json_decode($opportunity->field_study_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->field_study_id), json_decode($opportunity->field_study_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[13]->talent_num;
                    $psr_score += $ratios[13]->position_num;

                    $tsr_percent += $ratios[13]->talent_percent;
                    $psr_percent += $ratios[13]->position_percent;
                }
            }
        
        // 15 Qualifications & certifications (checked)

        if(is_null($seeker->qualification_id) || is_null($opportunity->qualification_id))
            {
                // Data Empty
                $tsr_score += $ratios[14]->talent_num;
                $psr_score += $ratios[14]->position_num;

                $tsr_percent += $ratios[14]->talent_percent;
                $psr_percent += $ratios[14]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->qualification_id)) && is_array(json_decode($opportunity->qualification_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->qualification_id), json_decode($opportunity->qualification_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[14]->talent_num;
                    $psr_score += $ratios[14]->position_num;

                    $tsr_percent += $ratios[14]->talent_percent;
                    $psr_percent += $ratios[14]->position_percent;
                }
            }
        
        // 16 Professional strengths (checked)

        if(is_null($seeker->key_strength_id) || is_null($opportunity->key_strength_id))
            {
                // Data Empty
                $tsr_score += $ratios[15]->talent_num;
                $psr_score += $ratios[15]->position_num;

                $tsr_percent += $ratios[15]->talent_percent;
                $psr_percent += $ratios[15]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->key_strength_id)) && is_array(json_decode($opportunity->key_strength_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->key_strength_id), json_decode($opportunity->key_strength_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[15]->talent_num;
                    $psr_score += $ratios[15]->position_num;
                    $tsr_percent += $ratios[15]->talent_percent;
                    $psr_percent += $ratios[15]->position_percent;
                }
            }
        
        // 17 Position title

        if(is_null($seeker->position_title_id) || is_null($opportunity->job_title_id))
            {
                // Data Empty
                $tsr_score += $ratios[16]->talent_num;
                $psr_score += $ratios[16]->position_num;

                $tsr_percent += $ratios[16]->talent_percent;
                $psr_percent += $ratios[16]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->position_title_id)) && is_array(json_decode($opportunity->job_title_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->position_title_id), json_decode($opportunity->job_title_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[16]->talent_num;
                    $psr_score += $ratios[16]->position_num;

                    $tsr_percent += $ratios[16]->talent_percent;
                    $psr_percent += $ratios[16]->position_percent;
                }
            }
        
        
        // 18 Industry (checked)

        if(is_null($seeker->industry_id) || is_null($opportunity->industry_id))
            {
                // Data Empty
                $tsr_score += $ratios[17]->talent_num;
                $psr_score += $ratios[17]->position_num;

                $tsr_percent += $ratios[17]->talent_percent;
                $psr_percent += $ratios[17]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->industry_id)) && is_array(json_decode($opportunity->industry_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->industry_id), json_decode($opportunity->industry_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[17]->talent_num;
                    $psr_score += $ratios[17]->position_num;

                    $tsr_percent += $ratios[17]->talent_percent;
                    $psr_percent += $ratios[17]->position_percent;
                }
            }
        
        // 19 Function (checked)

        if(is_null($seeker->functional_area_id) || is_null($opportunity->functional_area_id))
            {
                // Data Empty
                $tsr_score += $ratios[18]->talent_num;
                $psr_score += $ratios[18]->position_num;

                $tsr_percent += $ratios[18]->talent_percent;
                $psr_percent += $ratios[18]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->functional_area_id)) && is_array(json_decode($opportunity->functional_area_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->functional_area_id), json_decode($opportunity->functional_area_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[18]->talent_num;
                    $psr_score += $ratios[18]->position_num;

                    $tsr_percent += $ratios[18]->talent_percent;
                    $psr_percent += $ratios[18]->position_percent;
                }
            }
        
        // 20 Target companies

        $employment_history = EmploymentHistory::where('user_id',$seeker->id)->pluck('employer_id')->toArray();
        $current_employer = $seeker->current_employer_id;
        if(!in_array($current_employer,$employment_history)) array_push($employment_history,$current_employer);

        if(is_null($opportunity->target_employer_id))
        {
            // Empty Data for PSR
            $psr_percent += $ratios[19]->psr_percent;
            $psr_score += $ratios[18]->position_num;
        } 
        //For PSR 
        elseif(is_array(json_decode($seeker->target_employer_id)))
        {
            if(in_array($opportunity->company->id,json_decode($seeker->target_employer_id)))
            {
                $psr_percent += $ratios[19]->psr_percent;
                $psr_score += $ratios[18]->position_num;
            }
        }

        if(count($employment_history) == 0 )
        {
            // Empty Data for TSR
            $tsr_percent += $ratios[19]->tsr_percent;
            $tsr_score += $ratios[18]->talent_num;
        }
        // For TSR
        elseif(is_array(json_decode($opportunity->target_employer_id)) &&  !empty(array_intersect(json_decode($opportunity->target_employer_id), $employment_history)))
        {
            $tsr_percent += $ratios[19]->tsr_percent;
            $tsr_score += $ratios[18]->talent_num;
        }
        

        // Calculation 
        $jsr_score = ($tsr_score + $psr_score)/2;
        $jsr_percent = ($tsr_percent + $psr_percent)/2;
        
        JobStreamScore::where('user_id', $seeker->id)->where('job_id', $opportunity->id)->delete();  
        $score = new JobStreamScore();
        $score->job_id = $opportunity->id;
        $score->user_id = $seeker->id;
        $score->company_id = $opportunity->company_id;            
        $score->tsr_score = $tsr_score;
        $score->psr_score = $psr_score;
        $score->jsr_score = $jsr_score;
        $score->tsr_percent = $tsr_percent;
        $score->psr_percent = $psr_percent;
        $score->jsr_percent = $jsr_percent; 
        $score->save();

        }
    }

    public function addJobTalentScore($opportunity){

        $seekers = User::get();
        foreach($seekers as $seeker)
        {

        $ratios = SuitabilityRatio::get();
        $tsr_percent = $psr_percent = 0;
        $tsr_score = $psr_score = 0;

        // 1 Location (checked)
        if(is_null($seeker->country_id) || is_null($opportunity->country_id))
            {
                // Data Empty
                $tsr_score += $ratios[0]->talent_num;
                $psr_score += $ratios[0]->position_num;

                $tsr_percent += $ratios[0]->talent_percent;
                $psr_percent += $ratios[0]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->country_id)) && is_array(json_decode($opportunity->country_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->country_id), json_decode($opportunity->country_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[0]->talent_num;
                    $psr_score += $ratios[0]->position_num;

                    $tsr_percent += $ratios[0]->talent_percent;
                    $psr_percent += $ratios[0]->position_percent;
                }
            }

        // 2 Contract terms (checked)
        if(is_null($seeker->contract_term_id) || is_null($opportunity->job_type_id))
            {
                // Data Empty
                $tsr_score += $ratios[1]->talent_num;
                $psr_score += $ratios[1]->position_num;

                $tsr_percent += $ratios[1]->talent_percent;
                $psr_percent += $ratios[1]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->contract_term_id)) && is_array(json_decode($opportunity->job_type_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->contract_term_id), json_decode($opportunity->job_type_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[1]->talent_num;
                    $psr_score += $ratios[1]->position_num;

                    $tsr_percent += $ratios[1]->talent_percent;
                    $psr_percent += $ratios[1]->position_percent;
                }
            }
            
        // 3 Target pay (checked)

        $is_null = false;
        $fulltime_status = $parttime_status = $freelance_status = $target_status = false;
        $fulltime_check = (is_null($seeker->full_time_salary) || is_null($opportunity->full_time_salary)) ?  true : false;
        $parttime_check = (is_null($seeker->part_time_salary) || is_null($opportunity->part_time_salary)) ?  true : false;
        $freelance_check = (is_null($seeker->freelance_salary) || is_null($opportunity->freelance_salary)) ?  true : false;
        $target_check = (is_null($seeker->target_salary) || is_null($opportunity->salary_to)) ?  true : false;
        $is_null = $fulltime_check && $parttime_check && $freelance_check && $target_check ?  true: false ;
        if($is_null)
        {
            // Data Empty
            $tsr_score += $ratios[2]->talent_num;
            $psr_score += $ratios[2]->position_num;

            $tsr_percent += $ratios[2]->talent_percent;
            $psr_percent += $ratios[2]->position_percent; 
        }
        elseif( (!is_null($opportunity->full_time_salary) && !is_null($seeker->full_time_salary) ) &&  $opportunity->full_time_salary >= $seeker->full_time_salary )
        {
            // Fulltime Salry Match
            $fulltime_status = true;
        }

        elseif( (!is_null($opportunity->part_time_salary) && !is_null($seeker->part_time_salary) ) && $opportunity->part_time_salary >= $seeker->part_time_salary )
        {
            // Parttime Salry Match
            $parttime_status = true;
        }

        elseif((!is_null($opportunity->freelance_salary) && !is_null($seeker->freelance_salary)) && $opportunity->freelance_salary >= $seeker->freelance_salary )
        {
            // Freelance Salry Match
            $freelance_status = true;   
        }

        elseif((!is_null($opportunity->salary_to) && !is_null($seeker->target_salary)) && $opportunity->salary_to >= $seeker->target_salary )
        {
            // Traget Salary Match
            $target_status = true;
        }

        if($fulltime_status || $parttime_status || $freelance_status || $target_status)
        {
            // At Least One Match
            $tsr_score += $ratios[2]->talent_num;
            $psr_score += $ratios[2]->position_num;

            $tsr_percent += $ratios[2]->talent_percent;
            $psr_percent += $ratios[2]->position_percent;
        }
     

        // 4 Contract hours (checked)

        if(is_null($seeker->contract_hour_id) || is_null($opportunity->contract_hour_id))
            {
                // Data Empty
                $tsr_score += $ratios[3]->talent_num;
                $psr_score += $ratios[3]->position_num;

                $tsr_percent += $ratios[3]->talent_percent;
                $psr_percent += $ratios[3]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->contract_hour_id)) && is_array(json_decode($opportunity->contract_hour_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->contract_hour_id), json_decode($opportunity->contract_hour_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[3]->talent_num;
                    $psr_score += $ratios[3]->position_num;

                    $tsr_percent += $ratios[3]->talent_percent;
                    $psr_percent += $ratios[3]->position_percent;
                }
            }
        
        // 5 Keywords (checked)

        if(is_null($seeker->keyword_id) || is_null($opportunity->keyword_id))
            {
                // Data Empty
                $tsr_score += $ratios[4]->talent_num;
                $psr_score += $ratios[4]->position_num;

                $tsr_percent += $ratios[4]->talent_percent;
                $psr_percent += $ratios[4]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->keyword_id)) && is_array(json_decode($opportunity->keyword_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->keyword_id), json_decode($opportunity->keyword_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[4]->talent_num;
                    $psr_score += $ratios[4]->position_num;

                    $tsr_percent += $ratios[4]->talent_percent;
                    $psr_percent += $ratios[4]->position_percent;
                }
            }

        // 6 Management level (checked)

        if(is_null($opportunity->carrier_level_id) || is_null($seeker->management_level_id))
        {
            // empty data
            $tsr_score += $ratios[5]->talent_num;
            $psr_score += $ratios[5]->position_num;

            $tsr_percent += $ratios[5]->talent_percent;
            $psr_percent += $ratios[5]->position_percent;
        }
        elseif($seeker->carrier->priority >= $opportunity->carrier->priority-1)
        {   
            // match data
            $tsr_score += $ratios[5]->talent_num;
            $psr_score += $ratios[5]->position_num;

            $tsr_percent += $ratios[5]->talent_percent;
            $psr_percent += $ratios[5]->position_percent;
        }
        
        // 7 Years (checked)
        if(is_null($opportunity->job_experience_id) || is_null($seeker->experience_id))
        {   
            //empty data
            $tsr_score += $ratios[6]->talent_num;
            $psr_score += $ratios[6]->position_num;

            $tsr_percent += $ratios[6]->talent_percent;
            $psr_percent += $ratios[6]->position_percent;
        }
        elseif($seeker->jobExperience->priority >= $opportunity->jobExperience->priority) 
        {
            //match data
            $tsr_score += $ratios[6]->talent_num;
            $psr_score += $ratios[6]->position_num;

            $tsr_percent += $ratios[6]->talent_percent;
            $psr_percent += $ratios[6]->position_percent;
        } 
        

        // 8 Educational level (checked)
        if(is_null($opportunity->job_experience_id) || is_null($seeker->experience_id))
        {
            //empty data
            $tsr_score += $ratios[7]->talent_num;
            $psr_score += $ratios[7]->position_num;

            $tsr_percent += $ratios[7]->talent_percent;
            $psr_percent += $ratios[7]->position_percent;
        }
        elseif($seeker->degree->priority  >= $opportunity->degree->priority ) 
        {   
            //empty data
            $tsr_score += $ratios[7]->talent_num;
            $psr_score += $ratios[7]->position_num;

            $tsr_percent += $ratios[7]->talent_percent;
            $psr_percent += $ratios[7]->position_percent;

        }
    

        // 9 Academic institutions (checked)

        if(is_null($seeker->institution_id) || is_null($opportunity->institution_id))
            {
                // Data Empty
                $tsr_score += $ratios[8]->talent_num;
                $psr_score += $ratios[8]->position_num;

                $tsr_percent += $ratios[8]->talent_percent;
                $psr_percent += $ratios[8]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->institution_id)) && is_array(json_decode($opportunity->institution_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->institution_id), json_decode($opportunity->institution_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[8]->talent_num;
                    $psr_score += $ratios[8]->position_num;

                    $tsr_percent += $ratios[8]->talent_percent;
                    $psr_percent += $ratios[8]->position_percent;
                }
            }
        
        // 10 Languages

        if( is_null($seeker->languages) || is_null($opportunity->language ) )
        {
                $tsr_score += $ratios[9]->talent_num;
                $psr_score += $ratios[9]->position_num;
                $tsr_percent += $ratios[9]->tsr_percent;
                $psr_percent += $ratios[9]->psr_percent;
        }
        else {
                foreach($seeker->languages as $seeker_language)
                {
                    foreach($opportunity->language as $opportunity_language)
                    {
                        if($seeker_language->language_id ==  $opportunity_language->language_id &&  $seeker_language->level->priority >= $opportunity_language->level->priority)
                        {
                            $tsr_score += $ratios[9]->talent_num;
                            $psr_score += $ratios[9]->position_num;
                            $tsr_percent += $ratios[9]->tsr_percent;
                            $psr_percent += $ratios[9]->psr_percent;
                            break 2;
                        }
                    }
                }
        }
        
        // 11 Geographic experience (checked)

        if(is_null($seeker->geographical_id) || is_null($opportunity->geographical_id))
            {
                // Data Empty
                $tsr_score += $ratios[10]->talent_num;
                $psr_score += $ratios[10]->position_num;

                $tsr_percent += $ratios[10]->talent_percent;
                $psr_percent += $ratios[10]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->geographical_id)) && is_array(json_decode($opportunity->geographical_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->geographical_id), json_decode($opportunity->geographical_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[10]->talent_num;
                    $psr_score += $ratios[10]->position_num;

                    $tsr_percent += $ratios[10]->talent_percent;
                    $psr_percent += $ratios[10]->position_percent;
                }
            }
        
        // 12 People management (checked)
 
        if(is_null($opportunity->people_management) || is_null($seeker->people_management_id))
        {
            // Data Empty
            $tsr_score += $ratios[11]->talent_num;
            $psr_score += $ratios[11]->position_num;

            $tsr_percent += $ratios[11]->talent_percent;
            $psr_percent += $ratios[11]->position_percent; 
        }
        elseif( $seeker->peopleManagementLevel->priority >= $opportunity->peopleManagementLevel->priority-1 )
        {
            // Data Match
            $tsr_score += $ratios[11]->talent_num;
            $psr_score += $ratios[11]->position_num;

            $tsr_percent += $ratios[11]->talent_percent;
            $psr_percent += $ratios[11]->position_percent;
        }
       

        // 13 Software & tech knowledge (checked)

        if(is_null($seeker->skill_id) || is_null($opportunity->job_skill_id))
            {
                // Data Empty
                $tsr_score += $ratios[12]->talent_num;
                $psr_score += $ratios[12]->position_num;

                $tsr_percent += $ratios[12]->talent_percent;
                $psr_percent += $ratios[12]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->skill_id)) && is_array(json_decode($opportunity->job_skill_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->skill_id), json_decode($opportunity->job_skill_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[12]->talent_num;
                    $psr_score += $ratios[12]->position_num;

                    $tsr_percent += $ratios[12]->talent_percent;
                    $psr_percent += $ratios[12]->position_percent;
                }
            }
        
        // 14 Fields of study (checked)

        if(is_null($seeker->field_study_id) || is_null($opportunity->field_study_id))
            {
                // Data Empty
                $tsr_score += $ratios[13]->talent_num;
                $psr_score += $ratios[13]->position_num;

                $tsr_percent += $ratios[13]->talent_percent;
                $psr_percent += $ratios[13]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->field_study_id)) && is_array(json_decode($opportunity->field_study_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->field_study_id), json_decode($opportunity->field_study_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[13]->talent_num;
                    $psr_score += $ratios[13]->position_num;

                    $tsr_percent += $ratios[13]->talent_percent;
                    $psr_percent += $ratios[13]->position_percent;
                }
            }
        
        // 15 Qualifications & certifications (checked)

        if(is_null($seeker->qualification_id) || is_null($opportunity->qualification_id))
            {
                // Data Empty
                $tsr_score += $ratios[14]->talent_num;
                $psr_score += $ratios[14]->position_num;

                $tsr_percent += $ratios[14]->talent_percent;
                $psr_percent += $ratios[14]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->qualification_id)) && is_array(json_decode($opportunity->qualification_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->qualification_id), json_decode($opportunity->qualification_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[14]->talent_num;
                    $psr_score += $ratios[14]->position_num;

                    $tsr_percent += $ratios[14]->talent_percent;
                    $psr_percent += $ratios[14]->position_percent;
                }
            }
        
        // 16 Professional strengths (checked)

        if(is_null($seeker->key_strength_id) || is_null($opportunity->key_strength_id))
            {
                // Data Empty
                $tsr_score += $ratios[15]->talent_num;
                $psr_score += $ratios[15]->position_num;

                $tsr_percent += $ratios[15]->talent_percent;
                $psr_percent += $ratios[15]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->key_strength_id)) && is_array(json_decode($opportunity->key_strength_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->key_strength_id), json_decode($opportunity->key_strength_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[15]->talent_num;
                    $psr_score += $ratios[15]->position_num;
                    $tsr_percent += $ratios[15]->talent_percent;
                    $psr_percent += $ratios[15]->position_percent;
                }
            }
        
        // 17 Position title

        if(is_null($seeker->position_title_id) || is_null($opportunity->job_title_id))
            {
                // Data Empty
                $tsr_score += $ratios[16]->talent_num;
                $psr_score += $ratios[16]->position_num;

                $tsr_percent += $ratios[16]->talent_percent;
                $psr_percent += $ratios[16]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->position_title_id)) && is_array(json_decode($opportunity->job_title_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->position_title_id), json_decode($opportunity->job_title_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[16]->talent_num;
                    $psr_score += $ratios[16]->position_num;

                    $tsr_percent += $ratios[16]->talent_percent;
                    $psr_percent += $ratios[16]->position_percent;
                }
            }
        
        
        // 18 Industry (checked)

        if(is_null($seeker->industry_id) || is_null($opportunity->industry_id))
            {
                // Data Empty
                $tsr_score += $ratios[17]->talent_num;
                $psr_score += $ratios[17]->position_num;

                $tsr_percent += $ratios[17]->talent_percent;
                $psr_percent += $ratios[17]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->industry_id)) && is_array(json_decode($opportunity->industry_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->industry_id), json_decode($opportunity->industry_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[17]->talent_num;
                    $psr_score += $ratios[17]->position_num;

                    $tsr_percent += $ratios[17]->talent_percent;
                    $psr_percent += $ratios[17]->position_percent;
                }
            }
        
        // 19 Function (checked)

        if(is_null($seeker->functional_area_id) || is_null($opportunity->functional_area_id))
            {
                // Data Empty
                $tsr_score += $ratios[18]->talent_num;
                $psr_score += $ratios[18]->position_num;

                $tsr_percent += $ratios[18]->talent_percent;
                $psr_percent += $ratios[18]->position_percent; 
            }
        elseif(is_array(json_decode($seeker->functional_area_id)) && is_array(json_decode($opportunity->functional_area_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->functional_area_id), json_decode($opportunity->functional_area_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[18]->talent_num;
                    $psr_score += $ratios[18]->position_num;

                    $tsr_percent += $ratios[18]->talent_percent;
                    $psr_percent += $ratios[18]->position_percent;
                }
            }
        
        // 20 Target companies

        $employment_history = EmploymentHistory::where('user_id',$seeker->id)->pluck('employer_id')->toArray();
        $current_employer = $seeker->current_employer_id;
        if(!in_array($current_employer,$employment_history)) array_push($employment_history,$current_employer);

        if(is_null($opportunity->target_employer_id))
        {
            // Empty Data for PSR
            $psr_percent += $ratios[19]->psr_percent;
            $psr_score += $ratios[18]->position_num;
        } 
        //For PSR 
        elseif(is_array(json_decode($seeker->target_employer_id)))
        {
            if(in_array($opportunity->company->id,json_decode($seeker->target_employer_id)))
            {
                $psr_percent += $ratios[19]->psr_percent;
                $psr_score += $ratios[18]->position_num;
            }
        }

        if(count($employment_history) == 0 )
        {
            // Empty Data for TSR
            $tsr_percent += $ratios[19]->tsr_percent;
            $tsr_score += $ratios[18]->talent_num;
        }
        // For TSR
        elseif(is_array(json_decode($opportunity->target_employer_id)) &&  !empty(array_intersect(json_decode($opportunity->target_employer_id), $employment_history)))
        {
            $tsr_percent += $ratios[19]->tsr_percent;
            $tsr_score += $ratios[18]->talent_num;
        }
        

        // Calculation 
        $jsr_score = ($tsr_score + $psr_score)/2;
        $jsr_percent = ($tsr_percent + $psr_percent)/2;
        
        JobStreamScore::where('user_id', $seeker->id)->where('job_id', $opportunity->id)->delete();  
        $score = new JobStreamScore();
        $score->job_id = $opportunity->id;
        $score->user_id = $seeker->id;
        $score->company_id = $opportunity->company_id;            
        $score->tsr_score = $tsr_score;
        $score->psr_score = $psr_score;
        $score->jsr_score = $jsr_score;
        $score->tsr_percent = $tsr_percent;
        $score->psr_percent = $psr_percent;
        $score->jsr_percent = $jsr_percent; 
        $score->save();

        }
    } 
}