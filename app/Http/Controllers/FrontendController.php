<?php

namespace App\Http\Controllers;
use DB;
use Mail;
use Session;
use Carbon\Carbon;
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
use App\Models\SiteSetting;
use App\Models\Country;
use App\Models\JobType;
use App\Models\JobShift;
use App\Models\Meta;
use App\Models\Payment;
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
use App\Models\CareerPartner;
use App\Models\Connect;
use App\Models\Industry;
use App\Models\FunctionalArea;
use App\Models\Membership;
use App\Models\TalentDiscovery;
use App\Models\PaymentMethod;
use App\Models\Opportunity;
use App\Models\CommunityLike;
use App\Models\NewsLike;
use App\Models\SuitabilityRatio;
use App\Models\Notification;
use App\Helpers\MiscHelper;
use App\Traits\EmailTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class FrontendController extends Controller{
    use EmailTrait;

    public function index(){
        $seekers = User::where('on_carousel','1')->get()->take(5);
        $opportunities = Opportunity::where('on_carousel','1')->get()->take(5);
        $data = [
            'banners' => Banner::all(),
            'seekers' => $seekers,
            'first'   => count($seekers)>=5 ? $seekers[4] : NULL,
            'latest' =>  count($seekers)>=5 ? $seekers[1]:NULL,
            'opportunities' => $opportunities,
            'first_opporunity' => count($opportunities)>=5 ? $opportunities[4] : NULL,
            'latest_opporunity' => count($opportunities)>=5 ? $opportunities[1]:NULL,
            'companies' => Company::all(),
            'event' => NewsEvent::latest('id')->first()
        ];
        return view('frontend.home',$data);
    }

    public function news(Request $request){
        $categories = NewsCategory::all();
        $news = News::orderBy('id','desc');
        $categoryName = '';
        if (isset($request->category)) {
            $categoryName = $request->category;
            $news->whereHas('category',function($query) use ($categoryName){
                $query->where('category_name', $categoryName);
            });
        }
        $news = $news->paginate(3);
        $news->appends(['category' => $categoryName])->links();
        return view('frontend.news', compact('news','categories', 'categoryName'));
    }

    public function newsDetails($title,$id){
        $new  = News::where('id',$id)->first();
        // get previous user id
        $previous = News::where('id', '<', $new->id)->max('id');
        // get next user id
        $next = News::where('id', '>', $new->id)->min('id');
        $latest = News::latest()->first();
        $last_id = $latest->id;
        $first = News::first();
        $first_id = $first->id;
        //return $new;
        return view('frontend.news-detail', compact('new','previous','next','last_id','first_id'));
    }

    public function newsLike(Request $request)
    {
        $is_exist = NewsLike::where('user_id',$request->user_id)->where('news_id',$request->news_id)->first();
        if(!$is_exist)
        {
            $newsLike = new NewsLike();
            $newsLike->user_id = $request->user_id; 
            $newsLike->news_id = $request->news_id; 
            $newsLike->user_type = $request->user_type;
            $newsLike->like_date = now();
            $newsLike->save();
            $news = News::where('id',$request->news_id)->first();
            $news->like = $news->like+1;
            $news->save();
            $status = "liked";
        }
        else {
            $news = News::where('id',$request->news_id)->first();
            $news->like = $news->like-1;
            $news->save();
            NewsLike::where('user_id',$request->user_id)->where('news_id',$request->news_id)->delete();
            $status = " ";
        }
        $like_count = News::where('id',$request->news_id)->first()->like;
        return response()->json(array('like_count'=> $like_count,'status'=>$status), 200);
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
        $communities = Community::where('approved',true)->latest('created_at')->paginate(8);
        $status = NULL;
        return view('frontend.community', compact('communities','status'));        
    }

    public function communityMostLiked()
    {
        $communities = Community::where('approved',true)->orderby('like', 'desc')->paginate(8);
        $status = 'liked';
        return view('frontend.community', compact('communities','status'));
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

    public function checkNotification(Request $request)
    {
        $notification = Notification::where('candidate_id',$request->candidate_id)->where('corporate_id',$request->corporate_id)->where('opportunity_id',$request->opportunity_id)->first();
        $request->type == 'corporate' ? $notification->corportate_viewed = true : $notification->candidate_viewed = true; ;
        $notification->save();
        $msg = "Success";
        return response()->json(array('msg'=> $msg), 200);
    }

    public function communityLike(Request $request)
    {
        $is_exist = CommunityLike::where('user_id',$request->user_id)->where('community_id',$request->community_id)->first();
        if(!$is_exist)
        {
            $communityLike = new CommunityLike();
            $communityLike->user_id = $request->user_id; 
            $communityLike->community_id = $request->community_id; 
            $communityLike->user_type = $request->user_type;
            $communityLike->like_date = now();
            $communityLike->save();
            $community = Community::where('id',$request->community_id)->first();
            $community->like = $community->like+1;
            $community->save();
            $status = "liked";
        }
        else {
            $community = Community::where('id',$request->community_id)->first();
            $community->like = $community->like-1;
            $community->save();
            CommunityLike::where('user_id',$request->user_id)->where('community_id',$request->community_id)->delete();
            $status = " ";
        }
        $like_count = Community::where('id',$request->community_id)->first()->like;
        return response()->json(array('like_count'=> $like_count,'status'=>$status), 200);
    }

    public function communityDetails($title,$id){
        $community  = Community::where('id',$id)->first();
        return view('frontend.community-detail', compact('community'));
    }
  
    public function events(Request $request){    
        $title_event = NewsEvent::where('event_date', '<', Carbon::now())->orderby('event_date','desc')->get()->first();
        if($title_event)
        $events = NewsEvent::where('event_date', '<', Carbon::now())->where('id','!=', $title_event->id)->orderby('event_date', 'desc');
        else 
        $events = NewsEvent::where('event_date', '<', Carbon::now())->orderby('event_date', 'desc');
        $years = NewsEvent::groupBy('event_year')->pluck('event_year');
        if (isset($request->year)) {
            $events->where('event_year',$request->year);
        }
        $events = $events->paginate(5);
        $upCommingEvents = NewsEvent::where('event_date', '>', Carbon::now())->latest('id')->take(2)->get();
        return view('frontend.events', compact('events','title_event','years', 'upCommingEvents'));
    }

    public function eventDetails($id){
        $event  = NewsEvent::where('id',$id)->first();
        return view('frontend.event-detail', compact('event'));
    }

    public function pswforgot(Request $request){        
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
                        return redirect()->back()->with('success','The modificateion was saved successfully.');
                    }
                    if(\Auth::guard('frotend')->attempt($user_detail)){
                        $user->password=\Hash::make($new_password);
                        $user->save();                       
                        return redirect()->back()->with('type',2)->with('success-message','The modificateion was saved successfully.');
                    }
                    else{
                        $error='Invalid password.';
                        return redirect()->back()->with('type',2)->with('error',$error);
                    }
                 }
                 else{
                  $error='Invalid user.';
                    return redirect()->back()->with('type',2)->with('error',$error);
                 }
              }
              else{
                $error='New password is not match confirm password.';
                return redirect()->back()->with('type',2)->with('error',$error);
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
        
        $packages = Package::where('package_type','basic')->where('package_for','individual')->get();
        $meta = Meta::where('page_url','connect')->first();
        $membership = Membership::first();
        return view('frontend.membership-individual', compact('packages','meta', 'membership'));
    }

    public function corporateMembership(){
        
        $normal_packages = Package::where('package_type','basic')->where('package_for','corporate')->get();
        $percentage_package = Package::where('package_type','premium')->where('package_for','corporate')->where('taking_percent','!=',null)->first();
        return view("frontend.membership-corporate",compact('normal_packages','percentage_package'));
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
              
        return back()->with('success', 'Thank you for contacting us.');
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
                $m->from('max@visibleone.com', 'Lobahn Technology Limited');
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
        $results->appends(['keyword' => $keyword])->links();
        $data = [
            'keyword' => $keyword,
            'results' => $results,
            'result_count' => $result_count
        ];
        return view("frontend.search",$data);
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
        if(Auth::user())
        {
        if(Auth::user()->is_trial) return redirect()->route('make-payment');
        if(Auth::user()->is_featured) return redirect('home');
        $packages = Package::where('package_type','premium')->where('package_for','individual')->get();
        $stripe_key = SiteSetting::first()->stripe_key;
        $data= [
            'packages' => $packages,
            'stripe_key' => $stripe_key,
        ];
        return view("frontend.career-partner-parchase",$data);
        }
        else 
        {
            return redirect()->route('talent-discovery');
        }
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
        if(Auth::guard('company')->user())
        {
            if(Auth::guard('company')->user()->is_trial) return redirect()->route('make-payment');
            if(Auth::guard('company')->user()->is_featured) return redirect('company-home');

            $packages = Package::where('package_type','premium')->where('package_for','corporate')->where('taking_percent','=',NULL)->get();
            $stripe_key = SiteSetting::first()->stripe_key;
            $data= [
                'packages' => $packages,
                'stripe_key' => $stripe_key,
            ];
            return view("frontend.talent-discovery-parchase",$data);
        }
        else 
        {
            return redirect()->route('career-partner');
        }
        
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


    public function jsrTest()
    {
        $ratios = SuitabilityRatio::get();
        $tsr_percent = $psr_percent = 0;
        $tsr_score = $psr_score = 0;

        $matched_factors = [];

        $opportunity =Opportunity::find(116);
        $seeker =User::find(3);
    

        // 1 Location (checked)

        // if(is_null($opportunity->country_id) || is_null($seeker->country_id))
        // {   
        //     //empty data
        //     if(!is_null($opportunity->country_id))
        //     {
        //         $psr_score += $ratios[0]->position_num;
        //         $psr_percent += $ratios[0]->position_percent;         
        //     }
        //     else {
        //         $tsr_score += $ratios[0]->talent_num;
        //         $tsr_percent += $ratios[0]->talent_percent;   
        //     }
        // }
        // elseif($opportunity->country_id == $seeker->country_id) 
        // {
        //     //match data
        //     $tsr_score += $ratios[0]->talent_num;
        //     $psr_score += $ratios[0]->position_num;

        //     $tsr_percent += $ratios[0]->talent_percent;
        //     $psr_percent += $ratios[0]->position_percent;

        //     $factor = "Location";
        //     array_push($matched_factors,$factor);
        // } 

        // 2 Contract terms (checked)
        // if(is_null($seeker->contract_term_id) || is_null($opportunity->job_type_id))
        //     {
        //         // Data Empty
        //         if(!is_null($opportunity->job_type_id))
        //         {
        //             $psr_score += $ratios[1]->position_num;
        //             $psr_percent += $ratios[1]->position_percent; 
        //         }
        //         else {
        //             $tsr_score += $ratios[1]->talent_num;
        //             $tsr_percent += $ratios[1]->talent_percent;
        //         }
        //     }
        // elseif(is_array(json_decode($seeker->contract_term_id)) && is_array(json_decode($opportunity->job_type_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->contract_term_id), json_decode($opportunity->job_type_id)))) 
        //         {
        //             // Data Match
        //             $tsr_score += $ratios[1]->talent_num;
        //             $psr_score += $ratios[1]->position_num;

        //             $tsr_percent += $ratios[1]->talent_percent;
        //             $psr_percent += $ratios[1]->position_percent;

        //             $factor = "Contract Terms";
        //             array_push($matched_factors,$factor);
        //         }
        //     }
            
        // // 3 Target pay (checked)

        // $is_null = false;
        // $fulltime_status = $parttime_status = $freelance_status = false;
        // $fulltime_check = (is_null($seeker->full_time_salary) || is_null($opportunity->full_time_salary)) ?  true : false;
        // $parttime_check = (is_null($seeker->part_time_salary) || is_null($opportunity->part_time_salary)) ?  true : false;
        // $freelance_check = (is_null($seeker->freelance_salary) || is_null($opportunity->freelance_salary)) ?  true : false;
        // $is_null = $fulltime_check && $parttime_check && $freelance_check && $target_check ?  true: false ;
        // if($is_null)
        // {
        //     // Data Empty 

        //     $tsr_score += $ratios[2]->talent_num;
        //     $psr_score += $ratios[2]->position_num;

        //     $tsr_percent += $ratios[2]->talent_percent;
        //     $psr_percent += $ratios[2]->position_percent; 
        // }
        // elseif( (!is_null($opportunity->full_time_salary) && !is_null($seeker->full_time_salary) ) &&  $opportunity->full_time_salary >= $seeker->full_time_salary && $seeker->full_time_salary <= $opportunity->full_time_salary_max)
        // {
        //     // Fulltime Salry Match
        //     $fulltime_status = true;
        // }

        // elseif( (!is_null($opportunity->part_time_salary) && !is_null($seeker->part_time_salary) ) && $opportunity->part_time_salary >= $seeker->part_time_salary  && $seeker->part_time_salary <= $opportunity->part_time_salary_max)
        // {
        //     // Parttime Salry Match
        //     $parttime_status = true;
        // }

        // elseif((!is_null($opportunity->freelance_salary) && !is_null($seeker->freelance_salary)) && $opportunity->freelance_salary >= $seeker->freelance_salary  && $opportunity->freelance_salary <= $seeker->freelance_salary_max)
        // {
        //     // Freelance Salry Match
        //     $freelance_status = true;   
        // }

        // if($fulltime_status || $parttime_status || $freelance_status || $target_status)
        // {
        //     // At Least One Match
        //     $tsr_score += $ratios[2]->talent_num;
        //     $psr_score += $ratios[2]->position_num;

        //     $tsr_percent += $ratios[2]->talent_percent;
        //     $psr_percent += $ratios[2]->position_percent;

        //     $factor = "Salary";
        //     array_push($matched_factors,$factor);
        // }
     

        // // 4 Contract hours (checked)

        if(is_null($seeker->contract_hour_id) || is_null($opportunity->contract_hour_id))
            {
                // Data Empty
                if(!is_null($opportunity->contract_hour_id))
                {
                    $psr_score += $ratios[3]->position_num;
                    $psr_percent += $ratios[3]->position_percent; 
                }
                else {
                    $tsr_score += $ratios[3]->talent_num;
                    $tsr_percent += $ratios[3]->talent_percent;
                }
                
            }
        elseif(is_array(json_decode($seeker->contract_hour_id)) && is_array(json_decode($opportunity->contract_hour_id)))
            {
                if(!empty(array_intersect(json_decode($seeker->contract_hour_id), json_decode($opportunity->contract_hour_id)))) 
                {
                    // Data Match
                    $tsr_score += $ratios[3]->talent_num;
                    $psr_score += $ratios[3]->position_num;

                    $tsr_percent += $ratios[3]->talent_percent;
                    $psr_percent += $ratios[3]->position_percent;

                    $factor = "Contract Hour";
                    array_push($matched_factors,$factor);
                }
            }
        
        // // 5 Keywords (checked)

        // if(is_null($seeker->keyword_id) || is_null($opportunity->keyword_id))
        //     {
        //         // Data Empty
        //         if(!is_null($opportunity->keyword_id))
        //         {
        //             $psr_score += $ratios[4]->position_num;
        //             $psr_percent += $ratios[4]->position_percent;
        //         }
        //         else {
        //             $tsr_score += $ratios[4]->talent_num;
        //             $tsr_percent += $ratios[4]->talent_percent;
        //         } 
        //     }
        // elseif(is_array(json_decode($seeker->keyword_id)) && is_array(json_decode($opportunity->keyword_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->keyword_id), json_decode($opportunity->keyword_id)))) 
        //         {
        //             // Data Match
        //             $tsr_score += $ratios[4]->talent_num;
        //             $psr_score += $ratios[4]->position_num;

        //             $tsr_percent += $ratios[4]->talent_percent;
        //             $psr_percent += $ratios[4]->position_percent;

        //             $factor = "Keyword";
        //             array_push($matched_factors,$factor);
        //         }
        //     }

        // // 6 Management level (checked)

        // if(is_null($opportunity->carrier_level_id) || is_null($seeker->management_level_id))
        // {
        //     // empty data
        //     if(!is_null($opportunity->carrier_level_id))
        //     {
        //         $psr_score += $ratios[5]->position_num;
        //         $psr_percent += $ratios[5]->position_percent;
        //     }
        //     else {
        //         $tsr_score += $ratios[5]->talent_num;
        //         $tsr_percent += $ratios[5]->talent_percent;
        //     } 
        // }
        // elseif($seeker->carrier->priority >= $opportunity->carrier->priority-1)
        // {   
        //     // match data
        //     $tsr_score += $ratios[5]->talent_num;
        //     $psr_score += $ratios[5]->position_num;

        //     $tsr_percent += $ratios[5]->talent_percent;
        //     $psr_percent += $ratios[5]->position_percent;

        //     $factor = "Management Level";
        //     array_push($matched_factors,$factor);
        // }
        
        // // // 7 Years (checked)
        // if(is_null($opportunity->job_experience_id) || is_null($seeker->experience_id))
        // {   
        //     //empty data
        //     if(!is_null($opportunity->job_experience_id))
        //     {
        //         $psr_score += $ratios[6]->position_num;
        //         $psr_percent += $ratios[6]->position_percent;
        //     }
        //     else {
        //         $tsr_score += $ratios[6]->talent_num;
        //         $tsr_percent += $ratios[6]->talent_percent;
        //     }            
        // }
        // elseif($seeker->jobExperience->priority >= $opportunity->jobExperience->priority) 
        // {
        //     //match data
        //     $tsr_score += $ratios[6]->talent_num;
        //     $psr_score += $ratios[6]->position_num;

        //     $tsr_percent += $ratios[6]->talent_percent;
        //     $psr_percent += $ratios[6]->position_percent;

        //     $factor = "Experience";
        //     array_push($matched_factors,$factor);
        // } 
        

        // // 8 Educational level (checked)
        // if(is_null($opportunity->degree_level_id) || is_null($seeker->education_level_id))
        // {
        //     //empty data

        //     if(!is_null($opportunity->degree_level_id))
        //     {
        //         $psr_score += $ratios[7]->position_num;
        //         $psr_percent += $ratios[7]->position_percent;
        //     }
        //     else {
        //         $tsr_score += $ratios[7]->talent_num;
        //         $tsr_percent += $ratios[7]->talent_percent;
        //     }
        // }
        // elseif($seeker->degree->priority  >= $opportunity->degree->priority ) 
        // {   
        //     //empty data
        //     $tsr_score += $ratios[7]->talent_num;
        //     $psr_score += $ratios[7]->position_num;

        //     $tsr_percent += $ratios[7]->talent_percent;
        //     $psr_percent += $ratios[7]->position_percent;

        //     $factor = "Education";
        //     array_push($matched_factors,$factor);
        // }
    

        // // 9 Academic institutions (checked)

        // if(is_null($seeker->institution_id) || is_null($opportunity->institution_id))
        //     {
        //         // Data Empty
        //         if(!is_null($opportunity->institution_id))
        //         {
        //             $psr_score += $ratios[8]->position_num;
        //             $psr_percent += $ratios[8]->position_percent;
        //         }
        //         else {
        //             $tsr_score += $ratios[8]->talent_num;
        //             $tsr_percent += $ratios[8]->talent_percent;
        //         }  
        //     }
        // elseif(is_array(json_decode($seeker->institution_id)) && is_array(json_decode($opportunity->institution_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->institution_id), json_decode($opportunity->institution_id)))) 
        //         {
        //             // Data Match
        //             $tsr_score += $ratios[8]->talent_num;
        //             $psr_score += $ratios[8]->position_num;

        //             $tsr_percent += $ratios[8]->talent_percent;
        //             $psr_percent += $ratios[8]->position_percent;

        //             $factor = "Academic Institution";
        //             array_push($matched_factors,$factor);
        //         }
        //     }
        
        // // 10 Languages (checked)

        // $seeker_languages = LanguageUsage::where('user_id',$seeker->id)->get();
        // $opportunity_languages = LanguageUsage::where('job_id',$opportunity->id)->get();

        // if( count($seeker_languages)== 0 || count($opportunity_languages)== 0 )
        //     {
        //         if(!is_null($opportunity))
        //         {
        //             $psr_score += $ratios[9]->position_num;
        //             $psr_percent += $ratios[9]->psr_percent;
        //         }
        //         else {
        //             $tsr_score += $ratios[9]->talent_num;
        //             $tsr_percent += $ratios[9]->tsr_percent;  
        //         }    
        //     }
        // else 
        //     {
        //         foreach($seeker_languages as $seeker_language)
        //         {
        //             foreach($opportunity_languages as $opportunity_language)
        //             {
        //             if($seeker_language->language_id ==  $opportunity_language->language_id &&  $seeker_language->priority >= $opportunity_language->priority)
        //             {
        //                     $tsr_score += $ratios[9]->talent_num;
        //                     $psr_score += $ratios[9]->position_num;
        //                     $tsr_percent += $ratios[9]->tsr_percent;
        //                     $psr_percent += $ratios[9]->psr_percent;

        //                     $factor = "Language";
        //                     array_push($matched_factors,$factor);

        //                     break 2;
        //             }
        //             }
        //         }
        //     }
        
        // // 11 Geographic experience (checked)

        // if(is_null($seeker->geographical_id) || is_null($opportunity->geographical_id))
        //     {
        //         // Data Empty

        //         if(!is_null($opportunity->geographical_id))
        //         {
        //             $psr_score += $ratios[10]->position_num;
        //             $psr_percent += $ratios[10]->position_percent; 
        //         }
        //         else {
        //             $tsr_score += $ratios[10]->talent_num;
        //             $tsr_percent += $ratios[10]->talent_percent;
        //         }
                
        //     }
        // elseif(is_array(json_decode($seeker->geographical_id)) && is_array(json_decode($opportunity->geographical_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->geographical_id), json_decode($opportunity->geographical_id)))) 
        //         {
        //             // Data Match
        //             $tsr_score += $ratios[10]->talent_num;
        //             $psr_score += $ratios[10]->position_num;

        //             $tsr_percent += $ratios[10]->talent_percent;
        //             $psr_percent += $ratios[10]->position_percent;

        //             $factor = "Geographic experience";
        //             array_push($matched_factors,$factor);
        //         }
        //     }
        
        // // 12 People management (checked)
 
        // if(is_null($opportunity->people_management) || is_null($seeker->people_management_id))
        // {
        //     // Data Empty

        //     if(!is_null($opportunity->people_management))
        //     {
        //         $psr_score += $ratios[11]->position_num;
        //         $psr_percent += $ratios[11]->position_percent; 
        //     }
        //     else {
        //         $tsr_score += $ratios[11]->talent_num;
        //         $tsr_percent += $ratios[11]->talent_percent;
        //     }
            
        // }
        // elseif( $seeker->peopleManagementLevel->priority >= $opportunity->peopleManagementLevel->priority-1 )
        // {
        //     // Data Match
        //     $tsr_score += $ratios[11]->talent_num;
        //     $psr_score += $ratios[11]->position_num;

        //     $tsr_percent += $ratios[11]->talent_percent;
        //     $psr_percent += $ratios[11]->position_percent;

        //     $factor = "People Management Level";
        //     array_push($matched_factors,$factor);
        // }
       

        // // 13 Software & tech knowledge (checked)

        // if(is_null($seeker->skill_id) || is_null($opportunity->job_skill_id))
        //     {
        //         // Data Empty
        //         if(!is_null($opportunity->job_skill_id))
        //         {
        //             $psr_score += $ratios[12]->position_num;
        //             $psr_percent += $ratios[12]->position_percent;
        //         }
        //         else {
        //         }
        //         $tsr_score += $ratios[12]->talent_num;
        //         $tsr_percent += $ratios[12]->talent_percent;
                 
        //     }
        // elseif(is_array(json_decode($seeker->skill_id)) && is_array(json_decode($opportunity->job_skill_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->skill_id), json_decode($opportunity->job_skill_id)))) 
        //         {
        //             // Data Match
        //             $tsr_score += $ratios[12]->talent_num;
        //             $psr_score += $ratios[12]->position_num;

        //             $tsr_percent += $ratios[12]->talent_percent;
        //             $psr_percent += $ratios[12]->position_percent;

        //             $factor = "Skill";
        //             array_push($matched_factors,$factor);
        //         }
        //     }
        
        // // 14 Fields of study (checked)

        // if(is_null($seeker->field_study_id) || is_null($opportunity->field_study_id))
        //     {
        //         // Data Empty 
        //         if(!is_null($opportunity->field_study_id))
        //         {
        //             $psr_score += $ratios[13]->position_num;
        //             $psr_percent += $ratios[13]->position_percent; 
        //         }
        //         else {
        //             $tsr_score += $ratios[13]->talent_num;
        //             $tsr_percent += $ratios[13]->talent_percent;
        //         }
                 
        //     }
        // elseif(is_array(json_decode($seeker->field_study_id)) && is_array(json_decode($opportunity->field_study_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->field_study_id), json_decode($opportunity->field_study_id)))) 
        //         {
        //             // Data Match
        //             $tsr_score += $ratios[13]->talent_num;
        //             $psr_score += $ratios[13]->position_num;

        //             $tsr_percent += $ratios[13]->talent_percent;
        //             $psr_percent += $ratios[13]->position_percent;

        //             $factor = "Fields of Study";
        //             array_push($matched_factors,$factor);
        //         }
        //     }
        
        // // 15 Qualifications & certifications (checked)

        // if(is_null($seeker->qualification_id) || is_null($opportunity->qualification_id))
        //     {
        //         // Data Empty
        //         if(!is_null($opportunity->qualification_id))
        //         {
        //             $psr_score += $ratios[14]->position_num;
        //             $psr_percent += $ratios[14]->position_percent; 
        //         }
        //         else {
        //             $tsr_score += $ratios[14]->talent_num;
        //             $tsr_percent += $ratios[14]->talent_percent;
        //         }
    
        //     }
        // elseif(is_array(json_decode($seeker->qualification_id)) && is_array(json_decode($opportunity->qualification_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->qualification_id), json_decode($opportunity->qualification_id)))) 
        //         {
        //             // Data Match
        //             $tsr_score += $ratios[14]->talent_num;
        //             $psr_score += $ratios[14]->position_num;

        //             $tsr_percent += $ratios[14]->talent_percent;
        //             $psr_percent += $ratios[14]->position_percent;

        //             $factor = "Qualifications & Certifications";
        //             array_push($matched_factors,$factor);
        //         }
        //     }
        
        // // 16 Professional strengths (checked)

        // if(is_null($seeker->key_strength_id) || is_null($opportunity->key_strength_id))
        //     {
        //         // Data Empty
        //         if(!is_null($opportunity->key_strength_id))
        //         {
        //             $psr_score += $ratios[15]->position_num;
        //             $psr_percent += $ratios[15]->position_percent;
        //         }
        //         else {
        //             $tsr_score += $ratios[15]->talent_num;
        //             $tsr_percent += $ratios[15]->talent_percent;
        //         } 
        //     }
        // elseif(is_array(json_decode($seeker->key_strength_id)) && is_array(json_decode($opportunity->key_strength_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->key_strength_id), json_decode($opportunity->key_strength_id)))) 
        //         {
        //             // Data Match
        //             $tsr_score += $ratios[15]->talent_num;
        //             $psr_score += $ratios[15]->position_num;
        //             $tsr_percent += $ratios[15]->talent_percent;
        //             $psr_percent += $ratios[15]->position_percent;

        //             $factor = "Professional Strengths";
        //             array_push($matched_factors,$factor);
        //         }
        //     }
        
        // // 17 Position title (checked)

        // if(is_null($seeker->position_title_id) || is_null($opportunity->job_title_id))
        //     {
        //         // Data Empty

        //         if(!is_null($opportunity->job_title_id))
        //         {
        //             $psr_score += $ratios[16]->position_num;
        //             $psr_percent += $ratios[16]->position_percent; 
        //         }
        //         else {
        //             $tsr_score += $ratios[16]->talent_num;
        //             $tsr_percent += $ratios[16]->talent_percent;
        //         }
                
        //     }
        //     elseif(is_array(json_decode($seeker->position_title_id)) && is_array(json_decode($opportunity->job_title_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->position_title_id), json_decode($opportunity->job_title_id)))) 
        //         {
        //             // Data Match (a) the position title of the listed position
        //             $tsr_score += $ratios[16]->talent_num;
        //             $psr_score += $ratios[16]->position_num;

        //             $tsr_percent += $ratios[16]->talent_percent;
        //             $psr_percent += $ratios[16]->position_percent;

        //             $factor = "Position Title";
        //             array_push($matched_factors,$factor);
        //         }

        //         else 
        //         {
        //             // Getting categories used by seeker
        //             $seeker_titles = JobTitleUsage::where('user_id',$seeker->id)->pluck('job_title_id')->toarray();
        //             $seeker_title_categories = [];

        //             foreach($seeker_titles as $seeker_title) 
        //             {
        //                 $category = JobTitleCategoryUsage::where('job_title_id',$seeker_title)->pluck('job_title_category_id')->toarray();
        //                 if(count($category)!=0)
        //                 {
        //                     $category_id = $category[0];
        //                     if(!in_array($category_id,$seeker_title_categories))
        //                     {
        //                         array_push($seeker_title_categories,$category_id);
        //                     }
        //                 }
        //             }
                    
        //             // Getting categories used by opportunity
        //             $opportunity_titles = JobTitleUsage::where('opportunity_id',$opportunity->id)->pluck('job_title_id')->toarray();
        //             $opportunity_title_categories = [];

        //             foreach($opportunity_titles as $opportunity_title) 
        //             {
        //                 $category = JobTitleCategoryUsage::where('job_title_id',$opportunity_title)->pluck('job_title_category_id')->toarray();
        //                 if(count($category) != 0)
        //                 {
        //                     $category_id = $category[0];
        //                     if(!in_array($category_id,$opportunity_title_categories))
        //                     {
        //                         array_push($opportunity_title_categories,$category_id);
        //                     }
        //                 }
                        
        //             }
                    
        //             if(!empty(array_intersect($seeker_title_categories, $opportunity_title_categories)))
        //             {
        //                 // Category Match (b) similar titles to the listed position
        //                 $tsr_score += $ratios[16]->talent_num;
        //                 $psr_score += $ratios[16]->position_num;

        //                 $tsr_percent += $ratios[16]->talent_percent;
        //                 $psr_percent += $ratios[16]->position_percent;

        //                 $factor = "Position Title";
        //                 array_push($matched_factors,$factor);
        //             }            
        //         }
        //     }
             
        //     // 18 Industry (checked)

            // if (is_null($seeker->industry_id) || is_null($opportunity->industry_id)) {
            //     // Data Empty
            //     if(!is_null($opportunity->industry_id))
            //     {
            //         $psr_score += $ratios[17]->position_num;
            //         $psr_percent += $ratios[17]->position_percent;
            //     }
            //     else {
            //         $tsr_score += $ratios[17]->talent_num;
            //         $tsr_percent += $ratios[17]->talent_percent;
            //     } 
                
            // } elseif (is_array(json_decode($seeker->industry_id)) && is_array(json_decode($opportunity->industry_id))) {
            //     if (!empty(array_intersect(json_decode($seeker->industry_id), json_decode($opportunity->industry_id)))) {
            //         // Data Match
            //         $tsr_score += $ratios[17]->talent_num;
            //         $psr_score += $ratios[17]->position_num;

            //         $tsr_percent += $ratios[17]->talent_percent;
            //         $psr_percent += $ratios[17]->position_percent;

            //         $factor = "Industry";
            //         array_push($matched_factors,$factor);
            //     }
            // }
        
        // // 19 Function (checked)

        // if(is_null($seeker->functional_area_id) || is_null($opportunity->functional_area_id))
        //     {
        //         // Data Empty
        //         if(!is_null($opportunity->functional_area_id))
        //         {
        //             $psr_score += $ratios[18]->position_num;
        //             $psr_percent += $ratios[18]->position_percent; 
        //         }
        //         else {
        //             $tsr_score += $ratios[18]->talent_num;
        //             $tsr_percent += $ratios[18]->talent_percent;
        //         }
    
        //     }
        // elseif(is_array(json_decode($seeker->functional_area_id)) && is_array(json_decode($opportunity->functional_area_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($seeker->functional_area_id), json_decode($opportunity->functional_area_id)))) 
        //         {
        //             // Data Match
        //             $tsr_score += $ratios[18]->talent_num;
        //             $psr_score += $ratios[18]->position_num;

        //             $tsr_percent += $ratios[18]->talent_percent;
        //             $psr_percent += $ratios[18]->position_percent;

        //             $factor = "Functional Area";
        //             array_push($matched_factors,$factor);
        //         }
        //     }
        
        // // 20 Target companies (checked)

        // $employment_history = EmploymentHistory::where('user_id',$seeker->id)->pluck('employer_id')->toArray();
        // $current_employer = $seeker->current_employer_id;
        // if(!in_array($current_employer,$employment_history)) array_push($employment_history,$current_employer);

        // if(is_null($opportunity->target_employer_id) || is_null($seeker->target_employer_id))
        // {
        //     // Empty Data for PSR
        //     $psr_percent += $ratios[19]->psr_percent;
        //     $psr_score += $ratios[19]->position_num;
        // } 
        // //For PSR 
        // elseif(is_array(json_decode($seeker->target_employer_id)))
        // {
        //     if(in_array($opportunity->company->id,json_decode($seeker->target_employer_id)))
        //     {
        //             $psr_percent += $ratios[19]->psr_percent;
        //             $psr_score += $ratios[19]->position_num;
        //             $factor = "Target Employer";
        //             array_push($matched_factors,$factor);
        //     }
        // }

        // if(is_null($opportunity->target_employer_id) || count($employment_history) == 0 )
        // {
        //     // Empty Data for TSR
        //     $tsr_percent += $ratios[19]->tsr_percent;
        //     $tsr_score += $ratios[19]->talent_num;
        // }
        // // For TSR
        // elseif(is_array(json_decode($opportunity->target_employer_id)))
        //     {
        //         if(!empty(array_intersect(json_decode($opportunity->target_employer_id), $employment_history)))
        //         {
        //             $tsr_percent += $ratios[19]->tsr_percent;
        //             $tsr_score += $ratios[19]->talent_num;
        //             $factor = "Target Employer";
        //             if(!in_array($factor,$matched_factors)) array_push($matched_factors,$factor);
        //         }   
        //     }
        
        // Calculation 
        $jsr_score = ($tsr_score + $psr_score)/2;
        $jsr_percent = ($tsr_percent + $psr_percent)/2;
        $jsr_percent = round($jsr_percent, 1);

        echo "TSR = ".$tsr_score."<br>";
        echo "PSR = ".$psr_score."<br>";
        echo "JSR = ".$jsr_score."<br>";
        echo "PSR Percent = ".$psr_percent."<br>";
        echo "TSR Percent = ".$tsr_percent."<br>";
        echo "JSR Percent = ".$jsr_percent."<br>";
    }






}