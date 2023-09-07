@extends('layouts.backend.app')

@section('title', 'Product List')

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
                                    <h4 class="card-title">Product List</h4>
                                    <a href="{{ route('admin.add.product') }}" class="btn btn-primary">Add Product</a>
                                </div><hr style="margin: 0">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                            <tr>
                                                <th>#SL</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Code</th>
                                                <th>Color</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($products as $key => $product)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ Str::limit($product->name, 20) }}</td>
                                                    <td>{{ isset($product->category->name) ? $product->category->name : ''}} {{ isset($product->subcategory->name) ? '=> '.$product->subcategory->name : '' }} {{ isset($product->sub_subcategory->name) ? '=> '.$product->sub_subcategory->name : ''}}</td>
                                                    <td>{{ $product->code }}</td>
                                                    <td>{{ $product->color }}</td>
                                                    <td><img src="{{ url($product->main_image) }}" style="width: 80px;height: 60px"></td>
                                                    <td>
                                                        <input type="checkbox" data-toggle="toggle" data-width="80" data-height="30" data-on="On"  data-off="Off" id="status" data-id="{{ $product->id }}"  {{ $product->status == 1 ? 'checked' : '' }} >
                                                    <td>
                                                        <a href="{{ route('admin.edit.product',$product->id) }}" title="Edit"><i class="bx bx-edit"></i></a>&nbsp;&nbsp;&nbsp;

                                                        <a href="{{ route('admin.product.add.attributes',$product->id) }}" title="Attribute"><i class="bx bx-list-ol"></i></a>&nbsp;&nbsp;&nbsp;

                                                        <a href="{{ route('admin.product.add.image',$product->id) }}" title="Image"><i class="bx bx-image"></i></a>&nbsp;&nbsp;&nbsp;

                                                        <a href="javascript:void(0)" id="delete" type="button" onclick="deleteData({{ $product->id }})">
                                                            <i class="bx bx-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $product->id }}" action="{{ route('admin.destroy.product', $product->id) }}" method="post" style="display: none">
                                                            @csrf
                                                            @method('post')
                                                        </form>
                                                        <!--End Delete Data-->
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>

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
                url: "{{ route('admin.status.product') }}",
                type: "post",
                data: {id : id, status : status, "_token": "{{ csrf_token() }}"},
                success: function (result) {
                    console.log(result);
                }
            })
        });
    </script>
@endpush
