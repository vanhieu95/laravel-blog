<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $posts = Post::latest()->with(['author', 'category'])->get();
    // $posts = Post::all();

    return view('posts', [
        'posts' => $posts
    ]);
})->name('posts.index');

Route::get('posts/{post}', function (Post $post) {
    // Route::get('posts/{post:slug}', function (Post $post) { // Post::where('slug', $post)->firstOrFail();
    // Find a post by its slug and pass it to a view called "post"
    return view('post', ['post' => $post]);
})->where('post', '[A-z0-9_\-]+')->name('posts.show');

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts->load(['author', 'category'])
    ]);
})->name('categories.posts');

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts->load(['author', 'category'])
    ]);
})->name('authors.posts');
