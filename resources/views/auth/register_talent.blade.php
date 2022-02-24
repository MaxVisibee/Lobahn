@extends('layouts.master')


@section('content')
    <div class="bg-gray-warm-pale text-white mt-28 py-16 md:pt-28 md:pb-28">
        <form action="{{ route('company.register') }}" method="POST" files="true" id="msform" name="msform"
            enctype="multipart/form-data" data-stripe-publishable-key="{{ $stripe_key }}" autocomplete="off">
            @csrf
            <input type="hidden" name="company_id" id="client_id" value="{{ $company->id }}">
            <input type="hidden" name="client_type" id="client_type" value="company">

            {{-- Account Data --}}
            <fieldset>
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div
                        class="group sign-up-card-section__explore join-individual flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">YOUR
                            PASSWORD</h1>
                        <div class="sign-up-form mb-5">
                            <div class="mb-3 sign-up-form__information">
                                <input type="text" name="user_name" id="user_name" placeholder="Username*"
                                    class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide"
                                    required />
                            </div>
                            <div class="mb-3 sign-up-form__information relative">
                                <input type="password" name="password" id="password" placeholder="Password*"
                                    class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide profile-password"
                                    required />
                                <img src="{{ asset('img/sign-up/eye-lash.svg') }}" alt="eye lash icon"
                                    class="cursor-pointer eye-lash-icon absolute right-0" />
                            </div>
                            <div class="mb-3 sign-up-form__information relative">
                                <input type="password" name="confirm_password" id="confirm_password"
                                    placeholder="Comfirm Password.*"
                                    class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide profile-password"
                                    required />
                                <img src="{{ asset('img/sign-up/eye-lash.svg') }}" alt="eye lash icon"
                                    class="cursor-pointer eye-lash-icon absolute right-0" />
                            </div>
                        </div>
                        <button type="button" name="next"
                            class="next action-button text-gray text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                            Next</button>
                    </div>
                </div>
            </fieldset>

            {{-- Logo --}}
            <fieldset>
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div
                        class="group sign-up-card-section__explore join-individual sign-up-card-section__explore--upload-height py-16 sm:py-20 lg:py-24 flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center font-heavy tracking-wide mt-4 mb-3">PLEASE
                            UPLOAD YOUR COMPANY LOGO</h1>
                        <h6
                            class="text-base xl:text-lg letter-spacing-custom mb-7 text-gray-pale text-center upload-accepted-file-note upload-accepted-file-note--width">
                            Recommended format:<span class="block">300x300px, .jpg, not larger than 200kb</span>
                        </h6>
                        <div class="image-upload upload-photo-box  mb-8 relative">
                            <label for="file-input" class="relative cursor-pointer block">
                                <img src="{{ asset('img/member-opportunity/shopify.png') }}" alt="sample photo image"
                                    class="upload-photo-box__photo" id="sample-photo" />
                                <span class="absolute top-0 left-0 z-0 block w-full h-full rounded-full"
                                    style="background:rgba(113, 113, 113, 0.89);"></span>
                                <img src="{{ asset('img/sign-up/upload-file.svg') }}" alt="upload icon"
                                    class="upload-photo-box__icon absolute top-1/2 left-1/2" />
                            </label>
                            <input id="file-input" name="logo" type="file" accept="image/*;capture=camera,.jpg,.png,.jpeg"
                                class="sample-photo" data-allowed-file-extensions="jpg jpeg png" />
                        </div>
                        <button type="button"
                            class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange action-button next">
                            Next
                        </button>
                    </div>
                </div>
            </fieldset>

            {{-- Profile --}}
            <fieldset>
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div
                        class="group sign-up-card-section__explore join-individual flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">COMPANY
                            PROFILE</h1>
                        <div class="sign-up-form mb-5">
                            <div class="mb-3 sign-up-form__information">
                                <input type="text" name="website" id="website" placeholder="Website Address*"
                                    class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide required" />
                            </div>
                            {{-- <div class="mb-3 sign-up-form__information">
                                <div class="select-wrapper text-gray-pale">
                                    <div class="select-preferences">
                                        <div
                                            class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                            <span class="sector-menu">Sub-Sector*</span>
                                            <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                    transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                    stroke="#bababa" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" />
                                            </svg>
                                        </div>
                                        <div
                                            class="sector-div custom-options absolute block top-full left-0 right-0 bg-white transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                            <span
                                                class="sector-reset target_employer-reset custom-option selected pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="Sub Sector">Sub Sector</span>
                                            <span class="sector"> </span>
                                        </div>
                                    </div>
                                    <input type="hidden" name="sub_sector_id" id="sector">
                                </div>
                            </div> --}}
                        </div>
                        <button type="button"
                            class="text-gray text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange next action-button">
                            Next
                        </button>
                    </div>
                </div>
            </fieldset>

            {{-- Hiring Preference --}}
            <fieldset>
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div
                        class="group sign-up-card-section__explore join-individual sign-up-card-section__explore--height py-16 sm:py-24 flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">
                            HIRING
                            PREFERENCES</h1>
                        <div class="sign-up-form mb-5">
                            <div class="mb-3 sign-up-form__information">
                                <div class="select-wrapper text-gray-pale">
                                    <div class="select-preferences">
                                        <div
                                            class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                            <span>Main industry*</span>
                                            <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                    transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                    stroke="#bababa" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" />
                                            </svg>
                                        </div>
                                        <div
                                            class="custom-options absolute block top-full left-0 right-0 bg-white transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                            <span
                                                class="industry-reset target_employer-reset custom-option selected pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="Main Industry*">Main industry*</span>
                                            @foreach ($industries as $industry)
                                                <span
                                                    class="industry target_employer custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="{{ $industry->industry_name }}"
                                                    value="{{ $industry->id }}">{{ $industry->industry_name }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <input type="hidden" name="industry_id" id="industry">
                                </div>
                            </div>
                            <div class="mb-3 sign-up-form__information">
                                <div class="select-wrapper text-gray-pale">
                                    <div class="select-preferences">
                                        <div
                                            class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                            <span>Preferred Schools</span>
                                            <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                    transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                    stroke="#bababa" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" />
                                            </svg>
                                        </div>
                                        <div
                                            class="custom-options absolute block top-full left-0 right-0 bg-white transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                            <span
                                                class="preferred_school-reset custom-option selected pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="Preferred Schools">Preferred Schools</span>

                                            @foreach ($institutions as $institution)
                                                <span
                                                    class="preferred_school custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="{{ $institution->institution_name }}"
                                                    value="{{ $institution->id }}">
                                                    {{ $institution->institution_name }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <input type="hidden" name="preferred_school" id="preferred_school">
                                </div>
                            </div>
                            <div class="mb-3 sign-up-form__information relative">
                                <div class="select-wrapper text-gray-pale">
                                    <div class="select-preferences">
                                        <div
                                            class="select__trigger relative flex items-center justify-between pl-4 bg-gray cursor-pointer">
                                            <span>Target Employers</span>
                                            <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                    transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                    stroke="#bababa" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" />
                                            </svg>
                                        </div>
                                        <div
                                            class="custom-options absolute block top-full left-0 right-0 bg-white transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                            <span
                                                class="target_employer-reset custom-option selected pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                data-value="Target Employers">Target Employers</span>
                                            @foreach ($companies as $company)
                                                <span
                                                    class="target_employer custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="{{ $company->company_name }}"
                                                    value="{{ $company->id }}">{{ $company->company_name }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <input type="hidden" name="target_employer" id="target_employer">
                                </div>
                            </div>
                        </div>

                        <button type="button"
                            class="text-gray text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange next action-button">
                            Next</button>
                    </div>
                </div>
            </fieldset>

            {{-- Description --}}
            <fieldset>
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div
                        class="group sign-up-card-section__explore join-individual sign-up-card-section__explore--corporate-height sign-up-card-section__explore--corporate-description-width flex flex-col items-center justify-center bg-gray-light m-2 rounded-md pt-16 pb-20 xl:pt-20 xl:pb-24">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">
                            COMPANY
                            DESCRIPTION</h1>
                        <div class="sign-up-form sign-up-form--description-width mb-5">
                            <div class="mb-3 sign-up-form__information">
                                <textarea name="description" id="description"
                                    placeholder="Please provide a short description of your company (250 characters or less)."
                                    class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide short-description-box"></textarea>
                            </div>
                        </div>
                        <button type="button"
                            class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange next action-button">Next</button>
                    </div>
                </div>
            </fieldset>

            {{-- Membership --}}
            <fieldset>
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div
                        class="group sign-up-card-section__explore join-individual card-membership-height flex flex-col items-center justify-center bg-gray-light m-2 rounded-md py-20">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">
                            SELECT
                            MEMBERSHIP</h1>
                        <div class="sign-up-form mb-5">
                            <ul class="mb-3 sign-up-form__information letter-spacing-custom">
                                @foreach ($packages as $package)
                                    <li value="{{ $package->id }}"
                                        class="membership w-full bg-white <?php echo $package->is_recommanded == true ? 'active-fee' : ' '; ?> sign-up-form__fee cursor-pointer hover:bg-lime-orange text-gray pl-8 pr-4 py-4 mb-4 rounded-md tracking-wide sign-up-form__information--fontSize font-heavy">
                                        {{ $package->package_title }} Plan<span
                                            class="block text-gray font-book">${{ $package->package_price }}
                                            per
                                            month</span>
                                    </li>
                                    <input type="hidden" value="{{ $package->package_price }}">
                                    @if ($package->is_recommanded == true)
                                        <input type="hidden" class="selected_membership_id" value="{{ $package->id }}">
                                        <input type="hidden" class="selected_membership_price"
                                            value="{{ $package->package_price }}">
                                    @endif
                                @endforeach
                            </ul>
                            <input type="hidden" name="package_id" id="package_id" value="">
                            <input type="hidden" name="package_price" id="package_price" value="">
                        </div>
                        <button type="button"
                            class="mb-5 text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange next action-button">
                            Next
                        </button>
                        <br>
                        <button type="submit" style="background-color: transparent;color:#ffdb5f"
                            class="mt-5 text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                            One month free trial
                        </button>
                    </div>

                </div>
            </fieldset>

            {{-- Payment --}}
            <fieldset>
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div
                        class="pay group sign-up-card-section__explore join-individual flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">
                            PAYMENT
                        </h1>
                        <div class="sign-up-form mb-5">
                            <div id="payment-request-button"></div>
                            {{-- <div class="mb-3 sign-up-form__information">
                                <button
                                    class="focus:outline-none w-full bg-gray text-gray-pale py-4 rounded-md tracking-wide">
                                    <img src="{{ asset('img/sign-up/ipay.svg') }}" alt="i pay icon"
                                        class="mx-auto ipay-image">
                                </button>
                            </div> --}}
                            <div class="divider-custom mb-3">
                                <p class="inline-block text-sm text-gray-pale">or pay with card</p>
                            </div>
                            <div class="mb-3 sign-up-form__information">
                                <input type="text" autocomplete='off' placeholder="Card number"
                                    class="card-number text-gray-pale text-sm focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" />
                            </div>
                            <div class="flex flex-wrap justify-between items-center">
                                <div class="mb-3 sign-up-form__information sign-up-form__information--card-width">
                                    <input type="text" placeholder="MM/YY"
                                        class="card-expiry text-gray-pale text-sm focus:outline-none w-full bg-gray text-gray-pale  pl-8 pr-4 py-4 rounded-md tracking-wide" />
                                </div>
                                <div class="mb-3 sign-up-form__information sign-up-form__information--card-width">
                                    <input type="text" placeholder="CVV" autocomplete='off'
                                        class="card-cvc text-gray-pale text-sm focus:outline-none w-full bg-gray text-gray-pale  pl-8 pr-4 py-4 rounded-md tracking-wide" />
                                </div>
                            </div>
                        </div>
                        <button type="button" id="card_payment_action_btn"
                            class="text-gray text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                            Next
                        </button>
                    </div>
                </div>
            </fieldset>

        </form>

        <!-- Payment Success Modal -->
        <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="corporate-successful-popup">
            <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
                <div
                    class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-16 pb-8 relative">
                    <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">THAT'S ALL FOR NOW!</h1>
                    <p class="text-gray-pale popup-text-box__description mb-4">To receive well-matched profiles of
                        Individual Members,submit a position listing now.</p>
                    <div class="sign-up-form sign-up-form--individual-success my-5">
                        <ul class="mb-3 sign-up-form__information sign-up-form__information--individual">

                            <button id="" type="submit" form="to-optimize-listing"
                                class="mx-auto active-fee sign-up-form__fee successful-options cursor-pointer hover:bg-lime-orange hover:text-gray text-lime-orange mb-4 rounded-full tracking-wide text-sm lg:text-base xl:text-lg border border-lime-orange py-5">
                                Submit a position listing</button>

                            <form id="to-optimize-listing" action="{{ route('to.company.optimize') }}" method="POST"
                                style="display: none;">
                                @csrf
                                <input type="hidden" value="{{ $company->id }}" name="company_id">
                            </form>

                            <button type="submit" form="to-company-dashboard"
                                class="mx-auto cursor-pointer sign-up-form__fee successful-options hover:bg-lime-orange hover:text-gray text-lime-orange mb-4 rounded-full tracking-wide text-sm lg:text-base xl:text-lg border border-lime-orange py-5">
                                Not Now</button>
                            <form id="to-company-dashboard" action="{{ route('to.company.dashboard') }}" method="POST"
                                style="display: none;">
                                @csrf
                                <input type="hidden" value="{{ $company->id }}" name="company_id">
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        $(document).ready(function() {

            // Stripe Payment and Register Script
            var stripe = Stripe($("#msform").data('stripe-publishable-key'));
            var package_id = $('#package_id').val();

            var paymentRequest = stripe.paymentRequest({
                country: 'US',
                currency: 'usd',
                total: {
                    label: 'Lobahn Payment',
                    amount: Math.floor($('#package_price').val() * 100),
                },
                requestPayerName: true,
                requestPayerEmail: true,
            });
            var elements = stripe.elements();
            var prButton = elements.create('paymentRequestButton', {
                paymentRequest: paymentRequest,
            });
            // Check the availability of the Payment Request API first.
            paymentRequest.canMakePayment().then(function(result) {
                if (result) {
                    prButton.mount('#payment-request-button');
                } else {
                    document.getElementById('payment-request-button').style.display = 'none';
                }
            });
            paymentRequest.on('paymentmethod', function(ev) {
                var client_secret;
                $.ajax({
                    type: 'POST',
                    url: '/google-pay',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "package_id": $('#package_id').val(),
                        "id": $('#client_id').val(),
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            client_secret = data.intent.client_secret;
                            googlePay(client_secret);
                        } else {
                            console.log("Payment Fail , try again");
                        }
                    }
                });

                function googlePay(clientSecret) {
                    stripe.confirmCardPayment(
                        clientSecret, {
                            payment_method: ev.paymentMethod.id
                        }, {
                            handleActions: false
                        }
                    ).then(function(confirmResult) {
                        if (confirmResult.error) {
                            ev.complete('fail');
                        } else {
                            ev.complete('success');
                            if (confirmResult.paymentIntent.status === "requires_action") {
                                stripe.confirmCardPayment(clientSecret).then(function(result) {
                                    if (result.error) {
                                        // The payment failed -- ask your customer for a new payment method.
                                    } else {
                                        // The payment has succeeded.
                                        proceedPayment(clientSecret);
                                    }
                                });
                            } else {
                                // The payment has succeeded.
                                proceedPayment(clientSecret);
                            }
                        }
                    });
                }

                function proceedPayment(clientSecret) {
                    $.ajax({
                        type: 'POST',
                        url: '/google-pay/success',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "client_secret": clientSecret,
                            "package_id": $('#package_id').val(),
                            "id": $('#client_id').val(),
                            "client_type": $("#client_type").val()
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                $('#msform').submit();
                            } else {
                                alert(
                                    "Payment Fail , try again"
                                );
                            }
                        }
                    });
                }
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

            $("#card_payment_action_btn").click(function() {
                var btn = $(this);
                btn.prop('disabled', true);
                setTimeout(function() {
                    btn.prop('disabled', false);
                }, 3 * 1000);

                var $form = $("#msform");
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                var cardexpirymonth = $('.card-expiry').val().split('/')[0];
                var cardexpireyear = $('.card-expiry').val().split('/')[1];
                var response = Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: cardexpirymonth,
                    exp_year: cardexpireyear
                }, stripeResponseHandler);

                function stripeResponseHandler(status, response) {
                    if (response.error) {
                        alert("Please use valid card and try again ");

                    } else {
                        /* token contains id, last4, and card type */
                        var stripe_token = response['id'];
                        pay(stripe_token);
                    }
                }

                function pay(stripe_token) {
                    $.ajax({
                        type: 'POST',
                        url: '/stripe',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "stripeToken": stripe_token,
                            "package_id": $('#package_id').val(),
                            "id": $('#client_id').val(),
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                $('#msform').submit();
                            } else {
                                alert("Payment Fail , try again");
                            }
                        }
                    });
                }

            });
            // End of Stripe Payment and Register Script

            @if (session('status'))
                openModalBox('#corporate-successful-popup')
                @php Session::forget('verified'); @endphp
            @endif
            $(document).mouseup(function(e) {
                var container = $('.popup-text-box__container');
                @if (session('status'))
                    var status = true;
                @else
                    var status = false;
                @endif
                if (!container.is(e.target) && container.has(e.target).length === 0 && status == true) {
                    $('#to-company-dashboard').submit();
                }
            });
        });
    </script>
    <script src="{{ asset('/js/talent-register.js') }}"></script>
@endpush

@push('css')
    <style>
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        #msform fieldset {
            background: none !important;
        }

    </style>
@endpush
