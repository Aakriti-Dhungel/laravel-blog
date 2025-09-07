<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\User\UserController as UserUserController;
use App\Http\Controllers\User\PostController as UserPostController;
use App\Http\Controllers\User\CommentController as UserCommentController;
use App\Http\Controllers\HomeController;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// USER ROUTES
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserUserController::class, 'home'])->name('dashboard');
    Route::resource('posts', UserPostController::class);
    Route::resource('/comments', UserCommentController::class);

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ADMIN ROUTES
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminUserController::class, 'index'])->name('dashboard');
    Route::resource('/posts', AdminPostController::class);

    // Admin Comments
    Route::get('/comments', [AdminCommentController::class, 'index'])->name('admin.comments.index');
    Route::delete('/comments/{comment}', [AdminCommentController::class, 'destroy'])->name('admin.comments.destroy');
});

require __DIR__ . '/auth.php';
