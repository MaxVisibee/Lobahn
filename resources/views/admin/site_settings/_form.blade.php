<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Admin Site Logo<span class="text-danger">*</span>:</strong>
            @if(!empty($model->site_logo))
            <input type="file" name="site_logo" class="dropify" id="site_logo" data-default-file="{{ $model->site_logo ? url('uploads/site_setting/'.$model->site_logo):'' }}" accept="image/*;capture=camera,.png,.jpg,.jpeg,.svg" data-allowed-file-extensions="jpg jpeg png svg"/>
            @else
                <input type="file" name="site_logo" class="dropify" id="site_logo" accept="image/*;capture=camera,.png,.jpg,.jpeg,.svg" data-allowed-file-extensions="jpg jpeg png svg"/>
            @endif
            
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Front Site Logo<span class="text-danger">*</span>:</strong>
            @if(!empty($model->front_site_logo))
                <input type="file" name="front_site_logo" class="dropify" id="front_site_logo" data-default-file="{{ $model->front_site_logo ? url('uploads/site_setting/'.$model->front_site_logo):'' }}" accept="image/*;capture=camera,.png,.jpg,.jpeg,.svg" data-allowed-file-extensions="jpg jpeg png svg"/>
            @else
                <input type="file" name="front_site_logo" class="dropify" id="front_site_logo" accept="image/*;capture=camera,.png,.jpg,.jpeg,.svg" data-allowed-file-extensions="jpg jpeg png svg"/>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Site Name<span class="text-danger">*</span>:</strong>
            {!! Form::text('site_name', null, array('placeholder' => 'Site Name','class' => 'form-control','id'=>'site_name', 'required')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Site Slogan</strong>
            {!! Form::text('site_slogan', null, array('placeholder' => 'Site Slogan','class' => 'form-control','id'=>'site_slogan')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Site Phone Primary<span class="text-danger">*</span>:</strong>
            {!! Form::text('site_phone_primary', null, array('placeholder' => 'Site Phone Primary','class' => 'form-control','id'=>'site_phone_primary')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Site Phone Secondary</strong>
            {!! Form::text('site_phone_secondary', null, array('placeholder' => 'Site Phone Secondary','class' => 'form-control','id'=>'site_phone_secondary')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>Address</strong>
            {!! Form::textarea('site_address', null, array('placeholder' => 'Address','class' => 'form-control ckeditor','id'=>'site_address','rows'=>3)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group m-b-15">
            <strong>Map</strong>
            {!! Form::textarea('site_google_map', null, array('placeholder' => 'Map','class' => 'form-control','id'=>'site_google_map','rows'=>3)) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Mail From Address<span class="text-danger">*</span></strong>
            {!! Form::text('mail_from_address', null, array('placeholder' => 'Mail From Address','class' => 'form-control','id'=>'mail_from_address')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Mail From Name<span class="text-danger">*</span></strong>
            {!! Form::text('mail_from_name', null, array('placeholder' => 'Mail From Name','class' => 'form-control','id'=>'mail_from_name')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Mail To Address<span class="text-danger">*</span></strong>
            {!! Form::text('mail_to_address', null, array('placeholder' => 'Mail To Address','class' => 'form-control','id'=>'mail_to_address')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Mail To Name<span class="text-danger">*</span></strong>
            {!! Form::text('mail_to_name', null, array('placeholder' => 'Mail To Name','class' => 'form-control','id'=>'mail_to_name')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Facebook Address</strong>
            {!! Form::text('facebook_address', null, array('placeholder' => 'Facebook Address','class' => 'form-control','id'=>'facebook_address')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Instagram Address</strong>
            {!! Form::text('instagram_address', null, array('placeholder' => 'Instagram Address','class' => 'form-control','id'=>'instagram_address')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Linkedin Address</strong>
            {!! Form::text('linkedin_address', null, array('placeholder' => 'Linkedin Address','class' => 'form-control','id'=>'linkedin_address')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Twitter Address</strong>
            {!! Form::text('twitter_address', null, array('placeholder' => 'Twitter Address','class' => 'form-control','id'=>'twitter_address')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Captcha Sitekey</strong>
            {!! Form::text('nocaptcha_sitekey', null, array('placeholder' => 'Linkedin Address','class' => 'form-control','id'=>'nocaptcha_sitekey')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group row m-b-15">
            <strong>Captcha Secret</strong>
            {!! Form::text('nocaptcha_secret', null, array('placeholder' => 'Twitter Address','class' => 'form-control','id'=>'nocaptcha_secret')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group row m-b-15">
            <strong>Paypal Account</strong>
            {!! Form::text('paypal_account', null, array('placeholder' => 'Linkedin Address','class' => 'form-control','id'=>'paypal_account')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group row m-b-15">
            <strong>Paypal Client Id</strong>
            {!! Form::text('paypal_client_id', null, array('placeholder' => 'Twitter Address','class' => 'form-control','id'=>'paypal_client_id')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group row m-b-15">
            <strong>Paypal Secret</strong>
            {!! Form::text('paypal_secret', null, array('placeholder' => 'Twitter Address','class' => 'form-control','id'=>'paypal_secret')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group row m-b-15">
            <label>Is Paypal Sandbox?</label>
            <div class="d-block w-100">
                <label for="paypal_sandbox" class="mr-4"> {!! Form::radio('paypal_live_sandbox', 'sandbox', true, array('id'=>'paypal_sandbox')) !!} Sandbox </label>
                <label for="paypal_live"> {!! Form::radio('paypal_live_sandbox', 'live', false, array('id'=>'paypal_live')) !!} Live </label>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group row m-b-15">
            <strong>Stripte Key</strong>
            {!! Form::text('stripe_key', null, array('placeholder' => 'Stripe Key','class' => 'form-control','id'=>'stripe_key')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group row m-b-15">
            <strong>Stripte Secret</strong>
            {!! Form::text('stripe_secret', null, array('placeholder' => 'Stripe Secret','class' => 'form-control','id'=>'stripe_secret')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <a class="btn btn-warning" href="{{ route('companies.index') }}">Back to Listing</a>
        {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
    </div>
</div>