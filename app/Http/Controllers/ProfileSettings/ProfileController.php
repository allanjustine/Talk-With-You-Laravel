<?php

namespace App\Http\Controllers\ProfileSettings;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profilePage(User $user, Request $request)
    {

        $search = $request->search;

        $user = auth()->user();

        $userCount = User::count();

        return view('pages.profile_settings.profile', compact('user', 'search', 'userCount'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'              =>          ['required', 'max:255'],
            'bio'               =>          ['required', 'max:255'],
            'address'           =>          ['required', 'max:255'],
            'age'               =>          ['required', 'numeric'],
            'phone'             =>          ['required', 'numeric', 'digits:11', 'regex:/^09\d{9}$/'],
            'sex'               =>          ['required', 'max:255'],
            'bio'               =>          ['max:255'],
            'email'             =>          ['required', 'max:255', 'email', 'unique:users,email->ignore($request->user->id)']
        ]);

        $user->update([
            'name'              =>             $request->name,
            'bio'               =>             $request->bio,
            'address'           =>             $request->address,
            'age'               =>             $request->age,
            'phone'             =>             $request->phone,
            'sex'               =>             $request->sex,
            'bio'               =>             $request->bio,
            'email'             =>             $request->email
        ]);

        return back()->with('message', 'Your account was updated successfully');
    }
}
