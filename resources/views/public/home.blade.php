@extends('layouts.public')
@section('title', 'Beranda — Portal Berita')

@section('content')

{{-- ── Filter / Search Banner ── --}}
@if(request('category') || request('search'))
<div class="d-flex align-items-center justify-content-between mb-5 pb-3" style="border-bottom:3px solid var(--red)">
    <div>
        <h2 class="sec-title mb-1">
            {{ request('category') ? 'Berita '.request('category') : 'Hasil: "'.request('search').'"' }}
        </h2>
        <small class="text-muted"><i class="bi bi-file-earmark-text me-1"></i>{{ $articles->count() }} berita ditemukan</small>
    </div>
    <a href="/" class="btn btn-outline-danger btn-sm rounded-pill"><i class="bi bi-x me-1"></i>Reset</a>
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
            <a href="/berita/{{ $featured->id }}" class="text-decoration-none d-block featured-wrap">
                <img src="{{ $featured->image_url ?: 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=900' }}"
                     alt="{{ $featured->title }}" loading="lazy">
                <div class="featured-overlay"></div>
                <div class="featured-body">
                    <span class="cat cat-{{ $featured->category }} mb-2 d-inline-block">{{ $featured->category }}</span>
                    @if($featured->is_featured)
                        <span class="badge mb-2 ms-1" style="background:var(--gold);color:#000;font-size:.65rem">
                            <i class="bi bi-star-fill me-1"></i>UNGGULAN
                        </span>
                    @endif
                    <h2 class="text-white fw-bold lc2 mb-2" style="font-size:1.85rem;line-height:1.25">
                        {{ $featured->title }}
                    </h2>
                    @if($featured->excerpt)
                    <p class="text-light lc2 mb-3" style="font-size:.9rem;opacity:.85">{{ $featured->excerpt }}</p>
                    @endif
                    <div class="d-flex flex-wrap gap-3" style="font-size:.78rem;color:rgba(255,255,255,.7)">
                        <span><i class="bi bi-person me-1"></i>{{ $featured->author_name ?: 'Redaksi' }}</span>
                        <span><i class="bi bi-clock me-1"></i>{{ $featured->created_at->diffForHumans() }}</span>
                        <span><i class="bi bi-eye me-1"></i>{{ number_format($featured->view_count) }} pembaca</span>
                    </div>
                </div>
            </a>
        </div>

        {{-- Secondary List --}}
        <div class="col-12 col-lg-4">
            <div class="bg-white rounded-3 border h-100 d-flex flex-column p-3" style="border-color:#e9ecef!important">
                <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                    <span style="width:4px;height:20px;background:var(--red);border-radius:2px;display:inline-block"></span>
                    <span class="fw-bold text-uppercase" style="font-size:.72rem;letter-spacing:.08em;color:#6b7280">Berita Terbaru</span>
                </div>
                @foreach($secondary as $art)
                <a href="/berita/{{ $art->id }}" class="s-card">
                    <img src="{{ $art->image_url ?: 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=200' }}" alt="">
                    <div>
                        <span class="cat cat-{{ $art->category }} mb-1 d-inline-block">{{ $art->category }}</span>
                        <p class="mb-1 fw-semibold s-title lc2" style="font-size:.85rem;transition:color .2s">{{ $art->title }}</p>
                        <small class="text-muted"><i class="bi bi-clock me-1"></i>{{ $art->created_at->diffForHumans() }}</small>
                    </div>
                </a>
                @endforeach
            </div>
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
@foreach(['Nasional','Internasional','Ekonomi','Olahraga','Teknologi','Hiburan','Kesehatan','Pendidikan'] as $cat)
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
