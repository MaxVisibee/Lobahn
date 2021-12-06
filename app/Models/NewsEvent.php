<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsEvent extends Model{
    use HasFactory;
    use SoftDeletes;
    protected $table = "news_events";

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
        'event_title',
        'description',
        'event_date',
        'event_time',
        'event_year',
        'created_by',
        'event_image',
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
        Schema::dropIfExists('news_events');
    }
}

