<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $data = ['posts' => $posts];

        return view('guest.post.index', $data);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $tags = $post->tags;
        $data = [
            'post' => $post,
            'tags' => $tags
        ];

        return view('guest.post.show', $data);
    }
}
