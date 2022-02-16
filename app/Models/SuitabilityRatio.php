<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SuitabilityRatio extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logAttributes = [
        'name', 'talent_num', 'talent_percent', 'position_num', 'position_percent',
    ];

    protected $table = "suitability_ratios";

    protected $fillable = [
        'name','talent_num','talent_percent','position_num','position_percent',
    ];

}