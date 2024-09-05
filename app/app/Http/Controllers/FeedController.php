<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Feed;
use App\Models\PayedContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class FeedController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('feed', compact('user'));
    }

    public function create(Request $request)
    {
        $user = Auth::user();

        $data = [
            'user_id' => $user->id,
            'text' => $request->text,
            'price' => $request->price,
        ];

        if ($request->file()) {
            $data['content'] = substr($request->file('content')->store('public'), 7);
        }

        Feed::query()->create($data);

        return redirect()->back()->with('status', 'Запис додано');
    }

    public function delete($feedId)
    {
        $feed = Feed::query()->where(['id' => $feedId])->first();
        if ($feed->content) {
            File::delete(public_path() . '/storage/' . $feed->content);
        }

        $feed->delete();
        return redirect()->back()->with('status', 'Запис видалено');
    }

    public function pay(Request $request)
    {


        $feed = Feed::query()->find($request->feedId);
        $user = \auth()->user();

        if (!$feed) {
            return redirect()->back()->with('error', 'not found');
        }

        if ($feed->user_id == $user->id) {
            return redirect()->back()->with('error', 'ne');
        }

        if ($feed->price > $user->wallet->amount) {
            return redirect()->back()->with('error', 'malo babla');
        }

        try {
            DB::beginTransaction();
            $user->wallet()->decrement('amount', $feed->price);
            PayedContent::query()->create(['user_id' => $user->id, 'feed_id' => $feed->id]);
            $feed->user->wallet()->increment('amount', $feed->price);
            DB::commit();
        } catch (\Exception $e) {

            dd($e);


            report($e);
            DB::rollBack();
        }


        return redirect()->back();
    }
}
