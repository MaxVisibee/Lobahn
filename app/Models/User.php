<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\CompanyResetPassword;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;



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
        'institution_id','language_id', 'language_level', 'geographical_id','people_management_id','skill_id',
        'field_study_id','qualification_id','key_strength_id','position_title_id',
        'industry_id','sub_sector_id','functional_area_id','specialist_id',
        'target_employer_id','payment_id','package_id','preferred_employment_terms','is_featured','feature_member_display',
        'target_pay_id','target_salary','range_from','range_to','full_time_salary','part_time_salary','freelance_salary','current_salary','expected_salary','is_active','is_immediate_available',
        'is_subscribed','num_impressions','num_clicks','num_opportunities_presented',
        'num_sent_profiles','num_shortlists','num_connections','num_profile_views','verified','search','cv','default_cv','image','remark','jobs_quota','availed_jobs_quota','highlight_1','highlight_2','highlight_3','description',
        'package_start_date','package_end_date'
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

    public function countries(){
        return $this->belongsToMany('App\Models\Country', 'country_usages');
    }

    public function jobTypes(){
        return $this->belongsToMany('App\Models\JobType','job_type_usages');
    }

    public function targetPay(){
        return $this->belongsTo('App\Models\TargetPay','target_pay_id');
    }

    public function contractHours()
    {
        return $this->belongsToMany('App\Models\JobShift','job_shift_usages');
    }

    public function keywords(){
        return $this->belongsToMany('App\Models\Keyword', 'keyword_usages');
    }

    public function carrier(){
        return $this->belongsTo('App\Models\CarrierLevel','management_level_id');
    }

    public function jobExperience(){
        return $this->belongsTo('App\Models\JobExperience','experience_id');
    }

    public function degree(){
        return $this->belongsTo('App\Models\DegreeLevel','education_level_id');
    }

    public function institutions()
    {
        return $this->belongsToMany('App\Models\Institution','institution_usages');
    }

    public function languages(){
        return $this->belongsToMany('App\Models\Language','language_usages')->withPivot('level');
    }

    public function geographicals(){
        return $this->belongsToMany('App\Models\Geographical','geographical_usages');
    }

    public function jobSkills(){
        return $this->belongsToMany('App\Models\JobSkill','job_skill_opportunity');
    }

    public function studyFields(){
        return $this->belongsToMany('App\Models\StudyField','study_field_usages', 'field_study_id','user_id');
    }

    public function qualifications(){
        return $this->belongsToMany('App\Models\Qualification','qualification_usages');
    }

    public function keyStrengths(){
        return $this->belongsToMany('App\Models\KeyStrength','key_strength_usages');
    }

    public function JobTitles(){
        return $this->belongsToMany('App\Models\JobTitle','job_title_usages');
    }

    public function industries(){
        return $this->belongsToMany('App\Models\Industry','industry_usages');
    }

    public function subsectors(){
        return $this->belongsToMany('App\Models\SubSector','sub_sector_usages');
    }

    public function functionalAreas(){
        return $this->belongsToMany('App\Models\FunctionalArea','functional_area_usages');
    }

    public function specialities(){
        return $this->belongsToMany('App\Models\Speciality', 'speciality_usages', 'specialist_id', 'user_id');
    }
    
    public function targetEmployers(){
        return $this->belongsToMany('App\Models\Company', 'target_employer_usages', 'target_employer_id', 'user_id');
    }
    
    public function cv(){
        return $this->belongsTo('App\Models\ProfileCv','default_cv');
    }
    
    
    public function company(){
        return $this->belongsTo('App\Models\Company','target_employer_id');
    }
    
    public function package(){
        return $this->belongsTo('App\Models\Package','package_id');
    }
    public function payments(){
        return $this->hasMany('App\Models\Payment','user_id');
    }

    public function sendPasswordResetNotification($token){
        $this->notify(new CompanyResetPassword($token));
    }

    public function skills(){
        return $this->belongsToMany('App\Models\SeekerSkill')->withPivot('job_skill_id', 'user_id');
    }
    public function seekerKeywords(){
        return $this->belongsToMany('App\Models\Keyword','keyword_usages');
    }
    public function seekerSkills(){
        return $this->belongsToMany('App\Models\JobSkill',' job_skill_opportunity');
    }
    public function mykeywords(){
        return $this->hasMany(KeywordUsage::class, 'user_id');
    }
    public function jobPositions(){
        return $this->belongsToMany('App\Models\JobTitle','job_title_usages');
    }
    public function strengthUsage(){
        return $this->belongsToMany('App\Models\KeyStrength','key_strength_usages');
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

    public function isconnected($job_id,$user_id)
    {
        $status = JobConnected::where('opportunity_id',$job_id)->where('user_id',$user_id)->first();
        return $status;
    }

    public function isviewed($job_id,$user_id)
    {
        $status = SeekerViewed::where('opportunity_id',$job_id)->where('user_id',$user_id)->first();
        return $status;
    }

    public function getDefaultCV($id)
    {
        $cv = ProfileCv::where('id',$id)->first();
        return $cv;
    }

}
