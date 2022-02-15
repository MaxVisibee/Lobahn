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

     public function profileReceived($email,$candidate_name,$position_title,$jsr_score,$opportunity_id,$candidate_id)
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
        Mail::send('emails/profile_received', $data, function($message) use ($data) {
            $message->to($data['email'], 'Connect')->subject
                ('New Profile Received');
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

    public function registerEvent($event_id,$email,$name,$title,$image,$date,$time)
    {
        $data = [
            'event_id'=> $event_id,
            'title' => $title,
            'image' => $image,
            'date' => $date,
            'time' => $time,
            'name' => $name,
            'email' => $email,
            'site_setting' => SiteSetting::first(),
        ];
        Mail::send('emails/registration-event', $data, function($message) use ($data) {
        $message->to($data['email'], $data['name'])->subject
            ('Event Registration');
        $message->from(SiteSetting::first()->mail_from_address,SiteSetting::first()->mail_from_name);
            });
    }

    public function newEvent($id,$title,$image,$date,$time)
    {
        $seeker_emails = User::where('change_of_status',true)->select('email','name')->get()->toArray();
        $company_emails = Company::where('change_of_status',true)->select('email','name')->get()->toArray();
        $emails = array_merge($seeker_emails, $company_emails);

        foreach($emails as $email)
        {
            $data = [
                'event_id'=> $id,
                'title' => $title,
                'image' => $image,
                'date' => $date,
                'time' => $time,
                'name' => $email['name'],
                'email' => $email['email'],
                'site_setting' => SiteSetting::first(),
            ];
            Mail::send('emails/new-event', $data, function($message) use ($data) {
            $message->to($data['email'], $data['name'])->subject
                ('New Event');
            $message->from(SiteSetting::first()->mail_from_address,SiteSetting::first()->mail_from_name);
             });
        }
    }

    public function getFilteredEmails($request)
    {
        if($request->type=="candidate")
        {
            $emails = [];
            $seekers = User::where('is_active',true)->get();
            foreach($seekers as $seeker)
            {
                $institution_match = $studyfield_match = $industry_match = $qualification_match = $term_match =
                $job_title_match = $country_match = $functional_area_match = $experience_match = true;

                // Instritution Filter 
                if ($request->institutions){
                    $institution_match = false;
                    if(is_array(json_decode($seeker->institution_id)) && is_array($request->institutions)){
                        if(!empty(array_intersect(json_decode($seeker->institution_id),$request->institutions))){
                            $institution_match = true;
                        }
                    }
                }

                // StudyField Filter 
                if ($request->studyfields){
                    $studyfield_match = false;
                    if(is_array(json_decode($seeker->field_study_id)) && is_array($request->studyfields)){
                        if(!empty(array_intersect(json_decode($seeker->field_study_id),$request->studyfields))){
                            $studyfield_match = true;
                        }
                    }
                }

                // Industry Filter 
                if ($request->industries){
                    $industry_match = false;
                    if(is_array(json_decode($seeker->field_study_id)) && is_array($request->industries)){
                        if(!empty(array_intersect(json_decode($seeker->field_study_id),$request->industries))){
                            $industry_match = true;
                        }
                    }
                }

                // Job Title Filter 
                if ($request->job_titles){
                    $job_title_match = false;
                    if(is_array(json_decode($seeker->field_study_id)) && is_array($request->job_titles)){
                        if(!empty(array_intersect(json_decode($seeker->field_study_id),$request->job_titles))){
                            $job_title_match = true;
                        }
                    }
                }

                // Job Terms Filter 
                if ($request->terms){
                    $term_match = false;
                    if(is_array(json_decode($seeker->contract_hour_id)) && is_array($request->terms)){
                        if(!empty(array_intersect(json_decode($seeker->contract_hour_id),$request->terms))){
                            $term_match = true;
                        }
                    }
                }

                // Functional Area Filter 
                if ($request->areas){
                    $functional_area_match = false;
                    if(is_array(json_decode($seeker->functional_area_id)) && is_array($request->areas)){
                        if(!empty(array_intersect(json_decode($seeker->functional_area_id),$request->areas))){
                            $functional_area_match = true;
                        }
                    }
                }

                // Qualification Filter 
                if ($request->qualifications){
                    $qualification_match = false;
                    if(is_array(json_decode($seeker->country_id)) && is_array($request->qualifications)){
                        if(!empty(array_intersect(json_decode($seeker->country_id),$request->qualifications))){
                            $qualification_match = true;
                        }
                    }
                }

                // Country Filter 
                if ($request->countries){
                    $country_match = false;
                    if(is_array(json_decode($seeker->country_id)) && is_array($request->countries)){
                        if(!empty(array_intersect(json_decode($seeker->country_id),$request->countries))){
                            $country_match = true;
                        }
                    }
                }

                if($request->experience)
                {
                    $experience_match = false;
                    if( $seeker->experience_id){
                        if($seeker->jobExperience->priority >= $request->experience-1)
                        $experience_match = true;
                    }
                    
                }

                if($institution_match && $studyfield_match && $industry_match && $qualification_match && $term_match && $job_title_match && $country_match && $functional_area_match && $experience_match) {
                    array_push($emails,$seeker->email);
                }
            }
        } // end of individual 
        
        elseif($request->type=="coporate")
        {
            $emails = [];
            $companies = Company::where('is_active',true)->get();
            foreach($companies as $company)
            {
                $coporate_country_match = $coporate_industry_match = true;

                // Coporate Country Filter 
                if ($request->coporate_countries){
                    $coporate_country_match = false;
                    if(is_array(json_decode($company->country_id)) && is_array($request->coporate_countries)){
                        if(!empty(array_intersect(json_decode($company->country_id),$request->coporate_countries))){
                            $coporate_country_match = true;
                        }
                    }
                }

                // Coporate Industry Filter
                if ($request->coporate_industries){
                    $coporate_industry_match = false;
                    if(is_array(json_decode($company->industry_id)) && is_array($request->coporate_industries)){
                        if(!empty(array_intersect(json_decode($company->industry_id),$request->coporate_industries))){
                            $coporate_industry_match = true;
                        }
                    }
                }
                if($coporate_country_match && $coporate_industry_match){
                    array_push($emails,$company->email);
                }
            }   
        } // end of coporate
        
        else
        {
            $emails = [];
            $seekers = User::where('is_active',true)->get();
            foreach($seekers as $seeker)
            {
                $institution_match = $studyfield_match = $industry_match = $qualification_match = $term_match =
                $job_title_match = $country_match = $functional_area_match = $experience_match = true;

                // Instritution Filter 
                if ($request->institutions){
                    $institution_match = false;
                    if(is_array(json_decode($seeker->institution_id)) && is_array($request->institutions)){
                        if(!empty(array_intersect(json_decode($seeker->institution_id),$request->institutions))){
                            $institution_match = true;
                        }
                    }
                }

                // StudyField Filter 
                if ($request->studyfields){
                    $studyfield_match = false;
                    if(is_array(json_decode($seeker->field_study_id)) && is_array($request->studyfields)){
                        if(!empty(array_intersect(json_decode($seeker->field_study_id),$request->studyfields))){
                            $studyfield_match = true;
                        }
                    }
                }

                // Industry Filter 
                if ($request->industries){
                    $industry_match = false;
                    if(is_array(json_decode($seeker->industry_id)) && is_array($request->industries)){
                        if(!empty(array_intersect(json_decode($seeker->industry_id),$request->industries))){
                            $industry_match = true;
                        }
                    }
                }

                // Job Title Filter 
                if ($request->job_titles){
                    $job_title_match = false;
                    if(is_array(json_decode($seeker->position_title_id)) && is_array($request->job_titles)){
                        if(!empty(array_intersect(json_decode($seeker->position_title_id),$request->job_titles))){
                            $job_title_match = true;
                        }
                    }
                }

                // Job Terms Filter 
                if ($request->terms){
                    $term_match = false;
                    if(is_array(json_decode($seeker->contract_hour_id)) && is_array($request->terms)){
                        if(!empty(array_intersect(json_decode($seeker->contract_hour_id),$request->terms))){
                            $term_match = true;
                        }
                    }
                }

                // Functional Area Filter 
                if ($request->areas){
                    $functional_area_match = false;
                    if(is_array(json_decode($seeker->functional_area_id)) && is_array($request->areas)){
                        if(!empty(array_intersect(json_decode($seeker->functional_area_id),$request->areas))){
                            $functional_area_match = true;
                        }
                    }
                }

                // Qualification Filter 
                if ($request->qualifications){
                    $qualification_match = false;
                    if(is_array(json_decode($seeker->qualification_id)) && is_array($request->qualifications)){
                        if(!empty(array_intersect(json_decode($seeker->qualification_id),$request->qualifications))){
                            $qualification_match = true;
                        }
                    }
                }

                // Country Filter 
                if ($request->countries){
                    $country_match = false;
                    if(is_array(json_decode($seeker->country_id)) && is_array($request->countries)){
                        if(!empty(array_intersect(json_decode($seeker->country_id),$request->countries))){
                            $country_match = true;
                        }
                    }
                }

                if($request->experience)
                {
                    $experience_match = false;
                    if( $seeker->experience_id){
                        if($seeker->jobExperience->priority >= $request->experience-1)
                        $experience_match = true;
                    }
                    
                }

                if($institution_match && $studyfield_match && $industry_match && $qualification_match && $term_match && $job_title_match && $country_match && $functional_area_match && $experience_match) {
                    array_push($emails,$seeker->email);
                }

                $companies = Company::where('is_active',true)->get();
                foreach($companies as $company)
                {
                    $coporate_country_match = $coporate_industry_match = true;
                    // Coporate Country Filter 
                    if ($request->coporate_countries){
                        $coporate_country_match = false;
                        if(is_array(json_decode($company->country_id)) && is_array($request->coporate_countries)){
                            if(!empty(array_intersect(json_decode($company->country_id),$request->coporate_countries))){
                                $coporate_country_match = true;
                            }
                        }
                    }
                
                    // Coporate Industry Filter
                    if ($request->coporate_industries){
                        $coporate_industry_match = false;
                        if(is_array(json_decode($company->industry_id)) && is_array($request->coporate_industries)){
                            if(!empty(array_intersect(json_decode($company->industry_id),$request->coporate_industries))){
                                $coporate_industry_match = true;
                            }
                        }
                    }
                    if($coporate_country_match && $coporate_industry_match){
                        array_push($emails,$company->email);
                    }
                }

            }
        } // end of both individual and coporate

        return $emails;
    }

}
