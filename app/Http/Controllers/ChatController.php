<?php

namespace App\Http\Controllers;

use App\Filters\UserFilter;
use App\Models\Interest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChatController extends Controller
{

    public function allChats()
    {
        return view('chats');
    }
}
