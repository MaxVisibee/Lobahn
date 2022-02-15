<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Company;
use App\Models\Opportunity;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    
    public function index()
    {
        $users = User::get();
        $active_user = $users->where('is_active', 1)->count();
        $today = Carbon::today();
        $today_user = User::whereDate('created_at', $today)->count();

        $companies = Company::get();
        $active_company = $companies->where('is_active', 1)->count();
        $today_company = Company::whereDate('created_at', $today)->count();
        
        $opportunities = Opportunity::get();
        $active_opportunity = $opportunities->where('is_active', 1)->count();
        $today_opportunity = Opportunity::whereDate('created_at', $today)->count();

        $employerPackages = Company::select('package_id', DB::raw('count(id) as count'))->where('package_id','!=',0)->with('package')->groupBy('package_id')->get();
        $candidatePackages = User::select('package_id', DB::raw('count(id) as count'))->where('package_id', '!=', 0)->with('package')->groupBy('package_id')->get();
        
        $data = [
            'total_user' => count($users),
            'active_user' => $active_user,
            'today_user' => $today_user,
            'total_company' => count($companies),
            'active_company' => $active_company,
            'today_company' => $today_company,
            'total_job' => count($opportunities),
            'active_job' => $active_opportunity,
            'today_job' => $today_opportunity,
            'employerPackages' => $employerPackages,
            'candidatePackages' => $candidatePackages
        ];
        
        return view('admin.dashboard', $data);
    }

}