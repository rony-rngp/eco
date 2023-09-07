@extends('layouts.frontend.app')

@section('title')
   Edit Delivery Address
@endsection

@push('css')

@endpush

@section('content')


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Edit Delivery Address</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="">Delivery address</h4>
                        <form id="quickForms" action="{{ route('update.delivery.address', $address->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First name</label>
                                    <input type="text" class="form-control unicase-form-control text-input" name="first_name" id="first_name" placeholder="Enter First Name" value="{{ $address->first_name }}" >
                                    <span style="color:red">{{ $errors->has('first_name') ? $errors->first('first_name') : '' }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last name</label>
                                    <input type="text" class="form-control unicase-form-control text-input" name="last_name" id="last_name" placeholder="Enter Last Name" value="{{ $address->last_name }}" >
                                    <span style="color:red">{{ $errors->has('last_name') ? $errors->first('last_name') : '' }}</span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control unicase-form-control text-input" name="address" id="address" placeholder="Enter Address" value="{{ $address->address }}">
                                <span style="color:red">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="country">Country</label>
                                    <select class="form-control unicase-form-control text-input" name="country" id="country">
                                        <option value="">Choose...</option>
                                        @foreach($countries as $country)
                                            <option {{ $address->country == $country->countriesy_name ? 'selected' : '' }} value="{{ $country->countriesy_name }}">{{ $country->countriesy_name }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red">{{ $errors->has('country') ? $errors->first('country') : '' }}</span>
                                </div>

                                <div class="col-md-3 form-group">
                                    <label for="division">Division</label>
                                    <input type="text" class="form-control unicase-form-control text-input" name="division" id="division" placeholder="Enter Division" value="{{ $address->division }}">
                                    <span style="color:red">{{ $errors->has('division') ? $errors->first('division') : '' }}</span>
                                </div>

                                <div class="col-md-3 form-group">
                                    <label for="district">District</label>
                                    <select class="form-control unicase-form-control text-input" name="district" id="district">
                                        <option value="">Choose...</option>
                                        @foreach($districts as $district)
                                            <option {{ $address->district == $district->name ? 'selected' : '' }} value="{{ $district->name }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red">{{ $errors->has('district') ? $errors->first('district') : '' }}</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="zip_code">Zip Code</label>
                                    <input type="text" class="form-control unicase-form-control text-input" name="zip_code" id="zip_code" placeholder="Enter Zip Code" value="{{ $address->zip_code }}">
                                    <span style="color:red">{{ $errors->has('zip_code') ? $errors->first('zip_code') : '' }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" class="form-control unicase-form-control text-input" name="mobile" id="mobile" placeholder="Enter Mobile" value="{{ $address->mobile }}">
                                    <span style="color:red">{{ $errors->has('mobile') ? $errors->first('mobile') : '' }}</span>
                                </div>
                            </div>

                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.sigin-in-->
        </div><br><br><br>




        @endsection

        @push('js')

            <script>
                $(document).ready(function() {
                    // validate signup form on keyup and submit
                    $("#quickForms").validate({
                        rules: {
                            first_name: {
                                required: true,
                                minlength: 3,
                            },
                            last_name: {
                                required: true,
                                minlength: 3,
                            },
                            address: {
                                required: true,
                                minlength: 3,
                            },
                            country: {
                                required: true,
                            },
                            division: {
                                required: true,
                            },
                            district: {
                                required: true,
                            },
                            zip_code: {
                                required: true,
                                number : true
                            },
                            mobile: {
                                required: true,
                                minlength: 10,
                                maxlength: 18
                            },

                        },
                        messages: {

                        }
                    });
                });
            </script>
    @endpush
