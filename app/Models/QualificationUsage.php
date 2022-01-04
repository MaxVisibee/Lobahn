<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualificationUsage extends Model
{
    use HasFactory;

    public $table = "qualification_usages";

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'qualification_id',
        'opportunity_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    public function qualification()
    {
        return $this->belongsTo('App\Models\Qualification', 'qualification_id');
    }

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class, 'opportunity_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}