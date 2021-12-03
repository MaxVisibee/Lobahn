<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opportunity extends Model{
    use HasFactory;
    use SoftDeletes;
    protected $table = "opportunities";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'company_id',
        'country_id',
        'area_id',
        'district_id',
        'job_title_id',
        'job_type_id',
        'job_skill_id',
        'job_experience_id',
        'degree_level_id',
        'carrier_level_id',
        'functional_area_id',
        'is_freelance',
        'salary_from',
        'salary_to',
        'hide_salary',
        'salary_currency',
        'gender',
        'no_of_position',
        'requirement',
        'about_company',
        'description',
        'benefits',
        'expire_date',
        'is_active',
        'is_default',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('opportunities');
    }

    public function company(){
        return $this->belongsTo('App\Models\Company','company_id');
    }
    public function jobType(){
        return $this->belongsTo('App\Models\JobType','job_type_id');
    }
    public function jobSkill(){
        return $this->belongsTo('App\Models\JobSkill','job_skill_id');
    }
    public function jobShift(){
        return $this->belongsTo('App\Models\JobShift','job_shift_id');
    }
    public function jobTitle(){
        return $this->belongsTo('App\Models\JobTitle','job_title_id');
    }
    public function jobExperience(){
        return $this->belongsTo('App\Models\JobExperience','job_experience_id');
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
    
    public function skillOpportunity(){
        return $this->hasMany('App\Models\OpportunitySkill');
    }
    public function skills(){
        return $this->belongsToMany('App\Models\JobSkill')->withPivot('job_skill_id', 'opportunity_id');
    }
}
