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

class CompanyResetPassword extends Notification
{
    use Queueable;

    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $siteSetting = SiteSetting::first();
        $email = $notifiable->getEmailForPasswordReset();
        
        $baseURL = url('/');       
        $user = User::where('email', '=',$email)->first();        
        if($user) {
            $url = url('password/reset', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false);
            // $url = url($baseURL . route('candidate_password.reset', [
            //     'token' => $this->token,
            //     'email' => $notifiable->getEmailForPasswordReset(),
            // ], false));
            // dd($url);
            return (new MailMessage)
                ->subject('User Password Reset')
                ->from([$siteSetting->mail_from_address => $siteSetting->mail_from_name])
                ->view('emails.seeker_reset_password', ['url'=> $url]);
            // return $this->sendResetLinkEmail($request);
        }else {
            $url = url($baseURL . route('company.password.reset', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));

            
            $company = Company::where('email', '=',$email)->first();
            
            if($company) {
               // return Redirect::route('company.get-email', $request);
                return (new MailMessage)
                ->subject('Company Password Reset')
                ->from([$siteSetting->mail_from_address => $siteSetting->mail_from_name])
                ->view('emails.company_reset_password', ['url'=> $url]);
            }
        }

        
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
