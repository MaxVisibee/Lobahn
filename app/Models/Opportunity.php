<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;

class Opportunity extends Model
{
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
        'title','ref_no','company_id','country_id','area_id','district_id','job_title_id',
        'job_type_id','job_skill_id','job_experience_id','degree_level_id',
        'carrier_level_id','functional_area_id','is_freelance','salary_from','salary_to',
        'salary_currency','hide_salary','gender','no_of_position','requirement','description',
        'highlight_1','highlight_2','highlight_3','supporting_document',
        'about_company','benefits','expire_date','is_active','is_default',
        'slug','address','contract_hour_id','keyword_id','institution_id','language_id',
        'geographical_id','management_id','field_study_id','qualification_id',
        'key_strnegth_id','industry_id','sub_sector_id','specialist_id','website_address',
        'target_employer_id','target_pay_id','package_id','payment_id','package_start_date','package_end_date',
        'is_featured','is_subscribed','listing_date',
    ];

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('opportunities');
    }

    public function TargetPay()
    {
        return $this->belongsTo('App\Models\TargetPay', 'target_pay_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company','company_id');
    }

    public function jobType()
    {
        return $this->belongsTo('App\Models\JobType','job_type_id');
    }

    public function jobSkill()
    {
        return $this->belongsTo('App\Models\JobSkill','job_skill_id');
    }

    public function jobTitle()
    {
        return $this->belongsTo('App\Models\JobTitle','job_title_id');
    }

    public function jobExperience()
    {
        return $this->belongsTo('App\Models\JobExperience','job_experience_id');
    }

    public function area()
    {
        return $this->belongsTo('App\Models\Area','area_id');
    }

    public function district()
    {
        return $this->belongsTo('App\Models\District','district_id');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country','country_id');
    }    

    public function skillOpportunity()
    {
        return $this->hasMany('App\Models\OpportunitySkill');
    }

    public function skills()
    {
        return $this->belongsToMany('App\Models\JobSkill')->withPivot('job_skill_id', 'opportunity_id');
    }

    public function jobShift()
    {
        return $this->belongsTo('App\Models\jobShift','contract_hour_id');
    }

    public function carrier()
    {
        return $this->belongsTo('App\Models\CarrierLevel', 'carrier_level_id');
    }

    public function degree()
    {
        return $this->belongsTo('App\Models\DegreeLevel', 'degree_level_id');
    }

    public function functionalArea()
    {
        return $this->belongsTo('App\Models\FunctionalArea','functional_area_id');
    }

     public function geographical()
    {
        return $this->belongsTo('App\Models\Geographical','geographical_id');
    }

    public function studyField()
    {
        return $this->belongsTo('App\Models\StudyField','field_study_id');
    }

    public function keyword()
    {
        return $this->belongsTo('App\Models\Keyword','keyword_id');
    }

    public function institution()
    {
        return $this->belongsTo('App\Models\Institution','institution_id');
    }

    public function language()
    {
        return $this->belongsTo('App\Models\Language','language_id');
    }

    public function qualification()
    {
        return $this->belongsTo('App\Models\Qualification','qualification_id');
    }

    public function keyStrength()
    {
        return $this->belongsTo('App\Models\KeyStrength', 'key_strnegth_id');
    }

    public function payment()
    {
        return $this->belongsTo('App\Models\PaymentMethod','payment_id');
    }

     public function subsector()
    {
        return $this->belongsTo('App\Models\SubSector','sub_sector_id');
    } 

    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }

    public function specialiaty()
    {
        return $this->belongsTo('App\Models\Speciality','specialist_id');
    }

    public function package()
    {
        return $this->belongsTo('App\Models\Package','package_id');
    }

    public function mykeywords()
    {
        return $this->hasMany(KeywordUsage::class, 'opportunity_id');
    }

    public function jobSkillOpportunity()
    {
        return $this->hasMany(JobSkillOpportunity::class, 'opportunity_id');
    }

    public function jobKeywords()
    {
        return $this->belongsToMany('App\Models\Keyword','keyword_usages');
    }

    public function isviewed($job_id,$user_id)
    {
        $status = JobViewed::join('opportunities as job','job_vieweds.opportunity_id','=','job.id')
        ->where('job.id',$job_id)
        ->where('job_vieweds.user_id',$user_id)
        ->select('job_vieweds.*')
        ->first();
        return $status;
    }

    public function isconnected($job_id,$user_id)
    {
        $status = JobConnected::join('opportunities as job','job_connecteds.opportunity_id','=','job.id')
        ->where('job.id',$job_id)
        ->where('job_connecteds.user_id',$user_id)
        ->select('job_connecteds.*')
        ->first();
        return $status;
    }

    public function getTotalViewed($job_id)
    {
        $total_vieweds = JobViewed::where('opportunity_id', $job_id)->count();

        return $total_vieweds;
    }

    public function getTotalUnviewed($job_id)
    {
        $total_users = User::where('is_active', 1)->count();
        $total_vieweds = $this->getTotalViewed($job_id);
        $unviewed = $total_users - $total_vieweds;

        return $unviewed;
    }

    public function getTotalReceived($job_id)
    {
        $total_receiveds = JobConnected::where('opportunity_id', $job_id)->count();

        return $total_receiveds;
    }

    public function jsrRatio($job_id, $user_id)
    {
        $score = JobStreamScore::join('opportunities as job','job_stream_scores.job_id','=','job.id')
        ->where('job.id', $job_id)
        ->where('job_stream_scores.user_id', $user_id)
        ->select('job_stream_scores.*')
        ->first();
        
        return $score;
    }
}