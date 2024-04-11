<?php

use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TariffController;
use App\Http\Controllers\User_subscriptionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/account', function () {
    return view('account');
});
Route::get('/success', function () {
    return view('success');
});


Route::get('/schedule', 'App\Http\Controllers\ScheduleController@index');
Route::get('/tariffs', 'App\Http\Controllers\TariffController@index');
Route::get('/tariffs/offline/create_sub', 'App\Http\Controllers\TariffController@index')->name('createSubscription');
Route::get('/tariffs/offline/{id}', [SubscriptionController::class,'getSubscription'])->name('getSubscription');
Route::post('/save', [User_subscriptionController::class,'createSubscription'])->name('createSubscription');
Route::get('/subscriptions', 'App\Http\Controllers\SubscriptionController@index');
//Route::resource('subscription', User_subscriptionController::class);


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
