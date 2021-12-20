@extends('layouts.master')

@section('content')

<div class="bg-gray-warm-pale text-white py-32 mt-28">
  <div class="flex flex-wrap justify-center items-center sign-up-card-section sign-up-card-section--login-section">
    <div class="group sign-up-card-section__explore sign-up-card-section__explore--login login-bg flex flex-col items-center justify-center relative bg-no-repeat bg-cover bg-center rounded-md rounded-r-none">
      <div class="invite-button-text-section absolute top-1/2 left-1/2 text-center ">
          <h1 class="font-book text-xl sm:text-2xl xl:text-4xl leading-7 invite-text mb-4">INVITE</h1>
          <p class="sign-up-form__information--fontSize text-gray-pale mb-4">Interdum et malesuada fames ac ante ipsum primis in faucibus</p>
          <button class="border border-gray-pale rounded-md bg-transparent text-gray-pale text-lg py-1 px-12 hover:border-lime-orange hover:text-gray hover:bg-lime-orange focus:outline-none" onClick="openModalBox('#share-socials')">Invite Now!</button>
      </div>          
    </div>

    <div class="group sign-up-card-section__explore sign-up-card-section__explore--login sign-up-card-section__explore--login-right flex flex-col items-center justify-center bg-gray-light rounded-md rounded-l-none">
      <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-6 font-heavy tracking-wide mt-4">LOGIN</h1>

      <form name="sentMessage" id="loginform" novalidate="novalidate" action="{{ route('login') }}" method="POST" autocomplete="off" style="text-align: center;">
      {!! csrf_field() !!}
        @if ($message = Session::get('error'))
          <div class="col-md-12">
            <div class="custom-alerts alert alert-danger">     
              {{$message}}
          </div>
          </div>                
          <?php Session::forget('error');?>
        @endif
        <div class="sign-up-form login-form-section mb-5">
          <div class="mb-3 sign-up-form__information">
            <input type="email" placeholder="Email" class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" name="email" autocomplete="off" data-validation-required-message="Please enter your email address." required />
          </div>
          <div class="mb-3 sign-up-form__information relative">
            <!-- <input type="text" id="loginpassword" placeholder="Password" class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide profile-password" autocomplete="off" /> -->
            <input class="form-control focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide profile-password" id="loginpassword" type="password" name="password" placeholder="Password" required="required" autocomplete="off" data-validation-required-message="Please enter your password.">
            <img src="./img/sign-up/eye-lash.svg" alt="eye lash icon" class="cursor-pointer eye-lash-icon absolute right-0"/>
          </div>
        </div>
        <ul class="sign-up-form__information--fontSize flex flex-wrap flex-row justify-center items-center mb-6 letter-spacing-custom sign-password-section" style="width: 100%;">
          <li class="text-lime-orange mr-16"><a href="#">Sign Up</a></li>
          <li class="text-gray-pale"><a href="{{ route('password.request') }}">Forgot Password</a></li>{{-- {{route('pswforgot')}} --}}

        </ul>
        <button type="submit" id="sendMessageButton" class="text-lg btn btn-login h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
            Confirm
        </button>
      </form>
    </div>
  </div>
</div>
<div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="share-socials">   
  <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
    <div class="flex flex-col justify-center items-center popup-text-box__container py-16 relative">
      <button class="absolute top-5 right-5 cursor-pointer focus:outline-none" onclick="toggleModalClose('#share-socials')">
          <img src="./img/sign-up/close.svg" alt="close modal image">
      </button>
      <p class="text-gray-pale text-base letter-spacing-custom">Share this page to your friends.</p>
      <ul class="flex flex-row flex-wrap justify-between items-center mt-5 social-icons-box">
          <li><img src="./img/social-icons/facebook.png" alt="facebook icon"/></li>
          <li><img src="./img/social-icons/twitter.png" alt="twitter icon"/></li>
          <li><img src="./img/social-icons/email.png" alt="email icon"/></li>
          <li><img src="./img/social-icons/whatapps.png" alt="whatapps icon"/></li>
          <li><img src="./img/social-icons/wechat.png" alt="wechat icon"/></li>
      </ul>
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
