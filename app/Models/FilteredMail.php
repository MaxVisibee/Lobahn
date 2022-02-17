<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class FilteredMail extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logAttributes = [
        'email',
    ];

    protected $fillable = ['email'];
}