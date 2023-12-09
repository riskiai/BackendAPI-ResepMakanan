<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdmindanSuperadmin\Adminpage\ResepController;
use App\Http\Controllers\AdmindanSuperadmin\Adminpage\ArticleController;
use App\Http\Controllers\AdmindanSuperadmin\Adminpage\CommentController;
use App\Http\Controllers\AdmindanSuperadmin\Adminpage\NutrsiController;
use App\Http\Controllers\AdmindanSuperadmin\DashboardController;

use App\Http\Controllers\AdmindanSuperadmin\Superadminpage\UserController;
use App\Http\Controllers\AdmindanSuperadmin\Superadminpage\DataTableController;
use App\Http\Controllers\AdmindanSuperadmin\Superadminpage\ImportexcelController;

use App\Http\Controllers\AdmindanSuperadmin\Auth\LoginController;
use App\Http\Controllers\AdmindanSuperadmin\Auth\RegisterController;

use App\Http\Controllers\HomeController;

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
    return redirect('/home');
});

/* Login */
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register_proses', [RegisterController::class, 'register_proses'])->name('register-proses');

/* User Page */
Route::get('/home', [HomeController::class, 'index'])->name('home');


/* Admin Page Dan Super Admin */
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

/* Super Admin */
Route::group(['prefix' => 'superadmin', 'middleware' => ['auth'], 'as' => 'superadmin.'], function(){

    /* CRUD USER */
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

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


Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function(){
   
    /* CRUD ARTICLE */
    Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/article/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/article/update/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/article/delete/{id}', [ArticleController::class, 'delete'])->name('article.delete');

    /* CRUD Nutrisi */
    Route::get('/nutrisi', [NutrsiController::class, 'index'])->name('nutrisi.index');
    Route::get('/nutrisi/create', [NutrsiController::class, 'create'])->name('nutrisi.create');
    Route::post('/nutrisi/store', [NutrsiController::class, 'store'])->name('nutrisi.store');
    Route::get('/nutrisi/edit/{id}', [NutrsiController::class, 'edit'])->name('nutrisi.edit');
    Route::put('/nutrisi/update/{id}', [NutrsiController::class, 'update'])->name('nutrisi.update');
    Route::delete('/nutrisi/delete/{id}', [NutrsiController::class, 'delete'])->name('nutrisi.delete');


    /* Comment Relasi dengan resep */
    Route::get('/resep/show/{id}', [ResepController::class, 'show'])->name('resep.show');
    Route::post('/resep/add-comment/{id}', [ResepController::class, 'addComment'])->name('resep.addComment');

    /* CRUD RESEP */
    Route::get('/resep', [ResepController::class, 'index'])->name('resep.index');
    Route::get('/resep/create', [ResepController::class, 'create'])->name('resep.create');
    Route::post('/resep/store', [ResepController::class, 'store'])->name('resep.store');
    Route::get('/resep/edit/{id}', [ResepController::class, 'edit'])->name('resep.edit');
    Route::put('/resep/update/{id}', [ResepController::class, 'update'])->name('resep.update');
    Route::delete('/resep/delete/{id}', [ResepController::class, 'delete'])->name('resep.delete');

    /* DATA COMMENTS RELASI */
    Route::get('/comment', [CommentController::class, 'index'])->name('comment.index');
    Route::delete('/comment/delete/{id}', [CommentController::class, 'delete'])->name('comment.delete');

});






