<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOB</title>
    <style>
        p {
            margin: 0;
        }

        .invoice-main-container {
            padding-left: 5%;
            padding-right: 5%;
            padding-top: 3em;
        }

        .invoice-title-content-container {
            display: flex;
            justify-content: space-between;
        }

        .invoice-title {
            color: #1A1A1A;
            font-size: 72px;
            font-weight: bold;
            color: #FFDB5F;
        }

        .invoice-address {
            font-size: 30px;
            color: #1A1A1A;
            width: 100%;
            padding-top: 1em;
        }

        .invoice-number {
            text-align: right;
            font-size: 30px;
            color: #1A1A1A;
            padding-top: 1em;
        }

        .invoice-description-table {
            margin-top: 0em;
        }

        .invoice-description-table,
        .invoice-price-table {
            border: none;
            width: 100%;
        }

        .invoice-description-table th {
            font-size: 30px;
            color: #FFDB5F;
            font-weight: bold;
            padding-top: 0.5em;
            padding-bottom: 0.5em;
            vertical-align: top;
        }

        .invoice-description-table td {
            vertical-align: top;
        }

        .invoice-description-table tr:nth-child(2) td p:first-child {
            font-size: 30px;
            font-weight: bold;
            color: #1A1A1A;
        }

        .invoice-description-table tr:nth-child(2) td {
            font-size: 30px;
            color: #1A1A1A;
        }

        .invoice-price-table th {
            background-color: #FFDB5F;
            font-size: 24px;
            font-weight: bold;
        }

        .invoice-description-table th,
        .invoice-description-table td,
        .invoice-price-table th,
        .invoice-price-table td {
            text-align: left;
        }

        .invoice-price-table th:first-child {
            border-right: 1px solid #fff;
        }

        .invoice-price-table th {
            padding: 1rem 3rem;
        }

        .invoice-price-table td {
            padding: 1.5rem 3rem;
        }

        .invoice-price-table td p:first-child,
        .invoice-price-table td:last-child {
            font-weight: bold;
            font-size: 30px;
            color: #1A1A1A;
        }

        .invoice-price-table td p,
        .invoice-price-table td {
            font-size: 30px;
            color: #1A1A1A;
        }

        .invoice-price-table-container {
            margin-top: 0em;
        }

        .invoice-price-table tr:not(:first-child) td,
        .invoice-price-table tr:not(:last-child) td {
            border: 1px solid #707070;
        }

        .invoice-price-table tr:not(:last-child) td:last-child {
            text-align: center;
        }

        .invoice-price-table tr:last-child th:last-child {
            text-align: right;
        }

        .invoice-price-table tr td:last-child,
        .invoice-price-table tr th:last-child {
            width: 20%;
        }

        .invoice-price-table tr:last-child td {
            border: none;
        }

        .invoice-price-table tr:last-child td:first-child {
            display: flex;
            justify-content: end;
        }

        .price-container {
            display: flex;
            justify-content: center;
        }

        .price-container {
            font-weight: normal;
        }

        .invoice-price-table {
            border-collapse: collapse;
            margin-top: 1em;
        }

        .invoice-price-table tr:last-child td:last-child {
            text-align: right;
        }

        .invoice-total-cost-container {
            display: flex;
            justify-content: end;
            margin-top: 1em;
        }

        .invoice-total-div1 {
            margin-right: 2rem;
        }

    </style>
</head>

<body class="" style="font-family: Arial, Helvetica, sans-serif;">
    <div class="invoice-main-container">
        <div class="invoice-title-content-container">
            <div>
                <div class="invoice-logo">
                    <img src="{{ asset('img/invoice/invoicelogo.svg') }}" />
                </div>
                <div class="invoice-address-text">
                    <p class="invoice-address">201 Eton Tower, 8 Hysan Avenue,<br /> Causeway Bay, Hong Kong</p>
                </div>
            </div>
            <div class="invoice-title-div">
                <p class="invoice-title">Invoice</p>
                <p class="invoice-number">#{{ $invoice->invoice_num }}</p>
            </div>
        </div>
        <div>
            <table class="invoice-description-table">
                <tr>
                    <th>Billed to:</th>
                    <th>Invoice Date</th>
                    <th>Member ID</th>
                    <th>Due Date</th>
                </tr>
                <tr>
                    <td>
                        <p>{{ $client->name }}</p>
                        <p>{{ $client->email }}</p>
                        <p>{{ $client->phone }}</p>
                    </td>
                    <td>{{ date('d M Y', strtotime($start_date)) }}</td>
                    <td>#{{ $id }}</td>
                    <td>{{ date('M d, Y', strtotime($due_date)) }}</td>
                </tr>
            </table>
        </div>
        <div class="invoice-price-table-container">
            <table class="invoice-price-table">
                <tr>
                    <th>PACKAGE</th>
                    <th>PRICE</th>
                </tr>
                <tr>
                    <td>
                        <p>{{ $invoice->package->package_title }}</p>
                        <p>Charge for: {{ date('d M Y', strtotime($start_date)) }} -
                            {{ date('M d, Y', strtotime($due_date)) }}</p>
                    </td>
                    <td>HK${{ number_format($amount) }}.00</td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <div class="">Subtoal</div>
                            <div class="">GST</div>
                            <div style="font-weight: bold;" class="">Total Due</div>
                        </div>
                    </td>
                    <td>
                        <div class="price-container">
                            <div>
                                <div style="white-space: nowrap;" class="">
                                    HK${{ number_format($amount) }}.00</div>
                                <div style="white-space: nowrap;" class="">$ 0.00</div>
                                <div style="white-space: nowrap;" class="">
                                    HK${{ number_format($amount) }}.00</div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
