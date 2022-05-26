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
        'payment_id','intent_id','user_id', 'company_id', 'invoice_num', 'package_id', 'payment_method_id', 'client_secret', 'status', 'package_start_date',
        'package_end_date','amount','is_charged','sub_id','customer_id','plan_id','auto_renew',
    ];

    protected $table = "payments";

    protected $fillable = [
        'payment_id','intent_id','user_id','company_id','invoice_num','package_id','payment_method_id','client_secret','status','package_start_date',
        'package_end_date','amount','is_charged','sub_id','customer_id','plan_id','auto_renew',
    ];

    public function package(){
        return $this->belongsTo('App\Models\Package','package_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');    
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company','company_id');    
    }
    
}