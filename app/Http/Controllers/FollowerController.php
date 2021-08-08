<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function index()
    {
        return view('profile.followers.index', [
            'followers' => auth()->user()->followers()->paginate(10)
        ]);
    }

    public function store(User $user)
    {
        $result = auth()->user()->followers()->toggle($user);

        $message = empty($result['attached']) ? 'removed' : 'added';

        return redirect()->back()->with('success', 'Follower '. $message);
    }
}
