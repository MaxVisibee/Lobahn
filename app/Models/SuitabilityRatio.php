<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuitabilityRatio extends Model
{
    use HasFactory;

    protected $table = "suitability_ratios";

    protected $fillable = [
        'name','talent_num','talent_percent','position_num','position_percent'
    ];

}
