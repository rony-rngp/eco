@extends('layouts.frontend.app')

@section('title')
    Reset Password
@endsection

@push('css')

@endpush

@section('content')


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Reset Password</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">New Password</h4>
                        <p class="">Enter your new password..</p>

                        <form id="resetPwd" action="{{ route('reset.password.update', $token) }}" method="post" class="register-form outer-top-xs" role="form">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="password">New Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror" name="password" id="password" autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" name="password_confirmation" id="password_confirmation">
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit</button>
                        </form>
                    </div>
                    <!-- Sign-in -->
                    <!-- Sign-in -->
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div><br><br><br>




        @endsection

        @push('js')

            <script>
                $(document).ready(function() {
                    // validate signup form on keyup and submit

                    $("#resetPwd").validate({
                        rules: {
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

                        }
                    });

                });
            </script>
    @endpush
