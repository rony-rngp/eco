<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        @if(Auth::check())
                        <li><a href="{{ route('user.account') }}"><i class="icon fa fa-user"></i>My Account</a></li>
                        @endif
                        <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                        <li><a href="{{ route('show.cart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                        <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>
                        <li>
                            @if(Auth::check())
                                <a href="logout"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="icon fa fa-lock"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                             @else
                                <a href="{{ route('login.register') }}"><i class="icon fa fa-lock"></i>Login/Register</a>
                            @endif
                        </li>
                    </ul>
                </div><!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>

                        <li class="dropdown dropdown-small">
                            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">English </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                            </ul>
                        </li>
                    </ul><!-- /.list-unstyled -->
                </div><!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div><!-- /.header-top-inner -->
        </div><!-- /.container -->
    </div><!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo">
                        <a href="{{ url('/') }}">

                            <img src="{{ asset('public/frontend') }}/assets/images/logo.png" alt="">

                        </a>
                    </div><!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->				</div><!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form action="{{ route('search.product') }}" method="get">
                            <div class="control-group">

                                <input class="search-field" name="search" value="{{ @$search }}" autocomplete="off" placeholder="Search here..." />

                                <button type="submit" class="search-button" href="#" ></button>

                            </div>
                        </form>
                    </div><!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->				</div><!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart">
                        <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket">
                                    <i class="glyphicon glyphicon-shopping-cart"></i>
                                </div>
                                <div class="basket-item-count totalCartItems"><span class="count">{{ totalCartItems() }}</span></div>
                                <div class="total-price-basket">
                                    <span class="lbl">cart -</span>
                                    <span class="total-price">
						            <span class="sign"></span><span class="value totalAmount"> {{ totalAmount() }}</span></span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="cart-item product-summary contents">
                                    @forelse(Cart::content() as $content)
                                        <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image">
                                                <a href="#"><img src="{{ url($content->options->image) }}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-xs-8">
                                            <h3 class="name"><a href="#">{{ Str::limit($content->name, 15) }}</a></h3>

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


                                            <div class="price">&#2547; {{ $price }}</div>
                                        </div>

                                    </div>
                                     @empty
                                        <div>Your cart is empty.</div>
                                    @endforelse
                                </div><!-- /.cart-item -->
                                <div class="clearfix"></div>
                                <hr>

                                <div class="clearfix cart-total">
                                    <div class="pull-right">

                                        <span class="text">Sub Total :</span><span class='price totalAmount'>&#2547; {{ totalAmount() }}</span>

                                    </div>
                                    <div class="clearfix"></div>

                                    @if(totalCartItems() != 0)
                                        <a href="{{ route('show.cart') }}" class="btn btn-upper btn-primary btn-block m-t-20">Show Cart</a>
                                    @else
                                        <a href="{{ url('/') }}" class="btn btn-upper btn-primary btn-block m-t-20">Continue Shopping</a>
                                    @endif
                                </div><!-- /.cart-total-->


                            </li>
                        </ul><!-- /.dropdown-menu-->
                    </div><!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->				</div><!-- /.top-cart-row -->
            </div><!-- /.row -->

        </div><!-- /.container -->

    </div><!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw">
                                    <a href="{{ url('/') }}" data-hover="dropdown" class="dropdown-toggle" >Home</a>
                                </li>







                                @foreach($categories as $key => $category)
                                <li class="dropdown yamm mega-menu">
                                    @if($category->subcategories->count()>0)
                                        <a href="javascript:void(0)" data-hover="dropdown" class="dropdown-toggle">{{ $category->name }}
                                        @if($key==1)
                                            <span class="menu-label hot-menu hidden-xs">hot</span>
                                        @endif
                                        @if($key==2)
                                            <span class="menu-label new-menu hidden-xs">new</span>
                                        @endif
                                        </a>
                                    @else
                                        <a href="{{ route('root.category.product', [$category->id, $category->slug]) }}" data-hover="dropdown" class="dropdown-toggle">{{ $category->name }}
                                        @if($key==1)
                                            <span class="menu-label hot-menu hidden-xs">hot</span>
                                        @endif
                                        @if($key==2)
                                            <span class="menu-label new-menu hidden-xs">new</span>
                                        @endif
                                        </a>
                                    @endif

                                    <ul class="dropdown-menu container">
                                        <li>
                                            @if($category->subcategories->count()>0)
                                                <div class="yamm-content ">
                                                    <div class="row">
                                                        @foreach($category->subcategories as $subcategory)
                                                        <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                            <h2 class="title">{{ $subcategory->name }}</h2>
                                                            <ul class="links">
                                                                @foreach($subcategory->subsubcategories as $subsubcategory)
                                                                <li><a href="{{ route('sub.category.product', [$subsubcategory->id, $subsubcategory->slug]) }}">{{ $subsubcategory->name }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </div><!-- /.col -->
                                                        @endforeach
                                                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                            <img class="img-responsive" height="346" width="240" src="{{ $category->image ? url($category->image) : '' }}" alt="">
                                                        </div><!-- /.yamm-content -->
                                                    </div>
                                                </div>
                                            @endif
                                        </li>
                                    </ul>

                                </li>
                                @endforeach



















                                <li class="dropdown  navbar-right special-menu">
                                    <a href="#">Todays offer</a>
                                </li>


                            </ul><!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div><!-- /.nav-outer -->
                    </div><!-- /.navbar-collapse -->


                </div><!-- /.nav-bg-class -->
            </div><!-- /.navbar-default -->
        </div><!-- /.container-class -->

    </div><!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>
