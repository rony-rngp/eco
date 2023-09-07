@extends('layouts.frontend.app')

@section('title', 'Category Wise')

@push('css')

@endpush

@section('content')

    <div class="row">

    @include('layouts.frontend.partial.sidebar')

    <div class="col-md-9">
        <!-- ========================================== SECTION – HERO ========================================= -->

        <div id="category" class="category-carousel hidden-xs">
            <div class="item">
                <div class="image">
                    <img src="{{ asset('public/frontend') }}/assets/images/banners/cat-banner-1.jpg" alt="" class="img-responsive">
                </div>
                <div class="container-fluid">
                    <div class="caption vertical-top text-left">
                        <div class="big-text">
                            Big Sale
                        </div>

                        <div class="excerpt hidden-sm hidden-md">
                            Save up to 49% off
                        </div>
                        <div class="excerpt-normal hidden-sm hidden-md">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        </div>

                    </div><!-- /.caption -->
                </div><!-- /.container-fluid -->
            </div>
        </div>




        <!-- ========================================= SECTION – HERO : END ========================================= -->
        <div class="clearfix filters-container m-t-10">
            <div class="row">
                <div class="col col-sm-6 col-md-2">
                    <div class="filter-tabs">
                        <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                            <li class="active">
                                <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a>
                            </li>
                            <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                        </ul>
                    </div><!-- /.filter-tabs -->
                </div><!-- /.col -->

                <form name="sortProduct" id="sortProduct" class="form-horizontal span6">
                    <input type="hidden" id="slug" name="url" value="{{ $slug }}">
                    <input type="hidden" id="id" name="id" value="{{ $id }}">
                    <div class="control-group">
                        <span class="lbl">Sort by</span> &nbsp;&nbsp;
                        <select name="sort" id="sort">
                            <option value="">Select</option>
                            <option {{ @$_GET['sort'] == 'product_name_a_z' ? 'selected' : '' }} value="product_name_a_z">Product name A - Z</option>
                            <option {{ @$_GET['sort'] == 'product_name_z_a' ? 'selected' : '' }} value="product_name_z_a">Product name Z - A</option>
                            <option {{ @$_GET['sort'] == 'price_lowest' ? 'selected' : '' }} value="price_lowest">Lowest Price first</option>
                            <option {{ @$_GET['sort'] == 'price_highest' ? 'selected' : '' }} value="price_highest">Highest Price first</option>
                        </select>
                    </div>
                </form>

            </div><!-- /.row -->
        </div>
        <div class="search-result-container ">

            <div class="filter_products">
                @include('frontend.product.ajax_category_wise')
            </div>

            <div class="clearfix filters-container">

                <div class="text-right">
                    @if(isset($_GET['sort']) && !empty($_GET['sort']))
                        {{ $category_products->appends(['sort' => $_GET['sort']])->links() }}
                    @else
                        {{ $category_products->links() }}
                    @endif
                </div><!-- /.text-right -->

            </div><!-- /.filters-container -->

        </div><!-- /.search-result-container -->

    </div><br>

    </div>
    @if(@$page_sub == "listing_sub")
        <?php
            $url = 'sub.category.product';
        ?>
    @else
        <?php
            $url = 'root.category.product';
        ?>
    @endif

