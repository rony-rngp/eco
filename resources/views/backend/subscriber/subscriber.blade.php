@extends('layouts.backend.app')

@section('title', 'Subscriber List')

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
                                    <h4 class="card-title">Subscriber List ({{ $subscribers->count() }})</h4>
                                </div><hr style="margin: 0">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                            <tr>
                                                <th>#SL</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($subscribers as $key => $subscriber)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $subscriber->email }}</td>
                                                    <td>
                                                        <input type="checkbox" data-toggle="toggle" data-width="80" data-height="30" data-on="On"  data-off="Off" id="status" data-id="{{ $subscriber->id }}"  {{ $subscriber->status == 1 ? 'checked' : '' }} >
                                                    <td>
                                                        <a href="javascript:void(0)" id="delete" type="button" onclick="deleteData({{ $subscriber->id }})">
                                                            <i class="bx bx-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $subscriber->id }}" action="{{ route('admin.subscriber.destroy', $subscriber->id) }}" method="post" style="display: none">
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
                                                <th>Name</th>
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
                url: "{{ route('admin.subscriber.status') }}",
                type: "post",
                data: {id : id, status : status, "_token": "{{ csrf_token() }}"},
                success: function (result) {
                    console.log(result);
                }
            })
        });
    </script>
@endpush
