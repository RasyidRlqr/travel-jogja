<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Travel Jogja - Admin Panel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #1a1a2e 0%, #16213e 100%);
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            position: fixed;
            width: 260px;
            z-index: 1000;
        }

        .sidebar .brand {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }

        .sidebar .brand h5 {
            color: white;
            margin: 0;
            font-weight: 600;
        }

        .sidebar .brand small {
            color: #a8a8a8;
            font-size: 0.8rem;
        }

        .sidebar .nav-link {
            color: #b8c5d6;
            padding: 0.75rem 1.5rem;
            margin: 0.25rem 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: white;
            transform: translateX(5px);
        }

        .sidebar .nav-link.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .sidebar .nav-link i {
            width: 20px;
            text-align: center;
        }

        .content-wrapper {
            margin-left: 260px;
            min-height: 100vh;
        }

        .top-navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .user-dropdown .dropdown-toggle::after {
            margin-left: 0.5rem;
        }

        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem 0;
            margin: -1rem -1rem 2rem -1rem;
            border-radius: 0 0 20px 20px;
        }

        .page-header h1 {
            margin: 0;
            font-weight: 600;
        }

        .modern-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            border: none;
            overflow: hidden;
        }

        .modern-card .card-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-bottom: 1px solid #dee2e6;
            padding: 1.25rem 1.5rem;
        }

        .modern-card .card-header h5 {
            margin: 0;
            font-weight: 600;
            color: #495057;
        }

        .btn-modern {
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .content-wrapper {
                margin-left: 0;
            }
            .mobile-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.5);
                z-index: 999;
                display: none;
            }
            .mobile-overlay.show {
                display: block;
            }
        }

        .sidebar-toggle {
            display: none;
        }

        @media (max-width: 768px) {
            .sidebar-toggle {
                display: block;
            }
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .input-group-lg .input-group-text {
            border-radius: 0.5rem 0 0 0.5rem;
        }

        .form-select:focus,
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .card-header {
            border: none;
            border-radius: 15px 15px 0 0 !important;
        }

        .modern-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <!-- Mobile Overlay -->
    <div class="mobile-overlay" id="mobileOverlay"></div>

    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="brand">
            <div class="d-flex align-items-center justify-content-center mb-2">
                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                      style="width: 40px; height: 40px;">
                    <i class="bi bi-compass text-white fs-5"></i>
                </div>
                <div>
                    <h5>Travel Jogja</h5>
                    <small>Admin Panel</small>
                </div>
            </div>
        </div>

        <ul class="nav flex-column px-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-house-door"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.blog.index') }}">
                    <i class="bi bi-pencil-square"></i>
                    <span>Blog</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.tour.index') }}">
                    <i class="bi bi-map"></i>
                    <span>Paket Wisata</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.gallery.index') }}">
                    <i class="bi bi-images"></i>
                    <span>Galeri</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.user.index') }}">
                    <i class="bi bi-people"></i>
                    <span>Pengguna</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.settings.index') }}">
                    <i class="bi bi-gear"></i>
                    <span>Pengaturan</span>
                </a>
            </li>

            <li class="nav-item mt-4">
                <a class="nav-link text-warning" href="{{ route('home') }}" style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1rem;">
                    <i class="bi bi-arrow-left"></i>
                    <span>Kembali ke Website</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="content-wrapper">
        <!-- Top Navbar -->
        <nav class="navbar top-navbar">
            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <button class="btn btn-link sidebar-toggle me-3" onclick="toggleSidebar()">
                        <i class="bi bi-list fs-4 text-dark"></i>
                    </button>
                    <h6 class="mb-0 text-muted d-none d-md-block">Panel Administrator</h6>
                </div>

                <div class="d-flex align-items-center">
                    <div class="dropdown">
                        <button class="btn btn-link text-dark dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-2"
                                  style="width: 35px; height: 35px;">
                                <i class="bi bi-person-fill text-white"></i>
                            </div>
                            <span class="d-none d-lg-inline">{{ Auth::user()->name }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="bi bi-person me-2"></i>Profil
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="container-fluid p-4">
            <div class="page-header mb-4">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col">
                            <h1 class="h2 mb-0">Tambah User</h1>
                            <p class="mb-0 opacity-75">Kelola konten dan data website Travel Jogja</p>
                        </div>
                        <div class="col-auto">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 bg-transparent p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-white">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}" class="text-white">Kelola User</a></li>
                                    <li class="breadcrumb-item active text-white-50" aria-current="page">Tambah User</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <strong>Berhasil!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>Error!</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="modern-card shadow-lg">
                        <div class="card-header bg-gradient-primary text-white">
                            <div class="d-flex align-items-center">
                                <div class="bg-white bg-opacity-20 rounded-circle p-2 me-3">
                                    <i class="bi bi-person-plus-fill fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0 fw-bold">Tambah User Baru</h5>
                                    <small class="opacity-75">Buat akun admin atau sub-admin baru</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <form method="POST" action="{{ route('admin.user.store') }}" class="needs-validation" novalidate>
                                @csrf

                                <!-- Name -->
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-semibold text-dark mb-2">
                                        <i class="bi bi-person-circle text-primary me-2"></i>Nama Lengkap
                                    </label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-person text-muted"></i>
                                        </span>
                                        <input id="name" type="text" class="form-control border-start-0 ps-0 @error('name') is-invalid @enderror"
                                               name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                                               placeholder="Masukkan nama lengkap" style="border-left: none; padding-left: 0;">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-semibold text-dark mb-2">
                                        <i class="bi bi-envelope-circle text-primary me-2"></i>Alamat Email
                                    </label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-envelope text-muted"></i>
                                        </span>
                                        <input id="email" type="email" class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" required autocomplete="username"
                                               placeholder="contoh@email.com" style="border-left: none; padding-left: 0;">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="mb-4">
                                    <label for="password" class="form-label fw-semibold text-dark mb-2">
                                        <i class="bi bi-shield-lock-circle text-primary me-2"></i>Password
                                    </label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-lock text-muted"></i>
                                        </span>
                                        <input id="password" type="password" class="form-control border-start-0 ps-0 @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="new-password"
                                               placeholder="Minimal 8 karakter" style="border-left: none; padding-left: 0;">
                                        <button class="btn btn-outline-secondary border-start-0" type="button" id="togglePassword">
                                            <i class="bi bi-eye" id="passwordIcon"></i>
                                        </button>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label fw-semibold text-dark mb-2">
                                        <i class="bi bi-shield-check-circle text-primary me-2"></i>Konfirmasi Password
                                    </label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-lock-fill text-muted"></i>
                                        </span>
                                        <input id="password_confirmation" type="password" class="form-control border-start-0 ps-0 @error('password_confirmation') is-invalid @enderror"
                                               name="password_confirmation" required autocomplete="new-password"
                                               placeholder="Ulangi password" style="border-left: none; padding-left: 0;">
                                        <button class="btn btn-outline-secondary border-start-0" type="button" id="toggleConfirmPassword">
                                            <i class="bi bi-eye" id="confirmPasswordIcon"></i>
                                        </button>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Role -->
                                <div class="mb-4">
                                    <label for="role" class="form-label fw-semibold text-dark mb-2">
                                        <i class="bi bi-person-badge-circle text-primary me-2"></i>Level Akses
                                    </label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-shield-check text-muted"></i>
                                        </span>
                                        <select id="role" name="role" class="form-select border-start-0 ps-0 @error('role') is-invalid @enderror" required style="border-left: none; padding-left: 0;">
                                            <option value="">Pilih level akses</option>
                                            <option value="sub_admin" {{ old('role') == 'sub_admin' ? 'selected' : '' }}>
                                                <i class="bi bi-person-gear me-2"></i>Sub Admin
                                            </option>
                                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                                                <i class="bi bi-person-fill-gear me-2"></i>Admin
                                            </option>
                                        </select>
                                        @error('role')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-text text-muted mt-1">
                                        <small>Sub Admin dapat melihat data, Admin memiliki akses penuh</small>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="d-flex justify-content-end gap-3 pt-4 border-top border-light">
                                    <a href="{{ route('admin.user.index') }}" class="btn btn-outline-secondary btn-modern px-4">
                                        <i class="bi bi-arrow-left me-2"></i>Batal
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-modern px-4">
                                        <i class="bi bi-person-plus-fill me-2"></i>Buat Akun
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobileOverlay');

            if (window.innerWidth <= 768) {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
            }
        }

        // Close sidebar when clicking overlay
        document.getElementById('mobileOverlay').addEventListener('click', function() {
            toggleSidebar();
        });

        // Close sidebar on window resize if desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                document.getElementById('sidebar').classList.remove('show');
                document.getElementById('mobileOverlay').classList.remove('show');
            }
        });

        // Password toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Password toggle
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('passwordIcon');

            if (togglePassword && passwordInput && passwordIcon) {
                togglePassword.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    if (type === 'password') {
                        passwordIcon.classList.remove('bi-eye-slash');
                        passwordIcon.classList.add('bi-eye');
                    } else {
                        passwordIcon.classList.remove('bi-eye');
                        passwordIcon.classList.add('bi-eye-slash');
                    }
                });
            }

            // Confirm password toggle
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const confirmPasswordIcon = document.getElementById('confirmPasswordIcon');

            if (toggleConfirmPassword && confirmPasswordInput && confirmPasswordIcon) {
                toggleConfirmPassword.addEventListener('click', function() {
                    const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    confirmPasswordInput.setAttribute('type', type);

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
</body>
</html>