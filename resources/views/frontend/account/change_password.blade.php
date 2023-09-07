@extends('layouts.frontend.app')

@section('title')
    Change Password
@endsection

@push('css')

@endpush

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Change Password</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>


    @include('frontend.account.account_sidebar')

    <div class="col-md-9">
        <div class="col-md-12  sign-in panel">
            <h4 class="">You can change your current password</h4>
            <hr>

            <form id="changePassword" action="{{ route('update.password') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="info-title" for="current_password">Current Password <span style="color: red">*</span></label>
                    <input type="password" class="form-control unicase-form-control text-input @error('current_password') is-invalid @enderror" name="current_password" id="current_password">
                    @error('current_password')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="info-title" for="password">New Password <span style="color: red">*</span></label>
                    <input type="password" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror" name="password" id="password" autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="info-title" for="password_confirmation">Confirm Password <span style="color: red">*</span></label>
                    <input type="password" class="form-control unicase-form-control text-input" name="password_confirmation" id="password_confirmation">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update</button>
            </form><br>
        </div>

    </div>



@endsection

@push('js')
    <script>
        $(document).ready(function () {

            $("#changePassword").validate({
                rules: {
                    current_password: {
                        required: true,
                        remote : "{{ route('check.current.password') }}",
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password"
                    },
                },
                messages: {
                    current_password: {
                        remote: "Current password is wrong (:",
                    }
                }
            });
        });
    </script>
@endpush
