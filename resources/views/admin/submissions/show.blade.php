@extends('layouts.admin')

@section('title', 'Tinjau Berita')

@section('content')
<div class="mb-4 d-flex align-items-center gap-3">
    <a href="/admin/tinjauan" class="btn btn-outline-secondary rounded-circle" style="width:40px;height:40px;padding:0;display:flex;align-items:center;justify-content:center;">
        <i class="bi bi-arrow-left"></i>
    </a>
    <h2 class="h3 mb-0 text-gray-800">Detail Tinjauan Berita</h2>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold text-primary">Konten Artikel</h6>
            </div>
            <div class="card-body p-4">
                <h4 class="fw-bold mb-3">{{ $submission->title }}</h4>
                
                @if($submission->image_url)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $submission->image_url) }}" alt="Gambar" class="img-fluid rounded-3" style="max-height: 400px; width: 100%; object-fit: cover;">
                </div>
                @endif
                
                <div style="white-space: pre-wrap; line-height: 1.8; color: #374151;">{{ $submission->content }}</div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Pengirim</h6>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-0">
                        <small class="text-muted d-block">Nama</small>
                        <span class="fw-bold">{{ $submission->author_name }}</span>
                    </li>
                    <li class="list-group-item px-0">
                        <small class="text-muted d-block">Email</small>
                        <span>{{ $submission->email }}</span>
                    </li>
                    <li class="list-group-item px-0">
                        <small class="text-muted d-block">Telepon</small>
                        <span>{{ $submission->phone ?: '-' }}</span>
                    </li>
                    <li class="list-group-item px-0">
                        <small class="text-muted d-block">Tanggal Kirim</small>
                        <span>{{ $submission->created_at->format('d M Y, H:i') }}</span>
                    </li>
                    <li class="list-group-item px-0">
                        <small class="text-muted d-block">Status Saat Ini</small>
                        @if($submission->status == 'pending')
                            <span class="badge bg-warning text-dark fs-6 mt-1">Menunggu Tinjauan</span>
                        @elseif($submission->status == 'approved')
                            <span class="badge bg-success fs-6 mt-1">Disetujui</span>
                        @else
                            <span class="badge bg-danger fs-6 mt-1">Ditolak</span>
                        @endif
                    </li>
                </ul>
            </div>
        </div>

        @if($submission->status == 'pending')
        <div class="card shadow border-0 mb-4 border-start border-primary border-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aksi Moderasi</h6>
            </div>
            <div class="card-body">
                <form action="/admin/tinjauan/{{ $submission->id }}/approve" method="POST" class="mb-3">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Pilih Kategori <span class="text-danger">*</span></label>
                        <select name="category" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Kategori --</option>
                            @foreach(['Politik','Ekonomi','Bisnis','Olahraga','Teknologi','Hiburan','Kesehatan','Pendidikan'] as $cat)
                                <option value="{{ $cat }}">{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Pilih Wilayah (Opsional)</label>
                        <select name="region" class="form-select">
                            <option value="">-- Tanpa Wilayah --</option>
                            <option value="Nasional">Nasional</option>
                            <option value="Internasional">Internasional</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success w-100 fw-bold" onclick="return confirm('Setujui dan terbitkan berita ini ke publik?')">
                        <i class="bi bi-check-circle me-1"></i> Setujui & Publish
                    </button>
                </form>

                <hr>

                <form action="/admin/tinjauan/{{ $submission->id }}/reject" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100" onclick="return confirm('Tolak kiriman ini?')">
                        <i class="bi bi-x-circle me-1"></i> Tolak Kiriman
                    </button>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
