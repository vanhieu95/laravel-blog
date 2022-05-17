<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
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

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [PostController::class, 'show'])->where('post', '[A-z0-9_\-]+')->name('posts.show');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest')->name('register.create');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest')->name('register.store');

Route::get('login', [SessionController::class, 'create'])->middleware('guest')->name('session.login');
Route::post('login', [SessionController::class, 'store'])->middleware('guest')->name('session.store');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth')->name('session.logout');

//Route::get('categories/{category:slug}', function (Category $category) {
//    return view('posts', [
//        'posts' => $category->posts->load(['author', 'category']),
//        'currentCategory' => $category,
//        'categories' => Category::all()
//    ]);
//})->name('categories.posts');

//Route::get('authors/{author:username}', function (User $author) {
//    return view('posts', [
//        'posts' => $author->posts->load(['author', 'category']),
//        'categories' => Category::all()
//    ]);
//})->name('authors.posts');
