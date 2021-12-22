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
use App\Models\JobTitle;
use App\Models\JobExperience;
use Mail;

class MailController extends Controller
{
    
    public function index()
    {
        //$users = User::orderBy('id','DESC')->get();
        //$companies = Company::orderby('id','DESC')->get();

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
        if($request->type=="candidate")
        {
            $query = User::query();

            if ($request->institution) {
                $query = $query->where('institution_id', '=', $request->institution);
            }
            if ($request->study_field) {
                $query = $query->where('field_study_id', '=', $request->study_field);
            }
            if ($request->industry) {
                $query = $query->where('industry_id', '=', $request->industry);
            }
            if ($request->job_title) {
                $query = $query->where('position_title_id', '=', $request->job_title);
            }
            if ($request->functional_area) {
                $query = $query->where('functional_area_id', '=', $request->functional_area);
            }
            if ($request->experience) {
                $query = $query->where('experience_id', '=', $request->experience);
            }
            if ($request->term) {
                $query = $query->where('preferred_employment_terms', '=', $request->term);
            }
            if ($request->qualification) {
                $query = $query->where('qualification_id', '=', $request->qualification);
            }
            if ($request->country) {
                $query = $query->where('country_id', '=', $request->country);
            }
            if ($request->gender) {
                $query = $query->where('gender', '=', $request->gender);
            }

           $emails = $query->get('email');
        }
        elseif($request->type=="coporate")
        {
            
            $query = Company::query();
            if ($request->coporate_industry) {
                $query = $query->where('industry_id', '=', $request->industry);
            }
            if ($request->coporate_country) {
                $query = $query->where('country_id', '=', $request->country);
            }
            $emails = $query->get('email');
        }
        else{

            $query = User::query();

            if ($request->institution) {
                $query = $query->where('institution_id', '=', $request->institution);
            }
            if ($request->study_field) {
                $query = $query->where('field_study_id', '=', $request->study_field);
            }
            if ($request->industry) {
                $query = $query->where('industry_id', '=', $request->industry);
            }
            if ($request->job_title) {
                $query = $query->where('position_title_id', '=', $request->job_title);
            }
            if ($request->functional_area) {
                $query = $query->where('functional_area_id', '=', $request->functional_area);
            }
            if ($request->experience) {
                $query = $query->where('experience_id', '=', $request->experience);
            }
            if ($request->term) {
                $query = $query->where('preferred_employment_terms', '=', $request->term);
            }
            if ($request->qualification) {
                $query = $query->where('qualification_id', '=', $request->qualification);
            }
            if ($request->country) {
                $query = $query->where('country_id', '=', $request->country);
            }
            if ($request->gender) {
                $query = $query->where('gender', '=', $request->gender);
            }

            $users = $query->get('email')->toArray();

            $query = Company::query();
            if ($request->coporate_industry) {
                $query = $query->where('industry_id', '=', $request->industry);
            }
            if ($request->coporate_country) {
                $query = $query->where('country_id', '=', $request->country);
            }            
            $coporate = $query->get('email')->toArray();
            $emails = array_merge($users, $coporate);

        }

        $msg = count($emails);

        return response()->json(array('msg'=> $msg), 200);
    }

    
    public function sendMail(Request $request)
    {
        if($request->type=="candidate")
        {
            $query = User::query();

            if ($request->institution) {
                $query = $query->where('institution_id', '=', $request->institution);
            }
            if ($request->study_field) {
                $query = $query->where('field_study_id', '=', $request->study_field);
            }
            if ($request->industry) {
                $query = $query->where('industry_id', '=', $request->industry);
            }
            if ($request->job_title) {
                $query = $query->where('position_title_id', '=', $request->job_title);
            }
            if ($request->functional_area) {
                $query = $query->where('functional_area_id', '=', $request->functional_area);
            }
            if ($request->experience) {
                $query = $query->where('experience_id', '=', $request->experience);
            }
            if ($request->term) {
                $query = $query->where('preferred_employment_terms', '=', $request->term);
            }
            if ($request->qualification) {
                $query = $query->where('qualification_id', '=', $request->qualification);
            }
            if ($request->country) {
                $query = $query->where('country_id', '=', $request->country);
            }
            if ($request->gender) {
                $query = $query->where('gender', '=', $request->gender);
            }

           $emails = $query->get('email');
        }
        elseif($request->type=="coporate")
        {
            
            $query = Company::query();
            if ($request->coporate_industry) {
                $query = $query->where('industry_id', '=', $request->industry);
            }
            if ($request->coporate_country) {
                $query = $query->where('country_id', '=', $request->country);
            }
            $emails = $query->get('email');
        }
        else{

            $query = User::query();

            if ($request->institution) {
                $query = $query->where('institution_id', '=', $request->institution);
            }
            if ($request->study_field) {
                $query = $query->where('field_study_id', '=', $request->study_field);
            }
            if ($request->industry) {
                $query = $query->where('industry_id', '=', $request->industry);
            }
            if ($request->job_title) {
                $query = $query->where('position_title_id', '=', $request->job_title);
            }
            if ($request->functional_area) {
                $query = $query->where('functional_area_id', '=', $request->functional_area);
            }
            if ($request->experience) {
                $query = $query->where('experience_id', '=', $request->experience);
            }
            if ($request->term) {
                $query = $query->where('preferred_employment_terms', '=', $request->term);
            }
            if ($request->qualification) {
                $query = $query->where('qualification_id', '=', $request->qualification);
            }
            if ($request->country) {
                $query = $query->where('country_id', '=', $request->country);
            }
            if ($request->gender) {
                $query = $query->where('gender', '=', $request->gender);
            }

            $users = $query->get('email')->toArray();

            $query = Company::query();
            if ($request->coporate_industry) {
                $query = $query->where('industry_id', '=', $request->industry);
            }
            if ($request->coporate_country) {
                $query = $query->where('country_id', '=', $request->country);
            }            
            $coporate = $query->get('email')->toArray();
            $emails = array_merge($users, $coporate);

        }

        foreach($emails as $email)
        {
            //echo "<li>".$email['email']."</li>";
            $mailto = $email['email'];
            $html = $request->body;
            \Mail::send([], [], function ($message) use ($html,$request,$mailto) {
                        $message->to($mailto)
                    ->subject($request->subject)
                    ->setBody($html, 'text/html');
            });
        }

        return redirect()->route('mail.index')->with('success','Mail has been sent!');

    }
}
