<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StoreCommentRequest;

class PostCommentsController extends Controller
{
    /**
     * Store given comment to database
     *
     * @param Post $post
     * @param StoreCommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Post $post, StoreCommentRequest $request)
    {
        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => $request->body
        ]);

        return redirect("/posts/{$post->slug}")->with('success', 'Comment successfuly added.');
    }
}
