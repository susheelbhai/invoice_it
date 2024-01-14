<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tax Invoice</title>
    <style>
        @page {
            margin: 0;
            size: A4;
        }

        * {
            font-family: Arial, Helvetica, sans-serif
        }

        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 18px;
            text-align: center;
            text-decoration: underline;
        }

        h2 {
            font-size: 28px;
            text-align: center;
            margin: 8px;
            padding: 0px;
        }

        h3 {
            font-size: 20px;
            margin: 4px 0;
            padding: 0;
        }

        h4 {
            font-size: 14px;
            margin: 4px 0;
            padding: 0;
        }

        h5 {
            font-size: 12px;
            margin: 4px 0;
            padding: 2px;
        }

        address {
            padding: 0px;
            margin: 0px;
            font-style: normal;
            /* font-weight: bold; */
        }

        .customer_address address {
            margin: 8px 0;
        }

        .container {
            font-size: 12px;
            width: 694px;
            margin: auto
        }

        .text-center {
            text-align: center;
        }

        .border-solid {
            border: solid;
        }

        .row {
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(-1 * var(--bs-gutter-y));
            margin-right: calc(-0.5 * var(--bs-gutter-x));
            margin-left: calc(-0.5 * var(--bs-gutter-x));
        }

        .col-6 {
            flex: 0 0 auto;
            width: 50%;
        }

        .col-12 {
            width: 100%
        }

        .text-bold {
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        #product_table {
            width: 100%;
            /* margin: .2% */
            vertical-align: top;
        }

        #product_table td,
        #product_table th {
            border: solid;
            padding: 12px;
        }

        #product_table thead tr th {
            background-color: rgb(254, 238, 209);
            border-top: none;
        }

        #product_table tbody tr td {
            vertical-align: top
        }

        #bank_table {
            margin: 20px 0 20px 12px;
        }

        .payment_div,
        .company_address,
        .customer_address {
            padding: 8px;
        }

        .payment_div td {
            padding: 4px 0;
        }

        th {
            text-align: left
        }

        .authorised_sign {
            display: block;
            text-align: right;
            padding-right: 12px
        }

        .declearation{
            font-size: 12px;
            margin: 24px 0 12px 0;
        }
        .amount_in_words td  {
            font-size: 12px;
            padding: 24px 0 12px 12px;
        }

        .amount {
            text-align: right;
        }
        .amount_in_words{
            border-left: solid; border-right: solid
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1> Tax Invoice </h1>
        <h5 class="text-bold text-right">
            @if ($copy == 'original')
                Original for Recipient
            @else
                Duplicate for Supplier
            @endif
        </h5>

        <div class="main_div">
            <table class="company_div border-solid text-center">
                <tbody>
                    <tr>
                        <td colspan="2" style="padding: 12px">
                            <h2> {{ $data['business_name'] }} </h2>
                            <address>
                                {{ $data['business_address'] }} <br>
                                {{ $data['business_city'] }} -
                                {{ $data['business_pin'] }}
                                {{ $data['business_state'] }}
                                {{ $data['businessState']['name'] }}
                            </address>
                            <h5>GSTIN : {{ $data['business_gstin'] }}</h5>
                            <h5>CIN : {{ $data['business_cin'] }}</h5>
                        </td>
                    </tr>

                    <tr>
                        <td class="border-solid" style="width: 55%">
                            <table class="company_address">
                                <tr>
                                    <td style="width: 60%">
                                        <div class="customer_address">
                                            <h3>Bill To</h3>
                                            <h4>{{ $data['customer_name'] }}</h4>
                                            <address>
                                                {{ $data['customer_address'] }},
                                                {{ $data['customer_city'] }} -
                                                {{ $data['customer_pin'] }},
                                                {{ $data['customerState']['name'] }}
                                            </address>
                                            <table>
                                                <tr>
                                                    <th style="width: 15%">GSTIN/UIN </th>
                                                    <td> : {{ $data['customer_gstin'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>State </th>
                                                    <td> :
                                                        {{ $data['customerState']['name'] . ', Code: ' . sprintf('%02d', $data['customerState']['id']) }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>

                                </tr>

                            </table>
                        </td>
                        <td class="border-solid" style="width: 45%">
                            <table class="payment_div">
                                <tr>
                                    <th>Invoice No.</th>
                                    <td>{{ $data['invoice_number'] }}</td>
                                </tr>
                                <tr>
                                    <th>Invoice Date</th>
                                    <td>{{ App\Helpers\Helper::customDate($data['invoice_date']) }}</td>
                                </tr>
                                <tr>
                                    <th>Mode /Terms of Payment</th>
                                    <td>Credit</td>
                                </tr>
                                <tr>
                                    <th>Reverse Charge:</th>
                                    <td>No</td>
                                </tr>
                                <tr>
                                    <th>Supply Type</th>
                                    @if ($data['business_state_id'] == $data['customer_state_id'])
                                        <td>Intra-State</td>
                                    @else
                                        <td colspan="1"> Inter-State </td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Place of Supply: </th>
                                    <td> {{ $data['customerState']['name'] . ', Code: ' . sprintf('%02d', $data['customerState']['id']) }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="product_div">
                <table id="product_table">
                    <thead>
                        <tr>
                            <th>
                                Description of Services
                            </th>
                            <th>
                                HSN / SAC
                            </th>
                            <th>
                                Unit Price
                            </th>
                            <th>
                                Qty
                            </th>
                            <th>
                                Taxable Value
                            </th>
                            @if ($data['business_state_id'] == $data['customer_state_id'])
                                <th>SGST Amount</th>
                                <th>CGST Amount</th>
                            @else
                                <th colspan="1"> IGST Amount </th>
                            @endif
                            <th> Amount </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['products'] as $i)
                            <tr>
                                <td style="width:50%; padding-bottom:240px">
                                    {{ $i['name'] }} <br>
                                    {{ $i['description'] }}
                                </td>
                                <td> {{ $i['hsn_code'] }}</td>
                                <td>{{ App\Helpers\Helper::customMoneyFormat($i['sale_price']) }}</td>
                                <td>{{ $i['quantity'] }}</td>
                                <td>{{ App\Helpers\Helper::customMoneyFormat($i['sale_price'] * $i['quantity']) }}</td>
                                @if ($data['business_state_id'] == $data['customer_state_id'])
                                    <td class="amount">
                                        {{ $i['gst_percentage'] * 0.5 }}%
                                        <br>
                                        {{ App\Helpers\Helper::customMoneyFormat($i['sale_price'] * $i['gst_percentage'] * 0.005) }}
                                    </td>
                                    <td class="amount">
                                        {{ $i['gst_percentage'] * 0.5 }}%
                                        <br>
                                        {{ App\Helpers\Helper::customMoneyFormat($i['sale_price'] * $i['gst_percentage'] * 0.005) }}
                                    </td>
                                @else
                                    <td class="amount" colspan="1">
                                        {{ $i['gst_percentage'] }}%
                                        <br>
                                        {{ App\Helpers\Helper::customMoneyFormat($i['sale_price'] * $i['gst_percentage'] * 0.01) }}
                                    </td>
                                @endif
                                <td>
                                    {{ App\Helpers\Helper::customMoneyFormat($i['sale_price'] * (1 + 0.01 * $i['gst_percentage'])) }}
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            @if ($data['business_state_id'] == $data['customer_state_id'])
                                <td colspan="7">Total</td>
                            @else
                                <td colspan="6">Total</td>
                            @endif
                            <td class="amount">
                                {{ App\Helpers\Helper::customMoneyFormat($i['sale_price'] * (1 + 0.01 * $i['gst_percentage'])) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="other_div">
                <table>
                    <tr class="amount_in_words" style="">
                        <td colspan="2">
                            <h4>Amount in words </h4>
                            <span>
                                {{ App\Helpers\Helper::rupeesInWord($i['sale_price'] * (1 + 0.01 * $i['gst_percentage'])) }}
                            </span>
                            <div class="declearation">
                                We declare that this invoice shows the actual price of the services described and that
                                all particulars are true and correct.
                            </div> <br>
                        </td>
                    </tr>
                    <tr style="border: solid">
                        <td style="width: 70%">

                            <table id="bank_table">

                                <tr>
                                    <td colspan="2">
                                        <h4>Bank Detail:</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Name of the Bank </td>
                                    <td> : {{ $data['bank_name'] }} </td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"> Account Holder Name </td>
                                    <td> : {{ $data['bank_account_holder_name'] }} </td>
                                </tr>
                                <tr>
                                    <td> Account Number </td>
                                    <td> : {{ $data['bank_account_number'] }} </td>
                                </tr>
                                <tr>
                                    <td> IFSC Code </td>
                                    <td> : {{ $data['bank_ifsc'] }} </td>
                                </tr>
                                <tr>
                                    <td> Swift Code </td>
                                    <td> : {{ $data['bank_swift'] }} </td>
                                </tr>
                            </table>

                        </td>
                        <td style="border: solid">

                            <div class="authorised_sign">
                                <h5>For {{ $data['business_name'] }}</h5>

                                <img src="{{ asset('seal3.png') }}" width="72px" style="margin-right: 48px;">
                                <img src="{{ asset('sign2.png') }}" width="126px" style="margin-top: -14px">
                                <h5 style="margin-top: -8px">Authorised signatory</h5>

                            </div>


                        </td>
                    </tr>
                </table>

            </div>

        </div>

    </div>

</body>

</html>
