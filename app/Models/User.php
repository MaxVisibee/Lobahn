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
        'first_name', 'last_name', 'name', 'email', 'password', 'father_name', 'gender',
        'marital_status', 'nationality_id', 'nationality', 'nric', 'country_id', 'state_id',
        'city_id', 'phone', 'mobile_phone', 'job_experience_id', 'carrier_level_id', 'industry_id',
        'functional_area_id', 'current_salary', 'expected_salary', 'salary_currency', 
        'street_address','is_active', 'verified', 'provider', 'provider_id', 'image', 'lang',
        'package_id','jobs_quota', 'availed_jobs_quota', 'position_title_id','sub_sector_id',
        'function_id', 'company_id','payment_id','contract_hour_id','experience_id',
        'degree_level_id', 'language_id','carrier_level_id','study_field_id','specialities',
        'contract_term','academic_institution','geographical_experience','people_management',
        'tech_knowledge','qualification','key_strength','cv',
    ];

    protected $dates = ['created_at', 'updated_at', 'dob', 'package_start_date', 'package_end_date'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
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
    public function jobSkill(){
        return $this->belongsTo('App\Models\JobSkill','job_skill_id');
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
        return $this->belongsTo('App\Models\CarrierLevel','carrier_level_id');
    }
    public function degree(){
        return $this->belongsTo('App\Models\DegreeLevel','degree_level_id');
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
}
