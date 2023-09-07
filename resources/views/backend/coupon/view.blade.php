@extends('layouts.backend.app')

@section('title', 'Coupon List')

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
                                    <h4 class="card-title">Brand List</h4>
                                    <a href="{{ route('admin.add.coupon') }}" class="btn btn-primary">Add Coupon</a>
                                </div><hr style="margin: 0">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                            <tr>
                                                <th>#SL</th>
                                                <th>Code</th>
                                                <th>Coupon Type</th>
                                                <th>Amount</th>
                                                <th>Expiry Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($coupons as $key => $coupon)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $coupon->coupon_code }}</td>
                                                    <td>{{ $coupon->coupon_type }}</td>
                                                    <td>
                                                        {{ $coupon->amount }}
                                                        @if($coupon->amount_type == "Percentage")
                                                            %
                                                        @else
                                                            BDT
                                                        @endif
                                                    </td>
                                                    <td>{{ $coupon->expiry_date }}</td>
                                                    <td>
                                                        <input type="checkbox" data-toggle="toggle" data-width="80" data-height="30" data-on="On"  data-off="Off" id="status" data-id="{{ $coupon->id }}"  {{ $coupon->status == 1 ? 'checked' : '' }} >
                                                    <td>
                                                        <a href="{{ route('admin.edit.coupon',$coupon->id) }}" title="Edit"><i class="bx bx-edit"></i></a>&nbsp;&nbsp;

                                                        <a href="javascript:void(0)" id="delete" type="button" onclick="deleteData({{ $coupon->id }})">
                                                            <i class="bx bx-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $coupon->id }}" action="{{ route('admin.destroy.coupon', $coupon->id) }}" method="post" style="display: none">
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
                                                <th>Code</th>
                                                <th>Coupon Type</th>
                                                <th>Amount</th>
                                                <th>Expiry Date</th>
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
                url: "{{ route('admin.status.coupon') }}",
                type: "post",
                data: {id : id, status : status, "_token": "{{ csrf_token() }}"},
                success: function (result) {
                    console.log(result);
                }
            })
        });
    </script>
@endpush
