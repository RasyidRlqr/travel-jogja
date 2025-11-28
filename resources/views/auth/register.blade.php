<x-guest-layout title="Daftar">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <div class="form-floating">
                <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                       name="name" :value="old('name')" required autofocus autocomplete="name"
                       placeholder="Nama Lengkap">
                <label for="name">
                    <i class="bi bi-person me-2"></i>Nama Lengkap
                </label>
            </div>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <div class="form-floating">
                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                       name="email" :value="old('email')" required autocomplete="username"
                       placeholder="Email">
                <label for="email">
                    <i class="bi bi-envelope me-2"></i>Email
                </label>
            </div>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <div class="form-floating">
                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                       name="password" required autocomplete="new-password"
                       placeholder="Password">
                <label for="password">
                    <i class="bi bi-lock me-2"></i>Password
                </label>
            </div>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <div class="form-floating">
                <input id="password_confirmation" type="password" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                       name="password_confirmation" required autocomplete="new-password"
                       placeholder="Konfirmasi Password">
                <label for="password_confirmation">
                    <i class="bi bi-lock-fill me-2"></i>Konfirmasi Password
                </label>
            </div>
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid mb-4">
            <button type="submit" class="btn btn-primary btn-modern btn-lg">
                <i class="bi bi-person-plus me-2"></i>Daftar
            </button>
        </div>

        <hr class="my-4">

        <div class="text-center">
            <p class="text-muted mb-2">Sudah punya akun?</p>
            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-modern">
                <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
            </a>
        </div>
    </form>
</x-guest-layout>
