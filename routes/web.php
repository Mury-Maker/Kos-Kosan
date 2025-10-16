<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KosController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Guest\KosDetailController; // <-- Tambahkan ini
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

// Proses logout (Hanya bisa diakses jika sudah login)
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
| ROUTES UNTUK ADMIN/OWNER (Perlu Login)
|--------------------------------------------------------------------------
*/

// Grup route yang memerlukan autentikasi Admin
Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
// Di dalam grup admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');



    Route::get('/form/formKelolaDataKos', function () {
        return view('admin.form.formKelolaDataKos');
    })->name('admin.form_kos');



    // --- KELOLA PEMILIK KOS (Data Personal - CRUD) ---
    // READ
    Route::get('/kelola_pemilik_kos', [UserController::class, 'indexPemilik'])->name('admin.kelola_pemilik_kos');
    // CREATE/EDIT FORM (Note: {pemilik?} adalah parameter opsional untuk mode edit)
    Route::get('/form/formKelolaPemilikKos/{pemilik?}', [UserController::class, 'formPemilik'])->name('admin.form_kelola_pemilik_kos');
    // POST (CREATE)
    Route::post('/storePemilik', [UserController::class, 'storePemilik'])->name('admin.store_pemilik');
    // PUT (UPDATE)
    Route::put('/updatePemilik/{pemilik}', [UserController::class, 'updatePemilik'])->name('admin.update_pemilik');
    // DELETE
    Route::delete('/destroyPemilik/{pemilik}', [UserController::class, 'destroyPemilik'])->name('admin.destroy_pemilik');


    // --- KELOLA USER (Akun Login - CRUD) ---
    // READ
    Route::get('/kelola_user', [UserController::class, 'indexUser'])->name('admin.kelola_user');
    // CREATE/EDIT FORM
    Route::get('/form/formKelolaUser/{user?}', [UserController::class, 'formUser'])->name('admin.form_kelola_user');
    // POST (CREATE)
    Route::post('/storeUser', [UserController::class, 'storeUser'])->name('admin.store_user');
    // PUT (UPDATE)
    Route::put('/updateUser/{user}', [UserController::class, 'updateUser'])->name('admin.update_user');
    // DELETE
    Route::delete('/destroyUser/{user}', [UserController::class, 'destroyUser'])->name('admin.destroy_user');

    // --- KELOLA DATA KOS (CRUD) ---
    Route::get('/kelola_data_kos', [KosController::class, 'indexKos'])->name('admin.kelola_kos');

    // 2. [CREATE/EDIT FORM] Form Tambah/Edit Kos
    // Menggunakan Route Model Binding: {kos?} untuk mode Edit, opsional untuk mode Tambah
    Route::get('/form/kos/{kos?}', [KosController::class, 'formKos'])->name('admin.form_kos');
    // *Catatan: Saya menyarankan menggunakan path yang lebih pendek seperti /form/kos/ daripada /form/formKelolaDataKos/

    // 3. [POST] Menyimpan Data Baru
    Route::post('/storeDataKos', [KosController::class, 'storeKos'])->name('admin.store_kos');

    // 4. [PUT] Memperbarui Data Kos (AKTIF)
    Route::put('/updateDataKos/{kos}', [KosController::class, 'updateKos'])->name('admin.update_kos');

    // 5. [DELETE] Menghapus Data Kos (AKTIF)
    Route::delete('/destroyDataKos/{kos}', [KosController::class, 'destroyKos'])->name('admin.destroy_kos');


    // --- KELOLA FASILITAS (CRUD) ---
    Route::get('/kelola_fasilitas', [KosController::class, 'indexFasilitas'])->name('admin.kelola_fasilitas');
    Route::get('/form/formKelolaFasilitas/{fasilitas?}', [KosController::class, 'formFasilitas'])->name('admin.form_kelola_fasilitas');
    Route::post('/storeFasilitas', [KosController::class, 'storeFasilitas'])->name('admin.store_fasilitas');
    Route::put('/updateFasilitas/{fasilitas}', [KosController::class, 'updateFasilitas'])->name('admin.update_fasilitas');
    Route::delete('/destroyFasilitas/{fasilitas}', [KosController::class, 'destroyFasilitas'])->name('admin.destroy_fasilitas');

});

// Grup route yang memerlukan autentikasi Pemilik (Owner)
Route::middleware(['auth'])->prefix('owner')->group(function () {

    Route::get('/', function () {
        return redirect()->route('owner.dashboard');
    });

    Route::get('/dashboard', function () {
        return view('owner.dashboard');
    })->name('owner.dashboard');

});
