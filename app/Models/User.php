<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    // Menggunakan koneksi MongoDB dan koleksi users (untuk akun admin)
    protected $connection = 'mongodb';
    protected $collection = 'users';

    // Data profil admin yang boleh diisi
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Data rahasia yang disembunyikan
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Konversi otomatis data tertentu
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // Password akan otomatis dienkripsi
        ];
    }
}
