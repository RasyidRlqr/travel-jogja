<x-guest-layout title="Masuk" >
    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success mb-4">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" >
        @csrf

        <!-- Email Address -->
        <div class="mb-4" >
            <div class="form-floating">
                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                       name="email" :value="old('email')" required autofocus autocomplete="username"
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
            <div class="form-floating position-relative">
                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password"
                        placeholder="Password">
                <label for="password">
                    <i class="bi bi-lock me-2"></i>Password
                </label>
                <button type="button" class="btn btn-outline-secondary btn-sm position-absolute top-50 end-0 translate-middle-y me-2" id="togglePassword">
                    <i class="bi bi-eye" id="passwordIcon"></i>
                </button>
            </div>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="mb-4">
            <div class="form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label text-muted">
                    Ingat saya
                </label>
            </div>
        </div>

        <div class="d-grid mb-4">
            <button type="submit" class="btn btn-primary btn-modern btn-lg">
                <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
            </button>
        </div>

        <div class="text-center">
            @if (Route::has('password.request'))
                <a class="text-muted text-decoration-none hover-primary" href="{{ route('password.request') }}">
                    <i class="bi bi-question-circle me-1"></i>Lupa password?
                </a>
            @endif
        </div>

        <hr class="my-4">

        <div class="text-center">
            <p class="text-muted mb-2">Belum punya akun?</p>
            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-modern">
                <i class="bi bi-person-plus me-2"></i>Daftar Sekarang
            </a>
        </div>
    </form>
</x-guest-layout>
