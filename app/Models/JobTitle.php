<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobTitle extends Model{
    use HasFactory;
    use SoftDeletes;
    protected $table = "job_titles";

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    protected $fillable = [
        'job_title',
        'is_default',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function down(){
        Schema::dropIfExists('job_titles');
    }

    public function categories(){
        return $this->belongsToMany('App\Models\JobTitleCategoryUsage','job_title_category_usages');
    }
}