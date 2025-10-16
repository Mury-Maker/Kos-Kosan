<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaKamar extends Model
{
    use HasFactory;

    protected $table = 'tabel_harga_kamar';
    protected $primaryKey = 'id_harga_kamar';
    public $incrementing = true;

    protected $fillable = [
        'id_kos', 'harga_terendah', 'harga_tertinggi',
    ];

    public function kos() { return $this->belongsTo(Kos::class, 'id_kos', 'id_kos'); }
}
