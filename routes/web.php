<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

if (App::environment('production')) {
    URL::forceScheme('https');
}

Route::get("/", [ClusterController::class, 'index'])->name('show-home');

Route::prefix('/login')->group(function () {
    Route::get('/', [Auth\LoginController::class, 'index'])->name('show-login');
    Route::post('/', [Auth\LoginController::class, 'login'])->name('login');
});

Route::prefix('/register')->group(function () {
    Route::get('/', [Auth\RegisterController::class, 'index'])->name('show-register');
    Route::post('/', [Auth\RegisterController::class, 'register'])->name('register');
});

Route::prefix('/discussion')->middleware('auth')->group(function () {
    Route::get('/', [ThreadController::class, 'index'])->name('show-thread')->withoutMiddleware('auth');
    Route::get('/create', [ThreadController::class, 'create'])->name('create-thread');
    Route::post('/create', [ThreadController::class, 'store'])->name('store-thread');
    Route::get('/edit/{thread}', [ThreadController::class, 'edit'])->name('edit-thread');
    Route::patch('/edit/{thread}', [ThreadController::class, 'update'])->name('update-thread');
    Route::get('/{thread:slug}', [ThreadController::class, 'show'])->name('show-specific-thread')->withoutMiddleware('auth');
    Route::delete("/{thread}", [ThreadController::class, 'destroy'])->name('delete-thread');
});

Route::prefix('/request')->middleware('auth')->group(function () {
    Route::get('/', [RequestController::class, 'index'])->name('show-request');
    Route::get('/create', [RequestController::class, 'create'])->name('create-request');
    Route::post('/create', [RequestController::class, 'store'])->name('store-request');
    Route::get('/edit/{request}', [RequestController::class, 'edit'])->name('edit-request');
    Route::patch('/edit/{request}', [RequestController::class, 'update'])->name('update-request');
    Route::delete('/{request}', [RequestController::class, 'destroy'])->name('delete-request');
});

Route::post('/comment/{thread}', [CommentController::class, 'store'])->name("store-comment");

Route::get('/logout', [Auth\LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('/profile')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('show-profile');
    Route::patch('/', [UserController::class, 'update'])->name('update-profile');
});
