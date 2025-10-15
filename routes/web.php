<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;

// Home Route
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/blog', [HomeController::class, 'index'])->name('frontend.blogs.index');
Route::get('/blog/{slug}', [HomeController::class, 'show'])->name('frontend.blogs.show');
Route::get('/about-us', [HomeController::class, 'about'])->name('frontend.about-us');


// USER ROUTES

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'home'])->name('dashboard');
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::resource('/posts', PostController::class);
    Route::resource('/comments', CommentController::class);



    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ADMIN ROUTES

Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('/posts', AdminPostController::class);
    Route::resource('/users', AdminUserController::class)->only(['index', 'destroy']);
    Route::resource('/categories', CategoryController::class);
    Route::get('/posts-trash', [AdminPostController::class, 'trash'])->name('posts.trash');
    Route::get('/posts-restore/{id}', [AdminPostController::class, 'restore'])->name('posts.restore');
    Route::delete('/posts-force-delete/{id}', [AdminPostController::class, 'forceDelete'])->name('posts.forceDelete');
});

require __DIR__ . '/auth.php';
