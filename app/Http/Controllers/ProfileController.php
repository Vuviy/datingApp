<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $interests = Interest::all();

        return view('profile', compact('user', 'interests'));
    }

    public function edit(ProfileRequest $request)
    {

        $user = Auth::user();
        $user->update($request->only(['name', 'email', 'gender', 'age']));

        return redirect()->back()->with('status', 'Профіль оновлено успішно!');

    }
}
