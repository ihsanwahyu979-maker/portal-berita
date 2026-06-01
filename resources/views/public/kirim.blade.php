@extends('layouts.public')
@section('title', 'Kirim Berita — Portal Berita')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="text-center mb-5">
            <span class="badge bg-danger px-3 py-2 mb-3" style="font-size:.75rem;letter-spacing:.08em; background-color: var(--accent) !important;">CITIZEN JOURNALISM</span>
            <h1 class="fw-bold mb-3 serif" style="font-size:2.5rem;color:var(--primary)">Kirim Berita Anda</h1>
            <p class="text-muted mx-auto" style="max-width:600px;font-size:1.05rem">
                Punya informasi menarik atau kejadian penting di sekitar Anda? Jadilah bagian dari jurnalisme warga dan bagikan berita Anda kepada ribuan pembaca kami.
            </p>
        </div>

        @if(session('success'))
        <div class="alert alert-success border-0 rounded-4 shadow-sm p-4 mb-5 text-center d-flex flex-column align-items-center">
            <i class="bi bi-check-circle-fill text-success mb-2" style="font-size: 3rem;"></i>
            <h5 class="fw-bold mb-2">Berhasil Terkirim!</h5>
            <p class="mb-0 text-muted">{{ session('success') }}</p>
        </div>
        @else

        <div class="bg-white rounded-4 border-0 shadow-sm p-4 p-md-5 mb-5">
            <div class="alert alert-info border-0 rounded-3 mb-4" style="background: rgba(37,99,235,.05); color: #1e40af;">
                <h6 class="fw-bold mb-2"><i class="bi bi-info-circle-fill me-2"></i>Panduan Pengiriman:</h6>
                <ul class="mb-0 small" style="line-height:1.7; padding-left: 1.5rem;">
                    <li>Pastikan berita yang Anda tulis berdasarkan fakta dan kejadian nyata.</li>
                    <li>Hindari konten yang mengandung unsur SARA, hoaks, atau ujaran kebencian.</li>
                    <li>Sertakan foto pendukung yang relevan jika ada.</li>
                    <li>Setiap berita yang masuk akan melalui proses moderasi dan penyuntingan oleh tim redaksi sebelum diterbitkan.</li>
                </ul>
            </div>

            <form action="/kirim-berita" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    <div class="col-12">
                        <h5 class="fw-bold border-bottom pb-2 mb-3 mt-2 text-primary" style="font-size: 1.1rem;">Data Penulis</h5>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold text-muted">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="author_name" class="form-control form-control-lg rounded-3" style="font-size: 0.95rem;" placeholder="Nama sesuai identitas" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold text-muted">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control form-control-lg rounded-3" style="font-size: 0.95rem;" placeholder="Untuk konfirmasi status berita" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold text-muted">No. Telepon (Opsional)</label>
                        <input type="text" name="phone" class="form-control form-control-lg rounded-3" style="font-size: 0.95rem;" placeholder="Hanya untuk keperluan redaksi">
                    </div>

                    <div class="col-12 mt-4">
                        <h5 class="fw-bold border-bottom pb-2 mb-3 mt-2 text-primary" style="font-size: 1.1rem;">Konten Berita</h5>
                    </div>

                    <div class="col-12">
                        <label class="form-label small fw-semibold text-muted">Judul Berita <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control form-control-lg rounded-3" style="font-size: 0.95rem;" placeholder="Tulis judul berita yang menarik" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label small fw-semibold text-muted">Isi Berita <span class="text-danger">*</span></label>
                        <textarea name="content" class="form-control rounded-3" rows="12" style="font-size: 0.95rem;" placeholder="Ceritakan secara detail mengenai kejadian (5W1H)..." required></textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label small fw-semibold text-muted">Foto Pendukung (Opsional)</label>
                        <input type="file" name="image" class="form-control form-control-lg rounded-3" style="font-size: 0.95rem;" accept="image/*">
                        <div class="form-text small">Format yang didukung: JPG, PNG. Maksimal 2MB.</div>
                    </div>

                    <div class="col-12 mt-4 text-center">
                        <button type="submit" class="btn btn-danger btn-lg rounded-pill px-5 py-3 fw-bold w-100" style="background-color: var(--accent); border: none; font-size: 1.05rem; box-shadow: 0 8px 20px rgba(225, 29, 72, 0.3);">
                            <i class="bi bi-paperclip me-2"></i> Kirim Berita Sekarang
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @endif
    </div>
</div>
@endsection
