@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-body p-0">

                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>

                            <div class="col-lg-6">

                                <div class="p-5">

                                    <div class="text-center">

                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>

                                    </div>

                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group">

                                            <input id="email" type="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus placeholder="Enter Email Address...">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">

                                            <input id="password" type="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">

                                            <div class="custom-control custom-checkbox small">

                                                <input class="custom-control-input" type="checkbox" name="remember"
                                                    id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customCheck">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>

                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('login') }}
                                        </button>

                                        <hr>

                                        <a href="{{ url('login/google') }}" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>

                                        <a href="{{ url('login/facebook') }}" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>

                                        <hr>

                                        @if (Route::has('password.request'))
                                            <div class="text-center">

                                                <a class="small" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Password?') }}
                                                </a>

                                            </div>
                                        @endif

                                        @if (Route::has('register'))
                                            <div class="text-center">

                                                <a class="small" href="{{ route('register') }}">
                                                    {{ __('Create an Account!') }}
                                                </a>

                                            </div>
                                        @endif

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
