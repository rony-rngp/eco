@extends('layouts.backend.app')

@section('title', 'Product Attribute')

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
                                    <h4 class="card-title">Add Attribute</h4>
                                    {{--<a href="{{ route('admin.add.product') }}" class="btn btn-primary">Add Product</a>--}}
                                </div><hr style="margin: 0">
                                <div class="card-body card-dashboard">
                                    <form action="{{ route('admin.product.store.attributes', $product->id) }}" method="post" id="quickForm" enctype="multipart/form-data">
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
                                            <div class="form-group col-md-12">
                                                <div class="field_wrapper">
                                                    <div style="display: flex">
                                                        <input type="text" name="sku[]" required id="sku" class="form-control" placeholder="SKU" style="width: 120px; margin-right: 5px"/>
                                                        <input type="text" name="size[]" required id="size" class="form-control" placeholder="Size" style="width: 120px; margin-right: 5px"/>
                                                        <input type="number" name="price[]" required id="price" class="form-control" placeholder="Price" style="width: 120px; margin-right: 5px"/>
                                                        <input type="number" name="stock[]" required id="stock" class="form-control" placeholder="Stock" style="width: 120px; margin-right: 5px"/>
                                                        <a href="javascript:void(0);" class="add_button btn btn-sm btn-success " title="Add field"> <i class="bx bx-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="float-left">Product Attributes</h4>

                                </div><hr style="margin: 0">
                                <div class="card-body table-responsive">
                                    <form action="{{ route('admin.product.update.attributes', $product->id) }}" method="post">
                                        @csrf
                                        <table id="example1" class="table zero-configuration ">
                                            <thead>
                                            <tr>
                                                <th>#SL</th>
                                                <th>SKU</th>
                                                <th>Size</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($product->attributes as $key => $attribute)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <input type="hidden" name="attr_id[]" value="{{ $attribute->id }}">
                                                    <td style="width: 80px">{{ $attribute->sku}}</td>
                                                    <td>{{ $attribute->size}}</td>
                                                    <td><input type="number" name="price[]" required value="{{ $attribute->price}}" ></td>
                                                    <td><input type="number" name="stock[]" required value="{{ $attribute->stock}}" style="width: 100%"></td>
                                                    <td>
                                                        <input type="checkbox" data-toggle="toggle" data-width="80" data-height="30" data-on="On"  data-off="Off" id="status" data-id="{{ $attribute->id }}"  {{ $attribute->status == 1 ? 'checked' : '' }} >
                                                    </td>

                                                    <td>
                                                        <!--Delete Data-->
                                                        <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('admin.product.destroy.attributes', $attribute->id) }}">
                                                            <i class="bx bx-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="col-md-12 text-center">
                                            <button style="text-align: center" type="submit" class="btn btn-primary">Update Attributes</button>
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
    <script type="text/javascript">
        $(document).ready(function(){
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = '<div style="display: flex"><input type="text" name="sku[]" required id="sku" class="form-control mt-1" placeholder="SKU" style="width: 120px; margin-right: 5px"/> <input type="text" name="size[]" required id="size" class="form-control  mt-1" placeholder="Size" style="width: 120px; margin-right: 5px"/> <input type="number" name="price[]" required id="price" class="form-control mt-1" placeholder="Price" style="width: 120px; margin-right: 5px"/> <input type="number" name="stock[]" required id="stock" class="form-control mt-1" placeholder="Stock" style="width: 120px; margin-right: 5px"/> <a href="javascript:void(0);" class="remove_button btn btn-sm btn-danger mt-1 "> <i class="bx bx-minus"></i></i></a></div>'; //New input field html
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>

    <script>
        $(function () {
            $('#quickForm').validate({
                rules: {
                    "sku[]": {
                        required: true,
                    },
                    "size[]": {
                        required: true,
                    },
                    "price[]": {
                        required: true,
                    },
                    "stock[]": {
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
                url: "{{ route('admin.product.status.attributes') }}",
                type: "post",
                data: {id : id, status : status, "_token": "{{ csrf_token() }}"},
                success: function (result) {
                    console.log(result);
                }
            })
        });
    </script>
@endpush
