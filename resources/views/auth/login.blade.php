@extends('layouts.master')

@section('content')
<div class='container'>
    <h1>LOGIN</h1>

    <div class="row subject-box">
        <div class="col-xl-6 col-md-6 loginform">
              <form name="sentMessage" id="loginform" novalidate="novalidate" action="{{ route('company.login') }}" method="POST" >
                {!! csrf_field() !!}
                @if ($message = Session::get('error'))
                  <div class="col-md-12">
                    <div class="custom-alerts alert alert-danger">     
                      {{$message}}
                  </div>
                  </div>                
                  <?php Session::forget('error');?>
                @endif
                <div class="control-group email-input">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2 loginemail resetemailnt">                              
                      <input class="form-control" id="loginemail" type="email" name="email" placeholder="Email Address 電郵地址" required="required" data-validation-required-message="Please enter your email address.">
                  </div>
                </div>
            <div class="control-group password-input">
              <div class="form-group floating-label-form-group controls mb-0 pb-2 loginpassword">
                <input class="form-control" id="loginpassword" type="password" name="password" placeholder="Password 密碼" required="required" data-validation-required-message="Please enter your password.">                              
              </div>
            </div>  
                <div class="login-bottom-section">
                  <div class="control-group forget-side">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2 loginforgot">
                      <a href="#">Forgot Password? <span class="cnynament">忘記密碼?</span></a>
                    </div>
                  </div>
                  <input type="hidden" name="g_recaptcha_response" id="g_recaptcha_response">
                  <div class="form-group login-side">
                    <button type="submit" class="btn btn-login btn-xl btn-account-login" id="sendMessageButton">Login <span class="cnynament">登入</span><i class="fas fa-long-arrow-alt-right ms-3"></i></button>
                  </div>
                </div>
          </form>
        </div>
    </div>
</div>
@endsection

<script src="https://www.google.com/recaptcha/api.js?render=6Le8oGodAAAAAO9w8lHzldmAlJyiFf2h-SigK4xf"></script>
@push('scripts')
  <script>
    grecaptcha.ready(function () {
      console.log("Recaptcha");
      grecaptcha.execute('6Le8oGodAAAAAO9w8lHzldmAlJyiFf2h-SigK4xf', { action: 'home' }).then(function (token) {
              var recaptchaResponse = document.getElementById('g_recaptcha_response');
              recaptchaResponse.value = token;
      });
    });
  </script> 
@endpush
