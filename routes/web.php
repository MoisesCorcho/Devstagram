<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', HomeController::class)->name('home');

// Autenticacion
Route::controller(RegisterController::class)->group(function () {
    Route::get('register', 'index')->name('register');
    Route::post('register', 'store');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login', 'store');
});

Route::post('logout', [LogoutController::class, 'index'])->name('logout');

// Profile Routes
Route::get('editar-perfil', [ProfileController::class, 'index'])->name('profile.index');
Route::post('editar-perfil', [ProfileController::class, 'store'])->name('profile.store');

// Posts
Route::controller(PostController::class)->group(function () {
    Route::get('{user:username}', 'index')->name('posts.index');
    Route::get('posts/create', 'create')->name('posts.create');
    Route::post('posts', 'store')->name('posts.store');
    Route::get('{user:username}/posts/{post}', 'show')->name('posts.show');
    Route::delete('posts/{post}', 'destroy')->name('posts.destroy');
});

Route::post('images', [ImageController::class, 'store'])->name('images.store');

Route::post('{user:username}/comments/{post}', [CommentController::class, 'store'])->name('comments.store');

Route::controller(LikeController::class)->group(function () {
    Route::post('posts/{post}/likes', 'store')->name('posts.likes.store');
    Route::delete('posts/{post}/likes', 'destroy')->name('posts.likes.destroy');
});

Route::post('{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('{user:username}/follow', [FollowerController::class, 'destroy'])->name('users.unfollow');






