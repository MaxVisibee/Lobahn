<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSkillOpportunity extends Model
{
    use HasFactory;
    
    public $table = "job_skill_opportunity";

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'job_skill_id',
        'opportunity_id',    
        'type',    
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}