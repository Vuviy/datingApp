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

        // Перевірка облікових даних
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Аутентифікація успішна
            $request->session()->regenerate();

            return redirect()->intended();
        }

        // Аутентифікація не вдалася
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
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/'); // Перенаправлення на головну сторінку або будь-яку іншу сторінку
    }
}
