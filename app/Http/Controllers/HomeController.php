<?php

namespace App\Http\Controllers;

use App\Filters\UserFilter;
use App\Models\Interest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function search(UserFilter $filter, Request $request)
    {

        $peoples = User::filter($filter)->where('users.id', '!=', Auth::id())->paginate(3)->withQueryString();

        return view('search', compact('peoples'));
    }


    public function userProfile(User $user)
    {
        return view('user-profile', compact('user'));
    }

}
