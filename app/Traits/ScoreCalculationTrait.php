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
use App\Models\LanguageUsage;
use App\Models\JobTitleUsage;
use App\Models\JobTitleCategoryUsage;
use App\Models\Notification;
use App\Models\CompanyActivity;

trait ScoreCalculationTrait
{

public function calculate($seeker,$opportunity)
    {
        $ratios = SuitabilityRatio::get();
        $tsr_percent = $psr_percent = 0;
        $tsr_score = $psr_score = 0;

        $matched_factors = [];

        // // 1 Location (checked)

        // if(is_null($opportunity->country_id) || is_null($seeker->country_id))
        // {   
        //     //empty data
        //     $tsr_score += $ratios[0]->talent_num;
        //     $psr_score += $ratios[0]->position_num;

        //     $tsr_percent += $ratios[0]->talent_percent;
        //     $psr_percent += $ratios[0]->position_percent;
        // }
        // elseif($opportunity->country_id == $seeker->country_id) 
        // {
        //     //match data
        //     $tsr_score += $ratios[0]->talent_num;
        //     $psr_score += $ratios[0]->position_num;

        //     $tsr_percent += $ratios[0]->talent_percent;
        //     $psr_percent += $ratios[0]->position_percent;

        //     $factor = "Location";
        //     array_push($matched_factors,$factor);
        // } 

        // // 2 Contract terms (checked)
        // if(is_null($seeker->contract_term_id) || is_null($opportunity->job_type_id))
        //     {
        //         // Data Empty
        //         $tsr_score += $ratios[1]->talent_num;
        //         $psr_score += $ratios[1]->position_num;

        //         $tsr_percent += $ratios[1]->talent_percent;
        //         $psr_percent += $ratios[1]->position_percent; 
        //     }
        // elseif(is_array(json_decode($seeker->contract_term_id)) && is_array(json_decode($opportunity->job_type_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->contract_term_id), json_decode($opportunity->job_type_id)))) 
        //         {
        //             // Data Match
        //             $tsr_score += $ratios[1]->talent_num;
        //             $psr_score += $ratios[1]->position_num;

        //             $tsr_percent += $ratios[1]->talent_percent;
        //             $psr_percent += $ratios[1]->position_percent;

        //             $factor = "Contract Terms";
        //             array_push($matched_factors,$factor);
        //         }
        //     }
            
        // // 3 Target pay (checked)

        // $is_null = false;
        // $fulltime_status = $parttime_status = $freelance_status = $target_status = false;
        // $fulltime_check = (is_null($seeker->full_time_salary) || is_null($opportunity->full_time_salary)) ?  true : false;
        // $parttime_check = (is_null($seeker->part_time_salary) || is_null($opportunity->part_time_salary)) ?  true : false;
        // $freelance_check = (is_null($seeker->freelance_salary) || is_null($opportunity->freelance_salary)) ?  true : false;
        // $target_check = (is_null($seeker->target_salary) || is_null($opportunity->salary_to)) ?  true : false;
        // $is_null = $fulltime_check && $parttime_check && $freelance_check && $target_check ?  true: false ;
        // if($is_null)
        // {
        //     // Data Empty
        //     $tsr_score += $ratios[2]->talent_num;
        //     $psr_score += $ratios[2]->position_num;

        //     $tsr_percent += $ratios[2]->talent_percent;
        //     $psr_percent += $ratios[2]->position_percent; 
        // }
        // elseif( (!is_null($opportunity->full_time_salary) && !is_null($seeker->full_time_salary) ) &&  $opportunity->full_time_salary >= $seeker->full_time_salary && $seeker->full_time_salary <= $opportunity->full_time_salary_max)
        // {
        //     // Fulltime Salry Match
        //     $fulltime_status = true;
        // }

        // elseif( (!is_null($opportunity->part_time_salary) && !is_null($seeker->part_time_salary) ) && $opportunity->part_time_salary >= $seeker->part_time_salary  && $seeker->part_time_salary <= $opportunity->part_time_salary_max)
        // {
        //     // Parttime Salry Match
        //     $parttime_status = true;
        // }

        // elseif((!is_null($opportunity->freelance_salary) && !is_null($seeker->freelance_salary)) && $opportunity->freelance_salary >= $seeker->freelance_salary  && $opportunity->freelance_salary <= $seeker->freelance_salary_max)
        // {
        //     // Freelance Salry Match
        //     $freelance_status = true;   
        // }

        // elseif((!is_null($opportunity->salary_to) && !is_null($seeker->target_salary)) && $opportunity->salary_to >= $seeker->target_salary )
        // {
        //     // Traget Salary Match
        //     $target_status = true;
        // }

        // if($fulltime_status || $parttime_status || $freelance_status || $target_status)
        // {
        //     // At Least One Match
        //     $tsr_score += $ratios[2]->talent_num;
        //     $psr_score += $ratios[2]->position_num;

        //     $tsr_percent += $ratios[2]->talent_percent;
        //     $psr_percent += $ratios[2]->position_percent;

        //     $factor = "Salary";
        //     array_push($matched_factors,$factor);
        // }
     

        // // 4 Contract hours (checked)

        // if(is_null($seeker->contract_hour_id) || is_null($opportunity->contract_hour_id))
        //     {
        //         // Data Empty
        //         $tsr_score += $ratios[3]->talent_num;
        //         $psr_score += $ratios[3]->position_num;

        //         $tsr_percent += $ratios[3]->talent_percent;
        //         $psr_percent += $ratios[3]->position_percent; 
        //     }
        // elseif(is_array(json_decode($seeker->contract_hour_id)) && is_array(json_decode($opportunity->contract_hour_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->contract_hour_id), json_decode($opportunity->contract_hour_id)))) 
        //         {
        //             // Data Match
        //             $tsr_score += $ratios[3]->talent_num;
        //             $psr_score += $ratios[3]->position_num;

        //             $tsr_percent += $ratios[3]->talent_percent;
        //             $psr_percent += $ratios[3]->position_percent;

        //             $factor = "Contract Hour";
        //             array_push($matched_factors,$factor);
        //         }
        //     }
        
        // // 5 Keywords (checked)

        // if(is_null($seeker->keyword_id) || is_null($opportunity->keyword_id))
        //     {
        //         // Data Empty
        //         $tsr_score += $ratios[4]->talent_num;
        //         $psr_score += $ratios[4]->position_num;

        //         $tsr_percent += $ratios[4]->talent_percent;
        //         $psr_percent += $ratios[4]->position_percent; 
        //     }
        // elseif(is_array(json_decode($seeker->keyword_id)) && is_array(json_decode($opportunity->keyword_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->keyword_id), json_decode($opportunity->keyword_id)))) 
        //         {
        //             // Data Match
        //             $tsr_score += $ratios[4]->talent_num;
        //             $psr_score += $ratios[4]->position_num;

        //             $tsr_percent += $ratios[4]->talent_percent;
        //             $psr_percent += $ratios[4]->position_percent;

        //             $factor = "Keyword";
        //             array_push($matched_factors,$factor);
        //         }
        //     }

        // // 6 Management level (checked)

        // if(is_null($opportunity->carrier_level_id) || is_null($seeker->management_level_id))
        // {
        //     // empty data
        //     $tsr_score += $ratios[5]->talent_num;
        //     $psr_score += $ratios[5]->position_num;

        //     $tsr_percent += $ratios[5]->talent_percent;
        //     $psr_percent += $ratios[5]->position_percent;
        // }
        // elseif($seeker->carrier->priority >= $opportunity->carrier->priority-1)
        // {   
        //     // match data
        //     $tsr_score += $ratios[5]->talent_num;
        //     $psr_score += $ratios[5]->position_num;

        //     $tsr_percent += $ratios[5]->talent_percent;
        //     $psr_percent += $ratios[5]->position_percent;

        //     $factor = "Management Level";
        //     array_push($matched_factors,$factor);
        // }
        
        // // 7 Years (checked)
        // if(is_null($opportunity->job_experience_id) || is_null($seeker->experience_id))
        // {   
        //     //empty data
        //     $tsr_score += $ratios[6]->talent_num;
        //     $psr_score += $ratios[6]->position_num;

        //     $tsr_percent += $ratios[6]->talent_percent;
        //     $psr_percent += $ratios[6]->position_percent;
        // }
        // elseif($seeker->jobExperience->priority >= $opportunity->jobExperience->priority) 
        // {
        //     //match data
        //     $tsr_score += $ratios[6]->talent_num;
        //     $psr_score += $ratios[6]->position_num;

        //     $tsr_percent += $ratios[6]->talent_percent;
        //     $psr_percent += $ratios[6]->position_percent;

        //     $factor = "Experience";
        //     array_push($matched_factors,$factor);
        // } 
        

        // // 8 Educational level (checked)
        // if(is_null($opportunity->degree_level_id) || is_null($seeker->education_level_id))
        // {
        //     //empty data
        //     $tsr_score += $ratios[7]->talent_num;
        //     $psr_score += $ratios[7]->position_num;

        //     $tsr_percent += $ratios[7]->talent_percent;
        //     $psr_percent += $ratios[7]->position_percent;
        // }
        // elseif($seeker->degree->priority  >= $opportunity->degree->priority ) 
        // {   
        //     //empty data
        //     $tsr_score += $ratios[7]->talent_num;
        //     $psr_score += $ratios[7]->position_num;

        //     $tsr_percent += $ratios[7]->talent_percent;
        //     $psr_percent += $ratios[7]->position_percent;

        //     $factor = "Education";
        //     array_push($matched_factors,$factor);

        // }
    

        // // 9 Academic institutions (checked)

        // if(is_null($seeker->institution_id) || is_null($opportunity->institution_id))
        //     {
        //         // Data Empty
        //         $tsr_score += $ratios[8]->talent_num;
        //         $psr_score += $ratios[8]->position_num;

        //         $tsr_percent += $ratios[8]->talent_percent;
        //         $psr_percent += $ratios[8]->position_percent; 
        //     }
        // elseif(is_array(json_decode($seeker->institution_id)) && is_array(json_decode($opportunity->institution_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->institution_id), json_decode($opportunity->institution_id)))) 
        //         {
        //             // Data Match
        //             $tsr_score += $ratios[8]->talent_num;
        //             $psr_score += $ratios[8]->position_num;

        //             $tsr_percent += $ratios[8]->talent_percent;
        //             $psr_percent += $ratios[8]->position_percent;

        //             $factor = "Academic Institution";
        //             array_push($matched_factors,$factor);
        //         }
        //     }
        
        // // 10 Languages (checked)

        // $seeker_languages = LanguageUsage::where('user_id',$seeker->id)->get();
        // $opportunity_languages = LanguageUsage::where('job_id',$opportunity->id)->get();

        // if( count($seeker_languages)== 0 || count($opportunity_languages)== 0 )
        //     {
        //         $tsr_score += $ratios[9]->talent_num;
        //         $psr_score += $ratios[9]->position_num;
        //         $tsr_percent += $ratios[9]->tsr_percent;
        //         $psr_percent += $ratios[9]->psr_percent;
        //     }
        // else 
        //     {
        //         foreach($seeker_languages as $seeker_language)
        //         {
        //             foreach($opportunity_languages as $opportunity_language)
        //             {
        //             if($seeker_language->language_id ==  $opportunity_language->language_id &&  $seeker_language->priority >= $opportunity_language->priority)
        //             {
        //                     $tsr_score += $ratios[9]->talent_num;
        //                     $psr_score += $ratios[9]->position_num;
        //                     $tsr_percent += $ratios[9]->tsr_percent;
        //                     $psr_percent += $ratios[9]->psr_percent;

        //                     $factor = "Language";
        //                     array_push($matched_factors,$factor);

        //                     break 2;
        //             }
        //             }
        //         }
        //     }
        
        // // 11 Geographic experience (checked)

        // if(is_null($seeker->geographical_id) || is_null($opportunity->geographical_id))
        //     {
        //         // Data Empty
        //         $tsr_score += $ratios[10]->talent_num;
        //         $psr_score += $ratios[10]->position_num;

        //         $tsr_percent += $ratios[10]->talent_percent;
        //         $psr_percent += $ratios[10]->position_percent; 
        //     }
        // elseif(is_array(json_decode($seeker->geographical_id)) && is_array(json_decode($opportunity->geographical_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->geographical_id), json_decode($opportunity->geographical_id)))) 
        //         {
        //             // Data Match
        //             $tsr_score += $ratios[10]->talent_num;
        //             $psr_score += $ratios[10]->position_num;

        //             $tsr_percent += $ratios[10]->talent_percent;
        //             $psr_percent += $ratios[10]->position_percent;

        //             $factor = "Geographic experience";
        //             array_push($matched_factors,$factor);
        //         }
        //     }
        
        // // 12 People management (checked)
 
        // if(is_null($opportunity->people_management) || is_null($seeker->people_management_id))
        // {
        //     // Data Empty
        //     $tsr_score += $ratios[11]->talent_num;
        //     $psr_score += $ratios[11]->position_num;

        //     $tsr_percent += $ratios[11]->talent_percent;
        //     $psr_percent += $ratios[11]->position_percent; 
        // }
        // elseif( $seeker->peopleManagementLevel->priority >= $opportunity->peopleManagementLevel->priority-1 )
        // {
        //     // Data Match
        //     $tsr_score += $ratios[11]->talent_num;
        //     $psr_score += $ratios[11]->position_num;

        //     $tsr_percent += $ratios[11]->talent_percent;
        //     $psr_percent += $ratios[11]->position_percent;

        //     $factor = "People Management Level";
        //     array_push($matched_factors,$factor);
        // }
       

        // // 13 Software & tech knowledge (checked)

        // if(is_null($seeker->skill_id) || is_null($opportunity->job_skill_id))
        //     {
        //         // Data Empty
        //         $tsr_score += $ratios[12]->talent_num;
        //         $psr_score += $ratios[12]->position_num;

        //         $tsr_percent += $ratios[12]->talent_percent;
        //         $psr_percent += $ratios[12]->position_percent; 
        //     }
        // elseif(is_array(json_decode($seeker->skill_id)) && is_array(json_decode($opportunity->job_skill_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->skill_id), json_decode($opportunity->job_skill_id)))) 
        //         {
        //             // Data Match
        //             $tsr_score += $ratios[12]->talent_num;
        //             $psr_score += $ratios[12]->position_num;

        //             $tsr_percent += $ratios[12]->talent_percent;
        //             $psr_percent += $ratios[12]->position_percent;

        //             $factor = "Skill";
        //             array_push($matched_factors,$factor);
        //         }
        //     }
        
        // // 14 Fields of study (checked)

        // if(is_null($seeker->field_study_id) || is_null($opportunity->field_study_id))
        //     {
        //         // Data Empty
        //         $tsr_score += $ratios[13]->talent_num;
        //         $psr_score += $ratios[13]->position_num;

        //         $tsr_percent += $ratios[13]->talent_percent;
        //         $psr_percent += $ratios[13]->position_percent; 
        //     }
        // elseif(is_array(json_decode($seeker->field_study_id)) && is_array(json_decode($opportunity->field_study_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->field_study_id), json_decode($opportunity->field_study_id)))) 
        //         {
        //             // Data Match
        //             $tsr_score += $ratios[13]->talent_num;
        //             $psr_score += $ratios[13]->position_num;

        //             $tsr_percent += $ratios[13]->talent_percent;
        //             $psr_percent += $ratios[13]->position_percent;

        //             $factor = "Fields of Study";
        //             array_push($matched_factors,$factor);
        //         }
        //     }
        
        // // 15 Qualifications & certifications (checked)

        // if(is_null($seeker->qualification_id) || is_null($opportunity->qualification_id))
        //     {
        //         // Data Empty
        //         $tsr_score += $ratios[14]->talent_num;
        //         $psr_score += $ratios[14]->position_num;

        //         $tsr_percent += $ratios[14]->talent_percent;
        //         $psr_percent += $ratios[14]->position_percent; 
        //     }
        // elseif(is_array(json_decode($seeker->qualification_id)) && is_array(json_decode($opportunity->qualification_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->qualification_id), json_decode($opportunity->qualification_id)))) 
        //         {
        //             // Data Match
        //             $tsr_score += $ratios[14]->talent_num;
        //             $psr_score += $ratios[14]->position_num;

        //             $tsr_percent += $ratios[14]->talent_percent;
        //             $psr_percent += $ratios[14]->position_percent;

        //             $factor = "Qualifications & Certifications";
        //             array_push($matched_factors,$factor);
        //         }
        //     }
        
        // // 16 Professional strengths (checked)

        // if(is_null($seeker->key_strength_id) || is_null($opportunity->key_strength_id))
        //     {
        //         // Data Empty
        //         $tsr_score += $ratios[15]->talent_num;
        //         $psr_score += $ratios[15]->position_num;

        //         $tsr_percent += $ratios[15]->talent_percent;
        //         $psr_percent += $ratios[15]->position_percent; 
        //     }
        // elseif(is_array(json_decode($seeker->key_strength_id)) && is_array(json_decode($opportunity->key_strength_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->key_strength_id), json_decode($opportunity->key_strength_id)))) 
        //         {
        //             // Data Match
        //             $tsr_score += $ratios[15]->talent_num;
        //             $psr_score += $ratios[15]->position_num;
        //             $tsr_percent += $ratios[15]->talent_percent;
        //             $psr_percent += $ratios[15]->position_percent;

        //             $factor = "Professional Strengths";
        //             array_push($matched_factors,$factor);
        //         }
        //     }
        
        // // 17 Position title (checked)

        // if(is_null($seeker->position_title_id) || is_null($opportunity->job_title_id))
        //     {
        //         // Data Empty
        //         $tsr_score += $ratios[16]->talent_num;
        //         $psr_score += $ratios[16]->position_num;

        //         $tsr_percent += $ratios[16]->talent_percent;
        //         $psr_percent += $ratios[16]->position_percent; 
        //     }
        //     elseif(is_array(json_decode($seeker->position_title_id)) && is_array(json_decode($opportunity->job_title_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->position_title_id), json_decode($opportunity->job_title_id)))) 
        //         {
        //             // Data Match (a) the position title of the listed position
        //             $tsr_score += $ratios[16]->talent_num;
        //             $psr_score += $ratios[16]->position_num;

        //             $tsr_percent += $ratios[16]->talent_percent;
        //             $psr_percent += $ratios[16]->position_percent;

        //             $factor = "Position Title";
        //             array_push($matched_factors,$factor);
        //         }

        //         else 
        //         {
        //             // Getting categories used by seeker
        //             $seeker_titles = JobTitleUsage::where('user_id',$seeker->id)->pluck('job_title_id')->toarray();
        //             $seeker_title_categories = [];

        //             foreach($seeker_titles as $seeker_title) 
        //             {
        //                 $category = JobTitleCategoryUsage::where('job_title_id',$seeker_title)->pluck('job_title_category_id')->toarray();
        //                 if(count($category)!=0)
        //                 {
        //                     $category_id = $category[0];
        //                     if(!in_array($category_id,$seeker_title_categories))
        //                     {
        //                         array_push($seeker_title_categories,$category_id);
        //                     }
        //                 }
        //             }
                    
        //             // Getting categories used by opportunity
        //             $opportunity_titles = JobTitleUsage::where('opportunity_id',$opportunity->id)->pluck('job_title_id')->toarray();
        //             $opportunity_title_categories = [];

        //             foreach($opportunity_titles as $opportunity_title) 
        //             {
        //                 $category = JobTitleCategoryUsage::where('job_title_id',$opportunity_title)->pluck('job_title_category_id')->toarray();
        //                 if(count($category) != 0)
        //                 {
        //                     $category_id = $category[0];
        //                     if(!in_array($category_id,$opportunity_title_categories))
        //                     {
        //                         array_push($opportunity_title_categories,$category_id);
        //                     }
        //                 }
                        
        //             }
                    
        //             if(!empty(array_intersect($seeker_title_categories, $opportunity_title_categories)))
        //             {
        //                 // Category Match (b) similar titles to the listed position
        //                 $tsr_score += $ratios[16]->talent_num;
        //                 $psr_score += $ratios[16]->position_num;

        //                 $tsr_percent += $ratios[16]->talent_percent;
        //                 $psr_percent += $ratios[16]->position_percent;

        //                 $factor = "Position Title";
        //                 array_push($matched_factors,$factor);
        //             }            
        //         }
        //     }
             
        //     // 18 Industry (checked)

        //     if (is_null($seeker->industry_id) || is_null($opportunity->industry_id)) {
        //         // Data Empty
        //         $tsr_score += $ratios[17]->talent_num;
        //         $psr_score += $ratios[17]->position_num;

        //         $tsr_percent += $ratios[17]->talent_percent;
        //         $psr_percent += $ratios[17]->position_percent;
        //     } elseif (is_array(json_decode($seeker->industry_id)) && is_array(json_decode($opportunity->industry_id))) {
        //         if (!empty(array_intersect(json_decode($seeker->industry_id), json_decode($opportunity->industry_id)))) {
        //             // Data Match
        //             $tsr_score += $ratios[17]->talent_num;
        //             $psr_score += $ratios[17]->position_num;

        //             $tsr_percent += $ratios[17]->talent_percent;
        //             $psr_percent += $ratios[17]->position_percent;

        //             $factor = "Industry";
        //             array_push($matched_factors,$factor);
        //         }
        //     }
        
        // // 19 Function (checked)

        // if(is_null($seeker->functional_area_id) || is_null($opportunity->functional_area_id))
        //     {
        //         // Data Empty
        //         $tsr_score += $ratios[18]->talent_num;
        //         $psr_score += $ratios[18]->position_num;

        //         $tsr_percent += $ratios[18]->talent_percent;
        //         $psr_percent += $ratios[18]->position_percent; 
        //     }
        // elseif(is_array(json_decode($seeker->functional_area_id)) && is_array(json_decode($opportunity->functional_area_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->functional_area_id), json_decode($opportunity->functional_area_id)))) 
        //         {
        //             // Data Match
        //             $tsr_score += $ratios[18]->talent_num;
        //             $psr_score += $ratios[18]->position_num;

        //             $tsr_percent += $ratios[18]->talent_percent;
        //             $psr_percent += $ratios[18]->position_percent;

        //             $factor = "Functional Area";
        //             array_push($matched_factors,$factor);
        //         }
        //     }
        
        // // 20 Target companies (checked)

        // $employment_history = EmploymentHistory::where('user_id',$seeker->id)->pluck('employer_id')->toArray();
        // $current_employer = $seeker->current_employer_id;
        // if(!in_array($current_employer,$employment_history)) array_push($employment_history,$current_employer);

        // if(is_null($opportunity->target_employer_id) || is_null($seeker->target_employer_id))
        // {
        //     // Empty Data for PSR
        //     $psr_percent += $ratios[19]->psr_percent;
        //     $psr_score += $ratios[18]->position_num;
        // } 
        // //For PSR 
        // elseif(is_array(json_decode($seeker->target_employer_id)))
        // {
        //     if(in_array($opportunity->company->id,json_decode($seeker->target_employer_id)))
        //     {
        //             $psr_percent += $ratios[19]->psr_percent;
        //             $psr_score += $ratios[18]->position_num;
        //             $factor = "Target Employer";
        //             array_push($matched_factors,$factor);
        //     }
        // }

        // if(is_null($opportunity->target_employer_id) || count($employment_history) == 0 )
        //         {
        //             // Empty Data for TSR
        //             $tsr_percent += $ratios[19]->tsr_percent;
        //             $tsr_score += $ratios[18]->talent_num;
        //         }
        // // For TSR
        // elseif(is_array(json_decode($opportunity->target_employer_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($opportunity->target_employer_id), $employment_history)))
        //         {
        //             $tsr_percent += $ratios[19]->tsr_percent;
        //             $tsr_score += $ratios[18]->talent_num;
        //             $factor = "Target Employer";
        //             if(!in_array($factor,$matched_factors)) array_push($matched_factors,$factor);
        //         }   
        //     }




        // 1 Location (checked)

        if(is_null($opportunity->country_id) || is_null($seeker->country_id))
        {   
            //empty data
            if(!is_null($opportunity->country_id))
            {
                $psr_score += $ratios[0]->position_num;
                $psr_percent += $ratios[0]->position_percent;         
            }
            if(!is_null($seeker->country_id)) {
                $tsr_score += $ratios[0]->talent_num;
                $tsr_percent += $ratios[0]->talent_percent;   
            }
        }
        elseif($opportunity->country_id == $seeker->country_id) 
        {
            //match data
            $tsr_score += $ratios[0]->talent_num;
            $psr_score += $ratios[0]->position_num;

            $tsr_percent += $ratios[0]->talent_percent;
            $psr_percent += $ratios[0]->position_percent;

            $factor = "Location";
            array_push($matched_factors,$factor);
        } 

        // 2 Contract terms (checked)
        if(is_null($seeker->contract_term_id) || is_null($opportunity->job_type_id))
            {
                // Data Empty
                if(!is_null($opportunity->job_type_id))
                {
                    $psr_score += $ratios[1]->position_num;
                    $psr_percent += $ratios[1]->position_percent; 
                }
                if(!is_null($seeker->contract_term_id)) {
                    $tsr_score += $ratios[1]->talent_num;
                    $tsr_percent += $ratios[1]->talent_percent;
                }
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

                    $factor = "Contract Terms";
                    array_push($matched_factors,$factor);
                }
            }
            
