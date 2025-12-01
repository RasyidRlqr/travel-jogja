<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Travel Jogja - Agen Wisata Terpercaya di Yogyakarta">
    <meta name="keywords" content="travel jogja, wisata jogja, paket wisata, tour yogyakarta">

    <title>Travel Jogja - Wisata Yogyakarta Terpercaya</title>

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

        .hero-section {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .hero-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(26, 35, 53, 0.85) 0%, rgba(45, 55, 72, 0.75) 50%, rgba(66, 153, 225, 0.6) 100%);
            z-index: 2;
        }

        .hero-content {
            position: relative;
            z-index: 3;
        }

        .floating-card {
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .stat-item {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .animate-bounce {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .section-padding { padding: 5rem 0; }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .gallery-overlay {
            background-color: rgba(0,0,0,0.5);
        }

        .gallery-icon {
            opacity: 1;
            transform: scale(1);
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

        .text-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hover-primary:hover {
            color: #0d6efd !important;
            transition: color 0.3s ease;
        }

        .hover-white:hover {
            color: #ffffff !important;
            transition: color 0.3s ease;
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .shadow-modern {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
        }
    </style>
</head>
<body>
    @include('layouts.navigation')

    <!-- Hero Section -->
    <section class="hero-section">
        <!-- Background Image -->
        <div class="hero-bg">
            <img src="https://i.imgur.com/PJX8SsD.jpeg" alt="Yogyakarta Landscape" class="w-100 h-100 object-fit-cover">
        </div>

        <!-- Content -->
        <div class="container position-relative h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-7">
                    <div class="hero-content text-white">
                        <!-- Badge -->
                        <div class="badge bg-primary-subtle text-primary px-3 py-2 mb-4 fs-6 fw-semibold rounded-pill">
                            <i class="bi bi-geo-alt-fill me-2"></i>Travel Jogja Professional
                        </div>

                        <!-- Main Heading -->
                        <h1 class="display-2 fw-bold mb-4 lh-1">
                            Jelajahi <span class="text-primary">Keindahan</span><br>
                            Yogyakarta Bersama Kami
                        </h1>

                        <!-- Subheading -->
                        <p class="lead mb-5 opacity-90 fs-5 lh-base">
                            Pengalaman wisata terbaik dengan pemandu profesional, transportasi nyaman,
                            dan paket wisata yang dirancang khusus untuk Anda.
                        </p>

                        <!-- CTA Buttons -->
                        <div class="d-flex flex-wrap gap-3 mb-5">
                            <a href="#tours" class="btn btn-primary btn-modern">
                                <i class="bi bi-compass me-2"></i>Lihat Paket Wisata
                            </a>
                            <a href="#contact" class="btn btn-outline-light btn-modern">
                                <i class="bi bi-telephone me-2"></i>Hubungi Kami
                            </a>
                        </div>

                        <!-- Stats -->
                        <div class="row g-4">
                            <div class="col-auto">
                                <div class="stat-item text-center">
                                    <div class="h3 fw-bold text-primary mb-1">500+</div>
                                    <small class="text-white-50">Wisatawan Puas</small>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="stat-item text-center">
                                    <div class="h3 fw-bold text-primary mb-1">50+</div>
                                    <small class="text-white-50">Destinasi Wisata</small>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="stat-item text-center">
                                    <div class="h3 fw-bold text-primary mb-1">10+</div>
                                    <small class="text-white-50">Tahun Pengalaman</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Floating Cards -->
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="position-relative">
                        <!-- Testimonial Card -->
                        <div class="floating-card glass-card position-absolute p-3"
                             style="top: 15%; right: -10%; width: 280px;">
                            <div class="d-flex align-items-center">
                                <div class="avatar bg-primary rounded-circle me-3 d-flex align-items-center justify-content-center"
                                     style="width: 50px; height: 50px;">
                                    <i class="bi bi-person-fill text-white"></i>
                                </div>
                                <div>
                                    <div class="fw-bold small mb-1">Ahmad S.</div>
                                    <div class="text-muted small">Wisatawan dari Jakarta</div>
                                    <div class="text-warning small">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Achievement Card -->
                        <div class="floating-card bg-primary text-white position-absolute p-3 rounded-4"
                             style="bottom: 20%; left: -10%; width: 200px;">
                            <div class="text-center">
                                <i class="bi bi-trophy-fill fs-2 mb-2"></i>
                                <div class="fw-bold small mb-1">Terpercaya</div>
                                <div class="small opacity-75">Sejak 2014</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-4">
            <div class="text-white opacity-75 animate-bounce">
                <i class="bi bi-chevron-down fs-3"></i>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <div class="badge bg-primary-subtle text-primary px-3 py-2 mb-3">
                    <i class="bi bi-star-fill me-1"></i>Layanan Unggulan
                </div>
                <h2 class="display-5 fw-bold text-dark mb-3">Layanan <span class="text-gradient">Kami</span></h2>
                <p class="lead text-muted fs-6 mx-auto" style="max-width: 600px;">
                    Solusi lengkap untuk perjalanan wisata Anda dengan standar pelayanan profesional
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="glass-card text-center p-4 h-100 card-hover">
                        <div class="mb-4">
                            <div class="bg-primary bg-opacity-10 rounded-4 d-inline-flex align-items-center justify-content-center shadow-sm"
                                 style="width: 100px; height: 100px;">
                                <i class="bi bi-geo-alt-fill text-primary" style="font-size: 2.5rem;"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mb-3 text-dark">Paket Wisata</h5>
                        <p class="text-muted mb-4">
                            Berbagai paket wisata mulai dari 1 hari hingga beberapa hari dengan destinasi terbaik Yogyakarta.
                        </p>
                        <div class="mt-auto">
                            <span class="badge bg-primary-subtle text-primary px-3 py-2">
                                <i class="bi bi-check-circle-fill me-1"></i>50+ Paket
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="glass-card text-center p-4 h-100 card-hover">
                        <div class="mb-4">
                            <div class="bg-success bg-opacity-10 rounded-4 d-inline-flex align-items-center justify-content-center shadow-sm"
                                 style="width: 100px; height: 100px;">
                                <i class="bi bi-car-front-fill text-success" style="font-size: 2.5rem;"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mb-3 text-dark">Transportasi</h5>
                        <p class="text-muted mb-4">
                            Armada kendaraan yang nyaman dan aman untuk perjalanan Anda dengan driver berpengalaman.
                        </p>
                        <div class="mt-auto">
                            <span class="badge bg-success-subtle text-success px-3 py-2">
                                <i class="bi bi-check-circle-fill me-1"></i>24/7 Support
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="glass-card text-center p-4 h-100 card-hover">
                        <div class="mb-4">
                            <div class="bg-info bg-opacity-10 rounded-4 d-inline-flex align-items-center justify-content-center shadow-sm"
                                 style="width: 100px; height: 100px;">
                                <i class="bi bi-person-check-fill text-info" style="font-size: 2.5rem;"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mb-3 text-dark">Tour Guide</h5>
                        <p class="text-muted mb-4">
                            Pemandu wisata profesional yang ahli dalam sejarah dan budaya Yogyakarta.
                        </p>
                        <div class="mt-auto">
                            <span class="badge bg-info-subtle text-info px-3 py-2">
                                <i class="bi bi-check-circle-fill me-1"></i>Bahasa Indonesia
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tours Section -->
    <section id="tours" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <div class="badge bg-success-subtle text-success px-3 py-2 mb-3">
                    <i class="bi bi-fire me-1"></i>Terpopuler
                </div>
                <h2 class="display-5 fw-bold text-dark mb-3">Paket <span class="text-gradient">Wisata</span></h2>
                <p class="lead text-muted fs-6 mx-auto" style="max-width: 600px;">
                    Pilih paket wisata sesuai kebutuhan Anda dengan harga terbaik dan pengalaman maksimal
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="glass-card p-0 h-100 card-hover overflow-hidden">
                        <div class="position-relative">
                            <img src="{{ asset('images/borobudur.jpg') }}"
                                 class="w-100" alt="Borobudur" style="height: 200px; object-fit: cover;">
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge bg-primary px-3 py-2">
                                    <i class="bi bi-star-fill me-1"></i>4.9
                                </span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h5 class="fw-bold mb-3 text-dark">Borobudur Adventure</h5>
                            <p class="text-muted small mb-4">
                                Jelajahi candi Borobudur dengan pemandu ahli, termasuk transportasi dan tiket masuk.
                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <span class="h5 text-primary fw-bold mb-0">Rp 250.000</span>
                                    <small class="text-muted d-block">per orang</small>
                                </div>
                                <div class="text-end">
                                    <small class="text-muted d-block">1 Hari</small>
                                    <small class="badge bg-success-subtle text-success">Tersedia</small>
                                </div>
                            </div>
                            <a href="#contact" class="btn btn-primary w-100 btn-modern text-decoration-none">
                                <i class="bi bi-cart-plus me-2"></i>Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="glass-card p-0 h-100 card-hover overflow-hidden">
                        <div class="position-relative">
                            <img src="{{ asset('images/prambanan.jpg') }}"
                                 class="w-100" alt="Prambanan" style="height: 200px; object-fit: cover;">
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge bg-primary px-3 py-2">
                                    <i class="bi bi-star-fill me-1"></i>4.8
                                </span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h5 class="fw-bold mb-3 text-dark">Prambanan Discovery</h5>
                            <p class="text-muted small mb-4">
                                Kunjungi kompleks candi Prambanan dengan tur budaya dan sejarah yang mendalam.
                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <span class="h5 text-primary fw-bold mb-0">Rp 200.000</span>
                                    <small class="text-muted d-block">per orang</small>
                                </div>
                                <div class="text-end">
                                    <small class="text-muted d-block">1 Hari</small>
                                    <small class="badge bg-success-subtle text-success">Tersedia</small>
                                </div>
                            </div>
                            <a href="#contact" class="btn btn-primary w-100 btn-modern text-decoration-none">
                                <i class="bi bi-cart-plus me-2"></i>Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="glass-card p-0 h-100 card-hover overflow-hidden">
                        <div class="position-relative">
                            <img src="{{ asset('images/malioboro.jpg') }}"
                                 class="w-100" alt="Malioboro" style="height: 200px; object-fit: cover;">
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge bg-primary px-3 py-2">
                                    <i class="bi bi-star-fill me-1"></i>4.7
                                </span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h5 class="fw-bold mb-3 text-dark">Malioboro Experience</h5>
                            <p class="text-muted small mb-4">
                                Nikmati belanja dan kuliner di Malioboro dengan tur jalan kaki yang menyenangkan.
                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <span class="h5 text-primary fw-bold mb-0">Rp 150.000</span>
                                    <small class="text-muted d-block">per orang</small>
                                </div>
                                <div class="text-end">
                                    <small class="text-muted d-block">Half Day</small>
                                    <small class="badge bg-success-subtle text-success">Tersedia</small>
                                </div>
                            </div>
                            <a href="#contact" class="btn btn-primary w-100 btn-modern text-decoration-none">
                                <i class="bi bi-cart-plus me-2"></i>Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('tours') }}" class="btn btn-outline-primary btn-modern px-5 py-3">
                    <i class="bi bi-grid me-2"></i>Lihat Semua Paket Wisata
                </a>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <div class="badge bg-warning-subtle text-warning px-3 py-2 mb-3">
                    <i class="bi bi-camera me-1"></i>Momen Terindah
                </div>
                <h2 class="display-5 fw-bold text-dark mb-3">Galeri <span class="text-gradient">Wisata</span></h2>
                <p class="lead text-muted fs-6 mx-auto" style="max-width: 600px;">
                    Koleksi momen indah dari perjalanan wisata bersama Travel Jogja
                </p>
            </div>

            <div class="row g-3">
                <div class="col-md-4">
                    <div class="gallery-item position-relative overflow-hidden rounded-4">
                        <img src="https://images.unsplash.com/photo-1584132915807-fd1f5fbc078f?w=400&h=300&fit=crop"
                              class="w-100" alt="Borobudur Sunrise" style="height: 200px; object-fit: cover;">
                        <div class="p-3 bg-white">
                            <h6 class="fw-bold text-dark mb-2">Borobudur Sunrise</h6>
                            <p class="text-muted small mb-0">Nikmati keindahan matahari terbit di candi Borobudur yang megah.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="gallery-item position-relative overflow-hidden rounded-4">
                        <img src="https://images.unsplash.com/photo-1582510003544-4d00b7f74220?w=400&h=300&fit=crop"
                              class="w-100" alt="Borobudur Temple" style="height: 200px; object-fit: cover;">
                        <div class="p-3 bg-white">
                            <h6 class="fw-bold text-dark mb-2">Borobudur Temple</h6>
                            <p class="text-muted small mb-0">Eksplorasi arsitektur Buddha terbesar di dunia.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="gallery-item position-relative overflow-hidden rounded-4">
                        <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=300&fit=crop"
                              class="w-100" alt="Prambanan Temple" style="height: 200px; object-fit: cover;">
                        <div class="p-3 bg-white">
                            <h6 class="fw-bold text-dark mb-2">Prambanan Temple</h6>
                            <p class="text-muted small mb-0">Kompleks candi Hindu terbesar di Indonesia.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="gallery-item position-relative overflow-hidden rounded-4">
                        <img src="https://images.unsplash.com/photo-1552733407-5d5c46c3bb3b?w=400&h=300&fit=crop"
                              class="w-100" alt="Malioboro Street" style="height: 200px; object-fit: cover;">
                        <div class="p-3 bg-white">
                            <h6 class="fw-bold text-dark mb-2">Malioboro Street</h6>
                            <p class="text-muted small mb-0">Jalan utama Yogyakarta dengan suasana tradisional.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="gallery-item position-relative overflow-hidden rounded-4">
                        <img src="https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=400&h=300&fit=crop"
                              class="w-100" alt="Cultural Dance" style="height: 200px; object-fit: cover;">
                        <div class="p-3 bg-white">
                            <h6 class="fw-bold text-dark mb-2">Cultural Dance</h6>
                            <p class="text-muted small mb-0">Tarian tradisional yang memukau dari budaya Jawa.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="gallery-item position-relative overflow-hidden rounded-4">
                        <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=300&fit=crop"
                              class="w-100" alt="Traditional Food" style="height: 200px; object-fit: cover;">
                        <div class="p-3 bg-white">
                            <h6 class="fw-bold text-dark mb-2">Traditional Food</h6>
                            <p class="text-muted small mb-0">Kuliner khas Yogyakarta yang lezat dan autentik.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('gallery') }}" class="btn btn-outline-primary btn-modern px-5 py-3">
                    <i class="bi bi-images me-2"></i>Lihat Galeri Lengkap
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <div class="badge bg-info-subtle text-info px-3 py-2 mb-3">
                    <i class="bi bi-envelope me-1"></i>Hubungi Kami
                </div>
                <h2 class="display-5 fw-bold text-dark mb-3">Siap Membantu <span class="text-gradient">Anda</span></h2>
                <p class="lead text-muted fs-6 mx-auto" style="max-width: 600px;">
                    Hubungi kami untuk konsultasi gratis dan rencanakan perjalanan impian Anda
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="glass-card p-5 shadow-lg">
                        <form>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-lg" id="name" placeholder="Nama Lengkap" required>
                                        <label for="name">
                                            <i class="bi bi-person me-2"></i>Nama Lengkap
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control form-control-lg" id="email" placeholder="Email" required>
                                        <label for="email">
                                            <i class="bi bi-envelope me-2"></i>Email
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control form-control-lg" id="phone" placeholder="No. Telepon" required>
                                        <label for="phone">
                                            <i class="bi bi-telephone me-2"></i>No. Telepon
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select form-select-lg" id="destination" required>
                                            <option selected disabled>Pilih destinasi...</option>
                                            <option value="borobudur">Borobudur</option>
                                            <option value="prambanan">Prambanan</option>
                                            <option value="malioboro">Malioboro</option>
                                            <option value="paket-lengkap">Paket Lengkap</option>
                                            <option value="konsultasi">Konsultasi Gratis</option>
                                        </select>
                                        <label for="destination">
                                            <i class="bi bi-geo-alt me-2"></i>Tujuan Wisata
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="message" style="height: 120px;" placeholder="Ceritakan kebutuhan wisata Anda..."></textarea>
                                        <label for="message">
                                            <i class="bi bi-chat-text me-2"></i>Pesan
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-modern px-5 py-3 fs-5">
                                        <i class="bi bi-send me-2"></i>Kirim Pesan Sekarang
                                    </button>
                                    <p class="text-muted mt-3 mb-0">
                                        <i class="bi bi-shield-check me-1"></i>
                                        Data Anda aman dan terlindungi
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contact Info Cards -->
            <div class="row g-4 mt-5">
                <div class="col-md-4">
                    <div class="glass-card text-center p-4 h-100">
                        <div class="mb-3">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <i class="bi bi-telephone-fill text-white fs-4"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mb-2">Telepon</h5>
                        <p class="text-muted mb-0">+62 274 123456</p>
                        <small class="text-white-50">24/7 Support</small>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="glass-card text-center p-4 h-100">
                        <div class="mb-3">
                            <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <i class="bi bi-whatsapp text-white fs-4"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mb-2">WhatsApp</h5>
                        <p class="text-muted mb-0">+62 812 3456 7890</p>
                        <small class="text-white-50">Respon Cepat</small>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="glass-card text-center p-4 h-100">
                        <div class="mb-3">
                            <div class="bg-info rounded-circle d-inline-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <i class="bi bi-envelope-fill text-white fs-4"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mb-2">Email</h5>
                        <p class="text-muted mb-0">info@traveljogja.com</p>
                        <small class="text-white-50">Respon dalam 24 jam</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                    <p class="mb-4 text">
                        Agen wisata terpercaya di Yogyakarta yang berkomitmen memberikan pengalaman wisata terbaik
                        dengan pelayanan profesional dan harga terjangkau.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="https://www.facebook.com/travel-jogja" class="text-white fs-5 hover-primary">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/travel-jogja" class="text-white fs-5 hover-primary">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://x.com/travel-jogja" class="text-white fs-5 hover-primary">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="https://wa.me/62812345678?text=halo+ka" class="text-white fs-5 hover-primary">
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
                                            <a href="/#services" class="text-white text-decoration-none hover-primary">
                                                <i class="bi bi-chevron-right me-1 small"></i>Layanan
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="/#tours" class="text-white text-decoration-none hover-primary">
                                                <i class="bi bi-chevron-right me-1 small"></i>Paket Wisata
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="/#gallery" class="text-white text-decoration-none hover-primary">
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
                                    <a href="#contact" class="text-white text-decoration-none hover-primary">
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

    <!-- Smooth Scroll -->
    <script>
        // Handle anchor scrolling for both same-page and cross-page navigation
        function scrollToAnchor(anchor) {
            const target = document.querySelector(anchor);
            if (target) {
                const headerOffset = 80; // Account for fixed navbar
                const elementPosition = target.offsetTop;
                const offsetPosition = elementPosition - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        }

        // Handle links with anchors
        document.querySelectorAll('a[href^="#"], a[href*="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                const isSamePageAnchor = href.startsWith('#');
                const isCrossPageAnchor = href.includes('#') && !href.startsWith('#');

                if (isSamePageAnchor) {
                    e.preventDefault();
                    scrollToAnchor(href);
                } else if (isCrossPageAnchor && window.location.pathname === '/') {
                    // If we're already on homepage, just scroll
                    e.preventDefault();
                    const anchorPart = href.split('#')[1];
                    scrollToAnchor('#' + anchorPart);
                }
                // If it's a cross-page link, let it navigate normally
            });
        });

        // Handle anchor from URL hash on page load
        window.addEventListener('load', function() {
            if (window.location.hash) {
                setTimeout(function() {
                    scrollToAnchor(window.location.hash);
                }, 100);
            }
        });
    </script>
</body>
</html>
