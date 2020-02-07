{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" href="{{asset('LoginAssets/font-awesome-4.7.0/css/font-awesome.min.css')}}">
        <!--===============================================================================================-->
        <link rel="stylesheet" href="{{asset('LoginAssets/css/util.css')}}">
        <link rel="stylesheet" href="{{asset('LoginAssets/css/main.css')}}">
        <!--===============================================================================================-->
    </head>
    <body>
        
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-form-title" style="background-image: url({{asset('LoginAssets/login.jpg')}});">
                        <span class="login100-form-title-1">
                            Sign In
                        </span>
                    </div>

                    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="wrap-input100 validate-input m-b-7" data-validate="Email is required">
                            <span class="label-input100">Email</span>
                            <input class="input100 @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter your email" id="email" value="{{ old('email') }}" autofocus required>
                        </div>
                        @error('email')
                                <p style="color:red; font-style:italic; font-size:11px; margin-top:-5px">{{ $message }}</p>
                        @enderror

                        <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                            <span class="label-input100">Password</span>
                            <input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter password" required>
                        </div>

                        <div class="flex-sb-m w-full p-b-30">
                            <div>
                            </div>
                            <div class="contact100-form-checkbox">
                                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                                <label class="label-checkbox100" for="ckb1">
                                    Remember me
                                </label>
                            </div>

                        </div>

                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn"> Login </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
    </body>
</html>