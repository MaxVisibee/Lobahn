<?php

namespace App\Traits;
use App\Models\ActivityLog;

trait ActivityLogTrait
{
    public function log($user,$action,$description)
    {
     ActivityLog::create([
        'date'=> now(),
        'user' => $user,
        'action' => strtoupper($action),
        'description' => $description
     ]);  
    }
}