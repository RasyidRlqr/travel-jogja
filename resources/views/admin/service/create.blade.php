<x-admin-layout header="Tambah Layanan Baru">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Form Tambah Layanan</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.service.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Layanan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Slug akan digunakan untuk URL. Contoh: transportasi-wisata</div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon Bootstrap</label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon" value="{{ old('icon') }}" placeholder="contoh: car-front-fill">
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Nama icon dari Bootstrap Icons. Contoh: car-front-fill, gear-fill, person-check-fill</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gambar Layanan</label>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="image_type" id="image_type_upload" value="upload" checked>
                                    <label class="form-check-label" for="image_type_upload">
                                        Upload File
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="image_type" id="image_type_url" value="url">
                                    <label class="form-check-label" for="image_type_url">
                                        URL Gambar (ImgURL, dll)
                                    </label>
                                </div>
                            </div>

                            <div id="upload_section">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB.</div>
                            </div>

                            <div id="url_section" style="display: none;">
                                <input type="url" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" placeholder="https://i.imgur.com/... atau URL gambar lainnya">
                                @error('image_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Masukkan URL gambar dari ImgURL, Imgur, atau hosting gambar lainnya</div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-2"></i>Simpan Layanan
                            </button>
                            <a href="{{ route('admin.service.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-generate slug from name
        document.getElementById('name').addEventListener('input', function() {
            const name = this.value;
            const slug = name.toLowerCase()
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