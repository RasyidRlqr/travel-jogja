<x-admin-layout header="Kelola Paket Wisata">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 mb-0">Daftar Paket Wisata</h2>
        <a href="{{ route('admin.tour.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Tambah Paket Wisata
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="border-0">#</th>
                            <th class="border-0">Paket Wisata</th>
                            <th class="border-0">Harga</th>
                            <th class="border-0">Durasi</th>
                            <th class="border-0">Tanggal Dibuat</th>
                            <th class="border-0">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tours as $tour)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($tour->image)
                                            <img src="{{ asset('storage/' . $tour->image) }}" alt="Tour Image" class="rounded me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <h6 class="mb-0">{{ $tour->title }}</h6>
                                            <small class="text-muted">{{ Str::limit($tour->description, 50) }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-bold text-primary">Rp {{ number_format($tour->price, 0, ',', '.') }}</span>
                                </td>
                                <td>{{ $tour->duration_days }} hari</td>
                                <td>{{ $tour->created_at->format('d M Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.tour.edit', $tour) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.tour.destroy', $tour) }}" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket wisata ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="bi bi-map display-4 mb-3"></i>
                                        <p>Belum ada paket wisata yang dibuat</p>
                                        <a href="{{ route('admin.tour.create') }}" class="btn btn-primary">Buat Paket Wisata Pertama</a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($tours->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $tours->links() }}
        </div>
    @endif

</x-admin-layout>