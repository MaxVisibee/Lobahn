<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Institution extends Model{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected static $logAttributes = [
        'institution_name',
        'country_id',
        'area_id',
        'is_default',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    protected $table = "institutions";

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
        'institution_name',
        'country_id',
        'area_id',
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
        Schema::dropIfExists('institutions');
    }

    public function country(){
        return $this->belongsTo('App\Models\Country','country_id');
    }
    public function district(){
        return $this->belongsTo('App\Models\District','district_id');
    }

    public function institution_usages()
    {
        return $this->hasMany(InstitutionUsage::class, 'institution_id', 'id');
    }
    
}