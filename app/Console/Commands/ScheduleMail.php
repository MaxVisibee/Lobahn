<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\FilteredMail;
use App\Models\ScheduledMail;
use App\Models\SiteSetting;
use Carbon\Carbon;
use Mail;

class ScheduleMail extends Command
{

    protected $signature = 'schedule:mail';
    protected $description = 'To Send Backend Schedule Mail';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
       $data = ScheduledMail::first();
        if($data)
        {
          $date = $data->date;
        if($date != NULL && date('d/m/Y',strtotime($date)) == Carbon::today()->format('d/m/Y'))
        {
            $emails = FilteredMail::get();
            foreach($emails as $email_data)
            {
             //\Log::info($email_data->email);
                $mailto = $email_data->email;
                $html = $data->body;
                Mail::send([], [], function ($message) use ($html,$data,$mailto) {
                            $message->to($mailto)
                        ->subject($data->subject)
                        ->setBody($html, 'text/html');
                });
            }
        }
        
        }
    }
}
