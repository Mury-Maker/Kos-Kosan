<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'tabel_fasilitas';
    protected $primaryKey = 'id_fasilitas';
    public $incrementing = true;

    protected $fillable = [
        'nama_fasilitas',
    ];

    public function kos() { return $this->belongsToMany(Kos::class, 'tabel_kos_fasilitas', 'id_fasilitas', 'id_kos'); }
}
