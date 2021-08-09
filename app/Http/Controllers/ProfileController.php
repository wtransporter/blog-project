<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UpdateUserProfileRequest;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index', [
            'users' => User::paginate(10)
        ]);
    }

    public function edit(User $user)
    {
        Gate::authorize('update', $user);

        return view('profile.edit', compact('user'));
    }

    public function update(UpdateUserProfileRequest $request, User $user)
    {
        $attributes = $request->validated();

        if (is_null(request('password'))) {
            unset($attributes['password']);
        } else {
            $attributes['password'] = bcrypt($attributes['password']);
        }

        $user->update($attributes);

        return redirect()->route('profile.edit', $user)->with('success', 'Profile updated.');
    }
}
