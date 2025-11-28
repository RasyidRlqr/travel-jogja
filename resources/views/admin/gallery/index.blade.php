<x-admin-layout header="Kelola Galeri">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 mb-0">Daftar Galeri</h2>
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Tambah Galeri
        </a>
    </div>

    <div class="row g-4">
        @forelse($galleries as $gallery)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="position-relative">
                        <img src="{{ $gallery->image_source }}" class="card-img-top" alt="{{ $gallery->title }}" style="height: 200px; object-fit: cover;">
                        <div class="position-absolute top-0 end-0 p-2">
                            <form method="POST" action="{{ route('admin.gallery.destroy', $gallery) }}" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title mb-2">{{ $gallery->title }}</h6>
                        @if($gallery->description)
                            <p class="card-text text-muted small mb-2">{{ Str::limit($gallery->description, 100) }}</p>
                        @endif
                        <small class="text-muted">{{ $gallery->created_at->format('d M Y') }}</small>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <div class="text-muted">
                        <i class="bi bi-images display-4 mb-3"></i>
                        <p>Belum ada gambar di galeri</p>
                        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">Tambah Gambar Pertama</a>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    @if($galleries->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $galleries->links() }}
        </div>
    @endif

</x-admin-layout>