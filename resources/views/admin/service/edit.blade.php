<x-admin-layout header="Edit Layanan">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Form Edit Layanan</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.service.update', $service) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Layanan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $service->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $service->slug) }}" required>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Slug akan digunakan untuk URL. Contoh: transportasi-wisata</div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $service->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon Bootstrap</label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon" value="{{ old('icon', $service->icon) }}" placeholder="contoh: car-front-fill">
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Nama icon dari Bootstrap Icons. Contoh: car-front-fill, gear-fill, person-check-fill</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gambar Layanan</label>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="image_type" id="image_type_upload" value="upload" {{ !$service->image_url ? 'checked' : '' }}>
                                    <label class="form-check-label" for="image_type_upload">
                                        Upload File
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="image_type" id="image_type_url" value="url" {{ $service->image_url ? 'checked' : '' }}>
                                    <label class="form-check-label" for="image_type_url">
                                        URL Gambar (ImgURL, dll)
                                    </label>
                                </div>
                            </div>

                            <div id="upload_section" style="{{ $service->image_url ? 'display: none;' : '' }}">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah gambar.</div>
                                @if($service->image_source && !$service->image_url)
                                    <div class="mt-2">
                                        <img src="{{ $service->image_source }}" alt="Current image" class="img-thumbnail" style="max-width: 200px;">
                                    </div>
                                @endif
                            </div>

                            <div id="url_section" style="{{ !$service->image_url ? 'display: none;' : '' }}">
                                <input type="url" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" value="{{ old('image_url', $service->image_url) }}" placeholder="https://i.imgur.com/... atau URL gambar lainnya">
                                @error('image_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Masukkan URL gambar dari ImgURL, Imgur, atau hosting gambar lainnya</div>
                                @if($service->image_source && $service->image_url)
                                    <div class="mt-2">
                                        <img src="{{ $service->image_source }}" alt="Current image" class="img-thumbnail" style="max-width: 200px;">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-2"></i>Update Layanan
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