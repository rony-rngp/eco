@extends('layouts.frontend.app')

@section('title')
    Order Details
@endsection

@push('css')
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 5px;
        text-align: left;
    }
</style>
@endpush

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Orders</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>


    @include('frontend.account.account_sidebar')

    <div class="col-md-9">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table style="width: 100%">
                                            <tr>
                                                <td colspan="2"><strong>Order Details</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Order Date</td>
                                                <td>{{ date('d-m-Y', strtotime($order_details->created_at)) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Order Status</td>
                                                <td><span class="badge badge-danger">{{ $order_details->order_status }}</span></td>
                                            </tr>
                                            <tr>
                                                <td>Order Total</td>
                                                <td>&#2547; {{ $order_details->grand_total }}</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping Charges</td>
                                                <td>&#2547; {{ $order_details->shipping_charges }}</td>
                                            </tr>
                                            <tr>
                                                <td>Coupon Code</td>
                                                <td>
                                                    @if($order_details->coupon_code)
                                                        {{ $order_details->coupon_code }}
                                                    @else
                                                        <i>Null</i>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Coupon Amount</td>
                                                <td>
                                                    @if($order_details->coupon_amount)
                                                        &#2547; {{ $order_details->coupon_amount }}
                                                    @else
                                                        <i>0</i>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Payment Method</td>
                                                <td>{{ $order_details->payment_gateway }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table style="width: 100%">
                                            <tr>
                                                <td colspan="2"><strong>Delivery Address</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <td>{{ $order_details->first_name }} {{ $order_details->last_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td>{{ $order_details->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Country</td>
                                                <td>{{ $order_details->country }}</td>
                                            </tr>
                                            <tr>
                                                <td>Division</td>
                                                <td>{{ $order_details->division }}</td>
                                            </tr>
                                            <tr>
                                                <td>District</td>
                                                <td>{{ $order_details->district }}</td>
                                            </tr>
                                            <tr>
                                                <td>Zip Code</td>
                                                <td>{{ $order_details->zip_code }}</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile</td>
                                                <td>{{ $order_details->mobile }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Product Code</th>
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Product Color</th>
                                                <th>Product Size</th>
                                                <th>Product Qty</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($order_details->order_products as $product)
                                                <?php $link_product = \App\Model\Product::select(['id', 'slug'])->where('id', $product->product_id)->first(); ?>
                                                <tr>
                                                    <td>{{ $product->product_code }}</td>
                                                    <td>
                                                        <?php $image =  \App\Model\Product::getProductImage($product->product_id); ?>
                                                        @if(!empty($image))
                                                            <a href="{{ route('single.product', [$link_product->id, $link_product->slug]) }}"><img width="60px" height="auto" src="{{ url($image['main_image']) }}"></a>
                                                        @else
                                                            <img width="60px" height="auto" src="{{ asset('public/backend/upload/no_image.png')  }}">
                                                        @endif
                                                    </td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>{{ $product->product_color }}</td>
                                                    <td>
                                                        @if($product->product_size)
                                                            {{ $product->product_size }}
                                                        @else
                                                            <i>Null</i>
                                                        @endif
                                                     </td>
                                                    <td>{{ $product->product_qty }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')

@endpush
