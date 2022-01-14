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
use App\Models\EventRegister;
use App\Models\Package;
use App\Models\Keyword;
use App\Models\Event;

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
        $banners = Banner::first();
        $partners = Partner::orderBy('id', 'DESC')->get();
        $seekers = User::orderBy('created_at', 'desc')->where('feature_member_display','1')->take(3)->get();
        $companies = Company::all();
        $title_event = NewsEvent::get()->first();
        $events = NewsEvent::take(2)->skip(1)->get();
        return view('frontend.home', compact('partners','seekers','companies','events','title_event','banners'));
    }
    public function news(Request $request){
        //dd($request->all());
        //$news = News::all();
        $categories = NewsCategory::all();
        $news = News::orderBy('id','desc');
        
        if (isset($request->category)) {
            $category = $request->category;
            $news->whereHas('category',function($query) use ($category){
                $query->where('category_name',$category);
            });
            //$news->where('category_id',$request->category);
        }
        $news = $news->paginate(8);
        return view('frontend.news', compact('news','categories'));
    }

    public function newsDetails($id){
        $new  = News::where('id',$id)->first();
        // get previous user id
        $previous = News::where('id', '<', $new->id)->max('id');
        // get next user id
        $next = News::where('id', '>', $new->id)->min('id');
        $latest = News::latest()->first();
        $last_id = $latest->id;
        $first = News::first();
        $first_id = $first->id;
        return view('frontend.news-detail', compact('new','previous','next','last_id','first_id'));
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
    public function events(Request $request){
        //$events = NewsEvent::all();        
        $title_event = NewsEvent::get()->first();
        $events = NewsEvent::skip(1)->paginate(6);
        // $events = NewsEvent::orderBy('id','desc');
        
        // if (isset($request->year)) {
        //     $events->where('event_year',$request->year);
        // }
        // $events = $events->paginate(8);
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
        $monthly_plan = Package::where('package_for','corporate')
                    ->where('package_num_listings','1')
                    ->first();
        $annual_plan = Package::where('package_for','corporate')
                    ->where('package_num_listings','3')
                    ->first();
        $two_year_plan = Package::where('package_for','corporate')
                     ->where('package_num_listings','2')
                     ->first();
        $services = Package::where('package_for','corporate')->get();
        return view('frontend.services', compact('monthly_plan','annual_plan','two_year_plan','services'));
    }
    public function individualService(){
        $monthly_plan = Package::where('package_for','individual')
                    ->where('package_num_listings','1')
                    ->first();
        $annual_plan = Package::where('package_for','individual')
                    ->where('package_num_listings','3')
                    ->first();
        $two_year_plan = Package::where('package_for','individual')
                     ->where('package_num_listings','2')
                     ->first();
        $services = Package::where('package_for','individual')->get();
        return view('frontend.individual-member-services', compact('monthly_plan','annual_plan','two_year_plan','services'));
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

     public function eventRegister(Request $request){
        $register = new EventRegister;
        $register->event_id = $request->event_id;
        $register->user_name = $request->user_name;
        $register->user_email = $request->user_email;
        $register->guests_number = $request->guests_number;
        $register->save();

        Mail::send('emails.event_register', ['register' => $register],
            function ($m) use ($register){
                $m->from('max@visibleone.com', 'Lobahn Technology');
                $m->to($register->user_email,$register->user_name)->subject('Register Successfully Mail !');
        });

        return back()->with('success', 'Congratulaions, You have successfully registered!');
    }

    public function searchForm()
    {
        // $keywords = Keyword::where('keyword_name',$request->keyword)->orWhere('keyword_name', 'like', '%' .$request->keyword. '%')->get();
        // $events = Event::where('event_name',$request->keyword)->orWhere('event_name', 'like', '%' .$request->keyword. '%')->orWhere('description', 'like', '%' .$request->keyword. '%')->get();
        // $news = News::where('title',$request->keyword)->orWhere('title', 'like', '%' .$request->keyword. '%')->orWhere('description', 'like', '%' .$request->keyword. '%')->get();
        // $result = $keywords->merge($events)->merge($news);
        // $data = [
        //     'result' => $result,
        // ];
        // return view("frontend.search",$data);

        //return view("frontend.search");
    }

    public function search()
    {
        $keyword = $_GET['keyword'];
        $keywords = Keyword::where('keyword_name',$keyword)->orWhere('keyword_name', 'like', '%' .$keyword. '%')->get();
        $events = Event::where('event_name',$keyword)->orWhere('event_name', 'like', '%' .$keyword. '%')->orWhere('description', 'like', '%' .$keyword. '%')->get();
        $news = News::where('title',$keyword)->orWhere('title', 'like', '%' .$keyword. '%')->orWhere('description', 'like', '%' .$keyword. '%')->get();
        $results = $keywords->merge($events)->merge($news);
        $data = [
            'keyword' => $keyword,
            'results' => $results,
        ];
        return view("frontend.search",$data);
        //return response()->json(array("count"=>$count,"data"=>$data),200);
    }

    // public function search(Request $request)
    // {
    //     $keywords = Keyword::where('keyword_name',$request->keyword)->orWhere('keyword_name', 'like', '%' .$request->keyword. '%')->get();
    //     $events = Event::where('event_name',$request->keyword)->orWhere('event_name', 'like', '%' .$request->keyword. '%')->orWhere('description', 'like', '%' .$request->keyword. '%')->get();
    //     $news = News::where('title',$request->keyword)->orWhere('title', 'like', '%' .$request->keyword. '%')->orWhere('description', 'like', '%' .$request->keyword. '%')->get();
    //     $results = $keywords->merge($events)->merge($news);
    //     $data = [
    //         'keyword' => $request->keyword,
    //         'results' => $results,
    //     ];
    //     return view("frontend.search",$data);
    //     //return response()->json(array("count"=>$count,"data"=>$data),200);
    // }
}
