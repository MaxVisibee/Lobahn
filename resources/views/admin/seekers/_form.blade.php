<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Name <span class="text-danger">*</span></strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','id'=>'name', 'required')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>User Name <span class="text-danger">*</span></strong>
            {!! Form::text('user_name', null, array('placeholder' => 'User Name','class' => 'form-control','id'=>'user_name', 'required')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Email <span class="text-danger">*</span></strong>
            {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control','id'=>'email', 'required')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="form-group m-b-15">
            <strong>Password @if(!isset($model))<span class="text-danger">*</span>@endif</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control','id'=>'password', isset($model)?'':'required')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="form-group m-b-15">
            <strong>Confirm Password @if(!isset($model))<span class="text-danger">*</span>@endif</strong>
            {!! Form::password('confirm_password', array('placeholder' => 'Confirm Password','class' => 'form-control','id'=>'confirm_password', isset($model)?'':'required')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Phone </strong>
            {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control','id'=>'phone')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Mobile Phone <span class="text-danger">*</span></strong>
            {!! Form::text('mobile_phone', null, array('placeholder' => 'Mobile Phone','class' => 'form-control','id'=>'mobile_phone', 'required')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Date of Birth <span class="text-danger">*</span></strong>
            {!! Form::date('dob', null, array('placeholder' => 'Date of Birth','class' => 'form-control','id'=>'dob', 'required')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Father Name </strong>
            {!! Form::text('father_name', null, array('placeholder' => 'Father Name','class' => 'form-control','id'=>'father_name')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Nationality <span class="text-danger">*</span></strong>
            {!! Form::text('nationality', null, array('placeholder' => 'Nationality','class' => 'form-control','id'=>'nationality', 'required')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>NRIC <span class="text-danger">*</span></strong>
            {!! Form::text('nric', null, array('placeholder' => 'NRIC','class' => 'form-control','id'=>'nric', 'required')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Gender </strong>
            {!! Form::select('gender', MiscHelper::getGender(), null, array('placeholder' => 'Select Gender','class' => 'form-control','id'=>'gender')) !!}
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
        <div class="form-group row m-b-15">
            <strong>Position Title<span class="text-danger">*</span>:</strong>
            {!! Form::select('position_title_id', $job_titles, null, array('placeholder' => 'Select Position','class' => 'form-control','id'=>'position_title_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>KeyWords:</strong>
            {!! Form::select('keyword_id', $keywords, null, array('placeholder' => 'Select KeyWords','class' => 'form-control','id'=>'keyword_id')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Contract Term<span class="text-danger">*</span>:</strong>
            {!! Form::select('contract_term_id', $job_types, null, array('placeholder' => 'Select Contract Term','class' => 'form-control','id'=>'contract_term_id','required'=>true)) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Contract Hour :</strong>
            {!! Form::select('contract_hour_id', $job_shifts, null, array('placeholder' => 'Select Contract Hour','class' => 'form-control','id'=>'contract_hour_id')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Industry :</strong>
            {!! Form::select('industry_id', $industries, null, array('placeholder' => 'Select Industry','class' => 'form-control','id'=>'industry_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Sub Sector :</strong>
            {!! Form::select('sub_sector_id', $sectors, null, array('placeholder' => 'Select Sub Sector','class' => 'form-control','id'=>'sub_sector_id')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Employer :</strong>
            {!! Form::select('company_id', $companies,null, array('placeholder' => 'Select Employer','class' => 'form-control select2','id'=>'company_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Country <span class="text-danger">*</span></strong>
            {!! Form::select('country_id', $countries,null, array('placeholder' => 'Select Country','class' => 'form-control select2','id'=>'country_id', 'required')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Area <span class="text-danger">*</span></strong>
            {!! Form::select('area_id', $areas,null, array('placeholder' => 'Select Area','class' => 'form-control select2','id'=>'area_id', 'required')) !!}
        </div>
    </div>    
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>District <span class="text-danger">*</span></strong>
            {!! Form::select('district_id', $districts, null, array('placeholder' => 'Select District','class' => 'form-control select2','id'=>'district_id', 'required')) !!}
        </div>
    </div>    
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Street Address </strong>
            {!! Form::text('address', null, array('placeholder' => 'Street Address','class' => 'form-control','id'=>'address')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Experience :</strong>
            {!! Form::select('experience_id', $experiences, null, array('placeholder' => 'Experience','class' => 'form-control','id'=>'experience_id')) !!}
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
            <strong>Education Level :</strong>
            {!! Form::select('education_level_id', $degree_levels, null, array('placeholder' => 'Experience','class' => 'form-control','id'=>'education_level_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Institutions :</strong>
            {!! Form::select('institution_id', $institutions, null, array('placeholder' => 'Institutions','class' => 'form-control','id'=>'institution_id')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Languages :</strong>
            {!! Form::select('language_id', $languages, null, array('placeholder' => 'Languages','class' => 'form-control','id'=>'language_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Fields of Study :</strong>
            {!! Form::select('field_study_id', $study_fields, null, array('placeholder' => 'Fields of Study','class' => 'form-control','id'=>'field_study_id')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Geographical Experiences:</strong>
            {!! Form::select('geographical_id', $geographicals ,null, array('placeholder' => 'Select Geographical Experience','class' => 'form-control','id'=>'geographical_id')) !!}
        </div>
    </div>
     <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>People Management:</strong>
            {!! Form::select('people_management_id', MiscHelper::getNumEmployees(), null, array('placeholder' => 'Select People Management','class' => 'form-control','id'=>'people_management_id')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Functions:</strong>
            {!! Form::select('function_id', $functionals, null, array('placeholder' => 'Select Function','class' => 'form-control','id'=>'function_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Skill:</strong>
            {!! Form::select('skill_id',$skills, null, array('placeholder' => 'Select Skill','class' => 'form-control','id'=>'skill_id')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Qualifications:</strong>
            {!! Form::select('qualification_id', $qualifications, null, array('placeholder' => 'Select Qualifications','class' => 'form-control','id'=>'qualification_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Key Strength:</strong>
            {!! Form::select('key_strength_id', $key_strengths, null, array('placeholder' => 'Select Key Strength','class' => 'form-control','id'=>'key_strength_id')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Specialists:</strong>
            {!! Form::select('specialist_id', $specialities, null, array('placeholder' => 'Select Specialists','class' => 'form-control','id'=>'specialist_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Package :</strong>
            {!! Form::select('package_id', $packages,null, array('placeholder' => 'Select Package','class' => 'form-control','id'=>'package_id')) !!}
        </div>
    </div>   
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Package Start Date :</strong>
            {!! Form::text('package_start_date', null, array('placeholder' => 'Package Start Date','class' => 'form-control datepicker','id'=>'package_start_date')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Package End Date :</strong>
            {!! Form::text('package_end_date', null, array('placeholder' => 'Package End Date','class' => 'form-control datepicker','id'=>'package_end_date')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Current Salary </strong>
            {!! Form::text('current_salary', null, array('placeholder' => 'Current Salary','class' => 'form-control','id'=>'current_salary')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Expected Salary </strong>
            {!! Form::text('expected_salary', null, array('placeholder' => 'Expected Salary','class' => 'form-control','id'=>'expected_salary')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Payment:</strong>
            {!! Form::select('payment_id', $payments, null, array('placeholder' => 'Select Function','class' => 'form-control','id'=>'payment_id')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="form-group row m-b-15">
            <strong> {!! Form::checkbox('is_immediate_available', 1, true, array('id'=>'is_immediate_available')) !!} Is Immediate Available? </strong>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="form-group row m-b-15">
            <strong> {!! Form::checkbox('is_active', 1, true, array('id'=>'is_active')) !!} Is Active? </strong>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="form-group m-b-15">
            <strong> {!! Form::checkbox('verified', 1, true, array('id'=>'verified')) !!} Is Verified? </strong>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Profile Photo<span class="text-danger">*</span>:</strong>
            @if(isset($model))
                <input type="file" name="image" class="dropify" id="image" data-default-file="{{ $model->image ? url('uploads/profile_photos/'.$model->image):'' }}" accept="image/*;capture=camera,.png,.jpg,.jpeg" data-allowed-file-extensions="jpg jpeg png svg"/>
            @else
                <input type="file" name="image" class="dropify" id="image" accept="image/*;capture=camera,.png,.jpg,.jpeg" data-allowed-file-extensions="jpg jpeg png svg"/>
            @endif
            {{-- {!! Form::file('image', null, array('id'=>'image')) !!} --}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Upload CV :</strong>
            @if(isset($model))
                <input type="file" name="cv" class="dropify" id="cv" data-default-file="{{ $model->cv ? url('uploads/cv_files/'.$model->cv):'' }}" accept=".pdf, .docs" data-allowed-file-extensions="pdf docs"/>
            @else
                <input type="file" name="cv" class="dropify" id="cv" accept=".pdf, .docs" data-allowed-file-extensions="pdf docs"/>
            @endif
            {{-- {!! Form::file('cv', null, array('id'=>'cv')) !!} --}}
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