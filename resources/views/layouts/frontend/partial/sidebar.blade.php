<div class="col-md-3 sidebar">

    <!-- ================================== TOP NAVIGATION ================================== -->
    @if(@$page_name != 'single_product')
    <div class="side-menu animate-dropdown outer-bottom-xs">
        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
        <nav class="yamm megamenu-horizontal" role="navigation">
            <ul class="nav">
                @foreach($categories as $category)
                <li class="dropdown menu-item">
                    <a href="{{ route('root.category.product',[$category->id, $category->slug]) }}" class="dropdown-toggle"><i class="icon fa fa-shopping-bag"></i>{{ $category->name }}</a>
                 </li><!-- /.menu-item -->
                @endforeach
            </ul><!-- /.nav -->
        </nav><!-- /.megamenu-horizontal -->
    </div><!-- /.side-menu -->
    @endif

    @if(@$page_name == 'index' || @$page_name == 'single_product' || @$page_name == 'search')
    <!-- ================================== TOP NAVIGATION : END ================================== -->

    <!-- ============================================== HOT DEALS ============================================== -->
    <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
        <h3 class="section-title">hot deals</h3>
        <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

            <div class="item">
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image">
                            <img src="{{ asset('public/frontend') }}/assets/images/hot-deals/p25.jpg" alt="">
                        </div>
                        <div class="sale-offer-tag"><span>49%<br>off</span></div>
                        <div class="timing-wrapper">
                            <div class="box-wrapper">
                                <div class="date box">
                                    <span class="key">120</span>
                                    <span class="value">DAYS</span>
                                </div>
                            </div>

                            <div class="box-wrapper">
                                <div class="hour box">
                                    <span class="key">20</span>
                                    <span class="value">HRS</span>
                                </div>
                            </div>

                            <div class="box-wrapper">
                                <div class="minutes box">
                                    <span class="key">36</span>
                                    <span class="value">MINS</span>
                                </div>
                            </div>

                            <div class="box-wrapper hidden-md">
                                <div class="seconds box">
                                    <span class="key">60</span>
                                    <span class="value">SEC</span>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.hot-deal-wrapper -->

                    <div class="product-info text-left m-t-20">
                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                        <div class="rating rateit-small"></div>

                        <div class="product-price">
								<span class="price">
									$600.00
								</span>

                            <span class="price-before-discount">$800.00</span>

                        </div><!-- /.product-price -->

                    </div><!-- /.product-info -->

                    <div class="cart clearfix animate-effect">
                        <div class="action">

                            <div class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                            </div>

                        </div><!-- /.action -->
                    </div><!-- /.cart -->
                </div>
            </div>
            <div class="item">
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image">
                            <img src="{{ asset('public/frontend') }}/assets/images/hot-deals/p5.jpg" alt="">
                        </div>
                        <div class="sale-offer-tag"><span>35%<br>off</span></div>
                        <div class="timing-wrapper">
                            <div class="box-wrapper">
                                <div class="date box">
                                    <span class="key">120</span>
                                    <span class="value">Days</span>
                                </div>
                            </div>

                            <div class="box-wrapper">
                                <div class="hour box">
                                    <span class="key">20</span>
                                    <span class="value">HRS</span>
                                </div>
                            </div>

                            <div class="box-wrapper">
                                <div class="minutes box">
                                    <span class="key">36</span>
                                    <span class="value">MINS</span>
                                </div>
                            </div>

                            <div class="box-wrapper hidden-md">
                                <div class="seconds box">
                                    <span class="key">60</span>
                                    <span class="value">SEC</span>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.hot-deal-wrapper -->

                    <div class="product-info text-left m-t-20">
                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                        <div class="rating rateit-small"></div>

                        <div class="product-price">
								<span class="price">
									$600.00
								</span>

                            <span class="price-before-discount">$800.00</span>

                        </div><!-- /.product-price -->

                    </div><!-- /.product-info -->

                    <div class="cart clearfix animate-effect">
                        <div class="action">

                            <div class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                            </div>

                        </div><!-- /.action -->
                    </div><!-- /.cart -->
                </div>
            </div>
            <div class="item">
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image">
                            <img src="{{ asset('public/frontend') }}/assets/images/hot-deals/p10.jpg" alt="">
                        </div>
                        <div class="sale-offer-tag"><span>35%<br>off</span></div>
                        <div class="timing-wrapper">
                            <div class="box-wrapper">
                                <div class="date box">
                                    <span class="key">120</span>
                                    <span class="value">Days</span>
                                </div>
                            </div>

                            <div class="box-wrapper">
                                <div class="hour box">
                                    <span class="key">20</span>
                                    <span class="value">HRS</span>
                                </div>
                            </div>

                            <div class="box-wrapper">
                                <div class="minutes box">
                                    <span class="key">36</span>
                                    <span class="value">MINS</span>
                                </div>
                            </div>

                            <div class="box-wrapper hidden-md">
                                <div class="seconds box">
                                    <span class="key">60</span>
                                    <span class="value">SEC</span>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.hot-deal-wrapper -->

                    <div class="product-info text-left m-t-20">
                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                        <div class="rating rateit-small"></div>

                        <div class="product-price">
								<span class="price">
									$600.00
								</span>

                            <span class="price-before-discount">$800.00</span>

                        </div><!-- /.product-price -->

                    </div><!-- /.product-info -->

                    <div class="cart clearfix animate-effect">
                        <div class="action">

                            <div class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                            </div>

                        </div><!-- /.action -->
                    </div><!-- /.cart -->
                </div>
            </div>


        </div><!-- /.sidebar-widget -->
    </div>
    <!-- ============================================== HOT DEALS: END ============================================== -->


    <!-- ============================================== NEWSLETTER ============================================== -->
    <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
        <h3 class="section-title">Newsletters</h3>
        <div class="sidebar-widget-body outer-top-xs">
            <p>Sign Up for Our Newsletter!</p>
            <form role="form" action="{{ route('subscriber') }}" id="subscriberForm" method="post">
                @csrf
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                    <span style="color:red">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                </div>
                <button class="btn btn-primary">Subscribe</button>
            </form>
        </div><!-- /.sidebar-widget-body -->
    </div><!-- /.sidebar-widget -->
    <!-- ============================================== NEWSLETTER: END ============================================== -->


        <!-- ============================================== Testimonials============================================== -->
        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
            <div id="advertisement" class="advertisement">
                <div class="item">
                    <div class="avatar"><img src="{{ asset('public/frontend') }}/assets/images/testimonials/member1.png" alt="Image"></div>
                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                    <div class="clients_author">John Doe	<span>Abc Company</span>	</div><!-- /.container-fluid -->
                </div><!-- /.item -->

                <div class="item">
                    <div class="avatar"><img src="{{ asset('public/frontend') }}/assets/images/testimonials/member3.png" alt="Image"></div>
                    <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                    <div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>
                </div><!-- /.item -->

                <div class="item">
                    <div class="avatar"><img src="{{ asset('public/frontend') }}/assets/images/testimonials/member2.png" alt="Image"></div>
                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                    <div class="clients_author">Saraha Smith	<span>Datsun &amp; Co</span>	</div><!-- /.container-fluid -->
                </div><!-- /.item -->

            </div><!-- /.owl-carousel -->
        </div><br><br>

        <!-- ============================================== Testimonials: END ============================================== -->

        @endif

    @if(@$page_name == 'listing')
        <div class="sidebar-widget wow fadeInUp outer-top-vs animated" style="visibility: visible; animation-name: fadeInUp;">
            <h3 class="section-title">Fabric</h3>
            <div class="sidebar-widget-body">
                <div class="compare-report">
                    @foreach($fabric_array as $fabric)
                        <input type="checkbox" class="custom-control-input fabric" id="fabric-{{ $fabric }}" value="{{ $fabric }}" name="fabric[]">&nbsp;
                        <label for="fabric-{{ $fabric }}" class="custom-control-label">{{ $fabric }}</label><br>
                    @endforeach
                </div><!-- /.compare-report -->
            </div><!-- /.sidebar-widget-body -->
        </div>

        <div class="sidebar-widget wow fadeInUp outer-top-vs animated" style="visibility: visible; animation-name: fadeInUp;">
            <h3 class="section-title">Sleeve</h3>
            <div class="sidebar-widget-body">
                <div class="compare-report">
                    @foreach($sleeve_array as $sleeve)
                        <input type="checkbox" class="custom-control-input sleeve" id="sleeve-{{ $sleeve }}" value="{{ $sleeve }}" name="sleeve[]">&nbsp;
                        <label for="sleeve-{{ $sleeve }}" class="custom-control-label">{{ $sleeve }}</label><br>
                    @endforeach
                </div><!-- /.compare-report -->
            </div><!-- /.sidebar-widget-body -->
        </div>

        <div class="sidebar-widget wow fadeInUp outer-top-vs animated" style="visibility: visible; animation-name: fadeInUp;">
            <h3 class="section-title">Pattern</h3>
            <div class="sidebar-widget-body">
                <div class="compare-report">
                    @foreach($pattern_array as $pattern)
                        <input type="checkbox" class="custom-control-input pattern" id="pattern-{{ $pattern }}" value="{{ $pattern }}" name="pattern[]">&nbsp;
                        <label for="pattern-{{ $pattern }}" class="custom-control-label">{{ $pattern }}</label><br>
                    @endforeach
                </div><!-- /.compare-report -->
            </div><!-- /.sidebar-widget-body -->
        </div>

        <div class="sidebar-widget wow fadeInUp outer-top-vs animated" style="visibility: visible; animation-name: fadeInUp;">
            <h3 class="section-title">Fit</h3>
            <div class="sidebar-widget-body">
                <div class="compare-report">
                    @foreach($fit_array as $fit)
                        <input type="checkbox" class="custom-control-input fit" id="fit-{{ $fit }}" value="{{ $fit }}" name="fit[]">&nbsp;
                        <label for="fit-{{ $fit }}" class="custom-control-label">{{ $fit }}</label><br>
                    @endforeach
                </div><!-- /.compare-report -->
            </div><!-- /.sidebar-widget-body -->
        </div>

        <div class="sidebar-widget wow fadeInUp outer-top-vs animated" style="visibility: visible; animation-name: fadeInUp;">
            <h3 class="section-title">Occasion</h3>
            <div class="sidebar-widget-body">
                <div class="compare-report">
                    @foreach($occassion_array as $occassion)
                        <input type="checkbox" class="custom-control-input occassion" id="occassion-{{ $occassion }}" value="{{ $occassion }}" name="occassion[]">&nbsp;
                        <label for="occassion-{{ $occassion }}" class="custom-control-label">{{ $occassion }}</label><br>
                    @endforeach
                </div><!-- /.compare-report -->
            </div><!-- /.sidebar-widget-body -->
        </div><br><br>


    @endif






</div><!-- /.sidemenu-holder -->

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {

            $("#subscriberForm").validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                        remote: "{{ route('check.subscriber')  }}",
                    },
                },
                messages: {
                    email: {
                        required: "Please enter your email.",
                        email: "Please enter a valid email address.",
                        remote: "Email already exists.",
                    },
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });

    </script>
@endpush