        // 3 Target pay (checked)

        $is_null = false;
        $fulltime_status = $parttime_status = $freelance_status = false;

        $fulltime_check = (is_null($seeker->full_time_salary) || (is_null($opportunity->full_time_salary) || is_null($opportunity->full_time_salary_max))) ?  true : false;
        $parttime_check = (is_null($seeker->part_time_salary) || (is_null($opportunity->part_time_salary) || is_null($opportunity->part_time_salary_max))) ?  true : false;
        $freelance_check = (is_null($seeker->freelance_salary) || (is_null($opportunity->freelance_salary) || is_null($opportunity->freelance_salary_max))) ?  true : false;
        $is_null = $fulltime_check && $parttime_check && $freelance_check ?  true: false ;
        
        if($is_null)
        {
            // Data Empty 
            if(!is_null($seeker->full_time_salary) && !is_null($seeker->part_time_salary) && !is_null($seeker->freelance_salary))
            {
                $tsr_score += $ratios[2]->talent_num;
                $tsr_percent += $ratios[2]->talent_percent;
            }
            if((!is_null($opportunity->full_time_salary) && !is_null($opportunity->full_time_salary_max)) || (!is_null($opportunity->part_time_salary) && !is_null($opportunity->part_time_salary_max)) || (!is_null($opportunity->freelance_salary) && !is_null($opportunity->freelance_salary_max)) )
            {
                $psr_percent += $ratios[2]->position_percent;
                $psr_score += $ratios[2]->position_num;
            }    
        }

