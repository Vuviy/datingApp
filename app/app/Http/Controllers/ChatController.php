<?php

namespace App\Http\Controllers;

use App\Events\StoreMessageEvent;
use App\Filters\UserFilter;
use App\Models\Chat;
use App\Models\Interest;
use App\Models\Message;
use App\Models\OfferRespond;
use App\Models\PayedContent;
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
        $data = DB::table(config('session.table'))
            ->distinct()
            ->select(['users.id'])
            ->whereNotNull('user_id')
            ->leftJoin('users', config('session.table') . '.user_id', '=', 'users.id')
            ->get();

        $response = [];

        foreach ($data as $item) {
            $response[] = $item->id;
        }
        return $response;
    }

    function getActiveUsersInLastMinutes(int $minutes)
    {
        $data = User::query()->where('last_activity', '>', Carbon::now()->subMinutes($minutes)->getTimestamp())->get();

        $response = [];

        foreach ($data as $item) {
            $response[] = $item->id;
        }
        return $response;
    }

    public function allChats()
    {
        $user = \auth()->user();

        $userId = \request()->id;

        $checkChats1 = null;
        $checkChats2 = null;

        if ($userId) {
            $checkChats1 = Chat::query()->where('sender_id', $user->id)->where('recipient_id', $userId)->first();
            $checkChats2 = Chat::query()->where('recipient_id', $user->id)->where('sender_id', $userId)->first();
        }

        if (!$checkChats1 && !$checkChats2 && $userId && $userId != $user->id) {
            $newChat = Chat::query()->create(['sender_id' => $user->id, 'recipient_id' => $userId]);
        }


        $chats = $user->chats();
        $online = $this->getActiveUsersInLastMinutes(1);

        foreach ($chats as $chat) {
            $chat['online'] = false;
            if ((in_array($chat->sender_id, $online) && \auth()->id() !== $chat->sender_id) || (in_array($chat->recipient_id, $online) && \auth()->id() !== $chat->recipient_id)) {
                $chat['online'] = true;

            }
        }

        $chat_id = isset($newChat) ? $newChat->id : null;

        if ($checkChats1) {
            $chat_id = $checkChats1->id;
        }

        if ($checkChats2) {
            $chat_id = $checkChats2->id;
        }

        if (\request()->respond) {
            $respond = OfferRespond::query()->find(\request()->respond);
            if ($respond && $respond->status == 1) {
                $message = Message::query()->create([
                    'user_id' => \auth()->id(),
                    'chat_id' => $chat_id,
                    'body' => 'Привіт, ти відгукнувся на мій запит. Тому я пишу тобу нахуй блять',
                ]);
                $respond->update(['status' => 2]);
            }

        }
        return view('chat', compact('chats'))->with('chat_id', $chat_id);
    }


    public function send_message(Request $request)
    {

        if ($request->body) {

            $chat = Chat::query()->find($request->chat_id);

            $messagesCount = $chat->messages()->where('user_id', \auth()->id())->count();


            if (env('FREE_MESSAGES') > $messagesCount) {
                $message = Message::query()->create([
                    'user_id' => \auth()->id(),
                    'chat_id' => $request->chat_id,
                    'body' => $request->body,
                ]);

                $message->chat()->update(['id' => $request->chat_id]);

                broadcast(new StoreMessageEvent($message))->toOthers();

                return response()->json(['body' => $message->body, 'time' => $message->created_at->diffForHumans()]);
            }

            $billing = 0;
            $recipient = null;

            if ($chat->sender->id == \auth()->id()) {
                $billing = $chat->recipient->billing->amount;
                $recipient = $chat->recipient;
            } else {
                $billing = $chat->sender->billing->amount;
                $recipient = $chat->sender;
            }

            $user = \auth()->user();

            if ($user->wallet->amount >= $billing) {

                try {
                    DB::beginTransaction();

                    $user->wallet()->decrement('amount', $billing);
                    $recipient->wallet()->increment('amount', $billing);

                    $message = Message::query()->create([
                        'user_id' => \auth()->id(),
                        'chat_id' => $request->chat_id,
                        'body' => $request->body,
                    ]);
                    $message->chat()->update(['id' => $request->chat_id]);

                    DB::commit();
                } catch (\Exception $e) {
                    report($e);
                    DB::rollBack();
                }

                broadcast(new StoreMessageEvent($message))->toOthers();

                return response()->json(['body' => $message->body, 'time' => $message->created_at->diffForHumans()]);

            }
            return response()->json(['error' => 'у вас недостатньо коштів щоб надсилати повідомлення цьому користувачу. поповніть свій рахунов і спробуйте знов'], 419);
        }

        return response()->json(['error' => 'body empty']);

    }

    public function oldChats()
    {
        $user = \auth()->user();

        $chats = $user->chats();

        return view('__chats', compact('chats'));
    }

    public function kaka()
    {
        return view('__kaka');
    }
}
