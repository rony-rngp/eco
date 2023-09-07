@extends('layouts.frontend.app')

@section('title')
    {{ @$search }}
@endsection

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

                            </div>

                            <div class="excerpt hidden-sm hidden-md">
                                {{ $products->count() }} Result Found
                            </div>
                            <div class="excerpt-normal hidden-sm hidden-md">
                                {{ @$search }}
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
{{--                        <input type="hidden" id="slug" name="url" value="{{ $slug }}">--}}
{{--                        <input type="hidden" id="id" name="id" value="{{ $id }}">--}}
                        <div class="control-group">
                            <span class="lbl">Sort by</span> &nbsp;&nbsp;
                            <select name="sort" id="sort" search="{{ $search }}">
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

                <div class="ajax_search">
                    @include('frontend.product.ajax_search')
                </div>

                <div class="clearfix filters-container">

                    <div class="text-right">
                        @if(isset($_GET['search']) && !empty($_GET['search']))
                            {{ $products->appends(['search' => $_GET['search']])->links() }}
                        @else
                            {{ $products->links() }}
                        @endif
                    </div><!-- /.text-right -->

                </div><!-- /.filters-container -->

            </div><!-- /.search-result-container -->

        </div><br>

    </div>


@endsection

@push('js')
    <script>
        $('#sort').on('change', function () {
            var sort = $('#sort').val();
            var search = $('#sort').attr('search');

            $.ajax({
                url : "{{ route('search.product') }}",
                method : 'get',
                data : {sort:sort, search:search},

                beforeSend: function() {
                    $('.se-pre-con').show();
                },

                success:function (data) {
                    $('.ajax_search').html(data);
                    $('.se-pre-con').hide();
                },
            });
        });
    </script>
@endpush
