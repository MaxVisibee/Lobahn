<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ProfileCv extends Model
{
    use HasFactory;

    use LogsActivity;

    protected static $logAttributes = [
        'title', 'user_id', 'cv_file'
    ];
    
    protected $fillable = ['title','user_id','cv_file'];
}