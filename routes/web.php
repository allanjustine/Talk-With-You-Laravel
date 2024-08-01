<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileSettings\ProfileController;
use App\Http\Controllers\ProfileSettings\PasswordController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
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

// Route::get('/', [SiteController::class, 'index']);

Route::get('/login', [LoginController::class, 'loginPage']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [RegisterController::class, 'registerPage']);
Route::put('/register', [RegisterController::class, 'register'])->name('register');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/result/search', [PostController::class, 'search'])->name('search');

Route::get('/user/{user}/posts', [PostController::class, 'userPosts']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [SiteController::class, 'dashboard']);

    Route::get('/profile-settings/{user}', [ProfileController::class, 'profilePage']);
    Route::put('/profile-settings/{user}', [ProfileController::class, 'update'])->name('profile_settings.update');

    Route::get('/change-password/{user}', [PasswordController::class, 'passwordPage']);
    Route::put('/change-password/{user}', [PasswordController::class, 'updatePassword'])->name('change_password.update');

    Route::get('/users', [UserController::class, 'index']);
    Route::post('/posts', [PostController::class, 'store'])->name('post.store');
    Route::post('/posts/like', [LikeController::class, 'like'])->name('post.like');
    Route::delete('/posts/unlike/{like}', [LikeController::class, 'unlike'])->name('post.unlike');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.delete');
    Route::post('/posts/comment/{comment}', [CommentController::class, 'comment'])->name('post.comment');

    Route::get('/profile', [PostController::class, 'myPosts']);
    Route::put('/profile/{post}', [PostController::class, 'profilePostUpdate'])->name('post.profile.update');
});

Route::fallback(function () {
    // return redirect('https://paninastudio.com/wp-content/uploads/2024/05/maintence.gif');
    return redirect('http://122.53.61.91:4001');
});
