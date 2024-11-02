<?php

namespace App\Http\Controllers;

use App\Filters\UserFilter;
use App\Filters\UserFilterPerfect;
use App\Http\Requests\LookingForRequest;
use App\Http\Requests\OfferRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\FastDateInfo;
use App\Models\Interest;
use App\Models\Offer;
use App\Models\OfferRespond;
use App\Models\User;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FastDateController extends Controller
{
    public function index()
    {
        return view('fast-date.fast-date');
    }

    public function createForm($userId)
    {

        $user = \auth()->user();

        if ($userId == $user->id) {

            return view('fast-date.looking-for-create', compact('user'));
        }
        return redirect()->back();

    }

    public function myPerfect($userId)
    {

        $user = \auth()->user();

        if ($userId == $user->id) {

            $info = $user->fastDateInfo->toArray();

            $info['id'] = null;
            $info['user_id'] = null;
            $info['created_at'] = null;
            $info['updated_at'] = null;

            $filteredCriterie = array_filter($info, function ($item) {
                if ($item !== null) {
                    return $item;
                }
            });

            $items = [];

            $filter = new UserFilterPerfect($filteredCriterie);

            $peoples = User::filter($filter)->where('users.id', '!=', Auth::id())->get();


            foreach ($peoples as $people){
                $info = $people->fastDateInfo->toArray();

                $info['id'] = null;
                $info['user_id'] = null;
                $info['created_at'] = null;
                $info['updated_at'] = null;

                $filteredCriterie = array_filter($info, function ($item) {
                    if ($item !== null) {
                        return $item;
                    }
                });


                $filter = new UserFilterPerfect($filteredCriterie);

                $peoplesWhoLike = User::filter($filter)->get();

                $array = [];

                foreach ($peoplesWhoLike as $item){
                    $array[] = $item->id;
                }

                if (in_array($userId, $array)){
                    $items[] = $people;
                }

            }

//            dd($love);


//            $query = DB::table('users as u')->select(['u.id','u.name', 'u.age', 'u.gender', 'user_infos.height', 'user_infos.weight', 'user_infos.hair_color', 'user_infos.boobs_size', 'user_infos.ass_girth', 'user_infos.waistline', 'user_infos.dick_length', 'user_infos.goal_here',])->limit(10);
////            $query = User::query()->limit(10);
//
//            foreach ($filteredCriterie as $key => $value) {
//                if ($key == 'gender') {
//                    $query->where($key, $value);
//                }
//
//                if ($key == 'age') {
//                    $query->whereBetween($key, [$value -3, $value + 3]);
//                }
//
//                if ($key !== 'age' && $key !== 'gender') {
//                    $query->join('user_infos',  'u.id', '=',  'user_infos.user_id')
//                        ->where('user_infos.'. $key, $value);
//                }
//
//            }
//            if ($filteredCriterie) {
//                $query->where('post_status', $request->get('status'));
//            }
//
//            if ($request->filled('title')) {
//                $title = $request->get('title');
//                $query->where('post_title', 'like', "%$title%");
//            }
//            $items = $query->get();


//            dd($items);


//            dd($query->toSql());


            return view('fast-date.my-perfect', compact('user', 'items'));
        }
        return redirect()->back();

    }

    public function store(LookingForRequest $request)
    {

        $fastDateInfo = FastDateInfo::query()->where('user_id', \auth()->id())->update($request->only([
            'age',
            'gender',
            'height',
            'weight',
            'hair_color',
            'boobs_size',
            'ass_girth',
            'waistline',
            'dick_length',
            'goal_here']));


        if (!$fastDateInfo) {
            return redirect()->back()->withErrors('Something went wrong. Try again later');
        }

        return redirect()->back()->with('status-info', 'ми пошукаємо когось з такими даними але хз');
    }


    public function respond(Request $request)
    {

        $data = $request->only(['offer_id', 'comment']);
        $data['user_id'] = \auth()->id();

        $respond = OfferRespond::query()->create($data);

        if (!$respond) {
            return redirect()->back()->withErrors('Something went wrong. Try again later');
        }
        return redirect()->back();
    }


    public function ignore(Request $request)
    {

        $respond = OfferRespond::query()->find($request->respondId);

        if ($respond->offer->user_id !== \auth()->id()) {
            return redirect()->back()->withErrors('Something went wrong. Try again later');
        }

        if (!$respond) {
            return redirect()->back()->withErrors('$respond not found');
        }


        $respond->update(['status' => 3]);
//        dd($respond);

        return redirect()->route('myOffers', ['userId' => \auth()->id()]);


    }

    public function delete($id)
    {
        Offer::query()->where('id', $id)->delete();

        return redirect()->back();

    }
}
