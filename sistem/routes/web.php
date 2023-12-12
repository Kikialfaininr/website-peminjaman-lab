<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/adminbooking', [App\Http\Controllers\AdminBookingController::class, 'index']);
Route::get('/adminuser', [App\Http\Controllers\AdminUserController::class, 'index']);
Route::get('/laporanbooking', [App\Http\Controllers\LaporanBookingController::class, 'index']);
Route::get('/laporanpengguna', [App\Http\Controllers\LaporanPenggunaController::class, 'index']);

Route::get('/download-laporanbooking', [App\Http\Controllers\LaporanBookingController::class, 'download']);
Route::get('/download-laporanpengguna', [App\Http\Controllers\LaporanPenggunaController::class, 'download']);

Route::post('/simpan-data-adminbooking', [App\Http\Controllers\AdminBookingController::class, 'simpan']);
Route::get('{id}/edit-adminbooking', [App\Http\Controllers\AdminBookingController::class, 'edit']);
Route::post('update-adminbooking/{id}', [App\Http\Controllers\AdminBookingController::class, 'update']);
Route::get('{id}/hapus-adminbooking', [App\Http\Controllers\AdminBookingController::class, 'hapus']);
Route::post('confirm-adminbooking/{id}', [App\Http\Controllers\AdminBookingController::class, 'confirm']);

Route::post('/simpan-data-adminuser', [App\Http\Controllers\AdminUserController::class, 'simpan']);
Route::get('{id}/edit-adminuser', [App\Http\Controllers\AdminUserController::class, 'edit']);
Route::post('update-adminuser/{id}', [App\Http\Controllers\AdminUserController::class, 'update']);
Route::get('{id}/hapus-adminuser', [App\Http\Controllers\AdminUserController::class, 'hapus']);

Route::get('/bookinglab', [App\Http\Controllers\BookinglabController::class, 'index']);
Route::post('/simpan-data-booking', [App\Http\Controllers\BookinglabController::class, 'simpan']);

Route::group(['middleware' => ['auth', 'level:admin,kepala']], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::group(['middleware' => ['auth', 'level:pengguna']], function(){
    
});