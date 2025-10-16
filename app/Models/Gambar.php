<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    use HasFactory;

    protected $table = 'tabel_gambar';
    protected $primaryKey = 'id_gambar';
    public $incrementing = true;

    protected $fillable = [
        'id_kos', 'url_gambar',
    ];

    public function kos() { return $this->belongsTo(Kos::class, 'id_kos', 'id_kos'); }
}
