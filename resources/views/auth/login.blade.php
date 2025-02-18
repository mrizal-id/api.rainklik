@extends('layouts.auth')

@section('content')
    <div class="w-100 mt-auto" style="max-width: 526px;">
        <h1>Sign in to RainKlik</h1>
        <p class="pb-3 mb-3 mb-lg-4">Don't have an account yet?&nbsp;&nbsp;<a href="{{ route('register') }}">Register
                here!</a></p>
        <form class="needs-validation" novalidate="">
            <div class="pb-3 mb-3">
                <div class="position-relative">
                    <i class="ai-mail fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                    <input class="form-control form-control-lg ps-5" type="email" placeholder="Email address"
                        required="">
                </div>
            </div>
            <div class="mb-4">
                <div class="position-relative">
                    <i class="ai-lock-closed fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                    <div class="password-toggle">
                        <input class="form-control form-control-lg ps-5" type="password" placeholder="Password"
                            required="">
                        <label class="password-toggle-btn" aria-label="Show/hide password">
                            <input class="password-toggle-check" type="checkbox"><span
                                class="password-toggle-indicator"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-wrap align-items-center justify-content-between pb-4">
                <div class="form-check my-1">
                    <input class="form-check-input" type="checkbox" id="keep-signedin">
                    <label class="form-check-label ms-1" for="keep-signedin">Keep me signed in</label>
                </div>
                <a class="fs-sm fw-semibold text-decoration-none my-1" href="account-password-recovery.html">Forgot
                    password?</a>
            </div>
            <button class="btn btn-lg btn-primary w-100 mb-4" type="submit">Sign in</button>

            <!-- Sign in with social account -->
            <h2 class="h6 text-center pt-3 pt-lg-4 mb-4">Or sign in with your social account</h2>
            <div class="row row-cols-1 row-cols-sm-2 gy-3">
                <div class="col">
                    <a class="btn btn-icon btn-outline-secondary btn-google btn-lg w-100" href="#">
                        <i class="ai-google fs-xl me-2"></i>
                        Google
                    </a>
                </div>
                <div class="col">
                    <a class="btn btn-icon btn-outline-secondary btn-facebook btn-lg w-100" href="#">
                        <i class="ai-facebook fs-xl me-2"></i>
                        Facebook
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
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
</div> --}}
