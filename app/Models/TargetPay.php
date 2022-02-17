<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class TargetPay extends Model{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected static $logAttributes = [
        'user_id',
        'opportunity_id',
        'target_amount',
        'fulltime_amount',
        'parttime_amount',
        'freelance_amount',
        'is_default',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $table = "target_pays";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    protected $fillable = [
        'user_id',
        'opportunity_id',
        'target_amount',
        'fulltime_amount',
        'parttime_amount',
        'freelance_amount',
        'is_default',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('target_pays');
    }
}