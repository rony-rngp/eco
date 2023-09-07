@extends('layouts.frontend.app')

@section('title')
    {{ $product->name }}
@endsection

@push('css')

@endpush

@section('content')

    <div class="row single-product">
        @include('layouts.frontend.partial.sidebar')
        <div class="col-md-9">
            <div class="detail-block">
                <div class="row wow fadeInUp">
                    <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                        <div class="product-item-holder size-big single-product-gallery small-gallery">
                            <div id="owl-single-product">
                                @if($product->images->count() == 0)
                                    <div class="single-product-gallery-item" id="slide1">
                                        <a data-lightbox="image-1" data-title="Gallery" href="{{ url($product->main_image) }}">
                                            <img class="img-responsive" alt="" src="{{ url($product->main_image) }}" data-echo="{{ url($product->main_image) }}" />
                                        </a>
                                    </div>
                                @else
                                    @foreach($product->images as $key => $p_image)
                                        <div class="single-product-gallery-item" id="slide1{{ $key }}">
                                            <a data-lightbox="image-1" data-title="Gallery" href="{{ url($p_image->image) }}">
                                                <img class="img-responsive" alt="" src="{{ url($p_image->image) }}" data-echo="{{ url($p_image->image) }}" />
                                            </a>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                            <div class="single-product-gallery-thumbs gallery-thumbs">
                                <div id="owl-single-product-thumbnails">
                                    @if($product->images->count() == 0)
                                        <div class="item">
                                            <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                                                <img class="img-responsive" width="85" alt="" src="{{ url($product->main_image) }}" data-echo="{{ url($product->main_image) }}" />
                                            </a>
                                        </div>
                                     @else
                                        @foreach($product->images as $key => $p_image)
                                            <div class="item">
                                                <a class="horizontal-thumb {{ $key == 0 ? 'active' : '' }}" data-target="#owl-single-product" data-slide="{{ $key }}" href="#slide1{{ $key }}">
                                                    <img class="img-responsive" width="85" alt="" src="{{ url($p_image->image) }}" data-echo="{{ url($p_image->image) }}" />
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-7 product-info-block">
                        <div class="product-info">
                            <h1 class="name">{{ $product->name }}</h1>
                            <div class="rating-reviews m-t-20">
                                <div class="row">
                                    <div class="col-sm-3"><div class="rating rateit-small"></div></div>
                                    <div class="col-sm-8">
                                        <div class="reviews"><a href="#" class="lnk">(13 Reviews)</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="stock-container info-container m-t-10">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="stock-box"><span class="label">Availability :</span></div>
                                    </div>
                                    <div class="col-sm-9">
                                        @if($total_stocks > 0)
                                            <div class="stock-box inStock"><span class="value">In Stock</span></div>
                                        @else
                                            <div class="stock-box"><span class="value">Sold Out</span></div>
                                        @endif
                                            <div class="stock-box slodOut" style="display: none"><span class="value">Sold Out</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="description-container m-t-20">
                                {!!  Str::limit($product->description, 231) !!}
                            </div>
                            <form action="{{ route('add.cart') }}" method="post">
                                @csrf

                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                <div class="price-container info-container m-t-20">
                                    <div class="row">
                                        <?php
                                            $discounted_product_price = \App\Model\Product::getDiscountedPrice($product->id)
                                        ?>

{{--                                        <input type="hidden" id="hiddenPrice" name="price" value="{{ $discounted_product_price['discounted_price'] > 0 ? $discounted_product_price['discounted_price'] : $product->price }}">--}}

