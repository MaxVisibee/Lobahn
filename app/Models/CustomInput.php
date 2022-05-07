<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomInput extends Model
{
    use HasFactory;
    protected $fillable = ['name','field','user_id','company_id'];
}
