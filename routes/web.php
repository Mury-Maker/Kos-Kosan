<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
});
Route::get('/admin/Kelola_Data_Kos', function () {
    return view('admin.KelolaDataKos');
});
