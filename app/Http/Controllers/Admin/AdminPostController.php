<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::latest()->paginate(10)
        ]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $attributes = $request->validated();

        if ($request->has('image')) {
            $attributes['image'] = $request->file('image')->store('posts');
        }

        $post->update($attributes);

        return redirect()->route('admin.posts.edit', $post)->with('success', 'Post updated successfully.');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store given post to database
     *
     * @param StorePostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePostRequest $request)
    {
        $attributes = $request->validated();
        $attributes['image'] = $request->file('image')->store('posts');

        auth()->user()->posts()->create($attributes);

        return redirect('/admin/posts/create')->with('success', 'Post successfully created.');
    }
}
