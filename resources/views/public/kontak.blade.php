@extends('layouts.public')
@section('title', 'Hubungi Kami — Portal Berita')

@section('content')

{{-- Hero Banner --}}
<div class="kontak-hero mb-5">
    <div class="kontak-hero-overlay"></div>
    <div class="kontak-hero-content text-center">
        <span class="badge bg-danger px-3 py-2 mb-3" style="font-size:.75rem;letter-spacing:.08em">KONTAK</span>
        <h1 class="text-white fw-bold mb-3" style="font-size:2.5rem;line-height:1.2">
            Hubungi Kami
        </h1>
        <p class="text-light mx-auto" style="max-width:550px;opacity:.85;font-size:.95rem">
            Kami senang mendengar dari Anda. Kirimkan pesan, pertanyaan, atau saran Anda melalui formulir di bawah ini.
        </p>
    </div>
</div>

{{-- Info Cards --}}
<section class="mb-5">
    <div class="row g-4">
        <div class="col-md-6 col-lg-3">
            <div class="kontak-info-card text-center h-100">
                <div class="kontak-info-icon mx-auto mb-3">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <h6 class="fw-bold mb-2">Alamat Kantor</h6>
                <p class="text-muted small mb-0" style="line-height:1.7">
                    Jl. Sudirman No.1<br>Jakarta Pusat, 10220<br>Indonesia
                </p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="kontak-info-card text-center h-100">
                <div class="kontak-info-icon mx-auto mb-3">
                    <i class="bi bi-telephone-fill"></i>
                </div>
                <h6 class="fw-bold mb-2">Telepon</h6>
                <p class="text-muted small mb-0" style="line-height:1.7">
                    +62 21 1234 5678<br>
                    +62 812 3456 7890<br>
                    <small class="text-muted">Senin – Jumat, 08.00–17.00</small>
                </p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="kontak-info-card text-center h-100">
                <div class="kontak-info-icon mx-auto mb-3">
                    <i class="bi bi-envelope-fill"></i>
                </div>
                <h6 class="fw-bold mb-2">Email</h6>
                <p class="text-muted small mb-0" style="line-height:1.7">
                    redaksi@portalberita.com<br>
                    info@portalberita.com<br>
                    iklan@portalberita.com
                </p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="kontak-info-card text-center h-100">
                <div class="kontak-info-icon mx-auto mb-3">
                    <i class="bi bi-share-fill"></i>
                </div>
                <h6 class="fw-bold mb-2">Media Sosial</h6>
                <div class="d-flex justify-content-center gap-2 mt-2">
                    <a href="https://facebook.com" target="_blank" class="kontak-social-btn">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" class="kontak-social-btn">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" class="kontak-social-btn">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://youtube.com" target="_blank" class="kontak-social-btn">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Form & Map --}}
