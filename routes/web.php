<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController; // Asumsi Anda akan membuat AdminController

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
    return view('guest.landingPage'); // Halaman daftar kos publik
})->name('landingPage');

Route::get('/daftarKos', function () {
    return view('guest.daftarKos'); // Halaman daftar kos publik
})->name('daftarKos');

Route::get('/tentang', function () {
    return view('guest.tentang'); // Halaman daftar kos publik
})->name('tentang');



/* |--------------------------------------------------------------------------
| ROUTES UNTUK ADMIN/OWNER (Perlu Login)
|--------------------------------------------------------------------------
*/

// Grup route yang memerlukan autentikasi
Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Dashboard (Arahkan ke sini setelah login sukses)
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');


    Route::get('/kelola_Data_Kos', function () {
        return view('admin.kelolaDataKos');
    })->name('admin.kelola_kos');

    Route::get('/form/formKelolaDataKos', function () {
        return view('admin.form.formKelolaDataKos');
    })->name('admin.form_kos');

    Route::get('/kelola_fasilitas', function () {
        return view('admin.kelolaFasilitas');
    })->name('admin.kelola_fasilitas');

    Route::get('/form/formKelolaFasilitas', function () {
        return view('admin.form.formKelolaFasilitas');
    })->name('admin.form_kelola_fasilitas_kos');

    Route::get('/kelola_Pemilik_Kos', function () {
        return view('admin.kelolaPemilikKos');
    })->name('admin.kelola_pemilik_kos');

    Route::get('/form/formKelolaPemilikKos', function () {
        return view('admin.form.formKelolaPemilikKos');
    })->name('admin.form_kelola_pemilik_kos');

    Route::get('/kelola_User', function () {
        return view('admin.kelolaUser');
    })->name('admin.kelola_User');

    Route::get('/form/formKelolaUser', function () {
        return view('admin.form.formKelolaUser');
    })->name('admin.form_kelola_user');


    // Route Root setelah login, arahkan ke dashboard admin
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
});

// Route Awal (Root, biasanya diarahkan ke landing page atau login jika belum login)
Route::get('/', function () {
    return redirect()->route('landingPage');
});
