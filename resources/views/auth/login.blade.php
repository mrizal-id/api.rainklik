@extends('layouts.auth')

@section('content')
    <div class="w-100 mt-auto" style="max-width: 526px;">
        <h1>Masuk ke RainKlik</h1>
        <p class="pb-3 mb-3 mb-lg-4">Belum punya akun?&nbsp;&nbsp;<a href="{{ route('register') }}">Daftar di sini!</a></p>

        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
            @csrf

            <div class="pb-3 mb-3">
                <div class="position-relative">
                    <i class="ai-mail fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                    <input type="email" name="email" placeholder="Alamat Email" value="{{ old('email') }}"
                        class="form-control form-control-lg ps-5 @error('email') is-invalid @enderror">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <div class="position-relative password-toggle">
                    <i class="ai-lock-closed fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                    <input class="form-control form-control-lg ps-5 @error('password') is-invalid @enderror" type="password"
                        name="password" placeholder="Kata Sandi" required>
                    <label class="password-toggle-btn" aria-label="Tampilkan/sembunyikan kata sandi">
                        <input class="password-toggle-check" type="checkbox">
                        <span class="password-toggle-indicator"></span>
                    </label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="d-flex flex-wrap align-items-center justify-content-between pb-4">
                <div class="form-check my-1">
                    <input class="form-check-input" type="checkbox" id="keep-signedin" name="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label ms-1" for="keep-signedin">Tetap masuk</label>
                </div>
                <a href="{{ url('password.request') }}" class="fs-sm fw-semibold text-decoration-none my-1">
                    Lupa Kata Sandi?
                </a>
            </div>

            <button class="btn btn-lg btn-primary w-100 mb-4" type="submit">Masuk</button>

            <h2 class="h6 text-center pt-3 pt-lg-4 mb-4">Atau masuk dengan akun sosial Anda</h2>

            {{-- <div class="row row-cols-1 row-cols-sm-2 gy-3">
            @foreach (['google', 'facebook'] as $provider)
                <div class="col">
                    <a href="{{ route('socialite.redirect', ['provider' => $provider]) }}"
                        class="btn btn-icon btn-outline-secondary btn-{{ $provider }} btn-lg w-100">
                        <i class="ai-{{ $provider }} fs-xl me-2"></i>
                        {{ ucfirst($provider) }}
                    </a>
                </div>
            @endforeach
        </div> --}}
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
