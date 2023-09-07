@extends('layouts.backend.app')

@section('title', 'Add Sub Sub-Category')

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
                                    <h4 class="card-title">Add Sub Sub-Category</h4>
                                    <a href="{{ route('admin.view.sub_subcategory') }}" class="btn mr-1 mb-1 btn-outline-primary">Sub Sub-Category List</a>
                                </div><hr style="margin: 0">
                                <div class="card-body card-dashboard">
                                    <form class="form" id="quickForms" action="{{ route('admin.store.sub_subcategory') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="subcategory_id">Sub Category</label>
                                                        <select name="subcategory_id" id="subcategory_id" class="form-control select2">
                                                            <option value="">Select Category</option>
                                                            @foreach($categories as $category)
                                                                <optgroup label="{{ $category->name }}"></optgroup>
                                                                @foreach($category->subcategories as $subcategory)
                                                                    <option {{ old('subcategory_id') == $subcategory->id ? 'selected' : '' }} value="{{ $subcategory->id }}">&nbsp;&nbsp;&nbsp;&raquo; &nbsp;&nbsp;{{ $subcategory->name }}</option>
                                                                @endforeach
                                                            @endforeach
                                                        </select>
                                                        <span style="color:red">{{ $errors->has('subcategory_id') ? $errors->first('subcategory_id') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="name">Category Name</label>
                                                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Enter Name">
                                                        <span style="color:red">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="discount">Category Discount</label>
                                                        <input type="text" name="discount" class="form-control" id="discount" value="{{ old('discount') }}" placeholder="Enter Discount">
                                                        <span style="color:red">{{ $errors->has('discount') ? $errors->first('discount') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="image">Image</label>
                                                        <input type="file" name="image" class="form-control dropify" data-max-file-size="2M" id="image" accept="image/*">                                                        <span style="color:red">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
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

    <script type="text/javascript">
        $(document).ready(function () {

            $('.dropify').dropify();

            $("#quickForms").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2,
                    },

                    subcategory_id : {
                        required: true
                    },

                    discount : {
                        required: true,
                        number : true
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
