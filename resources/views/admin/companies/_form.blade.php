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
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Company Name<span class="text-danger">*</span>:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Company Name','class' => 'form-control','id'=>'name')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Company Email<span class="text-danger">*</span>:</strong>
            {!! Form::email('email', null, array('placeholder' => 'Company Email','class' => 'form-control','id'=>'email')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Company CEO<span class="text-danger">*</span>:</strong>
            {!! Form::text('user_name', null, array('placeholder' => 'Company CEO','class' => 'form-control','id'=>'user_name')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Industry<span class="text-danger">*</span>:</strong>
            {!! Form::select('industry_id', $industries, null, array('placeholder' => 'Select Industry','class' => 'form-control','id'=>'industry_id')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Password<span class="text-danger">*</span>:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control','id'=>'password')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>Company Details<span class="text-danger">*</span>:</strong>
            {!! Form::textarea('description', null, array('placeholder' => 'Company CEO','class' => 'form-control ckeditor','id'=>'description','rows'=>5)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>Map :</strong>
            {!! Form::textarea('map', null, array('placeholder' => 'Map','class' => 'form-control','id'=>'map','rows'=>5)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group row m-b-15">
            <strong>Location<span class="text-danger">*</span>:</strong>
            {!! Form::text('location', null, array('placeholder' => 'Location','class' => 'form-control','id'=>'location')) !!}
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
            <strong>State<span class="text-danger">*</span>:</strong>
            {!! Form::select('state_id', $areas,null, array('placeholder' => 'Select State','class' => 'form-control','id'=>'state_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>City<span class="text-danger">*</span>:</strong>
            {!! Form::select('city_id', $districts, null, array('placeholder' => 'Select City','class' => 'form-control','id'=>'city_id')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Website<span class="text-danger">*</span>:</strong>
            {!! Form::text('website', null, array('placeholder' => 'Website','class' => 'form-control','id'=>'website')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Phone<span class="text-danger">*</span>:</strong>
            {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control','id'=>'phone')) !!}
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
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <label> {!! Form::checkbox('is_active', 1, true, array('id'=>'is_active')) !!} Is Active? </label>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label> {!! Form::checkbox('is_featured', 1, false, array('id'=>'is_featured')) !!} Is Featured? </label>
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