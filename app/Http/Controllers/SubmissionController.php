<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    // Menampilkan form kirim berita untuk pengunjung
    public function create()
    {
        return view('public.kirim');
    }

    // Menyimpan berita kiriman dari pengunjung
    public function store(Request $request)
    {
        // Validasi data kiriman
        $request->validate([
            'author_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'image_url' => 'nullable|url',
        ]);

        // Proses gambar: Prioritaskan upload file, jika tidak ada, gunakan URL
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('submissions', 'public');
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        // Simpan kiriman ke database dengan status "pending" (menunggu)
        Submission::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_name' => $request->author_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image_url' => $imagePath,
            'status' => 'pending',
        ]);

        // Kembali ke halaman form dengan pesan sukses
        return redirect('/kirim-berita')->with('success', 'Berita Anda berhasil dikirim dan sedang dalam tinjauan redaksi. Terima kasih atas kontribusi Anda!');
    }

    // Menampilkan daftar kiriman berita di halaman admin
    public function index()
    {
        // Ambil semua kiriman, urutkan dari yang terbaru
        $submissions = Submission::orderBy('created_at', 'desc')->get();
        return view('admin.submissions.index', compact('submissions'));
    }

    // Menampilkan detail kiriman berita (untuk ditinjau admin)
    public function show($id)
    {
        // Cari kiriman berdasarkan ID
        $submission = Submission::findOrFail($id);
        return view('admin.submissions.show', compact('submission'));
    }

    // Menyetujui kiriman berita agar menjadi artikel resmi
    public function approve(Request $request, $id)
    {
        // Cari kiriman yang mau disetujui
        $submission = Submission::findOrFail($id);
        
        // Pastikan kategori diisi saat menyetujui
        $request->validate([
            'category' => 'required|string',
            'region' => 'nullable|string',
        ]);

        // Buat artikel baru dari data kiriman tersebut
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
            'tags' => ['citizen-journalism'], // Beri penanda ini berita dari warga
        ]);

        // Ubah status kiriman menjadi "approved" (disetujui)
        $submission->update(['status' => 'approved']);

        // Kirim email notifikasi bahwa berita disetujui
        try {
            \Illuminate\Support\Facades\Mail::to($submission->email)
                ->send(new \App\Mail\SubmissionStatusMail($submission, 'approved'));
        } catch (\Exception $e) {
            // Log error atau biarkan saja agar tidak mengganggu proses admin
        }

        // Kembali ke daftar tinjauan
        return redirect('/admin/tinjauan')->with('success', 'Berita kiriman berhasil disetujui dan email pemberitahuan telah dikirim ke penulis!');
    }

    // Menolak kiriman berita
    public function reject($id)
    {
        // Ubah status kiriman menjadi "rejected" (ditolak)
        $submission = Submission::findOrFail($id);
        $submission->update(['status' => 'rejected']);

        // Kirim email notifikasi bahwa berita ditolak
        try {
            \Illuminate\Support\Facades\Mail::to($submission->email)
                ->send(new \App\Mail\SubmissionStatusMail($submission, 'rejected'));
        } catch (\Exception $e) {
            // Log error atau biarkan saja agar tidak mengganggu proses admin
        }

        return redirect('/admin/tinjauan')->with('success', 'Berita kiriman telah ditolak dan email pemberitahuan telah dikirim.');
    }

    // Menghapus kiriman berita secara permanen
    public function destroy($id)
    {
        // Cari kiriman yang mau dihapus
        $submission = Submission::findOrFail($id);
        
        // Hapus file gambar yang dilampirkan
        if ($submission->image_url) {
            Storage::disk('public')->delete($submission->image_url);
        }
        
        // Hapus data dari database
        $submission->delete();

        // Kembali ke daftar tinjauan
        return redirect('/admin/tinjauan')->with('success', 'Berita kiriman dihapus permanen.');
    }
}
