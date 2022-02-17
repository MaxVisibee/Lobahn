<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ScheduledMail extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logAttributes = [
        'title', 'body', 'attachment', 'date'
    ];

    protected $fillable = ['title','body','attachment','date'];
}