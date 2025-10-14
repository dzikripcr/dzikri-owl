<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MatakuliahController;

Route::get('/', function () {
    return view('welcome');
});

//basic route
Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
});

//route parameter
Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: '.$param1;
});

//named route
Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show');

//route mahasiswa controller
Route::get('/mahasiswa/{param1}', [MahasiswaController :: class, 'show'] );

//route untuk view halaman-about
Route::get('/about', function () {
    return view('halaman-about');
});

//route matakuliah
Route::get('/matakuliah', [MatakuliahController::class, 'index']);
Route::get('/matakuliah/show/{kode?}', [MatakuliahController::class, 'show']);
Route::get('/matakuliah/create', [MatakuliahController::class, 'create']);
Route::get('/matakuliah/edit/{kode?}', [MatakuliahController::class, 'edit']);
Route::get('/matakuliah/update/{kode?}', [MatakuliahController::class, 'update']);

//route home controller
Route::get('/home',[HomeController::class,'index'])->name('home');

//route pegawai controller
Route::get('/pegawai',[PegawaiController::class,'index']);

//route untuk controller question
Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

//route untuk volt template
Route::get('/dashboard',[DashboardController::class,'index'])
        ->name('dashboard');

//route halaman login admin
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

//route halaman register admin
Route::get('/register', [AuthController::class, 'showregis'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

//route pelanggan controller
Route::resource('pelanggan', PelangganController::class);
