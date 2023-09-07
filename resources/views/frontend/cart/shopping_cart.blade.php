@extends('layouts.frontend.app')

@section('title')
    Shopping Cart
@endsection

@push('css')

@endpush

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>

       <div class="row single-product" >
           @if(totalCartItems() != 0)
               <div class="shopping-cart">

                   <div id="AppendCartItems">
                       @include('frontend.cart.cart_items')
                   </div>
                   <div class="col-md-4 col-sm-12 estimate-ship-tax">
                       <table class="table">
                           <thead>
                           <tr>
                               <th>
                                   <span class="estimate-title">Coupon Code</span>
                                   <p>Enter your coupon code if you have one..</p>
                               </th>
                           </tr>
                           </thead>
                           <tbody>
                           <tr>
                               <td>
                                   <form action="javascript:void(0)" id="AppluCupon" method="post">
                                       @csrf
                                       <div class="form-group">
                                           <input type="text" required class="form-control unicase-form-control text-input" name="code" id="code" value="{{ @Session::has('coupon_code') ? Session::get('coupon_code') : '' }}" placeholder="You Coupon..">
                                       </div>
                                       <div class="clearfix pull-right">
                                           <button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
                                       </div>
                                   </form>
                               </td>
                           </tr>
                           </tbody><!-- /tbody -->
                       </table><!-- /table -->
                   </div><!-- /.estimate-ship-tax -->

                   <div class="col-md-4"></div>

                   <div class="col-md-4 col-sm-12 cart-shopping-total">
                       <table class="table">
                           <thead>
                           <tr>
                               <th>
                                   <div class="cart-sub-total">
                                       Subtotal<span class="inner-left-md">&#2547; <span class="totalAmount">{{ totalAmount() }}</span></span>
                                   </div>
                                   <div class="cart-sub-total">
                                       Coupon Discount<span class="inner-left-md">&#2547; <span class="coupon_amount">{{ Session::get('coupon_amount') ? Session::get('coupon_amount') : 0 }}</span></span>
                                   </div>
                                   <div class="cart-grand-total">
                                       Grand Total<span class="inner-left-md">&#2547; <span class="totalAmount total_coupon_amount">{{ Session::get('coupon_amount') ? totalAmount() - Session::get('coupon_amount') : totalAmount()}} </span></span>
                                   </div>
                               </th>
                           </tr>
                           </thead><!-- /thead -->
                           <tbody>
                           <tr>
                               <td>
                                   <div class="cart-checkout-btn pull-right">
                                       <a href="{{ route('checkout') }}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
                                       <span class="">Checkout with multiples address!</span>
                                   </div>
                               </td>
                           </tr>
                           </tbody><!-- /tbody -->
                       </table><!-- /table -->
                   </div><!-- /.cart-shopping-total -->

               </div>
           @else
               <div class="x-page inner-bottom-sm">
                   <div class="row">
                       <div class="col-md-12 x-text text-center">
                           <h3>Sorry</h3>
                           <p>Your cart is empty... </p>
                           <form role="form" class="outer-top-vs outer-bottom-xs">
                               <input placeholder="Search" autocomplete="off">
                               <button class="  btn-default le-button">Go</button>
                           </form>
                           <a href="{{ url('/') }}"><i class="fa fa-home"></i> Return to shop</a>
                       </div>
                   </div><!-- /.row -->
               </div>
           @endif
           <div class="clearfix"></div>
       </div>



@endsection

@push('js')
    <script>
        $(document).ready(function () {
            //---Update Cart Items
            $(document).on('click', '.btnUpdateItem', function(){
                if($(this).hasClass('qtyMinus')){
                    var qty = $(this).prev().val();
                    if(qty <=1){
                        alert("Item quantity must be 1 or geater!");
                        return false;
                    }else{
                        var new_qty = parseInt(qty)-1;
                    }
                }

                if($(this).hasClass('qtyPlus')){
                    var qty = $(this).prev().prev().val();
                    var new_qty = parseInt(qty)+1;
                }

                var rowId = $(this).data('cartid');

                $.ajax({
                    url : "{{ route('update.quantity') }}",
                    type : "post",
                    data : {rowId:rowId, new_qty:new_qty, "_token": "{{ csrf_token() }}"},

                    beforeSend: function() {
                        $('.se-pre-con').show();
                    },

                    success:function (res) {
                        if(res.messege != ""){
                            alert(res.messege);
                        }
                        iziToast.success({
                            title: 'Success',
                            position: 'bottomRight',
                            message: 'Quantity Updated'
                        });
                        $(".totalCartItems").html(res.totalCartItems);
                        $(".totalAmount").html(res.totalAmount);
                        $(".coupon_amount").html(res.coupon_amount);
                        $("#AppendCartItems").html(res.view);
                        $('.se-pre-con').hide();
                    }
                });
            });

            //---Apply Coupon Code----
            $("#AppluCupon").submit(function () {
                var code = $("#code").val();
                if(code == ''){
                    alert("Filed must not be empty!");
                    return false;
                }else{
                    $.ajax({
                        url:"{{ route('apply.coupon') }}",
                        type: 'post',
                        data : {code:code, "_token": "{{ csrf_token() }}"},

                        beforeSend: function() {
                            $('.se-pre-con').show();
                        },

                        success:function (res) {
                            if(res.messege != ""){

                                if(res.status == false){
                                    iziToast.error({
                                        title: 'Error',
                                        position: 'bottomRight',
                                        message: res.messege
                                    });
                                }else{
                                    iziToast.success({
                                        title: 'Success',
                                        message: res.messege
                                    });
                                }

                                $(".totalCartItems").html(res.totalCartItems);
                                $(".totalAmount").html(res.totalAmount);
                                $(".coupon_amount").html(res.coupon_amount);
                                $(".total_coupon_amount").html(res.total_coupon_amount);
                                $("#AppendCartItems").html(res.view);
                                $('.se-pre-con').hide();
                            }
                        }
                    });
                }
            });
        });
    </script>
@endpush
