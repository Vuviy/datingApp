<?php

namespace App\Http\Controllers;

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

    public function search()
    {
        $peoples = User::query()->where('id', '!=', Auth::id())->paginate(3);


//        dd($peoples[1]->interests);


        return view('search', compact('peoples'));
    }


    public function userProfile(User $user)
    {

//        dd(23423);
        return view('user-profile', compact('user'));
    }
}
