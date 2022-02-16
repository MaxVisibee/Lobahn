<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class LanguageLevel extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logAttributes = [
        'level',
        'priority',
        'created_at',
        'updated_at',
    ];

    protected $table = "language_levels";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'level',
        'priority',
        'created_at',
        'updated_at',
    ];

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_levels');
    }
}