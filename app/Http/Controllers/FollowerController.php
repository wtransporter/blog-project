<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowerController extends Controller
{
    public function store(User $user)
    {
        $result = auth()->user()->followers()->toggle($user);

        $message = empty($result['attached']) ? 'removed' : 'added';

        return redirect()->back()->with('success', 'Follower '. $message);
    }
}
