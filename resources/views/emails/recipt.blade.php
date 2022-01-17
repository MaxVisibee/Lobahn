<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOB</title>
    <style>
        .template-header-container {
            background-color: #1A1A1A;
        }

        .template-header-div {
            display: flex;
            justify-content: space-between;
            padding-left: 10%;
            padding-right: 10%;
            padding-top: 1em;
            padding-bottom: 1em;
        }

        .body-div {
            /* display: flex;
   justify-content: center; */
            width: 50%;
            margin: 0 auto;
        }

        .body-bg-color {
            /* width: 50%; */
            margin: 0;
            background-color: #383838;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .template-white-card {
            background-color: #FFF;
            margin-left: 5%;
            margin-right: 5%;
            font-size: 26px;
            padding-left: 2rem;
            padding-right: 2rem;
            padding-top: 1rem;
            padding-bottom: 1rem;
            margin-top: 3rem;
            margin-bottom: 3rem;
            border-radius: 5px;
        }

        .activate-account-btn {
            background-color: #FFDB5F;
            border: 1px solid #FFDB5F;
            display: inline-block;
            padding: 1rem;
            border-radius: 5px;
            white-space: nowrap;
        }

        .link-underline {
            text-decoration: underline;
            word-break: break-all;
        }

        .text-white-space {
            white-space: normal;
            word-break: break-all;
        }

        .activate-account-btn-div {
            display: flex;
            justify-content: center;
        }

        .text-block {
            line-height: 1.5;
        }

        .text-contact-block {
            line-height: 1.3;
        }

        .text-block p,
        .text-copy-block p,
        .text-contact-block p {
            font-size: 21px;
            margin: 2px 0;
        }

    </style>
    <style media="all and (max-width: 769px)">
        .body-div {
            width: 50%;
        }

    </style>
    <style media="all and (max-width: 768px)">
        .body-div {
            width: 100%;
        }

    </style>
    <style media="all and (max-width: 640px)">
        .body-div {
            width: 100%;
        }

        .template-white-card {
            font-size: 16px;
        }

        .footer-img img {
            width: 30px;
        }

        .text-block p,
        .text-copy-block p {
            font-size: 16px;
        }

        .text-block {
            line-height: 1.3;
        }

        .text-contact-block {
            line-height: 1;
        }

    </style>
    <style>
        .thank-payment-text {
            font-weight: bold;
            text-align: center;
        }

        .infomation-label {
            font-weight: bold;
        }

        a {
            color: #1a1a1a;
        }

    </style>
</head>

<body class="body-div">
    <div class="body-bg-color">
        <div class="template-header-container">
            <div class="template-header-div">
                <div>
                    <img src="{{ asset('/img/emailtemplate/logotemplate.png') }}" />
                </div>
                <div>
                    <img src="{{ asset('/img/emailtemplate/profile.png') }}" />
                </div>
            </div>
        </div>
        <div class="template-white-card">
            <div>
                <p class="thank-payment-text">Thank you for your payment!</p>
            </div>
            <p>
                We have successfully processed payment for your recurring
                @if ($type == 'Corporate') Corporate @else Individual @endif Membership
                ( {{ $plan_name }} )
                subscription to Lobahn Connect™.
            </p>
            <p>
                If you believe this charge to be in error or have any questions, please <a href="#"
                    class="link-underline cursor-pointer">email
                    info@lobahn.com.</a>
            </p>
            <div>
                <div class="info-div">
                    <span class="infomation-label">Invoice #:&nbsp; </span>
                    <span>{{ $invoice_num ?? '' }}</span>
                </div>
                <div class="info-div">
                    <span class="infomation-label">Start:&nbsp;</span>
                    <span>{{ date('M d, Y', strtotime($start_date ?? '')) }}</span>
                </div>
                <div class="info-div">
                    <span class="infomation-label">End:&nbsp;</span>
                    <span>{{ date('M d, Y', strtotime($end_date ?? '')) }}</span>
                </div>
                <div class="info-div">
                    <span class="infomation-label">Total:&nbsp;</span>
                    <span>${{ $amount ?? '' }}</span>
                </div>
            </div>
            <p>You can manage your subscription in
                @if ($type == 'Corporate')
                    <a href="{{ route('company.home') }}" class="link-underline cursor-pointer">Your Account</a>
                @else
                    <a href="{{ route('candidate.dashboard') }}" class="link-underline cursor-pointer">Your
                        Account</a>
                @endif
                page.
            </p>
            <p>- The Lobahn Team</p>
        </div>
        <div style="padding: 10px 50px;background-color:#2F2F2F;">
            <div style="padding:10px 0px 15px;border-bottom: 1px solid #707070;">
                <ul style="text-align: center;padding: 0;">
                    <li style="display: inline-block;padding:0 10px;" class="footer-img">
                        <a href="{{ $site_setting->facebook_address ?? '#' }}" target="_blank">
                            <img src="{{ asset('/img/emailtemplate/facebook.png') }}" />
                        </a>
                    </li>
                    <li style="display: inline-block;padding:0 10px;" class="footer-img">
                        <a href="{{ $site_setting->instagram_address ?? '#' }}" target="_blank">
                            <img src="{{ asset('/img/emailtemplate/instagram-black.png') }}" />
                        </a>
                    </li>
                    <li style="display: inline-block;padding:0 10px;" class="footer-img">
                        <a href="{{ $site_setting->linkedin_address ?? '#' }}" target="_blank">
                            <img src="{{ asset('/img/emailtemplate/linkedin.png') }}" />
                        </a>
                    </li>
                    <li style="display: inline-block;padding:0 10px;" class="footer-img">
                        <a href="{{ $site_setting->twitter_address ?? '#' }}" target="_blank">
                            <img src="{{ asset('/img/emailtemplate/Path 90.png') }}" />
                        </a>
                    </li>
                </ul>
            </div>
            <div style="padding:10px 0px;text-align: center;color: #BABABA;" class="text-block">
                <p>
                    This email was intended for <{{ $name }}>
                </p>
                <p>
                    This is an automated message. Please do not reply.
                </p>
                <p>
                    If you would like to unsubscribe to these emails,
                </p>
                <p>
                    you may <a href="#" style="text-decoration: underline; color: #BABABA;">manage your preferences</a>
                    in
                </p>
                <p>
                    your account settings.
                </p>
            </div>
            <div style="padding:10px 0px;text-align: center;border-top:1px solid #707070;color: #BABABA;"
                class="text-copy-block">
                <p>© 2022 Lobahn Technology Limited. All rights reserved.</p>
                <p style="font-weight: bold;margin-top: 10px;">Mailing Address:</p>
                <div style="margin-top: 10px;text-align: center;" class="text-contact-block">
                    <p>201 Eton Tower</p>
                    <p>8 Hysan Avenue</p>
                    <p>Causeway Bay, Hong Kong</p>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
