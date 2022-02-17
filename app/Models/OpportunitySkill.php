<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class OpportunitySkill extends Model{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected static $logAttributes = [
        'user_id',
        'opportunity_id',
        'skill_id',
        'type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $table = "opportunity_skills";

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'opportunity_id',
        'skill_id',
        'type',      
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}