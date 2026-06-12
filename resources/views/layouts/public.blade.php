<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PortalBerita — Terpercaya & Terkini')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0a0a0a;
            --secondary: #171717;
            --accent: #e11d48;
            --accent-hover: #be123c;
            --gold: #fbbf24;
            --gray-bg: #f8fafc;
            --text-main: #0f172a;
            --text-muted: #64748b;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--gray-bg);
            color: var(--text-main);
            line-height: 1.6;
        }

        h1, h2, h3, h4, h5, .serif {
            font-family: 'Playfair Display', serif;
        }

        /* ── TOPBAR ── */
        .topbar {
            background: var(--primary);
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            color: #a1a1aa;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .topbar a {
            color: #a1a1aa;
            text-decoration: none;
            transition: color 0.3s;
        }

        .topbar a:hover {
            color: #fff;
        }

        /* ── GLASS HEADER ── */
        .site-header {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 1030;
            transition: all 0.3s ease;
        }

        .brand-icon {
            background: linear-gradient(135deg, var(--accent), #9f1239);
            padding: 8px 12px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(225, 29, 72, 0.3);
        }

        .brand-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 900;
            color: var(--primary);
            line-height: 1;
            letter-spacing: -0.02em;
        }

        .brand-name span {
            color: var(--accent);
        }

        .brand-sub {
            font-size: 0.7rem;
            text-transform: uppercase;
            color: var(--text-muted);
            letter-spacing: 0.15em;
            font-weight: 600;
            margin-top: 2px;
        }

        /* ── NAVBAR ── */
        .site-nav {
            background: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
        }

        .site-nav .nav-link {
            color: var(--text-main) !important;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 16px 20px !important;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            position: relative;
            transition: color 0.3s;
        }

        .site-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 50%;
            right: 50%;
            height: 2px;
            background: var(--accent);
            transition: all 0.3s ease;
        }

        .site-nav .nav-link:hover,
        .site-nav .nav-link.active-nav,
        .site-nav .nav-item.show .nav-link {
            color: var(--accent) !important;
        }

        .site-nav .nav-link:hover::after,
        .site-nav .nav-link.active-nav::after,
        .site-nav .nav-item.show .nav-link::after {
            left: 0;
            right: 0;
        }

        /* ── DROPDOWN ── */
        .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            padding: 12px;
            margin-top: 0;
            animation: fadeInDown 0.3s ease;
        }

        .dropdown-item {
            border-radius: 6px;
            padding: 8px 16px;
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--text-main);
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background: rgba(225, 29, 72, 0.05);
            color: var(--accent);
            transform: translateX(4px);
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ── SEARCH ── */
        .search-wrap {
            display: flex;
            align-items: center;
            background: #f1f5f9;
            border-radius: 50px;
            padding: 6px 16px;
            gap: 10px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .search-wrap:focus-within {
            background: #fff;
            border-color: rgba(225, 29, 72, 0.3);
            box-shadow: 0 0 0 4px rgba(225, 29, 72, 0.1);
        }

        .search-wrap input {
            border: none;
            outline: none;
            background: transparent;
            font-size: 0.85rem;
            width: 180px;
            color: var(--text-main);
            transition: width 0.3s ease;
        }

        .search-wrap input:focus {
            width: 240px;
        }

        /* ── TICKER ── */
        .news-ticker {
            background: var(--primary);
            display: flex;
            align-items: center;
            overflow: hidden;
            border-bottom: 2px solid var(--accent);
        }

        .ticker-label {
            background: var(--accent);
            color: #fff;
            padding: 8px 20px;
            font-weight: 700;
            font-size: 0.75rem;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 8px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            z-index: 2;
            box-shadow: 4px 0 15px rgba(0,0,0,0.2);
        }

        .ticker-track {
            overflow: hidden;
            flex: 1;
            position: relative;
        }

        .ticker-inner {
            display: inline-block;
            animation: ticker-run 40s linear infinite;
            white-space: nowrap;
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.9);
            padding: 8px 0;
            font-weight: 500;
        }

        @keyframes ticker-run {
            0% { transform: translateX(100vw); }
            100% { transform: translateX(-100%); }
        }

        /* ── SECTION TITLE ── */
        .sec-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
            position: relative;
            padding-bottom: 12px;
            margin-bottom: 0;
        }

        .sec-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--accent);
            border-radius: 2px;
        }

        /* ── BUTTONS & BADGES ── */
        .btn-red {
            background: var(--accent);
            color: #fff;
            border: none;
            font-weight: 600;
            letter-spacing: 0.02em;
            transition: all 0.3s ease;
        }

        .btn-red:hover {
            background: var(--accent-hover);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(225, 29, 72, 0.25);
        }

        .cat-badge {
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 4px 10px;
            border-radius: 4px;
            color: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .cat-Nasional { background: linear-gradient(135deg, #dc2626, #991b1b); }
        .cat-Internasional { background: linear-gradient(135deg, #2563eb, #1e40af); }
        .cat-Politik { background: linear-gradient(135deg, #4f46e5, #3730a3); }
        .cat-Ekonomi { background: linear-gradient(135deg, #16a34a, #166534); }
        .cat-Bisnis { background: linear-gradient(135deg, #ca8a04, #854d0e); }
        .cat-Olahraga { background: linear-gradient(135deg, #ea580c, #9a3412); }
        .cat-Teknologi { background: linear-gradient(135deg, #7c3aed, #5b21b6); }
        .cat-Hiburan { background: linear-gradient(135deg, #db2777, #9d174d); }
        .cat-Kesehatan { background: linear-gradient(135deg, #0d9488, #115e59); }
        .cat-Pendidikan { background: linear-gradient(135deg, #4338ca, #312e81); }
        .region-badge { background: var(--primary); }

        /* ── FOOTER ── */
        .site-footer {
            background: var(--primary);
            border-top: 4px solid var(--accent);
            color: #94a3b8;
            padding-top: 80px;
            padding-bottom: 40px;
        }

        .footer-title {
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            color: #fff;
            text-transform: uppercase;
            margin-bottom: 24px;
            position: relative;
            display: inline-block;
        }
        .footer-title::after {
            content: ''; position:absolute; bottom:-6px; left:0; width:30px; height:2px; background:var(--accent);
        }

        .footer-link {
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.9rem;
            display: block;
            margin-bottom: 12px;
            transition: all 0.2s;
        }

        .footer-link:hover {
            color: #fff;
            transform: translateX(4px);
        }

        .footer-social-btn {
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-social-btn:hover {
            background: var(--accent);
            border-color: var(--accent);
            transform: translateY(-4px) rotate(8deg);
            box-shadow: 0 8px 20px rgba(225, 29, 72, 0.4);
        }

        /* ── UTILS ── */
        .lc2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .lc3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
        .text-accent { color: var(--accent) !important; }
        .bg-accent { background: var(--accent) !important; }
    </style>
</head>

<body>

    {{-- ══════════ TOPBAR ══════════ --}}
    <div class="topbar py-2">
        <div class="container-xl d-flex justify-content-between align-items-center">
            <span class="d-flex align-items-center gap-2">
                <i class="bi bi-calendar3 text-accent"></i>
                <span class="fw-medium">{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</span>
            </span>
            <div class="d-flex gap-4 align-items-center">
                <a href="/admin" class="d-flex align-items-center gap-1 fw-medium hover-white text-decoration-none" style="color: #a1a1aa;">
                    <i class="bi bi-shield-lock text-accent"></i> Ruang Redaksi
                </a>
                @auth
                <form action="/logout" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 border-0 text-decoration-none d-flex align-items-center gap-1 fw-medium hover-white" style="color: #a1a1aa;">
                        <i class="bi bi-box-arrow-left text-accent"></i> Keluar
                    </button>
                </form>
                @endauth
            </div>
        </div>
    </div>

    {{-- ══════════ HEADER ══════════ --}}
    <header class="site-header py-3">
        <div class="container-xl d-flex align-items-center justify-content-between">
            <a href="/" class="text-decoration-none d-flex align-items-center gap-3">
                <div class="brand-icon">
                    <i class="bi bi-globe-americas text-white fs-4"></i>
                </div>
                <div>
                    <div class="brand-name">Portal<span>Berita</span></div>
                    <div class="brand-sub">Terpercaya &amp; Terkini</div>
                </div>
            </a>
            <div class="d-none d-lg-flex align-items-center ms-auto gap-3">
                <form action="/" method="GET" class="position-relative">
                    <input type="text" name="search" class="form-control rounded-pill pe-4" placeholder="Cari berita terkini..." style="width: 250px; background-color: var(--gray-bg); border: none; font-size: 0.9rem; padding-left: 1.25rem;">
                    <i class="bi bi-search position-absolute top-50 translate-middle-y text-muted" style="right: 15px; font-size: 0.85rem;"></i>
                    @if(request('region'))
                    <input type="hidden" name="region" value="{{ request('region') }}">
                    @endif
                    @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                </form>
                <a href="/kirim-berita" class="btn btn-outline-danger rounded-pill fw-medium px-4" style="font-size: 0.9rem; border-color: var(--accent); color: var(--accent);">
                    <i class="bi bi-pencil-square me-1"></i> Kirim Berita
                </a>
            </div>

            <button class="btn d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNav">
                <i class="bi bi-list fs-2 text-dark"></i>
            </button>
        </div>
    </header>

    {{-- ══════════ NAV ══════════ --}}
    @php
        $categories = ['Politik', 'Ekonomi', 'Bisnis', 'Olahraga', 'Teknologi', 'Hiburan', 'Kesehatan', 'Pendidikan'];
    @endphp

    <nav class="site-nav d-none d-lg-block">
        <div class="container-xl d-flex">
            <a href="/" class="nav-link {{ request()->is('/') && !request('region') && !request('category') && !request('search') ? 'active-nav' : '' }}">
                Beranda
            </a>

            <!-- Nasional Dropdown -->
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ request('region') === 'Nasional' ? 'active-nav' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                    Nasional
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item fw-bold text-accent border-bottom mb-2 pb-2" href="/?region=Nasional">Semua Nasional</a></li>
                    @foreach($categories as $cat)
                    <li><a class="dropdown-item" href="/?region=Nasional&category={{ $cat }}">{{ $cat }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Internasional Dropdown -->
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ request('region') === 'Internasional' ? 'active-nav' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                    Internasional
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item fw-bold text-accent border-bottom mb-2 pb-2" href="/?region=Internasional">Semua Internasional</a></li>
                    @foreach($categories as $cat)
                    <li><a class="dropdown-item" href="/?region=Internasional&category={{ $cat }}">{{ $cat }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Kategori Utama Dropdown -->
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ request('category') && !request('region') ? 'active-nav' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                    Topik Utama
                </a>
                <ul class="dropdown-menu">
                    @foreach($categories as $cat)
                    <li><a class="dropdown-item" href="/?category={{ $cat }}">{{ $cat }}</a></li>
                    @endforeach
                </ul>
            </div>

            <a href="/tentang" class="nav-link {{ request()->is('tentang') ? 'active-nav' : '' }}">
                Tentang Kami
            </a>
            <a href="/kontak" class="nav-link {{ request()->is('kontak') ? 'active-nav' : '' }}">
                Kontak
            </a>
        </div>
    </nav>

    {{-- Mobile Nav --}}
    <div class="collapse bg-white border-bottom shadow-sm" id="mobileNav">
        <div class="container py-4">
            <form action="/" method="GET" class="d-flex gap-2 mb-4">
                <input type="text" name="search" class="form-control" placeholder="Cari berita..." value="{{ request('search') }}">
                <button class="btn btn-red px-4">Cari</button>
            </form>
            
            <a href="/kirim-berita" class="d-flex align-items-center justify-content-center p-3 mb-4 rounded-3 text-white text-decoration-none fw-bold" style="background-color: var(--accent); box-shadow: 0 4px 12px rgba(225, 29, 72, 0.25);">
                <i class="bi bi-pencil-square fs-5 me-2"></i> Kirim Berita Anda
            </a>
            
            <a href="/" class="d-block py-3 border-bottom fw-bold text-decoration-none text-dark">
                <i class="bi bi-house me-2 text-accent"></i> Beranda
            </a>
            <a href="/?region=Nasional" class="d-block py-3 border-bottom fw-bold text-decoration-none text-dark">
                <i class="bi bi-geo-alt me-2 text-accent"></i> Berita Nasional
            </a>
            <a href="/?region=Internasional" class="d-block py-3 border-bottom fw-bold text-decoration-none text-dark">
                <i class="bi bi-globe me-2 text-accent"></i> Berita Internasional
            </a>
            
            <div class="py-3 border-bottom">
                <div class="fw-bold text-dark mb-2"><i class="bi bi-tags me-2 text-accent"></i> Topik Pilihan</div>
                <div class="d-flex flex-wrap gap-2 ps-4">
                    @foreach($categories as $cat)
                    <a href="/?category={{ $cat }}" class="badge bg-light text-dark text-decoration-none border p-2">{{ $cat }}</a>
                    @endforeach
                </div>
            </div>

            <a href="/tentang" class="d-block py-3 border-bottom text-decoration-none text-dark fw-medium">
                <i class="bi bi-info-circle me-2 text-accent"></i> Tentang Kami
            </a>
            <a href="/kontak" class="d-block py-3 text-decoration-none text-dark fw-medium">
                <i class="bi bi-envelope me-2 text-accent"></i> Kontak
            </a>
        </div>
    </div>

    {{-- ══════════ TICKER ══════════ --}}
    @isset($ticker)
    @if($ticker->count())
    <div class="news-ticker">
        <div class="ticker-label">
            <i class="bi bi-lightning-charge-fill"></i> BREAKING NEWS
        </div>
        <div class="ticker-track">
            <div class="ticker-inner">
                {!! $ticker->pluck('title')->join(' &nbsp;&nbsp;✦&nbsp;&nbsp; ') !!}
                &nbsp;&nbsp;✦&nbsp;&nbsp;
                {!! $ticker->pluck('title')->join(' &nbsp;&nbsp;✦&nbsp;&nbsp; ') !!}
            </div>
        </div>
    </div>
    @endif
    @endisset

    {{-- ══════════ MAIN ══════════ --}}
    <main class="py-5" style="min-height: 60vh;">
        <div class="container-xl">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 rounded-3 shadow-sm mb-4 d-flex align-items-center">
                <i class="bi bi-check-circle-fill fs-4 me-3 text-success"></i>
                <div>
                    <h6 class="mb-0 fw-bold">Berhasil!</h6>
                    <span class="small">{{ session('success') }}</span>
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
            @endif
            @yield('content')
        </div>
    </main>

    {{-- ══════════ FOOTER ══════════ --}}
    <footer class="site-footer">
        <div class="container-xl">
            <div class="row g-5 mb-5">
                <div class="col-12 col-md-5 pe-md-5">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="brand-icon shadow-none"><i class="bi bi-globe-americas text-white fs-3"></i></div>
                        <div>
                            <div class="brand-name text-white">Portal<span>Berita</span></div>
                        </div>
                    </div>
                    <p style="color:#94a3b8;line-height:1.8;font-size:0.95rem">
                        Portal berita premium yang menyajikan informasi terkini, mendalam, dan independen dari seluruh penjuru Nusantara hingga dunia. Kami hadir untuk mencerahkan hari Anda dengan fakta yang aktual.
                    </p>
                    <div class="d-flex gap-3 mt-4">
                        <a href="https://facebook.com/cnnindonesia" target="_blank" class="footer-social-btn">
                            <i class="bi bi-facebook fs-5"></i>
                        </a>
                        <a href="https://twitter.com/cnnindonesia" target="_blank" class="footer-social-btn">
                            <i class="bi bi-twitter-x fs-5"></i>
                        </a>
                        <a href="https://instagram.com/cnnindonesia" target="_blank" class="footer-social-btn">
                            <i class="bi bi-instagram fs-5"></i>
                        </a>
                        <a href="https://youtube.com/cnnindonesia" target="_blank" class="footer-social-btn">
                            <i class="bi bi-youtube fs-5"></i>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <p class="footer-title">Jelajahi</p>
                    <a href="/?region=Nasional" class="footer-link">Berita Nasional</a>
                    <a href="/?region=Internasional" class="footer-link">Berita Internasional</a>
                    <a href="/?category=Politik" class="footer-link">Politik</a>
                    <a href="/?category=Ekonomi" class="footer-link">Ekonomi & Bisnis</a>
                    <a href="/?category=Teknologi" class="footer-link">Teknologi</a>
                    <a href="/?category=Olahraga" class="footer-link">Olahraga</a>
                </div>
                <div class="col-6 col-md-2">
                    <p class="footer-title">Perusahaan</p>
                    <a href="/tentang" class="footer-link">Tentang Redaksi</a>
                    <a href="/tentang" class="footer-link">Pedoman Media Siber</a>
                    <a href="/tentang" class="footer-link">Kebijakan Privasi</a>
                    <a href="/tentang" class="footer-link">Syarat & Ketentuan</a>
                    <a href="/kontak" class="footer-link">Karir & Rekrutmen</a>
                </div>
                <div class="col-12 col-md-3">
                    <p class="footer-title">Hubungi Kami</p>
                    <div class="d-flex flex-column gap-3" style="font-size:.9rem;color:#94a3b8">
                        <div class="d-flex align-items-start gap-3">
                            <i class="bi bi-geo-alt-fill text-accent fs-5 mt-1"></i>
                            <div>Gedung PortalBerita Tower Lt. 12<br>Jl. Sudirman No. 1, Jakarta</div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <i class="bi bi-envelope-fill text-accent fs-5"></i>
                            <span>redaksi@portalberita.com</span>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <i class="bi bi-telephone-fill text-accent fs-5"></i>
                            <span>+62 21 1234 5678</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="border-top pt-4 d-flex flex-column flex-md-row justify-content-between align-items-center gap-3" style="border-color: rgba(255,255,255,0.1) !important">
                <span style="font-size:0.85rem;color:#64748b">© {{ date('Y') }} PortalBerita. Seluruh Hak Cipta Dilindungi Undang-Undang.</span>
                <span class="fw-medium" style="font-size:0.85rem;color:#94a3b8">Jurnalisme Terpercaya · Inspirasi Masa Depan</span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>