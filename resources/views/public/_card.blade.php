<div class="{{ $col ?? 'col-12 col-md-6 col-lg-4' }}">
    <a href="/berita/{{ $article->id }}" class="text-decoration-none d-block h-100 a-card-link">
        <div class="a-card bg-white rounded-4 overflow-hidden border-0 shadow-sm position-relative h-100 d-flex flex-column" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
            <div class="a-img position-relative" style="height: 220px; overflow: hidden;">
                <img src="{{ $article->image_url ? (Str::startsWith($article->image_url, ['http://', 'https://']) ? $article->image_url : asset('storage/' . $article->image_url)) : 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=600' }}"
                     alt="{{ $article->title }}" loading="lazy" class="w-100 h-100 object-fit-cover a-img-inner" style="transition: transform 0.7s ease;">
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to bottom, transparent 40%, rgba(15, 23, 42, 0.9));"></div>
                
                <div class="position-absolute bottom-0 start-0 p-3 w-100 d-flex flex-wrap gap-2 z-1">
                    @if($article->region)
                    <span class="cat-badge region-badge shadow">{{ $article->region }}</span>
                    @endif
                    <span class="cat-badge cat-{{ $article->category }} shadow">{{ $article->category }}</span>
                </div>

                @if($article->is_featured)
                <div class="position-absolute top-0 end-0 m-3 z-1">
                    <span class="badge rounded-pill text-dark px-3 py-1 shadow" style="background: var(--gold); font-weight: 700; font-size: 0.65rem; letter-spacing: 0.05em;"><i class="bi bi-star-fill me-1"></i>PILIHAN</span>
                </div>
                @endif
            </div>
            <div class="a-body p-4 d-flex flex-column flex-grow-1">
                <h5 class="fw-bold lc2 mb-3 text-dark serif a-title" style="font-size: 1.15rem; line-height: 1.5; transition: color 0.2s;">
                    {{ $article->title }}
                </h5>
                @if($article->excerpt)
                <p class="text-muted lc3 mb-4" style="font-size: 0.85rem; line-height: 1.6;">{{ $article->excerpt }}</p>
                @endif
                <div class="mt-auto d-flex align-items-center justify-content-between border-top pt-3" style="font-size: 0.75rem; color: #64748b; font-weight: 500;">
                    <span class="d-flex align-items-center gap-2"><i class="bi bi-person-circle fs-6"></i> {{ Str::limit($article->author_name ?: 'Redaksi', 15) }}</span>
                    <span class="d-flex align-items-center gap-3">
                        <span class="d-flex align-items-center gap-1"><i class="bi bi-clock"></i> {{ $article->created_at->diffForHumans() }}</span>
                    </span>
                </div>
            </div>
        </div>
    </a>
</div>

<style>
.a-card-link:hover .a-card { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(0,0,0,0.08) !important; }
.a-card-link:hover .a-img-inner { transform: scale(1.08); }
.a-card-link:hover .a-title { color: var(--accent) !important; }
</style>
