@extends('layouts.master')

@section('content')
    <div class="bg-gray-warm-pale text-white py-32 mt-28">
        <div class="flex flex-wrap justify-center items-center sign-up-card-section sign-up-card-section--login-section">
            <div
                class="group sign-up-card-section__explore sign-up-card-section__explore--login login-bg flex flex-col items-center justify-center relative bg-no-repeat bg-cover bg-center rounded-md rounded-r-none">
                <div class="invite-button-text-section absolute top-1/2 left-1/2 text-center ">
                    <h1 class="font-book text-xl sm:text-2xl xl:text-4xl leading-7 invite-text mb-4">INVITE</h1>
                    <p class="sign-up-form__information--fontSize text-gray-pale mb-4">Interdum et malesuada fames ac ante
                        ipsum primis in faucibus</p>
                    <button class="border border-gray-pale rounded-md bg-transparent text-gray-pale text-lg py-2 px-12 hover:border-lime-orange hover:text-gray hover:bg-lime-orange focus:outline-none">Invite Now!</button>
                </div>
            </div>
            <div
                class="group sign-up-card-section__explore sign-up-card-section__explore--login sign-up-card-section__explore--login-right flex flex-col items-center justify-center bg-gray-light rounded-md rounded-l-none">
                <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-6 font-heavy tracking-wide mt-4">RESET PASSWORD
                </h1>
                <div class="sign-up-form login-form-section mb-5">
                    <div class="mb-3 sign-up-form__information relative">
                        <input type="hidden" placeholder="Email" id="email"
                            class="form-control @error('email') is-invalid @enderror focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide"
                            name="email" autocomplete="off"
                            data-validation-required-message="Please enter your email address."
                            value="{{ $email ?? old('email') }}" readonly />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 sign-up-form__information relative loginemail resetemailnt">
                        <input
                            class="form-control focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide profile-password"
                            id="password" type="password" name="password" placeholder="New Password" required="required"
                            autocomplete="off" data-validation-required-message="Please enter your password.">
                        <img src="{{ asset('img/sign-up/eye-lash.svg') }}" alt="eye lash icon"
                            class="cursor-pointer eye-lash-icon absolute right-0" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 sign-up-form__information relative">
                        <input
                            class="form-control focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide profile-password"
                            id="password-confirm" type="password" name="password_confirmation"
                            placeholder="Confirm Password" required="required" autocomplete="off"
                            data-validation-required-message="Please enter your password.">
                        <img src="{{ asset('img/sign-up/eye-lash.svg') }}" alt="eye lash icon"
                            class="cursor-pointer eye-lash-icon absolute right-0" />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" id="sendMessageButton"
                    class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange"
                    onClick="">
                    Reset Password
                </button>
            </div>
        </div>
    </div>
    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity reset-password-container"
        id="reset-password-success-popup">
        <div class="text-center text-gray-pale absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div class="flex flex-col justify-center items-center popup-text-box__container pt-16 pb-12 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none close-success"
                    onclick="toggleModalClose('#reset-password-success-popup')">
                    <img src="{{ asset('img/sign-up/close.svg') }}" alt="close modal image">
                </button>
                <p class="text-base lg:text-lg tracking-wide popup-text-box__title mb-4 letter-spacing-custom">RESET
                    PASSWORD SUCCESS</p>
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
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $("#sendMessageButton").click(function() {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('company.password.reset') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'email': $("#email").val(),
                        'password': $("#password").val(),
                    },
                    success: function(data) {
                        @if (session('success'))
                            openModalBox('#reset-password-success-popup');
                            @php Session::forget('verified');@endphp
                        @endif

                    }
                });
            });

            $(".close-success").click(function() {
                window.location = "{{ route('login') }}";
            });
            $("#reset-password-success-popup").click(function() {
                window.location = "{{ route('login') }}";
            });

            $(".eye-lash-icon").click((function() {
                var e = $(this).siblings(".profile-password");
                "password" === e.attr("type") ? (e.attr("type", "text"), $(this).attr("src", (
                    function() {
                        return "/./img/sign-up/eye-lash.svg"
                    }))) : (e.attr("type", "password"), $(this).attr("src", (function() {
                    return "/./img/sign-up/eye-lash-off.svg"
                })))

    }));
        });
    </script>
@endpush
