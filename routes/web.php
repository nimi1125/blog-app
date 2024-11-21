<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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

Route::get('/', [PostController::class, 'home'])->name('home');

Route::get('/mypage', [PostController::class, 'mypage'])
    ->middleware(['auth', 'verified'])
    ->name('mypage');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
Route::get('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);

Route::get('/blog', function () {
    return view('welcome');
});

Route::get('blog/detail/{id}', [PostController::class, 'show'])->name('detail');
Route::post('blog/detail/{id}', [CommentController::class, 'store'])->name('comment.store');

Route::get('/write', [PostController::class, 'create'])->name('write');
Route::post('/write', [PostController::class, 'store'])->name('store');

Route::get('/myblog', function () {
    return view('layouts.myblog');
});

require __DIR__.'/auth.php';