        elseif((!is_null($opportunity->full_time_salary) &&  !is_null($seeker->full_time_salary) &&  !is_null($opportunity->full_time_salary_max)) && ($opportunity->full_time_salary >= $seeker->full_time_salary || $opportunity->full_time_salary <= $seeker->full_time_salary) && ($seeker->full_time_salary <= $opportunity->full_time_salary_max) )
        {
            // Fulltime Salry Match
            $fulltime_status = true;
        }

        elseif( (!is_null($opportunity->part_time_salary) && !is_null($seeker->part_time_salary) && !is_null($opportunity->part_time_salary_max) ) && ($opportunity->part_time_salary >= $seeker->part_time_salary || $opportunity->part_time_salary <= $seeker->part_time_salary)  && $seeker->part_time_salary <= $opportunity->part_time_salary_max)
        {
            // Parttime Salry Match
            $parttime_status = true;
        }

        elseif( (!is_null($opportunity->freelance_salary) && !is_null($seeker->freelance_salary) && !is_null($opportunity->freelance_salary_max)) && ($opportunity->freelance_salary >= $seeker->freelance_salary || $opportunity->freelance_salary <= $seeker->freelance_salary)   && $seeker->freelance_salary <= $opportunity->freelance_salary_max)
        {
            // Freelance Salry Match
            $freelance_status = true;  
        }

