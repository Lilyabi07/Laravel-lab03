<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // GET /posts
    public function index()
    {
        $posts = Post::with('author')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    // GET /posts/{id}
    public function show($id)
    {
        $post = Post::with(['author', 'comments'])->findOrFail($id);
        return view('posts.show', compact('post'));
    }
}


