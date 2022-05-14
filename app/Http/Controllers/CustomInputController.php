<?php

namespace App\Http\Controllers;
use App\Models\CustomInput;
use App\Models\FunctionalArea;
use App\Models\KeyStrength;
use App\Models\Industry;
use App\Models\TargetCompany;
use App\Models\Institution;
use App\Models\JobSkill;
use App\Models\JobTitle;
use App\Models\Keyword;
use App\Models\Qualification;
use App\Models\StudyField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomInputController extends Controller
{
    public function index(){
        $industries =CustomInput::where('field','industry')->get();
        $institutions = CustomInput::where('field','institution')->get();
        $target_employers = CustomInput::where('field','target-employer')->get();
        $position_titles = CustomInput::where('field','position-title')->get();
        $functional_areas = CustomInput::where('field','functional-area')->get();
        $keywords = CustomInput::where('field','keyword')->get();
        $skills = CustomInput::where('field','skill')->get();
        $study_fields = CustomInput::where('field','study-field')->get();
        $qualifications = CustomInput::where('field','qualification')->get();
        $keystrengths = CustomInput::where('field','key-strength')->get();
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
            $industry =$industry->save();

        }else if($field_name=="institution"){//countryid and area id
            $institution = new Institution();
            $institution->institution_name = $input->name;
            $institution->is_active = 1;
            $institution->save();
        }else if($field_name=="target-employer"){
            $tg_company = new TargetCompany();
            $tg_company->company_name = $input->name;
            $tg_company->is_active = 1;
            $tg_company->save();
        }else if($field_name=="position-title"){
            $job_title = new JobTitle();
            $job_title->job_title = $input->name;
            $job_title->is_active = 1;
            $job_title->save();
        }
        else if($field_name=="functional-area"){
            $fun_area = new FunctionalArea();
            $fun_area->area_name = $input->name;
            $fun_area->is_active = 1;
            $fun_area->save();
        }
        else if($field_name=="keyword"){
            $keyword = new Keyword();
            $keyword->keyword_name = $input->name;
            $keyword->is_active = 1;
            $keyword->save();
        }
        else if($field_name=="skill"){
            $job_skill = new JobSkill();
            $job_skill->job_skill = $input->name;
            $job_skill->is_active = 1;
            $job_skill->save();
        }
        else if($field_name=="study-field"){
            $study_field = new StudyField();
            $study_field->study_field_name = $input->name;
            $study_field->is_active = 1;
            $study_field->save();
        }
        else if($field_name=="key-strength"){
            $study_field = new KeyStrength();
            $study_field->key_strength_name = $input->name;
            $study_field->is_active = 1;
            $study_field->save();
        }else{
            $qualification = new Qualification();
            $qualification->qualification_name = $input->name;
            $qualification->is_active = 1;
            $qualification->save();
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


