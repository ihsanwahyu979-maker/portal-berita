<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'region' => 'required|in:Nasional,Internasional',
            'category' => 'required|string',
            'author_name' => 'required|string',
            'image' => 'nullable|image|max:2048',
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

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $validated['image_url'] = $path;
        } elseif (!$request->filled('image_url')) {
            unset($validated['image_url']);
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
            'region' => 'required|in:Nasional,Internasional',
            'category' => 'required|string',
            'author_name' => 'required|string',
            'image' => 'nullable|image|max:2048',
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

        if ($request->hasFile('image')) {
            // Delete old image if exists and not URL
            if ($article->image_url && !str_starts_with($article->image_url, 'http')) {
                Storage::disk('public')->delete($article->image_url);
            }
            $path = $request->file('image')->store('articles', 'public');
            $validated['image_url'] = $path;
        } elseif ($request->filled('image_url')) {
            // If they provided a URL, delete the old local file if there was one
            if ($article->image_url && !str_starts_with($article->image_url, 'http')) {
                Storage::disk('public')->delete($article->image_url);
            }
            $validated['image_url'] = $request->image_url;
        } else {
            // Keep existing image if both are empty
            unset($validated['image_url']);
        }

        $article->update($validated);

        return redirect('/admin/berita')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        
        if ($article->image_url && !str_starts_with($article->image_url, 'http')) {
            Storage::disk('public')->delete($article->image_url);
        }
        
        $article->delete();

        return redirect('/admin/berita')->with('success', 'Berita berhasil dihapus!');
    }
}
