<x-admin-layout header="Kelola Blog">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 mb-0">Daftar Blog</h2>
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Tambah Blog Baru
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="border-0">#</th>
                            <th class="border-0">Judul</th>
                            <th class="border-0">Excerpt</th>
                            <th class="border-0">Tanggal</th>
                            <th class="border-0">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($blogs as $blog)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($blog->image_source)
                                            <img src="{{ $blog->image_source }}" alt="{{ $blog->title }}" class="rounded me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <h6 class="mb-0">{{ Str::limit($blog->title, 50) }}</h6>
                                            <small class="text-muted">{{ $blog->slug }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ Str::limit($blog->excerpt, 100) }}</td>
                                <td>{{ $blog->created_at->format('d M Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.blog.edit', $blog) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.blog.destroy', $blog) }}" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus blog ini?')">
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
                                <td colspan="5" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="bi bi-journal-x display-4 mb-3"></i>
                                        <p>Belum ada blog yang dibuat</p>
                                        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Buat Blog Pertama</a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($blogs->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $blogs->links() }}
        </div>
    @endif

</x-admin-layout>