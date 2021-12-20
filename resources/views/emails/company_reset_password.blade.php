<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<style>
    body{ 
        background-color: #f1f3f3;
        font-family: 'Ubuntu', sans-serif;
        font-size: 13px;
    }
    
    div.content{ 
        background-color: #f1f3f3;
        width: 600px; 
        margin: 0 auto;
        padding: 20px; 
    }
    
    h1.footer-title{ 
        font-size: 14px; 
        margin-bottom: 30px; 
        font-weight: bold; 
        text-align: center; 
        text-transform: 
        uppercase;margin-bottom: 10px;
    }
    a.btn-black { 
        width: 250px; 
        padding: 15px
        color: #fff
        text-transform: uppercase
        background: #000
        border: 0;
        margin-bottom: 60px;
        text-decoration: none
    }
    a{ 
        color: #000;
    }
    
    p.company-text{ 
        padding: 30px 0; 
        font-style: italic; 
    }
    div.content-footer{ 
        background-color: #d1d1d1; 
        width: 600px; 
        margin: 0 auto; 
        padding: 20px; 
        min-height: 150px; 
    }
    div.footer-div{ 
        float: left; 
        width: 33.33%;}
    p.footer-text{ 
        text-align: center; 
        font-size: 10px; 
        padding-top: 4px;
    }
    ul.footer-social-icon{ 
        list-style: none; 
        float: left; 
        margin: 0; 
        padding: 0; 
        display: block; 
        margin-left: 31px;
    }
    ul.footer-social-icon li{ 
        list-style: none; 
        float: left; 
        margin: 0; 
        padding: 0;
    }
    ul.footer-social-icon li a{ 
        text-decoration: none; 
        padding: 10px;
        color: #000; 
    }
    p.footer-address{ 
        /*text-align: center;
        font-size: 11px;*/ 
    }
    table.gray-bg   { 
        background-color: #FFFFFF;/*#f1f3f3*/
        width: 80%; 
        margin: 0  auto; 
        padding: 50px;
    }
    table.tabel-footer{ 
        background-color: #d1d1d1; 
        width: 80%;
        margin: 0  auto;
        padding: 50px;}
    table.tabel-footer td{ 
        vertical-align: top; 
    }
    table.table-middle  { 
        border-top: 1px solid #000; 
        border-left: 1px solid #000; 
        width: 100%;
    }
    table.table-middle td, table.table-middle th{ 
        border-bottom: 1px solid #000; 
        border-right: 1px solid #000; 
        margin: 0px; 
        padding: 10px;
    }
    table{ 
        width: 100%; 
        border-spacing: 0;
    }
    table.orderstatustbl td{ 
        padding: 10px;  
    }
    /*--New CSS---*/
    .email-logo{ 
        width: 170px; 
        height: auto; 
        margin: 0 auto; 
        text-align: center; 
        display: block; 
        /*padding-top: 50px;*/ 
        margin-bottom: 0px;
    }
    .check-logo{ 
        width: 50px;
        height: auto;
        margin: 0 auto;
        text-align: center;
        display: block;
        padding-top: 21px;
    }
    td.order-title{
        text-align: center;
        padding-top:18px;
    }
    td.order-title p{
        font-size: 16px;
        font-weight: 700;
    }
    h1.header-one{ 
        font-size: 13px; 
        /*margin-bottom: 30px;*/
        font-weight: normal;
    }
    p{ 
        margin: 0; 
        font-size: 13px; 
        margin-bottom: 7px; 
        font-weight: normal; 
    }
    .td-title{
        color: #2670E0;
        font-weight: 700;
    }
    .inv-company{
        /*padding-top: 21px;*/
        padding: 21px 21px 0;
    }
    .inv-company .inv-title{
        color: #EF476F;
    }
    .desc-tbl thead{
        background: #06D6A0;
        border: none;
        font-size: 15px;
        font-weight: bold;
    }
    .desc-tbl{
        font-family:'Ubuntu', sans-serif !important;
    }
    .desc-tbl td{
        /*padding: .5rem .5rem;*/
        padding: .75rem;
        background-color: var(--bs-table-bg);
        border-bottom-width: 1px;
        box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
    }
    .desc-tbl tr:nth-child(even){
        background-color: #ddd;
    }
    .desc-tbl tr.total{
        background: none;
    }
    .desc-tbl tr.total td{
        background: #2670e0;
        color: #FFFFFF;
        font-size: 15px;
        font-weight: bold;
        font-family: 'Ubuntu';
        padding: .5rem;
    }
    .desc-tbl tr.total td:first-child{
        float: right;
        background: #2670e0;
    }
    .invoice-detail-tbl td {
        padding: 5px 2em 0px 0px;
        /* line-height: 1.5; */
    }
    .footer-child-tbl{
        text-align: center;
    }
    .tbl-footer-address{
        padding-top: 21px;      
    }
    .tbl-footer-address td:first-child{
        /*float: right;
        margin: 0 7em;*/
        padding: 0 4em;
    }
    td.order-mail{
        padding: 25px 21px 0;
    }
    .invoice-detail-tbl td{
        padding: 0 21px;
    }
    .mail-link a{
    	color: #2670e0;
    	top: 10px;
    	bottom: 10px;
    	position: relative;
    }
    .mail-link{
    	padding: 0 21px 21px;
    }
    .footer-child-tbl a img{
        width: 30px;
        height: auto;
    }
    .footer-child-tbl td{
        padding: 10px 0 18px;
    }
