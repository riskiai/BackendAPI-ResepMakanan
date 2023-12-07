<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;

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

Route::get('/', [FrontEndController::class,'index'])->name('index');
Route::get('/bahan', [FrontEndController::class,'bahan'])->name('bahan');
Route::get('/resep', [FrontEndController::class,'resep'])->name('resep');
Route::get('/artikel', [FrontEndController::class,'artikel'])->name('artikel');
Route::get('/detail-artikel', [FrontEndController::class,'detailArtikel'])->name('detailArtikel');
Route::get('/detail-resep', [FrontEndController::class,'detailResep'])->name('detailResep');
Route::get('/login', [FrontEndController::class,'login'])->name('login');
Route::get('/register', [FrontEndController::class,'register'])->name('register');



// Route::get('/', [FrontEndController::class,'index'])->name('index');



