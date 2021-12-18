<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\SiteSetting;
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

        $url = url($baseURL . route('company.password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));


        $data['url_link'] = url('company/password/reset/'.$this->token.'?email='.$email);
        \Mail::send('emails.reset_password',$data,function ($m) use($siteSetting,$email){
                $m->from($siteSetting->mail_from_address, 'Lobahn Technology Limited');
                $m->to($email)->subject('Reset Password Notification');
        });
        
        return (new MailMessage)
        ->subject('Company Password Reset')
        ->from([$siteSetting->mail_from_address => $siteSetting->mail_from_name])
        ->view('emails.reset_password', ['url'=> $url]);
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
