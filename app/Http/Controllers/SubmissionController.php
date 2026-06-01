<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    // Publik: Tampilkan form kirim berita
    public function create()
    {
        return view('public.kirim');
    }

    // Publik: Simpan kiriman berita
    public function store(Request $request)
    {
        $request->validate([
            'author_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('submissions', 'public');
        }

        Submission::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_name' => $request->author_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image_url' => $imagePath,
            'status' => 'pending',
        ]);

        return redirect('/kirim-berita')->with('success', 'Berita Anda berhasil dikirim dan sedang dalam tinjauan redaksi. Terima kasih atas kontribusi Anda!');
    }

    // Admin: Daftar tinjauan berita
    public function index()
    {
        $submissions = Submission::orderBy('created_at', 'desc')->get();
        return view('admin.submissions.index', compact('submissions'));
    }

    // Admin: Detail kiriman
    public function show($id)
    {
        $submission = Submission::findOrFail($id);
        return view('admin.submissions.show', compact('submission'));
    }

    // Admin: Setujui kiriman -> jadi Artikel
    public function approve(Request $request, $id)
    {
        $submission = Submission::findOrFail($id);
        
        $request->validate([
            'category' => 'required|string',
            'region' => 'nullable|string',
        ]);

        // Buat Artikel baru dari submission
        Article::create([
            'title' => $submission->title,
            'excerpt' => \Illuminate\Support\Str::limit(strip_tags($submission->content), 150),
            'content' => $submission->content,
            'region' => $request->region,
            'category' => $request->category,
            'image_url' => $submission->image_url,
            'author_name' => $submission->author_name,
            'view_count' => 0,
            'is_featured' => false,
            'tags' => ['citizen-journalism'],
        ]);

        $submission->update(['status' => 'approved']);

        return redirect('/admin/tinjauan')->with('success', 'Berita kiriman berhasil disetujui dan diterbitkan!');
    }

    // Admin: Tolak kiriman
    public function reject($id)
    {
        $submission = Submission::findOrFail($id);
        $submission->update(['status' => 'rejected']);

        return redirect('/admin/tinjauan')->with('success', 'Berita kiriman telah ditolak.');
    }

    // Admin: Hapus kiriman permanen
    public function destroy($id)
    {
        $submission = Submission::findOrFail($id);
        if ($submission->image_url) {
            Storage::disk('public')->delete($submission->image_url);
        }
        $submission->delete();

        return redirect('/admin/tinjauan')->with('success', 'Berita kiriman dihapus permanen.');
    }
}
