<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Package Title <span class="text-danger">*</span>:</strong>
            {!! Form::text('package_title', null, array('placeholder' => 'Package Title','class' => 'form-control','id'=>'package_title','required'=>true)) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Package For <span class="text-danger">*</span>:</strong>
            <select name="package_for" id="package_for" class="form-control" required>
                <option value="">Select</option>
                @foreach (App\Models\Package::PACKAGE_FOR as $key=>$value)
                    <option value="{{$key}}" {{ (isset($package) && $package->package_for ? $package->package_for : old('package_for')) == $key ? 'selected' : '' }} >{{$value ?? ''}}</option>
                @endforeach
            </select>
        </div>
    </div>
        
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Package Price <span class="text-danger">*</span>:</strong>
            {!! Form::text('package_price', null, array('placeholder' => 'Package Price','class' => 'form-control','id'=>'package_price','required'=>true)) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Package Price Per Month<span class="text-danger">*</span>:</strong>
            {!! Form::text('price_permonth', null, array('placeholder' => 'Package Price Per Month','class' => 'form-control','id'=>'price_permonth')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Package No. Days <span class="text-danger">*</span>:</strong>
            {!! Form::text('package_num_days', null, array('placeholder' => 'Package Num Days','class' => 'form-control','id'=>'package_num_days','required'=>true)) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Package No. Listings:</strong>
            {!! Form::text('package_num_listings', null, array('placeholder' => 'Package Num Listings','class' => 'form-control','id'=>'package_num_listings','readonly'=>'true')) !!}
        </div>
    </div>    
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Promotion Percent :</strong>
            {!! Form::text('promotion_percent', null, array('placeholder' => 'Promotion Percent','class' => 'form-control','id'=>'promotion_percent')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Currency :</strong>
            {!! Form::text('currency', null, array('placeholder' => 'Currency','class' => 'form-control','id'=>'currency')) !!}
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