</style>
</head>
<body>
<table>	
    <table class="gray-bg" style="background-color: #FFFFFF;width: 80%;margin: 0  auto;padding: 50px 50px 0;">
        <tr>
            <td class="center" style="text-align: center;">
                <img src="{{ asset('images/lobahn-black.svg') }}" alt="logo" class="email-logo" style="width: 170px;height: auto;margin: 0 auto;text-align: center;display: block;margin-bottom: 0px;">
            </td>
        </tr>
        <tr>
            <td class="order-mail" style="padding: 0 21px;">
                <h1 class="header-one" style="font-size: 13px;font-weight: normal;font-family: 'Ubuntu', sans-serif;">Hello,</h1>
                <p style="font-family: 'Ubuntu', sans-serif;font-size: 13px;">We've recieved a request to reset your password. If you didn't make the request, just ignore this email. Otherwise, you can reset your password using this link:</p>
                <p style="font-family: 'Ubuntu', sans-serif;font-size: 13px;">This password reset link will expire in 180 minutes. If you did not request a password reset, no further action is required.</p>
            </td>
        </tr>
        <tr>
            <td class="mail-link" style="padding: 0 21px 21px;">
                <p style="font-family: 'Ubuntu', sans-serif;font-size: 13px;">You can manually click the link below.</p>
                <a href="{{ $url ?? ''}}" style="font-family: 'Ubuntu', sans-serif;font-size: 13px;color: #2670e0;top: 10px;bottom: 10px;position: relative;" target="_blank">{{ $url ?? ''}}</a>
            </td>
        </tr>  
    </table>

    <table class="footer-child-tbl" style="background-color: #d1d1d1;width: 80%;margin: 0  auto;padding: 19px 0 0;">
        <tr>
            <td class="center" style="text-align: center;">
                <a href="#" target="_blank">
                    <img src="{{ asset('images/mail-fb.svg') }}" alt="Facebook" class="social-icon" style="width: 30px;height: auto;">
                </a>&nbsp;&nbsp;
                <a href="#" target="_blank">
                    <img src="{{ asset('images/mail-twitter.svg') }}" alt="Twitter" class="social-icon" style="width: 30px;height: auto;">
                </a>&nbsp;&nbsp;
                <a href="#" target="_blank">
                    <img src="{{ asset('images/mail-linkin.svg') }}" alt="Linkin" class="social-icon" style="width: 30px;height: auto;">
                </a>&nbsp;&nbsp;
                <a href="#" target="_blank">
                    <img src="{{ asset('images/mail-instragram.svg') }}" alt="Instragram" class="social-icon" style="width: 30px;height: auto;">
                </a>
            </td>
        </tr>
        <tr>
            <td class="center" style="vertical-align: top;text-align: center;">
                <p class="footer-address" style="font-size: 13px;font-family: 'Ubuntu',sans-serif;color: #2c363a;">
                    <b>Lobahn Technology Limited</b><br>
                    +852 9151 4706<br>
                    201 Eton Tower, 8 Hysan Avenue<br/>
                    Causeway Bay, Hong Kong<br>
                    Office Hour: Mon-Fri(9am-6pm)
                </p>
            </td>
        </tr>
    </table>
</body>
</html>