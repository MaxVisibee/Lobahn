<?php

namespace App\Traits;
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
use App\Models\SiteSetting;
use App\Models\JobExperience;
use Mail;
trait EmailTrait
{
    public function connectToCompany($email,$candidate_name,$position_title,$jsr_score,$opportunity_id,$candidate_id)
    {
        $data = [
            'candidate_name'=>$candidate_name,
            'email'=>$email,
            'position_title'=>$position_title,
            'jsr_score'=>$jsr_score,
            'opportunity_id' => $opportunity_id,
            'candidate_id' => $candidate_id,
            'site_setting' => SiteSetting::first(),
        ];
        Mail::send('emails/connect_to_company', $data, function($message) use ($data) {
            $message->to($data['email'], 'Connect')->subject
                ('Connection from Candidate');
            $message->from(SiteSetting::first()->mail_from_address,SiteSetting::first()->mail_from_name);
        });
    }

    public function connectToCandidate($email,$company_name)
    {
        $data = [
            'email'=>$email,
            'company_name'=>$company_name,
            'site_setting' => SiteSetting::first(),
        ];
        Mail::send('emails/connect_to_candidate', $data, function($message) use ($data) {
            $message->to($data['email'], 'Connect')->subject
                ('Connection from Corporate');
            $message->from(SiteSetting::first()->mail_from_address,SiteSetting::first()->mail_from_name);
        });
    }

    public function shortlist($email,$company_name,$opportunity_id,$listed_date,$title,$jsr_score)
    {
        $data = [
            'email'=>$email,
            'company_name'=>$company_name,
            'jsr_score' => $jsr_score,
            'title' => $title,
            'listed_data' => $listed_date,
            'opportunity_id' => $opportunity_id,
            'site_setting' => SiteSetting::first(),
            ];
        Mail::send('emails/shortlist', $data, function($message) use ($data) {
            $message->to($data['email'], 'Connect')->subject
                ('Shortlisted');
            $message->from(SiteSetting::first()->mail_from_address,SiteSetting::first()->mail_from_name);
        });
    }

    public function recipt($email,$name,$type,$plan_name,$invoice_num,$start_date,$end_date,$amount)
    {
        $data = [
            'email'=>$email,
            'name' =>$name,
            'type' => $type,
            'plan_name' => $plan_name,
            'invoice_num' => $invoice_num,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'amount' => $amount,
            'site_setting' => SiteSetting::first(),
            ];
        Mail::send('emails/recipt', $data, function($message) use ($data) {
            $message->to($data['email'], 'Connect')->subject
                ('Payment Received');
            $message->from(SiteSetting::first()->mail_from_address,SiteSetting::first()->mail_from_name);
        });
    }

    public function newEvent($email,$name,$title,$date,$time)
    {
        $data = [
            'email'=>$email,
            'name' => $name,
            'title' => $title,
            'date' => $date,
            'time' => $time,
            ];
        Mail::send('emails/new-event', $data, function($message) use ($data) {
            $message->to($data['email'], $data['name'])->subject
                ('New Event');
            $message->from(SiteSetting::first()->mail_from_address,SiteSetting::first()->mail_from_name);
        });
    }

    public function getFilteredEmails($request)
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

           $emails = $query->get('email')->toArray();
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
            $emails = $query->get('email')->toArray();
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

        return $emails;
    }

}
