<?php

use App\Http\Controllers\Admin\PostController;
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

Route::get('/posts', [PostController::class, 'index'])->name('admin.posts.index');

Route::get('/posts/create', [PostController::class, 'create'])->name('admin.posts.create');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('admin.posts.show');

Route::post('/posts', [PostController::class, 'store'])->name('admin.posts.store');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');

Route::put('/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
