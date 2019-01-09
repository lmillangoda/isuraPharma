<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - #123</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }

        * {
            font-family: Verdana, Arial, sans-serif;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .invoice table {
            margin: 15px;
        }

        .invoice h3 {
            margin-left: 15px;
        }

        .information {
            background-color: #60A7A6;
            color: #FFF;
        }

        .information .logo {
            margin: 5px;
        }

        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h3>Cashier : {{$bill->cashier->fName}}</h3>
                <pre>

<br/><br/>
Timestamp: {{$bill->created_at}}
                    Payment: Cash
</pre>


            </td>

            <td align="right" style="width: 40%;">

                <h3>Isura Pharmacies (Pvt.) Ltd.</h3>
                <pre>
                    Contact Us:

                    0715698741
                    Kuliyapitiya
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>Invoice specification {{$bill->id}}</h3>
    <table width="100%">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Amount</th>
            <th scope="col">Cost</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->medicalName}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->pivot->amount}}</td>
                <td>{{$product->pivot->cost}}</td>
            </tr>
        @endforeach
        </tbody>

        <tfoot>
        <tr>
            <td colspan="1"></td>
            <td align="left">Total</td>
            <td align="left" class="gray">{{$total}}LKR</td>
        </tr>
        </tfoot>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} TeamSparrow - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                Isura Pharmacies - For all your medical needs
            </td>
        </tr>

    </table>
</div>
</body>
</html>
