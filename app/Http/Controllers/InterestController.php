<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use App\Models\User;
use Illuminate\Http\Request;

class InterestController extends Controller
{


    public function addInterest(Request $request, User $user)
    {


        $existInterest = Interest::query()->where('name', $request->name)->first() ? Interest::query()->where('name', $request->name)->first()->id : null;

        $interestId = $request->interest_id ?: $existInterest;

        if(!$request->interest_id && !$interestId)
        {
            $interest = $this->store($request);
            $interestId = $interest->id;
        }
        $this->attach($interestId, $user);
        return redirect()->back();
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:interests,name',
        ]);

        $interest = Interest::create($request->all());

        return $interest;
    }


    public function attach(int $interest, User $user)
    {

        if(!$user->interests->contains('id', $interest))
        {
            $user->interests()->attach($interest);
        }

    }

    public function detach(Request $request, User $user)
    {

        $request->validate([
            'interest_id' => 'required|exists:interests,id',
        ]);

        $user->interests()->detach($request->interest_id);

        return redirect()->back();
    }


    public function autocomplete(Request $request)
    {

//        dd($request);


        $term = $request->get('term');

        $interests = Interest::where('name', 'LIKE', '%' . $term . '%')
            ->take(10)
            ->get(['id', 'name']);

        $results = [];

        foreach ($interests as $interest) {
            $results[] = [
                'id' => $interest->id,
                'value' => $interest->name
            ];
        }

        return response()->json($results);
    }
}
