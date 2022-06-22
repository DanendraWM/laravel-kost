<?php

use App\Models\kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\frontController;

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

Route::get('/', [frontController::class, 'home']);
Route::post('/feed', [frontController::class, 'feed']);
Route::get('/kategori', [frontController::class, 'kategori']);
Route::get('/feed/{kategori:slug}', [frontController::class, 'feedid']);
Route::get('/feed', [frontController::class, 'feed']);
Route::get('/detail/{inap:slug}', [frontController::class, 'detail']);

route::group(['middleware' => ['guest']], function () {
    Route::post('/logout', [authController::class, 'logout']);
    Route::get('/login', [authController::class, 'login'])->name('login');
    Route::post('/login', [authController::class, 'authlogin']);
    Route::get('/register', [authController::class, 'register']);
    Route::post('/register', [authController::class, 'authregister']);
});

route::group(['middleware' => ['auth']], function () {
    Route::post('/sewa/{id}', [frontController::class, 'sewaid']);
    Route::get('/sewa', [frontController::class, 'sewa']);
    Route::get('/profile', [frontController::class, 'profile']);
    Route::post('/profile/ubah', [frontController::class, 'editProfile']);
    Route::get('/history', [frontController::class, 'history']);
    Route::post('/hapus/{id}', [frontController::class, 'hapusHistori']);
    Route::get('/exportPDF', [frontController::class, 'exportPDF']);
});
route::group(['middleware' => ['auth', 'cekLevel:admin']], function () {
    Route::get('/admin', [adminController::class, 'admin']);
    Route::get('/add', [adminController::class, 'add']);
    Route::post('/add', [adminController::class, 'tambah']);
    Route::delete('/hapus/{id}', [adminController::class, 'hapus']);
    Route::get('/edit/{id}', [adminController::class, 'edit']);
    Route::post('/edit/{id}', [adminController::class, 'ubah']);
});






// Not found harus paling bawah
Route::get('/{err}', [frontController::class, 'err']);
