<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'user' => auth()->user()
        ]);
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
