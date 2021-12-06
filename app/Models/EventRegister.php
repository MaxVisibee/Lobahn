<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventRegister extends Model{
    use HasFactory;
    use SoftDeletes;
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
        'user_phone,'
        'lobann_user_name',       
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
        Schema::dropIfExists('event_registers');
    }
}

