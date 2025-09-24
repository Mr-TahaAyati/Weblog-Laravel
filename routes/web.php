<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Admin\User\UserController;

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


Route::get('/', [BlogController::class, 'Blog'])->name('blog');
Route::get('/Read-More/{id}', [BlogController::class, 'read'])->name('read');


Route::middleware(['auth', 'can:admin-only'])->prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::post('/status{category}', [CategoryController::class, 'status'])->name('admin.category.status');
        Route::delete('/delete{category}', [CategoryController::class, 'delete'])->name('admin.category.delete');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('/update/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
    });
    Route::middleware('auth', 'can:modir-only')->prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::post('/status{user}', [UserController::class, 'status'])->name('admin.user.status');
        Route::delete('/delete{user}', [UserController::class, 'delete'])->name('admin.user.delete');
    });

    Route::prefix('post')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('admin.post.index');
        Route::get('/create', [PostController::class, 'create'])->name('admin.post.create');
        Route::post('/store', [PostController::class, 'store'])->name('admin.post.store');
        Route::post('/status{post}', [PostController::class, 'status'])->name('admin.post.status');
        Route::delete('/delete{post}', [PostController::class, 'delete'])->name('admin.post.delete');
        Route::get('/edit/{post}', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::put('/update/{post}', [PostController::class, 'update'])->name('admin.post.update');
    });
});

Route::prefix('auth')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/registerSubmit', [AuthController::class, 'registerSubmit'])->name('auth.register_submit');

    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/loginSubmit', [AuthController::class, 'loginSubmit'])->name('auth.login_submit');

    Route::get('/forgetPassword', [AuthController::class, 'forgetPassword'])->name('auth.forget_password');
    Route::post('/forgetSubmit', [AuthController::class, 'forgetSubmit'])->name('auth.forget_submit');
    Route::get('/', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('auth.profile')->middleware('auth');
});