<section class="mb-5">
    <div class="row g-5">
        {{-- Contact Form --}}
        <div class="col-lg-7">
            <div class="kontak-form-card">
                <h4 class="fw-bold mb-1">Kirim Pesan</h4>
                <p class="text-muted small mb-4">Isi formulir di bawah ini dan tim kami akan menghubungi Anda segera.</p>

                @if(session('contact_success'))
                <div class="alert alert-success border-0 rounded-3 shadow-sm">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('contact_success') }}
                </div>
                @endif

                <form action="/kontak" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-muted">Nama Lengkap <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-person text-muted"></i></span>
                                <input type="text" name="name" class="form-control border-start-0" placeholder="Masukkan nama Anda" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-muted">Email <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                                <input type="email" name="email" class="form-control border-start-0" placeholder="email@contoh.com" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-muted">No. Telepon</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-telephone text-muted"></i></span>
                                <input type="tel" name="phone" class="form-control border-start-0" placeholder="+62 812 xxxx xxxx">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold text-muted">Subjek <span class="text-danger">*</span></label>
                            <select name="subject" class="form-select" required>
                                <option value="" disabled selected>Pilih subjek</option>
                                <option value="umum">Pertanyaan Umum</option>
                                <option value="redaksi">Hubungi Redaksi</option>
                                <option value="iklan">Kerja Sama & Iklan</option>
                                <option value="koreksi">Koreksi & Klarifikasi</option>
                                <option value="karir">Lowongan Kerja</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-semibold text-muted">Pesan <span class="text-danger">*</span></label>
                            <textarea name="message" class="form-control" rows="5" placeholder="Tulis pesan Anda di sini..." required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-red rounded-pill px-4 py-2">
                                <i class="bi bi-send me-2"></i>Kirim Pesan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Map --}}
        <div class="col-lg-5">
            <div class="kontak-map-card h-100">
                <h5 class="fw-bold mb-3"><i class="bi bi-pin-map me-2 text-red"></i>Lokasi Kami</h5>
                <div class="kontak-map-wrapper mb-4">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613!3d-6.2087634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e0e9bcc8!2sJl.%20Jend.%20Sudirman%2C%20Jakarta!5e0!3m2!1sid!2sid!4v1679900000000!5m2!1sid!2sid"
                        width="100%"
                        height="280"
                        style="border:0;border-radius:12px"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>

                <div class="kontak-hours">
                    <h6 class="fw-bold mb-3"><i class="bi bi-clock me-2 text-red"></i>Jam Operasional</h6>
                    <div class="d-flex flex-column gap-2">
                        <div class="d-flex justify-content-between" style="font-size:.88rem">
                            <span class="text-muted">Senin – Jumat</span>
                            <span class="fw-semibold" style="color:var(--dark)">08.00 – 17.00 WIB</span>
                        </div>
                        <div class="d-flex justify-content-between" style="font-size:.88rem">
                            <span class="text-muted">Sabtu</span>
                            <span class="fw-semibold" style="color:var(--dark)">09.00 – 14.00 WIB</span>
                        </div>
                        <div class="d-flex justify-content-between" style="font-size:.88rem">
                            <span class="text-muted">Minggu & Hari Libur</span>
                            <span class="fw-semibold text-danger">Tutup</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="mb-5">
    <div class="text-center mb-5">
        <span class="text-uppercase fw-bold text-red" style="font-size:.72rem;letter-spacing:.1em">FAQ</span>
        <h2 class="fw-bold mt-2" style="font-size:1.8rem">Pertanyaan yang Sering Diajukan</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="accordion" id="faqAccordion">
                @php
                $faqs = [
                    ['q' => 'Bagaimana cara mengirimkan informasi/tips berita?', 'a' => 'Anda bisa mengirimkan informasi atau tips berita melalui email ke redaksi@portalberita.com atau melalui formulir kontak di halaman ini. Tim kami akan menindaklanjuti setiap informasi yang masuk.'],
                    ['q' => 'Apakah PortalBerita menerima kerja sama iklan?', 'a' => 'Ya, kami menerima kerja sama iklan dan konten sponsor. Untuk informasi lebih lanjut mengenai tarif dan paket iklan, silakan hubungi tim komersial kami di iklan@portalberita.com.'],
                    ['q' => 'Bagaimana cara melamar kerja di PortalBerita?', 'a' => 'Anda bisa mengirimkan CV dan portofolio Anda ke karir@portalberita.com. Kami selalu terbuka untuk jurnalis, editor, desainer, dan profesional digital lainnya yang berbakat.'],
                    ['q' => 'Bagaimana jika saya menemukan berita yang tidak akurat?', 'a' => 'Kami sangat menghargai koreksi dari pembaca. Silakan kirim pemberitahuan melalui formulir kontak dengan subjek "Koreksi & Klarifikasi". Tim redaksi akan segera meninjau dan memperbarui berita jika diperlukan.'],
                ];
                @endphp
                @foreach($faqs as $i => $faq)
                <div class="accordion-item border rounded-3 mb-3 overflow-hidden" style="border-color:#e9ecef!important">
                    <h2 class="accordion-header">
                        <button class="accordion-button {{ $i > 0 ? 'collapsed' : '' }} fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faq{{ $i }}" style="font-size:.92rem">
                            {{ $faq['q'] }}
                        </button>
                    </h2>
                    <div id="faq{{ $i }}" class="accordion-collapse collapse {{ $i === 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted" style="font-size:.88rem;line-height:1.8">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<style>
    .kontak-hero {
        position: relative;
        background: url('https://images.unsplash.com/photo-1423666639041-f56000c27a9a?w=1400&h=400&fit=crop') center/cover no-repeat;
        border-radius: 16px;
        overflow: hidden;
        min-height: 280px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .kontak-hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(15,19,24,.92), rgba(204,26,26,.75));
    }
    .kontak-hero-content {
        position: relative;
        z-index: 2;
        padding: 60px 20px;
    }

    .kontak-info-card {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 14px;
        padding: 28px 22px;
        transition: transform .25s, box-shadow .25s;
    }
    .kontak-info-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(0,0,0,.1);
    }
    .kontak-info-icon {
        width: 56px;
        height: 56px;
        background: rgba(204,26,26,.1);
        color: var(--red);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
    }

    .kontak-social-btn {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: var(--dark);
        color: #9ca3af;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        transition: all .25s;
        text-decoration: none;
    }
    .kontak-social-btn:hover {
        background: var(--red);
        color: #fff;
        transform: translateY(-2px);
    }

    .kontak-form-card {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 16px;
        padding: 36px;
    }
    .kontak-form-card .form-control,
    .kontak-form-card .form-select {
        border-radius: 10px;
        padding: 10px 14px;
        font-size: .88rem;
    }
    .kontak-form-card .form-control:focus,
    .kontak-form-card .form-select:focus {
        border-color: var(--red);
        box-shadow: 0 0 0 3px rgba(204,26,26,.1);
    }
    .kontak-form-card .input-group-text {
        border-radius: 10px 0 0 10px;
    }

    .kontak-map-card {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 16px;
        padding: 28px;
    }

    .kontak-hours {
        background: var(--gray-bg);
        border-radius: 12px;
        padding: 20px;
    }

    .accordion-button:not(.collapsed) {
        background: rgba(204,26,26,.05);
        color: var(--red);
    }
    .accordion-button:focus {
        box-shadow: 0 0 0 3px rgba(204,26,26,.1);
    }
</style>
@endpush
