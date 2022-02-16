<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Payment extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logAttributes = [
        'user_id', 'company_id', 'invoice_num', 'package_id', 'payment_method_id', 'client_secret', 'status', 'package_start_date',
        'package_end_date'
    ];

    protected $table = "payments";

    protected $fillable = [
        'user_id','company_id','invoice_num','package_id','payment_method_id','client_secret','status','package_start_date',
        'package_end_date'
    ];

    public function package(){
        return $this->belongsTo('App\Models\Package','package_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');    
    }
    
}