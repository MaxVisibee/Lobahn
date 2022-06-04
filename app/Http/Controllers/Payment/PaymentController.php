<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Package;
use App\Models\Company;
use App\Models\User;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
class PaymentController extends Controller

{
    use AuthenticatesUsers;

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function paymentForm()
    {
        $stripe_key = SiteSetting::first()->stripe_key;
        if(Auth::user())
        {
            $user = Auth::user();
            $user_id = $user->id;
            # check is already purchase or not
            if(!$user->is_trial) return redirect('/home');
            $client_type = 'user';
            $email = $user->email;
            if($user->package_end_date < date('Y-m-d')) auth()->logout();
            $packages = Package::where('package_for','individual')->where('package_type','basic')->get();
        }
        elseif(Auth::guard('company')->user()) {
            $user = Auth::guard('company')->user();
            $user_id = $user->id;
            # check is already purchase or note
            if(!$user->is_trial) return redirect('/company-home');
            $client_type = 'company';
            $email = $user->email;
            if($user->package_end_date < date('Y-m-d')) auth()->guard('company')->logout();
            $packages = Package::where('package_for','corporate')->where('package_type','basic')->get();
        }
        else return redirect('/'); # not guest
        
        return view('payment.index',compact('stripe_key','email','user_id','client_type','packages'));
    }

    public function toggleSubscription(Request $request)
    {
        Stripe\Stripe::setApiKey(SiteSetting::first()->stripe_secret);
        $id = $request->id;
        $payment = Payment::where('id',$id)->first();
        $status = $payment->auto_renew;
        if($status == true)
         $intent = \Stripe\Subscription::update($payment->sub_id,['cancel_at_period_end' => true,]);
        else 
        $intent = \Stripe\Subscription::update($payment->sub_id,['cancel_at_period_end' => false,]);
        
        $payment->auto_renew = !$status;
        $payment->save();
        return response()->json(array('status'=> !$status,'intent'=>$intent), 200);
    }
    
    public function payment()
    {
        return view('tmp.payment');
    }

    public function invoice($id)
    {
        $invoice =  Payment::where('invoice_num',$id)->first();
        
        if($invoice->user_id)
        {   $id = $invoice->user_id;
            $client =  User::where('id',$invoice->user_id)->first();
            $address = User::where('id',$invoice->user_id)->first()->address;
        }
        else{
            $id = $invoice->company_id;
            $client = Company::where('id',$invoice->company_id)->first();
            $address = Company::where('id',$invoice->company_id)->first()->address;
        }

        $amount = Package::where('id',$invoice->package_id)->first()->package_price;

        $data = [
            'id' => $id,
            'invoice' => $invoice,
            'client' => $client,
            'amount' => $amount,
            'address' => $address
        ];

        return view('payment.invoice',$data);
    }

    public function googlePay(Request $request)
    {
        Stripe\Stripe::setApiKey(SiteSetting::first()->stripe_secret);
        $package_price = intval(Package::where('id',$request->package_id)->first()->package_price);
        $amount = $package_price * 100;
        $intent = \Stripe\PaymentIntent::create([
        'amount' => $amount,
        'currency' => 'usd',
        'capture_method' => 'manual',
        ]); 

        Payment::create([
            'intent_id' => $intent->id,
            'amount' => $package_price,
            'client_secret' => $intent->client_secret
        ]);
        return response()->json(array('status'=> "success",'intent'=>$intent), 200);
    }

    public function googlePaySuccess(Request $request)
    {
        $payment = Payment::where('client_secret',$request->client_secret)->first();
        if($payment)
        {
            $num_days = Package::where('id',$request->package_id)->first()->package_num_days;
            $package_start_date = date('d-m-Y');
            $package_end_date = date('d-m-Y',strtotime('+'.$num_days.' days',strtotime(date('d-m-Y'))));

            $payment_method_id = PaymentMethod::where('payment_name','GooglePay')->first()->id;
            $invoice =  $request->id.$request->package_id.date('Hi');
            $request->client_type == "user" ?  $payment->user_id = $request->id: $payment->company_id = $request->id; 
            $payment->invoice_num = $invoice;
            $payment->package_id = $request->package_id;
            $payment->package_start_date = $package_start_date;
            $payment->package_end_date = $package_end_date;
            $payment->payment_method_id = $payment_method_id;
            $payment->save();
        }
        return response()->json(array('status'=> "success"), 200);
    }

