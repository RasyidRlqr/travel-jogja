<x-admin-layout header="Edit Blog">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Form Edit Blog</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.blog.update', $blog) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Blog <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="excerpt" class="form-label">Excerpt</label>
                            <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="3" placeholder="Ringkasan singkat tentang blog...">{{ old('excerpt', $blog->excerpt) }}</textarea>
                            @error('excerpt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Konten Blog <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10" placeholder="Tulis konten blog di sini..." required>{{ old('content', $blog->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gambar</label>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="image_type" id="image_type_upload" value="upload" {{ !$blog->image_url ? 'checked' : '' }}>
                                    <label class="form-check-label" for="image_type_upload">
                                        Upload File
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="image_type" id="image_type_url" value="url" {{ $blog->image_url ? 'checked' : '' }}>
                                    <label class="form-check-label" for="image_type_url">
                                        URL Gambar (ImgURL, dll)
                                    </label>
                                </div>
                            </div>

                            <div id="upload_section" style="{{ $blog->image_url ? 'display: none;' : '' }}">
                                <input type="file" class="form-control @error('featured_image') is-invalid @enderror" id="featured_image" name="featured_image" accept="image/*">
                                @error('featured_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah gambar.</div>
                                @if($blog->image_source && !$blog->image_url)
                                    <div class="mt-2">
                                        <img src="{{ $blog->image_source }}" alt="Current image" class="img-thumbnail" style="max-width: 200px;">
                                    </div>
                                @endif
                            </div>

                            <div id="url_section" style="{{ !$blog->image_url ? 'display: none;' : '' }}">
                                <input type="url" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" value="{{ old('image_url', $blog->image_url) }}" placeholder="https://i.imgur.com/... atau URL gambar lainnya">
                                @error('image_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Masukkan URL gambar dari ImgURL, Imgur, atau hosting gambar lainnya</div>
                                @if($blog->image_source && $blog->image_url)
                                    <div class="mt-2">
                                        <img src="{{ $blog->image_source }}" alt="Current image" class="img-thumbnail" style="max-width: 200px;">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-2"></i>Update Blog
                            </button>
                            <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
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