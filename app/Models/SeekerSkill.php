<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class SeekerSkill extends Model{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected static $logAttributes = [
        'user_id',
        'skill_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $table = "seeker_skills";

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'skill_id',        
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}