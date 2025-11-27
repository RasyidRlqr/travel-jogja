<x-admin-layout header="Dashboard Admin">

    <div class="row g-4">
        <!-- Statistics Cards -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-2">
                        <i class="bi bi-eye text-primary" style="font-size: 2rem;"></i>
                    </div>
                    <h4 class="card-title mb-1">{{ $stats['total_views'] }}</h4>
                    <p class="card-text text-muted mb-0">Total Kunjungan</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-2">
                        <i class="bi bi-calendar-day text-success" style="font-size: 2rem;"></i>
                    </div>
                    <h4 class="card-title mb-1">{{ $stats['today_views'] }}</h4>
                    <p class="card-text text-muted mb-0">Kunjungan Hari Ini</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-2">
                        <i class="bi bi-people text-info" style="font-size: 2rem;"></i>
                    </div>
                    <h4 class="card-title mb-1">{{ $stats['users'] }}</h4>
                    <p class="card-text text-muted mb-0">Total User</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-2">
                        <i class="bi bi-pencil-square text-warning" style="font-size: 2rem;"></i>
                    </div>
                    <h4 class="card-title mb-1">{{ \App\Models\Blog::count() }}</h4>
                    <p class="card-text text-muted mb-0">Total Blog</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Recent Blogs -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Blog Terbaru</h5>
                </div>
                <div class="card-body">
                    @forelse(\App\Models\Blog::latest()->take(5)->get() as $blog)
                        <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                            <div class="flex-fill">
                                <h6 class="mb-1">{{ Str::limit($blog->title, 50) }}</h6>
                                <small class="text-muted">{{ $blog->created_at->diffForHumans() }}</small>
                            </div>
                            <a href="{{ route('admin.blog.edit', $blog) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        </div>
                    @empty
                        <p class="text-muted mb-0">Belum ada blog</p>
                    @endforelse
                </div>
                <div class="card-footer bg-white">
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-primary btn-sm">Lihat Semua</a>
                </div>
            </div>
        </div>

        <!-- Recent Tours -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Paket Wisata Terbaru</h5>
                </div>
                <div class="card-body">
                    @forelse(\App\Models\Tour::latest()->take(5)->get() as $tour)
                        <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                            <div class="flex-fill">
                                <h6 class="mb-1">{{ Str::limit($tour->title, 50) }}</h6>
                                <small class="text-muted">Rp {{ number_format($tour->price, 0, ',', '.') }}</small>
                            </div>
                            <a href="{{ route('admin.tour.edit', $tour) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        </div>
                    @empty
                        <p class="text-muted mb-0">Belum ada paket wisata</p>
                    @endforelse
                </div>
                <div class="card-footer bg-white">
                    <a href="{{ route('admin.tour.index') }}" class="btn btn-primary btn-sm">Lihat Semua</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Statistik Kunjungan 7 Hari Terakhir</h5>
                </div>
                <div class="card-body">
                    <canvas id="visitsChart" width="400" height="150"
                            data-chart='@json($chartData)'></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Aksi Cepat</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary w-100">
                                <i class="bi bi-plus-circle me-2"></i>Tambah Blog
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.service.create') }}" class="btn btn-success w-100">
                                <i class="bi bi-plus-circle me-2"></i>Tambah Layanan
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.tour.create') }}" class="btn btn-info w-100">
                                <i class="bi bi-plus-circle me-2"></i>Tambah Paket Wisata
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.gallery.create') }}" class="btn btn-warning w-100">
                                <i class="bi bi-plus-circle me-2"></i>Tambah Galeri
                            </a>
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

            const labels = chartData.map(item => item.date);
            const data = chartData.map(item => item.views);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Kunjungan Harian',
                        data: data,
                        borderColor: '#0d6efd',
                        backgroundColor: 'rgba(13, 110, 253, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#0d6efd',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleColor: '#ffffff',
                            bodyColor: '#ffffff',
                            cornerRadius: 8,
                            displayColors: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            },
                            ticks: {
                                stepSize: 1
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        }
                    },
                    elements: {
                        point: {
                            hoverBorderWidth: 3
                        }
                    }
                }
            });
        });
    </script>
</x-admin-layout>