<?php

namespace App\Http\Controllers;
use App\Models\CustomInput;
use App\Models\FunctionalArea;
use App\Models\FunctionalAreaUsage;
use App\Models\KeyStrength;
use App\Models\KeyStrengthUsage;
use App\Models\Industry;
use App\Models\IndustryUsage;
use App\Models\TargetCompany;
use App\Models\TargetEmployerUsage;
use App\Models\Institution;
use App\Models\InstitutionUsage;
use App\Models\JobSkill;
use App\Models\JobSkillOpportunity;
use App\Models\JobSkillUsage;
use App\Models\JobTitle;
use App\Models\JobTitleUsage;
use App\Models\Keyword;
use App\Models\KeywordUsage;
use App\Models\Qualification;
use App\Models\QualificationUsage;
use App\Models\StudyField;
use App\Models\StudyFieldUsage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomInputController extends Controller
{
    public function index(){
        $industries =CustomInput::where('field','industry')->orderBy('id', 'DESC')->get();
        $institutions = CustomInput::where('field','institution')->orderBy('id', 'DESC')->get();
        $target_employers = CustomInput::where('field','target-employer')->orderBy('id', 'DESC')->get();
        $position_titles = CustomInput::where('field','position-title')->orderBy('id', 'DESC')->get();
        $functional_areas = CustomInput::where('field','functional-area')->orderBy('id', 'DESC')->get();
        $keywords = CustomInput::where('field','keyword')->orderBy('id', 'DESC')->get();
        $skills = CustomInput::where('field','skill')->orderBy('id', 'DESC')->get();
        $study_fields = CustomInput::where('field','study-field')->orderBy('id', 'DESC')->get();
        $qualifications = CustomInput::where('field','qualification')->orderBy('id', 'DESC')->get();
        $keystrengths = CustomInput::where('field','key-strength')->orderBy('id', 'DESC')->get();
        $tab ='industry';
        return view('admin.custom_inputs.index',compact(
            'industries',
            'institutions',
            'target_employers',
            'position_titles',
            'functional_areas',
            'keywords',
            'skills',
            'study_fields',
            'qualifications',
            'keystrengths',
            'tab'
        ));
    }

    public function update($id,Request $request){
       
        $input = CustomInput::find($id);
       
        if($input->status =='1'){
           if($input->field=="industry"){

           $keyword =Industry::where('industry_name',$input->name)->first();
           $keyword->industry_name =$request->name;
           $keyword->update();

        }else if($input->field=="institution"){//countryid and area 

            $keyword =Institution::where('institution_name',$input->name)->first();
            $keyword->institution_name =$request->name;
            $keyword->update();
        }else if($input->field=="target-employer"){

            $keyword =TargetCompany::where('company_name',$input->name)->first();
            $keyword->company_name =$request->name;
            $keyword->update();
        }else if($input->field=="position-title"){

            $keyword =JobTitle::where('job_title',$input->name)->first();
            $keyword->job_title =$request->name;
            $keyword->update();
            
        }
        else if($input->field=="functional-area"){
           
            $keyword =FunctionalArea::where('area_name',$input->name)->first();
            $keyword->area_name =$request->name;
            $keyword->update();
        }
        else if($input->field=="keyword"){
            $keyword =Keyword::where('keyword_name',$input->name)->first();
            if($keyword){
            $keyword->keyword_name =$request->name;
            $keyword->update();
            }
        }
        else if($input->field=="skill"){
           
            $keyword =JobSkill::where('job_skill',$input->name)->first();
            $keyword->job_skill =$request->name;
            $keyword->update();
        }
        else if($input->field=="study-field"){
            $keyword =StudyField::where('study_field_name',$input->name)->first();
            $keyword->study_field_name =$request->name;
            $keyword->update();
        }
        else if($input->field=="key-strength"){
           
            $keyword =KeyStrength::where('key_strength_name',$input->name)->first();
            $keyword->key_strength_name =$request->name;
            $keyword->update();
        }else{

            $keyword =Qualification::where('qualification_name',$input->name)->first();
            $keyword->qualification_name =$request->name;
            $keyword->update();
        }
        
       } 

       $input->name = $request->name;
       $input->update();

       return $input;
       
    }

    public function approve($id){
        $tab='industries';
        $key = (int)$id;
        $input = CustomInput::find($key);
        DB::transaction(function($id) use ($key) {
        $input = CustomInput::find($key);
        $input->status =1;
        $input->update();
        $field_name = $input->field;
        if($field_name=="industry"){
            $industry = new Industry();
            $industry->industry_name = $input->name;
            $industry->is_active = 1;
            $industry->save();

            // save in industry usage table
            $industry_usages = new IndustryUsage();
            $industry_usages->user_id = $input->user_id;
            $industry_usages->opportunity_id = $input->company_id;
            $industry_usages->industry_id = $industry->id;
            $industry_usages->save();
            //remove from custon-industry and add in industry-id from user table
            if($input->user_id !=0){
                $user =User::find($input->user_id);
                $arr =json_decode($user->custom_industry_id);
                if(count($arr)){
                    if (($key = array_search($input->id, $arr)) !== false) {
                        unset($arr[$key]);
                    }
                   $user->custom_industry_id = json_encode(array_values($arr));


                   $industry_arr =json_decode($user->industry_id);
                   if($industry_arr==null){
                       $industry_arr =[];
                   }
                   array_push($industry_arr, (string)$industry->id);
                   $user->industry_id =json_encode($industry_arr);
                   $user->update();
                   
                }

               
            }
            

        }else if($field_name=="institution"){//countryid and area id
            $institution = new Institution();
            $institution->institution_name = $input->name;
            $institution->is_active = 1;
            $institution->save();

             // save in Institution usage table
             $institution_usages = new InstitutionUsage();
             $institution_usages->user_id = $input->user_id;
             $institution_usages->opportunity_id = $input->company_id;
             $institution_usages->institution_id = $institution->id;
             $institution_usages->save();
             //remove from custon-industry and add in industry-id from user table
             if($input->user_id !=0){
                 $user =User::find($input->user_id);
                 $arr =json_decode($user->custom_institution_id);
                 if(count($arr)){
                     if (($key = array_search($input->id, $arr)) !== false) {
                         unset($arr[$key]);
                     }
                    $user->custom_institution_id = json_encode(array_values($arr));
 
 
                    $institution_arr =json_decode($user->institution_id);
                    if($institution_arr==null){
                        $institution_arr =[];
                    }
                    array_push($institution_arr, (string)$institution->id);
                    $user->institution_id =json_encode($institution_arr);
                    $user->update();
                    
                 }
 
                
             }
        }else if($field_name=="target-employer"){
            $tg_company = new TargetCompany();
            $tg_company->company_name = $input->name;
            $tg_company->is_active = 1;
            $tg_company->save();

             // save in industry usage table
             $tgcompany_usages = new TargetEmployerUsage();
             $tgcompany_usages->user_id = $input->user_id;
             $tgcompany_usages->opportunity_id = $input->company_id;
             $tgcompany_usages->target_employer_id = $tg_company->id;
             $tgcompany_usages->save();
             //remove from custon-industry and add in industry-id from user table
             if($input->user_id !=0){
                 $user =User::find($input->user_id);
                 $arr =json_decode($user->custom_industry_id);
                 if(count($arr)){
                     if (($key = array_search($input->id, $arr)) !== false) {
                         unset($arr[$key]);
                     }
                    $user->custom_target_employer_id = json_encode(array_values($arr));
 
 
                    $tgemployer_arr =json_decode($user->target_employer_id);
                    if($tgemployer_arr==null){
                        $tgemployer_arr =[];
                    }
                    array_push($tgemployer_arr, (string)$tg_company->id);
                    $user->target_employer_id =json_encode($tgemployer_arr);
                    $user->update();
                    
                 }
 
                
             }
        }else if($field_name=="position-title"){
            $job_title = new JobTitle();
            $job_title->job_title = $input->name;
            $job_title->is_active = 1;
            $job_title->save();

            // save in industry usage table
            $jtitle_usages = new JobTitleUsage();
            $jtitle_usages->user_id = $input->user_id;
            $jtitle_usages->opportunity_id = $input->company_id;
            $jtitle_usages->job_title_id = $job_title->id;
            $jtitle_usages->save();
            //remove from custon-industry and add in industry-id from user table
            if($input->user_id !=0){
                $user =User::find($input->user_id);
                $arr =json_decode($user->custom_position_title_id);
                if(count($arr)){
                    if (($key = array_search($input->id, $arr)) !== false) {
                        unset($arr[$key]);
                    }
                   $user->custom_position_title_id = json_encode(array_values($arr));


                   $jtitle_arr =json_decode($user->position_title_id);
                   if($jtitle_arr==null){
                       $jtitle_arr =[];
                   }

                   array_push($jtitle_arr, (string)$job_title->id);
                   $user->position_title_id =json_encode($jtitle_arr);
                   $user->update();
                   
                }

               
            }
        }
        else if($field_name=="functional-area"){
            $fun_area = new FunctionalArea();
            $fun_area->area_name = $input->name;
            $fun_area->is_active = 1;
            $fun_area->save();

            $farea_usages = new FunctionalAreaUsage();
            $farea_usages->user_id = $input->user_id;
            $farea_usages->opportunity_id = $input->company_id;
            $farea_usages->functional_area_id = $fun_area->id;
            $farea_usages->save();
            //remove from custon-industry and add in industry-id from user table
            if($input->user_id !=0){
                $user =User::find($input->user_id);
                $arr =json_decode($user->custom_functional_area_id);
                if(count($arr)){
                    if (($key = array_search($input->id, $arr)) !== false) {
                        unset($arr[$key]);
                    }
                   $user->custom_functional_area_id = json_encode(array_values($arr));


                   $farea_arr =json_decode($user->functional_area_id);
                   if($farea_arr==null){
                       $farea_arr =[];
                   }
                   array_push($farea_arr, (string)$fun_area->id);
                   $user->functional_area_id =json_encode($farea_arr);
                   $user->update();
                   
                }

               
            }
        }
        else if($field_name=="keyword"){
            $keyword = new Keyword();
            $keyword->keyword_name = $input->name;
            $keyword->is_active = 1;
            $keyword->save();

             // save in industry usage table
             $keyword_usages = new KeywordUsage();
             $keyword_usages->user_id = $input->user_id;
             $keyword_usages->opportunity_id = $input->company_id;
             $keyword_usages->keyword_id = $keyword->id;
             $keyword_usages->save();
             //remove from custon-industry and add in industry-id from user table
             if($input->user_id !=0){
                 $user =User::find($input->user_id);
                 $arr =json_decode($user->custom_keyword_id);
                 if(count($arr)){
                     if (($key = array_search($input->id, $arr)) !== false) {
                         unset($arr[$key]);
                     }
                    $user->custom_keyword_id = json_encode(array_values($arr));
 
 
                    $keyword_arr =json_decode($user->keyword_id);
                    if($keyword_arr==null){
                        $keyword_arr =[];
                    }
                    array_push($keyword_arr, (string)$keyword->id);
                    $user->keyword_id =json_encode($keyword_arr);
                    $user->update();
                    
                 }
 
                
             }
        }
        else if($field_name=="skill"){
            $job_skill = new JobSkill();
            $job_skill->job_skill = $input->name;
            $job_skill->is_active = 1;
            $job_skill->save();

             // save in industry usage table
             $opportunity_usages = new JobSkillOpportunity();
             $opportunity_usages->user_id = $input->user_id;
             $opportunity_usages->opportunity_id = $input->company_id;
             $opportunity_usages->job_skill_id = $job_skill->id;
             $opportunity_usages->save();
             //remove from custon-industry and add in industry-id from user table
             if($input->user_id !=0){
                 $user =User::find($input->user_id);
                 $arr =json_decode($user->custom_skill_id);
                 if(count($arr)){
                     if (($key = array_search($input->id, $arr)) !== false) {
                         unset($arr[$key]);
                     }
                    $user->custom_skill_id = json_encode(array_values($arr));
 
 
                    $jobskill_arr =json_decode($user->skill_id);
                    if($jobskill_arr==null){
                        $jobskill_arr =[];
                    }
                    array_push($jobskill_arr, (string)$job_skill->id);
                    $user->skill_id =json_encode($jobskill_arr);
                    $user->update();
                    
                 }
 
                
             }
        }
        else if($field_name=="study-field"){
            $study_field = new StudyField();
            $study_field->study_field_name = $input->name;
            $study_field->is_active = 1;
            $study_field->save();

             // save in industry usage table
             $studyfield_usages = new StudyFieldUsage();
             $studyfield_usages->user_id = $input->user_id;
             $studyfield_usages->opportunity_id = $input->company_id;
             $studyfield_usages->field_study_id = $study_field->id;
             $studyfield_usages->save();
             //remove from custon-industry and add in industry-id from user table
             if($input->user_id !=0){
                 $user =User::find($input->user_id);
                 $arr =json_decode($user->custom_field_study_id);
                 if(count($arr)){
                     if (($key = array_search($input->id, $arr)) !== false) {
                         unset($arr[$key]);
                     }
                    $user->custom_field_study_id = json_encode(array_values($arr));
 
 
                    $studyfield_arr =json_decode($user->field_study_id);
                    if($studyfield_arr==null){
                        $studyfield_arr =[];
                    }
                    array_push($studyfield_arr, (string)$study_field->id);
                    $user->field_study_id =json_encode($studyfield_arr);
                    $user->update();
                    
                 }
 
                
             }
        }
        else if($field_name=="key-strength"){
            $keystrength = new KeyStrength();
            $keystrength->key_strength_name = $input->name;
            $keystrength->is_active = 1;
            $keystrength->save();

             // save in industry usage table
             $keystrength_usages = new KeyStrengthUsage();
             $keystrength_usages->user_id = $input->user_id;
             $keystrength_usages->opportunity_id = $input->company_id;
             $keystrength_usages->key_strength_id = $keystrength->id;
             $keystrength_usages->save();
             //remove from custon-industry and add in industry-id from user table
             if($input->user_id !=0){
                 $user =User::find($input->user_id);
                 $arr =json_decode($user->custom_key_strength_id);
                 if(count($arr)){
                     if (($key = array_search($input->id, $arr)) !== false) {
                         unset($arr[$key]);
                     }
                    $user->custom_key_strength_id = json_encode(array_values($arr));
 
 
                    $keystrength_arr =json_decode($user->key_strength_id);
                    if($keystrength_arr==null){
                        $keystrength_arr =[];
                    }
                    array_push($keystrength_arr, (string)$keystrength->id);
                    $user->key_strength_id =json_encode($keystrength_arr);
                    $user->update();
                    
                 }
 
                
             }
        }else{
            $qualification = new Qualification();
            $qualification->qualification_name = $input->name;
            $qualification->is_active = 1;
            $qualification->save();

             // save in industry usage table
             $qualification_usages = new QualificationUsage();
             $qualification_usages->user_id = $input->user_id;
             $qualification_usages->opportunity_id = $input->company_id;
             $qualification_usages->industry_id = $qualification->id;
             $qualification_usages->save();
             //remove from custon-industry and add in industry-id from user table
             if($input->user_id !=0){
                 $user =User::find($input->user_id);
                 $arr =json_decode($user->custom_qualification_id);
                 if(count($arr)){
                     if (($key = array_search($input->id, $arr)) !== false) {
                         unset($arr[$key]);
                     }
                    $user->custom_qualification_id = json_encode(array_values($arr));
 
 
                    $quli_arr =json_decode($user->qualification_id);
                    if($quli_arr==null){
                        $quli_arr =[];
                    }
                    array_push($industry_arr, (string)$qualification->id);
                    $user->qualification_id =json_encode($quli_arr);
                    $user->update();
                    
                 }
 
                
             }
        }
        });
       
        return redirect()->route('custom_inputs.index')->
        with( ['tab' => $input->field] );

    }

    public function unapprove($id){
        $key =$id;
        $input = CustomInput::find($key);
        DB::transaction(function($id) use ($key){
        $input = CustomInput::find($key);
        $input->status =0;
        $input->update();
        $field_name = $input->field;
        
        if($field_name=="industry"){
            Industry::where('industry_name',$input->name)->delete();
        }else if($field_name=="institution"){//countryid and area id
            Institution::where('institution_name',$input->name)->delete();
        }else if($field_name=="target-employer"){
            TargetCompany::where('company_name',$input->name)->delete();
          
        }else if($field_name=="position-title "){
            JobTitle::where('job_title',$input->name)->delete();
        }
        else if($field_name=="functional-area"){
            FunctionalArea::where('area_name',$input->name)->delete();

        }
        else if($field_name=="keyword"){
            Keyword::where('keyword_name',$input->name)->delete();

        }
        else if($field_name=="skill"){
            JobSkill::where('job_skill',$input->name)->delete();

        }
        else if($field_name=="study-field"){
            StudyField::where('study_field_name',$input->name)->delete();

        }
        else if($field_name=="study-field"){
            KeyStrength::where('key_strength_name',$input->name)->delete();

        }else{
            Qualification::where('qualification_name',$input->name)->delete();
        }

    });

        return redirect()->route('custom_inputs.index')
        ->with(['tab'=>$input->field]);

    }
}


