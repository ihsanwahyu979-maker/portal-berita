@extends('layouts.admin')

@section('title', 'Kelola Admin')
@section('page-title', 'Kelola Admin')

@section('breadcrumb')
<li class="breadcrumb-item active">Kelola Admin</li>
@endsection

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <h2 class="h3 mb-0 text-gray-800">Daftar Admin</h2>
    <a href="/admin/users/baru" class="btn btn-primary d-flex align-items-center gap-2">
        <i class="bi bi-person-plus-fill"></i> Tambah Admin Baru
    </a>
</div>

<div class="card shadow border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table admin-table mb-0">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Ditambahkan Pada</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $user)
                    <tr>
                        <td class="text-center text-muted">{{ $index + 1 }}</td>
                        <td class="fw-bold">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-muted">{{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}</td>
                        <td>
                            <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-sm btn-outline-primary me-1" title="Edit Admin">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            @if(auth()->id() != $user->id)
                            <form action="/admin/users/{{ $user->id }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus admin ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" title="Hapus Admin">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                            @else
                            <span class="badge bg-secondary">Anda Sendiri</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada admin lain.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
