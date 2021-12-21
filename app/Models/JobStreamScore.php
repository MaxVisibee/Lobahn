<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobStreamScore extends Model
{
    use HasFactory;

    protected $table = "job_stream_scores";

    protected $fillable = [
        'user_id','company_id','job_id','tsr_score','psr_score','jsr_score',
    ];
}
