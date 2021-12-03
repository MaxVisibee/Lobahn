<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Company Name<span class="text-danger">*</span>:</strong>
            {!! Form::text('company_name', null, array('placeholder' => 'Company Name','class' => 'form-control','id'=>'company_name','required'=>true)) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Company CEO<span class="text-danger">*</span>:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Company CEO','class' => 'form-control','id'=>'name','required'=>true)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Company Phone<span class="text-danger">*</span>:</strong>
            {!! Form::text('phone', null, array('placeholder' => 'Company Phone','class' => 'form-control','id'=>'phone','required'=>true)) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Company Email<span class="text-danger">*</span>:</strong>
            {!! Form::email('email', null, array('placeholder' => 'Company Email','class' => 'form-control','id'=>'email','required'=>true)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Industry<span class="text-danger">*</span>:</strong>
            {!! Form::select('industry_id', $industries, null, array('placeholder' => 'Select Industry','class' => 'form-control','id'=>'industry_id','required'=>true)) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Sub Sector<span class="text-danger">*</span>:</strong>
            {!! Form::select('sub_sector_id', $sectors, null, array('placeholder' => 'Select Sub Sector','class' => 'form-control','id'=>'sub_sector_id')) !!}
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
            <strong>Job Type<span class="text-danger">*</span>:</strong>
            {!! Form::select('working_hour_id', $job_types, null, array('placeholder' => 'Select Job Type','class' => 'form-control','id'=>'working_hour_id')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>User Name<span class="text-danger">*</span>:</strong>
            {!! Form::text('user_name', null, array('placeholder' => 'User Name','class' => 'form-control','id'=>'user_name', 'required'=>true)) !!}
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Password<span class="text-danger">*</span>:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control','id'=>'password','required'=>true)) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Confirm Password<span class="text-danger">*</span>:</strong>
            {!! Form::password('confirm_password', array('placeholder' => 'Confirm Password','class' => 'form-control','id'=>'confirm_password','required'=>true)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Country <span class="text-danger">*</span></strong>
            {!! Form::select('country_id', $countries,null, array('placeholder' => 'Select Country','class' => 'form-control select2','id'=>'country_id','required'=>true)) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Areas<span class="text-danger">*</span>:</strong>
            {!! Form::select('state_id', $areas,null, array('placeholder' => 'Select State','class' => 'form-control','id'=>'state_id')) !!}
        </div>
    </div>
</div>
<div class="row">    
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Districts<span class="text-danger">*</span>:</strong>
            {!! Form::select('city_id', $districts, null, array('placeholder' => 'Select City','class' => 'form-control','id'=>'city_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Location<span class="text-danger">*</span>:</strong>
            {!! Form::text('location', null, array('placeholder' => 'Location','class' => 'form-control','id'=>'location')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Preferred schools<span class="text-danger">*</span>:</strong>
            {!! Form::text('preferred_school', null, array('placeholder' => 'Preferred School','class' => 'form-control','id'=>'preferred_school')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Education Level:</strong>
            {!! Form::select('degree_level_id', $degree_levels, null, array('placeholder' => 'Select Education Level','class' => 'form-control','id'=>'degree_level_id')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Management Level:</strong>
            {!! Form::select('carrier_level_id', $carrier_levels, null, array('placeholder' => 'Select Management Level','class' => 'form-control','id'=>'carrier_level_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Experience Year:</strong>
            {!! Form::select('experience_id', $experiences, null, array('placeholder' => 'Select Experience','class' => 'form-control','id'=>'experience_id')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Languages:</strong>
            {!! Form::select('language_id', $languages, null, array('placeholder' => 'Select Languages','class' => 'form-control','id'=>'language_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Field Of Study:</strong>
            {!! Form::select('study_field_id', $studu_fields, null, array('placeholder' => 'Select Field Of Study','class' => 'form-control','id'=>'  study_field_id')) !!}
        </div>
    </div>    
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Adjacent Position:</strong>
            {!! Form::select('adjacent_position', $job_titles, null, array('placeholder' => 'Select Position','class' => 'form-control','id'=>'adjacent_position')) !!}
            {{--
            {!! Form::text('adjacent_position', null, array('placeholder' => 'Preferred School','class' => 'form-control','id'=>'adjacent_position')) !!}
            --}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Website<span class="text-danger">*</span>:</strong>
            {!! Form::text('website', null, array('placeholder' => 'Website','class' => 'form-control','id'=>'website')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>No. of employees<span class="text-danger">*</span>:</strong>
            {!! Form::select('no_of_employees', MiscHelper::getNumEmployees(),null, array('placeholder' => 'Select No. of employees','class' => 'form-control','id'=>'no_of_employees')) !!}
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
            <strong>Keywords:</strong>
            {!! Form::text('keyword', null, array('placeholder' => 'Keywords','class' => 'form-control','id'=>'keyword')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>References:</strong>
            {!! Form::text('reference', null, array('placeholder' => 'References','class' => 'form-control','id'=>'reference')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>From Salary:</strong>
            {!! Form::text('min_salary', null, array('placeholder' => 'From Salary','class' => 'form-control','id'=>'min_salary')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>To Salary:</strong>
            {!! Form::text('max_salary', null, array('placeholder' => 'To Salary','class' => 'form-control','id'=>'max_salary')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Listing Date :</strong>
            {!! Form::text('listing_date', null, array('placeholder' => 'Listing Date','class' => 'form-control datepicker','id'=>'listing_date')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Expired Date :</strong>
            {!! Form::text('expire_date', null, array('placeholder' => 'Expired Date','class' => 'form-control datepicker','id'=>'expire_date')) !!}
        </div>
    </div>
</div>

@if(isset($company) && $company->package_id > 0)
<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            {!! Form::label('package', 'Package : ', ['class' => 'bold']) !!}         
            <strong>{{$company->getPackage('package_title')}}</strong>
        </div>
        <div class="form-group">
            {!! Form::label('package_Duration', 'Package Duration : ', ['class' => 'bold']) !!}
            <strong>{{$company->package_start_date->format('d M, Y')}}</strong> - <strong>{{$company->package_end_date->format('d M, Y')}}</strong>
        </div>
        <div class="form-group">
            {!! Form::label('package_quota', 'Availed quota : ', ['class' => 'bold']) !!}
            <strong>{{$company->availed_jobs_quota}}</strong> / <strong>{{$company->jobs_quota}}</strong>
        </div>
        <hr/>
    </div>
</div>
@endif

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>Function :</strong>
            {!! Form::textarea('function', null, array('placeholder' => 'Function','class' => 'form-control ckeditor','id'=>'function','rows'=>5)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>Specialty<span class="text-danger">*</span>:</strong>
            {!! Form::textarea('specialty', null, array('placeholder' => 'Specialty','class' => 'form-control ckeditor','id'=>'specialty','rows'=>5)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>Company Description<span class="text-danger">*</span>:</strong>
            {!! Form::textarea('description', null, array('placeholder' => 'Company CEO','class' => 'form-control ckeditor','id'=>'description','rows'=>5)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>Geographical Experience<span class="text-danger">*</span>:</strong>
            {!! Form::textarea('geographical_experience', null, array('placeholder' => 'Geographical Experience','class' => 'form-control ckeditor','id'=>'geographical_experience','rows'=>5)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>People Management<span class="text-danger">*</span>:</strong>
            {!! Form::textarea('people_management', null, array('placeholder' => 'People Management','class' => 'form-control ckeditor','id'=>'people_management','rows'=>5)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>Software & Tech Knowledge<span class="text-danger">*</span>:</strong>
            {!! Form::textarea('tech_knowledge', null, array('placeholder' => 'Software & Tech Knowledge','class' => 'form-control ckeditor','id'=>' tech_knowledge','rows'=>5)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>Qualification<span class="text-danger">*</span>:</strong>
            {!! Form::textarea('qualification', null, array('placeholder' => 'Qualification','class' => 'form-control ckeditor','id'=>' qualification','rows'=>5)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>Key Strenght<span class="text-danger">*</span>:</strong>
            {!! Form::textarea('key_strength', null, array('placeholder' => 'Key Strength','class' => 'form-control ckeditor','id'=>' key_strength','rows'=>5)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>Contract Terms<span class="text-danger">*</span>:</strong>
            {!! Form::textarea('contract_term', null, array('placeholder' => 'Contract Terms','class' => 'form-control ckeditor','id'=>' contract_term','rows'=>5)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>Map:</strong>
            {!! Form::textarea('map', null, array('placeholder' => 'Map','class' => 'form-control','id'=>'map','rows'=>5)) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="form-group row m-b-15">
            <label> {!! Form::checkbox('is_active', 1, true, array('id'=>'is_active')) !!} Is Active? </label>
        </div>
    </div>
    <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="form-group m-b-15">
            <label> {!! Form::checkbox('is_featured', 1, false, array('id'=>'is_featured')) !!} Is Featured? </label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Company Logo<span class="text-danger">*</span>:</strong>
            {{-- {!! Form::file('logo', null, array('id'=>'logo')) !!} --}}
            @if(isset($model))
            <input type="file" name="logo" class="dropify" id="logo" data-default-file="{{ $model->logo ? url('uploads/company_logo/'.$model->logo):'' }}" accept="image/*;capture=camera,.png,.jpg,.jpeg" data-allowed-file-extensions="jpg jpeg png svg"/>
            @else
                <input type="file" name="logo" class="dropify" id="logo" accept="image/*;capture=camera,.png,.jpg,.jpeg" data-allowed-file-extensions="jpg jpeg png svg"/>
            @endif
            
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        </div>
        <div class="pull-right">
            <a class="btn btn-warning" href="{{ route('companies.index') }}">Back to Listing</a>
            {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
</div>