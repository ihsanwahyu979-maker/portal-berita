@extends('layouts.admin')
@section('title', 'Edit Berita — Admin')
@section('page-title', 'Edit Berita')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin/berita" class="text-decoration-none" style="color:var(--red)">Berita</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="form-panel mx-auto" style="max-width: 800px;">
    <form action="/admin/berita/{{ $article->_id }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label class="form-label">Judul Berita</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $article->title) }}" required>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Kategori</label>
                <select name="category" class="form-select" required>
                    <option value="">Pilih Kategori...</option>
                    <option value="Politik" {{ old('category', $article->category)=='Politik' ? 'selected':'' }}>Politik</option>
                    <option value="Teknologi" {{ old('category', $article->category)=='Teknologi' ? 'selected':'' }}>Teknologi</option>
                    <option value="Olahraga" {{ old('category', $article->category)=='Olahraga' ? 'selected':'' }}>Olahraga</option>
                    <option value="Hiburan" {{ old('category', $article->category)=='Hiburan' ? 'selected':'' }}>Hiburan</option>
                    <option value="Bisnis" {{ old('category', $article->category)=='Bisnis' ? 'selected':'' }}>Bisnis</option>
                </select>
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
                <label class="form-label">Nama Penulis</label>
                <input type="text" name="author_name" class="form-control" value="{{ old('author_name', $article->author_name) }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">URL Gambar Sampul (Opsional)</label>
            <input type="url" name="image_url" class="form-control" value="{{ old('image_url', $article->image_url) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Kutipan / Excerpt</label>
            <textarea name="excerpt" class="form-control" rows="2" required>{{ old('excerpt', $article->excerpt) }}</textarea>
            <div class="form-text">Singkat, padat, dan menarik perhatian pembaca.</div>
        </div>

        <div class="mb-3">
            <label class="form-label">Konten Berita</label>
            <textarea name="content" class="form-control" rows="8" required>{{ old('content', $article->content) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="form-label">Tags (Pisahkan dengan koma)</label>
            <input type="text" name="tags" class="form-control" placeholder="berita, hari ini, viral" value="{{ old('tags', is_array($article->tags) ? implode(', ', $article->tags) : $article->tags) }}">
        </div>

        <div class="mb-4 form-check">
            <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="is_featured" {{ old('is_featured', $article->is_featured) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="is_featured">Jadikan Berita Pilihan / Utama</label>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-red px-4 py-2">Update Berita</button>
            <a href="/admin/berita" class="btn btn-light border px-4 py-2">Batal</a>
        </div>
    </form>
</div>
@endsection
