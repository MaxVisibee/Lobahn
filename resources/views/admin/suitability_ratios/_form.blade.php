<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group row m-b-15">
            <strong>Point Name<span class="text-danger">*</span>:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Point Name','class' => 'form-control','id'=>'name', 'required')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Talent Point<span class="text-danger">*</span>:</strong>
            {!! Form::text('talent_num', null, array('placeholder' => 'Talent Point','class' => 'form-control','id'=>'talent_num', 'required')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Talent Percent %<span class="text-danger">*</span>:</strong>
            {!! Form::text('talent_percent', null, array('placeholder' => 'Talent Percent','class' => 'form-control','id'=>'talent_percent', 'required')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Position Point<span class="text-danger">*</span>:</strong>
            {!! Form::text('position_num', null, array('placeholder' => 'Position Point','class' => 'form-control','id'=>'position_num', 'required')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Position Percent %<span class="text-danger">*</span>:</strong>
            {!! Form::text('position_percent', null, array('placeholder' => 'Position Percent','class' => 'form-control','id'=>'position_percent', 'required')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        </div>
        <div class="pull-right">
            <a class="btn btn-warning" href="{{ route('suitability-ratios.index') }}">Back to Listing</a>
            {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
</div>