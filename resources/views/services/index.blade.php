<x-app-layout>
    <div class="container py-5">
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
</x-app-layout>