<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class News extends Model{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected static $logAttributes = [
        'title',
        'category_id',
        'description',
        'news_image',
        'is_default',
        'is_active',
        'created_by',
        'commenter_name',
        'comment',
        'comment_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $table = "news";

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    protected $fillable = [
        'title',
        'category_id',
        'description',
        'news_image',
        'is_default',
        'is_active',
        'created_by',
        'commenter_name',
        'comment',
        'comment_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function down(){
        Schema::dropIfExists('news');
    }

    public function category(){
        return $this->belongsTo('App\Models\NewsCategory','category_id');
    }

    public function is_like($news_id,$user_id){
        $status = NewsLike::where('news_id',$news_id)->where('user_id',$user_id)->first();
        return $status;
    }
}