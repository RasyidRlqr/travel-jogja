<x-admin-layout header="Tambah Gambar Galeri">

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Form Tambah Gambar Galeri</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Gambar <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gambar <span class="text-danger">*</span></label>
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
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB. Rasio gambar yang disarankan: 4:3 atau 16:9</div>
                            </div>

                            <div id="url_section" style="display: none;">
                                <input type="url" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" placeholder="https://i.imgur.com/... atau URL gambar lainnya">
                                @error('image_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Masukkan URL gambar dari ImgURL, Imgur, atau hosting gambar lainnya</div>
                            </div>
                        </div>

                        <div class="mb-3" id="imagePreview" style="display: none;">
                            <label class="form-label">Preview Gambar:</label>
                            <div class="border rounded p-2">
                                <img id="previewImg" class="img-fluid rounded" style="max-height: 300px;">
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-2"></i>Simpan Gambar
                            </button>
                            <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('imagePreview').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }

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