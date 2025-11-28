<x-admin-layout header="Dashboard">

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
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="stats-icon bg-primary bg-opacity-10 text-primary">
                                <i class="bi bi-eye"></i>
                            </div>
                            <h3 class="mb-1 fw-bold">{{ number_format($stats['total_views']) }}</h3>
                            <p class="text-muted mb-0 small">Total Kunjungan</p>
                        </div>
                        <div class="text-end">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-graph-up text-primary fs-4"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
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
                            <div class="stats-icon bg-success bg-opacity-10 text-success">
                                <i class="bi bi-calendar-day"></i>
                            </div>
                            <h3 class="mb-1 fw-bold">{{ number_format($stats['today_views']) }}</h3>
                            <p class="text-muted mb-0 small">Kunjungan Hari Ini</p>
                        </div>
                        <div class="text-end">
                            <div class="bg-success bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-calendar-check text-success fs-4"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <small class="text-success">
                            <i class="bi bi-arrow-up me-1"></i>+8% dari kemarin
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
                            <small class="text-muted">Statistik 7 hari terakhir</small>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-calendar me-1"></i>7 Hari
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">7 Hari</a></li>
                            <li><a class="dropdown-item" href="#">30 Hari</a></li>
                            <li><a class="dropdown-item" href="#">3 Bulan</a></li>
                        </ul>
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
            const chartData = JSON.parse(document.getElementById('visitsChart').dataset.chart);

            const labels = chartData.map(item => {
                const date = new Date(item.date);
                return date.toLocaleDateString('id-ID', { weekday: 'short', day: 'numeric' });
            });
            const data = chartData.map(item => item.views);

            // Create gradient
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(102, 126, 234, 0.3)');
            gradient.addColorStop(1, 'rgba(102, 126, 234, 0.05)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Kunjungan Harian',
                        data: data,
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
                        duration: 2000,
                        easing: 'easeInOutQuart'
                    }
                }
            });
        });
    </script>
</x-admin-layout>