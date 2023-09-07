<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Status Updated</title>
</head>
<body>
<table style="width: 700px">
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Hello {{ $name }}</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Your order status has been updated to <b>{{ $order_details->order_status }}</b>. Your order Details are as below : </td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Order no : #{{ $order_details->id }}</td></tr>
    @if(!empty($tracking_number) && !empty($courier_name))
        <tr><td>&nbsp;</td></tr>
        <tr><td>Courier Name is <b>{{ $courier_name }}</b> and Tracking Number is <b>{{ $tracking_number }}</b>.</td></tr>
    @endif
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td>
            <table style="width: 95%" cellpadding="5" cellspacing="5" bgcolor="#f7f4f4">
                <tr bgcolor="#cccccc">
                    <td>Product Name</td>
                    <td>Product Code</td>
                    <td>Product Color</td>
                    <td>Product Size</td>
                    <td>Product Quantity</td>
                    <td>Product Price</td>
                </tr>

                @foreach($order_details->order_products as $product)
                    <?php $link_product = \App\Model\Product::select(['id', 'slug'])->where('id', $product->product_id)->first(); ?>
                    <tr>
                        <td><a href="{{ route('single.product', [$link_product->id, $link_product->slug]) }}">{{ $product->product_name }}</a></td>
                        <td>{{ $product->product_code }}</td>
                        <td>{{ $product->product_color }}</td>
                        <td>
                            @if($product->product_size)
                                {{ $product->product_size }}
                            @else
                                <i>Null</i>
                            @endif
                        </td>
                        <td>{{ $product->product_qty }}</td>
                        <td>BDT {{ $product->product_price }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5" align="right">Shipping Charges</td>
                    <td>BDT {{ $order_details->shipping_charges }}</td>
                </tr>
                <tr>
                    <td colspan="5" align="right">Coupon Discount</td>
                    <td>BDT {{ $order_details->coupon_amount == '' ? '0' : $order_details->coupon_amount }}</td>
                </tr>
                <tr>
                    <td colspan="5" align="right">Grand Total</td>
                    <td>BDT {{ $order_details->grand_total }}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><strong>Delivery Address :-</strong></td>
                </tr>
                <tr><td>{{ $order_details->first_name }} {{ $order_details->last_name }}</td></tr>
                <tr><td>{{ $order_details->address }}</td></tr>
                <tr><td>{{ $order_details->city }}</td></tr>
                <tr><td>{{ $order_details->state }}</td></tr>
                <tr><td>{{ $order_details->country }}</td></tr>
                <tr><td>{{ $order_details->pin_code }}</td></tr>
                <tr><td>{{ $order_details->mobile }}</td></tr>
                <tr><td>{{ $order_details->email }}</td></tr>
            </table>
        </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>For any enquiries, you can contact us at <a href="mailto:ronyislam6999@gmail.com">ronyislam6999@gmail.com</a></td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Regards <br> Team Developers</td></tr>
    <tr><td>&nbsp;</td></tr>
</table>
</body>
</html>
