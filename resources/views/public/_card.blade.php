<div class="{{ $col ?? 'col-12 col-md-6 col-lg-4' }}">
    <a href="/berita/{{ $article->id }}" class="text-decoration-none d-block h-100">
        <div class="a-card">
            <div class="a-img">
                <img src="{{ $article->image_url ?: 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=600' }}"
                     alt="{{ $article->title }}" loading="lazy">
            </div>
            <div class="a-body">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="cat cat-{{ $article->category }}">{{ $article->category }}</span>
                    @if($article->is_featured)
                    <span style="font-size:.65rem;background:var(--gold);color:#000;padding:2px 7px;border-radius:3px;font-weight:700">
                        ★ Unggulan
                    </span>
                    @endif
                </div>
                <h5 class="fw-bold lc2 mb-2 text-dark" style="font-size:.95rem;line-height:1.4;transition:color .2s">
                    {{ $article->title }}
                </h5>
                @if($article->excerpt)
                <p class="text-muted lc2 mb-3" style="font-size:.82rem">{{ $article->excerpt }}</p>
                @endif
                <div class="mt-auto d-flex align-items-center justify-content-between" style="font-size:.74rem;color:#9ca3af">
                    <span><i class="bi bi-person me-1"></i>{{ $article->author_name ?: 'Redaksi' }}</span>
                    <span class="d-flex align-items-center gap-2">
                        <span><i class="bi bi-clock me-1"></i>{{ $article->created_at->diffForHumans() }}</span>
                        <span><i class="bi bi-eye me-1"></i>{{ number_format($article->view_count) }}</span>
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>
