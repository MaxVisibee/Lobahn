<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use Mail;
use App\Models\User;
use App\Models\Company;
use App\Models\News;
use App\Models\Banner;
use App\Models\Faq;
use App\Models\Blog;
use App\Models\Partner;
use App\Models\Contact;
use App\Models\About;
use App\Models\Community;
use App\Models\Term;
use App\Models\Privacy;
use App\Models\NewsCategory;
use App\Models\NewsEvent;

class FrontendController extends Controller{
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
        $partners = Partner::all();
        $seekers = User::orderBy('created_at', 'desc')->take(3)->get();
        $companies = Company::all();
        $events = NewsEvent::take(3)->get();
        return view('frontend.home', compact('partners','seekers','companies','events'));
    }
    public function news(){
        $news = News::all();
        $categories = NewsCategory::all();
        return view('frontend.news', compact('news','categories'));
    }

    public function newsDetails($id){
        $new  = News::where('id',$id)->first();
        return view('frontend.news-detail', compact('new'));
    }

    public function faq(){
        $faqs = Faq::all();
        return view('frontend.faqs', compact('faqs'));
    }

    public function terms(){
        $term = Term::take(1)->first();
        return view('frontend.terms', compact('term'));
    }

    public function privacy(){
        $privacy = Privacy::take(1)->first();
        return view('frontend.privacy', compact('privacy'));
    }

    public function community(){
        $communities = Community::all();
        return view('frontend.community', compact('communities'));
    }

    // public function userLogin(){
    //     return view('auth.login');
    // }
    public function events(){
        $events = NewsEvent::all();
        return view('frontend.events', compact('events'));
    }

    public function eventDetails($id){
        $event  = NewsEvent::where('id',$id)->first();
        return view('frontend.event-detail', compact('event'));
    }

}
