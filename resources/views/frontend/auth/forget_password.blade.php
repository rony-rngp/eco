@extends('layouts.frontend.app')

@section('title')
    Forgot Password
@endsection

@push('css')

@endpush

@section('content')


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Forgot Password</li>
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
                        <h4 class="">Forgot Password</h4>
                        <p class="">Enter your email to get the new password..</p>

                        <form id="forgotPwd" action="{{ route('forget.password') }}" method="post" class="register-form outer-top-xs" role="form">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" name="email" value="{{ old('email') }}" id="login_email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit</button>
                        </form>
                    </div>
                    <!-- Sign-in -->

                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Sign in</h4>
                        <p class="">Hello, Welcome to your account.</p>

                        <form id="login" action="{{ route('user.login') }}" method="post" class="register-form outer-top-xs" role="form">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="login_email">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" name="login_email" value="{{ old('login_email') }}" id="login_email">
                                @error('login_email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="login_password">Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" name="login_password" id="login_password">
                                @error('login_password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="radio outer-xs">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                                <a href="{{ route('forget.password') }}" class="forgot-password pull-right">Forgot your Password?</a>
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                        </form>
                    </div>
                    <!-- Sign-in -->
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div><br><br><br>




        @endsection

        @push('js')

            <script>
                $(document).ready(function() {
                    // validate signup form on keyup and submit
                    $("#forgotPwd").validate({
                        rules: {
                            email: {
                                required: true,
                                email: true,
                            },

                        },
                        messages: {

                        }
                    });

                    $("#login").validate({
                        rules: {
                            login_email: {
                                required: true,
                                email: true,
                            },
                            login_password: {
                                required: true,
                            },

                        },
                        messages: {
                            email: {
                                required: "Please enter your email.",
                                email: "Please enter a valid email address.",
                            },
                            password: {
                                required : "Please enter your password"
                            },
                        }
                    });

                });
            </script>
    @endpush
