@extends("layouts.frontend-master")
@push('css')
    <style>
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

    </style>
@endpush
@section('content')
    <form id="msform" data-stripe-publishable-key="{{ $stripe_key }}" name="msform">
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
                                <li
                                    class="w-full bg-white active-fee sign-up-form__fee cursor-pointer hover:bg-lime-orange text-gray pl-8 pr-4 py-4 mb-4 rounded-md tracking-wide sign-up-form__information--fontSize font-heavy">
                                    90-day Service<span class="block text-gray font-book">HK$ 2,850</span>
                                </li>
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
                            <div class="mb-3 sign-up-form__information">
                                <button
                                    class="focus:outline-none w-full bg-gray text-gray-pale py-4 rounded-md tracking-wide">
                                    <img src="./img/sign-up/ipay.svg" alt="i pay icon" class="mx-auto ipay-image">
                                </button>
                            </div>
                            <div class="divider-custom mb-3">
                                <p class="inline-block text-sm text-gray-pale">or pay with card</p>
                            </div>
                            <div class="mb-3 sign-up-form__information">
                                <input type="text" autocomplete='off' placeholder="Card number"
                                    class="card-number text-gray-pale text-sm focus:outline-none w-full bg-gray pl-8 pr-4 py-4 rounded-md tracking-wide" />
                            </div>
                            <div class="flex flex-wrap justify-between items-center">
                                <div class="mb-3 sign-up-form__information sign-up-form__information--card-width">
                                    <input type="text" placeholder="MM/YY"
                                        class="card-expiry text-gray-pale text-sm focus:outline-none w-full bg-gray pl-8 pr-4 py-4 rounded-md tracking-wide" />
                                </div>
                                <div class="mb-3 sign-up-form__information sign-up-form__information--card-width">
                                    <input type="text" placeholder="CVV" autocomplete='off'
                                        class="card-cvc text-gray-pale text-sm focus:outline-none w-full bg-gray pl-8 pr-4 py-4 rounded-md tracking-wide" />
                                </div>
                            </div>
                        </div>
                        <button id="make-payment"
                            class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
    <button id="corporate-member-payment-next-btn" class="hidden"></button>

    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity"
        onclick="window.location='{{ route('home') }}'" id="corporate-premiumplan-payment-success-popup">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div
                class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container-corporate popup-text-box__container--height pt-16 pb-8 relative">
                <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">THANK YOU!</h1>
                <p class="text-gray-pale popup-text-box__description popup-text-box__description--optimize mb-4">Your
                    payment has been received.</p>
                <div class="sign-up-form sign-up-form--individual-success sign-up-optimize-box mt-3 mb-5">
                    <ul class="mb-3 sign-up-form__information sign-up-form__information--individual">
                        <li onclick="window.location='{{ route('home') }}'"
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
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        $(document).ready(function() {
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


            $("#make-payment").click(function() {
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
                        // console.log(stripe_token);
                        pay(stripe_token);
                    }
                }

                function pay(stripe_token) {

                    $.ajax({
                        type: 'POST',
                        url: '/careerStripe',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "stripeToken": stripe_token,
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                $("#corporate-member-payment-next-btn").click();
                            } else {
                                alert("Payment Fail , try again");
                            }
                        }
                    });
                }
            });

            $("#msform").keydown(function(event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>
@endpush
