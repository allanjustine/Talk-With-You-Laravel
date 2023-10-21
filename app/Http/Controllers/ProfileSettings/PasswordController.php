<?php

namespace App\Http\Controllers\ProfileSettings;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function passwordPage(User $user)
    {

        $user = auth()->user();

        return view('pages.profile_settings.password', compact('user'));
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'current_password'         =>          ['required', 'max:255'],
            'password'                 =>          ['required', 'max:255', 'confirmed'],
            'password_confirmation'    =>          ['required', 'max:255']
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user->update([
            'password'                 =>          bcrypt($request->password)
        ]);

        return back()->with('message', 'Your password was updated successfully');
    }
}
