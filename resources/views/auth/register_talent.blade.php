@extends('layouts.master')
@push('css')
    <style>
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        #msform fieldset {
            background: none !important;
        }

        ul li {
            text-align: left;
        }

    </style>
@endpush
@section('content')
    <div class="bg-gray-warm-pale text-white mt-28 py-16 md:pt-28 md:pb-28">
        <form action="{{ route('company.register') }}" method="POST" files="true" id="msform" name="msform"
            enctype="multipart/form-data" data-stripe-publishable-key="{{ $stripe_key }}" autocomplete="off">
            @csrf

            <input type="hidden" name="company_id" id="client_id" value="{{ $company->id }}">
            <input type="hidden" name="client_type" id="client_type" value="company">

            {{-- Account Data --}}
            <fieldset id="user_data">
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div
                        class="group sign-up-card-section__explore join-individual flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">YOUR
                            PASSWORD</h1>
                        <div class="sign-up-form mb-5">
                            <p class="hidden text-red-500 mb-1" id="username_req">Username is required!</p>
                            <p class="hidden text-red-500 mb-1" id="username_min_err">Username must be 5 character in Minimum
                                !
                            </p>
                            <div class="mb-3 sign-up-form__information">
                                <input type="text" name="user_name" id="user_name" placeholder="Username*"
                                    class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide"
                                    required />
                            </div>
                            <p class="hidden text-red-500 mb-1" id="passwords_req">Passwords are required!</p>
                            <div class="mb-3 sign-up-form__information relative">
                                <input type="password" name="password" id="password" placeholder="Password*"
                                    class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide profile-password"
                                    required />
                                <img src="{{ asset('img/sign-up/eye-lash.svg') }}" alt="eye lash icon"
                                    class="cursor-pointer eye-lash-icon absolute right-0" />
                            </div>
                            <p class="hidden text-red-500 mb-1" id="passwords_not_match">Passwords do not match!</p>
                            <div class="mb-3 sign-up-form__information relative">
                                <input type="password" name="confirm_password" id="confirm_password"
                                    placeholder="Confirm password*"
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
                        <p class="hidden text-red-500 mb-1" id="photo_max_err">Photo must not be larger than 200kb !
                        </p>
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
                                <input type="text" name="website" id="website" placeholder="Website Address"
                                    class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide required" />
                            </div>
                        </div>
                        <button type="button"
                            class="text-gray text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange next action-button">
                            Next
                        </button>
                    </div>
                </div>
            </fieldset>

            {{-- Hiring Preference --}}
            <fieldset class="flex flex-wrap justify-center items-center sign-up-card-section">
                <center>
                    <div
                        class="group sign-up-card-section__explore join-individual sign-up-card-section__explore--height py-16 sm:py-24 flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">HIRING
                            PREFERENCES</h1>
                        <div class="sign-up-form mb-5">
                            <div class="mb-3 text-gray-pale custom-multiple-select-container relative text-21">
                                <div id="sign-up-preference-industry" class="dropdown-check-list" tabindex="100">
                                    <button data-value=''
                                        onclick="openDropdownForEmploymentForAll('sign-up-preference-industry',event)"
                                        class="block position-detail sign-up-preference-industry-anchor selectedData pl-8 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray text-white py-4 rounded-md"
                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="sign-up-preference-industry flex justify-between">
                                            <span
                                                class="sign-up-preference-industry mr-12 py-1 text-gray-pale text-21 selectedText">Preferred
                                                Industries</span>
                                            <span
                                                class="sign-up-preference-industry custom-caret-preference flex self-center"></span>
                                        </div>
                                    </button>
                                    <ul id="sign-up-preference-industry-ul"
                                        onclick="changeDropdownCheckboxForAllDropdownCustom('sign-up-preference-industry-select-box-checkbox','sign-up-preference-industry','Preferred Schools')"
                                        class="sign-up-preference-industry-container items position-detail-select-card bg-gray text-white">
                                        <li>
                                            <input id="sign-up-preference-industry-search-box" type="text"
                                                placeholder="Search"
                                                class="sign-up-preference-industry sign-up-preference-industry-search-text text-lg py-1 focus:outline-none outline-none pl-8 text-gray bg-lime-orange border w-full border-none" />
                                        </li>
                                        @foreach ($industries as $industry)
                                            <li
                                                class="sign-up-preference-industry-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                <input name='sign-up-preference-industry-select-box-checkbox'
                                                    data-value='{{ $industry->id }}' type="checkbox"
                                                    data-target='{{ $industry->industry_name }}'
                                                    id="sign-up-preference-industry-select-box-checkbox{{ $industry->industry_name }}"
                                                    class="selected-industries sign-up-preference-industry" /><label
                                                    for="sign-up-preference-industry-select-box-checkbox{{ $industry->industry_name }}"
                                                    class="sign-up-preference-industry text-21 pl-2 font-normal text-white">{{ $industry->industry_name }}</label>
                                            </li>
                                        @endforeach
                                        <input type="hidden" name="industry_id">
                                    </ul>
                                </div>
                            </div>
                            <div class="mb-3 text-gray-pale custom-multiple-select-container relative text-21">
                                <div id="sign-up-preference-school" class="dropdown-check-list" tabindex="100">
                                    <button data-value=''
                                        onclick="openDropdownForEmploymentForAll('sign-up-preference-school',event)"
                                        class="block position-detail sign-up-preference-school-anchor selectedData pl-8 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray text-white py-4 rounded-md"
                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="sign-up-preference-school flex justify-between">
                                            <span
                                                class="sign-up-preference-school mr-12 py-1 text-gray-pale text-21 selectedText">Preferred
                                                Institutes</span>
                                            <span
                                                class="sign-up-preference-school custom-caret-preference flex self-center"></span>
                                        </div>
                                    </button>
                                    <ul id="sign-up-preference-school-ul"
                                        onclick="changeDropdownCheckboxForAllDropdownCustom('sign-up-preference-school-select-box-checkbox','sign-up-preference-school','Preferred Schools')"
                                        class="sign-up-preference-school-container items position-detail-select-card bg-gray text-white">
                                        <li>
                                            <input id="sign-up-preference-school-search-box" type="text"
                                                placeholder="Search"
                                                class="sign-up-preference-school sign-up-preference-school-search-text text-lg py-1 focus:outline-none outline-none pl-8 text-gray bg-lime-orange border w-full border-none" />
                                        </li>

                                        @foreach ($institutions as $institution)
                                            <li
                                                class="sign-up-preference-school-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                <input name='sign-up-preference-school-select-box-checkbox'
                                                    data-value='{{ $institution->id }}' type="checkbox"
                                                    data-target='{{ $institution->institution_name }}'
                                                    id="sign-up-preference-school-select-box-checkbox{{ $institution->id }}"
                                                    class="selected-institutions sign-up-preference-school" /><label
                                                    for="sign-up-preference-school-select-box-checkbox{{ $institution->id }}"
                                                    class="sign-up-preference-school text-21 pl-2 font-normal text-white">{{ $institution->institution_name }}</label>
                                            </li>
                                        @endforeach
                                        <input type="hidden" name="institution_id">
                                    </ul>
                                </div>
                            </div>
                            <div class="mb-3 text-gray-pale custom-multiple-select-container relative text-21">
                                <div id="sign-up-preference-employer" class="dropdown-check-list" tabindex="100">
                                    <button data-value=''
                                        onclick="openDropdownForEmploymentForAll('sign-up-preference-employer',event)"
                                        class="block position-detail sign-up-preference-employer-anchor selectedData pl-8 pr-4 text-lg font-book focus:outline-none outline-none w-full bg-gray text-white py-4 rounded-md"
                                        type="button" id="" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="sign-up-preference-employer flex justify-between">
                                            <span
                                                class="sign-up-preference-employer mr-12 py-1 text-gray-pale text-21 selectedText">Preferred
                                                Employer</span>
                                            <span
                                                class="sign-up-preference-employer custom-caret-preference flex self-center"></span>
                                        </div>
                                    </button>
                                    <ul id="sign-up-preference-employer-ul"
                                        onclick="changeDropdownCheckboxForAllDropdownCustom('sign-up-preference-employer-select-box-checkbox','sign-up-preference-employer','Preferred Schools')"
                                        class="sign-up-preference-employer-container items position-detail-select-card bg-gray text-white">
                                        <li>
                                            <input id="sign-up-preference-employer-search-box" type="text"
                                                placeholder="Search"
                                                class="sign-up-preference-employer sign-up-preference-employer-search-text text-lg py-1 focus:outline-none outline-none pl-8 text-gray bg-lime-orange border w-full border-none" />
                                        </li>
                                        @foreach ($companies as $company)
                                            <li
                                                class="sign-up-preference-employer-select-box cursor-pointer preference-option-active py-1 pl-6  preference-option1">
                                                <input name='sign-up-preference-employer-select-box-checkbox'
                                                    data-value='{{ $company->id }}' type="checkbox"
                                                    data-target='{{ $company->company_name }}'
                                                    id="sign-up-preference-employer-select-box-checkbox{{ $company->id }}"
                                                    class="selected-employers sign-up-preference-employer" /><label
                                                    for="sign-up-preference-employer-select-box-checkbox{{ $company->id }}"
                                                    class="sign-up-preference-employer text-21 pl-2 font-normal text-white">{{ $company->company_name }}</label>
                                            </li>
                                            <input type="hidden" name="employer_id">
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <button type="button"
                            class="next action-button text-gray text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                            Next
                        </button>
                    </div>
                </center>
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
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    maxlength="300"
                                    placeholder="Please provide a short description of your company (300 characters or less)."
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
                            SELECT MEMBERSHIP</h1>
                        <div class="sign-up-form mb-5">
                            <ul class="mb-3 sign-up-form__information letter-spacing-custom">
                                @foreach ($packages as $package)
                                    <li value="{{ $package->id }}"
                                        class="membership w-full bg-white <?php echo ($package->is_recommanded && $package->package_type == 'basic') == true ? 'active-fee' : ' '; ?> sign-up-form__fee cursor-pointer hover:bg-lime-orange text-gray pl-8 pr-4 py-4 mb-4 rounded-md tracking-wide sign-up-form__information--fontSize font-heavy">
                                        {{ $package->package_title }}<span class="block text-gray font-book">
                                            HKD ${{ $package->package_price }}per month
                                        </span>
                                    </li>
                                    <input type="hidden" value="{{ $package->package_price }}">
                                    @if ($package->is_recommanded == true && $package->package_type == 'basic')
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
                            <div class="divider-custom mb-3">
                                <p class="inline-block text-sm text-gray-pale">or pay with card</p>
                            </div>
                            <p class="hidden text-red-500 mb-1" id="invalid_card_err"> Invalid Card ! please try again.
                            </p>
                            <div class="mb-3 sign-up-form__information">
                                <input type="text" id="card-number" autocomplete='off' placeholder="Card number"
                                    class="card-number text-gray-pale text-sm focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" />
                            </div>
                            <div class="flex flex-wrap justify-between items-center">
                                <div class="mb-3 sign-up-form__information sign-up-form__information--card-width">
                                    <input type="text" id="card-expiry" placeholder="MM/YYYY"
                                        class="card-expiry text-gray-pale text-sm focus:outline-none w-full bg-gray text-gray-pale  pl-8 pr-4 py-4 rounded-md tracking-wide" />
                                </div>
                                <div class="mb-3 sign-up-form__information sign-up-form__information--card-width">
                                    <input type="text" id="cvv" placeholder="CVV" autocomplete='off'
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
@endsection

@push('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('#file-input').bind('change', function() {
                if (this.files[0].size > 200000) {
                    //alert("here");
                    $('#photo_max_err').removeClass('hidden');
                    $(this).val('');
                    // var src = "{{ asset('img/sign-up/upload-photo.png') }}";
                    // $('#sample-photo').attr('src', src);
                } else {
                    //alert("no");
                    $('#photo_max_err').addClass('hidden');
                }
            });

            $('#cvv').mask('000');
            $('#card-expiry').mask('00/0000');
            $('#card-number').mask('0000 0000 0000 0000');

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
                                alert("Success");
                                console.log(intent);
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
                $('#loader').removeClass('hidden');
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
                        $('#loader').addClass('hidden');
                        $('#invalid_card_err').removeClass('hidden');
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
                        },
                        error: function(error) {
                            $('#loader').addClass('hidden');
                            $('#invalid_card_err').removeClass('hidden');
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
