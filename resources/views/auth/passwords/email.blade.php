@extends('layouts.master')

@section('content')
<div class="container">

    <div class="row subject-box">
        <div class="col-xl-6 col-md-6 loginform" style="margin:10em 0;text-align: center;">
          @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
          @endif
              <form id="loginform" method="POST" action="{{ route('search.email') }}">
              {{-- <form id="loginform" method="POST" action="{{ route('password.email') }}"> --}}
                {!! csrf_field() !!}
                
                <div class="control-group email-input">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2 loginemail resetemailnt">                              
                      <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email Address 電郵地址" required="required" data-validation-required-message="Please enter your email address.">
                  </div>
                </div>

                <div class="login-bottom-section">
                  <div class="form-group login-side">
                    <button type="submit" class="btn btn-login btn-xl btn-account-login" id="sendMessageButton">{{ __('Send Password Reset Link') }}</button>
                  </div>
                </div>
          </form>
        </div>
    </div>

</div>
@endsection
