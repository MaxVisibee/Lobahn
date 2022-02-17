<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CompanyActivity extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logAttributes = [
        'position', 'impression', 'click', 'profile', 'connection', 'shortlist', 'company_id'
    ];

    protected $fillable = [
        'position','impression','click','profile','connection','shortlist','company_id'
    ];
}