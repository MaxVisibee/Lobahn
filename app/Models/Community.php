<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Community extends Model{
    use HasFactory;
    use SoftDeletes;
    protected $table = "communities";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    const USER_TYPES = [
        1 => 'Account',
        2 => 'Career',
        3 => 'Subscription',
    ];

    const POST_TYPES = [
        1 => 'Article',
        2 => 'People',
        3 => 'Announcements',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    protected $fillable = [
        'title',
        'description',
        'community_image',
        'created_by',
        'user_id',
        'user_types',
        'like',
        'started_date',
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
        Schema::dropIfExists('communities');
    }

    public function images(){
        return $this->hasMany(CommunityImage::class);
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}


