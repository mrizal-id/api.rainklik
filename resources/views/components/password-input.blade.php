<div class="mb-4">
    <div class="position-relative password-toggle">
        <i class="ai-lock-closed fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
        <input {{ $attributes->merge(['class' => 'form-control form-control-lg ps-5']) }} type="password"
            placeholder="Kata sandi" required>
        <label class="password-toggle-btn" aria-label="Tampilkan/sembunyikan kata sandi">
            <input class="password-toggle-check" type="checkbox">
            <span class="password-toggle-indicator"></span>
        </label>
        @error($attributes->get('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
