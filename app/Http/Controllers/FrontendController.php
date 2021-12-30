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
use App\Models\SaveContact;
use Session;

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
        $partners = Partner::orderBy('id', 'DESC')->take(6)->get();
        $seekers = User::orderBy('created_at', 'desc')->take(3)->get();
        $companies = Company::all();
        $title_event = NewsEvent::get()->first();
        $events = NewsEvent::take(2)->skip(1)->get();
        return view('frontend.home', compact('partners','seekers','companies','events','title_event'));
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

    public function partners()
    {
        $partners = Partner::all();
        return view('frontend.partners', compact('partners'));
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
    public function communityDetails($id){
        $community  = Community::where('id',$id)->first();
        return view('frontend.community-detail', compact('community'));
    }
    // public function userLogin(){
    //     return view('auth.login');
    // }
    public function events(){
        //$events = NewsEvent::all();
        $title_event = NewsEvent::get()->first();
        $events = NewsEvent::skip(1)->take(5)->get();
        return view('frontend.events', compact('events','title_event'));
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

    public function doForgotPassword(Request $request){
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
            $data['url_link'] = \URL::to('/pswreset/'.$encode_id);

            $mail = \Mail::send('emails.forgot_password',$data, function($message) use ($email) {
                $message->from('developer@visibleone.com', 'Lobahn Technology Limited');
                $message->to($email)
                    ->subject('Reset New Password !');
            });
            return redirect()->back()->with('success','Please check your email to reset password');
        }else{
            return redirect()->back()->with('error','Invalid Email.');
        }

    }

    public function pswreset($code){

        $code = "MjE=";
        // try{
        //     $login_id=(Session::has('user'))? Session::get('user')['id']:0;
        //     $login_name =(Session::has('user'))? Session::get('user')['name']:'';

        //     return view('web.myaccount.pwforgot',['code'=>$code,'login_id'=>$login_id,
        //         'login_name'=>$login_name,
        //     ]);
        // }
        // catch(\Exception $ex) {
        //     return $nlog->Log("Error", $ex->getMessage(), "error", $ex);
        // }
        return view('frontend.pswreset',compact('code'));
    }
    public function doResetPassword(Request $request){
        try{
            $code=($request->has('code'))? $request->input('code'):'';
            $login_id=(Session::has('user'))? Session::get('user')['id']:'';

            if($login_id ==''){
               $login_id = base64_decode($code);
            }

            $password =($request->has('old_password'))? $request->input('old_password'):'';

            $user=User::find($login_id);          
            $name =isset($user->name)? $user->name:'';
            $email =isset($user->email)? $user->email:'';
            //dd($password);

            $new_password=($request->has('new_password'))? $request->input('new_password'):'';
            $confirm_password=($request->has('confirm_password'))? $request->input('confirm_password'):'';
              
            if($new_password == $confirm_password){
                #check old password
                $user=User::find($login_id);
                if(isset($user->id)){
                    $user_detail =array('id' =>$login_id, 'password' => $password);
                    if($code != ''){
                       $user->password=\Hash::make($new_password);
                       $user->save();                       
                        return redirect()->back()
                                ->with('success','The modificateion was saved successfully.');
                    }
                    if(\Auth::guard('frotend')->attempt($user_detail)){
                       $user->password=\Hash::make($new_password);
                       $user->save();                       
                        return redirect()->back()
                                ->with('type',2)
                                ->with('success-message','The modificateion was saved successfully.');
                    }
                    else{

                       $error='Invalid password.';
                        return redirect()->back()
                            ->with('type',2)
                            ->with('error',$error);
                    }
                 }
                 else{
                  $error='Invalid user.';
                    return redirect()->back()
                        ->with('type',2)
                        ->with('error',$error);
                 }
              }
              else{
                $error='New password is not match confirm password.';
                return redirect()->back()
                        ->with('type',2)
                        ->with('error',$error);
              }                     

        }
        catch(\Exception $ex) {
            return $nlog->Log("Error", $ex->getMessage(), "error", $ex);
        }
    }

    public function connect(){
        $communities = Community::all();
        return view('frontend.connect', compact('communities'));
    }
    public function service(){
        $communities = Community::all();
        return view('frontend.services', compact('communities'));
    }
    public function contact(){
        $contact = Contact::take(1)->first();
        return view('frontend.contact', compact('contact'));
    }

    public function membership(){
        return view('frontend.membership');
    }

    public function about(){
        return view('frontend.about');
    }
    public function saveContact(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            // 'name' => 'required',            
            // 'phone' => 'required',
            // 'comment' => 'required'
        ]);

        $contact = new SaveContact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->comment = $request->comment;
        $contact->save();
        
        \Mail::send('emails.contact_email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'comment' => $request->get('comment'),
            ), function($message) use ($request){
                    $message->from($request->email);
                    $message->to('visibleone.max@gmail.com');
                    $message->subject('Contact Mail');
               });

        return back()->with('success', 'Thank you for contact us!');
    }

    public function eventRegister(Request $request,$id){
        $this->validate($request, [
            'email' => 'required|email',
            // 'name' => 'required',            
            // 'phone' => 'required',
            // 'comment' => 'required'
        ]);
        dd($request->all());
        $register = new EventRegister;
        $register->event_id = $id;
        $register->user_name = $request->name;
        $register->user_email = $request->email;
        $register->save();
        
       //  \Mail::send('emails.contact_email',
       //      array(
       //          'name' => $request->get('name'),
       //          'email' => $request->get('email'),
       //          'comment' => $request->get('comment'),
       //      ), function($message) use ($request){
       //      $message->from($request->email);
       //      $message->to('visibleone.max@gmail.com');
       //      $message->subject('Contact Mail');
       // });

        return back()->with('success', 'Thank you for contact us!');
    }
}
