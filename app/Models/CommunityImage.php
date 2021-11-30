<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommunityImage extends Model
{
    use HasFactory;
    // use SoftDeletes;
    public $table = 'community_images';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
    	'community_id',
    	'image',
    	'created_at',
        'updated_at',
        // 'deleted_at',
    ];
}
