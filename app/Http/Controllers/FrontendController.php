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

    public function pswforgot(Request $request){        
        // $login_id=(Session::has('user'))? Session::get('user')['id']:0;
        // $login_name =(Session::has('user'))? Session::get('user')['name']:'';

        // return view('web.myaccount.pwreset',[
        //     'login_id'=>$login_id,
        //     'login_name'=>$login_name,
        // ]); 

        return view('frontend.pswforgot');      
        
    }

    public function pwreset(Request $request){
        dd("HI");
        $email =($request->has('email'))? $request->input('email'):'';
        //forget also email
        $user=User::where('email',$email)->first();
        $user_id = isset($user->id)? $user->id:0;
        $user =User::find($user_id);

        if(isset($user->id)){
            $user_id = isset($user->id)? $user->id:0;       
            $name = isset($user->name)? $user->name:'';
            $email = isset($user->email)? $user->email:'';
            $data['name'] = $name;
            $encode_id=base64_encode($user_id);
            $data['url_link'] = \URL::to('/resetPassword/'.$encode_id);      

          //dd('dddd');
           // Session::put('user', $user->toArray());
            //return view('web.account.reset-pwd');

            $website_link = url('/');
            $data['logo']       = $website_link.'/assets/theme_image/visibleone-logo.png';
            $data['check_img']  = $website_link.'/assets/images/check.png'; 
            $data['fb_img']     = $website_link.'/assets/images/mail-fb.png'; 
            $data['twitter_img']= $website_link.'/assets/images/mail-twitter.png';
            $data['linkin_img'] = $website_link.'/assets/images/mail-linkin.png'; 
            $data['insta_img']  = $website_link.'/assets/images/mail-instragram.png';

            $mail = \Mail::send('emails.email_forgot_template',$data, function($message) use ($email) {
                $message->from('developer@visibleone.com', 'Visible One');
                $message->to($email)
                    ->subject('Reset New Password !');
            });

            return redirect()->back()->with('success','Please check your email to reset password');
        }
        else{
             return redirect()->back()
                ->with('error','Invalid Email.');
        }

    }
}
