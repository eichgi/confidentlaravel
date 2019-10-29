<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice | Confident Laravel (#{{ $order->id }})</title>

    <style>
        body {
            margin: 1em;
            font-size: 12px;
            font-family: DejaVu Sans, sans-serif;
        }

        h1 {
            position: absolute;
        }

        h3 {
            margin: 0;
            padding: 10px 5px;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 5px;
        }

        #meta {
            width: 100%;
            margin-bottom: 3em;
        }

        #meta thead th, #meta td {
            border: 2px solid #333;
            text-align: center;
        }

        #meta thead th:first-child {
            border: 0;
        }

        #payee, #payer {
            float: left;
            height: 12em;
            width: 40%;
        }

        #payer {
            float: right;
        }

        #payee header, #payer header {
            border: 2px solid #333;
        }

        address {
            padding: 10px 5px;
        }

        section {
            clear: both;
            padding-top: 3em;
        }

        #line-items {
            width: 100%;
        }

        #line-items tbody td {
            padding: 10px;
        }

        #line-items thead th, #line-items tbody td {
            border-bottom: 2px solid #333;
        }

        #line-items tfoot th {
            text-align: right;
        }

        #line-items tr.space th, #line-items tr.space td {
            padding-bottom: 30px;
        }

        #line-items tfoot tr:last-child td:last-child {
            border: 2px solid #333;
        }

        #line-items tfoot td {
            padding-left: 10px;
        }
    </style>
</head>
<body>

<h1>Invoice</h1>

<table id="meta">
    <thead>
    <tr>
        <th style="width: 60%">&nbsp;</th>
        <th style="width: 25%">Purchased</th>
        <th>Order</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th>&nbsp;</th>
        <td>{{ $order->created_at->format('F j, Y') }}</td>
        <td>#{{ $order->id }}</td>
    </tr>
    </tbody>
</table>

<aside id="payee">
    <header>
        <h3>Payee</h3>
    </header>
    <address>
        Pure Concepts, LLC<br>
        712 Breckenridge Lane, Suite 3<br>
        Louisville, KY 40207<br>
        orders@pureconcepts.net
    </address>
</aside>

<aside id="payer">
    <header>
        <h3>Payer</h3>
    </header>
    <address>
        {!! nl2br($billing_information) !!}
    </address>
</aside>

<section>
    <table id="line-items">
        <thead>
        <tr>
            <th style="width: 80%">Kit</th>
            <th style="width: 20%">Amount</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $order->product->name }}</td>
            <td>${{ number_format($order->total, 2) }}</td>
        </tr>
        @foreach($add_ons as $add_on)
        <tr>
            <td>{{ $add_on['name'] }}</td>
            <td>${{ number_format($add_on['total'], 2) }}</td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Total</th>
            <td>${{ number_format($total, 2) }}</td>
        </tr>
        <tr class="space">
            <th>Paid</th>
            <td>${{ number_format($total, 2) }}</td>
        </tr>
        <tr>
            <th>Balance Due</th>
            <td>$0.00</td>
        </tr>
        </tfoot>
    </table>
</section>

</body>
</html>


