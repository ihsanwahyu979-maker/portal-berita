@extends('layouts.public')
@section('title', $article->title.' — Portal Berita')

@section('content')

{{-- Breadcrumb --}}
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb bg-transparent p-0 m-0 small">
        <li class="breadcrumb-item"><a href="/" class="text-red text-decoration-none"><i class="bi bi-house me-1"></i>Beranda</a></li>
        <li class="breadcrumb-item"><a href="/?category={{ $article->category }}" class="text-red text-decoration-none">{{ $article->category }}</a></li>
        <li class="breadcrumb-item active text-muted text-truncate" style="max-width:320px">{{ $article->title }}</li>
    </ol>
</nav>

<div class="row g-5">

    {{-- ── Main Article ── --}}
    <div class="col-12 col-lg-8">
        <article class="bg-white rounded-3 border shadow-sm p-4 p-md-5">

            <span class="cat cat-{{ $article->category }} mb-3 d-inline-block">{{ $article->category }}</span>
            @if($article->is_featured)
            <span class="badge ms-1 mb-3" style="background:var(--gold);color:#000;font-size:.7rem">
                <i class="bi bi-star-fill me-1"></i>UNGGULAN
            </span>
            @endif

            <h1 class="fw-bold mb-4" style="font-size:2rem;line-height:1.3;font-family:'Playfair Display',serif">
                {{ $article->title }}
            </h1>

            @if($article->excerpt)
            <p class="mb-4 fs-5 fst-italic text-muted border-start border-4 border-danger ps-4 py-1"
               style="line-height:1.6;background:rgba(204,26,26,.04);border-radius:0 8px 8px 0">
                {{ $article->excerpt }}
            </p>
            @endif

            {{-- Meta --}}
            <div class="d-flex flex-wrap gap-3 align-items-center mb-4 pb-4 border-bottom" style="font-size:.83rem">
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
                         style="width:36px;height:36px;background:var(--red);font-size:.8rem;flex-shrink:0">
                        {{ strtoupper(substr($article->author_name ?: 'R', 0, 1)) }}
                    </div>
                    <div>
                        <div class="fw-semibold text-dark" style="font-size:.85rem">{{ $article->author_name ?: 'Redaksi' }}</div>
                        <div class="text-muted" style="font-size:.72rem">Penulis</div>
                    </div>
                </div>
                <span class="text-muted"><i class="bi bi-calendar3 me-1 text-red"></i>{{ $article->created_at->locale('id')->isoFormat('D MMMM YYYY') }}</span>
                <span class="text-muted"><i class="bi bi-clock me-1 text-red"></i>{{ $article->created_at->diffForHumans() }}</span>
                <span class="ms-auto text-muted"><i class="bi bi-eye me-1 text-red"></i>{{ number_format($article->view_count) }} pembaca</span>
            </div>

            <img src="{{ $article->image_url ?: 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=900' }}"
                 class="w-100 rounded-3 mb-4" style="height:380px;object-fit:cover;box-shadow:0 4px 20px rgba(0,0,0,.12)"
                 alt="{{ $article->title }}">

            {{-- Share --}}
            <div class="d-flex gap-2 mb-4">
                <span class="text-muted small me-1"><i class="bi bi-share me-1"></i>Bagikan:</span>
                @foreach(['facebook'=>'#1877f2','whatsapp'=>'#25d366','twitter'=>'#1da1f2'] as $s => $c)
                <a href="#" class="btn btn-sm rounded-pill text-white px-3" style="background:{{ $c }};font-size:.78rem">
                    <i class="bi bi-{{ $s }} me-1"></i>{{ ucfirst($s) }}
                </a>
                @endforeach
            </div>

            {{-- Content --}}
            <div style="white-space:pre-wrap;line-height:1.9;font-size:.97rem;color:#374151">{{ $article->content }}</div>

            {{-- Tags --}}
            @if($article->tags && count($article->tags))
            <div class="mt-5 pt-4 border-top d-flex flex-wrap gap-2 align-items-center">
                <i class="bi bi-tag text-muted"></i>
                @foreach($article->tags as $tag)
                <span class="badge border text-secondary fw-normal" style="background:#f3f4f6;font-size:.8rem">#{{ $tag }}</span>
                @endforeach
            </div>
            @endif
        </article>
    </div>

    {{-- ── Sidebar ── --}}
    <div class="col-12 col-lg-4">

        @if($related->count())
        <div class="bg-white rounded-3 border shadow-sm p-4 mb-4">
            <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                <span style="width:4px;height:20px;background:var(--red);border-radius:2px;display:inline-block"></span>
                <h5 class="fw-bold mb-0" style="font-size:1rem">Berita Terkait</h5>
            </div>
            @foreach($related as $art)
            <a href="/berita/{{ $art->id }}" class="s-card">
                <img src="{{ $art->image_url ?: 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=200' }}" alt="">
                <div>
                    <span class="cat cat-{{ $art->category }} mb-1 d-inline-block">{{ $art->category }}</span>
                    <p class="mb-1 fw-semibold s-title lc2" style="font-size:.85rem">{{ $art->title }}</p>
                    <small class="text-muted">{{ $art->created_at->diffForHumans() }}</small>
                </div>
            </a>
            @endforeach
        </div>
        @endif

        {{-- Kategori --}}
        <div class="bg-white rounded-3 border shadow-sm p-4">
            <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                <span style="width:4px;height:20px;background:var(--red);border-radius:2px;display:inline-block"></span>
                <h5 class="fw-bold mb-0" style="font-size:1rem">Jelajahi Kategori</h5>
            </div>
            @foreach(['Nasional','Internasional','Ekonomi','Olahraga','Teknologi','Hiburan','Kesehatan','Pendidikan'] as $cat)
            <a href="/?category={{ $cat }}"
               class="d-flex justify-content-between align-items-center py-2 px-3 rounded-2 text-decoration-none text-dark mb-1 hover-cat"
               style="transition:background .2s;font-size:.88rem"
               onmouseover="this.style.background='rgba(204,26,26,.06)'"
               onmouseout="this.style.background='transparent'">
                <span><span class="cat cat-{{ $cat }} me-2">{{ substr($cat,0,3) }}</span>{{ $cat }}</span>
                <i class="bi bi-chevron-right text-red" style="font-size:.75rem"></i>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
