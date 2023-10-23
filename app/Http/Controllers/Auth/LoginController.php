<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginPage()
    {
        if (auth()->check()) {
            return back();
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'         =>          ['required', 'email', 'max:255'],
            'password'      =>          ['required', 'max:255']
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect('/posts');
        }

        return back()->withInput()->with('error', 'Invalid Credentials')->withErrors(['email' => ' ', 'password' => ' ']);
    }
}
