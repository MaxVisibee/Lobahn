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
use Session;
use Stripe;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
class PaymentController extends Controller
{
    public function payment()
    {
        return view('tmp.payment');
    }

    public function invoice($id)
    {
        $invoice =  Payment::where('invoice_num',$id)->first();
        
        if($invoice->user_id)
        {   $id = $invoice->user_id;
            $client_name =  User::where('id',$invoice->user_id)->first()->name;
            $start_date = User::where('id',$invoice->user_id)->first()->package_start_date;
            $due_date = User::where('id',$invoice->user_id)->first()->package_end_date;
            $address = User::where('id',$invoice->user_id)->first()->address;
        }
        else{
            $id = $invoice->company_id;
            $client_name = Company::where('id',$invoice->company_id)->first()->company_name;
            $start_date = Company::where('id',$invoice->company_id)->first()->package_start_date;
            $due_date = Company::where('id',$invoice->company_id)->first()->package_end_date;
            $address = Company::where('id',$invoice->company_id)->first()->address;
        }

        $amount = Package::where('id',$invoice->package_id)->first()->package_price;

        $data = [
            'id' => $id,
            'invoice' => $invoice,
            'client_name' => $client_name,
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
                "capture" => false,
        ]);
        if (isset($response) && $response['status'] == "succeeded") {
                $payment = new Payment;
                $invoice =  $request->id.$request->package_id.date('Hi');
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
            return response()->json(array('status'=> "success",'response'=>$response), 200);
        }
        else
        {
            return response()->json(array('status'=> "fail",'response'=>$response), 200);
        }
    }
}
