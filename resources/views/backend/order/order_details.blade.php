@extends('layouts.backend.app')

@section('title', 'Order Details')

@push('css')

@endpush

@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Order Details</h4>
                                </div><hr style="margin: 0">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped ">
                                            <tr>
                                                <td>Order ID</td>
                                                <td>#{{ $order_details->id }}</td>
                                            </tr>
                                            <tr>
                                                <td>Order Date</td>
                                                <td>{{ date('d-m-Y', strtotime($order_details->created_at)) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Order Status</td>
                                                <td><span class="badge badge-warning">{{ $order_details->order_status }}</span></td>
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
                                                        BDT {{ $order_details->coupon_amount }}
                                                    @else
                                                        <i>0</i>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Payment Method</td>
                                                <td>{{ $order_details->payment_gateway }}</td>
                                            </tr>
                                            <!-- start SslCommerze tr-->
                                            <tr>
                                                @if($order_details->payment_gateway == 'SSLCommerz')
                                                    <td>Payment Status</td>
                                                    <td>
                                                        @if($order_details->status == 'Complete' || $order_details->status == 'Processing')
                                                        <span class="badge badge-success">{{ $order_details->status }}</span>
                                                        @else
                                                            <span class="badge badge-danger">{{ $order_details->status }}</span>
                                                        @endif
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($order_details->payment_gateway == 'SSLCommerz')
                                                    <td>Transaction ID</td>
                                                    <td>{{ $order_details->transaction_id }}</td>
                                                @endif
                                            </tr>
                                            <!--End SslCommerze tr-->

                                            <!-- start Stripe tr-->
                                            <tr>
                                                @if($order_details->payment_gateway == 'Stripe')
                                                    <td>Payment Status</td>
                                                    <td>
                                                        @if($order_details->status == 'Complete' || $order_details->status == 'Processing')
                                                            <span class="badge badge-success">{{ $order_details->status }}</span>
                                                        @else
                                                            <span class="badge badge-danger">{{ $order_details->status }}</span>
                                                        @endif
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if($order_details->payment_gateway == 'Stripe')
                                                    <td><span style="font-size: 14px">Payment id</span></td>
                                                    <td><span style="font-size: 14px">{{ $order_details->transaction_id }}</span></td>
                                                @endif
                                            </tr>
                                            <!--End Stripe tr-->
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Customer Info</h4>
                                </div><hr style="margin: 0">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped ">
                                            <tr>
                                                <td>Customer Name</td>
                                                <td>{{ $order_details->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Customer E-Mail</td>
                                                <td>{{ $order_details->user->email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Customer Mobile</td>
                                                <td>{{ $order_details->user->mobile }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Delivery Address</h4>
                                </div><hr style="margin: 0">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
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
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="float-left">Update Order Status</h4>
                                </div>
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <td colspan="2">
                                                <form id="quickForms" action="{{ route('admin.update.order.status',$order_details->id) }}" method="post" style="display: flex">
                                                    @csrf
                                                    <select name="order_status" id="order_status" class="form-control" style="width: 128px;" required>
                                                        <option value="">Select Status</option>
                                                        @foreach($order_statuses as $order_status)
                                                            <option {{ $order_details->order_status == $order_status->name ? 'selected' : '' }} value="{{ $order_status->name }}">{{ $order_status->name }}</option>
                                                        @endforeach
                                                    </select> &nbsp;
                                                    <input type="text" name="courier_name" @if(empty( $order_details->courier_name)) id="courier_name" @endif placeholder="Courier Name" class="form-control" value="{{ $order_details->courier_name }}" style="width: 128px;">&nbsp;&nbsp;
                                                    <input type="text" name="tracking_number" @if(empty( $order_details->tracking_number)) id="tracking_number" @endif placeholder="Tracking Number" class="form-control" value="{{ $order_details->tracking_number }}" style="width: 128px;">&nbsp;
                                                    <button class="btn btn-sm btn-success" type="submit">Update</button>
                                                </form>
                                                <br>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td colspan="2">
                                                @foreach($order_logs as $log)
                                                    <strong>{{ $log->order_status }}</strong><br>
                                                    {{ date('d-M-Y, h:i:s', strtotime($log->created_at)) }}
                                                    <hr>
                                                @endforeach
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="float-left">Product Details</h3>
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Product Code</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Qty</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($order_details->order_products as $product)
                                            <tr>
                                                <td>{{ $product->product_code }}</td>
                                                <td>
                                                    <?php $image =  \App\Model\Product::getProductImage($product->product_id); ?>
                                                    @if(!empty($image))
                                                        <img width="60px" height="auto" src="{{ url($image['main_image']) }}">
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
                </section>
            </div>
        </div>
    </div>

@endsection

@push('js')
<script>
    $(document).ready(function () {
        //Hide Filed
        $("#courier_name").hide();
        $("#tracking_number").hide();

        $("#order_status").on("change", function () {
            if ($(this).val() == 'Shipped'){
                // show filed
                $("#courier_name").show();
                $("#tracking_number").show();
            }else{
                //Hide Filed
                $("#courier_name").hide();
                $("#tracking_number").hide();
                //---Empty Value
                $("#courier_name").val('');
                $("#tracking_number").val('');
            }
        });

        //---validation---
        $("#quickForms").validate({
            rules: {
                courier_name: {
                    required: true,
                },
                tracking_number: {
                    required: true,
                },
            },
            messages: {

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
