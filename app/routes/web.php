<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\OfferController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});



Route::middleware(['update_activity'])->group(function (){

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'loginForm')->name('loginForm');
        Route::post('/login','login')->name('login');
        Route::get('/register','registerForm')->name('registerForm');
        Route::post('/register','register')->name('register');
        Route::post('/logout','logout')->name('logout');
    });


    Route::middleware(['auth'])->group(function (){
        Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
        Route::post('/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('edit_profile');
        Route::post('/edit_info', [\App\Http\Controllers\ProfileController::class, 'edit_info'])->name('edit_info');

        Route::get('/chats', [\App\Http\Controllers\ChatController::class, 'allChats'])->name('allChats');

        Route::post('/send_message' , [\App\Http\Controllers\ChatController::class, 'send_message'])->name('send_message');


        Route::get('/feed/{userId}' , [\App\Http\Controllers\FeedController::class, 'index'])->middleware('own_feed')->name('feed');
        Route::post('/feed/create' , [\App\Http\Controllers\FeedController::class, 'create'])->name('create_feed');
        Route::post('/feed/delete/{feedId}' , [\App\Http\Controllers\FeedController::class, 'delete'])->middleware('own_feed')->name('delete_feed');
        Route::post('/feed/pay' , [\App\Http\Controllers\FeedController::class, 'pay'])->name('feed_pay');


        Route::get('wallet', [\App\Http\Controllers\WalletController::class, 'index'])->name('wallet');
        Route::post('wallet', [\App\Http\Controllers\WalletController::class, 'deposit'])->name('deposit');


        Route::get('billing', [\App\Http\Controllers\BillingController::class, 'index'])->name('billing');
        Route::post('set-billing', [\App\Http\Controllers\BillingController::class, 'setBilling'])->name('setBilling');

    });
//    Route::post('/gamno/{feedId}' , [\App\Http\Controllers\FeedController::class, 'gamno_pay'])->name('gamno_pay');


    Route::get('/search', [HomeController::class, 'search'])->name('search');
    Route::get('/users/{user}/user-profile', [HomeController::class, 'userProfile'])->name('userProfile');


    //Route::get('interests', [InterestController::class, 'index'])->name('interests.index');
    //Route::post('interests', [InterestController::class, 'store'])->name('interests.store');
    //Route::post('users/{user}/interests', [InterestController::class, 'attach'])->name('users.interests.attach');
    Route::post('users/{user}/interests', [InterestController::class, 'addInterest'])->name('users.interests.add');
    Route::delete('users/{user}/interests', [InterestController::class, 'detach'])->name('users.interests.detach');


    Route::get('interests/autocomplete', [InterestController::class, 'autocomplete'])->name('interests.autocomplete');




    Route::prefix('offers')->middleware(['auth'])->group(function (){
        Route::get('/', [OfferController::class, 'index'])->name('offers');
        Route::get('/create', [OfferController::class, 'createForm'])->name('createOffer');
        Route::post('/store', [OfferController::class, 'store'])->name('offers.store');
        Route::post('/respond', [OfferController::class, 'respond'])->name('offers.respond');
        Route::get('/{userId}', [OfferController::class, 'myOffers'])->middleware('own_offers')->name('myOffers');
        Route::get('/my-respond/{userId}', [OfferController::class, 'myRespond'])->middleware('own_offers')->name('myRespond');
        Route::post('/delete/{offerId}', [OfferController::class, 'delete'])->middleware('own_offers')->name('offers.delete');
        Route::post('/ignore', [OfferController::class, 'ignore'])->name('ignoreRespond');
    });

});

//Route::get('/', function (){
//    return 5;
//});
//Route::post('/tttt/{feedId}' , [\App\Http\Controllers\FeedController::class, 'gamno_pay'])->name('gamno_pay');

