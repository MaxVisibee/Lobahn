<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
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

    public function show($id)
    {
        $payment = Payment::find($id);
        $stripe = new \Stripe\StripeClient(SiteSetting::first()->stripe_secret);
        $stripe->charges->capture($payment->payment_id, []);
        $payment->payment_id = NULL;
        $payment->is_charged = true;
        $payment->save();
        return redirect()->back();
    }

}
