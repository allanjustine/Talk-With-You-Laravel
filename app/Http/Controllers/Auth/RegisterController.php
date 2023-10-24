<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function registerPage()
    {
        if (auth()->check()) {
            return back();
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'                      =>          ['required', 'max:255'],
            'address'                   =>          ['required', 'max:255'],
            'age'                       =>          ['required', 'numeric'],
            'phone'                     =>          ['required', 'numeric', 'digits:11', 'regex:/^09\d{9}$/'],
            'sex'                       =>          ['required', 'max:255'],
            'email'                     =>          ['required', 'max:255', 'email', 'unique:users,email'],
            'password'                  =>          ['required', 'confirmed', 'max:20', 'min:6'],
            'password_confirmation'     =>          ['required', 'max:20', 'min:6'],
            'profile_image'             =>          ['max:10000']
        ]);

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');

            $imageFileName = Str::random(20) . '.' . $image->getClientOriginalExtension();

            $image->storeAs('images/profile_pictures', $imageFileName, 'public');

            $imagePath = 'images/profile_pictures/' . $imageFileName;
        } else {
            $imageURL = 'https://static.thenounproject.com/png/3237155-200.png';

            $fileName = Str::random(20) . '.jpg';

            $imageContents = file_get_contents($imageURL);

            Storage::disk('public')->put('/images/profile_pictures/' . $fileName, $imageContents);

            $imagePath = 'images/profile_pictures/' . $fileName;
        }

        $user = User::create([
            'profile_image'     =>             $imagePath,
            'name'              =>             $request->name,
            'address'           =>             $request->address,
            'age'               =>             $request->age,
            'phone'             =>             $request->phone,
            'sex'               =>             $request->sex,
            'email'             =>             $request->email,
            'password'          =>             bcrypt($request->password)
        ]);
        return back()->with('message', 'Account -' . $user->email . '- registered successfully');
    }
}
