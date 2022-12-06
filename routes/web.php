<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\UserController;
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


Route::get('home', [HomeController::class, 'index']);
Route::get('login', [AuthController::class, 'loginView']);
Route::post('login', [AuthController::class, 'login'])->name('loginol');
Route::post('logout', [AuthController::class, 'logout'])->name('logoutol');

Route::prefix('kos')->group(function () {
    Route::get('/', [KosController::class, 'index']);
    Route::post('/', [KosController::class, 'add']);
    // Route::post('/{id}', [KosController::class, 'update']);
    Route::delete('/{id}', [KosController::class, 'delete'])->name('kos.delete');
});
Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    // Route::post('/', [UserController::class, 'add']);
    // Route::post('/{id}', [UserController::class, 'update']);
    // Route::delete('/{id}', [UserController::class, 'delete']);
});