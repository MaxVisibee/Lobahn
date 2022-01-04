<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionUsage extends Model
{
    use HasFactory;

    public $table = "institution_usages";

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'institution_id',
        'opportunity_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function institution()
    {
        return $this->belongsTo('App\Models\Institution', 'institution_id');
    }
}