<?php

namespace App\Http\Controllers;

class BookmarkController extends Controller
{
    public function index()
    {
        return view('posts.bookmarks.index', [
            'posts' => auth()->user()->bookmarks()->paginate(10)
        ]);
    }
}
