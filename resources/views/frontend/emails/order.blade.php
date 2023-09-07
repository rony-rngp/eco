<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .table  {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .table tr  {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .table th {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .table td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <table width="100%">
        <tr><td>&nbsp;</td></tr>
        <tr><td>Flipmart</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Hello {{ $name }},</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Thank you for shopping up. Your order details ar as bellow :- </td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Order no: #{{ $order_details->id }} </td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>

            <table class="table" style="width: 90%;text-align: center" cellpadding="5" cellspacing="5" bgcolor="white">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Code</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Qty</th>
                    <th>Price</th>
                </tr>
                </thead>

                <tbody>
                @foreach($order_details->order_products as $product)
                    <?php $link_product = \App\Model\Product::select(['id', 'slug'])->where('id', $product->product_id)->first(); ?>
                    <tr>
                        <td><a href="{{ route('single.product', [$link_product->id, $link_product->slug]) }}">{{ $product->product_name }}</a></td>
                        <td>{{ $product->product_code}}</td>
                        <td>{{ $product->product_color }}</td>
                        <td>
                            @if($product->product_size)
                                {{ $product->product_size }}
                            @else
                                <i>Null</i>
                            @endif
                        </td>
                        <td>{{ $product->product_qty }}</td>
                        <td>&#2547; {{ $product->product_price }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5" align="right">Shipping Charges</td>
                    <td>&#2547; {{ $order_details->shipping_charges }}</td>
                </tr>
                <tr>
                    <td colspan="5" align="right">Coupon Discount</td>
                    <td>
                        @if($order_details->coupon_amount)
                            &#2547; {{ $order_details->coupon_amount }}
                        @else
                            <i>&#2547; 0</i>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="5" align="right">Grand Total</td>
                    <td>&#2547; {{ $order_details->grand_total }}</td>
                </tr>
                </tbody>
            </table>
        </td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>
            <table class="table" cellpadding="5" cellspacing="5" bgcolor="white" width="50%">
                <tr>
                    <td colspan="2"><strong>Delivery Address</strong></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $order_details->first_name }} {{ $order_details->last_name }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ $order_details->address }}</td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>{{ $order_details->country }}</td>
                </tr>
                <tr>
                    <td>Division</td>
                    <td>{{ $order_details->division }}</td>
                </tr>
                <tr>
                    <td>District</td>
                    <td>{{ $order_details->district }}</td>
                </tr>
                <tr>
                    <td>Zip Code</td>
                    <td>{{ $order_details->zip_code }}</td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td>{{ $order_details->mobile }}</td>
                </tr>
            </table>
        </td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>For any enquiries, you can contact us at <a href="mailto:rony.rngp@gmail.com">rony.rngp@gmail.com</a></td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Regards,<br> Team Flipmart</td></tr>
        <tr><td>&nbsp;</td></tr>
    </table>
</body>
</html>
