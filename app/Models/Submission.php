<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Submission extends Model
{
    // Menggunakan koneksi MongoDB dan koleksi (tabel) submissions
    protected $connection = 'mongodb';
    protected $collection = 'submissions';

    // Kolom data kiriman berita warga yang boleh diisi
    protected $fillable = [
        'title',
        'content',
        'author_name',
        'email',
        'phone',
        'image_url',
        'status', // Status kiriman: pending, approved, atau rejected
    ];
}
