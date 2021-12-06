<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class talentVerification extends Mailable
{
    use Queueable, SerializesModels;
    public $company;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($company)
    {
        $this->company  = $company;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->to('khinzawlwin.mm@gmail.com', 'Khin Zaw Lwin')
        ->subject('Employer/Company "' . $this->company->name . '" has been registered on "' . config('app.name'))
        ->view('emails.company_registered_message')
        ->with(
                [
                    'name' => $this->company->name,
                    'email' => $this->company->email,
                    'link' => route('company.detail', $this->company->slug),
                    'link_admin' => route('edit.company', ['id' => $this->company->id])
                ]
            );
        // return $this->markdown('emails.talent_verification')
        // ->with([
        //     'content' => $this->content,
        // ]);
    }
}
