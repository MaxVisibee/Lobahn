<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityLog;

class ActivityLogController extends Controller
{
    public function index()
    {
        $logs = ActivityLog::where('causer_type','App\Models\Admin')->orderBy('id', 'desc')->get();
        return view('admin.activity_log.index',compact('logs'));
    }
    
}
