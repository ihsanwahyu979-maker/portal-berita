@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')
<div class="mb-4 d-flex align-items-center gap-3">
    <a href="/admin/pesan" class="btn btn-outline-secondary rounded-circle" style="width:40px;height:40px;padding:0;display:flex;align-items:center;justify-content:center;">
        <i class="bi bi-arrow-left"></i>
    </a>
    <h2 class="h3 mb-0 text-gray-800">Detail Pesan</h2>
</div>

<div class="card shadow border-0">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">{{ Str::title($message->subject) }}</h6>
        <span class="text-muted small">{{ $message->created_at->format('d M Y, H:i') }}</span>
    </div>
    <div class="card-body p-4">
        <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold me-3" style="width:48px;height:48px;font-size:1.2rem;">
                {{ strtoupper(substr($message->name, 0, 1)) }}
            </div>
            <div>
                <h5 class="mb-0 fw-bold">{{ $message->name }}</h5>
                <div class="text-muted">
                    <a href="mailto:{{ $message->email }}" class="text-decoration-none">{{ $message->email }}</a>
                    @if($message->phone)
                    <span class="mx-2">•</span>
                    <i class="bi bi-telephone"></i> {{ $message->phone }}
                    @endif
                </div>
            </div>
        </div>

        <div class="message-content" style="white-space: pre-wrap; line-height: 1.8; color: #374151;">
            {{ $message->message }}
        </div>
        
        <div class="mt-5 pt-3 border-top">
            <a href="mailto:{{ $message->email }}?subject=RE: {{ urlencode($message->subject) }}" class="btn btn-primary px-4">
                <i class="bi bi-reply me-1"></i> Balas via Email
            </a>
            <form action="/admin/pesan/{{ $message->id }}" method="POST" class="d-inline ms-2" onsubmit="return confirm('Hapus pesan ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger px-4">
                    <i class="bi bi-trash me-1"></i> Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
