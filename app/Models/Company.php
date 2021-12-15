<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\CompanyResetPassword;

class Company extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'companies';

    public $timestamps = true;

    protected $guarded = ['id'];

    protected $dates = [
        'created_at', 'updated_at', 'package_start_date', 'package_end_date','password_updated_date', 'listing_date','expire_date',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'company_name','user_name','email','email_verified_at','phone','company_phone',
        'company_logo','profile_photo','country_id','area_id','district_id',
        'address','contract_term_id','contract_hour_id','keyword_id','management_level_id',
        'experience_id','education_level_id','institution_id','language_id',
        'geographical_id','people_management_id','skill_id','field_study_id',
        'qualification_id','key_strength_id','position_title_id','industry_id',
        'sub_sector_id','function_id','specialist_id','website_address','target_employer',
        'company_description','package_id','payment_id','no_of_offices','no_of_employees',
        'established_in','slug','verified','is_active','is_featured','is_subscribed',
        'from_salary','to_salary', 'user_id', 'target_pay',  
    ];

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

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CompanyResetPassword($token));
    }

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
        return $this->belongsTo('App\Models\JobType','contract_term_id');
    }
    public function jobShift(){
        return $this->belongsTo('App\Models\jobShift','contract_hour_id');
    }
    public function jobSkill(){
        return $this->belongsTo('App\Models\JobSkill','skill_id');
    }
    public function jobTitle(){
        return $this->belongsTo('App\Models\JobTitle','position_title_id');
    }
    public function jobExperience(){
        return $this->belongsTo('App\Models\JobExperience','experience_id');
    }
    public function area(){
        return $this->belongsTo('App\Models\Area','area_id');
    }
    public function language(){
        return $this->belongsTo('App\Models\Language','language_id');
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
    

    public function hello()
    {
        return 'Hello';
    }
    
}