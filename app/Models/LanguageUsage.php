<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageUsage extends Model
{
    use HasFactory;
    public $table = "language_usages";
    protected $fillable = ['user_id','job_id','language_id','level'];

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
}