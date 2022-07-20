<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Opportunity;
use App\Models\Country;
use App\Models\JobType;
use App\Models\JobShift;
use App\Models\Keyword;
use App\Models\CarrierLevel;
use App\Models\JobExperience;
use App\Models\EducationHistroy;
use App\Models\DegreeLevel;
use App\Models\Institution;
use App\Models\Geographical;
use App\Models\PeopleManagementLevel;
use App\Models\JobSkill;
use App\Models\StudyField;
use App\Models\Qualification;
use App\Models\KeyStrength;
use App\Models\JobTitle;
use App\Models\Industry;
use App\Models\Language;
use App\Models\LanguageLevel;
use App\Models\FunctionalArea;
use App\Models\TargetCompany;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function candidates()
    {
        $candidates = User::where('is_active',1)->get();
        return response()->json('candidates',$candidates);
    }

    public function candidate($id)
    {
        $user = User::find($id);

        $candidate = [];
        $candidate['name'] = $user->name;

        if($user->country_id)
        $candidate['country'] = Country::find($user->country_id)->country_name;
        else 
        $candidate['country'] = '-';

        if(!is_null($user->contract_term_id))
        {
            $contract_terms  = json_decode($user->contract_term_id);
            $contract_terms_text = '';

            foreach($contract_terms as $contract_term)
            {
                $obj = JobType::find($contract_term);
                if($obj)
                {
                    $contract_terms_text .= $obj->job_type;
                    $contract_terms_text .= " , ";
                } 
            }
        }
        else $contract_terms_text = '-';
        $candidate['contract_terms'] = $contract_terms_text;

        if($user->full_time_salary)
        $candidate['full_time_salary'] = $user->full_time_salary;
        else 
        $candidate['full_time_salary'] = '-';

        if($user->part_time_salary)
        $candidate['part_time_salary'] = $user->part_time_salary;
        else 
        $candidate['part_time_salary'] = '-';

        if($user->freelance_salary)
        $candidate['freelance_salary'] = $user->freelance_salary;
        else 
        $candidate['freelance_salary'] = '-';


        if(!is_null($user->contract_hour_id))
        {
            $contract_hours  = json_decode($user->contract_hour_id);
            $contract_hours_text = '';

            foreach($contract_hours as $contract_term)
            {
                $obj = JobShift::find($contract_term);
                if($obj)
                {
                    $contract_hours_text .= $obj->job_shift;
                    $contract_hours_text .= " , ";
                }
            }
        }
        else $contract_hours_text = '-';
        $candidate['contract_hours'] = $contract_hours_text;

        if(!is_null($user->keyword_id))
        {
            $keywords  = json_decode($user->keyword_id);
            $keywords_text = '';

            foreach($keywords as $keyword)
            {
                $obj = Keyword::find($keyword);
                if($obj)
                {
                    $keywords_text .= $obj->keyword_name;
                    $keywords_text .= " , ";
                }
            }
        }
        else $keywords_text = '-';
        $candidate['keywords'] = $keywords_text;

        if($user->management_level_id)
        $candidate['management'] = CarrierLevel::find($user->management_level_id)->carrier_level;
        else 
        $candidate['management'] = '-';

        if($user->experience_id)
        $candidate['experience'] = JobExperience::find($user->experience_id)->job_experience;
        else 
        $candidate['experience'] = '-';

        if($user->education_level_id)
        $candidate['education'] = DegreeLevel::find($user->education_level_id)->degree_name;
        else 
        $candidate['education'] = '-';

        if(!is_null($user->institution_id))
        {
            $institutions  = json_decode($user->institution_id);
            $institutions_text = '';

            foreach($institutions as $institution)
            {
                $obj = Institution::find($institution);
                if($obj)
                {
                    $institutions_text .= $obj->institution_name;
                    $institutions_text .= " , ";
                }
            }
        }
        else $institutions_text = '-';
        $candidate['institutions'] = $institutions_text;

        if(!is_null($user->language_id))
        {
            $languages  = json_decode($user->language_id);
            $languages_text = '';

            foreach($languages as $key=>$language)
            {
                $levels = json_decode($user->language_level);
                $obj = Language::find($language);
                if($obj)
                {
                    $language = $obj->language_name;
                    $level = "Basic";
                    if(count($levels)>$key)
                    {
                        $level_obj = LanguageLevel::find($levels[$key]);
                        if($level_obj)
                        $level = $level_obj->level;
                    }
                    $languages_text .= $language.' ('.$level.') , ';
                }
            }
        }
        else $languages_text = '-';
        $candidate['languages'] = $languages_text;

        if(!is_null($user->geographical_id))
        {
            $geographicals  = json_decode($user->geographical_id);
            $geographicals_text = '';

            foreach($geographicals as $geographical)
            {
                $obj = Geographical::find($geographical);
                if($obj)
                {
                    $geographicals_text .= $obj->geographical_name;
                    $geographicals_text .= " , ";
                }
            }
        }
        else $geographicals_text = '-';
        $candidate['geographicals'] = $geographicals_text;

        if($user->people_management_id)
        $candidate['peop_manangement'] = PeopleManagementLevel::find($user->people_management_id)->level;
        else 
        $candidate['peop_manangement'] = '-';

        if(!is_null($user->skill_id))
        {
            $skills  = json_decode($user->skill_id);
            $skills_text = '';

            foreach($skills as $skill)
            {
                $obj = JobSkill::find($skill);
                if($obj)
                {
                    $skills_text .= $obj->job_skill;
                    $skills_text .= " , ";
                }
            }
        }
        else $skills_text = '-';
        $candidate['skills'] = $skills_text;

        if(!is_null($user->field_study_id))
        {
            $fields  = json_decode($user->field_study_id);
            $fields_text = '';

            foreach($fields as $field)
            {
                $obj = StudyField::find($field);
                if($obj)
                {
                    $fields_text .= $obj->study_field_name;
                    $fields_text .= " , ";
                }   
            }
        }
        else $fields_text = '-';
        $candidate['fields'] = $fields_text;

        if(!is_null($user->qualification_id))
        {
            $qualifications  = json_decode($user->qualification_id);
            $qualifications_text = '';

            foreach($qualifications as $qualification)
            {
                $obj = Qualification::find($qualification);
                if($obj)
                {
                    $qualifications_text .= $obj->qualification_name;
                    $qualifications_text .= " , ";
                }
            }
        }
        else $qualifications_text = '-';
        $candidate['qualifications'] = $qualifications_text;

        if(!is_null($user->key_strength_id))
        {
            $keystrengths  = json_decode($user->key_strength_id);
            $keystrengths_text = '';

            foreach($keystrengths as $keystrength)
            {
                $obj = KeyStrength::find($keystrength);
                if($obj)
                {
                    $keystrengths_text .= $obj->key_strength_name;
                    $keystrengths_text .= " , "; 
                }
            }
        }
        else $keystrengths_text = '-';
        $candidate['keystrengths'] = $keystrengths_text;

        if(!is_null($user->position_title_id))
        {
            $positions  = json_decode($user->position_title_id);
            $positions_text = '';

            foreach($positions as $position)
            {
                $obj = JobTitle::find($position);
                if($obj)
                {
                    $positions_text .= $obj->job_title;
                    $positions_text .= " , ";
                }
                
            }
        }
        else $positions_text = '-';
        $candidate['positions'] = $positions_text;

        if(!is_null($user->industry_id))
        {
            $industries  = json_decode($user->industry_id);
            $industries_text = '';

            foreach($industries as $industry)
            {
                $obj = Industry::find($industry);
                if($obj)
                {
                    $industries_text .= $obj->industry_name;
                    $industries_text .= " , ";
                }
            }
        }
        else $industries_text = '-';
        $candidate['industries'] = $industries_text;

        if(!is_null($user->functional_area_id))
        {
            $functions  = json_decode($user->functional_area_id);
            $functions_text = '';

            foreach($functions as $function)
            {
                $obj = FunctionalArea::find($function);
                $functions_text .= $obj->area_name;
                $functions_text .= " , ";
            }
        }
        else $functions_text = '-';
        $candidate['functions'] = $functions_text;

        if(!is_null($user->target_employer_id))
        {
            $employers  = json_decode($user->target_employer_id);
            $employers_text = '';

            foreach($employers as $employer)
            {
                $obj = TargetCompany::find($employer);
                if($obj)
                {
                    $employers_text .= $obj->company_name;
                    $employers_text .= " , ";
                }
            }
        }
        else $employers_text = '-';
        $candidate['target_employers'] = $employers_text;


        return response()->json(['candidate'=>$candidate,'user'=>$user]);
    }

    public function opportunites()
    {
        $opportunities = Opportunity::where('is_active',1)->get();
        return response()->json('opportunites',$opportunities);
    }

    public function opportunity($id)
    {
        $opp = Opportunity::find($id);
        $opportunity = [];
        $opportunity['name'] = is_null($opp->title) ? '-' : $opp->title;
        $opportunity['country'] = '-';
        if($opp->country_id)
        {
            $country = Country::find($opp->country_id);
            if($country)
            $opportunity['country'] = $country->country_name; 
        }
        
        if(!is_null($opp->job_type_id))
        {
            $contract_terms  = json_decode($opp->job_type_id);
            $contract_terms_text = '';

            foreach($contract_terms as $contract_term)
            {
                $obj =JobType::find($contract_term);
                if($obj)
                {
                    $contract_terms_text .= $obj->job_type;
                    $contract_terms_text .= " , ";
                }
            }
        }
        else $contract_terms_text = '-';
        $opportunity['contract_terms'] = $contract_terms_text;

        if($opp->full_time_salary)
        $opportunity['full_time_salary'] = $opp->full_time_salary;
        else 
        $opportunity['full_time_salary'] = '-';

        if($opp->full_time_salary_max)
        $opportunity['full_time_salary_max'] = $opp->full_time_salary_max;
        else 
        $opportunity['full_time_salary_max'] = '-';

        if($opp->part_time_salary)
        $opportunity['part_time_salary'] = $opp->part_time_salary;
        else 
        $opportunity['part_time_salary'] = '-';

        if($opp->part_time_salary_max)
        $opportunity['part_time_salary_max'] = $opp->part_time_salary_max;
        else 
        $opportunity['part_time_salary_max'] = '-';

        if($opp->freelance_salary)
        $opportunity['freelance_salary'] = $opp->freelance_salary;
        else 
        $opportunity['freelance_salary'] = '-';

        if($opp->freelance_salary_max)
        $opportunity['freelance_salary_max'] = $opp->freelance_salary_max;
        else 
        $opportunity['freelance_salary_max'] = '-';

        if(!is_null($opp->contract_hour_id))
        {
            $contract_hours  = json_decode($opp->contract_hour_id);
            $contract_hours_text = '';

            foreach($contract_hours as $contract_term)
            {
                $obj = JobShift::find($contract_term);
                if($obj)
                {
                    $contract_hours_text .= $obj->job_shift;
                    $contract_hours_text .= " , ";
                }
            }
        }
        else $contract_hours_text = '-';
        $opportunity['contract_hours'] = $contract_hours_text;

        if(!is_null($opp->keyword_id))
        {
            $keywords  = json_decode($opp->keyword_id);
            $keywords_text = '';

            foreach($keywords as $keyword)
            {
                $obj = Keyword::find($keyword);
                if($obj)
                {
                    $keywords_text .= $obj->keyword_name;
                    $keywords_text .= " , ";
                }
            }
        }
        else $keywords_text = '-';
        $opportunity['keywords'] = $keywords_text;

        if($opp->carrier_level_id)
        $opportunity['management'] = CarrierLevel::find($opp->carrier_level_id)->carrier_level;
        else 
        $opportunity['management'] = '-';

        if($opp->job_experience_id)
        $opportunity['experience'] = JobExperience::find($opp->job_experience_id)->job_experience;
        else 
        $opportunity['experience'] = '-';

        if($opp->degree_level_id)
        $opportunity['education'] = DegreeLevel::find($opp->degree_level_id)->degree_name;
        else 
        $opportunity['education'] = '-';

        if(!is_null($opp->institution_id))
        {
            $institutions  = json_decode($opp->institution_id);
            $institutions_text = '';

            foreach($institutions as $institution)
            {
                $obj = Institution::find($institution);
                if($obj)
                {
                    $institutions_text .= $obj->institution_name;
                    $institutions_text .= " , ";
                }
            }
        }
        else $institutions_text = '-';
        $opportunity['institutions'] = $institutions_text;

        if(!is_null($opp->language_id))
        {
            $languages  = json_decode($opp->language_id);
            $languages_text = '';

            foreach($languages as $key=>$language)
            {
                $obj = Language::find($language);
                if($obj)
                {
                    $levels = json_decode($opp->language_level);
                    $language = $obj->language_name;
                    $level = "Basic";
                    if(count($levels)>$key)
                    {
                        $level_obj = LanguageLevel::find($levels[$key]);
                        if($level_obj)
                        $level = $level_obj->level;
                    }
                    // $level_obj = LanguageLevel::find($levels[$key]);
                    // if($level_obj)
                    // $level = $level_obj->level;
                    // else 
                    // $level = "Basic";
                    $languages_text .= $language.' ('.$level.') , ';
                }
            }
        }
        else $languages_text = '-';
        $opportunity['languages'] = $languages_text;

        if(!is_null($opp->geographical_id))
        {
            $geographicals  = json_decode($opp->geographical_id);
            $geographicals_text = '';

            foreach($geographicals as $geographical)
            {
                $obj = Geographical::find($geographical);
                if($obj)
                {
                    $geographicals_text .= $obj->geographical_name;
                    $geographicals_text .= " , ";
                } 
            }
        }
        else $geographicals_text = '-';
        $opportunity['geographicals'] = $geographicals_text;

        if($opp->people_management)
        $opportunity['peop_manangement'] = PeopleManagementLevel::find($opp->people_management)->level;
        else 
        $opportunity['peop_manangement'] = '-';

        if(!is_null($opp->job_skill_id))
        {
            $skills  = json_decode($opp->job_skill_id);
            $skills_text = '';

            foreach($skills as $skill)
            {
                $obj = JobSkill::find($skill);
                if($obj)
                {
                    $skills_text .= $obj->job_skill;
                    $skills_text .= " , ";
                } 
            }
        }
        else $skills_text = '-';
        $opportunity['skills'] = $skills_text;

        if(!is_null($opp->field_study_id))
        {
            $fields  = json_decode($opp->field_study_id);
            $fields_text = '';

            foreach($fields as $field)
            {
                $obj = StudyField::find($field);
                if($obj)
                {
                    $fields_text .= $obj->study_field_name;
                    $fields_text .= " , ";
                }
            }
        }
        else $fields_text = '-';
        $opportunity['fields'] = $fields_text;

        if(!is_null($opp->qualification_id))
        {
            $qualifications  = json_decode($opp->qualification_id);
            $qualifications_text = '';

            foreach($qualifications as $qualification)
            {
                $obj = Qualification::find($qualification);
                if($obj)
                {
                    $qualifications_text .= $obj->qualification_name;
                    $qualifications_text .= " , ";
                }
            }
        }
        else $qualifications_text = '-';
        $opportunity['qualifications'] = $qualifications_text;

        if(!is_null($opp->key_strength_id))
        {
            $keystrengths  = json_decode($opp->key_strength_id);
            $keystrengths_text = '';

            foreach($keystrengths as $keystrength)
            {
                $obj = KeyStrength::find($keystrength);
                if($obj)
                {
                    $keystrengths_text .= $obj->key_strength_name;
                    $keystrengths_text .= " , ";
                }
            }
        }
        else $keystrengths_text = '-';
        $opportunity['keystrengths'] = $keystrengths_text;

        if(!is_null($opp->job_title_id))
        {
            $positions  = json_decode($opp->job_title_id);
            $positions_text = '';

            foreach($positions as $position)
            {
                $obj = JobTitle::find($position);
                if($obj)
                {
                    $positions_text .= $obj->job_title;
                    $positions_text .= " , ";
                }
            }
        }
        else $positions_text = '-';
        $opportunity['positions'] = $positions_text;

        if(!is_null($opp->industry_id))
        {
            $industries  = json_decode($opp->industry_id);
            $industries_text = '';

            foreach($industries as $industry)
            {
                $obj = Industry::find($industry);
                if($obj)
                {
                    $industries_text .= $obj->industry_name;
                    $industries_text .= " , ";
                }
            }
        }
        else $industries_text = '-';
        $opportunity['industries'] = $industries_text;

        if(!is_null($opp->functional_area_id))
        {
            $functions  = json_decode($opp->functional_area_id);
            $functions_text = '';

            foreach($functions as $function)
            {
                $obj = FunctionalArea::find($function);
                if($obj)
                {
                    $functions_text .= $obj->area_name;
                    $functions_text .= " , ";
                }
            }
        }
        else $functions_text = '-';
        $opportunity['functions'] = $functions_text;


        if(!is_null($opp->target_employer_id))
        {
            $employers  = json_decode($opp->target_employer_id);
            $employers_text = '';

            foreach($employers as $employer)
            {
                $obj = TargetCompany::find($employer);
                if($obj)
                {
                    $employers_text .= $obj->company_name;
                    $employers_text .= " , ";
                }
            }
        }
        else $employers_text = '-';
        $opportunity['target_employers'] = $employers_text;

        
        return response()->json(['opportunity'=>$opportunity]);
    }
}
