<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationHistroy extends Model
{
    use HasFactory;
    
    protected $fillable =['user_id','level','field','institution','location','year'];
}
