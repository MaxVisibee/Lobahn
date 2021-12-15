<!DOCTYPE html>
<html>

<head>
    <title>Stripe Payment Gateway Integration</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://applepay.cdn-apple.com/jsapi/v1/apple-pay-sdk.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        .panel-title {
            display: inline;
            font-weight: bold;
        }

        .display-table {
            display: table;
        }

        .display-tr {
            display: table-row;
        }

        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }

        apple-pay-button {
            --apple-pay-button-width: 150px;
            --apple-pay-button-height: 30px;
            --apple-pay-button-border-radius: 3px;
            --apple-pay-button-padding: 0px 0px;
            --apple-pay-button-box-sizing: border-box;
        }

    </style>

</head>

<body>

    <div class="container">

        <h1>Payment Gateway Integration - tmp</h1>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default credit-card-box">

                    <div class="panel-body">

                        <!-- Integration Button -->

                        {{-- <a class="btn btn-primary btn-lg btn-block" href="{{ route('applepay-transaction') }}">Apple
                            Pay</a> --}}



                        <!-- End Integration Button -->

                        <div id="payment-request-button">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <p style="display: block" id="notmake"> <i> Your browser do not support apple pay </i> </p>

                        <hr>
                        <a class="btn btn-primary btn-lg btn-block" href="{{ route('paypalProcessTransaction') }}">
                            Pay with PayPal
                        </a>

                        <hr>

                        <form role="form" action="{{ route('stripe.pay') }}" method="post" class="require-validation"
                            data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                            @csrf

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label> <input class='form-control'
                                        size='4' type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group card required'>
                                    <label class='control-label'>Card Number</label> <input autocomplete='off'
                                        class='form-control card-number' size='20' type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-6 form-group cvc required'>
                                    <label class='control-label'>CVC</label> <input autocomplete='off'
                                        class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-6 form-group expiration required'>
                                    <label class='control-label'>Expiration </label> <input
                                        class='form-control card-expiry-month' placeholder='MM/YYYY' size='2'
                                        type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert'>Please correct the errors and try
                                        again.</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay with
                                        Stripe</button>
                                </div>
                            </div>

                            <hr>

                            @if (\Session::has('error'))
                                <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                                {{ \Session::forget('error') }}
                            @endif
                            @if (\Session::has('success'))
                                <div class="alert alert-success">{{ \Session::get('success') }}</div>
                                {{ \Session::forget('success') }}
                            @endif

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    $(function() {

        // Apple Pay Scripts 

        // setting up stripe api key

        var stripe = Stripe("<?php echo env('STRIPE_KEY'); ?>");

        // Create Payment Request 

        var paymentRequest = stripe.paymentRequest({
            country: 'US',
            currency: 'usd',
            total: {
                label: 'Demo total',
                amount: 1099,
            },
            requestPayerName: true,
            requestPayerEmail: true,
        });


        // Create the paymentRequestButton Element
        var elements = stripe.elements();
        var prButton = elements.create('paymentRequestButton', {
            paymentRequest: paymentRequest,
        });

        // Check the availability of the Payment Request API first.
        paymentRequest.canMakePayment().then(function(result) {
            if (result) {
                prButton.mount('#payment-request-button');
                document.getElementById('notmake').style.display = 'none';
            } else {
                document.getElementById('payment-request-button').style.display = 'none';
            }
        });

        // Listen to the paymentmethod event

        paymentRequest.on('paymentmethod', function(ev) {
            // Confirm the PaymentIntent without handling potential next actions (yet).
            stripe.confirmCardPayment(
                clientSecret, {
                    payment_method: ev.paymentMethod.id
                }, {
                    handleActions: false
                }
            ).then(function(confirmResult) {
                if (confirmResult.error) {
                    // Report to the browser that the payment failed, prompting it to
                    // re-show the payment interface, or show an error message and close
                    // the payment interface.
                    ev.complete('fail');
                } else {
                    // Report to the browser that the confirmation was successful, prompting
                    // it to close the browser payment method collection interface.
                    ev.complete('success');
                    // Check if the PaymentIntent requires any actions and if so let Stripe.js
                    // handle the flow. If using an API version older than "2019-02-11"
                    // instead check for: `paymentIntent.status === "requires_source_action"`.
                    if (confirmResult.paymentIntent.status === "requires_action") {
                        // Let Stripe.js handle the rest of the payment flow.
                        stripe.confirmCardPayment(clientSecret).then(function(result) {
                            if (result.error) {
                                // The payment failed -- ask your customer for a new payment method.

                            } else {
                                // The payment has succeeded.
                                window.location.href = "applepay-transaction";
                            }
                        });
                    } else {
                        // The payment has succeeded.
                        window.location.href = "applepay-transaction";
                    }
                }
            });
        });
        // Stript Scripts 

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                var cardexpirymonth = $('.card-expiry-month').val().split('/')[0];
                var cardexpireyear = $('.card-expiry-month').val().split('/')[1];
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: cardexpirymonth,
                    exp_year: cardexpireyear
                }, stripeResponseHandler);
            }

        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }


    });
</script>

</html>
