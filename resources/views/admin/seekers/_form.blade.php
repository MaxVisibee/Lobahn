<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>First Name <span class="text-danger">*</span></strong>
            {!! Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control','id'=>'first_name', 'required')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Last Name <span class="text-danger">*</span></strong>
            {!! Form::text('last_name', null, array('placeholder' => 'Last Name','class' => 'form-control','id'=>'last_name', 'required')) !!}
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
        <div class="form-group row m-b-15">
            <strong>Position Title :</strong>
            {!! Form::select('position_title_id', $job_titles, null, array('placeholder' => 'Select Position','class' => 'form-control','id'=>'position_title_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Job Type :</strong>
            {!! Form::select('contract_hour_id', $job_types, null, array('placeholder' => 'Select Job Type','class' => 'form-control','id'=>'contract_hour_id')) !!}
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
            {!! Form::select('state_id', $areas,null, array('placeholder' => 'Select Area','class' => 'form-control select2','id'=>'state_id', 'required')) !!}
        </div>
    </div>    
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>District <span class="text-danger">*</span></strong>
            {!! Form::select('city_id', [], null, array('placeholder' => 'Select District','class' => 'form-control select2','id'=>'city_id', 'required')) !!}
        </div>
    </div>    
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Street Address </strong>
            {!! Form::text('street_address', null, array('placeholder' => 'Street Address','class' => 'form-control','id'=>'street_address')) !!}
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
        <div class="form-group m-b-15">
            <strong>Experience :</strong>
            {!! Form::select('experience_id', $experiences, null, array('placeholder' => 'Experience','class' => 'form-control','id'=>'experience_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Management Level :</strong>
            {!! Form::select('career_level_id', $carrier_levels, null, array('placeholder' => 'Management Level','class' => 'form-control','id'=>'career_level_id')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Education Level :</strong>
            {!! Form::select('degree_level_id', $degree_levels, null, array('placeholder' => 'Experience','class' => 'form-control','id'=>'degree_level_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Academic Institutions :</strong>
            {!! Form::text('academic_institution', null, array('placeholder' => 'Academic Institutions','class' => 'form-control','id'=>'academic_institution')) !!}
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
            {!! Form::select('study_field_id', $study_fields, null, array('placeholder' => 'Fields of Study','class' => 'form-control','id'=>'study_field_id')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Functions:</strong>
            {!! Form::select('functional_area_id', $functionals, null, array('placeholder' => 'Select Function','class' => 'form-control','id'=>'functional_area_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Contract Terms :</strong>
            {!! Form::text('contract_term', null, array('placeholder' => 'Contract Terms','class' => 'form-control','id'=>'contract_term')) !!}
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
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>Geographical Experience:</strong>
            {!! Form::textarea('geographical_experience', null, array('placeholder' => 'Geographical Experience','class' => 'form-control ckeditor','id'=>'geographical_experience','rows'=>5)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>People Management:</strong>
            {!! Form::textarea('people_management', null, array('placeholder' => 'People Management','class' => 'form-control ckeditor','id'=>'people_management','rows'=>5)) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>Software & Tech Knowledge:</strong>
            {!! Form::textarea('tech_knowledge', null, array('placeholder' => 'Software & Tech Knowledge','class' => 'form-control ckeditor','id'=>' tech_knowledge','rows'=>5)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>Qualification:</strong>
            {!! Form::textarea('qualification', null, array('placeholder' => 'Qualification','class' => 'form-control ckeditor','id'=>' qualification','rows'=>5)) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Profile Photo<span class="text-danger">*</span>:</strong>
            @if(isset($model))
                <input type="file" name="image" class="dropify" id="image" data-default-file="{{ $model->image ? url('uploads/profile_photo/'.$model->image):'' }}" accept="image/*;capture=camera,.png,.jpg,.jpeg" data-allowed-file-extensions="jpg jpeg png svg"/>
            @else
                <input type="file" name="image" class="dropify" id="image" accept="image/*;capture=camera,.png,.jpg,.jpeg" data-allowed-file-extensions="jpg jpeg png svg"/>
            @endif
            {{-- {!! Form::file('image', null, array('id'=>'image')) !!} --}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Upload CV :</strong>
            <!-- <input type="file" class="" id="image" name="image[]" > -->
            {!! Form::file('cv', null, array('id'=>'cv')) !!}
            {{-- {!! Form::text('street_address', null, array('placeholder' => 'Street Address','class' => 'form-control','id'=>'street_address','required')) !!}  --}}                       
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