<x-app-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h1 class="display-4 fw-bold text-primary">Paket Wisata</h1>
                    <p class="lead text-muted">Pilih paket wisata sesuai kebutuhan Anda</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            @forelse($tours as $tour)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm card-hover">
                        @if($tour->image)
                            <img src="{{ asset('storage/' . $tour->image) }}" class="card-img-top" alt="{{ $tour->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-geo-alt text-muted" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $tour->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($tour->description, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h5 text-primary fw-bold mb-0">Rp {{ number_format($tour->price, 0, ',', '.') }}</span>
                                    <small class="text-muted d-block">per orang</small>
                                </div>
                                <div class="text-end">
                                    <small class="text-muted d-block">{{ $tour->duration_days }} hari</small>
                                    <span class="badge bg-primary">Wisata</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <button class="btn btn-primary w-100">Pesan Sekarang</button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="bi bi-map display-4 text-muted mb-3"></i>
                        <h3 class="text-muted">Paket wisata sedang disiapkan</h3>
                        <p class="text-muted">Kami sedang merancang paket wisata terbaik untuk Anda.</p>
                    </div>
                </div>
            @endforelse
        </div>

        @if($tours->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $tours->links() }}
            </div>
        @endif
    </div>
</x-app-layout>