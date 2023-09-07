@extends('layouts.backend.app')

@section('title', 'Shipping List')

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
                                    <h4 class="card-title">Shipping Charges</h4>
                                </div><hr style="margin: 0">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                            <tr>
                                                <th>#SL</th>
                                                <th>District</th>
                                                <th>0 to 500g</th>
                                                <th>501 to 1000g</th>
                                                <th>1001 to 2000g</th>
                                                <th>2001 to 5000g</th>
                                                <th>Above 5000g</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($shipping_charges as $key => $shipping_charge)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $shipping_charge->district }}</td>
                                                    <td>&#2547; {{ $shipping_charge['0_500g'] }}</td>
                                                    <td>&#2547; {{ $shipping_charge['501_1000g'] }}</td>
                                                    <td>&#2547; {{ $shipping_charge['1001_2000g'] }}</td>
                                                    <td>&#2547; {{ $shipping_charge['2001_5000g'] }}</td>
                                                    <td>&#2547; {{ $shipping_charge['above_5000g'] }}</td>
                                                    <td>
                                                        <input type="checkbox" data-toggle="toggle" data-width="70" data-height="30" data-on="On"  data-off="Off" id="status" data-id="{{ $shipping_charge->id }}"  {{ $shipping_charge->status == 1 ? 'checked' : '' }} >
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.edit.shipping',$shipping_charge->id ) }}"> <i class="bx bx-edit"></i></a>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>#SL</th>
                                                <th>District</th>
                                                <th>0 to 500g</th>
                                                <th>501 to 1000g</th>
                                                <th>1001 to 2000g</th>
                                                <th>2001 to 5000g</th>
                                                <th>Above 5000g</th>
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

    <script>
        $(document).on('change', '#status', function () {
            var id = $(this).attr('data-id');
            if(this.checked){
                var status = 1;
            }else{
                var status = 0;
            }

            $.ajax({
                url: "{{ route('admin.shipping.status') }}",
                type: "GET",
                data: {id : id, status : status},
                success: function (result) {
                    console.log(result);
                }
            });
        });
    </script>
@endpush
