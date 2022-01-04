<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSectorUsage extends Model
{
    use HasFactory;

    public $table = "sub_sector_usages";

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'sub_sector_id',
        'opportunity_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function subsector()
    {
        return $this->belongsTo('App\Models\SubSector', 'sub_sector_id');
    } 
}