<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Invoice</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        .invoice-title h2, .invoice-title h3 {
            display: inline-block;
        }

        .table > tbody > tr > .no-line {
            border-top: none;
        }

        .table > thead > tr > .no-line {
            border-bottom: none;
        }

        .table > tbody > tr > .thick-line {
            border-top: 2px solid;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>Invoice</h2>
                <h3 class="pull-right">Order # {{ $order_details->id }} </h3><br>
                <span class="pull-right">
                    <?php
                    echo DNS1D::getBarcodeHTML( $order_details->id, 'C39');
                    ?>
                </span><br>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Billed To:</strong><br>
                        {{ $order_details->user->name }}<br>
                        {{ $order_details->user->mobile }}<br>
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Shipped To:</strong><br>
                        {{ $order_details->first_name .' '.$order_details->last_name}}<br>
                        {{ $order_details->division }},
                        {{ $order_details->district }},
                        {{ $order_details->zip_code }}<br>
                        {{ $order_details->address }}<br>
                        {{ $order_details->mobile }}
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Payment Method:</strong><br>
                        {{ $order_details->payment_gateway }}<br>
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Order Date:</strong><br>
                        {{ date('M d, Y', strtotime($order_details->created_at)) }}<br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <td><strong>Item</strong></td>
                                <td class="text-center"><strong>Price</strong></td>
                                <td class="text-center"><strong>Quantity</strong></td>
                                <td class="text-right"><strong>Totals</strong></td>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            <?php
                            $total = 0;
                            ?>
                            @foreach($order_details->order_products as $product)
                                <tr>
                                    <td>
                                        Name : {{ \Illuminate\Support\Str::limit($product->product_name, 45) }}<br>
                                        Code : {{ $product->product_code }}<br>
                                        Size : {{ $product->product_size }}<br>
                                        Color : {{ $product->product_color }}
                                        <p style="height: 10px; width: 10px">
                                            <?php
                                            echo DNS1D::getBarcodeHTML($product->product_code, 'C39');
                                            ?>
                                        </p>
                                    </td>
                                    <td class="text-center">&#2547; {{ $product->product_price }}</td>
                                    <td class="text-center">{{ $product->product_qty }}</td>
                                    <td class="text-right">&#2547; {{ $product->product_qty * $product->product_price }}</td>
                                </tr>
                                <?php
                                $total +=  $product->product_qty * $product->product_price;
                                ?>
                            @endforeach

                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                <td class="thick-line text-right">&#2547; {{ $total }}</td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Shipping</strong></td>
                                <td class="no-line text-right">&#2547; {{ $order_details->shipping_charges }}</td>
                            </tr>
                            @if($order_details->coupon_code)
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong> Discount</strong></td>
                                    <td class="no-line text-right"> - &#2547; {{ $order_details->coupon_amount }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Grand Total</strong></td>
                                <td class="no-line text-right">&#2547; {{ $order_details->grand_total }}</td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
