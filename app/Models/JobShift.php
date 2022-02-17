<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class JobShift extends Model{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected static $logAttributes = [
        'job_shift',
        'is_default',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $table = "job_shifts";

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
        'job_shift',
        'is_default',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('job_shifts');
    }

    public function job_shift_usages()
    {
        return $this->hasMany(JobShiftUsage::class, 'job_shift_id', 'id');
    }
}