<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillingRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user){
            return redirect()->back()->with('status', 'user not found');
        }

        return view('billing', compact('user'));
    }

    public function setBilling(BillingRequest $request)
    {
        $user = Auth::user();

        if (!$user){
            return redirect()->back()->with('status', 'user not found');
        }

        $user->billing()->update(['amount' => $request->amount]);

        return redirect()->back()->with('status', "Плату за повідомлення змінено на $request->amount");

    }
}
