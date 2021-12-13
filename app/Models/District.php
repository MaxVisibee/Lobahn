<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model{
    use HasFactory;
    use SoftDeletes;
    protected $table = "districts";

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
        'country_id',
    	'area_id',
        'district_name',
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
        Schema::dropIfExists('districts');
    }

    public function area(){
        return $this->belongsTo('App\Models\Area','area_id');
    }
    public function country(){
        return $this->belongsTo('App\Models\Country','country_id');
    }
}

