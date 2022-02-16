<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Meta extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logAttributes = [
        'page_name', 'page_url', 'title', 'description'
    ];

    protected $fillable = [
        'page_name','page_url','title','description'
    ];
}