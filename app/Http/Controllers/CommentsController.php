<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        // Using validation
        $this->validate($request, [
            'body' => 'required',
            'post_id' => 'required',
        ]);

        // Create comment
        $comment = new Comment;
        $comment->body = $request->input('body');
        $comment->user_id = Auth::id();
        $postId = $request->input('post_id');
        $comment->post_id = $postId;
        $comment->vote = $request->input('vote');
        $comment->save();

        // Redirection
        return redirect(route('posts.view', $postId));
        //->with('success', 'Comment added successfully.');
    }
}
