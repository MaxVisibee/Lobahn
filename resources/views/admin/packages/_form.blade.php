<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Package Title <span class="text-danger">*</span></label>
            {!! Form::text('package_title', null, array('placeholder' => 'Package Title','class' => 'form-control','id'=>'package_title','required'=>true)) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Package Price <span class="text-danger">*</span></label>
            {!! Form::text('package_price', null, array('placeholder' => 'Package Price','class' => 'form-control','id'=>'package_price','required'=>true)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Package No. Days <span class="text-danger">*</span></label>
            {!! Form::text('package_num_days', null, array('placeholder' => 'Package Num Days','class' => 'form-control','id'=>'package_num_days','required'=>true)) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label>Package No. Listings <span class="text-danger">*</span></label>
            {!! Form::text('package_num_listings', null, array('placeholder' => 'Package Num Listings','class' => 'form-control','id'=>'package_num_listings','required'=>true)) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        </div>
        <div class="pull-right">
            <a class="btn btn-warning" href="{{ route('packages.index') }}">Back to Listing</a>
            {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
</div>