<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOB</title>
    <style>
        .invoice-address {
            text-align: center;
            font-size: 1.875rem;
            color: #1A1A1A;
        }

        .invoice-member-info-container {
            white-space: nowrap;
            display: flex;
            /* margin-right: 1rem; */
        }

        .invoice-company-address-grid-cols1-container {
            display: flex;
            justify-content: end;
        }

        .invoice-title-div {
            margin-bottom: 7em;
            margin-top: 2rem;
        }

        .invoice-title {
            color: #1A1A1A;
            font-size: 4.5rem;
            font-weight: bold;
        }

        .invoice-company-address {
            /* margin-right: 3rem; */

            font-weight: bold;
            font-size: 1.875rem;
            color: #1A1A1A;
        }

        .invoice-company-addres-div {
            display: flex;
            width: 35%;
            /* margin-right: 2rem; */

            @media screen and (max-width: 1280px) {
                width: 25%;
            }

            @media screen and (max-width: 768px) {
                width: 40%;
            }

            @media screen and (max-width: 767px) {
                width: 100%;
            }
        }

        .invoice-company-addres-div1 {
            width: 60%;

            @media screen and (max-width: 1280px) {
                width: 75%;
            }

            @media screen and (max-width: 768px) {
                width: 60%;
            }

            @media screen and (max-width: 767px) {
                width: 100%;
            }
        }

        .invoice-company-name {
            font-size: 1.875rem;
            font-weight: bold;
            color: #1A1A1A;
        }

        .invoice-company-name-location {
            width: 49%;
            font-size: 1.875rem;
            color: #1A1A1A;

            @media screen and (max-width: 1280px) {
                width: 33.333%;
            }
        }

        .invoice-company-address-grid {
            /* display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            margin-bottom: 1rem; */
            display: flex;

            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .invoice-company-address-grid-cols {
            /* grid-column: span 3 / span 3;
            display: flex; */

            /* @media only screen and (max-width: 768px) {
                display: flex;
            } */
            display: flex;
            width: 60%;
            /* margin-right: 2rem; */
        }

        .invoice-company-address-grid-cols1 {
            /* grid-column: span 1 / span 1; */
            /* margin-right: 2rem; */
            width: 40%;
            font-size: 1.875rem;
            color: #1A1A1A;
        }

        .invoice-bill-container {
            display: flex;
            width: 60%;

            @media only screen and (max-width: 768px) {
                display: flex;
            }
        }

        .invoice-bill-div {
            display: flex;

            @media screen and (max-width: 1280px) {
                width: 25%;
            }

            @media screen and (max-width: 768px) {
                width: 40%;
            }

            @media screen and (max-width: 767px) {
                width: 100%;
            }
        }

        .invoice-bill-billded-text {
            font-size: 1.875rem;
            color: #1A1A1A;
            font-weight: bold;
        }

        .invoice-bill-address-div {
            @media only screen and (max-width: 1280px) {
                width: 75%;
            }

            @media screen and (max-width: 768px) {
                width: 60%;
            }

            @media screen and (max-width: 767px) {
                width: 100%;
            }
        }

        .invoice-member-name {
            font-size: 1.875rem;
            color: #1A1A1A;
            font-weight: bold;
        }

        .invoice-member-address {
            font-size: 1.875rem;
            color: #1A1A1A;

            @media screen and (max-width: 768px) {
                width: 33.333%;
            }
        }

        .invoice-totalcost-container {
            display: flex;
            justify-content: end;
            width: 100%;
        }

        .invoice-totalcost-div {
            margin-bottom: 0.75em;
            background-color: rgba(246, 246, 246, 0.6);
            width: 60%;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            border: 5px solid #707070;
            padding-left: 2rem;
            padding-right: 2rem;
            margin-top: 4rem;
        }

        .invoice-total-due {
            font-size: 1.5rem;
            color: #1A1A1A;
        }

        .invoice-total-cost {
            margin-bottom: 1.5rem;
            color: #1A1A1A;
            font-size: 2.25rem;
            font-weight: bold;
        }

        .invoicetable {
            width: 100%;
            border-collapse: collapse;
        }

        .invoicetable th {

            border: 2px solid #707070;
        }

        .invoicetable td {
            border: 2px solid #707070;
        }

        .invoicetable-th1 {
            text-align: left;
            color: #1A1A1A;
            font-size: 1.5rem;
            font-weight: bold;
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
            padding-left: 2rem;
        }

        .invoicetable-th2 {
            text-align: right;
            color: #1A1A1A;
            font-size: 1.5rem;
            font-weight: bold;
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
            padding-right: 2rem;
        }

        .invoice-subscription-text {
            font-size: 1.875rem;
            color: #1A1A1A;
            font-weight: bold;
            padding-left: 2rem;
            padding-bottom: 2rem;
        }

        .invoice-subscription-text1 {
            font-size: 1.875rem;
            color: #1A1A1A;
            padding-left: 1rem;
            padding-left: 2rem;
            padding-bottom: 2rem;
        }

        .invoice-table-cost {
            text-align: center;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            font-size: 1.875rem;
            color: #1A1A1A;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
        }

        .invoice-total-cost-container {
            width: 100%;
            margin-top: 3rem;
            justify-content: space-between;

            @media only screen and (max-width: 768px) {
                display: flex;
            }
        }

        .invoice-total-cost-container-div1 {
            @media only screen and (max-width: 768px) {
                width: 60%;
            }

            @media screen and (max-width: 767px) {
                width: 100%;
            }
        }

        .invoice-total-cost-container-div2 {
            display: flex;
            justify-content: end;
            display: -webkit-flex;
            -webkit-justify-content: end;
            margin-right: 4rem;

            @media screen and (max-width: 768px) {
                width: 40%;
                justify-content: space-around;
            }

            @media screen and (max-width: 767px) {
                width: 100%;
                justify-content: space-between;
            }
        }

        .invoice-total-div1 {
            margin-right: 10rem;
            font-size: 1.875rem;
            color: #1A1A1A;
            font-family: Arial, Helvetica, sans-serif;
        }

        .invoice-total-div2 {
            text-align: right;
            font-size: 1.875rem;
            color: #1A1A1A;
            font-family: Arial, Helvetica, sans-serif;
        }

        .invoice-container {
            position: relative;
            background-image: url("./img/invoice/invoicebg.png");
            background-repeat: no-repeat;
            background-position: center center;
            background-size: contain;
            padding-left: 13.5%;
            padding-right: 13.5%;
            margin-top: 7em;
            margin-bottom: 5em;
        }

        .background-image-container {
            width: 100%;
            position: absolute;
            top: 160%;
            left: 113%;
            transform: translate(-100%, -100%);
        }

        .invoice-address-text {
            margin-bottom: 7rem;
            display: flex;
            justify-content: center;
        }

        .invoice-logo {
            display: flex;
            justify-content: center;
            margin-bottom: 0.5rem;
        }

        .invoice-logo img {
            width: auto;
        }

        .invoice-padding {
            padding-right: 1rem;
        }

    </style>
    <style media="all and (max-width: 1920px)">
        .invoice-company-addres-div {
            /* margin-right: 0; */
        }

        .invoice-company-address-grid-cols1 {}

        .invoice-padding {
            margin-right: 0;
        }

    </style>
    <style media="all and (max-width: 1680px)">
        .invoice-company-addres-div {
            width: 40%;
        }

        .invoice-padding {
            margin-right: 2rem;
        }

        .invoice-company-address-grid-cols1 {}

    </style>
    <style media="all and (max-width: 1440px)">
        .invoice-company-addres-div {
            /* margin-right: 4rem; */
        }

        .invoice-company-addres-div {
            /* margin-right: 4rem; */
        }

        .invoice-company-address-grid-cols1 {
            justify-content: end;
        }

        .invoice-company-address-grid {
            display: flex;
        }

    </style>
    <style media="all and (max-width: 1560px)">
        .background-image-container {
            width: 100%;
            position: absolute;
            top: 177%;
            left: 102%;
            transform: translate(-100%, -100%);
        }

    </style>
    <style media="all and (max-width: 1367px)">
        .invoice-company-address-grid-cols {
            width: 100%;
        }

        .invoice-company-addres-div {
            /* margin-right: 6rem; */
        }

        .invoice-company-address-grid {
            flex-direction: column;
        }

        .invoice-company-address-grid-cols1-container {
            justify-content: start;
        }

        .invoice-company-addres-div {
            /* margin-right: 6rem; */
        }

        .invoice-company-address-grid-cols1 {
            width: 100%;

        }

        .invoice-totalcost-container {
            padding-bottom: 0.75em;
            display: flex;
            justify-content: start;
            width: 100%;
        }

    </style>
    <style media="all and (max-width: 1280px)">
        .invoice-company-addres-div {
            width: 25%;
        }

        .invoice-company-addres-div1,
        .invoice-bill-address-div {
            width: 75%;
        }

        .invoice-company-name-location {
            width: 33.333%;
        }

        .invoice-bill-div {
            width: 25%;
        }

    </style>
    <style media="all and (max-width: 768px)">
        .invoice-logo img {
            width: 50vw;
        }

        .invoice-company-address,
        .invoice-company-name,
        .invoice-company-name-location,
        .invoice-padding,
        .invoice-member-info,
        .invoice-total-due,
        .invoice-total-cost,
        .invoicetable-th1,
        .invoicetable-th2,
        .invoice-subscription-text,
        .invoice-subscription-text1,
        .invoice-table-cost,
        .invoice-total-div1,
        .invoice-total-div2 {
            font-size: 1.5rem;
        }

        .invoice-title {
            text-align: center;
            font-size: 2.5rem;
        }

        .invoice-company-addres-div {
            /* margin-right: 0; */
        }

        .invoice-company-address-grid-cols {
            margin-bottom: 2em;
        }

        .invoice-company-addres-div {
            width: 35%;
        }

        .invoice-company-addres-div1,
        .invoice-bill-address-div {
            width: 60%;
        }

        .invoice-company-name-location {
            width: 100%;
        }

        .invoice-bill-div {
            width: 40%;
        }

        .invoice-bill-container,
        .invoice-total-cost-container {
            display: flex;
        }

    </style>
    <style media="all and (max-width: 767px)">
        .invoice-address-text {
            margin-bottom: 0;
        }

        .invoice-title-div {
            margin-bottom: 3em;
        }

        .invoice-title {
            font-size: 2.5rem;
        }

        .invoice-logo img {
            width: 50vw;
        }

        .invoice-totalcost-div {
            width: 100%;
        }

        .invoice-company-addres-div {
            /* margin-right: 0; */
        }

        .invoice-company-addres-div,
        .invoice-total-cost-container {
            width: 100%;
        }

        .invoice-bill-container {
            display: flex;
            flex-direction: column;
        }

        .invoice-company-addres-div1,
        .invoice-bill-address-div {
            width: 100%;
        }

        .invoice-company-name-location {
            width: 100%;
        }

        .invoice-bill-div {
            width: 100%;
        }

        .invoice-total-cost-container-div2 {}

        .invoice-container {

            padding-left: 5%;
            padding-right: 5%;
        }

        .invoice-company-address-grid-cols {
            flex-direction: column;
        }

    </style>
    <style media="all and (max-width: 360px)">
        .invoice-logo img {
            width: 50vw;
        }

        .invoice-company-address-grid-cols,
        .invoice-member-info-container {
            flex-direction: column;
        }

    </style>
    <style media="all and (max-width: 320px)">
        .invoice-company-address-grid-cols,
        .invoice-member-info-container {
            flex-direction: column;
        }

    </style>
</head>

<body class="" style="font-family: Arial, Helvetica, sans-serif;">
    <div class="invoice-container" style="position: relative;z-index: 100;">
        <div>
            <div class="invoice-logo">
                <img src="{{ asset('/img/invoice/invoicelogo.svg') }}" />
            </div>
            <div class="invoice-address-text">
                <p class="invoice-address">201 Eton Tower, 8 Hysan Avenue, Causeway Bay, Hong Kong</p>
            </div>
            <div class="invoice-title-div">
                <p class="invoice-title">Invoice</p>
            </div>
            <div class="invoice-company-address-grid">
                <div class="invoice-company-address-grid-cols">
                    <div class="invoice-company-addres-div">
                        <div class="invoice-company-address">Company address:</div>
                    </div>
                    <div class="invoice-company-addres-div1 ">
                        <div class="invoice-company-name">Lobahn Technology Limited
                        </div>
                        <div class="invoice-company-name-location">201 Eton Tower,
                            8 Hysan Avenue,
                            Causeway Bay,
                            Hong Kong</div>
                    </div>
                </div>
                <div class="invoice-company-address-grid-cols1">
                    <div class="invoice-company-address-grid-cols1-container">
                        <div class="invoice-member-info-container">
                            <div class="">
                                <div style="font-weight: bold;white-space: nowrap;" class="invoice-padding">Member ID:
                                </div>
                                <div style="font-weight: bold;white-space: nowrap;" class="invoice-padding">Invoice#:
                                </div>
                                <div style="font-weight: bold;white-space: nowrap;" class="invoice-padding">Invoice
                                    Date:
                                </div>
                            </div>
                            <div class="" style="width: 50%;">
                                <div class="invoice-member-info">{{ $id }}</div>
                                <div class="invoice-member-info">{{ $invoice->invoice_num }}</div>
                                <div class="invoice-member-info">{{ date('M d, Y', strtotime($invoice->created_at)) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="invoice-company-address-grid">
                <div class="invoice-company-address-grid-cols">
                    <div class="invoice-company-addres-div">
                        <div class="invoice-company-address">Billed to:</div>
                    </div>
                    <div class="invoice-company-addres-div1 ">
                        <div class="invoice-company-name">{{ $client_name }}
                        </div>
                        <div class="invoice-company-name-location">
                            <div>{{ $address }}</div>
                            <div>New Territories</div>
                            <div>Hong Kong</div>
                        </div>
                    </div>
                </div>
                <div class="invoice-company-address-grid-cols1" style="margin-right: 0;">
                    <div class="invoice-totalcost-container">
                        <div class="invoice-totalcost-div ">
                            <div class="invoice-total-due">Total Due (HKD)</div>
                            <div class="invoice-total-cost ">${{ $amount }}</div>
                            <div class="invoice-total-due ">Due Date</div>
                            <div class="invoice-total-cost">{{ date('M d, Y', strtotime($due_date)) }}</div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="" style="margin-top: 1rem;overflow-x: auto;">
                <table id="invoicetable" class="invoicetable">
                    <tr style="background-color: rgba(246, 246, 246,0.6);">
                        <th style="margin-right: 4em;" class="invoicetable-th1">ITEM</th>
                        <th style="margin-right: 4em;" class="invoicetable-th2 ">TOTAL</th>
                    </tr>
                    <tr>
                        <td style="padding-top: 0.75rem;padding-bottom: 0.75rem;" class="">
                            <div class="">
                                <div style="margin-right: 4em;" class="invoice-subscription-text">
                                    {{ $invoice->package->package_title }}
                                    Subscription -
                                    Career Partner™
                                </div>
                                <div style="margin-right: 4em;" class="invoice-subscription-text1">Charge for:
                                    {{ date('d M y', strtotime($start_date)) }} -
                                    {{ date('d M y', strtotime($due_date)) }}</div>
                            </div>
                        </td>
                        <td class="invoice-table-cost ">HK$1,900.00</td>
                    </tr>
                </table>
                <div class="invoice-total-cost-container">
                    <div class="invoice-total-cost-container-div1"></div>
                    <div class="invoice-total-cost-container-div2">
                        <div class="invoice-total-div1">
                            <div class="">Subtoal</div>
                            <div class="">GST</div>
                            <div style="font-weight: bold;" class="">Total Due</div>
                        </div>
                        <div class="invoice-total-div2">
                            <div style="white-space: nowrap;" class="">HK${{ $amount }}</div>
                            <div style="white-space: nowrap;" class="">$ 0.00</div>
                            <div style="white-space: nowrap;" class="">HK${{ $amount }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
