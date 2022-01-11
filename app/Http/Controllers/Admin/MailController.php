<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Models\Country;
use App\Models\Institution;
use App\Models\StudyField;
use App\Models\Qualification;
use App\Models\Industry;
use App\Models\FunctionalArea;
use App\Models\JobType;
use App\Models\ScheduledMail;
use App\Models\JobTitle;
use App\Models\FilteredMail;
use App\Models\JobExperience;
use App\Exports\MailExport;
use Carbon\Carbon;
use Mail;
use App\Traits\EmailTrait;
use Maatwebsite\Excel\Facades\Excel;
class MailController extends Controller
{
    use EmailTrait;

    public function check()
    {
        $date = FilteredMail::first()->date;
        if($date != NULL && date('d/m/Y',strtotime($date)) == Carbon::today()->format('d/m/Y'))
        {
            return "same";
        }
        else return "not same";
        //$emails = FailterMail::get();
    }

    public function index()
    {
        $data = [
            'countries' => Country::all(),
            'institutions' => Institution::all(),
            'studyfields' => StudyField::all(),
            'qualifications' => Qualification::all(),
            'industries'  => Industry::all(),
            'job_titles' => JobTitle::all(),
            'job_experiences' => JobExperience::all(),
            'areas' => FunctionalArea::all(),
            'terms' => JobType::all(),
        ];
        return view('admin.mail.index',$data);
    }

    public function analysis(Request $request)
    {
        $emails = $this->getFilteredEmails($request);
        FilteredMail::truncate();
        foreach($emails as $key => $value)
        {
            FilteredMail::create([
                "email"=>$value['email']
            ]);
        }
        return response()->json(array('msg'=> count($emails),'data'=>$emails), 200);
    }

    public function export()
    {
        return Excel::download(new MailExport(), 'analysed_emails_'.time().'.xlsx');
    }

    
    public function sendMail(Request $request)
    {
        $emails = $this->getFilteredEmails($request);
        if($request->date)
        {
            ScheduledMail::truncate();
            ScheduledMail::create([
                "title" => $request->subject,
                "body" => $request->body,
                "date" => $request->date
            ]);
            FilteredMail::truncate();
            foreach($emails as $key => $value)
            {
                FilteredMail::create([
                    "email"=>$value['email']
                ]);
            }
            return redirect()->route('mail.index')->with('success','Mail will be sent!');
        }
        else{
            foreach($emails as $email)
            {
                $mailto = $email['email'];
                $html = $request->body;
                Mail::send([], [], function ($message) use ($html,$request,$mailto) {
                            $message->to($mailto)
                        ->subject($request->subject)
                        ->setBody($html, 'text/html');
                });
            }
            return redirect()->route('mail.index')->with('success','Mail has been sent!');
        }  

    }
}
