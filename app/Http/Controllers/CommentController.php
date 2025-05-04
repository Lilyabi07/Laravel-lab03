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
        //basic validation (not leaving a section empty)
        $validated = $request->validate([
            'commenter_name' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        // for saving a new comment
        $post = Post::findOrFail($postId);
 $post->comments()->create([
        'commenter_name' => $validated['commenter_name'],
        'comment' => $validated['comment'],
    ]);
        return redirect()->route('posts.show', $postId)
                         ->with('success', 'Comment added successfully!');
    }


}
