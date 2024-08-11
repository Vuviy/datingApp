<?php

namespace App\Http\Controllers;

use App\Events\StoreMessageEvent;
use App\Filters\UserFilter;
use App\Models\Chat;
use App\Models\Interest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ChatController extends Controller
{



    public function aaa(Request $request)
    {

        return response()->json(['ddd' => 555]);
    }
    public function allChats()
    {
        $user  = \auth()->user();

        $userId = \request()->id;

        $checkChats1 =  Chat::query()->where('sender_id', $user->id)->where('recipient_id', $userId)->first();
        $checkChats2 =  Chat::query()->where('recipient_id', $user->id)->where('sender_id', $userId)->first();


        if (!$checkChats1 && !$checkChats2){
            $newChat = Chat::query()->create(['sender_id' => $user->id, 'recipient_id' => $userId]);
        }



        $chats = $user->chats();

        $chat_id = isset($newChat) ? $newChat->id : null;

//        dd($chat_id);


        if($checkChats1){

//            dd($checkChats1);

            $chat_id = $checkChats1->id;
        }

        if($checkChats2){
            $chat_id = $checkChats2->id;
        }


        return view('chat', compact('chats'))->with('chat_id', $chat_id);
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
