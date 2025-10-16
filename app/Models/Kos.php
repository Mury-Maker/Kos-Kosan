<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    use HasFactory;

    protected $table = 'tabel_kos';
    protected $primaryKey = 'id_kos';
    public $incrementing = true;

    protected $fillable = [
        'id_pemilik', 'nama_kos', 'tipe_kos', 'alamat_lengkap', 'deskripsi_kos',
        'lintang', 'bujur', 'jumlah_kamar_total', 'jumlah_kamar_tersedia',
        'jumlah_penghuni_saat_ini',
    ];

    public function pemilik() { return $this->belongsTo(Pemilik::class, 'id_pemilik', 'id_pemilik'); }
    public function hargaKamar() { return $this->hasMany(HargaKamar::class, 'id_kos', 'id_kos'); }
    public function gambar() { return $this->hasMany(Gambar::class, 'id_kos', 'id_kos'); }
    public function fasilitas() { return $this->belongsToMany(Fasilitas::class, 'tabel_kos_fasilitas', 'id_kos', 'id_fasilitas'); }
}
