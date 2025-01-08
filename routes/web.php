<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/signup', [LoginController::class, 'daftar'])->name('daftar');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::post('/daftar-proses', [LoginController::class, 'daftar_proses'])->name('daftar-proses');


Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/sarana', [SaranaController::class, 'index'])->name('sarana');
    Route::get('/addSarana', [SaranaController::class, 'addSarana'])->name('add.sarana');
    Route::post('/storeSarana', [SaranaController::class, 'store'])->name('store.sarana');
    Route::get('/editSarana/{id}', [SaranaController::class, 'editSarana'])->name('edit.sarana');
    Route::put('/updateSarana/{id}', [SaranaController::class, 'updateSarana'])->name('update.sarana');
    Route::delete('/deleteSarana/{id}', [SaranaController::class, 'deleteSarana'])->name('delete.sarana');

    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman');
    Route::get('/addPeminjaman', [PeminjamanController::class, 'addPeminjaman'])->name('add.peminjaman');
    Route::post('/storePeminjaman', [PeminjamanController::class, 'store'])->name('store.peminjaman');
    Route::delete('/deletePeminjaman/{id}', [PeminjamanController::class, 'deletePeminjaman'])->name('delete.peminjaman');

    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/addUser', [UserController::class, 'addUser'])->name('add.user');
    Route::post('/store', [UserController::class, 'store'])->name('store.user');
    Route::get('/editUser/{id}', [UserController::class, 'editUser'])->name('edit.user');
    Route::put('/updateUser/{id}', [UserController::class, 'updateUser'])->name('update.user');
    Route::delete('/deleteUser/{id}', [UserController::class, 'deleteUser'])->name('delete.user');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
