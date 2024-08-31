<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Interest;
use App\Models\Offer;
use App\Models\OfferRespond;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::all();

        foreach ($offers as $offer){
            $offer['disable'] = false;
            $responds = $offer->responds()->where('user_id', \auth()->id())->count();

           if ($responds || $offer->user_id == auth()->id()){
               $offer['disabled'] = 'disabled';
           }

        }

        return view('offers', compact('offers'));
    }

    public function myOffers($id)
    {

        $offers = Offer::query()->where('user_id', $id)->get();
        return view('my-offers', compact('offers'));
    }


    public function createForm()
    {
        return view('offer-create');

    }

    public function store(OfferRequest $request)
    {

        $data = $request->only(['name', 'description']);
        $data['user_id'] = \auth()->id();

       $offer = Offer::query()->create($data);

       if(!$offer){
           return redirect()->back()->withErrors('Something went wrong. Try again later');
       }

       return redirect()->route('myOffers', ['userId' => $data['user_id']]);
    }


    public function respond(Request $request)
    {

        $data = $request->only(['offer_id', 'comment']);
        $data['user_id'] = \auth()->id();

        $respond = OfferRespond::query()->create($data);

        if(!$respond){
            return redirect()->back()->withErrors('Something went wrong. Try again later');
        }
        return redirect()->back();
    }


    public function delete($id)
    {
        Offer::query()->where('id', $id)->delete();

        return redirect()->back();

    }
}
