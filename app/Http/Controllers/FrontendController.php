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
use Illuminate\Pagination\Paginator;
use App\Models\SiteSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Country;
use App\Models\JobType;
use App\Models\JobShift;
use App\Models\CarrierLevel;
use App\Models\JobExperience;
use App\Models\DegreeLevel;
use App\Models\Geographical;
use App\Models\Language;
use App\Models\JobSkill;
use App\Models\StudyField;
use App\Models\Qualification;
use App\Models\KeyStrength;
use App\Models\JobTitle;
use App\Models\Institution;
use App\Helpers\MiscHelper;
use App\Models\CareerPartner;
use App\Models\Connect;
use App\Models\Industry;
use App\Models\FunctionalArea;
use App\Models\Membership;
use App\Models\Meta;
use App\Models\TalentDiscovery;
use App\Models\Payment;
use App\Traits\EmailTrait;
use App\Models\PaymentMethod;

class FrontendController extends Controller{

    use EmailTrait;

    public function __construct(){
        // $this->middleware('auth');
    }

    public function index(){
        $banners = Banner::all();
        $partners = Partner::orderBy('id', 'DESC')->get();
        $seekers = User::orderBy('created_at', 'desc')->where('feature_member_display','1')->get();
        $companies = Company::all();
        $title_event = NewsEvent::latest('created_at')->first();

        
        $events = NewsEvent::take(2)->skip(1)->latest('created_at')->get();

        $first = User::orderBy('created_at', 'asc')->where('feature_member_display','1')->first();
        $latest = User::orderBy('created_at', 'desc')->where('feature_member_display', '1')->skip(1)->take(1)->first();
        return view('frontend.home', compact('partners','seekers','companies','events','title_event','banners', 'first', 'latest'));
    }
    public function news(Request $request){
        //dd($request->all());
        //$news = News::all();
        $categories = NewsCategory::all();
        $news = News::orderBy('id','desc');

        $categoryName = '';
        if (isset($request->category)) {
            $categoryName = $request->category;
            $news->whereHas('category',function($query) use ($categoryName){
                $query->where('category_name', $categoryName);
            });
            //$news->where('category_id',$request->category);
        }
        $news = $news->paginate(3);
        $news->appends(['category' => $categoryName])->links();
        return view('frontend.news', compact('news','categories', 'categoryName'));
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
        $communities = Community::paginate(10);
        return view('frontend.community', compact('communities'));
    }

    public function communityPost(Request $request){
        Community::create([
            "title" => $request->title,
            "category" => $request->category,
            "description" => $request->description,
            "started_date" => Carbon::now(),
            "user_id" => $request->user_id,
            "company_id" => $request->company_id
        ]);
        Session::put('posted', 'posted');
        return redirect()->back();
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
        $events = NewsEvent::skip(1)->where('event_date', '<', Carbon::now())->orderby('id', 'desc')->paginate(6);
        $years = NewsEvent::groupBy('event_year')->pluck('event_year');
        $events = NewsEvent::orderBy('id','desc');
        
        if (isset($request->year)) {
            $events->where('event_year',$request->year);
        }
        $events = $events->paginate(6);
        $upCommingEvents = NewsEvent::where('event_date', '>', Carbon::now())->orderby('id', 'desc')->take(2)->get();
        
        return view('frontend.events', compact('events','title_event','years', 'upCommingEvents'));
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
        $meta = Meta::where('page_url','connect')->first();
        $connect = Connect::first();
        $communities = Community::all();
        return view('frontend.connect', compact('communities','meta','connect'));
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
        
        $packages = Package::where('package_type','premium')->where('package_for','individual')->get();
        $meta = Meta::where('page_url','connect')->first();
        $membership = Membership::first();
        return view('frontend.membership-individual', compact('packages','meta', 'membership'));
    }

    public function corporateMembership(){
        
        $normal_package = Package::where('package_type','premium')->where('package_for','corporate')->where('package_num_days','90')->first();
        $percentage_package = Package::where('package_type','premium')->where('package_for','corporate')->where('taking_percent','!=',null)->first();
        return view("frontend.membership-corporate",compact('normal_package','percentage_package'));
    }

