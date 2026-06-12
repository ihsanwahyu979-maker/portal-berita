<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    // Menggunakan koneksi database MongoDB
    protected $connection = 'mongodb';
    
    // Nama koleksi (tabel) di MongoDB
    protected $collection = 'articles';

    // Kolom-kolom yang boleh diisi (ditambahkan ke database)
    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'region',
        'category',
        'image_url',
        'author_name',
        'view_count',
        'is_featured',
        'tags',
    ];

    // Konversi otomatis tipe data agar sesuai
    protected $casts = [
        'is_featured' => 'boolean',
        'view_count' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'tags' => 'array',
    ];
}
