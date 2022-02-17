<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Industry extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logAttributes = [
        'industry_name',
        'is_active',
        'is_default',
    ];

    protected $table = "industries";
    
    protected $fillable = [
        'industry_name',
        'is_active',
        'is_default',
    ];
    
}