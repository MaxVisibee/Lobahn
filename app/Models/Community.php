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
        'Article' => 'Article',
        'People' => 'People',
        'Announcements' => 'Announcements',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    protected $fillable = [
        'title',
        'category',
        'description',
        'community_image',
        'created_by',
        'user_id',
        'user_types',
        'company_id',
        'like',
        'started_date',
        'is_default',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
        'approved'
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

    public function comments(){
        return $this->hasMany(CommunityComment::class);
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function company(){
        return $this->belongsTo('App\Models\Company','company_id');
    }

    public function is_like($community_id,$user_id){
        $status = CommunityLike::where('community_id',$community_id)->where('user_id',$user_id)->first();
        return $status;
    }

}