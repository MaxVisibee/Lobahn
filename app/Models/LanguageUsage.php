<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class LanguageUsage extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logAttributes = [
        'user_id', 'job_id', 'language_id', 'level_id'
    ];

    public $table = "language_usages";
    protected $fillable = ['user_id','job_id','language_id','level_id'];

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class, 'job_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function level(){
        return $this->belongsTo(LanguageLevel::class,'level_id');
    }
}