{{--                                        <input type="hidden" id="hiddendiscount" name="discount" value="{{ $discounted_product_price['discounted_percentage'] > 0 ? $discounted_product_price['discounted_percentage'] : 0 }}">--}}

                                        <div class="col-sm-6 getAttrprice">
                                            @if($discounted_product_price['discounted_price'] > 0)
                                                <div class="price-box"><span class="price">&#2547; {{ $discounted_product_price['discounted_price'] }}</span> <span class="price-strike">&#2547; {{ $product->price }}</span></div>
                                            @else
                                                <div class="price-box"><span class="price">&#2547;{{ $product->price }}</span></div>
                                            @endif

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="favorite-button m-t-10">
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#"> <i class="fa fa-heart"></i> </a>
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#"> <i class="fa fa-signal"></i> </a>
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#"> <i class="fa fa-envelope"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                @if($product->attributes->count() > 0)
                                   <div class="row">
                                       <div class="col-md-6">
                                           <label for="attribute_id">Attribute</label>
                                           <select name="attribute_id" class="form-control" required id="getPrice" product-id="{{ $product->id }}">
                                               <option value="">Select</option>
                                               @foreach($product->attributes as $attribute)
                                                   <option value="{{ $attribute->id }}">{{ $attribute->size }}</option>
                                               @endforeach
                                           </select>
                                       </div>
                                   </div>
                                @endif

                                <div class="quantity-container info-container">
                                    <div class="row">
                                        <div class="col-sm-2"><span class="label">Qty :</span></div>
                                        <div class="col-sm-2">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                        <div class="arrow plus gradient">
                                                            <span class="ir"><i class="icon fa fa-sort-asc"></i></span>
                                                        </div>
                                                        <div class="arrow minus gradient">
                                                            <span class="ir"><i class="icon fa fa-sort-desc"></i></span>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="qty" value="1" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-tabs inner-bottom-xs wow fadeInUp">
                <div class="row">
                    <div class="col-sm-3">
                        <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                            <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                            <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                            <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="tab-content">
                            <div id="description" class="tab-pane in active">
                                <div class="product-tab">
                                    <div class="text">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                            </div>
                            <div id="review" class="tab-pane">
                                <div class="product-tab">
                                    <div class="product-reviews">
                                        <h4 class="title">Customer Reviews</h4>
                                        <div class="reviews">
                                            <div class="review">
                                                <div class="review-title">
                                                    <span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span>
                                                </div>
                                                <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-add-review">
                                        <h4 class="title">Write your own review</h4>
                                        <div class="review-table">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th class="cell-label">&nbsp;</th>
                                                        <th>1 star</th>
                                                        <th>2 stars</th>
                                                        <th>3 stars</th>
                                                        <th>4 stars</th>
                                                        <th>5 stars</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="cell-label">Quality</td>
                                                            <td><input type="radio" name="quality" class="radio" value="1" /></td>
                                                            <td><input type="radio" name="quality" class="radio" value="2" /></td>
                                                            <td><input type="radio" name="quality" class="radio" value="3" /></td>
                                                            <td><input type="radio" name="quality" class="radio" value="4" /></td>
                                                            <td><input type="radio" name="quality" class="radio" value="5" /></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="review-form">
                                            <div class="form-container">
                                                <form role="form" class="cnt-form">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputName">Your Name <span class="astk">*</span></label> <input type="text" class="form-control txt" id="exampleInputName" placeholder="" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputSummary">Summary <span class="astk">*</span></label> <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                                <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="action text-right"><button class="btn btn-primary btn-upper">SUBMIT REVIEW</button></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tags" class="tab-pane">
                                <div class="product-tag">
                                    <h4 class="title">Product Tags</h4>
                                    <form role="form" class="form-inline form-cnt">
                                        <div class="form-container">
                                            <div class="form-group"><label for="exampleInputTag">Add Your Tags: </label> <input type="email" id="exampleInputTag" class="form-control txt" /></div>
                                            <button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
                                        </div>
                                    </form>
                                    <form role="form" class="form-inline form-cnt">
                                        <div class="form-group"><label>&nbsp;</label> <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($related_products->count() > 0)
            <section class="section featured-product wow fadeInUp">
                <h3 class="section-title">upsell products</h3>
                <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                    @foreach($related_products as $key => $related_product)
                        <?php
                        $discounted_product_price = \App\Model\Product::getDiscountedPrice($related_product->id)
                        ?>
                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image">
                                        <a href="{{ route('single.product', [$related_product->id,$related_product->slug]) }}"><img src="{{ url($related_product->main_image) }}" alt="" /></a>
                                    </div>
                                    @if($discounted_product_price['discounted_price'] > 0)
                                        <div class="tag new" style="background: #FF7878">
                                            <span>- {{ $discounted_product_price['discounted_percentage'] }}%  </span>
                                        </div>
                                    @endif
                                </div>
                                <div class="product-info text-left">
                                    <h3 class="name"><a href="{{ route('single.product', [$related_product->id,$related_product->slug]) }}">{{ Str::limit($related_product->name, 34) }}</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                                    <div class="product-price">
                                            <span class="price">

                                                @if($discounted_product_price['discounted_price'] > 0)
                                                    &#2547; {{ $discounted_product_price['discounted_price'] }}
                                                    <span class="price-before-discount">&#2547; {{ $related_product->price }}</span>
                                                @else
                                                    &#2547; {{ $related_product->price }}
                                                @endif

                                            </span>
                                    </div><!-- /.product-price -->
                                </div>
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"><i class="fa fa-shopping-cart"></i></button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                            </li>
                                            <li class="lnk wishlist">
                                                <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                                            </li>
                                            <li class="lnk">
                                                <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            @endif
        </div>
        <div class="clearfix"></div>
    </div>



@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $("#getPrice").on('change', function () {
                var attribute_id = $('#getPrice').val();
                var product_id = $('#getPrice').attr("product-id");

                $.ajax({
                    url : "{{ route('get.product.price') }}",
                    type : "POST",
                    data : {attribute_id:attribute_id, product_id:product_id, "_token": "{{ csrf_token() }}"},

                    beforeSend: function() {
                        $('.se-pre-con').show();
                    },

                    success:function (res) {
                        if(res['discounted_attr_price'] > 0){
                            $(".getAttrprice").html('<div class="price-box"><span class="price">&#2547; '+ res['discounted_attr_price']+'</span> <span class="price-strike">&#2547; '+ res['product_main_attr_price']+'</span></div>');
                            $("#hiddenPrice").val(res['discounted_attr_price']);
                            $("#hiddendiscount").val(res['discounted_attr_percentage']);
                        }else{
                            $(".getAttrprice").html('<div class="price-box"><span class="price">&#2547;'+res['product_main_attr_price']+'</span></div>');
                            $("#hiddenPrice").val(res['product_main_attr_price']);
                            $("#hiddendiscount").val(res['discounted_attr_percentage']);
                        }

                        if(res['stock'] == 0){
                            $(".inStock").hide();
                            $(".slodOut").show();
                        }else{
                            $(".inStock").show();
                            $(".slodOut").hide();
                        }

                        $('.se-pre-con').hide();
                    }

                });

            });
        });
    </script>
@endpush
