@extends('layouts.frontend.app')

@section('title')
    Checkout
@endsection

@push('css')

@endpush

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>



    <div class="row single-product" >

        @if(totalCartItems() != 0)
            <form action="{{ route('checkout') }}" method="post" onsubmit="return checkForm(this);">
                @csrf
                <div class="shopping-cart">
                    <div class="table-responsive">
                        <table class="table" style="background: #FFFFFF; border: 1px solid #DDDDDD;border-collapse: collapse;width: 100%">
                            <tbody>
                            <tr>
                                <th style=" border: 1px solid #DDDDDD; padding: 15px;"> DELIVERY ADDRESS </th>
                                <th style=" border: 1px solid #DDDDDD;  padding: 15px;"><a href="{{ route('add.delivery.address') }}" class="btn btn-sm btn-success">Add Delivery Address</a></th>
                            </tr>

                            @forelse($delivery_addresses as $delivery_address)
                            <tr>
                                <td style=" border: 1px solid #DDDDDD; padding: 15px;">
                                    <div style="float: left; margin-top: -1px; margin-right: 5px">
                                        <input type="radio" name="address_id" value="{{ $delivery_address->id }}" shipping_charges="{{ $delivery_address->shipping_charges }}" total="{{ $total }}" coupon_amount="{{ Session::get('coupon_amount') }}">
                                    </div>
                                    <div>
                                        <label>
                                            {{ $delivery_address->first_name }} {{ $delivery_address->last_name }}, {{ $delivery_address->address }},
                                            {{ $delivery_address->country }}, {{ $delivery_address->division }}, {{ $delivery_address->district }}, {{ $delivery_address->zip_code }}, &nbsp;{{ $delivery_address->mobile }}
                                        </label>
                                    </div>
                                </td>
                                <td style=" border: 1px solid #DDDDDD; padding: 15px;">
                                    <a class="btn btn-sm btn-info" href="{{ route('edit.delivery.address', $delivery_address->id) }}">Edit</a>
                                    <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete it?');" href="{{ route('delete.delivery.address', $delivery_address->id) }}">Delete</a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="2" style=" border: 1px solid #DDDDDD; padding: 15px;">

                                        <div style="text-align: center">
                                            <h4 style="color: red"><i><b>You need to add delivery address..Please added new delivery address..</b></i></h4>
                                        </div>
                                    </td>

                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="shopping-cart">

                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="cart-description item">Image</th>
                                    <th class="cart-product-name item">Product Name</th>
                                    <th class="cart-qty item">Quantity</th>
                                    <th class="cart-sub-total item">Unit Price</th>
                                    <th class="cart-total last-item">Discount</th>
                                    <th class="cart-total last-item">Total</th>
                                </tr>
                                </thead><!-- /thead -->

                                <tbody>
                                <?php
                                $total = 0;
                                ?>
                                @foreach($contents as $content)
                                    <?php
                                    $product = \App\Model\Product::find($content->id);
                                    if ($product == null){
                                        Session::forget('coupon_amount');
                                        Session::forget('coupon_code');
                                        Session::forget('grand_total');
                                        \Gloudemans\Shoppingcart\Facades\Cart::destroy();
                                        header("Refresh:0");
                                        notify()->error('Something went to wrong! Please try again');
                                    }else{
                                        $attribute = \App\Model\ProductAttribute::where(['product_id' => $product->id, 'id' => $content->options->attribute_id])->first();
                                    }
                                    ?>
                                    <tr>
                                        <td class="cart-image">
                                            <a class="entry-thumbnail" href="#">
                                                <img src="{{ url($product->main_image) }}" alt="">
                                            </a>
                                        </td>
                                        <td class="cart-product-name-info">
                                            <h4 class="cart-product-description"><a href="#">{{ Str::limit($product->name, 22) }}</a></h4>
                                            <div class="cart-product-info">
                                                <span class="product-color">COLOR:<span>{{ $product->color }}</span></span>
                                                @if(!empty($attribute))
                                                    <br> <span class="product-color">SIZE:<span>{{ $attribute->size }}</span></span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="cart-product-quantity">
                                            {{ $content->qty }}
                                        </td>
                                        @if($content->options->attribute_id)
                                            <?php
                                            $discounted_attr_price = \App\Model\Product::getDiscountedAttrPrice($content->id, $content->options->attribute_id);
                                            $d_price = $discounted_attr_price['discounted_attr_price'];
                                            if($d_price > 0){
                                                $price = $discounted_attr_price['discounted_attr_price'];
                                            }else{
                                                $price = $discounted_attr_price['product_main_attr_price'];
                                            }
                                            $percentage = $discounted_attr_price['discounted_attr_percentage'];
                                            ?>
                                        @else
                                            <?php
                                            $discounted_product_price = \App\Model\Product::getDiscountedPrice($content->id);
                                            $d_price = $discounted_product_price['discounted_price'];
                                            if($d_price > 0){
                                                $price = $discounted_product_price['discounted_price'];
                                            }else{
                                                $price = $discounted_product_price['product_main_price'];
                                            }
                                            $percentage = $discounted_product_price['discounted_percentage'];
                                            ?>
                                        @endif

                                        <td class="cart-product-sub-total"><span class="cart-sub-total-price">&#2547; {{ $price }} </span></td>
                                        <td class="cart-product-grand-total"><span class="cart-grand-total-price">{{ $percentage }}%</span></td>
                                        <td class="cart-product-grand-total"><span class="cart-grand-total-price">&#2547; {{ $price*$content->qty }}</span></td>
                                    </tr>
                                    <?php
                                    $total += $price*$content->qty;
                                    ?>
                                @endforeach
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div>
                    </div><!-- /.shopping-cart-table -->


                    <div class="col-md-8 col-sm-12 estimate-ship-tax">
                        <div class="table table-responsive table-bordered">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="control-label"><strong>PAYMENT METHODS : </strong></label>
                                                <hr style="margin-top: 8px;margin-bottom: 8px">
                                                <div>
                                                    <input type="radio" name="payment_gateway" id="COD" value="COD">&nbsp;<label for="COD">COD</label> &nbsp;&nbsp;
                                                    <input type="radio" name="payment_gateway" id="SSLCommerz" value="SSLCommerz">&nbsp;<label for="SSLCommerz">SSLCommerz</label>&nbsp;&nbsp;
                                                    <input type="radio" name="payment_gateway" id="Stripe" value="Stripe">&nbsp;<label for="Stripe">Stripe</label>&nbsp;&nbsp;
                                                    <input type="radio" name="payment_gateway" id="Paypal" value="Paypal">&nbsp;<label for="Paypal">Paypal</label>&nbsp;&nbsp;
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.estimate-ship-tax -->


                    <div class="col-md-4 col-sm-12 cart-shopping-total">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal<span class="inner-left-md">&#2547; <span class="totalAmount">{{ totalAmount() }}</span></span>
                                    </div>
                                    <div class="cart-sub-total">
                                        Coupon Discount<span class="inner-left-md">&#2547; <span class="coupon_amount">{{ Session::get('coupon_amount') ? Session::get('coupon_amount') : 0 }}</span></span>
                                    </div>
                                    <div class="cart-sub-total">
                                        Shipping Charges<span class="inner-left-md">&#2547; <span class="shipping_charges">0</span></span>
                                    </div>
                                    <div class="cart-grand-total">
                                        Grand Total<span class="inner-left-md">&#2547;
                                            <span class="totalAmount total_coupon_amount grand_total">
                                                @if(Session::get('coupon_amount'))
                                                    {{$grand_total = totalAmount() - Session::get('coupon_amount') }}
                                                @else
                                                    {{ $grand_total =  totalAmount() }}
                                                @endif
                                            </span>
                                            <?php
                                                Session::put('grand_total', $grand_total)
                                            ?>
                                        </span>
                                    </div>
                                </th>
                            </tr>
                            </thead><!-- /thead -->
                            <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn text-center">

                                        <input class="btn btn-primary  btn-block" id="myButton" type="submit" value="PLACE ORDER"/>

                                    </div>
                                </td>
                            </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->

                </div>
            </form>
        @else
            <div class="x-page inner-bottom-sm">
                <div class="row">
                    <div class="col-md-12 x-text text-center">
                        <h3>Sorry</h3>
                        <p>Your cart is empty... </p>
                        <form role="form" class="outer-top-vs outer-bottom-xs">
                            <input placeholder="Search" autocomplete="off">
                            <button class="  btn-default le-button">Go</button>
                        </form>
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Return to shop</a>
                    </div>
                </div><!-- /.row -->
            </div>
        @endif
        <div class="clearfix"></div>
    </div>

@endsection

@push('js')
    <script>

        $(document).ready(function () {
            $("input[name=address_id]").bind('change', function () {
                var shipping_charges = $(this).attr("shipping_charges");
                var total = $(this).attr("total");
                var coupon_amount = $(this).attr("coupon_amount");
                if (coupon_amount == ""){
                    coupon_amount = 0;
                }
                var grand_total = parseInt(total) + parseInt(shipping_charges) - parseInt(coupon_amount);
                $(".shipping_charges").html(shipping_charges);
                $(".grand_total").html(grand_total);
            });
        });

        function checkForm(form)
        {
            form.myButton.disabled = true;
            form.myButton.value = "Please wait...";
            return true;

        }

        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>
@endpush
