<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    // Simpan pesan dari pengunjung web
    public function store(Request $request)
    {
        // Validasi input form kontak
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Simpan pesan ke database
        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'is_read' => false,
        ]);

        // Kembali ke halaman kontak dengan pesan sukses
        return redirect('/kontak')->with('contact_success', 'Terima kasih! Pesan Anda telah berhasil dikirim. Tim kami akan segera menghubungi Anda.');
    }

    // Menampilkan semua pesan di dashboard admin
    public function index()
    {
        // Ambil semua pesan, urutkan dari yang terbaru
        $messages = ContactMessage::orderBy('created_at', 'desc')->get();
        return view('admin.contacts.index', compact('messages'));
    }

    // Menampilkan detail satu pesan
    public function show($id)
    {
        // Cari pesan berdasarkan ID
        $message = ContactMessage::findOrFail($id);
        
        // Tandai sudah dibaca jika belum dibaca
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.contacts.show', compact('message'));
    }

    // Menghapus pesan
    public function destroy($id)
    {
        // Hapus pesan dari database
        ContactMessage::destroy($id);
        
        // Kembali ke daftar pesan
        return redirect('/admin/pesan')->with('success', 'Pesan berhasil dihapus.');
    }

    // Membalas pesan
    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply_text' => 'required|string',
        ]);

        $message = ContactMessage::findOrFail($id);

        try {
            \Illuminate\Support\Facades\Mail::to($message->email)
                ->send(new \App\Mail\ReplyMessageMail($message, $request->reply_text));

            return redirect()->back()->with('success', 'Balasan email berhasil dikirim!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengirim email: ' . $e->getMessage());
        }
    }
}
