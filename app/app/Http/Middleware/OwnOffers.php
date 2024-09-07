<?php

namespace App\Http\Middleware;

use App\Models\Offer;
use Closure;
use Illuminate\Http\Request;

class OwnOffers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $params = $request->route()->parameters();

        if(array_key_exists('userId', $params)){

            if (auth()->id() != $params['userId']) {
                return redirect()->route('home');
            }
        }

        if(array_key_exists('offerId', $params)){
            $offer = Offer::query()->where('id', $params['offerId'])->first();
            if (auth()->id() != $offer->user_id) {
                return redirect()->route('home');
            }
        }
        return $next($request);
    }
}
