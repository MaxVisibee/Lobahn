<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use Mail;
use App\Models\User;
use App\Models\Company;
use Session;

class CorporateController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $seekers = User::orderBy('created_at', 'desc')->take(3)->get();
        $companies = Company::all();
        return view('company.index', compact('seekers','companies'));
    }
    public function jobDetails(){
        $company = Company::first();
        return view('company.job-details', compact('company'));
    }
    public function memberProfile(){
        $company = Company::first();
        return view('company.member-profile', compact('company'));
    }
    public function premiumPlan(){
        return view('company.premium-plan');
    }
}
