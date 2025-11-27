<x-app-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h1 class="display-4 fw-bold text-primary">Blog Travel Jogja</h1>
                    <p class="lead text-muted">Informasi terbaru seputar wisata Yogyakarta</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            @forelse($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm card-hover">
                        @if($blog->image_source)
                            <img src="{{ $blog->image_source }}" class="card-img-top" alt="{{ $blog->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title fw-bold">
                                <a href="{{ route('blog.detail', $blog->slug) }}" class="text-decoration-none text-dark">
                                    {{ $blog->title }}
                                </a>
                            </h5>
                            @if($blog->excerpt)
                                <p class="card-text text-muted">{{ Str::limit($blog->excerpt, 100) }}</p>
                            @endif
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <small class="text-muted">
                                    <i class="bi bi-calendar me-1"></i>{{ $blog->created_at->format('d M Y') }}
                                </small>
                                <a href="{{ route('blog.detail', $blog->slug) }}" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="bi bi-journal-x display-4 text-muted mb-3"></i>
                        <h3 class="text-muted">Belum ada artikel blog</h3>
                        <p class="text-muted">Kami sedang menyiapkan konten menarik untuk Anda.</p>
                    </div>
                </div>
            @endforelse
        </div>

        @if($blogs->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $blogs->links() }}
            </div>
        @endif
    </div>
</x-app-layout>