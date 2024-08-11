<?php

namespace App\Http\Controllers;

use App\Events\StoreMessageEvent;
use App\Filters\UserFilter;
use App\Models\Interest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChatController extends Controller
{



    public function aaa(Request $request)
    {

        return response()->json(['ddd' => 555]);
    }
    public function allChats()
    {

        $user  = \auth()->user();

        $chats = $user->chats();

        return view('chat', compact('chats'));
    }


    public function send_message(Request $request)
    {

        if ($request->body){

            $message = Message::query()->create([
                'user_id' => \auth()->id(),
                'chat_id' => $request->chat_id,
                'body' => $request->body,
            ]);

            $message->chat()->update(['id' => $request->chat_id]);

            broadcast(new StoreMessageEvent($message))->toOthers();

        return response()->json(['body' => $message->body, 'time' => $message->created_at->diffForHumans()]);
        }

        return response()->json(['error' => 'body empty']);

    }

    public function oldChats()
    {
        $user  = \auth()->user();

        $chats = $user->chats();

        return view('__chats', compact('chats'));
    }

    public function kaka()
    {
        return view('__kaka');
    }
}
