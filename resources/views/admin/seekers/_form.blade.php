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
            <label>First Name <span class="text-danger">*</span></label>
            {!! Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control','id'=>'first_name', 'required')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Last Name <span class="text-danger">*</span></label>
            {!! Form::text('last_name', null, array('placeholder' => 'Last Name','class' => 'form-control','id'=>'last_name', 'required')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Email <span class="text-danger">*</span></label>
            {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control','id'=>'email', 'required')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Password @if(!isset($model))<span class="text-danger">*</span>@endif</label>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control','id'=>'password', isset($model)?'':'required')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Father Name </label>
            {!! Form::text('father_name', null, array('placeholder' => 'Father Name','class' => 'form-control','id'=>'father_name')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Date of Birth <span class="text-danger">*</span></label>
            {!! Form::text('dob', null, array('placeholder' => 'Date of Birth','class' => 'form-control datepicker','id'=>'dob', 'required')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Gender </label>
            {!! Form::select('gender', MiscHelper::getGender(), null, array('placeholder' => 'Select Gender','class' => 'form-control','id'=>'gender')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Marital Status </label>
            {!! Form::select('marital_status', MiscHelper::getMaritalStatus(), null, array('placeholder' => 'Select Marital Status','class' => 'form-control','id'=>'marital_status')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Nationality <span class="text-danger">*</span></label>
            {!! Form::text('nationality', null, array('placeholder' => 'Nationality','class' => 'form-control','id'=>'nationality', 'required')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>NRIC <span class="text-danger">*</span></label>
            {!! Form::text('nric', null, array('placeholder' => 'NRIC','class' => 'form-control','id'=>'nric', 'required')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <label>Country <span class="text-danger">*</span></label>
            {!! Form::select('country_id', $countries,null, array('placeholder' => 'Select Country','class' => 'form-control select2','id'=>'country_id', 'required')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <label>State <span class="text-danger">*</span></label>
            {!! Form::select('state_id', $areas,null, array('placeholder' => 'Select State','class' => 'form-control select2','id'=>'state_id', 'required')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <label>City <span class="text-danger">*</span></label>
            {!! Form::select('city_id', [], null, array('placeholder' => 'Select City','class' => 'form-control select2','id'=>'city_id', 'required')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Phone </label>
            {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control','id'=>'phone')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Mobile Phone <span class="text-danger">*</span></label>
            {!! Form::text('mobile_phone', null, array('placeholder' => 'Mobile Phone','class' => 'form-control','id'=>'mobile_phone', 'required')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Experience </label>
            {!! Form::select('job_experience_id', [], null, array('placeholder' => 'Experience','class' => 'form-control','id'=>'job_experience_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Career Level </label>
            {!! Form::select('career_level_id', [], null, array('placeholder' => 'Career Level','class' => 'form-control','id'=>'career_level_id')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Industry <span class="text-danger">*</span></label>
            {!! Form::select('industry_id', $industries, null, array('placeholder' => 'Industry','class' => 'form-control select2','id'=>'industry_id', 'required')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Functional Area </label>
            {!! Form::select('functional_area_id', [], null, array('placeholder' => 'Functional Area','class' => 'form-control select2','id'=>'functional_area_id')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Current Salary </label>
            {!! Form::text('current_salary', null, array('placeholder' => 'Current Salary','class' => 'form-control','id'=>'current_salary')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Expected Salary </label>
            {!! Form::text('expected_salary', null, array('placeholder' => 'Expected Salary','class' => 'form-control','id'=>'expected_salary')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <label>Street Address <span class="text-danger">*</span></label>
            {!! Form::text('street_address', null, array('placeholder' => 'Street Address','class' => 'form-control','id'=>'street_address','required')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <label> {!! Form::checkbox('is_immediate_available', 1, true, array('id'=>'is_immediate_available')) !!} Is Immediate Available? </label>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <label> {!! Form::checkbox('is_active', 1, true, array('id'=>'is_active')) !!} Is Active? </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label> {!! Form::checkbox('verified', 1, true, array('id'=>'verified')) !!} Is Verified? </label>
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