@extends('layouts.master')

@section('content')
    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="share-socials">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div class="flex flex-col justify-center items-center popup-text-box__container py-16 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#share-socials')">
                    <img src="{{ asset('img/sign-up/close.svg') }}" alt="close modal image">
                </button>
                <p class="text-gray-pale text-base letter-spacing-custom">Share this page to your friends.</p>
                <ul class="flex flex-row flex-wrap justify-between items-center mt-5 social-icons-box">
                    <li>
                        <a target="_blank"
                            href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.lobahn.com%2F&amp;src=sdkpreparse">
                            <img src="{{ asset('img/social-icons/facebook.png') }}" alt="facebook icon" />
                        </a>
                    </li>
                    <li>
                        <a target="_blank" class="twitter-share-button"
                            href="https://twitter.com/intent/tweet?url=https://www.lobahn.com/">
                            <img src="{{ asset('img/social-icons/twitter.png') }}" alt="twitter icon" />
                        </a>
                    </li>
                    <li>
                        <a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site https://www.lobahn.com/."
                            title="Share by Email">
                            <img src="{{ asset('img/social-icons/email.png') }}" alt="email icon" />
                        </a>

                    </li>
                    <li>
                        <a href="https://api.whatsapp.com/send?text=https://www.lobahn.com/" target="_blank"><img
                                src="{{ asset('img/social-icons/whatapps.png') }}" alt="whatapps icon" />
                        </a>
                    </li>
                    <li>
                        <a href="weixin://dl/moments" target="_blank">
                            <img src="{{ asset('img/social-icons/wechat.png') }}" alt="wechat icon" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="bg-gray-warm-pale text-white py-32 mt-28">
        <div
            class="flex flex-wrap justify-center py-32 items-center sign-up-card-section sign-up-card-section--login-section">
            <div
                class="group sign-up-card-section__explore sign-up-card-section__explore--login login-bg flex flex-col items-center justify-center relative bg-no-repeat bg-cover bg-center rounded-md rounded-r-none">
                <div class="invite-button-text-section absolute top-1/2 left-1/2 text-center ">
                    <h1 class="font-book text-xl sm:text-2xl xl:text-4xl leading-7 invite-text mb-4">INVITE</h1>
                    <p class="hidden sign-up-form__information--fontSize text-gray-pale mb-4"></p>
                    <button
                        class="border border-gray-pale rounded-md bg-transparent text-gray-pale text-lg py-2 px-12 hover:border-lime-orange hover:text-gray hover:bg-lime-orange focus:outline-none"
                        onClick="openModalBox('#share-socials')">Invite Now!</button>
                </div>
            </div>
            <div
                class="group sign-up-card-section__explore sign-up-card-section__explore--login sign-up-card-section__explore--login-right flex flex-col items-center justify-center bg-gray-light rounded-md rounded-l-none">
                <h1 class="text-xl sm:text-2xl xl:text-4xl text-center font-heavy tracking-wide mt-4">FORGOT PASSWORD</h1>

                <p class="mt-4 mb-7 text-center text-base xl:text-lg text-gray-pale forget-password-note">
                    We will send a verification email to your inbox. Please click on the URL to reset your password.
                </p>

                <form name="sentMessage" id="loginform" novalidate="novalidate" action="{{ route('search.email') }}"
                    method="POST" autocomplete="off" style="text-align: center;">
                    {!! csrf_field() !!}
                    @if (session('status'))
                        <div class="alert alert-success text-lime-orange md:text-lg text-base mb-2 text-center">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="sign-up-form login-form-section mb-5">
                        <div class="mb-3 sign-up-form__information">

                            <input type="text" placeholder="Email"
                                class="@error('email') is-invalid @enderror focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide"
                                name="email" autocomplete="off"
                                data-validation-required-message="Please enter your email address." required />
                            <p
                                class="@error('email') @else hidden @enderror forget-password-email-required-message text-lg text-red-500 mb-1">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </p>
                            <p
                                class="@if ($errors->any()) @else hidden @endif forget-password-email-required-message text-lg text-red-500 mb-1">
                                @error('email')
                                @else
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                    @endif
                                </p>
                            </div>
                            <button type="submit" id="sendMessageButton" onclick="openForgetPasswordPopup()"
                                class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                                Send
                            </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="share-socials">
            <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
                <div class="flex flex-col justify-center items-center popup-text-box__container py-16 relative">
                    <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                        onclick="toggleModalClose('#share-socials')">
                        <img src="{{ asset('img/sign-up/close.svg') }}" alt="close modal image">
                    </button>
                    <p class="text-gray-pale text-base letter-spacing-custom">Share this page to your friends.</p>
                    <ul class="flex flex-row flex-wrap justify-between items-center mt-5 social-icons-box">
                        <li><img src="{{ asset('img/social-icons/facebook.png') }}" alt="facebook icon" /></li>
                        <li><img src="{{ asset('img/social-icons/twitter.png') }}" alt="twitter icon" /></li>
                        <li><img src="{{ asset('img/social-icons/email.png') }}" alt="email icon" /></li>
                        <li><img src="{{ asset('img/social-icons/whatapps.png') }}" alt="whatapps icon" /></li>
                        <li><img src="{{ asset('img/social-icons/wechat.png') }}" alt="wechat icon" /></li>
                    </ul>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script></script>
    @endpush
