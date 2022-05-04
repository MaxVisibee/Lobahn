<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class TargetCompany extends Model{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected static $logAttributes = [
        'company_name',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $table = "target_companies";

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
        'company_name',
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
        Schema::dropIfExists('target_companies');
    }

    // public function study_field_usages()
    // {
    //     return $this->hasMany(StudyFieldUsage::class, 'field_study_id', 'id');
    // }
}