<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/al', [SiswaController::class, 'index1']);
Route::get('/kim', [SiswaController::class, 'index2']);
Route::get('/pham', [SiswaController::class, 'index3']);
// Route::get('/belajar', [SiswaController::class, 'index4']);

Route::get('/kelas', [KelasController::class, 'kelas']);
Route::get('/kelas/create', [KelasController::class, 'create']);
Route::post('/kelas', [KelasController::class, 'store']);
Route::get('/kelas/edit/{id}', [KelasController::class, 'edit']);
Route::patch('/kelas/{id}', [KelasController::class, 'update']);
Route::delete('/kelas/{id}', [KelasController::class, 'destroy']);

Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/siswa/create', [SiswaController::class, 'create']);
Route::post('/siswa', [SiswaController::class, 'store']);
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);
Route::patch('/siswa/{id}', [SiswaController::class, 'update']);
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy']);
// //Route
// Route::get('/profile', function() {
//     echo 'Halo semuanya!!!, nama aku Al Ghani dari kelas 11 RPL 1. Salam kenal.';
// });

// Route::get('/nova', function() {
//     echo 'Aku sedang mendengarkan lagu Supernova by aespa';
// });

// Route::get('/ditto', function() {
//     echo 'I got no time to loseeeeee';
// });


// //Cara ke-1
// Route::get('/ghani', function() {
//     $data['nama'] = "Al Ghani";
//     $data['jk'] = "Laki-laki";
//     return view('belajar', $data);
// });
// //cara ke-2 dalam teks biasa
// Route::get('/sunoo', function() {
//     $nama   = "Kim Sunoo";
//     $jk     = "Laki-laki";
//     return view('belajar', compact('nama', 'jk'));
// });
// //cara ke-2 dalam tabel
// Route::get('/hanni', function() {
//     $nama   = "Hanni Pham";
//     $jk     = "Perempuan";
//     return view('belajar', compact('nama', 'jk'));
// });