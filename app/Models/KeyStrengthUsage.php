<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyStrengthUsage extends Model
{
    use HasFactory;

    public $table = "key_strength_usages";

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'key_strnegth_id',
        'opportunity_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function keyStrength()
    {
        return $this->belongsTo('App\Models\KeyStrength', 'key_strnegth_id');
    }
}