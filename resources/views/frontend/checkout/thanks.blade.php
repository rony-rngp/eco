@extends('layouts.frontend.app')

@section('title')
    Checkout
@endsection

@push('css')

@endpush

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Thanks</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>



    <div class="row single-product" style="background: white">
        <h3 align="center">Thanks..</h3>
        <hr>
        <div align="center">
            <h3>YOUR ORDER HAS BEEN PLACED SUCCESSFULLY</h3>
            <b>Yor order number is #{{ Session::get('order_id') }} and total amount is &#2547; {{ Session::get('grand_total') }}</b>
        </div><br>

        <div class="clearfix"></div>
    </div><br><br>

    <?php
        Session::forget('order_id');
        Session::forget('grand_total');
        Session::forget('coupon_amount');
        Session::forget('coupon_code');
    ?>

@endsection

@push('js')

@endpush
