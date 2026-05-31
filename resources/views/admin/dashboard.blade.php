@extends('layouts.admin')
@section('title', 'Dashboard — Admin')
@section('page-title', 'Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')

{{-- Welcome Banner --}}
<div class="rounded-3 mb-5 p-4 p-md-5 text-white position-relative overflow-hidden"
     style="background:linear-gradient(135deg,#991414 0%,#cc1a1a 50%,#b91c1c 100%);min-height:140px">
    <div class="position-relative z-1">
        <h2 class="fw-bold mb-1" style="font-size:1.6rem">Selamat Datang di Admin Panel! 👋</h2>
        <p class="mb-3 opacity-75" style="font-size:.9rem">Kelola konten berita portal Anda dengan mudah dari sini.</p>
        <a href="/admin/berita/baru" class="btn btn-white btn-sm rounded-pill px-4 fw-semibold"
           style="background:#fff;color:var(--red)">
            <i class="bi bi-plus-circle me-1"></i>Tulis Berita Baru
        </a>
    </div>
    <div style="position:absolute;right:-20px;top:-20px;font-size:9rem;opacity:.08">
        <i class="bi bi-newspaper"></i>
    </div>
</div>

{{-- ── STAT CARDS ── --}}
<div class="row g-4 mb-5">
    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div class="stat-icon" style="background:#dbeafe"><i class="bi bi-file-earmark-text text-primary"></i></div>
                <span class="badge" style="background:#eff6ff;color:#3b82f6;font-size:.7rem;border-radius:8px;padding:4px 8px">Total</span>
            </div>
            <div class="stat-num">{{ $total ?? 0 }}</div>
            <div class="stat-label">Total Berita</div>
            <i class="bi bi-file-earmark-text stat-wave"></i>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div class="stat-icon" style="background:#d1fae5"><i class="bi bi-check-circle text-success"></i></div>
                <span class="badge" style="background:#f0fdf4;color:#16a34a;font-size:.7rem;border-radius:8px;padding:4px 8px">Aktif</span>
            </div>
            <div class="stat-num">{{ $published ?? 0 }}</div>
            <div class="stat-label">Dipublikasikan</div>
            <i class="bi bi-check-circle stat-wave"></i>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div class="stat-icon" style="background:#fef3c7"><i class="bi bi-pencil-square text-warning"></i></div>
                <span class="badge" style="background:#fffbeb;color:#d97706;font-size:.7rem;border-radius:8px;padding:4px 8px">Draft</span>
            </div>
            <div class="stat-num">{{ $drafts ?? 0 }}</div>
            <div class="stat-label">Masih Draft</div>
            <i class="bi bi-pencil-square stat-wave"></i>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div class="stat-icon" style="background:#fee2e2"><i class="bi bi-eye text-danger"></i></div>
                <span class="badge" style="background:#fff1f2;color:var(--red);font-size:.7rem;border-radius:8px;padding:4px 8px">Views</span>
            </div>
            <div class="stat-num">{{ isset($views) ? ($views > 999 ? number_format($views/1000,1).'K' : $views) : 0 }}</div>
            <div class="stat-label">Total Pembaca</div>
            <i class="bi bi-eye stat-wave"></i>
        </div>
    </div>
</div>

{{-- ── QUICK ACTIONS ── --}}
<div class="row g-3 mb-5">
    <div class="col-12">
        <h5 class="fw-bold mb-3" style="font-size:1rem;color:#374151">
            <i class="bi bi-lightning-charge me-2" style="color:var(--red)"></i>Aksi Cepat
        </h5>
    </div>
    <div class="col-6 col-md-3">
        <a href="/admin/berita/baru" class="text-decoration-none">
            <div class="bg-white border rounded-3 p-3 text-center hover-card" style="transition:all .2s;cursor:pointer"
                 onmouseover="this.style.borderColor='var(--red)';this.style.transform='translateY(-2px)'"
                 onmouseout="this.style.borderColor='#e9ecef';this.style.transform='none'">
                <div class="rounded-3 d-inline-flex p-2 mb-2" style="background:#fee2e2">
                    <i class="bi bi-plus-circle fs-4 text-danger"></i>
                </div>
                <p class="small fw-semibold mb-0 text-dark">Tulis Berita</p>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-3">
        <a href="/admin/berita" class="text-decoration-none">
            <div class="bg-white border rounded-3 p-3 text-center"
                 onmouseover="this.style.borderColor='var(--red)';this.style.transform='translateY(-2px)'"
                 onmouseout="this.style.borderColor='#e9ecef';this.style.transform='none'"
                 style="transition:all .2s;cursor:pointer">
                <div class="rounded-3 d-inline-flex p-2 mb-2" style="background:#dbeafe">
                    <i class="bi bi-list-ul fs-4 text-primary"></i>
                </div>
                <p class="small fw-semibold mb-0 text-dark">Kelola Berita</p>
            </div>
        </a>
    </div>
    <div class="col-6 col-md-3">
        <a href="/" target="_blank" class="text-decoration-none">
            <div class="bg-white border rounded-3 p-3 text-center"
                 onmouseover="this.style.borderColor='var(--red)';this.style.transform='translateY(-2px)'"
                 onmouseout="this.style.borderColor='#e9ecef';this.style.transform='none'"
                 style="transition:all .2s;cursor:pointer">
                <div class="rounded-3 d-inline-flex p-2 mb-2" style="background:#d1fae5">
                    <i class="bi bi-globe2 fs-4 text-success"></i>
                </div>
                <p class="small fw-semibold mb-0 text-dark">Lihat Portal</p>
            </div>
        </a>
    </div>
</div>

@endsection
