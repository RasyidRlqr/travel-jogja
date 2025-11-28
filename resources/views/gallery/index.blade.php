<x-app-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h1 class="display-4 fw-bold text-primary">Galeri Wisata</h1>
                    <p class="lead text-muted">Koleksi momen indah dari perjalanan kami</p>
                </div>
            </div>
        </div>

        <div class="row g-3">
            @forelse($galleries as $gallery)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card border-0 shadow-sm card-hover">
                        <img src="{{ $gallery->image_source }}" class="card-img-top" alt="{{ $gallery->title ?? 'Gallery' }}" style="height: 200px; object-fit: cover;">
                        @if($gallery->title)
                            <div class="card-body p-3">
                                <h6 class="card-title mb-0 text-center">{{ $gallery->title }}</h6>
                                @if($gallery->description)
                                    <small class="text-muted d-block text-center">{{ Str::limit($gallery->description, 50) }}</small>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="bi bi-images display-4 text-muted mb-3"></i>
                        <h3 class="text-muted">Galeri sedang disiapkan</h3>
                        <p class="text-muted">Kami sedang mengumpulkan momen-momen indah untuk galeri kami.</p>
                    </div>
                </div>
            @endforelse
        </div>

        @if($galleries->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $galleries->links() }}
            </div>
        @endif
    </div>
</x-app-layout>