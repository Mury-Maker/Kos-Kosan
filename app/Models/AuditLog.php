<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    protected $table = 'tabel_audit_log';

    protected $fillable = [
        'user_id', 'model_type', 'model_id', 'action', 'old_data', 'new_data', 'is_read',
    ];
}
