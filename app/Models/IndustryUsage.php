<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class IndustryUsage extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logAttributes = [
        'user_id',
        'industry_id',
        'opportunity_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $table = "industry_usages";

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'industry_id',
        'opportunity_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class, 'opportunity_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}