@extends('layouts.admin')

@section('title', 'Edit Admin')
@section('page-title', 'Edit Admin')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/admin/users" class="text-decoration-none">Kelola Admin</a></li>
<li class="breadcrumb-item active">Edit Admin</li>
@endsection

@section('content')
<div class="mb-4">
    <h2 class="h3 mb-0 text-gray-800">Edit Admin: {{ $user->name }}</h2>
    <p class="text-muted mt-2">Ubah informasi akun atau reset password admin di bawah ini. Biarkan kolom password kosong jika tidak ingin mengubahnya.</p>
</div>

<div class="card shadow border-0" style="max-width: 600px;">
    <div class="card-body p-4">
        <form action="/admin/users/{{ $user->id }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <hr class="my-4">
            <h5 class="mb-3">Ubah Password <span class="text-muted fs-6 fw-normal">(Opsional)</span></h5>

            <div class="mb-4">
                <label for="password" class="form-label">Password Baru</label>
                <div class="input-group">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Biarkan kosong jika tidak diubah">
                    <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password">
                        <i class="bi bi-eye"></i>
                    </button>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Masukkan ulang password baru">
                    <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password_confirmation">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
            </div>

            <div class="d-flex gap-2 mt-5">
                <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-2"></i> Simpan Perubahan</button>
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
