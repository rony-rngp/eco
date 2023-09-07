@extends('layouts.backend.app')

@section('title', 'Edit Coupon')

@push('css')
    <style>
        .dropify-wrapper .dropify-message p{
            font-size: initial;
        }
    </style>
@endpush

@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- Dashboard Analytics Start -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Coupon</h4>
                                    <a href="{{ route('admin.view.coupon') }}" class="btn mr-1 mb-1 btn-outline-primary">Coupon List</a>
                                </div><hr style="margin: 0">
                                <div class="card-body card-dashboard">
                                    <form class="form" id="quickForms" action="{{ route('admin.update.coupon', $coupon->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div id="couponFiled" class="form-group col-md-6">
                                                <label for="coupon_code">Coupon Code :- </label> {{ $coupon->coupon_code }}

                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Coupon Type</label><br>
                                                <input type="radio" name="coupon_type" {{ $coupon->coupon_type == 'Multiple Times' ? 'checked' : '' }} id="multiple_times" value="Multiple Times"> <label for="multiple_times">Multiple Times</label> &nbsp;&nbsp;
                                                <input type="radio" name="coupon_type" {{ $coupon->coupon_type == 'Single Times' ? 'checked' : '' }} id="single_times" value="Single Times"> <label for="single_times">Single Times</label><br>
                                                <span style="color:red">{{ $errors->has('coupon_type') ? $errors->first('coupon_type') : '' }}</span>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Amount Type</label><br>
                                                <input type="radio" name="amount_type"  id="percentage" {{ $coupon->amount_type == 'Percentage' ? 'checked' : '' }} value="Percentage"> <label for="percentage">Percentage</label> &nbsp;(in %)&nbsp;&nbsp;
                                                <input type="radio" name="amount_type"  id="fixed" {{ $coupon->amount_type == 'Fixed' ? 'checked' : '' }} value="Fixed"> <label for="fixed">Fixed</label>&nbsp;(in BDT or USD)<br>
                                                <span style="color:red">{{ $errors->has('amount_type') ? $errors->first('amount_type') : '' }}</span>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="amount">Amount</label>
                                                <input type="text" name="amount" class="form-control" id="amount" value="{{ $coupon->amount }}" placeholder="Enter Amount">
                                                <span style="color:red">{{ $errors->has('amount') ? $errors->first('amount') : '' }}</span>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="category_id">Root Category</label>
                                                    <select name="category_id" id="category_id" class="form-control select2" style="width: 100%;">
                                                        <option value="">Select Root Category</option>
                                                        @foreach($root_categories as $root_category)
                                                            <option {{ $coupon->category_id == $root_category->id ? 'selected' : '' }} value="{{ $root_category->id }}">{{ $root_category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color:red">{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="subcategory_id">Sub Category</label>
                                                    <select name="subcategory_id" id="subcategory_id" class="form-control select2" style="width: 100%;">
                                                        <option value="">Select Sub Category</option>
                                                        @foreach($sub_categories as $sub_category)
                                                            <option {{ $coupon->subcategory_id == $sub_category->id ? 'selected' : '' }} value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color:red">{{ $errors->has('subcategory_id') ? $errors->first('subcategory_id') : '' }}</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="subsubcategory_id">Sub Sub-Category</label>
                                                    <select name="subsubcategory_id" id="subsubcategory_id" class="form-control select2" style="width: 100%;">
                                                        <option value="">Select Sub Sub-Category</option>
                                                        @foreach($sub_subcategories as $sub_subcategory)
                                                            <option {{ $coupon->subsubcategory_id == $sub_subcategory->id ? 'selected' : '' }} value="{{ $sub_subcategory->id }}">{{ $sub_subcategory->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color:red">{{ $errors->has('subsubcategory_id') ? $errors->first('subsubcategory_id') : '' }}</span>
                                                </div>
                                            </div>


                                            {{--<div class="form-group col-md-6">
                                                <label for="users">User</label>
                                                <select name="users[]" id="users" data-placeholder="Select User" data-live-search="true" multiple class="form-control select2" style="width: 100%;">
                                                    @foreach($users as $user)
                                                        <option {{ old('users') == $user->email ? 'selected' : '' }} value="{{ $user->email }}">{{ $user->email }}</option>
                                                    @endforeach
                                                </select>
                                                <span style="color:red">{{ $errors->has('users') ? $errors->first('users') : '' }}</span>
                                            </div>--}}

                                            <div class="form-group col-md-6">
                                                <label for="expiry_date">Expiry Date</label>
                                                <input type="date" name="expiry_date" id="expiry_date" value="{{ $coupon->expiry_date }}" class="form-control">
                                                <span style="color:red">{{ $errors->has('expiry_date') ? $errors->first('expiry_date') : '' }}</span>
                                            </div>


                                            <div class="col-12 justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-1">Update </button>
                                                <button type="reset" class="btn btn-light-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
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

            $(document).on('change', '#category_id', function () {
                var category_id = $(this).val();

                $.ajax({
                    url : "{{ route('admin.get_subcategory.product') }}",
                    type : 'get',
                    data : {category_id:category_id},

                    beforeSend: function() {
                        $('#loader').show();
                    },

                    success:function (res) {
                        var html = '<option value="">Select Category</option>';
                        $.each(res, function (key, v) {
                            html +='<option value="'+v.id+'">'+v.name+'</option>';
                        });
                        $('#subcategory_id').html(html);
                        $('#subsubcategory_id').html("");
                        $('#loader').hide();
                    }
                });
            });

            $(document).on('change', '#subcategory_id', function () {
                var subcategory_id = $(this).val();

                $.ajax({
                    url : "{{ route('admin.get_sub_subcategory.product') }}",
                    type : 'get',
                    data : {subcategory_id:subcategory_id},

                    beforeSend: function() {
                        $('#loader').show();
                    },

                    success:function (res) {
                        var html = '<option value="">Select Sub Sub-Category</option>';
                        $.each(res, function (key, v) {
                            html +='<option value="'+v.id+'">'+v.name+'</option>';
                        });
                        $('#subsubcategory_id').html(html);
                        $('#loader').hide();
                    }
                });
            });

            $("#manual").on('click', function () {
                $("#couponFiled").show();
            });

            $("#automatic").on('click', function () {
                $("#couponFiled").hide();
                $('#coupon_code').val('');
            });

            //Form validation
            $('#quickForms').validate({
                rules: {
                    coupon_option: {
                        required: true,
                    },
                    coupon_code: {
                        required: true,
                    },
                    coupon_type: {
                        required: true,
                    },
                    amount_type: {
                        required: true,
                    },
                    amount: {
                        required: true,
                        number : true
                    },
                    expiry_date: {
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
