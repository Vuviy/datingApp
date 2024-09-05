<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            \auth()->user()->update(['online' => 1]);
//            $user->update(['online' => 1]);
            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'Неправильна електронна пошта або пароль.',
        ])->onlyInput('email');
    }

    public function registerForm()
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        \auth()->user()->update(['online' => 0]);

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
