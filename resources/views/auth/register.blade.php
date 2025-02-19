@extends('layouts.auth')
@section('content')
    <div class="w-100 mt-auto" style="max-width: 526px;">
        <h1>Belum punya akun?<br> Daftar</h1>
        <p class="pb-3 mb-3 mb-lg-4">Sudah punya akun?&nbsp;&nbsp;<a href="{{ route('login') }}">Masuk di sini!</a></p>

        <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
            @csrf

            <div class="pb-3 mb-3">
                <div class="position-relative">
                    <i class="ai-user fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                    <input type="text" name="name" placeholder="Masukkan nama" value="{{ old('name') }}"
                        class="form-control form-control-lg ps-5 @error('name') is-invalid @enderror" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="pb-3 mb-3">
                <div class="position-relative">
                    <i class="ai-mail fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                    <input type="email" name="email" placeholder="Alamat email" value="{{ old('email') }}"
                        class="form-control form-control-lg ps-5 @error('email') is-invalid @enderror" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <x-password-input name="password" />
            <x-password-input name="password_confirmation" />

            <button class="btn btn-lg btn-primary w-100 mb-4" type="submit">Buat Akun</button>

            <h2 class="h6 text-center pt-3 pt-lg-4 mb-4">Atau daftar dengan akun sosial Anda</h2>

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

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".password-toggle-btn").forEach(button => {
                button.addEventListener("click", function() {
                    let input = this.previousElementSibling;
                    input.type = input.type === "password" ? "text" : "password";
                });
            });
        });
    </script>
@endpush
