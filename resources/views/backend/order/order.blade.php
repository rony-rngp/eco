@extends('layouts.backend.app')

@section('title', 'Order List')

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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Order List</h4>
                                </div><hr style="margin: 0">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                            <tr>
                                                <th>#SL</th>
                                                <th>Order Id</th>
                                                <th>Order Date</th>
                                                <th>Payment Method</th>
                                                <th>Order Status</th>
                                                <th>Grand Total</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $key => $order)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>#{{ $order->id }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>

                                                    <td>{{ $order->payment_gateway }}</td>
                                                    <td><span class="badge badge-info">{{ $order->order_status }}</span></td>
                                                    <td>&#2547; {{ $order->grand_total }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.order.details', $order->id) }}" title="Details" ><i class="bx bx-show"></i></a> &nbsp;
                                                        @if($order->order_status == 'Shipped' || $order->order_status == 'Delivered')
                                                            <a href="{{ route('admin.order.invoice', $order->id) }}" target="_blank" title="Invoice"><i class="bx bx-printer"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>#SL</th>
                                                <th>Order Id</th>
                                                <th>Order Date</th>
                                                <th>Payment Method</th>
                                                <th>Order Status</th>
                                                <th>Grand Total</th>
                                                <th>Details</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
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

@endpush
