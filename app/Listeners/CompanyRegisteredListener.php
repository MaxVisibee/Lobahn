<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Mail;
use App\Events\CompanyRegistered;
use App\Mail\CompanyRegisterMail;

class CompanyRegisteredListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CompanyRegistered $event)
    {
        Mail::send(new CompanyRegisterMail($event->company));
    }
}
