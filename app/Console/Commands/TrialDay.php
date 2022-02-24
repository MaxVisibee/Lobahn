<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Company;

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
            $user->trial_days == 0 ? $user->is_active = 0 : '';
            $user->save(); 
        }

        $companies = Company::where('is_trial',1)->where('trial_days','>',0)->get();
        foreach($companies as $company)
        {
            $company = Company::find($company->id);
            $company->trial_days -= 1;
            $company->trial_days == 0 ? $company->is_active = 0 : '';
            $company->save(); 
        }


    }
}
