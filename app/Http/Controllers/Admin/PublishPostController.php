<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Controllers\Controller;

class PublishPostController extends Controller
{
    public function store(Post $post)
    {
        $post->publish();

        return redirect()->back();
    }
}
