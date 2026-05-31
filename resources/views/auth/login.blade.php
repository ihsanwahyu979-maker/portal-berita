<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — Portal Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --red:#cc1a1a; --dark:#0f1318; }
        body { font-family:'Inter',sans-serif; background:#f1f5f9; display:flex; align-items:center; justify-content:center; min-height:100vh; margin:0; }
        .login-card { background:#fff; border-radius:20px; box-shadow:0 10px 40px rgba(0,0,0,.08); overflow:hidden; width:100%; max-width:440px; padding:40px; }
        .brand-icon { background:var(--red); padding:12px; border-radius:12px; display:inline-flex; }
        .brand-name { font-family:'Playfair Display',serif; font-size:1.5rem; font-weight:800; color:var(--dark); margin-top:16px; }
        .brand-name span { color:var(--red); }
        .form-control { border-radius:12px; padding:12px 16px; border:1px solid #e5e7eb; background:#f8fafc; }
        .form-control:focus { border-color:var(--red); box-shadow:0 0 0 3px rgba(204,26,26,.1); background:#fff; }
        .btn-login { background:var(--red); color:#fff; border:none; border-radius:12px; padding:12px; font-weight:600; width:100%; transition:all .2s; }
        .btn-login:hover { background:#991414; transform:translateY(-1px); box-shadow:0 4px 12px rgba(204,26,26,.2); }
    </style>
</head>
<body>

<div class="login-card">
    <div class="text-center mb-4">
        <div class="brand-icon">
            <i class="bi bi-newspaper fs-3 text-white"></i>
        </div>
        <div class="brand-name">Portal<span>Berita</span></div>
        <p class="text-muted small mt-1">Silakan masuk ke panel admin.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 bg-success bg-opacity-10 text-success rounded-3 small">
            {{ session('success') }}
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label small fw-semibold text-secondary">Alamat Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus placeholder="admin@portalberita.com">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="form-label small fw-semibold text-secondary">Password</label>
            <input type="password" name="password" class="form-control" required placeholder="••••••••">
        </div>
        <div class="mb-4 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label small text-secondary" for="remember">Ingat Saya</label>
        </div>
        <button type="submit" class="btn-login">Masuk</button>
    </form>
</div>

</body>
</html>
