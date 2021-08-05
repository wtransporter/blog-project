<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;

class AdminPostController extends Controller
{
    public function create()
    {
        return view('posts.create');
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
