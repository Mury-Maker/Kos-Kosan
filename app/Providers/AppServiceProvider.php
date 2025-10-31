<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // <-- Tambahkan ini
use Illuminate\Support\Facades\Auth; // <-- Tambahkan ini
use App\Models\AuditLog;           // <-- Tambahkan ini
use App\Models\Kos;
use App\Observers\KosObserver;
use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Firebase\Factory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Kos::observe(KosObserver::class); // <-- Tambahkan baris ini
        // Bagikan data 'unreadCount' HANYA ke view header admin
        View::composer('admin.layouts.header', function ($view) {
            // Gunakan cache agar tidak query database di setiap load
            $unreadCount = cache()->remember('unread_audit_count', 60, function () {
                return AuditLog::where('is_read', false)->count();
            });

            $view->with('unreadCount', $unreadCount);
        });
    }
}
