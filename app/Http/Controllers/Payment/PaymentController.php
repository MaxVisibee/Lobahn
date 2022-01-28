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
        ]); 

        Payment::create(['client_secret' => $intent->client_secret]);
        return response()->json(array('status'=> "success",'intent'=>$intent), 200);
    }

    public function googlePaySuccess(Request $request)
    {
        $payment = Payment::where('client_secret',$request->client_secret)->first();
        $payment_method_id = PaymentMethod::where('payment_name','GooglePay')->first()->id;
        if($payment)
        {
            $invoice =  $request->id.$request->package_id.date('Hi');
           if($request->client_type == "user")
           {
            $payment->invoice_num = $invoice;
            $payment->user_id = $request->id;
            $payment->package_id = $request->package_id;
            $payment->payment_method_id = $payment_method_id;
            $payment->save();
           }
           else {
            $payment->invoice_num = $invoice;
            $payment->company_id = $request->id;
            $payment->package_id = $request->package_id;
            $payment->payment_method_id = $payment_method_id;
            $payment->save();
           }  
        }
        return response()->json(array('status'=> "success"), 200);
    }

    public function stripePay(Request $request)
    {
        // setting up API key 
        Stripe\Stripe::setApiKey(SiteSetting::first()->stripe_secret);
        $package_price = intval(Package::where('id',$request->package_id)->first()->package_price);
        $payment_method_id = PaymentMethod::where('payment_name','Stripe')->first()->id;
        $amount = $package_price * 100;

        // make payment transation
        $response = Stripe\Charge::create ([
                "amount" => $amount,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from lobahn." 
        ]);

        // check payment success or not
        if (isset($response) && $response['status'] == "succeeded") {

            if(isset($request->user_id))
            {
                $invoice =  $request->user_id.$request->package_id.date('Hi');
                Payment::create([
                    'user_id' => $request->user_id,
                    'package_id' => $request->package_id,
                    'invoice_num' => $invoice,
                    'payment_method_id' => $payment_method_id
                ]);
            }
            else{
                $invoice =  $request->company_id.$request->package_id.date('Hi');
                Payment::create([
                    'company_id' => $request->company_id,
                    'package_id' => $request->package_id,
                    'invoice_num' => $invoice,
                    'payment_method_id' => $payment_method_id
                ]);
            }
           

            return response()->json(array('status'=> "success"), 200);
        }
        else
        {
            return response()->json(array('status'=> "fail"), 200);
        }
    }

    public function careerStripePay()
    {
         return response()->json(array('status'=> "success"), 200);
    }

    // public function paypalProcessTransaction(Request $request)
    // {
    //     // setting up API key 
    //     $provider = new PayPalClient;
    //     $provider->setApiCredentials(config('paypal'));
    //     $paypalToken = $provider->getAccessToken();

    //     // make payment transation
    //     $response = $provider->createOrder([
    //         "intent" => "CAPTURE",
    //         "application_context" => [
    //             "return_url" => route('successTransaction'),  
    //             "cancel_url" => route('cancelTransaction'),
    //         ],
    //         "purchase_units" => [
    //             0 => [
    //                 "amount" => [
    //                     "currency_code" => "USD",
    //                     "value" => "1000.00"
    //                 ]
    //             ]
    //         ]
    //     ]);

    //      // check payment success or not

    //     if (isset($response['id']) && $response['id'] != null) {

    //         // redirect to approve href
    //         foreach ($response['links'] as $links) {
    //             if ($links['rel'] == 'approve') {
    //                 return redirect()->away($links['href']);
    //             }
    //         }

    //         return redirect()
    //             ->route('payment')
    //             ->with('error', 'Something went wrong.');

    //     } else {
    //         return redirect()
    //             ->route('payment')
    //             ->with('error', $response['message'] ?? 'Something went wrong.');
    //     }
    // }

    // public function successTransaction(Request $request)
    // {
    //     $provider = new PayPalClient;
    //     $provider->setApiCredentials(config('paypal'));
    //     $provider->getAccessToken();
    //     $response = $provider->capturePaymentOrder($request['token']);

    //     if (isset($response['status']) && $response['status'] == 'COMPLETED') {
    //         return redirect()
    //             ->route('payment')
    //             ->with('success', 'Transaction complete.');
    //     } else {
    //         return redirect()
    //             ->route('payment')
    //             ->with('error', $response['message'] ?? 'Something went wrong.');
    //     }
    // }
    
    // public function cancelTransaction(Request $request)
    // {
    //     return redirect()
    //         ->route('payment')
    //         ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    // }

    // public function applepayTransaction()
    // {
    //     // setting up API key 
    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
       
    //         $response = \Stripe\PaymentIntent::create([
    //             'amount' => 1099,
    //             'currency' => 'usd',
    //             'payment_method_types' => [
    //                 'card'
    //             ]
    //         ]);

    //     // check payment success or not
    //      if (isset($response) && $response['status'] == "succeeded") {
    //         Session::flash('success', 'Payment successful!');
    //         return back();
    //     }
    //     else
    //     {
    //         Session::flash('error', 'Something went wrong.!');
    //         return back();
    //     }
    // }

}
