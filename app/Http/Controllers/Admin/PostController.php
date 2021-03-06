<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $data = ['posts' => $posts];

        return view('admin.post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $data = ['tags' => $tags];

        return view('admin.post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'title' => 'required|unique:posts|max:150',
            'content' => 'required'
        ]);

        /* recupero dell'id dell'utente validato */
        $id = Auth::id();
        /* dd($data); */

        $newPost = new Post();
        $newPost->user_id = $id;
        $newPost->slug = Str::slug($data['title']);
        /* immagini - public/storage/post_covers è la cartella in cui verranno salvate */
        $newPost->cover = Storage::put('post_covers', $data['image']);
        /* / */
        $newPost->fill($data);
        $newPost->save();

        if (array_key_exists('tags' , $data)) {
            $newPost->tags()->sync($data['tags']);
        }

        return redirect()->route('post.index')->with('status', 'Record added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $tags = $post->tags;
        $data = [
            'post' => $post, 
            'tags' => $tags
        ];

        return view('admin.post.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ($post) {
            $tags = Tag::all();
            $data = [
                'post' => $post,
                'tags' => $tags
            ];

            return view('admin.post.edit', $data);
        }

        abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        $request->validate([
            'title' => 'required|max:150',
            'content' => 'required'
        ]);

        if ($data['title'] != $post->title) {
            $request->validate([
                'title' => 'required|unique:posts|max:150'
            ]);
        }
        
        if ($data['title'] != $post->title) {
            $data['slug'] = Str::slug($data['title']);
        }

        if (array_key_exists('image' , $data)) {
            $data['cover'] = Storage::put('post_covers', $data['image']);            
        }

        $post->update($data);

        if (array_key_exists('tags' , $data)) {
            $post->tags()->sync($data['tags']);
        }

        return redirect()->route('post.show', $post)->with('status', 'Record updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->sync([]);

        $post->delete();

        return redirect()->route('post.index')->with('status', 'Record deleted');
    }
}
