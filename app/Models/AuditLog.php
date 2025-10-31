<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    protected $table = 'tabel_audit_log';

    /**
     * Pastikan semua kolom ini ada di $fillable
     */
    protected $fillable = [
        'user_id',
        'action',
        'model_type',
        'model_id',
        'old_data',
        'new_data',
        'is_read',
    ];

    /**
     * =======================================================
     * INI ADALAH SOLUSINYA
     * Beri tahu Eloquent untuk mengubah kolom ini sebagai 'array' (JSON)
     * =======================================================
     */
    protected $casts = [
        'old_data' => 'array',
        'new_data' => 'array',
        'is_read' => 'boolean',
    ];

    public function user()
    {
        // 'user_id' adalah foreign key di tabel_audit_log
        // 'id' adalah primary key di tabel users
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
