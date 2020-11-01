<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy(
            'created_at',
            'desc'
        )->paginate(4);

        return view(
            'dashboard',
            compact('posts')
        );
    }
}
