<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function store(LoginRequest $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']), $request->filled('remember'))) {
            return back()->withErrors([
                'email' => '認証に失敗しました',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('/dashboard');
    }
}
