<?php

use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\pengumpulanController;
use App\Http\Controllers\verifyController;
use App\Http\Controllers\hasilcontroller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('dropdownlist','homeController@countrylist');
Route::get('getStateList',[homeController::class, 'getStateList']);
Route::get('getCityList',[homeController::class, 'getCityList']);
Route::get('verify',[homeController::class, 'verify']);
Route::get('verified',[homeController::class, 'verified']);
Route::get('/delete/{id}',[verifyController::class, 'delete']);
Route::get('/searchpendaftar',[homeController::class, 'search']);
Route::get('/searchpengguna',[verifyController::class, 'search']);
Route::get('/searchhasil',[hasilcontroller::class, 'search']);

Route::resource('/pendaftaran', homeController::class);
Route::resource('/daftarhasil', hasilcontroller::class);
Route::resource('/daftaruser', verifyController::class);
Route::resource('/pengumpulan.data', pengumpulanController::class)->shallow();
Route::resource('/verifikasi.pendaftaran', verifyController::class)->shallow();
// Route::resource('verifikasi.delete', verifyController::class)->shallow();

Route::get('/', function () {
    return view('vIndex');
});

Route::get('/pendaftar/excel', [homeController::class, 'export_excel'])->middleware(['auth'])->name('excel');
Route::get('/pengguna/excel', [verifyController::class, 'export_excel'])->middleware(['auth'])->name('excel');
Route::get('/hasil/excel', [hasilcontroller::class, 'export_excel'])->middleware(['auth'])->name('excel');
Route::get('/pembayaran/image/{id}', [homeController::class, 'downloadImage'])->middleware(['auth'])->name('image');
Route::get('/hasil/image/{id}', [hasilcontroller::class, 'downloadImage'])->middleware(['auth'])->name('image');

Route::get('/detailpendaftar/{id}', [homeController::class, 'verify'])->middleware(['auth'])->name('detail');
Route::get('/detailpengguna/{id}', [homeController::class, 'verified'])->middleware(['auth'])->name('detail');

Route::get('/dashboard', [dashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/pendaftaran', [homeController::class, 'index'])->middleware(['auth'])->name('pendaftaran');

Route::get('/deskripsi', [homeController::class, 'deskripsi'])->middleware(['auth'])->name('deskripsi');
// Route::delete('deletepengguna', [verifyController::class, 'destroy'])->middleware(['auth'])->name('daftaruser');
Route::get('/pengumpulan', [pengumpulanController::class, 'index'])->middleware(['auth'])->name('pengumpulan');

require __DIR__.'/auth.php';


Route::get('form-pendaftaran', function () {
    return view('vUserHome2');
});
Route::get('dashboard', function () {
    return view('vPengumpulancopy');
});