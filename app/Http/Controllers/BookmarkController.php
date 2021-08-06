<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BookmarkController extends Controller
{
    public function index()
    {
        return view('posts.bookmarks.index', [
            'posts' => auth()->user()->bookmarks()->paginate(10)
        ]);
    }

    /**
     * Bookmark post
     *
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Post $post)
    {
        auth()->user()->bookmarks()->toggle($post);

        return redirect()->back()->with('success', 'Bookmark added/removed');
    }
}
