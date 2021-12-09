<div class="container">
  <div class="row">
    @if ($message = Session::get('success'))
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="custom-alerts alert alert-success">{!! $message !!}</div>
        </div>
      </div>
    @endif
    @if ($message = Session::get('error'))
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="custom-alerts alert alert-danger">{!! $message !!}</div>
        </div>
      </div>
    @endif
  </div>

  <div class="row">
    <div class="col-md-6 col-lg-6">
      <h5>Forgot Your Password? </h5>
      <p>If you have forgotten your password, you can click here to reset. When you fill out your registered email address (and answer your security question about your account settings), you will receive instructions on how to reset your password.</p>
    </div>
    <div class="col-md-6 col-lg-6 resetpassform">
      <h5>FORGOT YOUR PASSWORD ?</h5>
      {{--<form name="" id="resetpwdform" action="{{route('frontend.doForgotPassword')}}" method="post" data-parsley-validate="true">  --}}
      <form name="" id="resetpwdform" action="{{route('doForgotPassword')}}" method="post" data-parsley-validate="true">   
      {!! csrf_field() !!}
        <div class="control-group">
          <div class="form-group floating-label-form-group controls mb-0 pb-2 loginemail">
            <input class="form-control" id="email" type="email" name="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address." data-parsley-type="email">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="form-group pswrest-btn">
          <button type="submit" class="btn btn-reset-password btn-xl" id="sendMessageButton">Send <span class="arrow"><i class="fas fa-long-arrow-alt-right ms-3"></i></span></button>
        </div>
      </form>
    </div>
  </div>
</div>