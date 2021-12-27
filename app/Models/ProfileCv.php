<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileCv extends Model
{
    use HasFactory;

    protected $fillabel = ['title','user_id','cv_file'];
}
