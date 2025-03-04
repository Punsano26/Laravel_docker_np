<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

//router
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/message', [PostController::class, 'message'])->name('posts.message');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');