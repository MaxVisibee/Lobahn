<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Package extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logAttributes = [
        'package_title',
        'package_type',
        'package_price',
        'package_num_days',
        'package_num_listings',
        'package_for',
        'price_permonth',
        'promotion_percent',
        'currency', 'is_recommanded',
        'taking_percent'
    ];

    protected $table = "packages";
    
    protected $fillable = [
        'package_title',
        'package_type',
        'package_price',
        'package_num_days',
        'package_num_listings',
        'package_for',
        'price_permonth',
        'promotion_percent',
        'currency','is_recommanded',
        'taking_percent'
    ];

     const  PACKAGE_FOR = [
        'individual' => 'Individual Member',
        'corporate'  => 'Corporate Member',
    ];

}