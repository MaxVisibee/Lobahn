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
            auth()->logout();
            $packages = Package::where('package_for','individual')->where('package_type','basic')->get();
        }
        elseif(Auth::guard('company')->user()) {
            $user = Auth::guard('company')->user();
            $user_id = $user->id;
            # check is already purchase or note
            if(!$user->is_trial) return redirect('/company-home');
            $client_type = 'company';
            auth()->guard('company')->logout();
            $packages = Package::where('package_for','corporate')->where('package_type','basic')->get();
        }
        else return redirect('/'); # not guest
        
        return view('payment.index',compact('stripe_key','user_id','client_type','packages'));
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
            $start_date = User::where('id',$invoice->user_id)->first()->package_start_date;
            $due_date = User::where('id',$invoice->user_id)->first()->package_end_date;
            $address = User::where('id',$invoice->user_id)->first()->address;
        }
        else{
            $id = $invoice->company_id;
            $client = Company::where('id',$invoice->company_id)->first();
            $start_date = Company::where('id',$invoice->company_id)->first()->package_start_date;
            $due_date = Company::where('id',$invoice->company_id)->first()->package_end_date;
            $address = Company::where('id',$invoice->company_id)->first()->address;
        }

        $amount = Package::where('id',$invoice->package_id)->first()->package_price;

        $data = [
            'id' => $id,
            'invoice' => $invoice,
            'client' => $client,
            'due_date' => $due_date,
            'amount' => $amount,
            'start_date' => $start_date,
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
        $package_price = intval(Package::where('id',$request->package_id)->first()->package_price);
        $amount = $package_price * 100;
        $response = Stripe\Charge::create ([
                "amount" => $amount,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Registration Payment for lobahn." ,
                "capture" => true,
        ]);
        if (isset($response) && $response['status'] == "succeeded") {
                $payment = new Payment;
                $invoice =  $request->id.$request->package_id.date('Lobahn');
                $payment_method_id = PaymentMethod::where('payment_name','Stripe')->first()->id;
                $num_days = Package::where('id',$request->package_id)->first()->package_num_days;
                $package_start_date = date('d-m-Y');
                $package_end_date = date('d-m-Y',strtotime('+'.$num_days.' days',strtotime(date('d-m-Y'))));

                $request->client_type == "user" ? $payment->user_id = $request->id : $payment->company_id = $request->id;
                $payment->payment_id =$response['id'] ;
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
                    $user->save();
                    return redirect()->route('candidate.dashboard');
                  
                }
                elseif($request->client_type == "company") {
                    $company = Company::find($request->id);
                    $company->is_trial = false;
                    $company->save();
                } 
            return response()->json(array('status'=> "success",'response'=>$response), 200);
        }
        else
        {
            return response()->json(array('status'=> "fail",'response'=>$response), 200);
        }
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
