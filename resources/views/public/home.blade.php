@extends('layouts.public')
@section('title', 'Beranda — Portal Berita')

@section('content')

{{-- ── Filter / Search Banner ── --}}
@if(request('category') || request('search'))
<div class="d-flex align-items-center justify-content-between mb-5 pb-3" style="border-bottom:3px solid var(--accent)">
    <div>
        <h2 class="sec-title mb-1 border-0 pb-0">
            @if(request('search'))
                Hasil Pencarian: "{{ request('search') }}"
            @elseif(request('region') && request('category'))
                Berita {{ request('region') }} - {{ request('category') }}
            @elseif(request('region'))
                Berita {{ request('region') }}
            @elseif(request('category'))
                Berita {{ request('category') }}
            @endif
        </h2>
        <small class="text-muted"><i class="bi bi-file-earmark-text me-1"></i>{{ $articles->count() }} artikel ditemukan</small>
    </div>
    <a href="/" class="btn btn-outline-dark btn-sm rounded-pill px-3"><i class="bi bi-x me-1"></i>Reset Filter</a>
</div>
@endif

@if($articles->isEmpty())
<div class="text-center py-5">
    <i class="bi bi-newspaper" style="font-size:4rem;color:#d1d5db"></i>
    <h4 class="mt-3 text-muted">Tidak ada berita ditemukan</h4>
    <a href="/" class="btn btn-red rounded-pill mt-2 px-4">← Kembali ke Beranda</a>
</div>

@else

{{-- ═══════════ HERO (only on homepage) ═══════════ --}}
@if(!request('category') && !request('search') && $featured)
<section class="mb-5">
    <div class="row g-4">

        {{-- Featured Big --}}
        <div class="col-12 col-lg-8">
            <a href="/berita/{{ $featured->id }}" class="text-decoration-none d-block position-relative rounded-4 overflow-hidden shadow-sm h-100 featured-wrap" style="min-height: 500px;">
                <img src="{{ $featured->image_url ? (Str::startsWith($featured->image_url, ['http://', 'https://']) ? $featured->image_url : asset('storage/' . $featured->image_url)) : 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=900' }}"
                     alt="{{ $featured->title }}" loading="lazy" class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" style="transition: transform 0.8s ease;">
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to top, rgba(15, 23, 42, 0.95) 0%, rgba(15, 23, 42, 0.4) 50%, transparent 100%);"></div>
                <div class="position-absolute bottom-0 start-0 w-100 p-4 p-md-5 z-1">
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        @if($featured->region)
                        <span class="cat-badge region-badge shadow">{{ $featured->region }}</span>
                        @endif
                        <span class="cat-badge cat-{{ $featured->category }} shadow">{{ $featured->category }}</span>
                        @if($featured->is_featured)
                            <span class="cat-badge shadow" style="background:var(--gold);color:#000;">
                                <i class="bi bi-star-fill me-1"></i>PILIHAN
                            </span>
                        @endif
                    </div>
                    <h2 class="text-white fw-bold lc2 mb-3 serif" style="font-size:2.2rem;line-height:1.3;text-shadow: 0 4px 12px rgba(0,0,0,0.5);">
                        {{ $featured->title }}
                    </h2>
                    @if($featured->excerpt)
                    <p class="text-light lc2 mb-4 d-none d-md-block" style="font-size:1rem;opacity:0.9;text-shadow: 0 2px 8px rgba(0,0,0,0.5);">{{ $featured->excerpt }}</p>
                    @endif
                    <div class="d-flex flex-wrap gap-4" style="font-size:0.85rem;color:rgba(255,255,255,0.8);">
                        <span class="d-flex align-items-center gap-2"><i class="bi bi-person-circle fs-6"></i>{{ $featured->author_name ?: 'Redaksi' }}</span>
                        <span class="d-flex align-items-center gap-2"><i class="bi bi-clock"></i>{{ $featured->created_at->diffForHumans() }}</span>
                        <span class="d-flex align-items-center gap-2"><i class="bi bi-eye"></i>{{ number_format($featured->view_count) }} pembaca</span>
                    </div>
                </div>
            </a>
        </div>

        {{-- Secondary List --}}
        <div class="col-12 col-lg-4">
            <div class="bg-white rounded-4 border-0 shadow-sm h-100 d-flex flex-column p-4">
                <div class="d-flex align-items-center gap-2 mb-4 pb-3 border-bottom">
                    <span style="width:5px;height:24px;background:var(--accent);border-radius:3px;display:inline-block"></span>
                    <span class="fw-bold text-uppercase" style="font-size:0.85rem;letter-spacing:0.1em;color:var(--primary)">Berita Terbaru</span>
                </div>
                <div class="d-flex flex-column gap-3 flex-grow-1 justify-content-between">
                    @foreach($secondary as $art)
                    <a href="/berita/{{ $art->id }}" class="text-decoration-none d-flex gap-3 align-items-center group s-card-modern">
                        <div style="width: 100px; height: 80px; flex-shrink: 0; overflow: hidden; border-radius: 8px;">
                            <img src="{{ $art->image_url ? (Str::startsWith($art->image_url, ['http://', 'https://']) ? $art->image_url : asset('storage/' . $art->image_url)) : 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=200' }}" alt="" class="w-100 h-100 object-fit-cover" style="transition: transform 0.3s ease;">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <div class="d-flex gap-1 mb-1">
                                @if($art->region)
                                <span class="badge bg-dark" style="font-size:0.6rem">{{ $art->region }}</span>
                                @endif
                                <span class="badge bg-secondary" style="font-size:0.6rem">{{ $art->category }}</span>
                            </div>
                            <p class="mb-1 fw-bold lc2 text-dark serif s-title" style="font-size:0.95rem; line-height: 1.3; transition: color 0.2s;">{{ $art->title }}</p>
                            <small class="text-muted" style="font-size:0.7rem"><i class="bi bi-clock me-1"></i>{{ $art->created_at->diffForHumans() }}</small>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <style>
                .s-card-modern:hover img { transform: scale(1.1); }
                .s-card-modern:hover .s-title { color: var(--accent) !important; }
            </style>
        </div>

    </div>
</section>
@endif

{{-- ═══════════ FILTERED GRID ═══════════ --}}
@if(request('category') || request('search'))
<div class="row g-4">
    @foreach($articles as $art)
    @include('public._card', ['article' => $art, 'col' => 'col-12 col-md-6 col-lg-4'])
    @endforeach
</div>

@else

{{-- Terbaru --}}
@if($rest->count())
<section class="mb-5">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h2 class="sec-title">Berita Terbaru</h2>
    </div>
    <div class="row g-4">
        @foreach($rest->take(6) as $art)
        @include('public._card', ['article' => $art, 'col' => 'col-12 col-md-6 col-lg-4'])
        @endforeach
    </div>
</section>
@endif

{{-- Per Kategori --}}
@foreach(['Nasional','Internasional','Politik','Ekonomi','Bisnis','Olahraga','Teknologi','Hiburan','Kesehatan','Pendidikan'] as $cat)
@php $catArts = $articles->where('category', $cat)->take(4); @endphp
@if($catArts->count() >= 2)
<section class="mb-5">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h2 class="sec-title">{{ $cat }}</h2>
        <a href="/?category={{ $cat }}" class="btn btn-outline-danger btn-sm rounded-pill" style="font-size:.78rem">
            Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
        </a>
    </div>
    <div class="row g-4">
        @foreach($catArts as $art)
        @include('public._card', ['article' => $art, 'col' => 'col-12 col-md-6 col-lg-3'])
        @endforeach
    </div>
</section>
@endif
@endforeach

@endif
@endif
@endsection
