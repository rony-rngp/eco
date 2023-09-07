@extends('layouts.backend.app')

@section('title', 'Sub Categories')

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
                                    <h4 class="card-title">Sub Categories</h4>
                                    <a href="{{ route('admin.add.subcategory') }}" class="btn btn-primary">Add Sub Category</a>
                                </div><hr style="margin: 0">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                            <tr>
                                                <th>#SL</th>
                                                <th>Root Category</th>
                                                <th>Sub Category</th>
                                                <th>Slug</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($subcategories as $key => $subcategory)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $subcategory->category->name }}</td>
                                                    <td>{{ $subcategory->name }}</td>
                                                    <td>{{ $subcategory->slug }}</td>
                                                    <td>
                                                        <input type="checkbox" data-toggle="toggle" data-width="80" data-height="30" data-on="On"  data-off="Off" id="status" data-id="{{ $subcategory->id }}"  {{ $subcategory->status == 1 ? 'checked' : '' }} >
                                                    <td>
                                                        <a href="{{ route('admin.edit.subcategory',$subcategory->id) }}" title="Edit"><i class="bx bx-edit"></i></a>&nbsp;&nbsp;

                                                        <a href="javascript:void(0)" id="delete" type="button" onclick="deleteData({{ $subcategory->id }})">
                                                            <i class="bx bx-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $subcategory->id }}" action="{{ route('admin.destroy.subcategory', $subcategory->id) }}" method="post" style="display: none">
                                                            @csrf
                                                            @method('post')
                                                        </form>
                                                        <!--End Delete Data-->
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>#SL</th>
                                                <th>Root Category</th>
                                                <th>Sub Category</th>
                                                <th>Slug</th>
                                                <th>Status</th>
                                                <th>Action</th>
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
                url: "{{ route('admin.status.subcategory') }}",
                type: "post",
                data: {id : id, status : status, "_token": "{{ csrf_token() }}"},
                success: function (result) {
                    console.log(result);
                }
            })
        });
    </script>
@endpush
