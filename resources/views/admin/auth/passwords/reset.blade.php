@extends('admin.layouts.login_layout')
@push('css')
<style>
    .btn-aqua{
        background: red !important;
    }
    .btn-aqua:hover{
        background: transparent;
        color: red;
    }
</style>
@endpush
@section('content')
<!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image" style="background-image: url(../../backend/img/login-bg/login-bg-11.jpg)"></div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <img src="{{ asset('images/lobahn-black.svg') }}">
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                    <form method="POST" action="{{ route('admin.password.request') }}">
                    @csrf
                    
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group m-b-20">
                        <input id="email" type="email" class="form-control form-control-lg inverse-mode @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required placeholder="Email Address" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
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
                    
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-aqua btn-block btn-lg" style="background: #ffdb5f;border: 1px solid #ffdb5f;"> {{ __('Reset Password') }} </button>
                    </div>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->
        
        
        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->
@endsection

<script src="https://www.google.com/recaptcha/api.js?render=6Le8oGodAAAAAO9w8lHzldmAlJyiFf2h-SigK4xf"></script>
@push('scripts')
    <script>

    </script>
@endpush
