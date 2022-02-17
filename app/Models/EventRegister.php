<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class EventRegister extends Model{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected static $logAttributes = [
        'event_id',
        'user_id',
        'user_name',
        'user_email',
        'user_phone,',
        'lobann_user_name',
        'guests_number',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $table = "event_registers";

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
        'event_id',
        'user_id',
        'user_name',
        'user_email',
        'user_phone,',
        'lobann_user_name',
        'guests_number',       
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}