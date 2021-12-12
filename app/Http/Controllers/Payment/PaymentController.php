<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

        // make payment transation
        $response = Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from lobahn." 
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

}
