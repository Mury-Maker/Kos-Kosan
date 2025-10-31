<?php

namespace App\Observers;

use App\Models\Kos;
use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;

class KosObserver
{
    // Helper untuk mencatat log
    private function logAction(string $action, Kos $kos, ?array $oldData = null)
    {
        // Jangan catat jika tidak ada yang login (misal: dari seeder)
        if (!Auth::check()) {
            return;
        }

        AuditLog::create([
            'user_id' => Auth::id(),
            'action' => $action,
            'model_type' => Kos::class,
            'model_id' => $kos->id_kos,
            'old_data' => $oldData,
            'new_data' => ($action !== 'deleted') ? $kos->toArray() : null,
            'is_read' => false,
        ]);
    }

    /**
     * Handle the Kos "created" event.
     */
    public function created(Kos $kos): void
    {
        $this->logAction('created', $kos);
    }

    /**
     * Handle the Kos "updated" event.
     */
    public function updated(Kos $kos): void
    {
        // Ambil data sebelum diubah
        $oldData = $kos->getOriginal();
        $this->logAction('updated', $kos, $oldData);
    }

    /**
     * Handle the Kos "deleted" event.
     */
    public function deleted(Kos $kos): void
    {
        $oldData = $kos->toArray();
        $this->logAction('deleted', $kos, $oldData);
    }
}
