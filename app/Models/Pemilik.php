<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    use HasFactory;

    protected $table = 'tabel_pemilik';
    protected $primaryKey = 'id_pemilik';
    public $incrementing = true;

    protected $fillable = [
        'nama_pemilik',
        'nomor_telepon',
        'alamat_pemilik',
        'foto_profil',
        'tanggal_daftar',
    ];

    // Hubungan One-to-One: Setiap Pemilik memiliki satu Akun User.
    public function user()
    {
        return $this->hasOne(User::class, 'id_pemilik', 'id_pemilik');
    }

    // Hubungan One-to-Many: Setiap Pemilik memiliki banyak Kos.
    public function kos()
    {
        return $this->hasMany(Kos::class, 'id_pemilik', 'id_pemilik');
    }
}
