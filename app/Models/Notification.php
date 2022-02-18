<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'corporate_id','talent_id','candidate_id','opportunity_id','description','viewed'
    ];

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class,'opportunity_id');
    }

    public function talent()
    {
        return $this->belongsTo(User::class,'candidate_id');
    }
}
