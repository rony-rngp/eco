<div id="myTabContent" class="tab-content category-list">
    <div class="tab-pane active " id="grid-container">
        <div class="category-product">
            <div class="row">
                @forelse($category_products as $category_product)
                    <div class="col-sm-6 col-md-4 wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="products">
                            <?php
                            $discounted_product_price = \App\Model\Product::getDiscountedPrice($category_product->id)
                            ?>
                            <div class="product">
                                <div class="product-image">
                                    <div class="image">
                                        <a href="{{ route('single.product', [$category_product->id, $category_product->slug]) }}"><img src="{{ url($category_product->main_image) }}" alt=""></a>
                                    </div><!-- /.image -->
                                    @if($discounted_product_price['discounted_price'] > 0)
                                        <div class="tag new" style="background: #FF7878">
                                            <span>- {{ $discounted_product_price['discounted_percentage'] }}%  </span>
                                        </div>
                                    @endif
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="{{ route('single.product', [$category_product->id, $category_product->slug]) }}">{{ Str::limit($category_product->name, 30) }}</a></h3>

                                    <div class="description"></div>

                                    <div class="product-price">
                                            <span class="price">

                                                @if($discounted_product_price['discounted_price'] > 0)
                                                    &#2547; {{ $discounted_product_price['discounted_price'] }}
                                                    <span class="price-before-discount">&#2547; {{ $category_product->price }}</span>
                                                @else
                                                    &#2547; {{ $category_product->price }}
                                                @endif

                                            </span>
                                    </div><!-- /.product-price -->

                                </div><!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <a class="btn btn-primary icon" href="{{ route('single.product', [$category_product->id, $category_product->slug]) }}">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                            </li>

                                            <li class="lnk wishlist">
                                                <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                    <i class="icon fa fa-heart"></i>
                                                </a>
                                            </li>

                                            <li class="lnk">
                                                <a class="add-to-cart" href="detail.html" title="Compare">
                                                    <i class="fa fa-signal"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->
                @empty
                    <div class="col-md-12 x-text text-center" >
                        <h1>Sorry...</h1>
                        <p>We are sorry, the page you've requested is not available. </p>
                        <form role="form" action="{{ route('search.product') }}" method="get" class="outer-top-vs outer-bottom-xs">
                            <input placeholder="Search" name="search" autocomplete="off">
                            <button class="btn-default le-button">Go</button>
                        </form>

                        <button href="{{ url('/') }}"><i class="fa fa-home"></i> Go To Homepage</button>
                    </div>
                @endforelse
            </div><!-- /.row -->
        </div><!-- /.category-product -->

    </div><!-- /.tab-pane -->

    <div class="tab-pane " id="list-container">
        <div class="category-product">

            @forelse($category_products as $category_product)

                <?php
                $discounted_product_price = \App\Model\Product::getDiscountedPrice($category_product->id)
                ?>
                <div class="category-product-inner wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="products">
                        <div class="product-list product">
                            <div class="row product-list-row">
                                <div class="col col-sm-4 col-lg-4">
                                    <div class="product-image">
                                        <div class="image">
                                            <img src="{{ url($category_product->main_image) }}" alt="">
                                        </div>
                                    </div><!-- /.product-image -->
                                </div><!-- /.col -->
                                <div class="col col-sm-8 col-lg-8">
                                    <div class="product-info">
                                        <h3 class="name"><a href="detail.html">{{ $category_product->name }}</a></h3>
                                        <div class="product-price">
                                            @if($discounted_product_price['discounted_price'] > 0)
                                                &#2547; {{ $discounted_product_price['discounted_price'] }}
                                                <span class="price-before-discount">&#2547; {{ $category_product->price }}</span>
                                            @else
                                                &#2547; {{ $category_product->price }}
                                            @endif
                                        </div><!-- /.product-price -->
                                        <div class="description m-t-10">
                                            {!! \Illuminate\Support\Str::limit($category_product->description, 241) !!}
                                        </div>
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                                    </li>

                                                    <li class="lnk wishlist">
                                                        <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>

                                                    <li class="lnk">
                                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                                            <i class="fa fa-signal"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->

                                    </div><!-- /.product-info -->
                                </div><!-- /.col -->
                            </div><!-- /.product-list-row -->
                            @if($discounted_product_price['discounted_price'] > 0)
                                <div class="tag new" style="background: #FF7878">
                                    <span>- {{ $discounted_product_price['discounted_percentage'] }}%</span>
                                </div>
                            @endif
                        </div><!-- /.product-list -->
                    </div><!-- /.products -->
                </div><!-- /.category-product-inner -->
                @endforeach


        </div><!-- /.category-product -->
    </div><!-- /.tab-pane #list-container -->
</div><!-- /.tab-content -->
