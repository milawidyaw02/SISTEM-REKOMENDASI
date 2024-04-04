<?php

use App\Http\Controllers\RekomendasiController;
use Illuminate\Support\Facades\Route;

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

// auth
Route::get('/auth/formRegistrasi', [RekomendasiController::class, 'formRegister'])->name('registrasi');
Route::post('/auth/actionRegistrasi', [RekomendasiController::class, 'actionRegister'])->name('aksiRegistrasi');
Route::get('/', [RekomendasiController::class, 'formLogin'])->name('login');
Route::post('/auth/actionLogin', [RekomendasiController::class, 'actionLogin'])->name('aksiLogin');
Route::get('/auth/actionlogout', [RekomendasiController::class, 'logout'])->name('actionlogout');

// admin 
Route::get('/admin/dashboardAdmin',[RekomendasiController::class, 'indexAdmin'])->name('admin');
Route::get('/admin/tambahTenda',[RekomendasiController::class, 'formTambah'])->name('formTambah');
Route::post('/admin/actionTambahTenda', [RekomendasiController::class, 'actionTambah'])->name('aksiTambah');
Route::get('/admin/deleteTenda/{id}', [RekomendasiController::class, 'deleteTenda'])->name('hapusTenda');
Route::post('/admin/editTenda/{id}',[RekomendasiController::class, 'updateTenda'])->name('editTenda');

// user
Route::get('/user/dashboardUser',[RekomendasiController::class, 'indexUser'])->name('user');
Route::get('/user/formKebutuhan',[RekomendasiController::class, 'formKebutuhan'])->name('kebutuhan');
Route::get('/user/rating', [RekomendasiController::class, 'indexRating'])->name('indexRating');
Route::post('/user/ratingTenda', [RekomendasiController::class,'actionRating']);
Route::get('/user/formEditProfil', [RekomendasiController::class, 'formEditProfil']);
Route::get('/user/actionEditProfil', [RekomendasiController::class, 'actionEditProfil']);

// sistem rekomendasi
Route::get('/user/content-based',[RekomendasiController::class, 'contentBased']);
Route::get('/user/distance', [RekomendasiController::class, 'distance']);
Route::get('/user/hybrid', [RekomendasiController::class, 'testHybrid']);