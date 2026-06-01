@extends('layouts.admin')

@section('title', 'Tinjauan Berita')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 mb-0 text-gray-800">Tinjauan Berita (Citizen Journalism)</h2>
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
                        <th class="border-0 px-4 py-3">Pengirim</th>
                        <th class="border-0 px-4 py-3">Judul Berita</th>
                        <th class="border-0 px-4 py-3">Tanggal</th>
                        <th class="border-0 px-4 py-3">Status</th>
                        <th class="border-0 px-4 py-3 text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($submissions as $sub)
                    <tr>
                        <td class="px-4 py-3 align-middle">
                            <div class="fw-bold">{{ $sub->author_name }}</div>
                            <small class="text-muted">{{ $sub->email }}</small>
                        </td>
                        <td class="px-4 py-3 align-middle" style="max-width:300px;">
                            <div class="text-truncate fw-semibold">{{ $sub->title }}</div>
                        </td>
                        <td class="px-4 py-3 align-middle">{{ $sub->created_at->format('d M Y, H:i') }}</td>
                        <td class="px-4 py-3 align-middle">
                            @if($sub->status == 'pending')
                                <span class="badge bg-warning text-dark">Menunggu</span>
                            @elseif($sub->status == 'approved')
                                <span class="badge bg-success">Disetujui</span>
                            @else
                                <span class="badge bg-danger">Ditolak</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 align-middle text-end">
                            <a href="/admin/tinjauan/{{ $sub->id }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye"></i> Review
                            </a>
                            <form action="/admin/tinjauan/{{ $sub->id }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus permanen data ini?')">
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
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada kiriman berita.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
