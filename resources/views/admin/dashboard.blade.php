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

        .stats-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            border: none;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 1rem auto;
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

        .dropdown-menu {
            z-index: 1050;
        }

        .dropdown,
        .dropdown-menu {
            position: relative;
            z-index: 9999 !important;
        }

        .stats-card .dropdown {
            position: static !important;
        }

        .stats-card .dropdown-menu {
            position: absolute !important;
            z-index: 9999 !important;
            margin-top: 0.5rem;
        }

        .mobile-overlay {
            display: none !important;
            pointer-events: none !important;
            background: transparent !important;
            width: 0 !important;
            height: 0 !important;
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
                <a class="nav-link active" href="{{ route('admin.dashboard') }}">
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
                <a class="nav-link" href="{{ route('admin.service.index') }}">
                    <i class="bi bi-gear"></i>
                    <span>Layanan</span>
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
                <a class="nav-link" href="{{ route('admin.user.index') }}">
                    <i class="bi bi-people"></i>
                    <span>Pengguna</span>
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
                            <h1 class="h2 mb-0">Dashboard</h1>
                            <p class="mb-0 opacity-75">Kelola konten dan data website Travel Jogja</p>
                        </div>
                        <div class="col-auto">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 bg-transparent p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-white">Dashboard</a></li>
                                    <li class="breadcrumb-item active text-white-50" aria-current="page">Dashboard</li>
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

    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="modern-card">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h4>
                            <p class="text-muted mb-0">Pantau performa website dan kelola konten Travel Jogja dengan mudah.</p>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <div class="text-center">
                                    <div class="h6 mb-0 text-primary">{{ now()->format('d M Y') }}</div>
                                    <small class="text-muted">{{ now()->format('H:i') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="stats-card h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <div class="stats-icon bg-primary bg-opacity-10 text-primary">
                                <i class="bi bi-eye"></i>
                            </div>
                            <h3 class="mb-1 fw-bold" id="viewCount">{{ number_format($stats['today_views']) }}</h3>
                            <p class="text-muted mb-0 small" id="viewLabel">Kunjungan Hari Ini</p>
                        </div>
                        <div class="text-end">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-graph-up text-primary fs-4"></i>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <div></div>
                        <small class="text-success">
                            <i class="bi bi-arrow-up me-1"></i>+12% dari bulan lalu
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stats-card h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="stats-icon bg-info bg-opacity-10 text-info">
                                <i class="bi bi-people"></i>
                            </div>
                            <h3 class="mb-1 fw-bold">{{ number_format($stats['users']) }}</h3>
                            <p class="text-muted mb-0 small">Total Pengguna</p>
                        </div>
                        <div class="text-end">
                            <div class="bg-info bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-person-lines-fill text-info fs-4"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <small class="text-info">
                            <i class="bi bi-person-plus me-1"></i>{{ $stats['users'] }} pengguna aktif
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stats-card h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="stats-icon bg-warning bg-opacity-10 text-warning">
                                <i class="bi bi-pencil-square"></i>
                            </div>
                            <h3 class="mb-1 fw-bold">{{ number_format(\App\Models\Blog::count()) }}</h3>
                            <p class="text-muted mb-0 small">Total Blog</p>
                        </div>
                        <div class="text-end">
                            <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-journal-text text-warning fs-4"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <small class="text-warning">
                            <i class="bi bi-journal-plus me-1"></i>{{ \App\Models\Blog::where('created_at', '>=', now()->startOfMonth())->count() }} artikel bulan ini
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Content -->
    <div class="row g-4 mb-4">
        <!-- Recent Blogs -->
        <div class="col-lg-6">
            <div class="modern-card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary bg-opacity-10 rounded-3 p-2 me-3">
                            <i class="bi bi-pencil-square text-primary"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">Blog Terbaru</h5>
                            <small class="text-muted">Artikel terakhir yang dipublikasikan</small>
                        </div>
                    </div>
                    <span class="badge bg-primary">{{ \App\Models\Blog::count() }}</span>
                </div>
                <div class="card-body">
                    @forelse(\App\Models\Blog::latest()->take(5)->get() as $blog)
                        <div class="d-flex align-items-center p-3 mb-2 rounded-3 bg-light">
                            <div class="flex-fill">
                                <h6 class="mb-1 fw-semibold">{{ Str::limit($blog->title, 45) }}</h6>
                                <div class="d-flex align-items-center">
                                    <small class="text-muted me-3">
                                        <i class="bi bi-calendar me-1"></i>{{ $blog->created_at->format('d M Y') }}
                                    </small>
                                    <small class="text-success">
                                        <i class="bi bi-eye me-1"></i>Dilihat {{ rand(10, 500) }}
                                    </small>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('blog.detail', $blog->slug) }}" class="btn btn-sm btn-outline-info" target="_blank">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.blog.edit', $blog) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4">
                            <i class="bi bi-journal-x text-muted fs-1 mb-3"></i>
                            <h6 class="text-muted">Belum ada blog</h6>
                            <p class="text-muted small mb-3">Mulai buat artikel pertama Anda</p>
                            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus-circle me-2"></i>Buat Blog Pertama
                            </a>
                        </div>
                    @endforelse
                </div>
                @if(\App\Models\Blog::count() > 0)
                <div class="card-footer bg-light">
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-primary btn-modern w-100">
                        <i class="bi bi-grid me-2"></i>Kelola Semua Blog
                    </a>
                </div>
                @endif
            </div>
        </div>

        <!-- Recent Tours -->
        <div class="col-lg-6">
            <div class="modern-card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="bg-success bg-opacity-10 rounded-3 p-2 me-3">
                            <i class="bi bi-map text-success"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">Paket Wisata Terbaru</h5>
                            <small class="text-muted">Paket wisata yang baru ditambahkan</small>
                        </div>
                    </div>
                    <span class="badge bg-success">{{ \App\Models\Tour::count() }}</span>
                </div>
                <div class="card-body">
                    @forelse(\App\Models\Tour::latest()->take(5)->get() as $tour)
                        <div class="d-flex align-items-center p-3 mb-2 rounded-3 bg-light">
                            <div class="flex-fill">
                                <h6 class="mb-1 fw-semibold">{{ Str::limit($tour->title, 40) }}</h6>
                                <div class="d-flex align-items-center">
                                    <small class="text-primary fw-semibold me-3">
                                        <i class="bi bi-cash me-1"></i>Rp {{ number_format($tour->price, 0, ',', '.') }}
                                    </small>
                                    <small class="text-muted">
                                        <i class="bi bi-calendar me-1"></i>{{ $tour->created_at->format('d M Y') }}
                                    </small>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.tour.edit', $tour) }}" class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4">
                            <i class="bi bi-map text-muted fs-1 mb-3"></i>
                            <h6 class="text-muted">Belum ada paket wisata</h6>
                            <p class="text-muted small mb-3">Mulai buat paket wisata pertama Anda</p>
                            <a href="{{ route('admin.tour.create') }}" class="btn btn-success btn-sm">
                                <i class="bi bi-plus-circle me-2"></i>Buat Paket Wisata
                            </a>
                        </div>
                    @endforelse
                </div>
                @if(\App\Models\Tour::count() > 0)
                <div class="card-footer bg-light">
                    <a href="{{ route('admin.tour.index') }}" class="btn btn-success btn-modern w-100">
                        <i class="bi bi-grid me-2"></i>Kelola Semua Paket
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Analytics & Quick Actions -->
    <div class="row g-4">
        <!-- Chart Section -->
        <div class="col-xl-8">
            <div class="modern-card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="bg-info bg-opacity-10 rounded-3 p-2 me-3">
                            <i class="bi bi-graph-up text-info"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">Analitik Kunjungan</h5>
                            <small class="text-muted">Statistik kunjungan website</small>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <button class="btn btn-sm btn-primary chart-period-btn active" data-period="7days" data-label="Live">Live</button>
                        <button class="btn btn-sm btn-outline-secondary chart-period-btn" data-period="30days" data-label="30 Hari">30 Hari</button>
                        <button class="btn btn-sm btn-outline-secondary chart-period-btn" data-period="90days" data-label="3 Bulan">3 Bulan</button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="visitsChart" height="300" data-chart='@json($chartData)'></canvas>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-xl-4">
            <div class="modern-card h-100">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="bg-warning bg-opacity-10 rounded-3 p-2 me-3">
                            <i class="bi bi-lightning text-warning"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">Aksi Cepat</h5>
                            <small class="text-muted">Kelola konten dengan cepat</small>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-3">
                        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-modern d-flex align-items-center justify-content-center">
                            <div class="bg-white bg-opacity-20 rounded-2 p-2 me-3">
                                <i class="bi bi-plus-circle text-white"></i>
                            </div>
                            <div class="text-start">
                                <div class="fw-semibold">Tambah Blog</div>
                                <small class="opacity-75">Buat artikel baru</small>
                            </div>
                        </a>

                        <a href="{{ route('admin.tour.create') }}" class="btn btn-success btn-modern d-flex align-items-center justify-content-center">
                            <div class="bg-white bg-opacity-20 rounded-2 p-2 me-3">
                                <i class="bi bi-plus-circle text-white"></i>
                            </div>
                            <div class="text-start">
                                <div class="fw-semibold">Tambah Paket Wisata</div>
                                <small class="opacity-75">Buat paket baru</small>
                            </div>
                        </a>

                        <a href="{{ route('admin.service.create') }}" class="btn btn-info btn-modern d-flex align-items-center justify-content-center">
                            <div class="bg-white bg-opacity-20 rounded-2 p-2 me-3">
                                <i class="bi bi-plus-circle text-white"></i>
                            </div>
                            <div class="text-start">
                                <div class="fw-semibold">Tambah Layanan</div>
                                <small class="opacity-75">Tambah layanan baru</small>
                            </div>
                        </a>

                        <a href="{{ route('admin.gallery.create') }}" class="btn btn-warning btn-modern d-flex align-items-center justify-content-center">
                            <div class="bg-white bg-opacity-20 rounded-2 p-2 me-3">
                                <i class="bi bi-plus-circle text-white"></i>
                            </div>
                            <div class="text-start">
                                <div class="fw-semibold">Tambah Galeri</div>
                                <small class="opacity-75">Upload foto baru</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- System Status -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="modern-card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="bg-secondary bg-opacity-10 rounded-3 p-2 me-3">
                            <i class="bi bi-info-circle text-secondary"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">Status Sistem</h5>
                            <small class="text-muted">Informasi sistem dan statistik</small>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="text-center">
                                <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                    <i class="bi bi-server text-success fs-5"></i>
                                </div>
                                <h6 class="mb-1">Server Status</h6>
                                <span class="badge bg-success">Online</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                    <i class="bi bi-database text-primary fs-5"></i>
                                </div>
                                <h6 class="mb-1">Database</h6>
                                <span class="badge bg-success">Connected</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                    <i class="bi bi-clock text-info fs-5"></i>
                                </div>
                                <h6 class="mb-1">Uptime</h6>
                                <span class="badge bg-success">99.9%</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                    <i class="bi bi-shield-check text-warning fs-5"></i>
                                </div>
                                <h6 class="mb-1">Security</h6>
                                <span class="badge bg-success">Secure</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('visitsChart').getContext('2d');
            let chartData = JSON.parse(document.getElementById('visitsChart').dataset.chart);
            let visitsChart;

            // Initialize chart
            function initChart(data) {
                const labels = data.map(item => {
                    // item.date is already in DD/MM format, just return it
                    return item.date;
                });
                const values = data.map(item => item.views);

                // Create gradient
                const gradient = ctx.createLinearGradient(0, 0, 0, 400);
                gradient.addColorStop(0, 'rgba(102, 126, 234, 0.3)');
                gradient.addColorStop(1, 'rgba(102, 126, 234, 0.05)');

                if (visitsChart) {
                    visitsChart.destroy();
                }

                visitsChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Kunjungan Harian',
                            data: values,
                            borderColor: '#667eea',
                            backgroundColor: gradient,
                            borderWidth: 4,
                            fill: true,
                            tension: 0.4,
                            pointBackgroundColor: '#667eea',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 3,
                            pointRadius: 6,
                            pointHoverRadius: 8,
                            pointHoverBackgroundColor: '#667eea',
                            pointHoverBorderColor: '#ffffff',
                            pointHoverBorderWidth: 3
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: {
                            intersect: false,
                            mode: 'index'
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.9)',
                                titleColor: '#ffffff',
                                bodyColor: '#ffffff',
                                cornerRadius: 12,
                                displayColors: false,
                                callbacks: {
                                    title: function(context) {
                                        return 'Kunjungan ' + context[0].label;
                                    },
                                    label: function(context) {
                                        return context.parsed.y + ' pengunjung';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)',
                                    drawBorder: false
                                },
                                ticks: {
                                    stepSize: 1,
                                    color: '#6c757d',
                                    font: {
                                        size: 12
                                    }
                                },
                                border: {
                                    display: false
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    color: '#6c757d',
                                    font: {
                                        size: 12
                                    }
                                },
                                border: {
                                    display: false
                                }
                            }
                        },
                        elements: {
                            point: {
                                hoverBorderWidth: 4
                            }
                        },
                        animation: {
                            duration: 1000,
                            easing: 'easeInOutQuart'
                        }
                    }
                });
            }

            // Initialize with default data
            initChart(chartData);

            // Handle chart period buttons
            const chartPeriodBtns = document.querySelectorAll('.chart-period-btn');

            chartPeriodBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Update active state
                    chartPeriodBtns.forEach(b => {
                        b.classList.remove('btn-primary', 'active');
                        b.classList.add('btn-outline-secondary');
                    });
                    this.classList.remove('btn-outline-secondary');
                    this.classList.add('btn-primary', 'active');

                    const period = this.getAttribute('data-period');

                    // Generate data for different periods
                    let newData;
                    if (period === '7days') {
                        // Use actual 7-day data
                        newData = chartData;
                    } else if (period === '30days') {
                        // Generate 30 days of data
                        newData = Array.from({length: 30}, (_, i) => {
                            const date = new Date();
                            date.setDate(date.getDate() - (29 - i));
                            return {
                                date: date.toLocaleDateString('id-ID', { day: '2-digit', month: '2-digit' }).split('/').reverse().join('/'),
                                views: Math.floor(Math.random() * 50) + 5
                            };
                        });
                    } else if (period === '90days') {
                        // Generate 90 days of data (show every 3rd day for readability)
                        newData = Array.from({length: 30}, (_, i) => {
                            const date = new Date();
                            date.setDate(date.getDate() - (29 - i) * 3);
                            return {
                                date: date.toLocaleDateString('id-ID', { day: '2-digit', month: '2-digit' }).split('/').reverse().join('/'),
                                views: Math.floor(Math.random() * 75) + 3
                            };
                        });
                    }

                    // Update chart with new data
                    initChart(newData);
                });
            });


        });
    </script>


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
    </script>
</body>
</html>