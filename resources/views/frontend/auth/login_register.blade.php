@extends('layouts.frontend.app')

@section('title')
    Shopping Cart
@endsection

@push('css')

@endpush

@section('content')


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Login / Register</li>
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
                        <h4 class="">Sign in</h4>
                        <p class="">Hello, Welcome to your account.</p>
                        <div class="social-sign-in outer-top-xs">
                            <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                            <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                        </div>
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

                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">Create a new account</h4>
                        <p class="text title-tag-line">Create your new account.</p>
                        <form id="quickForms" action="{{ route('user.register') }}" method="post" class="register-form outer-top-xs" role="form">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" name="email" id="email" value="{{ old('email') }}" autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="name">Name <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" autocomplete="name" autofocus name="name" value="{{ old('name') }}" id="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="mobile">Phone Number <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" name="mobile" autocomplete="mobile" value="{{ old('mobile') }}" id="mobile" >
                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">Password <span>*</span></label>
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
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                        </form>


                    </div>
                    <!-- create a new account -->
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div><br><br><br>




@endsection

@push('js')

    <script>
        $(document).ready(function() {
            // validate signup form on keyup and submit
            $("#quickForms").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                    },
                    mobile: {
                        required: true,
                        minlength: 10,
                        maxlength: 18
                    },
                    email: {
                        required: true,
                        email: true,
                        remote: "{{ route('check.email') }}"
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
                    name: {
                        required : "Please enter your name",
                    },
                    mobile: {
                        required: "Please enter your mobile",
                    },
                    email: {
                        required: "Please enter your email.",
                        email: "Please enter a valid email address.",
                        remote: "Email already exists.",
                    },
                    password: {
                        required : "Please enter your password"
                    },
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
