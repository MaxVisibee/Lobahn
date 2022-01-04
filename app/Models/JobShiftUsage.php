<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobShiftUsage extends Model
{
    use HasFactory;

    public $table = "job_shift_usages";

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'contract_hour_id',
        'opportunity_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function jobShift()
    {
        return $this->belongsTo('App\Models\JobShift', 'contract_hour_id');
    }
}