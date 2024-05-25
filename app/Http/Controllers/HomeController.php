<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {

//
//        $user = User::create([
//            'email' => 'fdgdfgdf@gmail.com',
//            'password' => Hash::make(1111),
//        ]);
//
//        dd($user);


        return view('home');
    }
}
