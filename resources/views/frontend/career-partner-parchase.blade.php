@extends("layouts.frontend-master")
@section('content')
    <form id="msform" action="{{ route('career-partner.premium') }}" method="POST"
        data-stripe-publishable-key="{{ $stripe_key }}" name="msform">
        @csrf
        <input type="hidden" name="user_id" id="client_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="client_type" id="client_type" value="user">
        <fieldset>
            <div class="bg-gray-warm-pale text-white mt-24 py-16 md:pt-28 pb-28">
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div
                        class="group sign-up-card-section__explore join-individual card-membership-height flex flex-col items-center justify-center bg-gray-light m-2 rounded-md py-20">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4 uppercase">
                            CAREER
                            PARTNER™</h1>
                        <div class="sign-up-form mb-5">
                            <ul class="mb-3 sign-up-form__information letter-spacing-custom">
                                @foreach ($packages as $package)
                                    <li value="{{ $package->id }}"
                                        class="membership w-full bg-white active-fee sign-up-form__fee cursor-pointer hover:bg-lime-orange text-gray pl-8 pr-4 py-4 mb-4 rounded-md tracking-wide sign-up-form__information--fontSize font-heavy">
                                        {{ $package->package_title }}<span class="block text-gray font-book">HK$
                                            {{ number_format($package->package_price) }}</span>
                                    </li>
                                    <input type="hidden" value="{{ $package->package_price }}">
                                    @if ($package->is_recommanded == true)
                                        <input type="hidden" class="selected_membership_id" value="{{ $package->id }}">
                                        <input type="hidden" class="selected_membership_price"
                                            value="{{ $package->package_price }}">
                                    @endif
                                @endforeach
                                <input type="hidden" name="package_id" id="package_id" value="">
                                <input type="hidden" name="package_price" id="package_price" value="">
                            </ul>
                        </div>
                        <button type="button"
                            class="next text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <div class="bg-gray-warm-pale text-white mt-24 py-16 md:pt-28 pb-28">
                <div class="flex flex-wrap justify-center items-center sign-up-card-section">
                    <div
                        class="group sign-up-card-section__explore join-individual flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                        <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">PAYMENT
                        </h1>
                        <div class="sign-up-form mb-5">
                            <div id="payment-request-button"></div>
                            <div class="divider-custom mb-3">
                                <p class="inline-block text-sm text-gray-pale">or pay with card</p>
                            </div>
                            <div class="mb-3 sign-up-form__information">
                                <input type="text" id="card-number" autocomplete='off' placeholder="Card number"
                                    class="card-number text-gray-pale text-sm focus:outline-none w-full bg-gray pl-8 pr-4 py-4 rounded-md tracking-wide" />
                            </div>
                            <div class="flex flex-wrap justify-between items-center">
                                <div class="mb-3 sign-up-form__information sign-up-form__information--card-width">
                                    <input type="text" id="card-expiry" placeholder="MM/YYYY"
                                        class="card-expiry text-gray-pale text-sm focus:outline-none w-full bg-gray pl-8 pr-4 py-4 rounded-md tracking-wide" />
                                </div>
                                <div class="mb-3 sign-up-form__information sign-up-form__information--card-width">
                                    <input type="text" id="cvv" placeholder="CVV" autocomplete='off'
                                        class="card-cvc text-gray-pale text-sm focus:outline-none w-full bg-gray pl-8 pr-4 py-4 rounded-md tracking-wide" />
                                </div>
                            </div>
                        </div>
                        <button id="card_payment_action_btn" type="button"
                            class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>

    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity"
        onclick="window.location='{{ url('home') }}'" id="corporate-premiumplan-payment-success-popup">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div
                class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-16 pb-8 relative">
                <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">THANK YOU!</h1>
                <p class="text-gray-pale popup-text-box__description popup-text-box__description--optimize mb-4">Your
                    payment has been received.</p>
                <div class="sign-up-form sign-up-form--individual-success sign-up-optimize-box mt-3 mb-5">
                    <ul class="mb-3 sign-up-form__information sign-up-form__information--individual">
                        <li onclick="window.location='{{ url('home') }}'"
                            class="mx-auto active-fee sign-up-form__fee successful-options cursor-pointer hover:bg-lime-orange hover:text-gray text-lime-orange mb-4 rounded-full tracking-wide text-sm lg:text-base xl:text-lg border border-lime-orange py-5">
                            Return to dashboard
                        </li>
                    </ul>
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
                    label: 'Lobahn - Talent Discovery Premium',
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
                            if (confirmResult.paymentIntent.status ===
                                "requires_action") {
                                stripe.confirmCardPayment(clientSecret).then(function(
                                    result) {
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
                            "client_type": $("#client_type").val()
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
                openModalBox('#corporate-premiumplan-payment-success-popup')
                @php Session::forget('status'); @endphp
            @endif

            // package
            $('#package_id').val($(".selected_membership_id").val());
            $('#package_price').val($(".selected_membership_price").val());

            $('.membership').click(function() {
                $('#package_id').val($(this).attr('value'));
                $('#package_price').val($(this).next().val());

            });

            var current_fs, next_fs, previous_fs;
            var opacity;
            $(".next").click(function() {

                current_fs = $(this).closest("fieldset");
                next_fs = $(this).closest("fieldset").next();
                next();
            });

            function next() {
                next_fs.show();
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        opacity = 1 - now;
                        current_fs.css({
                            'display': 'none'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            }

            $("#msform").keydown(function(event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });

        });
    </script>
@endpush
@push('css')
    <style>
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

    </style>
@endpush
