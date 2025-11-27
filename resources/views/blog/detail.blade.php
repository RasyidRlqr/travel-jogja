<x-app-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <article>
                    @if($blog->image_source)
                        <img src="{{ $blog->image_source }}" class="img-fluid rounded mb-4" alt="{{ $blog->title }}">
                    @endif

                    <h1 class="display-5 fw-bold mb-3">{{ $blog->title }}</h1>

                    <div class="mb-4">
                        <small class="text-muted">
                            <i class="bi bi-calendar me-2"></i>Dipublikasikan pada {{ $blog->created_at->format('d F Y') }}
                        </small>
                    </div>

                    <div class="blog-content mb-5">
                        {!! nl2br(e($blog->content)) !!}
                    </div>
                </article>

                <hr class="my-5">

                <div class="text-center">
                    <a href="{{ route('blog') }}" class="btn btn-outline-primary">
                        <i class="bi bi-arrow-left me-2"></i>Kembali ke Blog
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Artikel Lainnya</h5>
                    </div>
                    <div class="card-body">
                        @forelse($related_blogs as $related)
                            <div class="mb-3 pb-3 border-bottom">
                                <h6 class="mb-2">
                                    <a href="{{ route('blog.detail', $related->slug) }}" class="text-decoration-none text-dark">
                                        {{ Str::limit($related->title, 50) }}
                                    </a>
                                </h6>
                                <small class="text-muted">
                                    <i class="bi bi-calendar me-1"></i>{{ $related->created_at->format('d M Y') }}
                                </small>
                            </div>
                        @empty
                            <p class="text-muted mb-0">Belum ada artikel lainnya</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>