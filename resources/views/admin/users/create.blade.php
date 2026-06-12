@extends('layouts.admin')

@section('title', 'Tambah Admin Baru')
@section('page-title', 'Tambah Admin')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/admin/users" class="text-decoration-none">Kelola Admin</a></li>
<li class="breadcrumb-item active">Tambah Baru</li>
@endsection

@section('content')
<div class="mb-4">
    <h2 class="h3 mb-0 text-gray-800">Tambah Admin Baru</h2>
    <p class="text-muted mt-2">Gunakan formulir ini untuk menambahkan akun administrator baru ke dalam sistem portal berita secara aman.</p>
</div>

<div class="card shadow border-0" style="max-width: 600px;">
    <div class="card-body p-4">
        <form action="/admin/users" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required placeholder="Contoh: Budi Santoso">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required placeholder="contoh@portalberita.com">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Minimal 8 karakter">
                    <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password">
                        <i class="bi bi-eye"></i>
                    </button>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Masukkan ulang password">
                    <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password_confirmation">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
            </div>

            <div class="d-flex gap-2 mt-5">
                <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-2"></i> Simpan Admin Baru</button>
                <a href="/admin/users" class="btn btn-outline-secondary px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const input = document.getElementById(targetId);
            const icon = this.querySelector('i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
    });
</script>
@endpush
