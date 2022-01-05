<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetEmployerUsage extends Model
{
    use HasFactory;

    public $table = "target_employer_usages";

    protected $fillable = [
        'user_id',        
        'opportunity_id',
        'target_employer_id',
    ];
}
