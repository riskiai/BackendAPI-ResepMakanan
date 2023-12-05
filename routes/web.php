<?php

use App\Http\Controllers\Adminpage\ArticleController;
use App\Http\Controllers\Adminpage\CommentController;
use App\Http\Controllers\Adminpage\DashboardController;
use App\Http\Controllers\Adminpage\DataTableController;
use App\Http\Controllers\Adminpage\HomeController;
use App\Http\Controllers\Adminpage\ImportexcelController;
use App\Http\Controllers\Adminpage\LoginController;
use App\Http\Controllers\Adminpage\ResepController;
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

Route::get('/', function(){
    return redirect('/login');
});

/* Login */
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register_proses', [LoginController::class, 'register_proses'])->name('register-proses');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    /* CRUD USER */
    Route::get('/user', [HomeController::class, 'index'])->name('user.index');
    Route::get('/create', [HomeController::class, 'create'])->name('user.create');
    Route::post('/store', [HomeController::class, 'store'])->name('user.store');
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [HomeController::class, 'update'])->name('user.update');
    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('user.delete');

    /* CRUD ARTICLE */
    Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/article/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/article/update/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/article/delete/{id}', [ArticleController::class, 'delete'])->name('article.delete');

    /* CRUD RESEP */
    Route::get('/resep', [ResepController::class, 'index'])->name('resep.index');
    
    /* Comment Dan Detail */
    Route::get('/resep/show/{id}', [ResepController::class, 'show'])->name('resep.show');
    Route::post('/resep/add-comment/{id}', [ResepController::class, 'addComment'])->name('resep.addComment');

    Route::get('/resep/create', [ResepController::class, 'create'])->name('resep.create');
    Route::post('/resep/store', [ResepController::class, 'store'])->name('resep.store');
    Route::get('/resep/edit/{id}', [ResepController::class, 'edit'])->name('resep.edit');
    Route::put('/resep/update/{id}', [ResepController::class, 'update'])->name('resep.update');
    Route::delete('/resep/delete/{id}', [ResepController::class, 'delete'])->name('resep.delete');

    /* DATA COMMENTS RELASI */
    Route::get('/comment', [CommentController::class, 'index'])->name('comment.index');
    Route::delete('/comment/delete/{id}', [CommentController::class, 'delete'])->name('comment.delete');

    /* DATA TABLE */
    Route::get('/clientside', [DataTableController::class, 'clientside'])->name('datatable.clientside');
    Route::get('/serverside', [DataTableController::class, 'serverside'])->name('datatable.serverside');

    /* REPORT EXCEL */
    Route::group(['prefix' => 'excel'], function(){
        Route::get('/cache', [ImportexcelController::class, 'cache'])->name('cache');
        Route::get('/import', [ImportexcelController::class, 'import'])->name('import');
        Route::post('/import-proses', [ImportexcelController::class, 'import_proses'])->name('import-proses');
    });

});






