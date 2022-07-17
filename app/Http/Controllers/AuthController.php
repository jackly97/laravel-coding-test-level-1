<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function signIn(LoginRequest $request, AuthService $authService)
    {
        return $authService->signIn($request);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('status', 'Success Logout');
    }
}
