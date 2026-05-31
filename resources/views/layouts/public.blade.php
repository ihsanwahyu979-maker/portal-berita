<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PortalBerita — Terpercaya & Terkini')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --red:      #cc1a1a;
            --red-dark: #991414;
            --dark:     #0f1318;
            --dark2:    #1a2030;
            --gold:     #f59e0b;
            --gray-bg:  #f4f6f8;
        }
        *, *::before, *::after { box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: var(--gray-bg); color: #1a1a2e; }
        h1,h2,h3,h4,h5 { font-family: 'Playfair Display', serif; }

        /* ── TOPBAR ── */
        .topbar {
            background: var(--dark);
            font-size: .72rem;
            letter-spacing: .02em;
            border-bottom: 1px solid #1f2937;
        }
        .topbar a { color: #6b7280; transition: color .2s; }
        .topbar a:hover { color: var(--red); }

        /* ── HEADER ── */
        .site-header {
            background: #fff;
            border-bottom: 4px solid var(--red);
            box-shadow: 0 2px 20px rgba(0,0,0,.08);
            position: sticky; top: 0; z-index: 1030;
        }
        .brand-icon { background: var(--red); padding: 10px; border-radius: 8px; display:flex; }
        .brand-name  { font-family:'Playfair Display',serif; font-size:1.6rem; font-weight:800; color:var(--dark); line-height:1; }
        .brand-name span { color: var(--red); }
        .brand-sub   { font-size:.68rem; color:#9ca3af; letter-spacing:.05em; }

        .search-wrap {
            display: flex; align-items: center;
            border: 2px solid #e5e7eb; border-radius: 50px;
            padding: 6px 16px; gap: 8px;
            transition: border-color .2s, box-shadow .2s;
        }
        .search-wrap:focus-within { border-color: var(--red); box-shadow: 0 0 0 3px rgba(204,26,26,.1); }
        .search-wrap input { border:none; outline:none; background:transparent; font-size:.875rem; width:200px; }

        /* ── NAVBAR ── */
        .site-nav { background: var(--dark); }
        .site-nav .nav-link {
            color: #9ca3af !important; font-size:.85rem; font-weight:500;
            padding: 12px 18px !important; position:relative;
            transition: color .2s, background .2s;
        }
        .site-nav .nav-link::after {
            content:''; position:absolute; bottom:0; left:50%; right:50%;
            height:3px; background: var(--red); transition: all .25s;
        }
        .site-nav .nav-link:hover { color:#fff !important; background: rgba(255,255,255,.05); }
        .site-nav .nav-link:hover::after { left:0; right:0; }
        .site-nav .nav-link.active-cat { color:#fff !important; }
        .site-nav .nav-link.active-cat::after { left:0; right:0; }

        /* ── TICKER ── */
        .news-ticker {
            background: var(--red);
            display: flex; align-items: center;
            overflow: hidden;
        }
        .ticker-label {
            background: var(--dark); color:#fff;
            padding: 7px 18px; font-weight:700; font-size:.75rem;
            white-space:nowrap; display:flex; align-items:center; gap:6px;
            letter-spacing:.05em; z-index:1;
        }
        .ticker-track { overflow:hidden; flex:1; }
        .ticker-inner {
            display:inline-block;
            animation: ticker-run 35s linear infinite;
            white-space:nowrap; font-size:.82rem; color:rgba(255,255,255,.92);
            padding: 7px 0;
        }
        @keyframes ticker-run {
            0%   { transform: translateX(100vw); }
            100% { transform: translateX(-100%); }
        }

        /* ── FEATURED ── */
        .featured-wrap {
            position:relative; border-radius:14px; overflow:hidden;
            height:490px; cursor:pointer;
            box-shadow: 0 8px 32px rgba(0,0,0,.18);
        }
        .featured-wrap img {
            width:100%; height:100%; object-fit:cover;
            transition: transform .6s ease;
        }
        .featured-wrap:hover img { transform: scale(1.04); }
        .featured-overlay {
            position:absolute; inset:0;
            background: linear-gradient(to top, rgba(0,0,0,.92) 0%, rgba(0,0,0,.35) 55%, transparent 100%);
        }
        .featured-body { position:absolute; bottom:0; left:0; right:0; padding:28px; }

        /* ── ARTICLE CARD ── */
        .a-card {
            background:#fff; border-radius:12px; overflow:hidden;
            border:1px solid #e9ecef;
            transition: transform .25s, box-shadow .25s;
            height:100%; display:flex; flex-direction:column;
        }
        .a-card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(0,0,0,.12); }
        .a-card .a-img { height:190px; overflow:hidden; }
        .a-card .a-img img { width:100%; height:100%; object-fit:cover; transition: transform .5s; }
        .a-card:hover .a-img img { transform: scale(1.07); }
        .a-card .a-body { padding:16px; flex:1; display:flex; flex-direction:column; }

        /* ── SMALL CARD ── */
        .s-card {
            display:flex; gap:12px; padding:12px 0;
            border-bottom:1px solid #f0f0f0;
            text-decoration:none; color:inherit;
        }
        .s-card:last-child { border-bottom:none; }
        .s-card img { width:82px; height:66px; object-fit:cover; border-radius:8px; flex-shrink:0; }
        .s-card:hover .s-title { color: var(--red); }

        /* ── SECTION TITLE ── */
        .sec-title {
            font-family:'Playfair Display',serif;
            font-size:1.5rem; font-weight:800;
            border-left:4px solid var(--red);
            padding-left:14px; margin-bottom:0;
            color: var(--dark);
        }

        /* ── CATEGORY BADGES ── */
        .cat { font-size:.68rem; font-weight:700; padding:3px 10px; border-radius:4px; color:#fff; }
        .cat-Nasional      { background:#dc2626; }
        .cat-Internasional { background:#2563eb; }
        .cat-Ekonomi       { background:#16a34a; }
        .cat-Olahraga      { background:#ea580c; }
        .cat-Teknologi     { background:#7c3aed; }
        .cat-Hiburan       { background:#db2777; }
        .cat-Kesehatan     { background:#0d9488; }
        .cat-Pendidikan    { background:#4338ca; }

        /* ── FOOTER ── */
        .site-footer { background: var(--dark); border-top: 3px solid var(--red); }
        .footer-title { font-size:.72rem; font-weight:700; letter-spacing:.1em; color:#fff; text-transform:uppercase; }
        .footer-link  { color:#6b7280; text-decoration:none; font-size:.85rem; display:block; margin-bottom:6px; transition:color .2s; }
        .footer-link:hover { color: var(--red); }
        .footer-icon  { color: var(--red); }

        /* ── UTILS ── */
        .lc2 { display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; }
        .lc3 { display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden; }
        .text-red { color: var(--red) !important; }
        .btn-red { background:var(--red); color:#fff; border:none; }
        .btn-red:hover { background:var(--red-dark); color:#fff; }
    </style>
</head>
<body>

{{-- ══════════ TOPBAR ══════════ --}}
<div class="topbar py-1">
    <div class="container-xl d-flex justify-content-between align-items-center text-secondary">
        <span>
            <i class="bi bi-calendar3 me-1"></i>
            {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
        </span>
        <div class="d-flex gap-3">
            <a href="/admin" class="text-decoration-none">
                <i class="bi bi-shield-lock me-1"></i>Admin Panel
            </a>
        </div>
    </div>
</div>

{{-- ══════════ HEADER ══════════ --}}
<header class="site-header py-3">
    <div class="container-xl d-flex align-items-center justify-content-between">
        <a href="/" class="text-decoration-none d-flex align-items-center gap-3">
            <div class="brand-icon">
                <i class="bi bi-newspaper text-white fs-5"></i>
            </div>
            <div>
                <div class="brand-name">Portal<span>Berita</span></div>
                <div class="brand-sub">Terpercaya &amp; Terkini</div>
            </div>
        </a>

        <form action="/" method="GET" class="search-wrap d-none d-lg-flex">
            <i class="bi bi-search text-secondary" style="font-size:.85rem"></i>
            <input type="text" name="search" placeholder="Cari berita terkini..." value="{{ request('search') }}">
            <button class="btn btn-red btn-sm rounded-pill px-3" type="submit" style="font-size:.78rem">Cari</button>
        </form>

        <button class="btn d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNav">
            <i class="bi bi-list fs-3 text-dark"></i>
        </button>
    </div>
</header>

{{-- ══════════ NAV ══════════ --}}
<nav class="site-nav d-none d-lg-block">
    <div class="container-xl d-flex">
        <a href="/" class="nav-link {{ !request('category') && !request('search') ? 'active-cat' : '' }}">
            <i class="bi bi-house me-1"></i>Beranda
        </a>
        @foreach(['Nasional','Internasional','Ekonomi','Olahraga','Teknologi','Hiburan','Kesehatan','Pendidikan'] as $cat)
        <a href="/?category={{ $cat }}" class="nav-link {{ request('category') === $cat ? 'active-cat' : '' }}">
            {{ $cat }}
        </a>
        @endforeach
    </div>
</nav>

{{-- Mobile Nav --}}
<div class="collapse bg-white border-bottom shadow-sm" id="mobileNav">
    <div class="container py-3">
        <form action="/" method="GET" class="d-flex gap-2 mb-3">
            <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari berita...">
            <button class="btn btn-red btn-sm px-3">Cari</button>
        </form>
        <a href="/" class="d-block py-2 border-bottom fw-semibold text-decoration-none text-dark small">
            <i class="bi bi-house me-2 text-red"></i>Beranda
        </a>
        @foreach(['Nasional','Internasional','Ekonomi','Olahraga','Teknologi','Hiburan','Kesehatan','Pendidikan'] as $cat)
        <a href="/?category={{ $cat }}" class="d-block py-2 border-bottom text-decoration-none text-dark small">
            <i class="bi bi-chevron-right me-2 text-red"></i>{{ $cat }}
        </a>
        @endforeach
    </div>
</div>

{{-- ══════════ TICKER ══════════ --}}
@isset($ticker)
@if($ticker->count())
<div class="news-ticker">
    <div class="ticker-label">
        <i class="bi bi-lightning-charge-fill"></i> TERKINI
    </div>
    <div class="ticker-track">
        <div class="ticker-inner">
            {{ $ticker->pluck('title')->join(' &nbsp;•&nbsp; ') }}
            &nbsp;&nbsp;&nbsp;&nbsp;
            {{ $ticker->pluck('title')->join(' &nbsp;•&nbsp; ') }}
        </div>
    </div>
</div>
@endif
@endisset

{{-- ══════════ MAIN ══════════ --}}
<main class="py-5">
    <div class="container-xl">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 rounded-3 shadow-sm mb-4">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        @yield('content')
    </div>
</main>

{{-- ══════════ FOOTER ══════════ --}}
<footer class="site-footer text-secondary py-5 mt-3">
    <div class="container-xl">
        <div class="row g-5">
            <div class="col-12 col-md-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="brand-icon"><i class="bi bi-newspaper text-white"></i></div>
                    <div>
                        <div class="brand-name text-white" style="font-size:1.3rem">Portal<span>Berita</span></div>
                        <div class="brand-sub">Terpercaya &amp; Terkini</div>
                    </div>
                </div>
                <p class="small" style="color:#6b7280;line-height:1.7">
                    Portal berita terpercaya yang menyajikan informasi terkini, mendalam, dan berimbang dari seluruh penjuru Indonesia dan dunia.
                </p>
                <div class="d-flex gap-2 mt-3">
                    @foreach(['facebook','twitter','instagram','youtube'] as $sm)
                    <a href="#" class="btn btn-sm" style="background:#1f2937;color:#9ca3af;border-radius:8px;padding:6px 10px">
                        <i class="bi bi-{{ $sm }}"></i>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="col-6 col-md-2">
                <p class="footer-title mb-3">Kategori</p>
                @foreach(['Nasional','Internasional','Ekonomi','Olahraga','Teknologi','Hiburan'] as $cat)
                <a href="/?category={{ $cat }}" class="footer-link">{{ $cat }}</a>
                @endforeach
            </div>
            <div class="col-6 col-md-3">
                <p class="footer-title mb-3">Tentang Kami</p>
                @foreach(['Profil Redaksi','Pedoman Media','Kebijakan Privasi','Syarat & Ketentuan','Karir'] as $item)
                <a href="#" class="footer-link">{{ $item }}</a>
                @endforeach
            </div>
            <div class="col-12 col-md-3">
                <p class="footer-title mb-3">Kontak</p>
                <div class="d-flex flex-column gap-2" style="font-size:.85rem;color:#6b7280">
                    <span><i class="bi bi-envelope-fill footer-icon me-2"></i>redaksi@portalberita.com</span>
                    <span><i class="bi bi-telephone-fill footer-icon me-2"></i>+62 21 1234 5678</span>
                    <span><i class="bi bi-geo-alt-fill footer-icon me-2"></i>Jl. Sudirman No.1, Jakarta Pusat</span>
                    <span><i class="bi bi-clock-fill footer-icon me-2"></i>Senin – Jumat, 08.00–17.00</span>
                </div>
            </div>
        </div>
        <hr style="border-color:#1f2937;margin-top:40px">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
            <small style="color:#4b5563">© {{ date('Y') }} PortalBerita. Seluruh hak cipta dilindungi undang-undang.</small>
            <small style="color:#374151">Berita Terpercaya · Informasi Terkini · Jurnalisme Berimbang</small>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
