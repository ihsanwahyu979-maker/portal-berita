@extends('layouts.admin')

@section('title', 'Pesan Masuk')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 mb-0 text-gray-800">Pesan Masuk</h2>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="border-0 px-4 py-3">Nama</th>
                        <th class="border-0 px-4 py-3">Subjek</th>
                        <th class="border-0 px-4 py-3">Tanggal</th>
                        <th class="border-0 px-4 py-3 text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                    <tr class="{{ !$msg->is_read ? 'table-active fw-bold' : '' }}">
                        <td class="px-4 py-3">
                            <div class="d-flex align-items-center">
                                @if(!$msg->is_read)
                                <span class="badge bg-danger rounded-circle p-1 me-2" style="width:10px;height:10px;"><span class="visually-hidden">Baru</span></span>
                                @endif
                                <div>
                                    {{ $msg->name }}<br>
                                    <small class="text-muted fw-normal">{{ $msg->email }}</small>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 align-middle">{{ Str::title($msg->subject) }}</td>
                        <td class="px-4 py-3 align-middle">{{ $msg->created_at->format('d M Y, H:i') }}</td>
                        <td class="px-4 py-3 align-middle text-end">
                            <a href="/admin/pesan/{{ $msg->id }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye"></i> Baca
                            </a>
                            <form action="/admin/pesan/{{ $msg->id }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pesan ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">Belum ada pesan masuk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
