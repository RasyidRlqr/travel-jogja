<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Layanan Travel Jogja - Wisata Yogyakarta Terpercaya">
    <meta name="keywords" content="travel jogja, wisata jogja, layanan wisata, tour yogyakarta">

    <title>Layanan Kami - Travel Jogja</title>

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
        .card-hover:hover { transform: translateY(-5px); transition: transform 0.3s ease; }
    </style>
</head>
<body>
    @include('layouts.navigation')

    <!-- Main Content -->
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center mb-5">
                        <h1 class="display-4 fw-bold text-primary">Layanan Kami</h1>
                        <p class="lead text-muted">Solusi lengkap untuk perjalanan wisata Anda</p>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                @forelse($services as $service)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 border-0 shadow-sm card-hover">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <i class="bi bi-{{ $service->icon ?? 'gear' }}-fill text-primary" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="card-title fw-bold">{{ $service->name }}</h5>
                                <p class="card-text text-muted">{{ $service->description }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="bi bi-tools display-4 text-muted mb-3"></i>
                            <h3 class="text-muted">Layanan sedang disiapkan</h3>
                            <p class="text-muted">Kami sedang mengembangkan layanan terbaik untuk Anda.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                              style="width: 50px; height: 50px;">
                            <i class="bi bi-compass text-white fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0">Travel Jogja</h5>
                            <small class="text-primary">Professional Tour</small>
                        </div>
                    </div>
                    <p class="mb-4 text-muted">
                        Agen wisata terpercaya di Yogyakarta yang berkomitmen memberikan pengalaman wisata terbaik
                        dengan pelayanan profesional dan harga terjangkau.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white fs-5 hover-primary">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="text-white fs-5 hover-primary">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="text-white fs-5 hover-primary">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="text-white fs-5 hover-primary">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <h5 class="fw-bold mb-4">Kontak Kami</h5>
                    <div class="d-flex align-items-start mb-3">
                        <i class="bi bi-geo-alt text-primary me-3 mt-1"></i>
                        <div>
                            <div class="fw-semibold">Alamat</div>
                            <small class="text-white-50">Jl. Malioboro No. 123, Yogyakarta</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <i class="bi bi-telephone text-primary me-3 mt-1"></i>
                        <div>
                            <div class="fw-semibold">Telepon</div>
                            <small class="text-white-50">+62 274 123456</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <i class="bi bi-envelope text-primary me-3 mt-1"></i>
                        <div>
                            <div class="fw-semibold">Email</div>
                            <small class="text-white-50">info@traveljogja.com</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <i class="bi bi-clock text-primary me-3 mt-1"></i>
                        <div>
                            <div class="fw-semibold">Jam Operasional</div>
                            <small class="text-white-50">08:00 - 20:00 WIB</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <h5 class="fw-bold mb-4">Link Cepat</h5>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="/" class="text-white text-decoration-none hover-primary">
                                        <i class="bi bi-chevron-right me-1 small"></i>Beranda
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="/#services" class="text-white text-decoration-none hover-primary">
                                        <i class="bi bi-chevron-right me-1 small"></i>Layanan
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('tours') }}" class="text-white text-decoration-none hover-primary">
                                        <i class="bi bi-chevron-right me-1 small"></i>Paket Wisata
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('gallery') }}" class="text-white text-decoration-none hover-primary">
                                        <i class="bi bi-chevron-right me-1 small"></i>Galeri
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="{{ route('blog') }}" class="text-white text-decoration-none hover-primary">
                                        <i class="bi bi-chevron-right me-1 small"></i>Blog
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="/#contact" class="text-white text-decoration-none hover-primary">
                                        <i class="bi bi-chevron-right me-1 small"></i>Kontak
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('login') }}" class="text-white text-decoration-none hover-primary">
                                        <i class="bi bi-chevron-right me-1 small"></i>Login
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4 opacity-25">

            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0 text-white-50 small">
                        &copy; 2024 Travel Jogja. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <small class="text-white-50">
                        Made with <i class="bi bi-heart-fill text-danger me-1"></i> for Yogyakarta
                    </small>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>