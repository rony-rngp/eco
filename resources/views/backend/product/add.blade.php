@extends('layouts.backend.app')

@section('title', 'Add Product')

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
                                    <h4 class="card-title">Add Product</h4>
                                    <a href="{{ route('admin.view.product') }}" class="btn mr-1 mb-1 btn-outline-primary">Product List</a>
                                </div><hr style="margin: 0">
                                <div class="card-body card-dashboard">
                                    <form class="form" id="quickForms" action="{{ route('admin.store.product') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div id="loader"  style="width:100px; margin:0 auto; display: none">
                                            <img width="120px" src="{{ asset('public/backend/upload/tenor.gif') }}">
                                        </div>

                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="category_id">Root Category</label>
                                                        <select name="category_id" id="category_id" class="form-control select2" style="width: 100%;">
                                                            <option value="">Select Root Category</option>
                                                            @foreach($root_categories as $root_category)
                                                                <option {{ old('category_id') == $root_category->id ? 'selected' : '' }} value="{{ $root_category->id }}">{{ $root_category->name }}</option>
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

                                                        </select>
                                                        <span style="color:red">{{ $errors->has('subcategory_id') ? $errors->first('subcategory_id') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="subsubcategory_id">Sub Sub-Category</label>
                                                        <select name="subsubcategory_id" id="subsubcategory_id" class="form-control select2" style="width: 100%;">
                                                            <option value="">Select Sub Sub-Category</option>

                                                        </select>
                                                        <span style="color:red">{{ $errors->has('subsubcategory_id') ? $errors->first('subsubcategory_id') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="brand_id">Brand</label>
                                                        <select name="brand_id" id="brand_id" class="form-control select2" style="width: 100%;">
                                                            <option value="">Select Brand</option>
                                                            @foreach($brands as $brand)
                                                                <option {{ old('brand_id') == $brand->id ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span style="color:red">{{ $errors->has('brand_id') ? $errors->first('brand_id') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="name">Product Name</label>
                                                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Enter Name">
                                                        <span style="color:red">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="code">Product Code</label>
                                                        <input type="text" name="code" class="form-control" id="code" value="{{ old('code') }}" placeholder="Enter Product Code">
                                                        <span style="color:red">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="color">Product Color</label>
                                                        <input type="text" name="color" class="form-control" id="color" value="{{ old('color') }}" placeholder="Enter Product Color">
                                                        <span style="color:red">{{ $errors->has('color') ? $errors->first('color') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="price">Product Price</label>
                                                        <input type="text" name="price" class="form-control" id="price" value="{{ old('price') }}" placeholder="Enter Product Price">
                                                        <span style="color:red">{{ $errors->has('price') ? $errors->first('price') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="discount">Product Discount (%)</label>
                                                        <input type="text" name="discount" class="form-control" id="discount" value="{{ old('discount') }}" placeholder="Enter Product Discount">
                                                        <span style="color:red">{{ $errors->has('discount') ? $errors->first('discount') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="weight">Product Weight (gram)</label>
                                                        <input type="text" name="weight" class="form-control" id="weight" value="{{ old('weight') }}" placeholder="Enter Weight">
                                                        <span style="color:red">{{ $errors->has('weight') ? $errors->first('weight') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="description">Product Description</label>
                                                        <textarea name="description" id="description">{{ old('description') }}</textarea>
                                                        <span style="color:red">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="fabric">Fabric</label>
                                                    <select name="fabric" id="fabric" class="form-control select2" style="width: 100%;">
                                                        <option value="">Select Fabric</option>
                                                        @foreach($fabric_array as $fabric)
                                                            <option {{ old('fabric') == $fabric ? 'selected' : '' }} value="{{ $fabric }}">{{ $fabric }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color:red">{{ $errors->has('fabric') ? $errors->first('fabric') : '' }}</span>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="sleeve">Sleeve</label>
                                                    <select name="sleeve" id="sleeve" class="form-control select2" style="width: 100%;">
                                                        <option value="">Select Sleeve</option>
                                                        @foreach($sleeve_array as $sleeve)
                                                            <option {{ old('sleeve') == $sleeve ? 'selected' : '' }} value="{{ $sleeve }}">{{ $sleeve }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color:red">{{ $errors->has('sleeve') ? $errors->first('sleeve') : '' }}</span>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="pattern">Pattern</label>
                                                    <select name="pattern" id="pattern" class="form-control select2" style="width: 100%;">
                                                        <option value="">Select Pattern</option>
                                                        @foreach($pattern_array as $pattern)
                                                            <option {{ old('pattern') == $pattern ? 'selected' : '' }} value="{{ $pattern }}">{{ $pattern }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color:red">{{ $errors->has('pattern') ? $errors->first('pattern') : '' }}</span>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="fit">Fit</label>
                                                    <select name="fit" id="fit" class="form-control select2" style="width: 100%;">
                                                        <option value="">Select Fit</option>
                                                        @foreach($fit_array as $fit)
                                                            <option {{ old('fit') == $fit ? 'selected' : '' }} value="{{ $fit }}">{{ $fit }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color:red">{{ $errors->has('fit') ? $errors->first('fit') : '' }}</span>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="occassion">Occassion</label>
                                                    <select name="occassion" id="occassion" class="form-control select2" style="width: 100%;">
                                                        <option value="">Select Occassion</option>
                                                        @foreach($occassion_array as $occassion)
                                                            <option {{ old('occassion') == $occassion ? 'selected' : '' }} value="{{ $occassion }}">{{ $occassion }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color:red">{{ $errors->has('occassion') ? $errors->first('occassion') : '' }}</span>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="stock">Product Stock ( <i style="color: red">
                                                                If the product has no attribute</i> )</label>
                                                        <input type="text" name="stock" class="form-control" id="stock" value="{{ old('stock') }}" placeholder="Enter Stock">
                                                        <span style="color:red">{{ $errors->has('stock') ? $errors->first('stock') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="main_image">Image</label>
                                                        <input type="file" name="main_image" class="form-control dropify" data-max-file-size="2M" id="main_image" accept="image/*">                                                        <span style="color:red">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                                                    </div>
                                                </div>


                                                <div class="col-12 justify-content-end">
                                                    <button type="submit" class="btn btn-primary mr-1">Submit </button>
                                                    <button type="reset" class="btn btn-light-secondary">Reset</button>
                                                </div>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>

    <script type="text/javascript">
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

            $('.dropify').dropify();

            $("#quickForms").validate({
                rules: {
                    category_id : {
                        required : true
                    },
                    brand : {
                      required : true
                    },
                    name: {
                        required: true,
                        minlength: 2,
                    },
                    code : {
                        required: true,
                    },
                    color : {
                        required: true
                    },
                    price : {
                        required: true,
                        number: true
                    },
                    weight : {
                        required: true,
                        number:true,
                    },
                    discount : {
                        required: true,
                        number : true
                    },
                    stock : {
                        number : true
                    },
                    main_image : {
                        required : true
                    }
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
