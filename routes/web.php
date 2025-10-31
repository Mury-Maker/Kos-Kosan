<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KosController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Owner\OwnerProfileController; // Menggunakan nama yang disederhanakan
use App\Http\Controllers\Guest\KosDetailController;
use App\Http\Controllers\Owner\OwnerKosController;
use App\Http\Controllers\Owner\OwnerFasilitasController;
use App\Http\Controllers\Owner\OwnerGambarController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\AdminController; // Jika Anda memang menggunakannya


// Route Awal (Root, biasanya diarahkan ke landing page atau login jika belum login)
Route::get('/', function () {
    return redirect()->route('landingPage');
});

/* |--------------------------------------------------------------------------
| ROUTES AUTENTIKASI (Login & Logout)
|--------------------------------------------------------------------------
*/


// Tampilkan form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Proses login
Route::post('/login', [AuthController::class, 'login']);
// Proses logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/halo', function () {
    return view('login');
});


/* |--------------------------------------------------------------------------
| ROUTES UNTUK HALAMAN DEPAN (Publik)
|--------------------------------------------------------------------------
*/
Route::get('/landingPage', function () {
    return view('guest.landingPage');
})->name('landingPage');
Route::get('/daftarKos', [GuestController::class, 'daftarKos'])->name('daftarKos');
Route::get('/kos/{kos}', [KosDetailController::class, 'show'])->name('kos.detail');
Route::get('/tentang', function () {
    return view('guest.tentang');
})->name('tentang');


/* |--------------------------------------------------------------------------
| ROUTES UNTUK ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/', function () { return redirect()->route('admin.dashboard'); });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // --- KELOLA PEMILIK KOS (Data Personal - UserController) ---
    Route::get('/kelola_pemilik_kos', [UserController::class, 'indexPemilik'])->name('admin.kelola_pemilik_kos');
    Route::get('/form/formKelolaPemilikKos/{pemilik?}', [UserController::class, 'formPemilik'])->name('admin.form_kelola_pemilik_kos');
    Route::post('/storePemilik', [UserController::class, 'storePemilik'])->name('admin.store_pemilik');
    Route::put('/updatePemilik/{pemilik}', [UserController::class, 'updatePemilik'])->name('admin.update_pemilik');
    Route::delete('/destroyPemilik/{pemilik}', [UserController::class, 'destroyPemilik'])->name('admin.destroy_pemilik');


    // --- KELOLA USER (Akun Login - UserController) ---
    Route::get('/kelola_user', [UserController::class, 'indexUser'])->name('admin.kelola_user');
    Route::get('/form/formKelolaUser/{user?}', [UserController::class, 'formUser'])->name('admin.form_kelola_user');
    Route::post('/storeUser', [UserController::class, 'storeUser'])->name('admin.store_user');
    Route::put('/updateUser/{user}', [UserController::class, 'updateUser'])->name('admin.update_user');
    Route::delete('/destroyUser/{user}', [UserController::class, 'destroyUser'])->name('admin.destroy_user');

    // --- KELOLA DATA KOS (CRUD - KosController) ---
    Route::get('/kelola_data_kos', [KosController::class, 'indexKos'])->name('admin.kelola_kos');
    Route::get('/form/kos/{kos?}', [KosController::class, 'formKos'])->name('admin.form_kos');
    Route::post('/storeDataKos', [KosController::class, 'storeKos'])->name('admin.store_kos');
    Route::put('/updateDataKos/{kos}', [KosController::class, 'updateKos'])->name('admin.update_kos');
    Route::delete('/destroyDataKos/{kos}', [KosController::class, 'destroyKos'])->name('admin.destroy_kos');


    // --- KELOLA FASILITAS (CRUD - KosController) ---
    Route::get('/kelola_fasilitas', [KosController::class, 'indexFasilitas'])->name('admin.kelola_fasilitas');
    Route::get('/form/formKelolaFasilitas/{fasilitas?}', [KosController::class, 'formFasilitas'])->name('admin.form_kelola_fasilitas');
    Route::post('/storeFasilitas', [KosController::class, 'storeFasilitas'])->name('admin.store_fasilitas');
    Route::put('/updateFasilitas/{fasilitas}', [KosController::class, 'updateFasilitas'])->name('admin.update_fasilitas');
    Route::delete('/destroyFasilitas/{fasilitas}', [KosController::class, 'destroyFasilitas'])->name('admin.destroy_fasilitas');

    Route::get('/notifikasi', [NotificationController::class, 'index'])->name('admin.notifikasi');
    Route::post('/notifikasi/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('admin.notifikasi.mark_all_read');
});

/* |--------------------------------------------------------------------------
| ROUTES UNTUK OWNER (PEMILIK KOS)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('owner')->group(function () {

    // 1. DASHBOARD & ROOT
    Route::get('/', function () { return redirect()->route('owner.dashboard'); });
    Route::get('/dashboard', [OwnerKosController::class, 'dashboard'])->name('owner.dashboard');

    // 2. KELOLA PROFIL & PASSWORD (OwnerController)
    Route::get('/profile', [OwnerProfileController::class, 'showProfile'])->name('owner.profile');
    Route::get('/profile/edit/{pemilik}', [OwnerProfileController::class, 'showEditProfile'])->name('owner.profile.edit');
    Route::put('/profile/update/{pemilik}', [OwnerProfileController::class, 'updateProfile'])->name('owner.profile.update');
    Route::get('/ganti-sandi', [OwnerProfileController::class, 'showChangePasswordForm'])->name('owner.password.form');
    Route::put('/password/update', [OwnerProfileController::class, 'updatePassword'])->name('owner.password.update');

    // 3. KELOLA KOS (OwnerKosController)
    Route::get('/kelolaKos', [OwnerKosController::class, 'indexKos'])->name('owner.kelolaKos');
    Route::get('/form/kos/{kos?}', [OwnerKosController::class, 'formKos'])->name('owner.form_kos');
    Route::post('/storeKos', [OwnerKosController::class, 'storeKos'])->name('owner.store_kos');
    Route::put('/updateKos/{kos}', [OwnerKosController::class, 'updateKos'])->name('owner.update_kos');
    Route::delete('/destroyKos/{kos}', [OwnerKosController::class, 'destroyKos'])->name('owner.destroy_kos');

    // 4. KELOLA FASILITAS (OwnerFasilitasController)
    Route::get('/kelolaFasilitas', [OwnerFasilitasController::class, 'indexFasilitas'])->name('owner.kelolaFasilitas');
    Route::get('/form/fasilitas/{kos?}', [OwnerFasilitasController::class, 'formFasilitas'])->name('owner.form_fasilitas');
    Route::put('/updateFasilitas/{kos}', [OwnerFasilitasController::class, 'updateFasilitas'])->name('owner.update_fasilitas');

    // 5. KELOLA GAMBAR (OwnerGambarController)
    Route::get('/kelolaGambar', [OwnerGambarController::class, 'indexGambar'])->name('owner.kelolaGambar');
    Route::get('/form/gambar', [OwnerGambarController::class, 'formGambar'])->name('owner.form_gambar');
    Route::post('/storeGambar', [OwnerGambarController::class, 'storeGambar'])->name('owner.store_gambar'); // Tambahan Store
    Route::delete('/destroyGambar/{gambar}', [OwnerGambarController::class, 'destroyGambar'])->name('owner.destroy_gambar'); // Tambahan Delete
});
