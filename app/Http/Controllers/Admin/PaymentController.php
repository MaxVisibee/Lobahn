<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use App\Models\Company;
use App\Models\SiteSetting;
use Session;
use Stripe;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::latest('id')->get();
        return view('admin.payment.index',compact('payments'));
    }

    public function charge($id)
    {
        $payment = Payment::find($id);
        $stripe = new \Stripe\StripeClient(SiteSetting::first()->stripe_secret);
        $stripe->charges->capture($payment->payment_id, []);
        $payment->payment_id = NULL;
        $payment->is_charged = true;
        if($payment->user_id)
        {   
            $user = User::find($payment->user_id);
            $user->is_trial = false;
            $user->save();
        }
        elseif($payment->company_id)
        {
            $company = Company::find($payment->company_id);
            $company->is_trial = false;
            $company->save();
        }
        $payment->save();
        return redirect()->back();
    }

    public function refund($id)
    {
        $payment = Payment::find($id);
        $stripe = new \Stripe\StripeClient(SiteSetting::first()->stripe_secret);
        $stripe->refunds->create([
        'charge' => $payment->payment_id,
        ]);
        $payment->payment_id = NULL;
        $payment->is_refund = true;
        $payment->save();
        return redirect()->back();
    }

}
