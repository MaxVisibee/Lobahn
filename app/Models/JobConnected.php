<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobConnected extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','opportunity_id','is_connected','employer_viewed','status']; 
}
