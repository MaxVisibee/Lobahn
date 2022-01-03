<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillUsage extends Model
{
    use HasFactory;
    protected $fillable = ['skill_id','user_id','job_id','type'];

    public function skill(){
        return $this->belongsTo('App\Models\JobSkill','skill_id');
    }
}
