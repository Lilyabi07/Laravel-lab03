<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return redirect('/posts');             //view('welcome');
});

//OR, A cleaner route option-> Route::get('/', [PostController::class, 'index']);

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts/{id}/comments', [CommentController::class, 'store'])->name('comments.store');

