<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name','user_name','email','password','father_name','gender','marital_status',
        'nationality_id','nationality','nric','country_id','area_id','district_id',
        'address','phone','mobile_phone','contract_term_id','contract_hour_id',
        'keyword_id','management_level_id','experience_id','education_level_id',
        'institution_id','language_id','geographical_id','people_management_id','skill_id',
        'field_study_id','qualification_id','key_strength_id','position_title_id',
        'industry_id','sub_sector_id','functional_area_id','specialist_id',
        'target_employer_id','payment_id','package_id','preferred_employment_terms',
        'target_pay_id','current_salary','expected_salary','is_active','is_immediate_available',
        'is_subscribed','num_impressions','num_clicks','num_opportunities_presented',
        'num_sent_profiles','num_profile_views','num_shortlists','num_connections',
        'num_profile_views','verified','serach','cv','image','remark',
    ];

    protected $dates = ['created_at', 'updated_at', 'dob', 'package_start_date', 'package_end_date','password_updated_date'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getName()
    {
        $html = '';
        if (!empty($this->first_name))
            $html .= $this->first_name;

        if (!empty($this->last_name))
            $html .= ' ' . $this->last_name;

        return $html;
    }

    public function state(){
        return $this->belongsTo('App\Models\Area','state_id');
    }
    public function city(){
        return $this->belongsTo('App\Models\District','city_id');
    }
    public function industry(){
        return $this->belongsTo('App\Models\Industry','industry_id');
    }
    public function jobType(){
        return $this->belongsTo('App\Models\JobType','contract_hour_id');
    }
    public function jobShift(){
        return $this->belongsTo('App\Models\JobShift','contract_term_id');
    }
    public function jobSkill(){
        return $this->belongsTo('App\Models\JobSkill','skill_id');
    }
    public function JobTitle(){
        return $this->belongsTo('App\Models\JobTitle','position_title_id');
    }
    public function jobExperience(){
        return $this->belongsTo('App\Models\JobExperience','experience_id');
    }
    public function area(){
        return $this->belongsTo('App\Models\Area','area_id');
    }
    public function district(){
        return $this->belongsTo('App\Models\District','district_id');
    }
    public function carrier(){
        return $this->belongsTo('App\Models\CarrierLevel','management_level_id');
    }
    public function degree(){
        return $this->belongsTo('App\Models\DegreeLevel','education_level_id');
    }
    public function functionalArea(){
        return $this->belongsTo('App\Models\FunctionalArea','functional_area_id');
    }
    public function country(){
        return $this->belongsTo('App\Models\Country','country_id');
    }
    public function subsector(){
        return $this->belongsTo('App\Models\SubSector','sub_sector_id');
    }
    public function studyField(){
        return $this->belongsTo('App\Models\StudyField','study_field_id');
    }
    public function language(){
        return $this->belongsTo('App\Models\Language','language_id');
    }
    public function keyword(){
        return $this->belongsTo('App\Models\Keyword','keyword_id');
    }
    public function geographical(){
        return $this->belongsTo('App\Models\Geographical','geographical_id');
    }
    public function qualification(){
        return $this->belongsTo('App\Models\Qualification','qualification_id');
    }
    public function keyStrength(){
        return $this->belongsTo('App\Models\KeyStrength','key_strength_id');
    }
    public function specialiaty(){
        return $this->belongsTo('App\Models\Speciality','specialist_id');
    }
}
