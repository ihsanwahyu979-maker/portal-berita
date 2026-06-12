<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin — Portal Berita')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --red:#cc1a1a; --dark:#0f1318; --dark2:#161d27; --sidebar-w:260px; }
        body  { font-family:'Inter',sans-serif; background:#f1f5f9; overflow-x:hidden; }
        h1,h2,h3,h4,h5 { font-family:'Playfair Display',serif; }

        /* ── SIDEBAR ── */
        .admin-sidebar {
            width: var(--sidebar-w);
            min-height: 100vh;
            background: var(--dark);
            display: flex; flex-direction: column;
            position: fixed; top:0; left:0; bottom:0; z-index:1040;
            box-shadow: 4px 0 24px rgba(0,0,0,.25);
            transition: transform .3s;
        }
        .admin-sidebar.collapsed { transform: translateX(-100%); }
        .s-brand { padding:20px; border-bottom:1px solid #1f2937; }
        .s-brand-icon { background:var(--red); padding:9px; border-radius:8px; }
        .s-brand-name { font-family:'Playfair Display',serif; font-size:1.2rem; font-weight:800; color:#fff; line-height:1; }
        .s-brand-name span { color:var(--red); }
        .s-brand-sub { font-size:.65rem; color:#4b5563; letter-spacing:.05em; }

        .s-section-label {
            font-size:.65rem; font-weight:700; letter-spacing:.12em; color:#4b5563;
            text-transform:uppercase; padding:16px 20px 4px;
        }
        .s-link {
            display:flex; align-items:center; gap:10px;
            padding:10px 16px 10px 20px; margin:2px 8px;
            color:#9ca3af; font-size:.875rem; font-weight:500;
            border-radius:10px; text-decoration:none;
            transition:background .2s, color .2s;
        }
        .s-link:hover { background:#1f2937; color:#e5e7eb; }
        .s-link.active { background:var(--red); color:#fff; box-shadow:0 4px 12px rgba(204,26,26,.3); }
        .s-link .s-icon { width:32px; height:32px; display:flex; align-items:center; justify-content:center; border-radius:8px; background:rgba(255,255,255,.07); font-size:.9rem; flex-shrink:0; }
        .s-link.active .s-icon { background:rgba(255,255,255,.2); }
        .s-badge { margin-left:auto; background:var(--red); color:#fff; font-size:.65rem; padding:2px 7px; border-radius:20px; }
        .s-link.active .s-badge { background:rgba(255,255,255,.3); }

        /* ── TOPBAR (admin) ── */
        .admin-topbar {
            background:#fff; border-bottom:1px solid #e5e7eb;
            padding:12px 24px; display:flex; align-items:center; gap:16px;
            position:sticky; top:0; z-index:1030;
            box-shadow:0 1px 8px rgba(0,0,0,.06);
        }
        .admin-topbar .page-title { font-size:1rem; font-weight:700; color:var(--dark); }
        .admin-topbar .breadcrumb { font-size:.78rem; margin:0; }

        /* ── MAIN ── */
        .admin-main { margin-left:var(--sidebar-w); min-height:100vh; display:flex; flex-direction:column; }
        .admin-content { padding:28px 32px; flex:1; }
        @media(max-width:991px) {
            .admin-main { margin-left:0; }
            .admin-sidebar { transform:translateX(-100%); }
            .admin-sidebar.show { transform:translateX(0); }
        }

        /* ── STAT CARDS ── */
        .stat-card {
            background:#fff; border-radius:14px; border:1px solid #e9ecef;
            padding:22px; position:relative; overflow:hidden;
            transition:transform .2s, box-shadow .2s;
        }
        .stat-card:hover { transform:translateY(-2px); box-shadow:0 8px 24px rgba(0,0,0,.08); }
        .stat-card .stat-icon {
            width:48px; height:48px; border-radius:12px;
            display:flex; align-items:center; justify-content:center; font-size:1.3rem;
        }
        .stat-card .stat-num { font-size:1.9rem; font-weight:800; color:var(--dark); line-height:1; }
        .stat-card .stat-label { font-size:.8rem; color:#9ca3af; margin-top:4px; }
        .stat-card .stat-wave {
            position:absolute; bottom:-10px; right:-10px; font-size:5rem;
            opacity:.05; color:var(--dark);
        }

        /* ── TABLE ── */
        .admin-table { background:#fff; border-radius:14px; overflow:hidden; border:1px solid #e9ecef; }
        .admin-table thead th { background:#f8fafc; font-size:.75rem; font-weight:700; text-transform:uppercase; letter-spacing:.06em; color:#6b7280; border:none; padding:14px 16px; }
        .admin-table tbody td { padding:14px 16px; border-color:#f0f4f8; vertical-align:middle; font-size:.875rem; }
        .admin-table tbody tr { transition:background .15s; }
        .admin-table tbody tr:hover { background:#f8fafc; }

        /* ── BADGES ── */
        .pill-published { background:#d1fae5; color:#065f46; font-size:.72rem; font-weight:700; padding:4px 12px; border-radius:20px; cursor:pointer; border:none; }
        .pill-draft     { background:#fef3c7; color:#92400e; font-size:.72rem; font-weight:700; padding:4px 12px; border-radius:20px; cursor:pointer; border:none; }

        /* ── FORM ── */
        .form-panel { background:#fff; border-radius:14px; border:1px solid #e9ecef; padding:24px; }
        .form-label { font-size:.8rem; font-weight:600; color:#374151; text-transform:uppercase; letter-spacing:.04em; margin-bottom:6px; }
        .form-control, .form-select { border-radius:10px; border-color:#e5e7eb; font-size:.9rem; padding:10px 14px; }
        .form-control:focus, .form-select:focus { border-color:var(--red); box-shadow:0 0 0 3px rgba(204,26,26,.1); }

        /* ── MISC ── */
        .btn-red { background:var(--red); color:#fff; border:none; border-radius:10px; }
        .btn-red:hover { background:#991414; color:#fff; }
        .lc2 { display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; }
        .overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,.5); z-index:1035; }
        .overlay.show { display:block; }
    </style>
</head>
<body>

{{-- Mobile overlay --}}
<div class="overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

{{-- ══════════ SIDEBAR ══════════ --}}
<aside class="admin-sidebar" id="adminSidebar">

    {{-- Brand --}}
    <div class="s-brand d-flex align-items-center gap-2">
        <div class="s-brand-icon"><i class="bi bi-newspaper text-white"></i></div>
        <div>
            <div class="s-brand-name">Portal<span>Berita</span></div>
            <div class="s-brand-sub">ADMIN PANEL</div>
        </div>
    </div>

    <div class="px-4 py-3 border-bottom" style="border-color:#1f2937!important">
        <div class="d-flex align-items-center gap-2">
            <div class="rounded-circle bg-danger d-flex align-items-center justify-content-center text-white fw-bold"
                 style="width:36px;height:36px;font-size:.85rem;flex-shrink:0">{{ Auth::check() ? substr(Auth::user()->name, 0, 1) : 'A' }}</div>
            <div>
                <div style="color:#e5e7eb;font-size:.85rem;font-weight:600">{{ Auth::check() ? Auth::user()->name : 'Administrator' }}</div>
                <div style="color:#4b5563;font-size:.72rem">{{ Auth::check() ? Auth::user()->email : 'Super Admin' }}</div>
            </div>
            <span class="ms-auto" style="width:8px;height:8px;background:#22c55e;border-radius:50%;display:inline-block"></span>
        </div>
    </div>

    {{-- Nav --}}
    <nav class="flex-grow-1 py-2" style="overflow-y:auto">
        <div class="s-section-label">Menu Utama</div>

        <a href="/admin" class="s-link {{ request()->is('admin') && !request()->is('admin/*') ? 'active' : '' }}">
            <div class="s-icon"><i class="bi bi-speedometer2"></i></div>
            <span>Dashboard</span>
        </a>

        <div class="s-section-label">Konten</div>

        <a href="/admin/berita" class="s-link {{ request()->is('admin/berita') ? 'active' : '' }}">
            <div class="s-icon"><i class="bi bi-file-earmark-text"></i></div>
            <span>Semua Berita</span>
        </a>
        <a href="/admin/berita/baru" class="s-link {{ request()->is('admin/berita/baru') ? 'active' : '' }}">
            <div class="s-icon"><i class="bi bi-plus-square"></i></div>
            <span>Tulis Berita Baru</span>
        </a>
        
        <div class="s-section-label">Interaksi</div>
        
        <a href="/admin/tinjauan" class="s-link {{ request()->is('admin/tinjauan*') ? 'active' : '' }}">
            <div class="s-icon"><i class="bi bi-person-lines-fill"></i></div>
            <span>Tinjauan Berita</span>
            @php
                $pendingCount = \App\Models\Submission::where('status', 'pending')->count();
            @endphp
            @if($pendingCount > 0)
                <span class="badge bg-danger rounded-pill ms-auto" style="font-size: 0.65rem;">{{ $pendingCount }}</span>
            @endif
        </a>
        
        <a href="/admin/pesan" class="s-link {{ request()->is('admin/pesan*') ? 'active' : '' }}">
            <div class="s-icon"><i class="bi bi-envelope"></i></div>
            <span>Pesan Masuk</span>
            @php
                $unreadCount = \App\Models\ContactMessage::where('is_read', false)->count();
            @endphp
            @if($unreadCount > 0)
                <span class="badge bg-danger rounded-pill ms-auto" style="font-size: 0.65rem;">{{ $unreadCount }}</span>
            @endif
        </a>

        <div class="s-section-label">Lainnya</div>

        <a href="/admin/users" class="s-link {{ request()->is('admin/users*') ? 'active' : '' }}">
            <div class="s-icon"><i class="bi bi-people-fill"></i></div>
            <span>Kelola Admin</span>
        </a>

        <a href="/" target="_blank" class="s-link">
            <div class="s-icon"><i class="bi bi-globe2"></i></div>
            <span>Lihat Portal</span>
            <i class="bi bi-box-arrow-up-right ms-auto" style="font-size:.7rem;color:#6b7280"></i>
        </a>
    </nav>

    {{-- Logout --}}
    <div class="p-3 border-top" style="border-color:#1f2937!important">
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="w-100 d-flex align-items-center gap-2 px-3 py-2 rounded-3 border-0"
                    style="background:rgba(239,68,68,.1);color:#f87171;font-size:.875rem;cursor:pointer;transition:background .2s"
                    onmouseover="this.style.background='rgba(239,68,68,.2)'"
                    onmouseout="this.style.background='rgba(239,68,68,.1)'">
                <i class="bi bi-box-arrow-left fs-5"></i>
                <span class="fw-semibold">Keluar</span>
            </button>
        </form>
    </div>
</aside>

{{-- ══════════ MAIN ══════════ --}}
<div class="admin-main">

    {{-- Topbar --}}
    <div class="admin-topbar">
        <button class="btn btn-sm d-lg-none border-0 p-1" onclick="openSidebar()">
            <i class="bi bi-list fs-4 text-dark"></i>
        </button>
        <div>
            <div class="page-title">@yield('page-title', 'Dashboard')</div>
            <nav><ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/admin" class="text-decoration-none" style="color:var(--red)">Admin</a></li>
                @yield('breadcrumb')
            </ol></nav>
        </div>
        <div class="ms-auto d-flex align-items-center gap-2">
            <a href="/admin/berita/baru" class="btn btn-red btn-sm d-flex align-items-center gap-1 px-3">
                <i class="bi bi-plus-lg"></i>
                <span class="d-none d-md-inline">Tulis Berita</span>
            </a>
            <a href="/" target="_blank" class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-1 px-3">
                <i class="bi bi-eye"></i>
                <span class="d-none d-md-inline">Portal</span>
            </a>
        </div>
    </div>

    {{-- Content --}}
    <div class="admin-content">
        @if(session('success'))
        <div class="alert alert-success border-0 rounded-3 shadow-sm mb-4 d-flex align-items-center gap-2" style="background:#d1fae5;color:#065f46">
            <i class="bi bi-check-circle-fill fs-5"></i>
            <span>{{ session('success') }}</span>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
        @endif
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function openSidebar()  { document.getElementById('adminSidebar').classList.add('show'); document.getElementById('sidebarOverlay').classList.add('show'); }
function closeSidebar() { document.getElementById('adminSidebar').classList.remove('show'); document.getElementById('sidebarOverlay').classList.remove('show'); }
</script>
@stack('scripts')
</body>
</html>
