@extends('layouts.public')
@section('title', 'Tentang Kami — Portal Berita')

@section('content')

{{-- Hero Banner --}}
<div class="about-hero mb-5">
    <div class="about-hero-overlay"></div>
    <div class="about-hero-content text-center">
        <span class="badge bg-danger px-3 py-2 mb-3" style="font-size:.75rem;letter-spacing:.08em">TENTANG KAMI</span>
        <h1 class="text-white fw-bold mb-3" style="font-size:2.5rem;line-height:1.2">
            Menyajikan Informasi <br class="d-none d-md-block">Terpercaya &amp; Berimbang
        </h1>
        <p class="text-light mx-auto" style="max-width:600px;opacity:.85;font-size:.95rem">
            PortalBerita hadir sebagai sumber informasi terpercaya bagi masyarakat Indonesia,
            menyajikan berita terkini dengan standar jurnalisme tertinggi.
        </p>
    </div>
</div>

{{-- Profil Redaksi --}}
<section class="mb-5">
    <div class="row g-5 align-items-center">
        <div class="col-lg-6">
            <div class="position-relative">
                <div class="about-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=700&h=460&fit=crop"
                         alt="Redaksi Portal Berita" class="img-fluid rounded-4 shadow">
                </div>
                <div class="about-badge">
                    <i class="bi bi-award-fill text-warning fs-4"></i>
                    <div>
                        <div class="fw-bold text-white" style="font-size:1.1rem">Sejak 2020</div>
                        <small style="color:#9ca3af">Melayani Indonesia</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <span class="text-uppercase fw-bold text-red" style="font-size:.72rem;letter-spacing:.1em">Profil Redaksi</span>
            <h2 class="fw-bold mt-2 mb-3" style="font-size:1.8rem">Berkomitmen pada <span class="text-red">Jurnalisme Berkualitas</span></h2>
            <p class="text-muted" style="line-height:1.8;font-size:.92rem">
                PortalBerita adalah media berita digital yang didirikan pada tahun 2020 dengan visi menjadi
                sumber informasi nomor satu di Indonesia. Kami berkomitmen untuk menyajikan berita yang akurat,
                berimbang, dan mendalam dari seluruh penjuru Nusantara dan dunia.
            </p>
            <p class="text-muted" style="line-height:1.8;font-size:.92rem">
                Tim redaksi kami terdiri dari jurnalis berpengalaman yang memegang teguh kode etik jurnalistik
                dan selalu mengutamakan kepentingan publik dalam setiap pemberitaan.
            </p>
            <div class="row g-3 mt-3">
                <div class="col-6">
                    <div class="about-stat-card">
                        <i class="bi bi-newspaper text-accent fs-3"></i>
                        <div class="fw-bold fs-4 mt-2 counter-text" style="color:#0f172a"><span class="counter" data-target="10000">0</span>+</div>
                        <small class="text-muted">Artikel Dipublikasi</small>
                    </div>
                </div>
                <div class="col-6">
                    <div class="about-stat-card">
                        <i class="bi bi-people-fill text-accent fs-3"></i>
                        <div class="fw-bold fs-4 mt-2 counter-text" style="color:#0f172a"><span class="counter" data-target="500">0</span>K+</div>
                        <small class="text-muted">Pembaca Bulanan</small>
                    </div>
                </div>
                <div class="col-6">
                    <div class="about-stat-card">
                        <i class="bi bi-pen-fill text-accent fs-3"></i>
                        <div class="fw-bold fs-4 mt-2 counter-text" style="color:#0f172a"><span class="counter" data-target="50">0</span>+</div>
                        <small class="text-muted">Jurnalis Aktif</small>
                    </div>
                </div>
                <div class="col-6">
                    <div class="about-stat-card">
                        <i class="bi bi-globe text-accent fs-3"></i>
                        <div class="fw-bold fs-4 mt-2 counter-text" style="color:#0f172a"><span class="counter" data-target="34">0</span></div>
                        <small class="text-muted">Provinsi Terjangkau</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Visi & Misi --}}
