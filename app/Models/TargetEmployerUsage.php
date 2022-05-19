<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\TargetCompany;

class TargetEmployerUsage extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logAttributes = [
        'user_id',
        'opportunity_id',
        'target_employer_id',
    ];

    public $table = "target_employer_usages";

    protected $fillable = [
        'user_id',        
        'opportunity_id',
        'target_employer_id',
    ];

    public function company()
    {
        return $this->belongsTo(TargetCompany::class, 'target_employer_id');
    }

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class, 'opportunity_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function target()
    {
        return $this->belongsTo(Company::class, 'target_employer_id');
    }

}