    public function about(){
        return view('frontend.about');
    }
    public function saveContact(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $contact = new SaveContact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->comment = $request->comment;
        $contact->save();
        $mail_to = SiteSetting::first()->mail_to_address;
        Mail::send('emails.contact_email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'comment' => $request->get('comment'),
            ), function($message) use ($request,$mail_to){
                    $message->from($request->email);
                    $message->to($mail_to);
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


        $event = NewsEvent::where('id',$request->event_id)->first();
        $title = $event->event_title;
        $image = $event->event_image;
        $date = $event->event_date;
        $time = $event->event_time;
        $this->registerEvent($register->event_id,$register->user_email,$register->user_name,$title,$image,$date,$time);

        return back()->with('success', 'Congratulaions, You have successfully registered!');
    }

    public function search()
    {
        $keyword = $_GET['keyword'];
        $keywords = Keyword::where('keyword_name',$keyword)->orWhere('keyword_name', 'like', '%' .$keyword. '%')->get();
        $events = NewsEvent::where('event_title',$keyword)->orWhere('event_title', 'like', '%' .$keyword. '%')->orWhere('description', 'like', '%' .$keyword. '%')->get();
        $news = News::where('title',$keyword)->orWhere('title', 'like', '%' .$keyword. '%')->orWhere('description', 'like', '%' .$keyword. '%')->get();
        $results = $keywords->merge($events)->merge($news)->paginate(15);
        $result_count = $keywords->merge($events)->merge($news);
        
        // $results = new \Illuminate\Pagination\Paginator($all, 3);
        $results->appends(['keyword' => $keyword])->links();
        $data = [
            'keyword' => $keyword,
            'results' => $results,
            'result_count' => $result_count
        ];
        
        return view("frontend.search",$data);
        //return response()->json(array("count"=>$count,"data"=>$data),200);
    }

    public function partner()
    {
        $meta = Meta::where('page_url','career-partner')->first();
        $careerPartner = CareerPartner::first();
        $packages = Package::where('package_for','individual')->where('package_type','premium')->get();
        return view("frontend.career-partner",compact('meta', 'careerPartner','packages'));
    }

    public function partnerParchase()
    {
        $packages = Package::where('package_type','premium')->where('package_for','individual')->get();
        $stripe_key = SiteSetting::first()->stripe_key;
        $data= [
            'packages' => $packages,
            'stripe_key' => $stripe_key,
        ];
        return view("frontend.career-partner-parchase",$data);
    }

    public function partnerParchaseComplete(Request $request)
    {
        $user = User::where('id',$request->user_id)->first();
        $user->is_featured = true;
        $user->save();
       
        $email = $user->email;
        $name = $user->name;
        $type = "Individual";
        $payment = Payment::where('user_id',$request->user_id)->latest('created_at')->first();
        $package = Package::where('id',$payment->package_id)->first();
        $plan_name = $package->package_title;
        $invoice_num = $payment->invoice_num;
        $start_date = $payment->package_start_date;
        $end_date = $payment->package_end_date;
        $amount = $package->package_price;

        $payment = new Payment();
        $payment->user_id = $user->id;
        $payment->invoice_num = $invoice_num;
        $payment->payment_method_id = PaymentMethod::where('payment_name','GooglePay')->first()->id;
        $payment->package_id = $package;
        $payment->package_start_date = $start_date;
        $payment->package_end_date = $end_date;
        $payment->save();

        // Email Notification
        $this->recipt($email,$name,$type,$plan_name,$invoice_num,$start_date,$end_date,$amount);

        Session::flash('status', 'register-success');
        return redirect()->back();
    }

    public function discovery()
    {
        $meta = Meta::where('page_url','talent-discovery')->first();
        $talentDiscovery = TalentDiscovery::first();
        $normal_package = Package::where('package_type','premium')->where('package_for','corporate')->where('package_num_days','90')->first();
        $percentage_package = Package::where('package_type','premium')->where('package_for','corporate')->where('taking_percent','!=',null)->first();
        return view("frontend.talent-discovery",compact('meta', 'talentDiscovery','normal_package','percentage_package'));
    }

    public function discoveryParchase()
    {
        $packages = Package::where('package_type','premium')->where('package_for','corporate')->where('taking_percent','=',NULL)->get();
        $stripe_key = SiteSetting::first()->stripe_key;
        $data= [
            'packages' => $packages,
            'stripe_key' => $stripe_key,
        ];
        return view("frontend.talent-discovery-parchase",$data);
    }

    public function discoveryParchaseComplete(Request $request)
    {
        $company = Company::where('id',$request->user_id)->first();
        $company->is_featured = true;
        $company->save();

        // Email Notification
        $email = $company->email;
        $name = $company->name;
        $type = "Corporate";
        $payment = Payment::where('company_id',$request->user_id)->latest('created_at')->first();
        $package = Package::where('id',$payment->package_id)->first();
        $plan_name = $package->package_title;
        $invoice_num = $payment->invoice_num;
        $start_date = $payment->package_start_date;
        $end_date = $payment->package_end_date;
        $amount = $package->package_price;

        $payment = new Payment();
        $payment->user_id = $company->id;
        $payment->invoice_num = $invoice_num;
        $payment->payment_method_id = PaymentMethod::where('payment_name','GooglePay')->first()->id;
        $payment->package_id = $package;
        $payment->package_start_date = $start_date;
        $payment->package_end_date = $end_date;
        $payment->save();

        // Email Notification
        $this->recipt($email,$name,$type,$plan_name,$invoice_num,$start_date,$end_date,$amount);

        Session::flash('status', 'register-success');
        return redirect()->back();
    }
}