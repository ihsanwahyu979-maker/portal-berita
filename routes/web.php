<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\SubmissionController;

// Rute untuk Login dan Logout Admin
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// Rute Publik (Bisa diakses semua orang)
// ==========================================

// Halaman Utama (Beranda)
Route::get('/', function () {
    // Tangkap filter dari URL (jika ada)
    $region = request('region');
    $category = request('category');
    $search = request('search');
    
    // Siapkan query untuk mengambil artikel
    $query = Article::query();

    // Saring berdasarkan wilayah
    if ($region) {
        $query->where('region', $region);
    }

    // Saring berdasarkan kategori
    if ($category) {
        $query->where('category', $category);
    }
    
    // Fitur pencarian judul/cuplikan
    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('excerpt', 'like', "%{$search}%");
        });
    }

    // Ambil artikel terbaru
    $articles = $query->orderBy('created_at', 'desc')->get();

    // Kirim data ke tampilan beranda
    return view('public.home', [
        'articles' => $articles,
        'featured' => $articles->where('is_featured', true)->first() ?? $articles->first(), // Berita utama
        'secondary' => $articles->take(4), // Berita samping
        'rest' => $articles->skip(1), // Sisa berita
        'ticker' => $articles->take(4), // Berita berjalan
    ]);
});

// Halaman Detail Berita
Route::get('/berita/{id}', function ($id) {
    // Cari artikel berdasarkan ID
    $article = Article::findOrFail($id);
    
    // Cari 3 artikel terkait (kategori sama)
    $related = Article::where('category', $article->category)
                ->where('_id', '!=', $id)
                ->take(3)
                ->get();
    
    // Tampilkan halaman detail
    return view('public.detail', [
        'article' => $article,
        'related' => $related,
    ]);
});

// Halaman Tentang Kami
Route::get('/tentang', function () {
    return view('public.tentang');
});

// Halaman Kontak Kami
Route::get('/kontak', function () {
    return view('public.kontak');
});
// Proses kirim pesan kontak
Route::post('/kontak', [ContactMessageController::class, 'store']);

// Halaman Kirim Berita (Jurnalisme Warga)
Route::get('/kirim-berita', [SubmissionController::class, 'create']);
// Proses pengiriman berita oleh warga
Route::post('/kirim-berita', [SubmissionController::class, 'store']);

// ==========================================
// Rute Admin (Hanya bisa diakses jika login)
// ==========================================
Route::middleware('auth')->prefix('admin')->group(function () {
    
    // Halaman Dashboard Admin
    Route::get('/', function () {
        return view('admin.dashboard', [
            'total' => Article::count(),
            'published' => Article::count(),
            'drafts' => 0,
            'views' => Article::sum('view_count') ?? 0,
        ]);
    });

    // Kelola Berita (CRUD)
    Route::get('/berita', [ArticleController::class, 'index']); // Daftar berita
    Route::get('/berita/baru', [ArticleController::class, 'create']); // Form tambah
    Route::post('/berita', [ArticleController::class, 'store']); // Simpan berita
    Route::get('/berita/{id}/edit', [ArticleController::class, 'edit']); // Form edit
    Route::put('/berita/{id}', [ArticleController::class, 'update']); // Simpan perubahan
    Route::delete('/berita/{id}', [ArticleController::class, 'destroy']); // Hapus berita

    // Kelola Pesan Masuk
    Route::get('/pesan', [ContactMessageController::class, 'index']); // Daftar pesan
    Route::get('/pesan/{id}', [ContactMessageController::class, 'show']); // Detail pesan
    Route::post('/pesan/{id}/reply', [ContactMessageController::class, 'reply']); // Balas pesan
    Route::delete('/pesan/{id}', [ContactMessageController::class, 'destroy']); // Hapus pesan

    // Kelola Tinjauan Kiriman Warga
    Route::get('/tinjauan', [SubmissionController::class, 'index']); // Daftar tinjauan
    Route::get('/tinjauan/{id}', [SubmissionController::class, 'show']); // Detail tinjauan
    Route::post('/tinjauan/{id}/approve', [SubmissionController::class, 'approve']); // Setujui
    Route::post('/tinjauan/{id}/reject', [SubmissionController::class, 'reject']); // Tolak
    Route::delete('/tinjauan/{id}', [SubmissionController::class, 'destroy']); // Hapus permanen

    // Kelola Admin
    Route::get('/users', [\App\Http\Controllers\AdminUserController::class, 'index']);
    Route::get('/users/baru', [\App\Http\Controllers\AdminUserController::class, 'create']);
    Route::post('/users', [\App\Http\Controllers\AdminUserController::class, 'store']);
    Route::get('/users/{id}/edit', [\App\Http\Controllers\AdminUserController::class, 'edit']);
    Route::put('/users/{id}', [\App\Http\Controllers\AdminUserController::class, 'update']);
    Route::delete('/users/{id}', [\App\Http\Controllers\AdminUserController::class, 'destroy']);
});
