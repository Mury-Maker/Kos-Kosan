<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// Hapus baris 'use Laravel\Sanctum\HasApiTokens;'

class User extends Authenticatable
{
    // Hapus HasApiTokens dari daftar use!
    use HasFactory, Notifiable;
    // ^-- Hanya gunakan HasFactory dan Notifiable

    protected $table = 'users';

    protected $fillable = [
        'email',
        'password',
        'role',
        'id_pemilik',
        'status_akun',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    // Hubungan One-to-One: User terhubung ke satu Pemilik.
    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'id_pemilik', 'id_pemilik');
    }
}
