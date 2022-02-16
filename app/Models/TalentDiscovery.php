<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class TalentDiscovery extends Model{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    protected static $logAttributes = [
        'title',
        'description_one',
        'image_one',
        'description_two',
        'image_two',
        'description_three',
        'image_three',
        'description_four',
        'image_four',
        'description_five',
        'image_five',
        'description_six',
        'image_six',
        'description',
        'created_by',
        'updated_date',
        'is_default',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $table = "talent_discovery";

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
        'title',
        'description_one',
        'image_one',
        'description_two',
        'image_two',
        'description_three',
        'image_three',
        'description_four',
        'image_four',
        'description_five',
        'image_five',
        'description_six',
        'image_six',
        'description',
        'created_by',
        'updated_date',
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
        Schema::dropIfExists('terms');
    }
}