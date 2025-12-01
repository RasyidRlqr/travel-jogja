<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Travel Jogja - Daftar">
    <meta name="keywords" content="travel jogja, register, daftar, wisata jogja">

    <title>Travel Jogja - Daftar</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }

        .auth-section {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .auth-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .auth-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(26, 35, 53, 0.85) 0%, rgba(45, 55, 72, 0.75) 50%, rgba(66, 153, 225, 0.6) 100%);
            z-index: 2;
        }

        .auth-content {
            position: relative;
            z-index: 3;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
        }

        .btn-modern {
            border-radius: 50px;
            padding: 12px 32px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .form-floating > label {
            padding: 1rem 0.75rem;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }
    </style>
</head>
<body>
    <!-- Auth Section -->
    <section class="auth-section">
        <!-- Background -->
        <div class="auth-bg">
            <img src="https://i.imgur.com/PJX8SsD.jpeg" alt="Yogyakarta Landscape" class="w-100 h-100 object-fit-cover">
        </div>

        <!-- Content -->
        <div class="container position-relative h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="auth-content text-white">
                        <h1 class="display-4 fw-bold mb-4">
                            Selamat Datang di <span class="text-primary">Travel Jogja</span>
                        </h1>
                        <p class="lead fs-5 mb-4 opacity-90">
                            Masuk atau daftar untuk mendapatkan pengalaman wisata terbaik di Yogyakarta.
                        </p>
                        <div class="d-flex gap-3">
                            <div class="text-center">
                                <div class="h1 fw-bold text-primary mb-1">500+</div>
                                <small class="text-white-50">Wisatawan Puas</small>
                            </div>
                            <div class="text-center">
                                <div class="h1 fw-bold text-primary mb-1">50+</div>
                                <small class="text-white-50">Destinasi Wisata</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-8 mx-auto">
                    <div class="auth-content">
                        <div class="glass-card p-5 shadow-lg">
                            <div class="text-center mb-4">
                                <a href="/" class="d-inline-block mb-3">
                                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center"
                                         style="width: 60px; height: 60px;">
                                        <i class="bi bi-compass text-white fs-3"></i>
                                    </div>
                                </a>
                                <h2 class="fw-bold text-dark mb-2">Daftar</h2>
                                <p class="text-muted">Travel Jogja Professional</p>
                            </div>

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
                                    <div class="form-floating position-relative">
                                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password"
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

                                <!-- Confirm Password -->
                                <div class="mb-4">
                                    <div class="form-floating position-relative">
                                        <input id="password_confirmation" type="password" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="Konfirmasi Password">
                                        <label for="password_confirmation">
                                            <i class="bi bi-lock-fill me-2"></i>Konfirmasi Password
                                        </label>
                                        <button type="button" class="btn btn-outline-secondary btn-sm position-absolute top-50 end-0 translate-middle-y me-2" id="toggleConfirmPassword">
                                            <i class="bi bi-eye" id="confirmPasswordIcon"></i>
                                        </button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Password Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password toggle for login/register
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('passwordIcon');

            if (togglePassword && passwordInput && passwordIcon) {
                togglePassword.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    // Toggle icon
                    if (type === 'password') {
                        passwordIcon.classList.remove('bi-eye-slash');
                        passwordIcon.classList.add('bi-eye');
                    } else {
                        passwordIcon.classList.remove('bi-eye');
                        passwordIcon.classList.add('bi-eye-slash');
                    }
                });
            }

            // Password confirmation toggle for register
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const confirmPasswordIcon = document.getElementById('confirmPasswordIcon');

            if (toggleConfirmPassword && confirmPasswordInput && confirmPasswordIcon) {
                toggleConfirmPassword.addEventListener('click', function() {
                    const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    confirmPasswordInput.setAttribute('type', type);

                    // Toggle icon
                    if (type === 'password') {
                        confirmPasswordIcon.classList.remove('bi-eye-slash');
                        confirmPasswordIcon.classList.add('bi-eye');
                    } else {
                        confirmPasswordIcon.classList.remove('bi-eye');
                        confirmPasswordIcon.classList.add('bi-eye-slash');
                    }
                });
            }
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
