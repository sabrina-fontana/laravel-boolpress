<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Author;
use App\Tag;
use App\Mail\PostCreated;
use Illuminate\Support\Facades\Mail;

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
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $tags = Tag::all();
        return view('posts.create', compact('authors', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 'image' è il nome dell'input
        $path = $request->file('image')->store('public');
        $data = $request->all();
        $newPost = new Post();
        $newPost->fill($data);
        $newPost->image = $path;
        $newPost->save();

        Mail::to('sabfon@hotmail.it')->send(new PostCreated($newPost));

        $newPost->tags()->attach($data['tags']);
        return redirect()->route('posts.show', ['post' => $newPost]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $authors = Author::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'authors', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $post->update($data);
        foreach($data['tags'] as $tag) {
            if ($tag === null) {
                $post->tags()->detach();
            } else {
                $post->tags()->attach($data['tags']);
            }
        }
        return redirect()->route('posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // detach() per many to many ('belongsToMany')
        $post->tags()->detach();
        // delete() per one to many ('hasMany')
        $post->comment()->delete();
        // dissociate() per one to many ('belongsTo')
        $post->author()->dissociate();
        $post->delete();
        return redirect()->route('posts.index');
    }
}
