<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class JobConnected extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logAttributes = [
        'user_id', 'opportunity_id','corporate_id','is_connected', 'employer_viewed', 'status'
    ];

    protected $fillable = ['user_id','opportunity_id','corporate_id','is_connected','employer_viewed','status']; 

    public function opportunity(){
        return $this->belongsTo(Opportunity::class, 'opportunity_id',);
    }
}