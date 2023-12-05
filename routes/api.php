<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecepController;
use App\Http\Controllers\ArticelController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/me', [AuthenticationController::class, 'me']);
    Route::post('/articels', [ArticelController::class, 'store']);
    Route::patch('/articels/{id}', [ArticelController::class, 'update'])->middleware('pemilik-artikel');
    Route::delete('/articels/{id}', [ArticelController::class, 'destroy'])->middleware('pemilik-artikel');
    Route::post('/receps', [RecepController::class, 'store']);
    Route::patch('/receps/{id}', [RecepController::class, 'update'])->middleware('pemilik-recep');
    Route::delete('/receps/{id}', [RecepController::class, 'destroy'])->middleware('pemilik-recep');

    Route::post('/comment', [CommentController::class, 'store']);
    Route::patch('/comment/{id}', [CommentController::class, 'update'])->middleware('pemilik-komentar');
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->middleware('pemilik-komentar');
});


Route::get('/receps',[RecepController::class, 'index']);
Route::get('/receps/{id}',[RecepController::class, 'show']);

Route::get('/articels',[ArticelController::class, 'index']);
Route::get('/articels/{id}',[ArticelController::class, 'show']);

Route::post('/login', [AuthenticationController::class, 'login']);
