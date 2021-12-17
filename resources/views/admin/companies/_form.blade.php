<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Company Logo<span class="text-danger">*</span>:</strong>
            {{-- {!! Form::file('company_logo', null, array('id'=>'company_logo')) !!} --}}
            @if(isset($model))
            <input type="file" name="company_logo" class="dropify" id="company_logo" data-default-file="{{ $model->company_logo ? url('uploads/company_logo/'.$model->company_logo):'' }}" accept="image/*;capture=camera,.png,.jpg,.jpeg" data-allowed-file-extensions="jpg jpeg png svg"/>
            @else
                <input type="file" name="company_logo" class="dropify" id="company_logo" accept="image/*;capture=camera,.png,.jpg,.jpeg" data-allowed-file-extensions="jpg jpeg png svg" required />
            @endif
            
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>CEO Name<span class="text-danger">*</span>:</strong>
            {!! Form::text('name', null, array('placeholder' => 'CEO Name','class' => 'form-control','id'=>'name','required'=>true)) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Company Name<span class="text-danger">*</span>:</strong>
            {!! Form::text('company_name', null, array('placeholder' => 'Company Name','class' => 'form-control','id'=>'company_name','required'=>true)) !!}
        </div>
    </div>    
</div>
<div class="row">
    <!--  -->
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Company Email<span class="text-danger">*</span>:</strong>
            {!! Form::email('email', null, array('placeholder' => 'Company Email','class' => 'form-control','id'=>'email','required'=>true)) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>User Name<span class="text-danger">*</span>:</strong>
            {!! Form::text('user_name', null, array('placeholder' => 'User Name','class' => 'form-control','id'=>'user_name','required'=>true)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Position Title :</strong>
            {!! Form::text('position_title', null, array('placeholder' => 'Position Title','class' => 'form-control','id'=>'position_title')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Company Phone<span class="text-danger">*</span>:</strong>
            {!! Form::text('phone', null, array('placeholder' => 'Company Phone','class' => 'form-control','id'=>'phone','required'=>true)) !!}
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
            {!! Form::select('area_id', $areas,null, array('placeholder' => 'Select State','class' => 'form-control','id'=>'area_id')) !!}
        </div>
    </div>
</div>
<div class="row">    
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Districts<span class="text-danger">*</span>:</strong>
            {!! Form::select('district_id', $districts, null, array('placeholder' => 'Select City','class' => 'form-control','id'=>'district_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Address:</strong>
            {!! Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control','id'=>'address')) !!}
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
            <strong>Sub Sector :</strong>
            {!! Form::select('sub_sector_id', $sectors, null, array('placeholder' => 'Select Sub Sector','class' => 'form-control','id'=>'sub_sector_id')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>No. Of Offices:</strong>
            {!! Form::text('no_of_offices', null, array('placeholder' => 'No. Of Offices','class' => 'form-control','id'=>'no_of_offices')) !!}
        </div>
    </div>  
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>No. of employees:</strong>
            {!! Form::select('no_of_employees', MiscHelper::getNumEmployees(),null, array('placeholder' => 'Select No. of employees','class' => 'form-control','id'=>'no_of_employees')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Website Address:</strong>
            {!! Form::text('website_address', null, array('placeholder' => 'Website Address','class' => 'form-control','id'=>'website_address')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Establised In:</strong>
            {!! Form::text('established_in', null, array('placeholder' => 'Establised In','class' => 'form-control','id'=>'established_in')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Payments:</strong>
            {!! Form::select('payment_id', $payments, null, array('placeholder' => 'Select Payments','class' => 'form-control','id'=>'payment_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Package :</strong>
            {!! Form::select('package_id', $packages,null, array('placeholder' => 'Select Package','class' => 'form-control','id'=>'package_id')) !!}
        </div>
    </div>   
</div>

{{--
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Package Start Date :</strong>
            {!! Form::date('package_start_date', null, array('placeholder' => 'Package Start Date','class' => 'form-control','id'=>'package_start_date')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Package End Date :</strong>
            {!! Form::date('package_end_date', null, array('placeholder' => 'Package End Date','class' => 'form-control','id'=>'package_end_date')) !!}
        </div>
    </div>
</div>
--}}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>Map:</strong>
            {!! Form::textarea('map', null, array('placeholder' => 'Map','class' => 'form-control','id'=>'map','rows'=>5)) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Facebook Link:</strong>
            {!! Form::text('facebook', null, array('placeholder' => 'Facebook Link','class' => 'form-control','id'=>'facebook')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Twitter Link:</strong>
            {!! Form::text('twitter', null, array('placeholder' => 'Twitter Link','class' => 'form-control','id'=>'twitter')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Linkedin:</strong>
            {!! Form::text('linkedin', null, array('placeholder' => 'Linkedin Address','class' => 'form-control','id'=>'linkedin')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Instragram:</strong>
            {!! Form::text('instagram', null, array('placeholder' => 'Instragram','class' => 'form-control','id'=>'instagram')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>KeyWords:</strong>
            {!! Form::select('keyword_id', $keywords, null, array('placeholder' => 'Select KeyWords','class' => 'form-control','id'=>'keyword_id')) !!}
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
            <strong>Preferred Schools:</strong>
            {!! Form::select('preferred_school_id',$institutions ,null, array('placeholder' => 'Select Preferred School','class' => 'form-control','id'=>'preferred_school_id')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Target Employer:</strong>
            {!! Form::select('target_employer_id',$seekers ,null, array('placeholder' => 'Select Target Employer','class' => 'form-control','id'=>'target_employer_id')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Total Impressions</strong>
            {!! Form::number('total_impressions', null, array('placeholder' => 'Total Impressions','class' => 'form-control','id'=>'total_impressions')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Total Clicks:</strong>
            {!! Form::number('total_clicks', null, array('placeholder' => 'Total Clicks','class' => 'form-control','id'=>'total_clicks')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Total Position Listings:</strong>
            {!! Form::number('total_position_listings', null, array('placeholder' => 'Total Position Listings','class' => 'form-control','id'=>'total_position_listings')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Total Received Profiles:</strong>
            {!! Form::number('total_received_profiles', null, array('placeholder' => 'Total Received Profiles','class' => 'form-control','id'=>'total_received_profiles')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Total Shortlists:</strong>
            {!! Form::number('total_shortlists', null, array('placeholder' => 'Total Shortlists','class' => 'form-control','id'=>'total_shortlists')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Total Connections:</strong>
            {!! Form::number('total_connections', null, array('placeholder' => 'Total Connections','class' => 'form-control','id'=>'total_connections')) !!}
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
        </div>
        <hr/>
    </div>
</div>
@endif
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>Company Description :</strong>
            {!! Form::textarea('description', null, array('placeholder' => 'Company Description','class' => 'form-control ckeditor','id'=>'description','rows'=>5)) !!}
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
            <label> {!! Form::checkbox('is_subscribed', 1, true, array('id'=>'is_subscribed')) !!} Is Subscribe? </label>
        </div>
    </div>
    <div class="col-xs-12 col-sm-3 col-md-3">
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