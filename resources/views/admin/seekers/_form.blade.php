<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Profile Photo <span class="text-danger">*</span>:</strong>
            @if(isset($model))
                <input type="file" name="image" class="dropify" id="image" data-default-file="{{ $model->image ? url('uploads/profile_photos/'.$model->image):'' }}" accept="image/*;capture=camera,.png,.jpg,.jpeg" data-allowed-file-extensions="jpg jpeg png svg"/>
            @else
                <input type="file" name="image" class="dropify" id="image" accept="image/*;capture=camera,.png,.jpg,.jpeg" data-allowed-file-extensions="jpg jpeg png svg"/>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Upload CV :</strong>
            @if(isset($model))
                <input type="hidden" name="cv_count" id="cv_count" value="{{$model->cv?count(json_decode($model->cv)):1}}">
                <div class="cv-wrapper">
                    <div class="cv-row-1 mb-2">
                        <input type="file" name="cv[]" id="cv_1" accept=".pdf,.doc,.docx"/>
                    </div>
                </div>
                <div class="cv-filewrapper">
                    @foreach($cvs as $cv)
                        <div class="oldcv-row-{{$cv->id}} mb-2">
                            <a href="{{asset('uploads/cv_files/'.$cv->cv_file)}}"> {{$cv->cv_file}} </a>
                            <button type="button" onClick="removeUploadCV({{$cv->id}}, {{$cv->user_id}})" class="btn btn-danger btn-xs float-right">x</button>
                        </div>
                    @endforeach
                </div>
            @else
                <input type="hidden" name="cv_count" id="cv_count" value="1">
                <div class="cv-wrapper">
                    <div class="cv-row-1 mb-2">
                        <input type="file" name="cv[]" id="cv_1" accept=".pdf,.doc,.docx"/>
                    </div>
                </div>
            @endif
            
            <button type="button" class="btn btn-success btn-xs mt-2" onClick="addCV()">Add CV</button>
            {{-- @if(isset($model))
                <input type="file" name="cv[]" class="dropify" id="cv" data-default-file="{{ $model->cv ? url('uploads/cv_files/'.$model->cv):'' }}" accept=".pdf, .docs" data-allowed-file-extensions="pdf docs" multiple/>
            @else
                <input type="file" name="cv[]" class="dropify" id="cv" accept=".pdf, .docs" data-allowed-file-extensions="pdf docs" multiple/>
            @endif --}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Name <span class="text-danger">*</span>:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','id'=>'name', 'required')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>User Name <span class="text-danger">*</span>:</strong>
            {!! Form::text('user_name', null, array('placeholder' => 'User Name','class' => 'form-control','id'=>'user_name', 'required')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Email <span class="text-danger">*</span>:</strong>
            {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control','id'=>'email', 'required')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Phone <span class="text-danger">*</span>:</strong>
            {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control','id'=>'phone', 'required')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Password @if(!isset($model))<span class="text-danger">*</span>@endif:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control','id'=>'password', isset($model)?'':'required')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Confirm Password @if(!isset($model))<span class="text-danger">*</span>@endif:</strong>
            {!! Form::password('confirm_password', array('placeholder' => 'Confirm Password','class' => 'form-control','id'=>'confirm_password', isset($model)?'':'required')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Date of Birth :</strong>
            {!! Form::text('dob', isset($model->dob)? $model->dob->format('Y/m/d'):null, array('placeholder' => 'Date of Birth','class' => 'form-control datepicker','id'=>'dob')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Gender :</strong>
            {!! Form::select('gender', MiscHelper::getGender(), null, array('placeholder' => 'Select Gender','class' => 'form-control','id'=>'gender')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Natinonal ID :</strong>
            {!! Form::text('nric', null, array('placeholder' => 'Natinonal ID','class' => 'form-control','id'=>'nric')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Marital Status </strong>
            {!! Form::select('marital_status', MiscHelper::getMaritalStatus(), null, array('placeholder' => 'Select Marital Status','class' => 'form-control','id'=>'marital_status')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Description :</strong>
            {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control summernote ckeditor','id'=>'description','rows'=>5)) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>HighLight :</strong>
            {!! Form::text('highlight_1', null, array('placeholder' => 'Highlight 1','class' => 'form-control mb-2','id'=>'highlight_1')) !!}
            {!! Form::text('highlight_2', null, array('placeholder' => 'Highlight 2','class' => 'form-control mb-2','id'=>'highlight_2')) !!}
            {!! Form::text('highlight_3', null, array('placeholder' => 'Highlight 3','class' => 'form-control','id'=>'highlight_3')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Location :</strong>
            {!! Form::select('country_id[]', $countries, isset($model)?json_decode($model->country_id):null, array('class' => 'form-control select2','id'=>'country_id', 'multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Employment Terms :</strong>
            {!! Form::select('contract_term_id[]', $job_types, isset($model)?json_decode($model->contract_term_id):null, array('class' => 'form-control','id'=>'contract_term_id', 'multiple')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Target Pay :</strong>
            {!! Form::text('target_salary', null, array('placeholder' => 'Target Pay','class' => 'form-control','id'=>'target_salary')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Full Time Salary:</strong>
            {!! Form::text('full_time_salary', null, array('placeholder' => 'Full Time Salary','class' => 'form-control','id'=>'full_time_salary')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Part Time Salary:</strong>
            {!! Form::text('part_time_salary', null, array('placeholder' => 'Part Time Salary','class' => 'form-control','id'=>'part_time_salary')) !!}
        </div>
    </div>
</div>
<div class="row">
    {{-- 
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Target Pay :</strong>
            {!! Form::select('target_pay_id', $target_pays, null, array('placeholder' => 'Select Target Pay','class' => 'form-control','id'=>'target_pay_id')) !!}
        </div>
    </div>
    --}}
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Contract Hours :</strong>
            {!! Form::select('contract_hour_id[]', $job_shifts, isset($model)?json_decode($model->contract_hour_id):null, array('class' => 'form-control','id'=>'contract_hour_id', 'multiple')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>KeyWords :</strong>            
            {!! Form::select('keyword_id[]', $keywords, isset($model)?json_decode($model->keyword_id):null, array('class' => 'form-control','id'=>'keyword_id','multiple'=>'multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Management Level :</strong>
            {!! Form::select('management_level_id', $carrier_levels, null, array('placeholder' => 'Management Level','class' => 'form-control','id'=>'management_level_id')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Years :</strong>
            {!! Form::select('experience_id', $experiences, null, array('placeholder' => 'Years','class' => 'form-control','id'=>'experience_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Education Level :</strong>
            {!! Form::select('education_level_id', $degree_levels, null, array('placeholder' => 'Experience','class' => 'form-control','id'=>'education_level_id')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Academic Institutions :</strong>
            {!! Form::select('institution_id[]', $institutions, isset($model)?json_decode($model->institution_id):null, array('class' => 'form-control','id'=>'institution_id', 'multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <strong>Languages :</strong>
        <input type="hidden" name="language_count" value="1" id="language_count">
        <div class="row">
            <div class="col-xs-5">
                <div class="form-group m-b-15">
                    {!! Form::select('language_id[]', $languages, null, array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-5">
                <div class="form-group m-b-15">
                    {!! Form::select('language_level[]', MiscHelper::getLanguageLevel(), null, array('class' => 'form-control language_level select2-default','id'=>'language_level')) !!}
                </div>
            </div>
            <div class="col-xs-2">
                <div class="form-group addon_btn m-b-15">
                    <button id="add_language" type="button" class="btn btn-success" onClick="addLanguageRow()">+</button>
                </div>
            </div>
        </div>
        <div class="language-append"> </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Geographical Experience :</strong>
            {!! Form::select('geographical_id[]', $geographicals , isset($model)?json_decode($model->geographical_id):null, array('class' => 'form-control','id'=>'geographical_id', 'multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>People Management :</strong>
            {!! Form::select('people_management_id', MiscHelper::getNumEmployees(), null, array('placeholder' => 'Select People Management','class' => 'form-control','id'=>'people_management_id')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Software & tech knowledge :</strong>
            {!! Form::select('skill_id[]', $skills, isset($model)?json_decode($model->skill_id):null, array('class' => 'form-control','id'=>'skill_id', 'multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Fields of Study :</strong>
            {!! Form::select('field_study_id[]', $skills, isset($model)?json_decode($model->field_study_id):null, array('class' => 'form-control', 'id'=>'field_study_id', 'multiple')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Qualifications :</strong>
            {!! Form::select('qualification_id[]', $qualifications, isset($model)?json_decode($model->qualification_id):null, array('class' => 'form-control','id'=>'qualification_id', 'multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Key Strength :</strong>
            {!! Form::select('key_strength_id[]', $key_strengths, isset($model)?json_decode($model->key_strength_id):null, array('class' => 'form-control','id'=>'key_strength_id', 'multiple')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Position Title :</strong>
            {!! Form::select('position_title_id[]', $job_titles, isset($model)?json_decode($model->position_title_id):null, array('class' => 'form-control','id'=>'position_title_id', 'multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Industry :</strong>
            {!! Form::select('industry_id[]', $industries, isset($model)?json_decode($model->industry_id):null, array('class' => 'form-control', 'id'=>'industry_id', 'multiple')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Industry Sector :</strong>
            {!! Form::select('sub_sector_id[]', $sectors, isset($model)?json_decode($model->sub_sector_id):null, array('class' => 'form-control', 'id'=>'sub_sector_id', 'multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Functional Area :</strong>
            {!! Form::select('functional_area_id[]', $functionals, isset($model)?json_decode($model->functional_area_id):null, array('class' => 'form-control','id'=>'functional_area_id', 'multiple')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Specialists :</strong>
            {!! Form::select('specialist_id[]', $specialities, isset($model)?json_decode($model->specialist_id):null, array('class' => 'form-control','id'=>'specialist_id', 'multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Target Employer :</strong>
            {!! Form::select('target_employer_id[]', $companies, isset($model)?json_decode($model->target_employer_id):null, array('class' => 'form-control select2','id'=>'target_employer_id', 'multiple')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Package :</strong>
            {!! Form::select('package_id', $packages, null, array('placeholder' => 'Select Package','class' => 'form-control','id'=>'package_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div class="form-group m-b-15">
            <strong class="mr-4"> {!! Form::checkbox('is_immediate_available', 1, true, array('id'=>'is_immediate_available')) !!} Is Immediate Available? </strong>
            <strong class="mr-4"> {!! Form::checkbox('is_active', 1, true, array('id'=>'is_active')) !!} Is Active? </strong>
            <strong> {!! Form::checkbox('verified', 1, true, array('id'=>'verified')) !!} Is Verified? </strong>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        </div>
        <div class="pull-right">
            <a class="btn btn-warning" href="{{ route('seekers.index') }}">Back to Listing</a>
            {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
</div>
