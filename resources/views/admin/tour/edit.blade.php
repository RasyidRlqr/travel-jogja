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
                                    <label class="form-label">Gambar Paket Wisata</label>
                                    <div class="mb-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="image_type" id="image_type_upload" value="upload" {{ !$tour->image_url ? 'checked' : '' }}>
                                            <label class="form-check-label" for="image_type_upload">
                                                Upload File
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="image_type" id="image_type_url" value="url" {{ $tour->image_url ? 'checked' : '' }}>
                                            <label class="form-check-label" for="image_type_url">
                                                URL Gambar (ImgURL, dll)
                                            </label>
                                        </div>
                                    </div>

                                    <div id="upload_section" style="{{ $tour->image_url ? 'display: none;' : '' }}">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah gambar.</div>
                                        @if($tour->image_source && !$tour->image_url)
                                            <div class="mt-2">
                                                <img src="{{ $tour->image_source }}" alt="Current image" class="img-fluid rounded shadow-sm">
                                            </div>
                                        @endif
                                    </div>

                                    <div id="url_section" style="{{ !$tour->image_url ? 'display: none;' : '' }}">
                                        <input type="url" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" value="{{ old('image_url', $tour->image_url) }}" placeholder="https://i.imgur.com/... atau URL gambar lainnya">
                                        @error('image_url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Masukkan URL gambar dari ImgURL, Imgur, atau hosting gambar lainnya</div>
                                        @if($tour->image_source && $tour->image_url)
                                            <div class="mt-2">
                                                <img src="{{ $tour->image_source }}" alt="Current image" class="img-fluid rounded shadow-sm">
                                            </div>
                                        @endif
                                    </div>
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

        document.addEventListener('DOMContentLoaded', function() {
            const uploadRadio = document.getElementById('image_type_upload');
            const urlRadio = document.getElementById('image_type_url');
            const uploadSection = document.getElementById('upload_section');
            const urlSection = document.getElementById('url_section');

            function toggleImageInput() {
                if (uploadRadio.checked) {
                    uploadSection.style.display = 'block';
                    urlSection.style.display = 'none';
                } else {
                    uploadSection.style.display = 'none';
                    urlSection.style.display = 'block';
                }
            }

            uploadRadio.addEventListener('change', toggleImageInput);
            urlRadio.addEventListener('change', toggleImageInput);
        });
    </script>

</x-admin-layout>