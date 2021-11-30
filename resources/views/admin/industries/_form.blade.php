<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <label>Industry Name <span class="text-danger">*</span></label>
            {!! Form::text('industry_name', null, array('placeholder' => 'Industry Name','class' => 'form-control','id'=>'industry_name','required'=>true)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <label> {!! Form::checkbox('is_active', 1, true, array('id'=>'is_active')) !!} Is Active? </label>
        </div>
    </div>
    {{-- <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <label> {!! Form::checkbox('is_default', 1, false, array('id'=>'is_default')) !!} Is Default? </label>
        </div>
    </div> --}}
</div>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        </div>
        <div class="pull-right">
            <a class="btn btn-warning" href="{{ route('industries.index') }}">Back to Listing</a>
            {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
</div>