@extends('layouts.backend.app')

@section('title', 'Edit Shipping')

@push('css')

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
                                    <h4 class="card-title">Edit Shipping</h4>
                                    <a href="{{ route('admin.view.shipping') }}" class="btn mr-1 mb-1 btn-outline-primary"> Shipping List</a>
                                </div><hr style="margin: 0">
                                <div class="card-body card-dashboard">
                                    <form class="form" id="quickForms" action="{{ route('admin.update.shipping', $shipping->id) }}" method="post">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>District</label>
                                                        <input type="text" class="form-control" value="{{ $shipping->district }}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="0_500g">Shipping Charges ( 0 - 500g )</label>
                                                        <input type="text" name="0_500g" class="form-control" id="0_500g" value="{{ $shipping['0_500g'] }}" placeholder="Shipping Charges ( 0 - 500g )">
                                                        <span style="color:red">{{ $errors->has('0_500g') ? $errors->first('0_500g') : '' }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="501_1000g">Shipping Charges ( 501 - 1000g )</label>
                                                        <input type="text" name="501_1000g" class="form-control"  value="{{ $shipping['501_1000g'] }}" placeholder="Shipping Charges ( 501 - 1000g )">
                                                        <span style="color:red">{{ $errors->has('501_1000g') ? $errors->first('501_1000g') : '' }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="1001_2000g">Shipping Charges ( 1001 - 2000g )</label>
                                                        <input type="text" name="1001_2000g" class="form-control"  value="{{ $shipping['1001_2000g'] }}" placeholder="Shipping Charges ( 1001 - 2000g )">
                                                        <span style="color:red">{{ $errors->has('1001_2000g') ? $errors->first('1001_2000g') : '' }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="2001_5000g">Shipping Charges ( 2001 - 5000g )</label>
                                                        <input type="text" name="2001_5000g" class="form-control"  value="{{ $shipping['2001_5000g'] }}" placeholder="Shipping Charges ( 2001 - 5000g )">
                                                        <span style="color:red">{{ $errors->has('2001_5000g') ? $errors->first('2001_5000g') : '' }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="above_5000g">Shipping Charges ( Above 5000g )</label>
                                                        <input type="text" name="above_5000g" class="form-control"  value="{{ $shipping['above_5000g'] }}" placeholder="Shipping Charges ( Above 5000g )">
                                                        <span style="color:red">{{ $errors->has('above_5000g') ? $errors->first('above_5000g') : '' }}</span>
                                                    </div>
                                                </div>


                                                <div class="col-12 justify-content-end">
                                                    <button type="submit" class="btn btn-primary mr-1">Update </button>
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
    <script type="text/javascript">
        $(document).ready(function () {

            $("#quickForms").validate({
                rules: {
                    "0_500g" : {
                        required: true,
                        number : true
                    },
                    "501_1000g" : {
                        required: true,
                        number : true
                    },
                    "1001_2000g" : {
                        required: true,
                        number : true
                    },
                    "2001_5000g" : {
                        required: true,
                        number : true
                    },
                    "above_5000g" : {
                        required: true,
                        number : true
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
