<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt -- Cansoap</title>
</head>
<body>
        <h5 style="margin: 0; padding:0; margin-left: 10px; margin-top: 20px;">Contact us</h5>
        <h5 style="margin: 0; padding:0; margin-left: 10px;"> Phone : 1-513-222-2222 </h5>
        <h5 style="margin: 0; padding:0; margin-left: 10px;"> Fax : (413) 222-2222 </h5>
            
        <h4 style="margin-bottom: 30px; text-align: center;">Order ID: {{$order->oid}}</h4>

        <h5 style="margin: 0; padding:0; margin-left: 10px;"> Customer Mail Address: </h5>
        <h5 style="margin: 0; padding:0; margin-left: 10px;">  {{$order->address}}, </h5>
        <h5 style="margin: 0; padding:0; margin-left: 10px;">  {{$order->city}}, {{$order->province}} </h5>
        <h5 style="margin: 0; margin-bottom: 30px; padding:0; margin-left: 10px;">  Canada , {{$order->postal}}  </h5>

        <table style="border: 1px solid black; margin-left:auto;margin-right:auto;">
            <thead>
                <tr>
                <th style="padding:5px 30px; text-align: center; border: 1px solid black;">Product</th>
                <th style="padding:5px 30px; text-align: center; border: 1px solid black;">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $item)
                    <tr>
                        <td style="padding:5px 30px; text-align: center; border: 1px solid black;">{{explode(":=", $item)[0]}}</td>
                        <td style="padding:5px 30px; text-align: center; border: 1px solid black;"> {{substr($item, strpos($item, ":=") + 2)}} </td>
                    </tr>
                @endforeach
            </tbody>
            <thead>
                <tr>
                    <th style="padding:5px 30px; text-align: center;">Section</th>
                    <th style="padding:5px 30px; text-align: center;">Price</th>
                </tr>
                <tr>
                    <th style="padding:5px 30px; text-align: center; border: 1px solid black;">Taxes</th>
                    <th style="padding:5px 30px; text-align: center; border: 1px solid black;">${{$order->taxes}}</th>
                </tr>
                <tr>
                    <th style="padding:5px 30px; text-align: center; border: 1px solid black;">Shipping Fee</th>
                    <th style="padding:5px 30px; text-align: center; border: 1px solid black;">${{$order->shipping_fee}}</th>
                </tr>
                <tr>
                    <th style="padding:5px 30px; text-align: center; border: 1px solid black;">Total Cost</th>
                    <th style="padding:5px 30px; text-align: center; border: 1px solid black;">${{$order->total}}</th>
                </tr>
            </thead>
        </table>
</body>
</html>