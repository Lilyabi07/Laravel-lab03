<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;


//These define the URLs the app responds to:


Route::get('/', function () {
    return redirect('/posts');             //view('welcome');
});


Route::get('/posts', [PostController::class, 'index'])->name('posts.index'); // show all posts
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show'); // to show a single post
Route::post('/posts/{id}/comments', [CommentController::class, 'store'])->name('comments.store'); // this handles comment submissions

