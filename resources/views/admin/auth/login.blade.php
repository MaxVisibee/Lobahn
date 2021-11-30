@extends('admin.layouts.login_layout')
@push('css')
<style>
    #login-admin .login-v2{
        background: rgba(0,0,0,.4);
        color: #ccc;
        width: 450px;
        margin: 168px 0 0 -225px;
        position: absolute;
        top: 0;
        left: 50%;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }
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
                <div class="news-image" style="background-image: url(../backend/img/login-bg/login-bg-11.jpg)"></div>
                <!-- <div class="news-caption">
                    <h4 class="caption-title"><b>Color</b> Admin App</h4>
                    <p>
                        Download the Color Admin app for iPhone®, iPad®, and Android™. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </p>
                </div> -->
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <img src="{{ asset('images/logo.svg') }}">
                        <!-- <span class="logo"></span> Lobahn Admin
                        <small>responsive bootstrap 4 admin template</small> -->
                    </div>
                    <!-- <div class="icon">
                        <i class="fa fa-sign-in-alt"></i>
                    </div> -->
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                    <form method="POST" action="{{ route('login') }}">
            @csrf            
                <div class="form-group m-b-20">
                    <input id="email" type="email" class="form-control form-control-lg inverse-mode @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email Address" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    {{-- <input type="text" class="form-control form-control-lg inverse-mode" placeholder="Email Address" required /> --}}
                </div>
                <div class="form-group m-b-20">
                    <input id="password" type="password" class="form-control form-control-lg inverse-mode @error('password') is-invalid @enderror" placeholder="Password" name="password" required>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    {{-- <input type="password" class="form-control form-control-lg inverse-mode" placeholder="Password" required /> --}}
                </div>
                <div class="checkbox checkbox-css m-b-20">
                    <input type="checkbox" name="remember" id="remember_checkbox" {{ old('remember') ? 'checked' : '' }}/> 
                    <label for="remember_checkbox">Remember Me</label>
                    @if (Route::has('password.request'))
                        <a class="mt-2 password-forgot" href="{{ route('admin.password.request') }}" style="float: right;margin-top: 0px !important;">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
                <div class="login-buttons">
                    <button type="submit" class="btn btn-aqua btn-block btn-lg" style="background: #ffdb5f;border: 1px solid #ffdb5f;">Login</button>
                    <!-- <button type="submit" class="btn btn-aqua btn-block btn-lg" style="background: #ffdb5f;border: 1px solid #ffdb5f;" onmouseover="this.style.color='#ffdb5f',this.style.background='transparent'">Login</button> -->
                    <!-- @if (Route::has('password.request'))
                        <a class="btn btn-link mt-2" href="{{ route('admin.password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif -->
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

