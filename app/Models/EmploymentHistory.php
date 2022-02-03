<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentHistory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','position_title','employer_id','from','to'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'employer_id');
    }
}
