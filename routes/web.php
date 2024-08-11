<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\HomeController;
use App\Http\Controllers\InterestController;

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

    Route::get('/chats', [\App\Http\Controllers\ChatController::class, 'allChats'])->name('allChats');


    Route::post('/send_message' , [\App\Http\Controllers\ChatController::class, 'send_message'])->name('send_message');
    Route::post('/aaa' , [\App\Http\Controllers\ChatController::class, 'aaa'])->name('aaa');

//    aaaaa
//    aaaaa
//    aaaaa
//    Route::get('/__chats', [\App\Http\Controllers\ChatController::class, 'oldChats'])->name('oldChats');
//    Route::get('/kaka', [\App\Http\Controllers\ChatController::class, 'kaka'])->name('kaka');
//    aaaaa
//    aaaaa
//    aaaaa

});


Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/users/{user}/user-profile', [HomeController::class, 'userProfile'])->name('userProfile');



//Route::get('interests', [InterestController::class, 'index'])->name('interests.index');
//Route::post('interests', [InterestController::class, 'store'])->name('interests.store');
//Route::post('users/{user}/interests', [InterestController::class, 'attach'])->name('users.interests.attach');
Route::post('users/{user}/interests', [InterestController::class, 'addInterest'])->name('users.interests.add');
Route::delete('users/{user}/interests', [InterestController::class, 'detach'])->name('users.interests.detach');


Route::get('interests/autocomplete', [InterestController::class, 'autocomplete'])->name('interests.autocomplete');
