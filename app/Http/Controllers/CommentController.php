<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:255'
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = auth()->id();
        $comment->post_id = $post->id;
        $comment->save();

        return redirect()->route('posts.show', $post->id)->with('success', 'Comment created.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        $post = $comment->post_id;
        return redirect()->route('posts.show', $post)->with('success', 'Comment deleted successfully.');
    }
}
