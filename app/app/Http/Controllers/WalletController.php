<?php

namespace App\Http\Controllers;

use App\Http\Requests\WalletRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user){
            return redirect()->back()->with('status', 'user not found');
        }
        return view('wallet', compact('user'));
    }

    public function deposit(WalletRequest $request)
    {
        $user = Auth::user();

        if (!$user){
            return redirect()->back()->with('status', 'user not found');
        }

//        $amount =  $user->wallet->amount;
//        $user->wallet()->update(['amount' => $amount + $request->amount]);
        $user->wallet()->increment('amount', $request->amount);

        return redirect()->back()->with('status', "Ваш гаманець попопвнеено на $request->amount");

    }
}
