<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class NewsLike extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logAttributes = [
        'user_id', 'community_id', 'user_type', 'like_date'
    ];

    protected $fillable = [
        'user_id','community_id','user_type','like_date'
    ];
}