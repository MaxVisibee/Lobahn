<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobViewed extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','opportunity_id','is_viewed','count']; 
}
