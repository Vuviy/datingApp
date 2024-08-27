<?php

namespace App\Http\Controllers;

use App\Events\StoreMessageEvent;
use App\Filters\UserFilter;
use App\Models\Chat;
use App\Models\Interest;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ChatController extends Controller
{

    function getLoggedInUsers()
    {
        $data =  DB::table(config('session.table'))
            ->distinct()
            ->select(['users.id'])
            ->whereNotNull('user_id')
            ->leftJoin('users', config('session.table') . '.user_id', '=', 'users.id')
            ->get();

        $response = [];

        foreach ($data as $item){
            $response[] = $item->id;
        }
        return $response;
    }

    function getActiveUsersInLastMinutes(int $minutes)
    {
        $data = User::query()->where('last_activity', '>', Carbon::now()->subMinutes($minutes)->getTimestamp())->get();

        $response = [];

        foreach ($data as $item){
            $response[] = $item->id;
        }
        return $response;
    }

    public function allChats()
    {

        $user  = \auth()->user();

        $userId = \request()->id;

        $checkChats1 = null;
        $checkChats2 = null;

        if($userId){
            $checkChats1 =  Chat::query()->where('sender_id', $user->id)->where('recipient_id', $userId)->first();
            $checkChats2 =  Chat::query()->where('recipient_id', $user->id)->where('sender_id', $userId)->first();
        }

        if (!$checkChats1 && !$checkChats2 && $userId){
            $newChat = Chat::query()->create(['sender_id' => $user->id, 'recipient_id' => $userId]);
        }


        $chats = $user->chats();
        $online = $this->getActiveUsersInLastMinutes(1);

        foreach ($chats as $chat){
            $chat['online'] = false;
            if ((in_array($chat->sender_id, $online) && \auth()->id() !== $chat->sender_id)  || (in_array($chat->recipient_id, $online) && \auth()->id() !== $chat->recipient_id)){
                $chat['online'] = true;

            }
        }

        $chat_id = isset($newChat) ? $newChat->id : null;

        if($checkChats1){
            $chat_id = $checkChats1->id;
        }

        if($checkChats2){
            $chat_id = $checkChats2->id;
        }

//        dd($chats);

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