@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('#sort').on('change', function () {
                var sort = $('#sort').val();
                var fabric = get_filter("fabric");
                var sleeve = get_filter("sleeve");
                var pattern = get_filter("pattern");
                var fit = get_filter("fit");
                var occassion = get_filter("occassion");

                $.ajax({
                    url : "{{ route($url,['id'=>$id, 'slug'=>$slug]) }}",
                    method : 'get',
                    data : {sort:sort, fabric:fabric, sleeve:sleeve, pattern:pattern, fit:fit, occassion:occassion},

                    beforeSend: function() {
                        $('.se-pre-con').show();
                    },

                    success:function (data) {
                        $('.filter_products').html(data);
                        $('.se-pre-con').hide();
                    },
                });
            });


            $(".fabric").on('click', function () {
                var sort = $("#sort option:selected").val();
                var fabric = get_filter("fabric");
                var sleeve = get_filter("sleeve");
                var pattern = get_filter("pattern");
                var fit = get_filter("fit");
                var occassion = get_filter("occassion");

                $.ajax({
                    url : "{{ route($url,['id'=>$id, 'slug'=>$slug]) }}",
                    method : 'get',
                    data : {fabric:fabric, sort:sort, sleeve:sleeve, pattern:pattern, fit:fit, occassion:occassion},

                    beforeSend: function() {
                        $('.se-pre-con').show();
                    },

                    success:function (data) {
                        $('.filter_products').html(data);
                        $('.se-pre-con').hide();
                    },
                });
            });

            $(".sleeve").on('click', function () {
                var sort = $("#sort option:selected").val();
                var fabric = get_filter("fabric");
                var sleeve = get_filter("sleeve");
                var pattern = get_filter("pattern");
                var fit = get_filter("fit");
                var occassion = get_filter("occassion");

                $.ajax({
                    url : "{{ route($url,['id'=>$id, 'slug'=>$slug]) }}",
                    method : 'get',
                    data : {fabric:fabric, sort:sort, sleeve:sleeve, pattern:pattern, fit:fit, occassion:occassion},

                    beforeSend: function() {
                        $('.se-pre-con').show();
                    },

                    success:function (data) {
                        $('.filter_products').html(data);
                        $('.se-pre-con').hide();
                    },
                });
            });

            $(".pattern").on('click', function () {
                var sort = $("#sort option:selected").val();
                var fabric = get_filter("fabric");
                var sleeve = get_filter("sleeve");
                var pattern = get_filter("pattern");
                var fit = get_filter("fit");
                var occassion = get_filter("occassion");

                $.ajax({
                    url : "{{ route($url,['id'=>$id, 'slug'=>$slug]) }}",
                    method : 'get',
                    data : {fabric:fabric, sort:sort, sleeve:sleeve, pattern:pattern, fit:fit, occassion:occassion},

                    beforeSend: function() {
                        $('.se-pre-con').show();
                    },

                    success:function (data) {
                        $('.filter_products').html(data);
                        $('.se-pre-con').hide();
                    },
                });
            });

            $(".fit").on('click', function () {
                var sort = $("#sort option:selected").val();
                var fabric = get_filter("fabric");
                var sleeve = get_filter("sleeve");
                var pattern = get_filter("pattern");
                var fit = get_filter("fit");
                var occassion = get_filter("occassion");

                $.ajax({
                    url : "{{ route($url,['id'=>$id, 'slug'=>$slug]) }}",
                    method : 'get',
                    data : {fabric:fabric, sort:sort, sleeve:sleeve, pattern:pattern, fit:fit, occassion:occassion},

                    beforeSend: function() {
                        $('.se-pre-con').show();
                    },

                    success:function (data) {
                        $('.filter_products').html(data);
                        $('.se-pre-con').hide();
                    },
                });
            });

            $(".occassion").on('click', function () {
                var sort = $("#sort option:selected").val();
                var fabric = get_filter("fabric");
                var sleeve = get_filter("sleeve");
                var pattern = get_filter("pattern");
                var fit = get_filter("fit");
                var occassion = get_filter("occassion");

                $.ajax({
                    url : "{{ route($url,['id'=>$id, 'slug'=>$slug]) }}",
                    method : 'get',
                    data : {fabric:fabric, sort:sort, sleeve:sleeve, pattern:pattern, fit:fit, occassion:occassion},

                    beforeSend: function() {
                        $('.se-pre-con').show();
                    },

                    success:function (data) {
                        $('.filter_products').html(data);
                        $('.se-pre-con').hide();
                    },
                });
            });


            function get_filter(class_name) {
                var filter = [];
                $('.'+class_name+':checked').each(function () {
                    filter.push($(this).val());
                });
                return filter;
            }
        });
    </script>
@endpush
