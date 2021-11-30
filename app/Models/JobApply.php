<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobApply extends Model{
    use HasFactory;
    use SoftDeletes;
    protected $table = "job_applies";

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
        'user_id',
        'job_opportunity_id',
        'cv_id',
        'current_salary',
        'expected_salary',
        'salary_currency',
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
        Schema::dropIfExists('job_applies');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function opportunity(){
        return $this->belongsTo('App\Models\Opportunity','job_opportunity_id');
    }
}

