<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        return view('posts.index', [
            'posts' => Post::published()->filter(request(['search', 'category', 'author']))->with('category', 'author')->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        abort_if(! $post->published_at, 404);

        $post->increment('views');

        return view('posts.show', [
            'post' => $post->load('comments', 'comments.author')
        ]);
    }
}
