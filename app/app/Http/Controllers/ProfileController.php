<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\InfoRequest;
use App\Models\Interest;
use App\Models\UserInfo;
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

    public function edit_info(InfoRequest $request)
    {
        $user = Auth::user();
        $user->info()->update($request->only([
            'height',
            'weight',
            'hair_color',
            'boobs_size',
            'ass_girth',
            'waistline',
            'dick_length',
            'goal_here']));

        return redirect()->back()->with('status-info', 'Профіль оновлено успішно!');

    }
}
