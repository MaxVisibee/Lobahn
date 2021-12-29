<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeywordUsage extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','opportunity_id','keyword_id','type'];

    public function keyword(){
        return $this->belongsTo('App\Models\Keyword','keyword_id');
    }
}