<section class="mb-5">
    <div class="text-center mb-5">
        <span class="text-uppercase fw-bold text-red" style="font-size:.72rem;letter-spacing:.1em">Visi & Misi</span>
        <h2 class="fw-bold mt-2" style="font-size:1.8rem">Arah & Tujuan Kami</h2>
    </div>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="visi-card h-100">
                <div class="visi-icon">
                    <i class="bi bi-eye-fill"></i>
                </div>
                <h4 class="fw-bold mb-3">Visi</h4>
                <p class="text-muted mb-0" style="line-height:1.8;font-size:.92rem">
                    Menjadi portal berita digital terdepan yang menjadi rujukan utama masyarakat Indonesia
                    dalam memperoleh informasi yang akurat, terpercaya, dan berimbang, serta mampu mengedukasi
                    dan menginspirasi pembaca di era digital.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="visi-card h-100">
                <div class="visi-icon visi-icon-alt">
                    <i class="bi bi-bullseye"></i>
                </div>
                <h4 class="fw-bold mb-3">Misi</h4>
                <ul class="text-muted mb-0" style="line-height:2;font-size:.92rem;padding-left:18px">
                    <li>Menyajikan berita dengan standar jurnalistik tertinggi</li>
                    <li>Menjaga independensi dan objektivitas pemberitaan</li>
                    <li>Memanfaatkan teknologi digital untuk inovasi media</li>
                    <li>Memberikan ruang bagi suara masyarakat di seluruh Indonesia</li>
                    <li>Membangun literasi media yang sehat bagi generasi muda</li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Nilai-Nilai --}}
