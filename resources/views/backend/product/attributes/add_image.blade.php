@extends('layouts.backend.app')

@section('title', 'Product Image')

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
            <div class="content-body">
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Image</h4>
                                    {{--<a href="{{ route('admin.add.product') }}" class="btn btn-primary">Add Product</a>--}}
                                </div><hr style="margin: 0">
                                <div class="card-body card-dashboard">
                                    <form action="{{ route('admin.product.store.image', $product->id) }}" method="post" id="quickForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label>Product Name :  </label> {{ $product->name }}
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>Product Code : </label> {{ $product->code }}
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>Product Color : </label> {{ $product->color }}
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>Product Price : </label> {{ $product->price }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group col-md-12">
                                                    <img style="max-width: 130px" src="{{ url($product->main_image) }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    <label for="image">Product Image</label>
                                                    <input type="file" name="image[]" class="form-control" multiple data-max-file-size="2M" id="image" accept="image/*">                                                        <span style="color:red">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="float-left">Product Images</h4>

                                </div><hr style="margin: 0">
                                <div class="card-body table-responsive">
                                    <table id="example1" class="table zero-configuration ">
                                        <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($product->images as $key => $image)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td><img src="{{ url($image->image) }}" style="width: 100px; height: auto"></td>
                                                <td>
                                                    <input type="checkbox" data-toggle="toggle" data-width="80" data-height="30" data-on="On"  data-off="Off" id="status" data-id="{{ $image->id }}"  {{ $image->status == 1 ? 'checked' : '' }} >
                                                </td>

                                                <td>
                                                    <!--Delete Data-->
                                                    <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('admin.product.destroy.image', $image->id) }}">
                                                        <i class="bx bx-trash"></i>
                                                    </a>
                                                </td>
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
        $(function () {

            $('#quickForm').validate({
                rules: {
                    "image[]": {
                        required: true,
                    },
                },
                messages: {
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {

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

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(document).on('change', '#status', function () {
            var id = $(this).attr('data-id');
            if(this.checked){
                var status = 1;
            }else{
                var status = 0;
            }

            $.ajax({
                url: "{{ route('admin.product.status.image') }}",
                type: "post",
                data: {id : id, status : status, "_token": "{{ csrf_token() }}"},
                success: function (result) {
                    console.log(result);
                }
            })
        });
    </script>
@endpush
