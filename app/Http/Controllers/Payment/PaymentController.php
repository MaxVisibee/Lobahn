<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Package;
use Session;
use Stripe;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
class PaymentController extends Controller
{
    public function payment()
    {
        return view('tmp.payment');
    }

    public function stripePay(Request $request)
    {
        // setting up API key 
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $package_price = Package::where('id',$request->package_id)->first()->package_price;
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

            
            Payment::create([
                'user_id' => $request->user_id,
                'package_id' => $request->package_id,
                'payment_method_id' => $payment_method_id
            ]);

            return response()->json(array('status'=> "success"), 200);
        }
        else
        {
            return response()->json(array('status'=> "fail"), 200);
        }
    }

    public function paypalProcessTransaction(Request $request)
    {
        // setting up API key 
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        // make payment transation
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),  
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "1000.00"
                    ]
                ]
            ]
        ]);

         // check payment success or not

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('payment')
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('payment')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('payment')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    public function applepayTransaction()
    {
        // setting up API key 
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
       
            $response = \Stripe\PaymentIntent::create([
                'amount' => 1099,
                'currency' => 'usd',
                'payment_method_types' => [
                    'card'
                ]
            ]);

        // check payment success or not
         if (isset($response) && $response['status'] == "succeeded") {
            Session::flash('success', 'Payment successful!');
            return back();
        }
        else
        {
            Session::flash('error', 'Something went wrong.!');
            return back();
        }
    }

}
