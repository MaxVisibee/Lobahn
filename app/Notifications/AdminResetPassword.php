<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\SiteSetting;
use Session;
use Mail;

class AdminResetPassword extends Notification
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
        $email = Session::get('admin_email');
        Session::forget('admin_email');

        // return (new MailMessage)
        //             ->subject('Admin Password Reset')
        //             ->from([$siteSetting->mail_from_address => $siteSetting->mail_from_name])
        //             ->line('You are receiving this email because we received a password reset request for your account.')
        //             ->action('Reset Password', url('admin/password/reset/'.$this->token.'?email='.$email))
        //             // ->action('Reset Password', url('admin/password/reset', $this->token))
        //             ->line('If you did not request a password reset, no further action is required.');

        $data['url_link'] = url('admin/password/reset/'.$this->token.'?email='.$email);
        \Mail::send('emails.reset_password',$data,function ($m) use($siteSetting,$email){
                $m->from($siteSetting->mail_from_address, 'Lobahn Technology Limited');
                $m->to($email)->subject('Reset Password Notification');
        });
        return (new MailMessage);
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
