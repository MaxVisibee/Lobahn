<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobSkillOpportunity extends Model
{
    public $table = "job_skill_opportunity";

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'job_skill_id',
        'opportunity_id',        
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}