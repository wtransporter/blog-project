<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
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

        $attributes['slug'] = Str::slug(request('title'));

        auth()->user()->posts()->create($attributes);

        return redirect('/admin/posts/create')->with('success', 'Post successfully created.');
    }
}
