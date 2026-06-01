<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    // Publik: Simpan pesan dari form kontak
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'is_read' => false,
        ]);

        return redirect('/kontak')->with('contact_success', 'Terima kasih! Pesan Anda telah berhasil dikirim. Tim kami akan segera menghubungi Anda.');
    }

    // Admin: Daftar pesan
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->get();
        return view('admin.contacts.index', compact('messages'));
    }

    // Admin: Detail pesan
    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.contacts.show', compact('message'));
    }

    // Admin: Hapus pesan
    public function destroy($id)
    {
        ContactMessage::destroy($id);
        return redirect('/admin/pesan')->with('success', 'Pesan berhasil dihapus.');
    }
}
