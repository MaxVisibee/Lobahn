<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\SiteSetting;

class CompanyRegisterMail extends Mailable
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
        $siteSetting = SiteSetting::first();

        return $this->to($siteSetting->mail_to_address, $siteSetting->mail_to_name)
        ->subject('Employer/Company "' . $this->company->name . '" has been registered on "' . $siteSetting->site_name)
        ->view('emails.company_registered_message')
        ->with(
                [
                    'name' => $this->company->name,
                    'email' => $this->company->email,
                    // 'link' => route('company.detail', $this->company->slug),
                    // 'link_admin' => route('edit.company', ['id' => $this->company->id])
                ]
            );
    }
}
