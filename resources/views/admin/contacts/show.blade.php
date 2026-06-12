@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')
<div class="mb-4 d-flex align-items-center gap-3">
    <a href="/admin/pesan" class="btn btn-outline-secondary rounded-circle shadow-sm" style="width:40px;height:40px;padding:0;display:flex;align-items:center;justify-content:center; transition: all 0.3s;">
        <i class="bi bi-arrow-left"></i>
    </a>
    <h2 class="h4 mb-0 text-gray-800 fw-bold">Detail Pesan Masuk</h2>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card shadow-sm border-0 rounded-4">
    <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center rounded-top-4">
        <h5 class="m-0 font-weight-bold text-primary"><i class="bi bi-envelope-open me-2"></i> {{ Str::title($message->subject) }}</h5>
        <span class="badge bg-light text-secondary border px-3 py-2"><i class="bi bi-clock me-1"></i> {{ $message->created_at->format('d M Y, H:i') }}</span>
    </div>
    <div class="card-body p-4 p-md-5">
        <div class="row mb-4 pb-4 border-bottom">
            <div class="col-md-8 d-flex align-items-center mb-3 mb-md-0">
                <div class="rounded-circle bg-primary bg-gradient text-white d-flex align-items-center justify-content-center fw-bold me-3 shadow-sm" style="width:56px;height:56px;font-size:1.5rem;">
                    {{ strtoupper(substr($message->name, 0, 1)) }}
                </div>
                <div>
                    <h5 class="mb-1 fw-bold text-dark">{{ $message->name }}</h5>
                    <div class="d-flex flex-column flex-md-row gap-2 gap-md-4 text-muted small">
                        <span class="d-flex align-items-center">
                            <i class="bi bi-envelope-fill text-primary me-2"></i>
                            <a href="mailto:{{ $message->email }}" class="text-decoration-none text-muted hover-primary">{{ $message->email }}</a>
                        </span>
                        @if($message->phone)
                        <span class="d-flex align-items-center">
                            <i class="bi bi-telephone-fill text-success me-2"></i> 
                            {{ $message->phone }}
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="message-content bg-light p-4 rounded-4 shadow-sm border" style="white-space: pre-wrap; line-height: 1.8; color: #4b5563; font-size: 1.05rem;">
            {{ $message->message }}
        </div>
        
        <div class="mt-5 pt-4 border-top d-flex flex-wrap gap-3 align-items-center">
            <button type="button" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#replyModal">
                <i class="bi bi-reply-fill me-2 fs-5"></i> Balas via Email
            </button>
            
            @if($message->phone)
            @php
                $waNumber = preg_replace('/[^0-9]/', '', $message->phone);
                if (str_starts_with($waNumber, '0')) {
                    $waNumber = '62' . substr($waNumber, 1);
                }
            @endphp
            <a href="https://wa.me/{{ $waNumber }}" target="_blank" class="btn btn-success px-4 py-2 rounded-pill shadow-sm d-flex align-items-center">
                <i class="bi bi-whatsapp me-2 fs-5"></i> Hubungi via WA
            </a>
            @endif

            <form action="/admin/pesan/{{ $message->id }}" method="POST" class="d-inline ms-auto" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini secara permanen?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger px-4 py-2 rounded-pill d-flex align-items-center">
                    <i class="bi bi-trash3 me-2"></i> Hapus Pesan
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Modal Balas Email -->
<div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-primary text-white border-0">
        <h5 class="modal-title d-flex align-items-center" id="replyModalLabel">
            <i class="bi bi-envelope-paper me-2"></i> Balas Pesan ke {{ $message->name }}
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/pesan/{{ $message->id }}/reply" method="POST">
          @csrf
          <div class="modal-body p-4">
              <div class="row mb-3">
                  <div class="col-md-6">
                      <label class="form-label text-muted small fw-bold">Penerima (To):</label>
                      <input type="email" class="form-control bg-light border-0 shadow-none" value="{{ $message->email }}" readonly>
                  </div>
                  <div class="col-md-6 mt-3 mt-md-0">
                      <label class="form-label text-muted small fw-bold">Subjek (Subject):</label>
                      <input type="text" class="form-control bg-light border-0 shadow-none" value="RE: {{ $message->subject }}" readonly>
                  </div>
              </div>
              <div class="mb-3">
                  <label for="reply_text" class="form-label text-dark fw-bold">Pesan Balasan:</label>
                  <textarea class="form-control border-secondary-subtle focus-ring focus-ring-primary" id="reply_text" name="reply_text" rows="8" placeholder="Tulis balasan email Anda di sini..." required></textarea>
              </div>
          </div>
          <div class="modal-footer border-top-0 bg-light p-3">
            <button type="button" class="btn btn-light px-4 border" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary px-4 shadow-sm d-flex align-items-center">
                <i class="bi bi-send-fill me-2"></i> Kirim Email Sekarang
            </button>
          </div>
      </form>
    </div>
  </div>
</div>

<style>
    .hover-primary:hover {
        color: var(--bs-primary) !important;
    }
</style>
@endsection
