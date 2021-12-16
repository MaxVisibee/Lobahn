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
        'created_at', 'updated_at', 'package_start_date', 'package_end_date','password_updated_date',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name','company_name','position_title','email','user_name','password','industry_id',
        'sub_sector_id','description','no_of_offices','no_of_employees','website_address',
        'established_in','phone','company_logo','address','country_id','area_id','district_id','slug',
        'is_active','is_featured','verified','map','facebook','twitter','linkedin','instagram',
        'preferred_school_id','target_employer_id','package_id','payment_id','jobs_quota','availed_jobs_quota',
        'is_subscribed','total_impressions','total_clicks','total_position_listings','total_received_profiles',
        'total_shortlists','total_connections','keyword_id','key_strength_id',
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
    public function area(){
        return $this->belongsTo('App\Models\Area','area_id');
    }
    public function language(){
        return $this->belongsTo('App\Models\Language','language_id');
    }
    public function district(){
        return $this->belongsTo('App\Models\District','district_id');
    }    
    public function country(){
        return $this->belongsTo('App\Models\Country','country_id');
    }
    public function subsector(){
        return $this->belongsTo('App\Models\SubSector','sub_sector_id');
    }    
    public function keyword(){
        return $this->belongsTo('App\Models\Keyword','keyword_id');
    }   
    public function qualification(){
        return $this->belongsTo('App\Models\Qualification','qualification_id');
    }
    public function keyStrength(){
        return $this->belongsTo('App\Models\KeyStrength','key_strength_id');
    }
    public function instituton(){
        return $this->belongsTo('App\Models\Institution','preferred_school_id');
    }
     public function payment(){
        return $this->belongsTo('App\Models\PaymentMethod','payment_id');
    }

    // public function jobType(){
    //     return $this->belongsTo('App\Models\JobType','contract_term_id');
    // }
    // public function jobShift(){
    //     return $this->belongsTo('App\Models\jobShift','contract_hour_id');
    // }
    // public function jobSkill(){
    //     return $this->belongsTo('App\Models\JobSkill','skill_id');
    // }
    // public function jobTitle(){
    //     return $this->belongsTo('App\Models\JobTitle','position_title_id');
    // }
    // public function jobExperience(){
    //     return $this->belongsTo('App\Models\JobExperience','experience_id');
    // }
    // public function carrier(){
    //     return $this->belongsTo('App\Models\CarrierLevel','management_level_id');
    // }
    // public function degree(){
    //     return $this->belongsTo('App\Models\DegreeLevel','education_level_id');
    // }
    // public function functionalArea(){
    //     return $this->belongsTo('App\Models\FunctionalArea','functional_area_id');
    // }
    //  public function geographical(){
    //     return $this->belongsTo('App\Models\Geographical','geographical_id');
    // }
    // public function studyField(){
    //     return $this->belongsTo('App\Models\StudyField','study_field_id');
    // }
    // public function specialiaty(){
    //     return $this->belongsTo('App\Models\Speciality','specialist_id');
    // }
    
}