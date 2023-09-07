@extends('layouts.frontend.app')

@section('title')
    Edit Profile
@endsection

@push('css')

@endpush

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Edit Profile</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>


    @include('frontend.account.account_sidebar')

    <div class="col-md-9">
        <div class="col-md-12  sign-in panel">
            <h4 class="">Update Your Account Details</h4>
            <hr>
            <p class="">You can't update your email</p>

            <form id="updateDetails" action="{{ route('user.update.profile') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="info-title" for="name">Name <span style="color: red">*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" name="name" value="{{ $user->name }}" id="name">
                </div>
                <div class="form-group">
                    <label class="info-title" for="address">Address <span style="color: red">*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" name="address" value="{{ $user->address }}" id="address">
                </div>
                <div class="form-group">
                    <label class="info-title" for="country">Country <span style="color: red">*</span></label>
                    <select name="country" id="country" class="form-control nicase-form-control select2">
                        <option >Select Country</option>
                        @foreach($countries as $country)
                            <option {{ $user->country == $country->countriesy_name ? 'selected' : '' }} value="{{ $country->countriesy_name }}">{{ $country->countriesy_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="info-title" for="state">State<span style="color: red">*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" name="state" value="{{ $user->state }}" id="state">
                </div>
                <div class="form-group">
                    <label class="info-title" for="city">City <span style="color: red">*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" name="city" value="{{ $user->city }}" id="city">
                </div>
                <div class="form-group">
                    <label class="info-title" for="zip_code">Zip Code <span style="color: red">*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" name="zip_code" value="{{ $user->zip_code }}" id="zip_code">
                </div>
                <div class="form-group">
                    <label class="info-title" for="mobile">Mobile <span style="color: red">*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" name="mobile" value="{{ $user->mobile }}" id="mobile">
                </div>


                <div class="form-group">
                    <label class="info-title" for="email">Email Address</label>
                    <input  class="form-control unicase-form-control text-input" value="{{ $user->email }}" readonly>
                </div>
                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update</button>
            </form><br>
        </div>

    </div>



@endsection

@push('js')
<script>
    $(document).ready(function () {
        $("#updateDetails").validate({
            rules: {
                name: {
                    required: true,
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
