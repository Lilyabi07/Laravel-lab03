<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
class CommentController extends Controller
{

    // POST /posts/{id}/comments
    public function store(Request $request, $postId)
    {
        $validated = $request->validate([
            'commenter_name' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        $post = Post::findOrFail($postId);

        $post->comments()->create($validated);

        return redirect()->route('posts.show', $postId)
                         ->with('success', 'Comment added successfully!');
    }


}
