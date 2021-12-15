@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row subject-box">
        <div class="col-xl-6 col-md-6 loginform">
              <form id="loginform" method="POST" action="{{ route('password.update') }}">
                {!! csrf_field() !!}

                <input type="hidden" name="token" value="{{ $token }}">
                
                <div class="control-group email-input">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2 loginemail resetemailnt">                              
                        <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ $email ?? old('email') }}" placeholder="Email Address 電郵地址" required data-validation-required-message="Please enter your email address.">
                        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                </div>

                <div class="form-group m-b-20">
                    <input id="password" type="password" class="form-control form-control-lg inverse-mode @error('password') is-invalid @enderror" placeholder="Password" name="password" required>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>

                <div class="form-group m-b-20">
                    <input id="password-confirm" type="password" class="form-control form-control-lg inverse-mode" placeholder="Confirm Password" name="password_confirmation" required>
                </div>

                <div class="login-bottom-section">
                  <div class="form-group login-side">
                    <button type="submit" class="btn btn-login btn-xl btn-account-login" id="sendMessageButton"> {{ __('Reset Password') }} </button>
                  </div>
                </div>
              </form>
        </div>
    </div>

</div>
@endsection
