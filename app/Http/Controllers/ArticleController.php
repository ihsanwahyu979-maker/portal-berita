<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'category' => 'required|string',
            'author_name' => 'required|string',
            'image_url' => 'nullable|url',
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['view_count'] = 0;
        
        // Handling tags
        if ($request->filled('tags')) {
            $tags = array_map('trim', explode(',', $request->tags));
            $validated['tags'] = $tags;
        } else {
            $validated['tags'] = [];
        }

        Article::create($validated);

        return redirect('/admin/berita')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'category' => 'required|string',
            'author_name' => 'required|string',
            'image_url' => 'nullable|url',
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        
        // Handling tags
        if ($request->filled('tags')) {
            $tags = array_map('trim', explode(',', $request->tags));
            $validated['tags'] = $tags;
        } else {
            $validated['tags'] = [];
        }

        $article->update($validated);

        return redirect('/admin/berita')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect('/admin/berita')->with('success', 'Berita berhasil dihapus!');
    }
}
