<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }

    public function edit(ProfileRequest $request)
    {

        $user = Auth::user();
        $user->update($request->only(['name', 'email', 'gender', 'age']));

        return redirect()->back()->with('status', 'Профіль оновлено успішно!');
    }
}
