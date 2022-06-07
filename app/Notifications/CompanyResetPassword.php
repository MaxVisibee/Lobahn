<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Mail;
use App\Models\SiteSetting;
use App\Models\User;
use App\Models\Company;
use Session;
use App\Traits\EmailTrait;

class CompanyResetPassword extends Notification
{
    use Queueable;
    use EmailTrait;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $siteSetting = SiteSetting::first();
        $email = $notifiable->getEmailForPasswordReset();
        
        $baseURL = url('/');  

        $user = User::where('email', '=',$email)->first();        
        if($user) {
            $url = url($baseURL . route('candidate_password.reset', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));
            Session::put('verified', 'verified');
            return (new MailMessage)
                ->subject('User Password Reset')
                ->from([$siteSetting->mail_from_address => $siteSetting->mail_from_name])
                ->view('emails.seeker_reset_password', ['url' => $url,'name'=>$user->name]);
        }else {
            $url = url($baseURL . route('company.password.reset.form', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));

            
            $company = Company::where('email', '=',$email)->first();
            
            if($company) {
                return (new MailMessage)
                ->subject('Company Password Reset')
                ->from([$siteSetting->mail_from_address => $siteSetting->mail_from_name])
                ->view('emails.company_reset_password', ['url'=> $url,'name'=>$company->name]);
            }
        }

        
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
