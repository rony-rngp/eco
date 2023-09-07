<div class="shopping-cart-table ">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th class="cart-romove item">Remove</th>
                <th class="cart-description item">Image</th>
                <th class="cart-product-name item">Product Name</th>
                <th class="cart-qty item">Quantity</th>
                <th class="cart-sub-total item">Unit Price</th>
                <th class="cart-total last-item">Discount</th>
                <th class="cart-total last-item">Total</th>
            </tr>
            </thead><!-- /thead -->
            <tfoot>
            <tr>
                <td colspan="7">
                    <div class="shopping-cart-btn">
							<span class="">
								<a href="{{ url('/') }}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
							</span>
                    </div><!-- /.shopping-cart-btn -->
                </td>
            </tr>
            </tfoot>
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
                    <td class="romove-item">
                        <a title="cancel" onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('destroy.cart.item',$content->rowId) }}" class="icon"><i class="fa fa-trash-o"></i></a>
                    </td>
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
                        <div class="input-append">
                            <input style="max-width:60px; padding: 5px;" name="qty" value="{{ $content->qty }}" id="appendedInputButtons" size="16" type="text">

                            <button class="btn btnUpdateItem qtyMinus" style="margin-top: -3px" data-cartid="{{ $content->rowId }}" type="button"><i class="fa fa-minus"></i></button>
                            <button class="btn btnUpdateItem qtyPlus" style="margin-top: -3px" data-cartid="{{ $content->rowId }}" type="button"><i class="fa fa-plus"></i></button>
                        </div>
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
