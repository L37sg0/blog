<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy(
            'created_at',
            'desc'
        )->paginate(5);

        return view(
            'posts.index',
            compact('posts')
        );
    }


    public function show(int $id)
    {
        $post = Post::find($id);

        return view(
            'posts.show')
            ->with('post', $post);
    }

    public function create()
    {
        $userId = Auth::id();
        return view(
            'posts.create',
            compact('userId')
        );
    }

    public function store(Request $request)
    {
        // Using validation
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        // Create post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = Auth::id();
        $post->vote = $request->input('vote');
        $post->save();

        // Redirection
        return redirect(route('posts.posts'));
            //->with('success', 'Post added successfully.');
    }
}
