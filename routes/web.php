<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
    return view('posts.index', [
        'posts' => Post::latest()->with('category', 'author')->get()
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {
    return view('posts.show', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function(Category $category) {
    return view('posts.index', [
        'posts' => $category->posts->load('category', 'author'),
        'selectedCategory' => $category
    ]);
});

Route::get('authors/{author:username}', function(User $author) {
    return view('posts.index', [
        'posts' => $author->posts->load('category', 'author')
    ]);
});
