<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        $posts = Post::where('status', true)->latest()->paginate(10);

        return view('posts.index', compact('posts', 'categories'));
    }

    // public function featuredPost()
    // {
    //     $posts = DB::table('posts')->take(2)->get();

    //     return view('posts.index', compact('posts'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);

        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $this->validate($request, [
           'title' => 'required',
           'slug' => 'required',
           'category_id' => 'required',
           'body' => 'required|min:10',
        ]);

        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'slug' => request('slug'),
            'category_id' => request('category_id'),
            'body' => request('body'),
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $categories = Category::all();

        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'category_id' => 'required',
            'body' => 'required|min:10',
            'status' => 'required',
         ]);

        $post->update([
            'title' => request('title'),
            'slug' => request('slug'),
            'category_id' => request('category_id'),
            'body' => request('body'),
            'status' => request('status'),
        ]);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
    }
}
