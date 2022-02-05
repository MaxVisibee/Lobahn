<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobStreamScore extends Model
{
    use HasFactory;

    protected $table = "job_stream_scores";

    protected $fillable = [
        'user_id','company_id','job_id','tsr_score','psr_score','jsr_score','tsr_percent','psr_percent','jsr_percent','matched_factors','is_deleted'
    ];

    public function position()
    {
        return $this->belongsTo('App\Models\Opportunity', 'job_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }

    public function isviewed($job_id,$user_id)
    {
        $status = JobViewed::where('opportunity_id',$job_id)->where('user_id',$user_id)->first();
        // $status = JobViewed::join('opportunities as job','job_vieweds.opportunity_id','=','job.id')
        // ->where('job.id',$job_id)
        // ->where('job_vieweds.user_id',$user_id)
        // ->select('job_vieweds.*')
        // ->first();
        return $status;
    }

    public function isconnected($job_id,$user_id)
    {
        $status = JobConnected::join('job_stream_scores as job','job_connecteds.opportunity_id','=','job.id')
        ->where('job.job_id',$job_id)
        ->where('job_connecteds.user_id',$user_id)
        ->select('job_connecteds.*')
        ->first();
        return $status;
    }

    public function mykeywords()
    {
        return $this->hasMany(KeywordUsage::class, 'job_id');
    }
}
