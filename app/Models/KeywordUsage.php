<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeywordUsage extends Model
{
    use HasFactory;

    protected $fillable = ['user_name','opportunity_name','keyword_id','type','user_id'];

    public function keyword(){
        return $this->belongsTo('App\Models\Keyword','keyword_id');
    }
}
