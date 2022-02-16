<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class EmploymentHistory extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logAttributes = [
        'user_id', 'position_title', 'employer_id', 'from', 'to'
    ];

    protected $fillable = ['user_id','position_title','employer_id','from','to'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'employer_id');
    }
}