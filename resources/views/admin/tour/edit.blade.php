<x-admin-layout header="Edit Paket Wisata">

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Form Edit Paket Wisata</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.tour.update', $tour) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul Paket <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $tour->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $tour->slug) }}" required>
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Slug akan digunakan untuk URL. Contoh: borobudur-adventure</div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="6" required>{{ old('description', $tour->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $tour->price) }}" required>
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="duration_days" class="form-label">Durasi (hari) <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('duration_days') is-invalid @enderror" id="duration_days" name="duration_days" value="{{ old('duration_days', $tour->duration_days) }}" required>
                                            @error('duration_days')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Gambar Paket Wisata</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah gambar.</div>
                                    @if($tour->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $tour->image) }}" alt="Current Image" class="img-fluid rounded shadow-sm">
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="itinerary" class="form-label">Itinerary</label>
                                    <textarea class="form-control @error('itinerary') is-invalid @enderror" id="itinerary" name="itinerary" rows="8" placeholder="Deskripsikan itinerary perjalanan...">{{ old('itinerary', $tour->itinerary) }}</textarea>
                                    @error('itinerary')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Jelaskan detail perjalanan hari per hari</div>
                                </div>

                                <div class="mb-3">
                                    <label for="includes" class="form-label">Yang Termasuk</label>
                                    <textarea class="form-control @error('includes') is-invalid @enderror" id="includes" name="includes" rows="4" placeholder="Transportasi, penginapan, makan, dll...">{{ old('includes', $tour->includes) }}</textarea>
                                    @error('includes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="excludes" class="form-label">Yang Tidak Termasuk</label>
                                    <textarea class="form-control @error('excludes') is-invalid @enderror" id="excludes" name="excludes" rows="3" placeholder="Biaya pribadi, tiket pesawat, dll...">{{ old('excludes', $tour->excludes) }}</textarea>
                                    @error('excludes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-2"></i>Update Paket Wisata
                            </button>
                            <a href="{{ route('admin.tour.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-generate slug from title
        document.getElementById('title').addEventListener('input', function() {
            const title = this.value;
            const slug = title.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim('-');
            document.getElementById('slug').value = slug;
        });
    </script>

</x-admin-layout>