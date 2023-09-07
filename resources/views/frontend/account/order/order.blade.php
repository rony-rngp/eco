@extends('layouts.frontend.app')

@section('title')
    Order List
@endsection

@push('css')

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
                            <table class="table table-bordered" >
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Product Code</th>
                                        <th>Payment Method</th>
                                        <th>Grand Total</th>
                                        <th>Created on</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>

                                <tbody>

                                @forelse($orders as $order)
                                    <tr>
                                        <td style="border: 1px solid #DDDDDD">{{ $order->id }}</td>
                                        <td style="border: 1px solid #DDDDDD">
                                            @foreach($order->order_products as $product)
                                                <i>{{ $product->product_code }}</i> <br>
                                            @endforeach
                                        </td>
                                        <td style="border: 1px solid #DDDDDD">{{ $order->payment_gateway }}</td>
                                        <td style="border: 1px solid #DDDDDD">&#2547; {{ $order->grand_total }}</td>
                                        <td style="border: 1px solid #DDDDDD">{{ $order->created_at }}</td>
                                        <td style="border: 1px solid #DDDDDD"><a href="{{ route('order.details', $order->id) }}" title="Details" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a></td>
                                    </tr>
                                    @empty

                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')

@endpush
