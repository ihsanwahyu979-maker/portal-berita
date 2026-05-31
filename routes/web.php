<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public Routes
Route::get('/', function () {
    $category = request('category');
    $search = request('search');
    
    $query = Article::query();

    if ($category) {
        $query->where('category', $category);
    }
    
    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('excerpt', 'like', "%{$search}%");
        });
    }

    $articles = $query->orderBy('created_at', 'desc')->get();

    return view('public.home', [
        'articles' => $articles,
        'featured' => $articles->where('is_featured', true)->first() ?? $articles->first(),
        'secondary' => $articles->take(4),
        'rest' => $articles->skip(1),
        'ticker' => $articles->take(4),
    ]);
});

Route::get('/berita/{id}', function ($id) {
    $article = Article::findOrFail($id);
    
    $related = Article::where('category', $article->category)
                ->where('_id', '!=', $id)
                ->take(3)
                ->get();
    
    return view('public.detail', [
        'article' => $article,
        'related' => $related,
    ]);
});

// Admin Routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard', [
            'total' => Article::count(),
            'published' => Article::count(),
            'drafts' => 0,
            'views' => Article::sum('view_count') ?? 0,
        ]);
    });

    // CRUD Article
    Route::get('/berita', [ArticleController::class, 'index']);
    Route::get('/berita/baru', [ArticleController::class, 'create']);
    Route::post('/berita', [ArticleController::class, 'store']);
    Route::get('/berita/{id}/edit', [ArticleController::class, 'edit']);
    Route::put('/berita/{id}', [ArticleController::class, 'update']);
    Route::delete('/berita/{id}', [ArticleController::class, 'destroy']);
});