    public function stripePay(Request $request)
    {
        Stripe\Stripe::setApiKey(SiteSetting::first()->stripe_secret);
        $package = Package::where('id',$request->package_id)->first();
        $package_price = intval($package->package_price);
        $package->package_num_days = 2;
        $package_end_date = date('d-m-Y',strtotime('+'.$package->package_num_days.' days',strtotime(date('d-m-Y'))));
        $amount = $package_price * 100;
        $email = $request->email;

         #### Subscription Charge  
        try{
            $customer = Stripe\Customer::create([
            'email' => $email,
            'source' => $request->stripeToken,
            ]);
        }catch(Exception $e)
        {
            $api_error =  $e->getMessage();
        }

        if(empty($e)  && $customer)
        {
            try
            {
                $plan = Stripe\Plan::create([
                        "product" => [
                            "name" => $package->package_title
                        ],
                        "amount" => $amount,
                        "currency" => "HKD",
                        "interval" => "year",
                        "interval_count" => 1
                    ]);
            }
            catch(Exception $e)
            {
                $api_error = $e->getMessage();
            }  
        }

        if(empty($api_error) && $plan)
        {
            try{
                $subscription = Stripe\Subscription::create([
                    "customer" => $customer->id,
                    "items" => array(array(
                        "plan" => $plan->id
                        ),
                    ),
                    'billing_cycle_anchor' => strtotime($package_end_date),
                ]);
            }
            catch(Exceptio $e)
            {
                $api_error = $e->getMessage();
            }
        }

        if(empty($api_error) && $subscription)
        {

            $subsData = $subscription->jsonSerialize();
            if($subsData['status'] == 'active')
            {
                $payment = new Payment;
                $invoice =  $request->id.$request->package_id.date('Lobahn');
                $payment_method_id = PaymentMethod::where('payment_name','Stripe')->first()->id;
                $package =  Package::where('id',$request->package_id)->first();
                $num_days = $package->package_num_days;
                $package_start_date = date('d-m-Y');
                $package_end_date = date('d-m-Y',strtotime('+'.$num_days.' days',strtotime(date('d-m-Y'))));

                $request->client_type == "user" ? $payment->user_id = $request->id : $payment->company_id = $request->id;

                $payment->sub_id = $subsData['id'];
                $payment->customer_id = $subsData['customer'];
                $payment->plan_id = $subsData['plan']['id'];

                $payment->package_id = $request->package_id;
                $payment->payment_method_id = $payment_method_id;
                $payment->invoice_num = $invoice;
                $payment->amount = $amount/100;
                $payment->package_start_date = $package_start_date;
                $payment->package_end_date = $package_end_date;
                $payment->save();

                if($request->client_type == "user"){
                    $user = User::find($request->id);
                    $user->is_trial = false;
                    $package->package_type == 'premium' ? $user->is_featured = true : '';
                    $user->save();
                }
                elseif($request->client_type == "company") {
                    $company = Company::find($request->id);
                    $company->is_trial = false;
                    $package->package_type == 'premium' ? $company->is_featured = true : '';
                    $company->save();
                } 

            return response()->json(array('status'=> "success",'response'=>$subscription), 200);

            }
            else
            {
                return response()->json(array('status'=> "fail",'response'=>$subscription), 200);
            }

            
        }
        
        #### Direct Charge 

        // $response = Stripe\Charge::create ([
        //         "amount" => $amount,
        //         "currency" => "usd",
        //         "source" => $request->stripeToken,
        //         "description" => "Registration Payment for lobahn." ,
        //         "capture" => true,
        // ]);


        // if (isset($response) && $response['status'] == "succeeded") {
        //         $payment = new Payment;
        //         $invoice =  $request->id.$request->package_id.date('Lobahn');
        //         $payment_method_id = PaymentMethod::where('payment_name','Stripe')->first()->id;
        //         $package =  Package::where('id',$request->package_id)->first();
        //         $num_days = $package->package_num_days;
        //         $package_start_date = date('d-m-Y');
        //         $package_end_date = date('d-m-Y',strtotime('+'.$num_days.' days',strtotime(date('d-m-Y'))));

        //         $request->client_type == "user" ? $payment->user_id = $request->id : $payment->company_id = $request->id;
        //         $payment->payment_id =$response['id'] ;
        //         $payment->package_id = $request->package_id;
        //         $payment->payment_method_id = $payment_method_id;
        //         $payment->invoice_num = $invoice;
        //         $payment->amount = $amount/100;
        //         $payment->package_start_date = $package_start_date;
        //         $payment->package_end_date = $package_end_date;
        //         $payment->save();

        //         if($request->client_type == "user"){
        //             $user = User::find($request->id);
        //             $user->is_trial = false;
        //             $package->package_type == 'premium' ? $user->is_featured = true : '';
        //             $user->save();
        //         }
        //         elseif($request->client_type == "company") {
        //             $company = Company::find($request->id);
        //             $company->is_trial = false;
        //             $package->package_type == 'premium' ? $company->is_featured = true : '';
        //             $company->save();
        //         } 
        //     return response()->json(array('status'=> "success",'response'=>$response), 200);
        // }
        // else
        // {
        //      return response()->json(array('status'=> "fail",'response'=>$response), 200);
        // }
    }

    public function refund($id)
    {
        $stripe = new \Stripe\StripeClient(SiteSetting::first()->stripe_secret);
        $payment = Payment::find($id);
        if($payment->intent_id)
        $stripe->refunds->create(['payment_intent' => $payment->intent_id]);
        else 
        $stripe->refunds->create(['charge' => $payment->payment_id]);
        $payment->is_refund = true;
        $payment->status = false;
        $payment->save();

        User::where('id',$payment->user_id)->update(['is_active'=>false]);
        $user = Auth::user();
        if($user)
        {
            auth()->logout();
            return redirect()->back();
        }
        Company::where('id',$payment->company_id)->update(['is_active'=>false]);
        $company = Auth::guard('company')->user();
        if($company)
        {
            Auth::guard('company')->logout();
            return redirect()->back();
        }

        return redirect()->back()->with('success','Seeker payment  has been refurned!'); 
    }

    public function charge($id)
    {
        $stripe = new \Stripe\StripeClient(SiteSetting::first()->stripe_secret);
        $payment = Payment::find($id);
        $stripe->charges->capture($payment->payment_id, []);
        $payment->payment_id = NULL;
        $payment->is_charged = true;
        $payment->save();

        return redirect()->back()->with('success','Seeker payment  has been charged!'); 
    }
}
