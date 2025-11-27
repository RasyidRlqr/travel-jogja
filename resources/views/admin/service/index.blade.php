<x-admin-layout header="Kelola Layanan">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 mb-0">Daftar Layanan</h2>
        <a href="{{ route('admin.service.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Tambah Layanan Baru
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="border-0">#</th>
                            <th class="border-0">Nama Layanan</th>
                            <th class="border-0">Deskripsi</th>
                            <th class="border-0">Icon</th>
                            <th class="border-0">Tanggal Dibuat</th>
                            <th class="border-0">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $service)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0">{{ $service->name }}</h6>
                                    </div>
                                </td>
                                <td>{{ Str::limit($service->description, 50) }}</td>
                                <td>
                                    @if($service->icon)
                                        <i class="bi bi-{{ $service->icon }}"></i> {{ $service->icon }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $service->created_at->format('d M Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.service.edit', $service) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.service.destroy', $service) }}" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">
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
                                        <i class="bi bi-gear display-4 mb-3"></i>
                                        <p>Belum ada layanan yang dibuat</p>
                                        <a href="{{ route('admin.service.create') }}" class="btn btn-primary">Buat Layanan Pertama</a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($services->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $services->links() }}
        </div>
    @endif

</x-admin-layout>