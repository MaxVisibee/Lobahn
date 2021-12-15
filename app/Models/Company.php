<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Company extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'companies';

    public $timestamps = true;

    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at', 'package_start_date', 'package_end_date'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name','company_name','position_title','email','user_name', 'password',
        'confirm_password','profile_photo','industry_id',
        'target_employer','position_title_id','sub_sector_id','target_id','skill_id',
        'carrier_level_id','experience_id','degree_level_id','language_id','study_field_id',
        'working_hour_id','preferred_school','adjacent_position','speciality','keyword',
        'geographical_experience','people_management','tech_knowledge','qualification',
        'key_strength','contract_term','min_salary','max_salary','reference',
        'ownership_type_id','description', 'location','no_of_offices','no_of_employees',
        'website','established_in','phone','logo','country_id','state_id','city_id','slug',
        'is_active', 'verified', 'verification_token', 'main_sub_sector','function','listing_date',
        'expire_date','functional_area_id',
    ];

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

    public function industry(){
        return $this->belongsTo(Industry::class, 'industry_id', 'id');
    }
    
    public function package(){
        return $this->hasOne(Package::class, 'id', 'package_id');
    }

    public function getPackage($field = '')
    {
        $package = $this->package()->first();
        if (null !== $package) {
            if (!empty($field)) {
                return $package->$field;
            } else {
                return $package;
            }
        }
    }

    public function jobType(){
        return $this->belongsTo('App\Models\JobType','job_type_id');
    }
    public function jobSkill(){
        return $this->belongsTo('App\Models\JobSkill','job_skill_id');
    }
    public function jobTitle(){
        return $this->belongsTo('App\Models\JobTitle','job_title_id');
    }
    public function jobExperience(){
        return $this->belongsTo('App\Models\JobExperience','job_experience_id');
    }
    public function area(){
        return $this->belongsTo('App\Models\Area','state_id');
    }
    public function language(){
        return $this->belongsTo('App\Models\Language','language_id');
    }
    public function district(){
        return $this->belongsTo('App\Models\District','city_id');
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

    public function hello()
    {
        return 'Hello';
    }
    
}