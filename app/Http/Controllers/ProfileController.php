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

    /**
     * Update given user profile
     *
     * @param UpdateUserProfileRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
    * Delete the given user.
    *
    * @param User $user
    * @return \Illuminate\Http\RedirectResponse
    */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success', 'User successfully deleted.');
    }
}
