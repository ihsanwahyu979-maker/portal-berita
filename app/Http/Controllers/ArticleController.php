<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // Menampilkan semua artikel di halaman admin
    public function index()
    {
        // Ambil semua artikel dari database, urutkan dari yang terbaru
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('admin.articles.index', compact('articles'));
    }

    // Menampilkan form tambah artikel baru
    public function create()
    {
        return view('admin.articles.create');
    }

    // Menyimpan artikel baru ke database
    public function store(Request $request)
    {
        // Validasi input data dari form
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'region' => 'required|in:Nasional,Internasional',
            'category' => 'required|string',
            'author_name' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'image_url' => 'nullable|url',
        ]);

        // Atur status unggulan dan awal jumlah tayangan
        $validated['is_featured'] = $request->has('is_featured');
        $validated['view_count'] = 0;
        
        // Pisahkan tags berdasarkan koma menjadi array
        if ($request->filled('tags')) {
            $tags = array_map('trim', explode(',', $request->tags));
            $validated['tags'] = $tags;
        } else {
            $validated['tags'] = [];
        }

        // Upload gambar jika ada file yang dipilih
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $validated['image_url'] = $path;
        } elseif (!$request->filled('image_url')) {
            unset($validated['image_url']);
        }

        // Simpan data ke database
        Article::create($validated);

        // Kembali ke daftar berita dengan pesan sukses
        return redirect('/admin/berita')->with('success', 'Berita berhasil ditambahkan!');
    }

    // Menampilkan form edit artikel
    public function edit($id)
    {
        // Cari artikel berdasarkan ID
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    // Menyimpan pembaruan artikel ke database
    public function update(Request $request, $id)
    {
        // Cari artikel yang mau diedit
        $article = Article::findOrFail($id);

        // Validasi input data dari form edit
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'region' => 'required|in:Nasional,Internasional',
            'category' => 'required|string',
            'author_name' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'image_url' => 'nullable|url',
        ]);

        // Perbarui status unggulan
        $validated['is_featured'] = $request->has('is_featured');
        
        // Pisahkan tags berdasarkan koma menjadi array
        if ($request->filled('tags')) {
            $tags = array_map('trim', explode(',', $request->tags));
            $validated['tags'] = $tags;
        } else {
            $validated['tags'] = [];
        }

        // Upload gambar baru dan hapus gambar lama (jika ada file baru)
        if ($request->hasFile('image')) {
            if ($article->image_url && !str_starts_with($article->image_url, 'http')) {
                Storage::disk('public')->delete($article->image_url);
            }
            $path = $request->file('image')->store('articles', 'public');
            $validated['image_url'] = $path;
        // Gunakan URL gambar baru dan hapus gambar lama
        } elseif ($request->filled('image_url')) {
            if ($article->image_url && !str_starts_with($article->image_url, 'http')) {
                Storage::disk('public')->delete($article->image_url);
            }
            $validated['image_url'] = $request->image_url;
        } else {
            unset($validated['image_url']);
        }

        // Update data di database
        $article->update($validated);

        // Kembali ke daftar berita dengan pesan sukses
        return redirect('/admin/berita')->with('success', 'Berita berhasil diperbarui!');
    }

    // Menghapus artikel
    public function destroy($id)
    {
        // Cari artikel yang mau dihapus
        $article = Article::findOrFail($id);
        
        // Hapus file gambar fisik jika bukan URL eksternal
        if ($article->image_url && !str_starts_with($article->image_url, 'http')) {
            Storage::disk('public')->delete($article->image_url);
        }
        
        // Hapus data artikel dari database
        $article->delete();

        // Kembali ke daftar berita dengan pesan sukses
        return redirect('/admin/berita')->with('success', 'Berita berhasil dihapus!');
    }
}