        if($fulltime_status || $parttime_status || $freelance_status )
        {
            // At Least One Match
            $tsr_score += $ratios[2]->talent_num;
            $psr_score += $ratios[2]->position_num;

            $tsr_percent += $ratios[2]->talent_percent;
            $psr_percent += $ratios[2]->position_percent;

            $factor = "Salary";
            array_push($matched_factors,$factor);
        }
     

        // 4 Contract hours (checked)

        if(is_null($seeker->contract_hour_id) || is_null($opportunity->contract_hour_id))
            {
                // Data Empty
                if(!is_null($opportunity->contract_hour_id))
                {
                    $psr_score += $ratios[3]->position_num;
                    $psr_percent += $ratios[3]->position_percent; 
                }
                if(!is_null($seeker->contract_hour_id)) {
                    $tsr_score += $ratios[3]->talent_num;
                    $tsr_percent += $ratios[3]->talent_percent;
                }
                
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

                    $factor = "Contract Hour";
                    array_push($matched_factors,$factor);
                }
            }
        
        // 5 Keywords (checked)

        if(is_null($seeker->keyword_id) || is_null($opportunity->keyword_id))
            {
                // Data Empty
                if(!is_null($opportunity->keyword_id))
                {
                    $psr_score += $ratios[4]->position_num;
                    $psr_percent += $ratios[4]->position_percent;
                }
                if(!is_null($seeker->keyword_id)) {
                    $tsr_score += $ratios[4]->talent_num;
                    $tsr_percent += $ratios[4]->talent_percent;
                } 
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

                    $factor = "Keyword";
                    array_push($matched_factors,$factor);
                }
            }

        // 6 Management level

        if(is_null($opportunity->carrier_level_id) || is_null($seeker->management_level_id))
        {
            // empty data
            if(!is_null($opportunity->carrier_level_id))
            {
                $psr_score += $ratios[5]->position_num;
                $psr_percent += $ratios[5]->position_percent;
            }
            else {
                $tsr_score += $ratios[5]->talent_num;
                $tsr_percent += $ratios[5]->talent_percent;
            } 
        }
        elseif($seeker->carrier->priority >= $opportunity->carrier->priority-1)
        {   
            // match data
            $tsr_score += $ratios[5]->talent_num;
            $psr_score += $ratios[5]->position_num;

            $tsr_percent += $ratios[5]->talent_percent;
            $psr_percent += $ratios[5]->position_percent;

            $factor = "Management Level";
            array_push($matched_factors,$factor);
        }
        
        // 7 Years 
        if(is_null($opportunity->job_experience_id) || is_null($seeker->experience_id))
        {   
            //empty data
            if(!is_null($opportunity->job_experience_id))
            {
                $psr_score += $ratios[6]->position_num;
                $psr_percent += $ratios[6]->position_percent;
            }
            else {
                $tsr_score += $ratios[6]->talent_num;
                $tsr_percent += $ratios[6]->talent_percent;
            }            
        }
        elseif($seeker->jobExperience->priority >= $opportunity->jobExperience->priority) 
        {
            //match data
            $tsr_score += $ratios[6]->talent_num;
            $psr_score += $ratios[6]->position_num;

            $tsr_percent += $ratios[6]->talent_percent;
            $psr_percent += $ratios[6]->position_percent;

            $factor = "Experience";
            array_push($matched_factors,$factor);
        } 
        

        // 8 Educational level
        if(is_null($opportunity->degree_level_id) || is_null($seeker->education_level_id))
        {
            //empty data

            if(!is_null($opportunity->degree_level_id))
            {
                $psr_score += $ratios[7]->position_num;
                $psr_percent += $ratios[7]->position_percent;
            }
            else {
                $tsr_score += $ratios[7]->talent_num;
                $tsr_percent += $ratios[7]->talent_percent;
            }
        }
        elseif($seeker->degree->priority  >= $opportunity->degree->priority ) 
        {   
            //empty data
            $tsr_score += $ratios[7]->talent_num;
            $psr_score += $ratios[7]->position_num;

            $tsr_percent += $ratios[7]->talent_percent;
            $psr_percent += $ratios[7]->position_percent;

            $factor = "Education";
            array_push($matched_factors,$factor);
        }
    

        // 9 Academic institutions 

        if(is_null($seeker->institution_id) || is_null($opportunity->institution_id))
            {
                // Data Empty
                if(!is_null($opportunity->institution_id))
                {
                    $psr_score += $ratios[8]->position_num;
                    $psr_percent += $ratios[8]->position_percent;
                }
                if(!is_null($seeker->institution_id)) {
                    $tsr_score += $ratios[8]->talent_num;
                    $tsr_percent += $ratios[8]->talent_percent;
                }  
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

                    $factor = "Academic Institution";
                    array_push($matched_factors,$factor);
                }
            }
        
        // 10 Languages

        // $seeker_languages = LanguageUsage::where('user_id',$seeker->id)->get();
        // $opportunity_languages = LanguageUsage::where('job_id',$opportunity->id)->get();

        // if( count($seeker_languages)== 0 || count($opportunity_languages)== 0 )
        //     {
        //         if(!is_null($opportunity))
        //         {
        //             $psr_score += $ratios[9]->position_num;
        //             $psr_percent += $ratios[9]->psr_percent;
        //         }
        //         else {
        //             $tsr_score += $ratios[9]->talent_num;
        //             $tsr_percent += $ratios[9]->tsr_percent;  
        //         }    
        //     }
        // else 
        //     {
        //         foreach($seeker_languages as $seeker_language)
        //         {
        //             foreach($opportunity_languages as $opportunity_language)
        //             {
        //             if($seeker_language->language_id ==  $opportunity_language->language_id &&  $seeker_language->priority >= $opportunity_language->priority)
        //             {
        //                     $tsr_score += $ratios[9]->talent_num;
        //                     $psr_score += $ratios[9]->position_num;
        //                     $tsr_percent += $ratios[9]->tsr_percent;
        //                     $psr_percent += $ratios[9]->psr_percent;

        //                     $factor = "Language";
        //                     array_push($matched_factors,$factor);

        //                     break 2;
        //             }
        //             }
        //         }
        //     }

        if(is_null($seeker->language_id) || is_null($opportunity->language_id))
            {
                // Data Empty
                if(!is_null($opportunity->language_id))
                {
                    $psr_score += $ratios[9]->position_num;
                    $psr_percent += $ratios[9]->position_percent; 
                }
                if(!is_null($seeker->language_id)) {
                    $tsr_score += $ratios[9]->talent_num;
                    $tsr_percent += $ratios[9]->talent_percent;
                }
                
            }
        else{

            $seeker_languages = json_decode($seeker->language_id);
            $seeker_levels = json_decode($seeker->language_level);
            $opportunity_languages = json_decode($opportunity->language_id);
            $opportunity_levels = json_decode($opportunity->language_level);

            foreach($seeker_languages as $skey => $seeker_language)
            {
                $seeker_language_priority = isset($seeker_levels[$skey]) ? $seeker_levels[$skey] : 1 ;
                foreach($opportunity_languages as $okey => $opportunity_language)
                {
                    $opportunity_language_priority = isset($opportunity_levels[$okey]) ? $opportunity_levels[$okey] : 1 ;
                    if($seeker_language ==  $opportunity_language &&  $seeker_language_priority >= $opportunity_language_priority)
                    {
                        $tsr_score += $ratios[9]->talent_num;
                        $psr_score += $ratios[9]->position_num;
                        $tsr_percent += $ratios[9]->talent_percent;
                        $psr_percent += $ratios[9]->position_percent;

                        $factor = "Language";
                        array_push($matched_factors,$factor);
                        break 2;
                    }
                }
            }

        }
        
        // 11 Geographic experience (checked)

        if(is_null($seeker->geographical_id) || is_null($opportunity->geographical_id))
            {
                // Data Empty

                if(!is_null($opportunity->geographical_id))
                {
                    $psr_score += $ratios[10]->position_num;
                    $psr_percent += $ratios[10]->position_percent; 
                }
                if(!is_null($seeker->geographical_id)) {
                    $tsr_score += $ratios[10]->talent_num;
                    $tsr_percent += $ratios[10]->talent_percent;
                }
                
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

                    $factor = "Geographic experience";
                    array_push($matched_factors,$factor);
                }
            }
        
        // 12 People management (checked)
 
        if(is_null($opportunity->people_management) || is_null($seeker->people_management_id))
        {
            // Data Empty

            if(!is_null($opportunity->people_management))
            {
                $psr_score += $ratios[11]->position_num;
                $psr_percent += $ratios[11]->position_percent; 
            }
            if(!is_null($seeker->people_management_id)) {
                $tsr_score += $ratios[11]->talent_num;
                $tsr_percent += $ratios[11]->talent_percent;
            }
            
        }
        elseif( $seeker->peopleManagementLevel->priority >= $opportunity->peopleManagementLevel->priority-1 )
        {
            // Data Match
            $tsr_score += $ratios[11]->talent_num;
            $psr_score += $ratios[11]->position_num;

            $tsr_percent += $ratios[11]->talent_percent;
            $psr_percent += $ratios[11]->position_percent;

            $factor = "People Management Level";
            array_push($matched_factors,$factor);
        }
       

        // 13 Software & tech knowledge (checked)

        if(is_null($seeker->skill_id) || is_null($opportunity->job_skill_id))
            {
                // Data Empty
                if(!is_null($opportunity->job_skill_id))
                {
                    $psr_score += $ratios[12]->position_num;
                    $psr_percent += $ratios[12]->position_percent;
                }
                if(!is_null($seeker->skill_id)) {
                }
                $tsr_score += $ratios[12]->talent_num;
                $tsr_percent += $ratios[12]->talent_percent;
                 
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

                    $factor = "Skill";
                    array_push($matched_factors,$factor);
                }
            }
        
        // 14 Fields of study (checked)

        if(is_null($seeker->field_study_id) || is_null($opportunity->field_study_id))
            {
                // Data Empty 
                if(!is_null($opportunity->field_study_id))
                {
                    $psr_score += $ratios[13]->position_num;
                    $psr_percent += $ratios[13]->position_percent; 
                }
                if(!is_null($seeker->field_study_id)) {
                    $tsr_score += $ratios[13]->talent_num;
                    $tsr_percent += $ratios[13]->talent_percent;
                }
                 
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

                    $factor = "Fields of Study";
                    array_push($matched_factors,$factor);
                }
            }
        
        // 15 Qualifications & certifications (checked)

        if(is_null($seeker->qualification_id) || is_null($opportunity->qualification_id))
            {
                // Data Empty
                if(!is_null($opportunity->qualification_id))
                {
                    $psr_score += $ratios[14]->position_num;
                    $psr_percent += $ratios[14]->position_percent; 
                }
                if(!is_null($seeker->qualification_id))  {
                    $tsr_score += $ratios[14]->talent_num;
                    $tsr_percent += $ratios[14]->talent_percent;
                }
    
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

                    $factor = "Qualifications & Certifications";
                    array_push($matched_factors,$factor);
                }
            }
        
        // 16 Professional strengths (checked)

        if(is_null($seeker->key_strength_id) || is_null($opportunity->key_strength_id))
            {
                // Data Empty
                if(!is_null($opportunity->key_strength_id))
                {
                    $psr_score += $ratios[15]->position_num;
                    $psr_percent += $ratios[15]->position_percent;
                }
                if(!is_null($seeker->key_strength_id)) {
                    $tsr_score += $ratios[15]->talent_num;
                    $tsr_percent += $ratios[15]->talent_percent;
                } 
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

                    $factor = "Professional Strengths";
                    array_push($matched_factors,$factor);
                }
            }
        
        // 17 Position title (checked)

        if(is_null($seeker->position_title_id) || is_null($opportunity->job_title_id))
            {
                // Data Empty

                if(!is_null($opportunity->job_title_id))
                {
                    $psr_score += $ratios[16]->position_num;
                    $psr_percent += $ratios[16]->position_percent; 
                }
                if(!is_null($seeker->position_title_id)) {
                    $tsr_score += $ratios[16]->talent_num;
                    $tsr_percent += $ratios[16]->talent_percent;
                }
                
            }
            elseif(is_array(json_decode($seeker->position_title_id)) && is_array(json_decode($opportunity->job_title_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->position_title_id), json_decode($opportunity->job_title_id)))) 
                {
                    // Data Match (a) the position title of the listed position
                    $tsr_score += $ratios[16]->talent_num;
                    $psr_score += $ratios[16]->position_num;

                    $tsr_percent += $ratios[16]->talent_percent;
                    $psr_percent += $ratios[16]->position_percent;

                    $factor = "Position Title";
                    array_push($matched_factors,$factor);
                }

                else 
                {
                    // Getting categories used by seeker
                    $seeker_titles = JobTitleUsage::where('user_id',$seeker->id)->pluck('job_title_id')->toarray();
                    $seeker_title_categories = [];

                    foreach($seeker_titles as $seeker_title) 
                    {
                        $category = JobTitleCategoryUsage::where('job_title_id',$seeker_title)->pluck('job_title_category_id')->toarray();
                        if(count($category)!=0)
                        {
                            $category_id = $category[0];
                            if(!in_array($category_id,$seeker_title_categories))
                            {
                                array_push($seeker_title_categories,$category_id);
                            }
                        }
                    }
                    
                    // Getting categories used by opportunity
                    $opportunity_titles = JobTitleUsage::where('opportunity_id',$opportunity->id)->pluck('job_title_id')->toarray();
                    $opportunity_title_categories = [];

                    foreach($opportunity_titles as $opportunity_title) 
                    {
                        $category = JobTitleCategoryUsage::where('job_title_id',$opportunity_title)->pluck('job_title_category_id')->toarray();
                        if(count($category) != 0)
                        {
                            $category_id = $category[0];
                            if(!in_array($category_id,$opportunity_title_categories))
                            {
                                array_push($opportunity_title_categories,$category_id);
                            }
                        }
                        
                    }
                    
                    if(!empty(array_intersect($seeker_title_categories, $opportunity_title_categories)))
                    {
                        // Category Match (b) similar titles to the listed position
                        $tsr_score += $ratios[16]->talent_num;
                        $psr_score += $ratios[16]->position_num;

                        $tsr_percent += $ratios[16]->talent_percent;
                        $psr_percent += $ratios[16]->position_percent;

                        $factor = "Position Title";
                        array_push($matched_factors,$factor);
                    }            
                }
            }
             
            // 18 Industry (checked)

            if (is_null($seeker->industry_id) || is_null($opportunity->industry_id)) {
                // Data Empty
                if(!is_null($opportunity->industry_id))
                {
                    $psr_score += $ratios[17]->position_num;
                    $psr_percent += $ratios[17]->position_percent;
                }
                if(!is_null($seeker->industry_id)) {
                    $tsr_score += $ratios[17]->talent_num;
                    $tsr_percent += $ratios[17]->talent_percent;
                } 
                
            } elseif (is_array(json_decode($seeker->industry_id)) && is_array(json_decode($opportunity->industry_id))) {
                if (!empty(array_intersect(json_decode($seeker->industry_id), json_decode($opportunity->industry_id)))) {
                    // Data Match
                    $tsr_score += $ratios[17]->talent_num;
                    $psr_score += $ratios[17]->position_num;

                    $tsr_percent += $ratios[17]->talent_percent;
                    $psr_percent += $ratios[17]->position_percent;

                    $factor = "Industry";
                    array_push($matched_factors,$factor);
                }
            }
        
        // 19 Function (checked)

        if(is_null($seeker->functional_area_id) || is_null($opportunity->functional_area_id))
            {
                // Data Empty
                if(!is_null($opportunity->functional_area_id))
                {
                    $psr_score += $ratios[18]->position_num;
                    $psr_percent += $ratios[18]->position_percent; 
                }
                if(!is_null($seeker->functional_area_id)) {
                    $tsr_score += $ratios[18]->talent_num;
                    $tsr_percent += $ratios[18]->talent_percent;
                }
    
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

                    $factor = "Functional Area";
                    array_push($matched_factors,$factor);
                }
            }
        
        // 20 Target companies (checked)

        // $employment_history = EmploymentHistory::where('user_id',$seeker->id)->pluck('employer_id')->toArray();
        // $current_employer = $seeker->current_employer_id;
        // if(!in_array($current_employer,$employment_history)) array_push($employment_history,$current_employer);

        // if(is_null($opportunity->target_employer_id) || is_null($seeker->target_employer_id))
        // {
        //     // Empty Data for PSR
        //     $psr_percent += $ratios[19]->psr_percent;
        //     $psr_score += $ratios[19]->position_num;
        // } 
        // //For PSR 
        // elseif(is_array(json_decode($seeker->target_employer_id)))
        // {
        //     if(in_array($opportunity->company->id,json_decode($seeker->target_employer_id)))
        //     {
        //             $psr_percent += $ratios[19]->psr_percent;
        //             $psr_score += $ratios[19]->position_num;
        //             $factor = "Target Employer";
        //             array_push($matched_factors,$factor);
        //     }
        // }

        // if(is_null($opportunity->target_employer_id) || count($employment_history) == 0 )
        // {
        //     // Empty Data for TSR
        //     $tsr_percent += $ratios[19]->tsr_percent;
        //     $tsr_score += $ratios[19]->talent_num;
        // }
        // // For TSR
        // elseif(is_array(json_decode($opportunity->target_employer_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($opportunity->target_employer_id), $employment_history)))
        //         {
        //             $tsr_percent += $ratios[19]->tsr_percent;
        //             $tsr_score += $ratios[19]->talent_num;
        //             $factor = "Target Employer";
        //             if(!in_array($factor,$matched_factors)) array_push($matched_factors,$factor);
        //         }   
        //     }
        $talent_current = is_null($seeker->current_employer_id) ? [] : [$seeker->current_employer_id];
        $talent_previous = EmploymentHistory::where('user_id',$seeker->id)->pluck('employer_id')->toArray();
        $talent_employees = array_merge($talent_current,$talent_previous);
        $talent_targets = is_null($seeker->target_employer_id) ? [] : json_decode($seeker->target_employer_id);

        $opportunity_targets = is_null($opportunity->target_employer_id) ? [] : json_decode($opportunity->target_employer_id);


        if((is_null($seeker->target_employer_id) && is_null($seeker->current_employer_id) &&  is_null($talent_previous)) || (is_null($opportunity->target_employer_id) && is_null($opportunity->company_id) ))
        {
            // Data Empty
            if(!(is_null($opportunity->target_employer_id) && is_null($opportunity->company_id) ))
            {
                $psr_score += $ratios[19]->position_num;
                $psr_percent += $ratios[19]->position_percent; 
            }
            if(!(is_null($seeker->target_employer_id) && is_null($seeker->current_employer_id) &&  is_null($talent_previous))) {
                $tsr_score += $ratios[19]->talent_num;
                $tsr_percent += $ratios[19]->talent_percent;
            }
        }
        else
        {
            $status = false;
            if ((!empty(array_intersect($talent_employees,$opportunity_targets))) && (!empty(array_intersect($talent_targets,[$opportunity->company_id]))) )
            {
                // Both match
                $tsr_percent += $ratios[19]->talent_percent;
                $tsr_score += $ratios[19]->talent_num;
                $psr_score += $ratios[19]->position_num;
                $psr_percent += $ratios[19]->position_percent; 
                $factor = "Target Employer";
                array_push($matched_factors,$factor);
                $status = true; 
            }

            if(!empty(array_intersect($talent_employees,$opportunity_targets)) && $status != true) 
            {
                // Employer Target Employee match to Talent's Employee Same 
                $psr_score += $ratios[19]->position_num;
                $psr_percent += $ratios[19]->position_percent;
            }
            $talent_targets == NULL ? $talent_targets = [] : '';
            if(!empty(array_intersect($talent_targets,[$opportunity->company_id])) && $status != true)
            {
                // Talent target employer match to Employer
                $tsr_percent += $ratios[19]->talent_percent;
                $tsr_score += $ratios[19]->talent_num;
            }
        }
        
        // Calculation 
        $jsr_score = ($tsr_score + $psr_score)/2;
        $jsr_percent = ($tsr_percent + $psr_percent)/2;
        $jsr_percent = round($jsr_percent, 1);
        
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
        if($matched_factors != 0) 
        $score->matched_factors = json_encode($matched_factors);
        $score->listing_date = $opportunity->created_at;
        $score->is_active =  $opportunity->is_active ? $opportunity->is_active : true ;
        $score->save();

        if( $jsr_percent>80 || ($jsr_percent>70 && $seeker->is_featured) || ($jsr_percent>70 && $opportunity->company->is_featured))
        {
            $user = User::where('id',$seeker->id)->first();
            $user->num_impressions += 1;
            $user->num_opportunities_presented +=1;
            $user->save();
            $activity = new CompanyActivity();
            $activity->company_id = $opportunity->company->id;
            $activity->impression = true;
            $activity->save();

            $count =Notification::where('candidate_id',$seeker->id)->where('corporate_id',$opportunity->company->id)->where('opportunity_id',$opportunity->id)->count();
            if($count  == 0)
            {
                $notification = new Notification();
                $notification->corporate_id = $opportunity->company->id;
                $notification->candidate_id = $seeker->id;
                $notification->opportunity_id = $opportunity->id;
                $notification->save();
            }
            
        }

    }

}