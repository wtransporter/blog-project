<?php

namespace App\Http\Controllers;

use App\Models\User;

class ToggleAdminController extends Controller
{
    public function store(User $user)
    {
        $user->is_admin = ! $user->is_admin;
        $user->save();

        return redirect()->route('profile.index')->with('success', 'User type changed.');
    }
}
