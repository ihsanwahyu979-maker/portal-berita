@extends('layouts.admin')
@section('title', 'Semua Berita — Admin')
@section('page-title', 'Semua Berita')
@section('breadcrumb')
    <li class="breadcrumb-item active">Berita</li>
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Kelola Berita</h4>
    <a href="/admin/berita/baru" class="btn btn-red d-flex align-items-center gap-2">
        <i class="bi bi-plus-circle"></i> Tambah Berita
    </a>
</div>

<div class="admin-table table-responsive">
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th>Judul Berita</th>
                <th>Wilayah</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Tgl Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($articles as $item)
            <tr>
                <td>
                    <div class="fw-semibold text-dark">{{ $item->title }}</div>
                    <div class="small text-muted">{{ Str::limit($item->excerpt, 50) }}</div>
                </td>
                <td><span class="badge {{ $item->region == 'Nasional' ? 'bg-danger' : 'bg-primary' }}">{{ $item->region ?? '-' }}</span></td>
                <td><span class="badge bg-secondary">{{ $item->category }}</span></td>
                <td>{{ $item->author_name }}</td>
                <td>{{ $item->created_at->format('d M Y') }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="/admin/berita/{{ $item->_id }}/edit" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="/admin/berita/{{ $item->_id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-4 text-muted">Belum ada berita.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
