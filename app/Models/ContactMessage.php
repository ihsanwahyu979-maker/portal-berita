<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ContactMessage extends Model
{
    // Menggunakan koneksi MongoDB dan koleksi (tabel) contact_messages
    protected $connection = 'mongodb';
    protected $collection = 'contact_messages';

    // Kolom data pesan yang boleh diisi
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'is_read', // Status apakah pesan sudah dibaca admin
    ];

    // Pastikan status baca berbentuk true/false
    protected $casts = [
        'is_read' => 'boolean',
    ];
}
