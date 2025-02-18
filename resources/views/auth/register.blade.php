@extends('layouts.auth')
@section('content')
    <div class="w-100 mt-auto" style="max-width: 526px;">
        <h1>No account? Sign up</h1>
        <p class="pb-3 mb-3 mb-lg-4">Have an account already?&nbsp;&nbsp;<a href="{{ route('login') }}">Sign in
                here!</a>
        </p>
        <form class="needs-validation" novalidate="">
            <div class="row row-cols-1 row-cols-sm-2">
                <div class="col mb-4">
                    <input class="form-control form-control-lg" type="text" placeholder="Your name" required="">
                </div>
                <div class="col mb-4">
                    <input class="form-control form-control-lg" type="email" placeholder="Email address" required="">
                </div>
            </div>
            <div class="password-toggle mb-4">
                <input class="form-control form-control-lg" type="password" placeholder="Password" required="">
                <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox">
                    <span class="password-toggle-indicator"></span>
                </label>
            </div>
            <div class="password-toggle mb-4">
                <input class="form-control form-control-lg" type="password" placeholder="Confirm password" required="">
                <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox">
                    <span class="password-toggle-indicator"></span>
                </label>
            </div>
            <div class="pb-4">
                <div class="form-check my-2">
                    <input class="form-check-input" type="checkbox" id="terms">
                    <label class="form-check-label ms-1" for="terms">I agree to <a href="#">Terms &amp;
                            Conditions</a></label>
                </div>
            </div>
            <button class="btn btn-lg btn-primary w-100 mb-4" type="submit">Sign up</button>

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
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

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
                                    required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@push('scripts')
    <script src="/js/main.js"></script>
@endpush
