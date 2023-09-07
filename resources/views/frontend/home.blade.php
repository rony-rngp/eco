@extends('layouts.frontend.app')

@section('title', 'Home')

@push('css')

@endpush

@section('content')

    <div class="row">
    <!-- ============================================== SIDEBAR ============================================== -->
    @include('layouts.frontend.partial.sidebar')
    <!-- ============================================== SIDEBAR : END ============================================== -->

    <!-- ============================================== CONTENT ============================================== -->
    <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
        <!-- ========================================== SECTION – HERO ========================================= -->
        <div id="hero">
            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                <div class="item" style="background-image: url({{ asset('public/frontend') }}/assets/images/sliders/01.jpg);">
                    <div class="container-fluid">
                        <div class="caption bg-color vertical-center text-left">
                            <div class="slider-header fadeInDown-1">Top Brands</div>
                            <div class="big-text fadeInDown-1">
                                New Collections
                            </div>

                            <div class="excerpt fadeInDown-2 hidden-xs">

                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>

                            </div>
                            <div class="button-holder fadeInDown-3">
                                <a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
                            </div>
                        </div><!-- /.caption -->
                    </div><!-- /.container-fluid -->
                </div><!-- /.item -->

                <div class="item" style="background-image: url({{ asset('public/frontend') }}/assets/images/sliders/02.jpg);">
                    <div class="container-fluid">
                        <div class="caption bg-color vertical-center text-left">
                            <div class="slider-header fadeInDown-1">Spring 2016</div>
                            <div class="big-text fadeInDown-1">
                                Women <span class="highlight">Fashion</span>
                            </div>

                            <div class="excerpt fadeInDown-2 hidden-xs">

                                <span>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</span>

                            </div>
                            <div class="button-holder fadeInDown-3">
                                <a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
                            </div>
                        </div><!-- /.caption -->
                    </div><!-- /.container-fluid -->
                </div><!-- /.item -->



            </div><!-- /.owl-carousel -->
        </div>

        <!-- ========================================= SECTION – HERO : END ========================================= -->

        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
            <div class="more-info-tab clearfix ">
                <h3 class="new-product-title pull-left">New Products</h3>
            </div>

            <div class="tab-content outer-top-xs">
                <div class="tab-pane in active" id="all">
                    <div class="product-slider">
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                            @foreach($new_products as $new_product)
                                <?php
                                $discounted_product_price = \App\Model\Product::getDiscountedPrice($new_product->id)
                                ?>
                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="{{ route('single.product', [$new_product->id, $new_product->slug]) }}"><img  src="{{ url($new_product->main_image) }}" alt=""></a>
                                                </div><!-- /.image -->

                                                @if($discounted_product_price['discounted_price'] > 0)
                                                    <div class="tag new" style="background: #FF7878">
                                                        <span>- {{ $discounted_product_price['discounted_percentage'] }}%</span>
                                                    </div>
                                                @endif
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="{{ route('single.product', [$new_product->id, $new_product->slug]) }}">{{ Str::limit($new_product->name, 22) }}</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>

                                                <div class="product-price">
                                                    <span class="price">
                                                       @if($discounted_product_price['discounted_price'] > 0)
                                                            &#2547; {{ $discounted_product_price['discounted_price'] }}
                                                            <span class="price-before-discount">&#2547; {{ $new_product->price }}</span>
                                                        @else
                                                            &#2547; {{ $new_product->price }}
                                                        @endif
                                                    </span>
                                                </div><!-- /.product-price -->

                                            </div><!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <a data-toggle="tooltip" class="btn btn-primary icon" href="{{ route('single.product', [$new_product->id, $new_product->slug]) }}" title="Add Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </a>
                                                            <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                                        </li>

                                                        <li class="lnk wishlist">
                                                            <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist">
                                                                <i class="icon fa fa-heart"></i>
                                                            </a>
                                                        </li>

                                                        <li class="lnk">
                                                            <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare">
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                        </div><!-- /.product -->
                                    </div><!-- /.products -->
                                </div><!-- /.item -->
                            @endforeach
                        </div><!-- /.home-owl-carousel -->
                    </div><!-- /.product-slider -->
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
        </div><!-- /.scroll-tabs -->
        <!-- ============================================== SCROLL TABS : END ============================================== -->
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <div class="wide-banner cnt-strip">
                        <div class="image">
                            <img class="img-responsive" src="{{ asset('public/frontend') }}/assets/images/banners/home-banner1.jpg" alt="">
                        </div>

                    </div><!-- /.wide-banner -->
                </div><!-- /.col -->
                <div class="col-md-5 col-sm-5">
                    <div class="wide-banner cnt-strip">
                        <div class="image">
                            <img class="img-responsive" src="{{ asset('public/frontend') }}/assets/images/banners/home-banner2.jpg" alt="">
                        </div>

                    </div><!-- /.wide-banner -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.wide-banners -->

        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">Featured products</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                @foreach($featured_products as $featured_product)
                    <?php
                    $discounted_product_price = \App\Model\Product::getDiscountedPrice($featured_product->id)
                    ?>
                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">
                                <div class="product-image">
                                    <div class="image">
                                        <a href="{{ route('single.product', [$featured_product->id, $featured_product->slug]) }}"><img  src="{{ $featured_product->main_image }}" alt=""></a>
                                    </div><!-- /.image -->

                                    @if($discounted_product_price['discounted_price'] > 0)
                                        <div class="tag new" style="background: #FF7878">
                                            <span>- {{ $discounted_product_price['discounted_percentage'] }}</span>
                                        </div>
                                    @endif
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="{{ route('single.product', [$featured_product->id, $featured_product->slug]) }}">{{ Str::limit($featured_product->name, 22) }}</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">
                                        <span class="price">
                                            @if($discounted_product_price['discounted_price'] > 0)
                                                &#2547; {{ $discounted_product_price['discounted_price'] }}
                                                <span class="price-before-discount">&#2547; {{ $featured_product->price }}</span>
                                            @else
                                                &#2547; {{ $featured_product->price }}
                                            @endif
                                        </span>

                                    </div><!-- /.product-price -->

                                </div><!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <a data-toggle="tooltip" class="btn btn-primary icon" href="{{ route('single.product', [$featured_product->id, $featured_product->slug]) }}" title="Add Cart">
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
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->
                        </div><!-- /.products -->
                    </div><!-- /.item -->
                @endforeach
            </div><!-- /.home-owl-carousel -->
        </section><!-- /.section -->
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">

                <div class="col-md-12">
                    <div class="wide-banner cnt-strip">
                        <div class="image">
                            <img class="img-responsive" src="{{ asset('public/frontend') }}/assets/images/banners/home-banner.jpg" alt="">
                        </div>
                        <div class="strip strip-text">
                            <div class="strip-inner">
                                <h2 class="text-right">New Mens Fashion<br>
                                    <span class="shopping-needs">Save up to 40% off</span></h2>
                            </div>
                        </div>
                        <div class="new-label">
                            <div class="text">NEW</div>
                        </div><!-- /.new-label -->
                    </div><!-- /.wide-banner -->
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.wide-banners -->
        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->

        <!-- ============================================== BLOG SLIDER ============================================== -->
        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
            <h3 class="section-title">latest form blog</h3>
            <div class="blog-slider-container outer-top-xs">
                <div class="owl-carousel blog-slider custom-carousel">

                    <div class="item">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <div class="image">
                                    <a href="blog.html"><img src="{{ asset('public/frontend') }}/assets/images/blog-post/post1.jpg" alt=""></a>
                                </div>
                            </div><!-- /.blog-post-image -->


                            <div class="blog-post-info text-left">
                                <h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3>
                                <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                                <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                <a href="#" class="lnk btn btn-primary">Read more</a>
                            </div><!-- /.blog-post-info -->


                        </div><!-- /.blog-post -->
                    </div><!-- /.item -->


                    <div class="item">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <div class="image">
                                    <a href="blog.html"><img src="{{ asset('public/frontend') }}/assets/images/blog-post/post2.jpg" alt=""></a>
                                </div>
                            </div><!-- /.blog-post-image -->


                            <div class="blog-post-info text-left">
                                <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                <a href="#" class="lnk btn btn-primary">Read more</a>
                            </div><!-- /.blog-post-info -->


                        </div><!-- /.blog-post -->
                    </div><!-- /.item -->


                    <!-- /.item -->


                    <div class="item">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <div class="image">
                                    <a href="blog.html"><img src="{{ asset('public/frontend') }}/assets/images/blog-post/post1.jpg" alt=""></a>
                                </div>
                            </div><!-- /.blog-post-image -->


                            <div class="blog-post-info text-left">
                                <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                                <a href="#" class="lnk btn btn-primary">Read more</a>
                            </div><!-- /.blog-post-info -->


                        </div><!-- /.blog-post -->
                    </div><!-- /.item -->


                    <div class="item">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <div class="image">
                                    <a href="blog.html"><img src="{{ asset('public/frontend') }}/assets/images/blog-post/post2.jpg" alt=""></a>
                                </div>
                            </div><!-- /.blog-post-image -->


                            <div class="blog-post-info text-left">
                                <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                                <a href="#" class="lnk btn btn-primary">Read more</a>
                            </div><!-- /.blog-post-info -->


                        </div><!-- /.blog-post -->
                    </div><!-- /.item -->


                    <div class="item">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <div class="image">
                                    <a href="blog.html"><img src="{{ asset('public/frontend') }}/assets/images/blog-post/post1.jpg" alt=""></a>
                                </div>
                            </div><!-- /.blog-post-image -->


                            <div class="blog-post-info text-left">
                                <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                                <a href="#" class="lnk btn btn-primary">Read more</a>
                            </div><!-- /.blog-post-info -->


                        </div><!-- /.blog-post -->
                    </div><!-- /.item -->


                </div><!-- /.owl-carousel -->
            </div><!-- /.blog-slider-container -->
        </section><!-- /.section -->
        <!-- ============================================== BLOG SLIDER : END ============================================== -->

        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section wow fadeInUp new-arriavls">
            <h3 class="section-title">New Arrivals</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                @foreach($rand_products as $rand_product)
                    <?php
                    $discounted_product_price = \App\Model\Product::getDiscountedPrice($rand_product->id)
                    ?>
                    <div class="item item-carousel">
                        <div class="products">

                            <div class="product">
                                <div class="product-image">
                                    <div class="image">
                                        <a href="{{ route('single.product', [$rand_product->id, $rand_product->slug]) }}"><img  src="{{ url($rand_product->main_image) }}" alt=""></a>
                                    </div><!-- /.image -->

                                    @if($discounted_product_price['discounted_price'] > 0)
                                        <div class="tag new" style="background: #FF7878">
                                            <span>- {{ $discounted_product_price['discounted_percentage'] }}%</span>
                                        </div>
                                    @endif
                                </div><!-- /.product-image -->


                                <div class="product-info text-left">
                                    <h3 class="name"><a href="{{ route('single.product', [$rand_product->id, $rand_product->slug]) }}">{{ Str::limit($rand_product->name, 22) }}</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="product-price">
                                        @if($discounted_product_price['discounted_price'] > 0)
                                            &#2547; {{ $discounted_product_price['discounted_price'] }}
                                            <span class="price-before-discount">&#2547; {{ $rand_product->price }}</span>
                                        @else
                                            &#2547; {{ $rand_product->price }}
                                        @endif
                                    </div><!-- /.product-price -->

                                </div><!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <a data-toggle="tooltip" class="btn btn-primary icon" href="{{ route('single.product', [$rand_product->id, $rand_product->slug]) }}" title="Add Cart">
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
                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.action -->
                                </div><!-- /.cart -->
                            </div><!-- /.product -->

                        </div><!-- /.products -->
                    </div><!-- /.item -->
                @endforeach
            </div><!-- /.home-owl-carousel -->
        </section><!-- /.section -->
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

    </div><!-- /.homebanner-holder -->
    <!-- ============================================== CONTENT : END ============================================== -->
    </div><!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider wow fadeInUp">

        <div class="logo-slider-inner">
            <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                <div class="item m-t-15">
                    <a href="#" class="image">
                        <img data-echo="{{ asset('public/frontend') }}/assets/images/brands/brand1.png" src="{{ asset('public/frontend') }}/assets/images/blank.gif" alt="">
                    </a>
                </div><!--/.item-->

                <div class="item m-t-10">
                    <a href="#" class="image">
                        <img data-echo="{{ asset('public/frontend') }}/assets/images/brands/brand2.png" src="{{ asset('public/frontend') }}/assets/images/blank.gif" alt="">
                    </a>
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="{{ asset('public/frontend') }}/assets/images/brands/brand3.png" src="{{ asset('public/frontend') }}/assets/images/blank.gif" alt="">
                    </a>
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="{{ asset('public/frontend') }}/assets/images/brands/brand4.png" src="{{ asset('public/frontend') }}/assets/images/blank.gif" alt="">
                    </a>
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="{{ asset('public/frontend') }}/assets/images/brands/brand5.png" src="{{ asset('public/frontend') }}/assets/images/blank.gif" alt="">
                    </a>
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="{{ asset('public/frontend') }}/assets/images/brands/brand6.png" src="{{ asset('public/frontend') }}/assets/images/blank.gif" alt="">
                    </a>
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="{{ asset('public/frontend') }}/assets/images/brands/brand2.png" src="{{ asset('public/frontend') }}/assets/images/blank.gif" alt="">
                    </a>
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="{{ asset('public/frontend') }}/assets/images/brands/brand4.png" src="{{ asset('public/frontend') }}/assets/images/blank.gif" alt="">
                    </a>
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="{{ asset('public/frontend') }}/assets/images/brands/brand1.png" src="{{ asset('public/frontend') }}/assets/images/blank.gif" alt="">
                    </a>
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="{{ asset('public/frontend') }}/assets/images/brands/brand5.png" src="{{ asset('public/frontend') }}/assets/images/blank.gif" alt="">
                    </a>
                </div><!--/.item-->
            </div><!-- /.owl-carousel #logo-slider -->
        </div><!-- /.logo-slider-inner -->

    </div><!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->

@endsection

@push('js')

@endpush
