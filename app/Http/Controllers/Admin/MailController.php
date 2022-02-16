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
            'countries' => Country::pluck('country_name','id')->toArray(),
            'institutions' => Institution::pluck('institution_name','id')->toArray(),
            'studyfields' => StudyField::pluck('study_field_name','id')->toArray(),
            'industries' => Industry::pluck('industry_name','id')->toArray(),
            'job_titles' => JobTitle::pluck('job_title','id')->toArray(),
            'areas' => FunctionalArea::pluck('area_name','id')->toArray(),
            'terms' => JobType::pluck('job_type','id')->toArray(),

            'qualifications' => Qualification::pluck('qualification_name','id')->toArray(),
            'job_experiences' => JobExperience::all(),
        ];

        //return $data['studyfields'];
        return view('admin.mail.index',$data);
    }

    public function analysis(Request $request)
    {
        $emails = $this->getFilteredEmails($request);
        FilteredMail::truncate();
        foreach($emails as $key => $value)
        {
            FilteredMail::create([
                "email"=>$value
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
                    "email"=>$value
                ]);
            }
            return redirect()->route('mail.index')->with('success','Mail will be sent!');
        }
        else{
            foreach($emails as $email)
            {
                $mailto = $email;
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
