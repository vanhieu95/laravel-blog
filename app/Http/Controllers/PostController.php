<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::latest()->with(['author', 'category'])->get();
        // $posts = Post::all();
        $posts = Post::latest()->with(['author', 'category'])->filter(request(['search', 'author', 'category']))->paginate(6);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        // Route::get('posts/{post:slug}', function (Post $post) { // Post::where('slug', $post)->firstOrFail();
        // Find a post by its slug and pass it to a view called "post"
        return view('posts.show', ['post' => $post]);
    }
}