<section class="mb-5">
    <div class="text-center mb-5">
        <span class="text-uppercase fw-bold text-red" style="font-size:.72rem;letter-spacing:.1em">Nilai-Nilai Kami</span>
        <h2 class="fw-bold mt-2" style="font-size:1.8rem">Prinsip yang Kami Pegang</h2>
    </div>
    <div class="row g-4">
        @php
        $values = [
            ['icon' => 'bi-shield-check', 'title' => 'Integritas', 'desc' => 'Menjunjung tinggi kejujuran dan etika dalam setiap pemberitaan yang kami sajikan.', 'color' => '#dc2626'],
            ['icon' => 'bi-balance-scale', 'title' => 'Keberimbangan', 'desc' => 'Memberikan ruang yang adil bagi seluruh pihak dalam setiap laporan berita.', 'color' => '#2563eb'],
            ['icon' => 'bi-lightning-charge', 'title' => 'Kecepatan', 'desc' => 'Menyajikan berita terkini dengan cepat tanpa mengorbankan akurasi informasi.', 'color' => '#f59e0b'],
            ['icon' => 'bi-heart', 'title' => 'Empati', 'desc' => 'Mengutamakan kepentingan publik dan dampak sosial dalam setiap pemberitaan.', 'color' => '#db2777'],
        ];
        @endphp
        @foreach($values as $val)
        <div class="col-md-6 col-lg-3">
            <div class="value-card text-center h-100">
                <div class="value-icon mx-auto mb-3" style="background: {{ $val['color'] }}15; color: {{ $val['color'] }}">
                    <i class="bi {{ $val['icon'] }}"></i>
                </div>
                <h5 class="fw-bold mb-2">{{ $val['title'] }}</h5>
                <p class="text-muted small mb-0" style="line-height:1.7">{{ $val['desc'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- Pedoman Media --}}
<section class="mb-5">
    <div class="pedoman-card">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <span class="text-uppercase fw-bold" style="font-size:.72rem;letter-spacing:.1em;color:rgba(255,255,255,.6)">Pedoman Media</span>
                <h3 class="text-white fw-bold mt-2 mb-3">Standar Jurnalisme Kami</h3>
                <p style="color:rgba(255,255,255,.7);line-height:1.8;font-size:.92rem">
                    Kami berpegang pada Kode Etik Jurnalistik yang ditetapkan Dewan Pers Republik Indonesia.
                    Setiap berita yang dipublikasikan telah melalui proses verifikasi yang ketat dan review oleh
                    tim editor senior kami.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    @php
                    $standards = [
                        ['icon' => 'bi-check-circle-fill', 'text' => 'Verifikasi fakta berlapis'],
                        ['icon' => 'bi-check-circle-fill', 'text' => 'Narasumber terverifikasi'],
                        ['icon' => 'bi-check-circle-fill', 'text' => 'Hak jawab & koreksi terbuka'],
                        ['icon' => 'bi-check-circle-fill', 'text' => 'Independen & non-partisan'],
                        ['icon' => 'bi-check-circle-fill', 'text' => 'Perlindungan privasi narasumber'],
                        ['icon' => 'bi-check-circle-fill', 'text' => 'Transparansi editorial'],
                    ];
                    @endphp
                    @foreach($standards as $std)
                    <div class="col-6">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi {{ $std['icon'] }} text-success"></i>
                            <span style="color:rgba(255,255,255,.85);font-size:.88rem">{{ $std['text'] }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="text-center py-4 mb-3">
    <h3 class="fw-bold mb-3">Tertarik Bergabung Bersama Kami?</h3>
    <p class="text-muted mb-4" style="max-width:500px;margin:0 auto;font-size:.92rem">
        Kami selalu terbuka untuk jurnalis berbakat dan profesional media yang memiliki passion di dunia jurnalisme digital.
    </p>
    <a href="/kontak" class="btn btn-danger rounded-pill px-4 py-2" style="background-color: var(--accent); border: none;">
        <i class="bi bi-envelope me-2"></i>Hubungi Kami
    </a>
</section>

@endsection

@push('scripts')
<style>
    .about-hero {
        position: relative;
        background: url('https://images.unsplash.com/photo-1495020689067-958852a7765e?w=1400&h=400&fit=crop') center/cover no-repeat;
        border-radius: 16px;
        overflow: hidden;
        min-height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .about-hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(15,19,24,.92), rgba(204,26,26,.75));
    }
    .about-hero-content {
        position: relative;
        z-index: 2;
        padding: 60px 20px;
    }

    .about-img-wrapper img {
        transition: transform .5s;
    }
    .about-img-wrapper:hover img {
        transform: scale(1.03);
    }

    .about-badge {
        position: absolute;
        bottom: -15px;
        right: 20px;
        background: #0f172a;
        padding: 16px 22px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 8px 24px rgba(0,0,0,.25);
    }

    .about-stat-card {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        transition: transform .25s, box-shadow .25s;
    }
    .about-stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(0,0,0,.08);
    }

    .visi-card {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 14px;
        padding: 32px;
        transition: transform .25s, box-shadow .25s;
    }
    .visi-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(0,0,0,.1);
    }
    .visi-icon {
        width: 52px;
        height: 52px;
        background: rgba(204,26,26,.1);
        color: var(--red);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 16px;
    }
    .visi-icon-alt {
        background: rgba(37,99,235,.1);
        color: #2563eb;
    }

    .value-card {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 14px;
        padding: 28px 22px;
        transition: transform .25s, box-shadow .25s;
    }
    .value-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(0,0,0,.1);
    }
    .value-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .pedoman-card {
        background: linear-gradient(135deg, #0f172a, #1e293b);
        border-radius: 16px;
        padding: 48px;
        border: 1px solid #1f2937;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const counters = document.querySelectorAll('.counter');
        const speed = 200; // The lower the slower

        const animateCounters = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const updateCount = () => {
                        const target = +counter.getAttribute('data-target');
                        const count = +counter.innerText;
                        
                        // Lower inc to slow and higher to speed up
                        const inc = target / speed;

                        // Check if target is reached
                        if (count < target) {
                            // Add inc to count and output in counter
                            counter.innerText = Math.ceil(count + inc);
                            // Call function every ms
                            setTimeout(updateCount, 15);
                        } else {
                            counter.innerText = target;
                        }
                    };
                    updateCount();
                    observer.unobserve(counter); // Animate only once
                }
            });
        };

        const options = {
            threshold: 0.5
        };

        const observer = new IntersectionObserver(animateCounters, options);

        counters.forEach(counter => {
            observer.observe(counter);
        });
    });
</script>
@endpush
