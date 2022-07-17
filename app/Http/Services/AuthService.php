<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function signIn($request)
    {
        $user = User::where('email', $request->email)->first();

        if (empty($user)) {
            return redirect('login')->with('message', 'User not found');
        }

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect('/events');
            }
        }
        return redirect('login')->with('message', 'Invalid credentials');
    }

    public function signUp($request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('login')->with('status', 'Sign up successfully');
    }
}
