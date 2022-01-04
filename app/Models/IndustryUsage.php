<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryUsage extends Model
{
    use HasFactory;

    public $table = "industry_usages";

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'industry_id',
        'opportunity_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }
}