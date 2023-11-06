<?php

use App\Http\Controllers\LikesController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php'; //this should be here not on the bottom (try to put in the bottom)

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(PostController::class)->middleware('auth')->group(function(){
    Route::get('/', 'index')->name('home_page');
    Route::get('/p/create', 'create')->name('create_post');
    Route::post('/p/create', 'store')->name('store_post');
    Route::get('/p/{post:slug}', 'show')->name('show_post');
    Route::get('/p/{post:slug}/edit', 'edit')->name('edit_post');
    Route::patch('/p/{post:slug}/update', 'update')->name('post_update');
    Route::post('/p/{post:slug}/delete', 'destroy')->name('post_delete');
});


Route::post('/p/{post:slug}/comment', [PostCommentController::class, 'store'])->name('store_comment')->middleware('auth');

Route::get('/explore', [PostController::class, 'explore'])->name('explore');
Route::get('/{user:username}', [UserController::class, 'index'])->name('user_profile');
Route::get('/{user:username}/edit', [UserController::class, 'edit'])->middleware('auth')->name('edit_profile');
Route::patch('/{user:username}/update', [UserController::class, 'update'])->middleware('auth')->name('update_profile');

Route::get('/p/{post:slug}/likes', [LikesController::class, 'like'])->middleware('auth')->name('like_post');

Route::get('/{user:username}/follow', [UserController::class, 'follow'])->middleware('auth')->name('follow_user');
Route::get('/{user:username}/unfollow', [UserController::class, 'unfollow'])->middleware('auth')->name('unfollow_user');
