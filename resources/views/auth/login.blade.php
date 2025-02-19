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

            <x-password-input name="password" />

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
