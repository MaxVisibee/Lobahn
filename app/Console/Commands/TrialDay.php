<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Company;
use App\Models\Payment;
use App\Models\SiteSetting;
use Stripe;

class TrialDay extends Command
{
    protected $signature = 'trialday:cron';

    protected $description = 'to update daily the remaining days count for trial users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
       // \Log::info("Cron is working fine!");
        $users = User::where('is_trial',1)->where('trial_days','>',0)->get();
        foreach($users as $user)
        {
            $user = User::find($user->id);
            $user->trial_days -= 1;
            if($user->trial_days == 0)
            {
                $user->is_trial = false;
                $user->is_active = false;
                $payment = Payment::find($user->payment_id);
                $stripe = new \Stripe\StripeClient(SiteSetting::first()->stripe_secret);
                $stripe->charges->capture($payment->payment_id, []);
                $payment->payment_id = NULL;
                $payment->is_charged = true;
                $payment->save();
            }
            $user->save(); 
        }

        $companies = Company::where('is_trial',1)->where('trial_days','>',0)->get();
        foreach($companies as $company)
        {
            $company = Company::find($company->id);
            $company->trial_days -= 1;
            if($company->trial_days == 0)
            {
                $company->is_trial = false;
                $company->is_active = false;
                $payment = Payment::find($company->payment_id);
                $stripe = new \Stripe\StripeClient(SiteSetting::first()->stripe_secret);
                $stripe->charges->capture($payment->payment_id, []);
                $payment->payment_id = NULL;
                $payment->is_charged = true;
                $payment->save();
            }
            $company->save(); 
        }


    }
}
