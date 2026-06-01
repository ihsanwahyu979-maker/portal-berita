@extends('layouts.public')
@section('title', $article->title.' — Portal Berita')

@section('content')

{{-- Breadcrumb --}}
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb bg-transparent p-0 m-0 small fw-medium">
        <li class="breadcrumb-item"><a href="/" class="text-accent text-decoration-none"><i class="bi bi-house me-1"></i>Beranda</a></li>
        @if($article->region)
        <li class="breadcrumb-item"><a href="/?region={{ $article->region }}" class="text-accent text-decoration-none">{{ $article->region }}</a></li>
        @endif
        <li class="breadcrumb-item"><a href="/?category={{ $article->category }}" class="text-accent text-decoration-none">{{ $article->category }}</a></li>
        <li class="breadcrumb-item active text-muted text-truncate" style="max-width:320px">{{ $article->title }}</li>
    </ol>
</nav>

<div class="row g-5">

    {{-- ── Main Article ── --}}
    <div class="col-12 col-lg-8">
        <article class="bg-white rounded-4 border-0 shadow-sm p-4 p-md-5">

            <div class="d-flex flex-wrap gap-2 mb-4">
                @if($article->region)
                <span class="cat-badge region-badge shadow-sm">{{ $article->region }}</span>
                @endif
                <span class="cat-badge cat-{{ $article->category }} shadow-sm">{{ $article->category }}</span>
                @if($article->is_featured)
                <span class="cat-badge shadow-sm" style="background:var(--gold);color:#000;">
                    <i class="bi bi-star-fill me-1"></i>PILIHAN REDAKSI
                </span>
                @endif
            </div>

            <h1 class="fw-bold mb-4 serif text-dark" style="font-size:2.4rem;line-height:1.25">
                {{ $article->title }}
            </h1>

            @if($article->excerpt)
            <div class="mb-4 fst-italic text-muted border-start border-4 ps-4 py-2"
               style="border-color: var(--accent) !important; line-height:1.7; font-size: 1.1rem; background:linear-gradient(to right, rgba(225, 29, 72, 0.05), transparent); border-radius:0 12px 12px 0">
                {{ $article->excerpt }}
            </div>
            @endif

            {{-- Meta --}}
            <div class="d-flex flex-wrap gap-4 align-items-center mb-4 pb-4 border-bottom" style="font-size:0.9rem">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold shadow-sm"
                         style="width:45px;height:45px;background:linear-gradient(135deg, var(--accent), #9f1239);font-size:1.1rem;flex-shrink:0">
                        {{ strtoupper(substr($article->author_name ?: 'R', 0, 1)) }}
                    </div>
                    <div>
                        <div class="fw-bold text-dark" style="font-size:1rem">{{ $article->author_name ?: 'Redaksi' }}</div>
                        <div class="text-muted" style="font-size:0.75rem; letter-spacing: 0.05em; text-transform: uppercase;">Penulis</div>
                    </div>
                </div>
                <span class="text-muted d-flex align-items-center gap-2"><i class="bi bi-calendar-event text-accent"></i>{{ $article->created_at->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</span>
                <span class="text-muted d-flex align-items-center gap-2"><i class="bi bi-clock text-accent"></i>{{ $article->created_at->format('H:i') }} WIB</span>
                <span class="ms-auto text-muted d-flex align-items-center gap-2 bg-light px-3 py-1 rounded-pill"><i class="bi bi-eye text-accent"></i>{{ number_format($article->view_count) }} x dibaca</span>
            </div>

            <div class="position-relative mb-5 rounded-4 overflow-hidden shadow-sm">
                <img src="{{ $article->image_url ? (Str::startsWith($article->image_url, ['http://', 'https://']) ? $article->image_url : asset('storage/' . $article->image_url)) : 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=900' }}"
                     class="w-100 object-fit-cover" style="height:450px;"
                     alt="{{ $article->title }}">
            </div>

            {{-- Share --}}
            <div class="d-flex flex-wrap gap-2 mb-5 align-items-center">
                <span class="text-muted small fw-bold me-2 text-uppercase" style="letter-spacing: 0.1em;"><i class="bi bi-share-fill me-2 text-accent"></i>Bagikan:</span>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="btn btn-sm rounded-pill text-white px-4 fw-medium shadow-sm" style="background:#1877f2;transition:transform 0.2s">
                    <i class="bi bi-facebook me-1"></i>Facebook
                </a>
                <a href="https://api.whatsapp.com/send?text={{ urlencode($article->title . ' ' . request()->url()) }}" target="_blank" class="btn btn-sm rounded-pill text-white px-4 fw-medium shadow-sm" style="background:#25d366;transition:transform 0.2s">
                    <i class="bi bi-whatsapp me-1"></i>Whatsapp
                </a>
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(request()->url()) }}" target="_blank" class="btn btn-sm rounded-pill text-white px-4 fw-medium shadow-sm" style="background:#0f1419;transition:transform 0.2s">
                    <i class="bi bi-twitter-x me-1"></i>X (Twitter)
                </a>
            </div>

            {{-- Content --}}
            <div class="article-content" style="white-space:pre-wrap;line-height:2;font-size:1.05rem;color:#1e293b">{{ $article->content }}</div>
            <style>
                .article-content p { margin-bottom: 1.5rem; }
            </style>

            {{-- Tags --}}
            @if($article->tags && count($article->tags))
            <div class="mt-5 pt-4 border-top d-flex flex-wrap gap-2 align-items-center">
                <i class="bi bi-tags-fill text-muted fs-5"></i>
                @foreach($article->tags as $tag)
                <span class="badge border bg-light text-dark fw-medium px-3 py-2 rounded-pill shadow-sm" style="font-size:0.85rem">#{{ $tag }}</span>
                @endforeach
            </div>
            @endif
        </article>
    </div>

    {{-- ── Sidebar ── --}}
    <div class="col-12 col-lg-4">

        @if($related->count())
        <div class="bg-white rounded-4 border-0 shadow-sm p-4 mb-4">
            <div class="d-flex align-items-center gap-2 mb-4 pb-3 border-bottom">
                <span style="width:5px;height:24px;background:var(--accent);border-radius:3px;display:inline-block"></span>
                <span class="fw-bold text-uppercase" style="font-size:0.85rem;letter-spacing:0.1em;color:var(--primary)">Terkait {{ $article->category }}</span>
            </div>
            
            <div class="d-flex flex-column gap-3">
                @foreach($related as $art)
                <a href="/berita/{{ $art->id }}" class="text-decoration-none d-flex gap-3 align-items-center group s-card-modern">
                    <div style="width: 100px; height: 80px; flex-shrink: 0; overflow: hidden; border-radius: 8px;">
                        <img src="{{ $art->image_url ? (Str::startsWith($art->image_url, ['http://', 'https://']) ? $art->image_url : asset('storage/' . $art->image_url)) : 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=200' }}" alt="" class="w-100 h-100 object-fit-cover" style="transition: transform 0.3s ease;">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <div class="d-flex gap-1 mb-1">
                            @if($art->region)
                            <span class="badge bg-dark" style="font-size:0.6rem">{{ $art->region }}</span>
                            @endif
                        </div>
                        <p class="mb-1 fw-bold lc2 text-dark serif s-title" style="font-size:0.95rem; line-height: 1.3; transition: color 0.2s;">{{ $art->title }}</p>
                        <small class="text-muted" style="font-size:0.7rem"><i class="bi bi-clock me-1"></i>{{ $art->created_at->diffForHumans() }}</small>
                    </div>
                </a>
                @endforeach
            </div>
            <style>
                .s-card-modern:hover img { transform: scale(1.1); }
                .s-card-modern:hover .s-title { color: var(--accent) !important; }
            </style>
        </div>
        @endif

        {{-- Kategori --}}
        <div class="bg-white rounded-4 border-0 shadow-sm p-4">
            <div class="d-flex align-items-center gap-2 mb-4 pb-3 border-bottom">
                <span style="width:5px;height:24px;background:var(--accent);border-radius:3px;display:inline-block"></span>
                <span class="fw-bold text-uppercase" style="font-size:0.85rem;letter-spacing:0.1em;color:var(--primary)">Jelajahi Topik</span>
            </div>
            <div class="d-flex flex-column gap-2">
                @foreach(['Politik','Ekonomi','Bisnis','Olahraga','Teknologi','Hiburan','Kesehatan','Pendidikan'] as $cat)
                <a href="/?category={{ $cat }}"
                   class="d-flex justify-content-between align-items-center py-2 px-3 rounded-3 text-decoration-none text-dark fw-medium"
                   style="transition:all .2s;font-size:0.9rem; background: var(--gray-bg);"
                   onmouseover="this.style.background='rgba(225,29,72,.05)'; this.style.color='var(--accent)';"
                   onmouseout="this.style.background='var(--gray-bg)'; this.style.color='var(--text-main)';">
                    <span class="d-flex align-items-center gap-2"><span class="cat-badge cat-{{ $cat }} shadow-sm" style="font-size:0.5rem; padding: 3px 6px;">●</span> {{ $cat }}</span>
                    <i class="bi bi-chevron-right text-muted" style="font-size:.75rem"></i>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
