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
//        $peoples = User::query()->where('id', '!=', Auth::id())->paginate(3);


//        dd($peoples[1]->interests);
//        $peoples = User::query()->where('id', '!=', Auth::id())->paginate(3)->filter($filter)->get();
        $peoples = User::filter($filter)->where('id', '!=', Auth::id())->paginate(3)->withQueryString();
//        $peoples = User::filter($filter)->where('id', '!=', Auth::id())->toSql();


//        dd($peoples);

        return view('search', compact('peoples'));
    }


    public function userProfile(User $user)
    {

//        dd(23423);
        return view('user-profile', compact('user'));
    }

}
