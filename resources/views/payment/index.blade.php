<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="{!! $siteSetting->site_name !!}">
    <title>LOB </title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/img/favicons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/img/favicons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/img/favicons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/img/favicons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/img/favicons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/img/favicons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/img/favicons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/img/favicons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/img/favicons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('/img/favicons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/img/favicons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/img/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('/img/favicons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="shortcut icon" href="{{ asset('images/lobahn-icon.png') }}') }}">
    <link rel="stylesheet" href="https://use.typekit.net/kiu7qvy.css">
    <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/extra.css') }}">
    <style>
        #msform fieldset:not(:first-of-type) {
            display: none
        }

    </style>
</head>

<body class="bg-gray">
    @include('includes.loader')
    @include('layouts.nav', ['title' => $title ?? ' '])
    <div class="bg-gray-warm-pale text-white mt-28 py-16 md:pt-28 md:pb-28">
        <!-- Register Form -->
        <form action="{{ route('register') }}" method="POST" files="true" id="msform" name="msform"
            enctype="multipart/form-data" data-stripe-publishable-key="{{ $stripe_key }}">
            @csrf
            <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                <input type="hidden" name="user_id" id="client_id" value="{{ $user_id }}">
                <input type="hidden" name="client_type" id="client_type" value="{{ $client_type }}">
                <input type="hidden" name="email" id="email" value="{{ $email }}">
                <!-- Membership / Package -->
                <fieldset
                    class="group sign-up-card-section__explore join-individual card-membership-height flex flex-col items-center justify-center bg-gray-light m-2 rounded-md py-20">
                    <center>
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide ">
                            SELECT
                            MEMBERSHIP</h1>
                        <div class="sign-up-form mb-5">
                            <ul class="mb-3 sign-up-form__information letter-spacing-custom">
                                @foreach ($packages as $package)
                                    <li value="{{ $package->id }}"
                                        class="membership w-full bg-white <?php echo $package->is_recommanded == true ? 'active-fee' : ' '; ?> sign-up-form__fee cursor-pointer hover:bg-lime-orange text-gray pl-8 pr-4 py-4 mb-4 rounded-md tracking-wide sign-up-form__information--fontSize font-heavy">
                                        {{ $package->package_title }}
                                        <span class="block text-gray font-book">HKD
                                            ${{ $package->package_price }}
                                            only
                                        </span>
                                        @if ($package->is_recommanded == true)
                                            <input type="hidden" class="selected_membership_id"
                                                value="{{ $package->id }}">
                                            <input type="hidden" class="selected_membership_price"
                                                value="{{ $package->package_price }}">
                                        @endif
                                    </li>
                                    <input type="hidden" value="{{ $package->package_price }}">
                                @endforeach
                            </ul>
                            <input type="hidden" name="package_id" id="package_id" value="">
                            <input type="hidden" name="package_price" id="package_price" value="">
                        </div>
                        <button type="button"
                            class="mb-5 text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange next action-button">
                            Next
                        </button>
                    </center>
                </fieldset>

                {{-- Payment --}}
                <fieldset
                    class="pay group sign-up-card-section__explore join-individual flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                    <center>
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">
                            PAYMENT
                        </h1>
                        <div class="sign-up-form mb-5">
                            <div id="payment-request-button"></div>
                            <div class="divider-custom mb-3">
                                <p class="inline-block text-sm text-gray-pale">pay with stripe card</p>
                            </div>
                            <div class="mb-3 sign-up-form__information">
                                <input type="text" id="card-number" autocomplete='off' placeholder="Card number"
                                    class="card-number text-gray-pale text-sm focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" />
                            </div>
                            <div class="flex flex-wrap justify-between items-center">
                                <div class="mb-3 sign-up-form__information sign-up-form__information--card-width">
                                    <input type="text" id="card-expiry" placeholder="MM/YYYY"
                                        class="card-expiry text-gray-pale text-sm focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" />
                                </div>
                                <div class="mb-3 sign-up-form__information sign-up-form__information--card-width">
                                    <input type="text" id="cvv" placeholder="CVV" autocomplete='off'
                                        class="card-cvc text-gray-pale text-sm focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" />
                                </div>
                            </div>
                        </div>
                        <button type="button" id="card_payment_action_btn"
                            class="text-gray text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                            Next
                        </button>
                    </center>
                </fieldset>
        </form>
        <!-- End of Register Form -->

        <!-- Payment Success Popup -->
        <div class="hidden fixed top-0 w-full h-screen left-0 z-50 bg-black-opacity" id="individual-successful-popup">
            <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
                <div
                    class=" flex flex-col justify-center items-center popup-text-box__container popup-text-box__container--height pt-16 pb-8 relative">
                    <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">PAYMENT SUCCESS!</h1>
                    <p class="text-gray-pale popup-text-box__description individual-successful-description">Thank you
                        for joining Lobahn Connect™.</p>
                    <div class="sign-up-form sign-up-form--individual-success sign-up-optimize-box my-5">
                        <ul class="mb-3 sign-up-form__information sign-up-form__information--individual">
                            <button
                                @if ($client_type == 'user') onclick="window.location='{{ url('home') }}'" @else onclick="window.location='{{ url('company-home') }}'" @endif
                                class="mx-auto cursor-pointer sign-up-form__fee successful-options hover:bg-lime-orange hover:text-gray text-lime-orange mb-4 rounded-full tracking-wide text-sm lg:text-base xl:text-lg border border-lime-orange py-5">
                                Next
                            </button>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Payment Success Popup -->
    </div>

    @include('layouts.footer')
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
    <script src='https://cdn.tiny.cloud/1/7lo2e7xqoln1oo18qkxrhvk9wohy5picx4824cjgas8odbg3/tinymce/5/tinymce.min.js'
        referrerpolicy="origin"></script>
    <script src="{{ asset('/js/scripts.js') }}"></script>
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('#msform').on('keyup keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });

            @if (session('status'))
                openModalBox('#individual-successful-popup')
                @php Session::forget('verified'); @endphp
            @endif

            $('#cvv').mask('000');
            $('#card-expiry').mask('00/0000');
            $('#card-number').mask('0000 0000 0000 0000');
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
                    $('#loader').removeClass('hidden');
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
                                //alert("succcess");
                            } else {
                                alert(
                                    "Payment Fail , try again"
                                );
                            }
                        }
                    });
                }
            });

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
                        alert("Please use valid card and try again ");
                        $('#loader').addClass('hidden');
                    } else {
                        //alert("Card Success ");
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
                            "client_type": $("#client_type").val(),
                            "email": $("#email").val()
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                $("#individual-successful-popup").removeClass('hidden');
                                // if ($("#client_type").val() == 'user')
                                //     window.location.replace("{{ url('home') }}");
                                // else
                                //     window.location.replace("{{ url('company-home') }}");
                                //$('#msform').submit();
                            } else {
                                alert("Payment Fail , try again");
                            }
                        },
                        beforeSend: function() {
                            //$('#loader').removeClass('hidden')
                        },
                        complete: function() {
                            //$('#loader').addClass('hidden')
                        }
                    });
                }
            });
            // End of Stripe Payment and Register Script
        });
    </script>
    <script src="{{ asset('./js/candidate-register.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#loader').addClass('hidden')
        });
    </script>
</body>

</html>
