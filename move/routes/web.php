<?php

use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TariffController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\User_subscriptionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
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

Route ::get( '/', function () {
    return view( 'index' );
} );


Route ::get( '/success', function () {
    return view( 'success' );
} );


Route ::get( '/schedule', 'App\Http\Controllers\ScheduleController@index' );
Route ::get( '/tariffs', 'App\Http\Controllers\TariffController@index' );
Route ::get( '/tariffs/offline/create_sub', 'App\Http\Controllers\TariffController@index' ) -> name( 'createSubscription' );
Route ::get( '/tariffs/offline/{id}', [SubscriptionController::class,'getSubscription'] ) -> name( 'getSubscription' );
Route ::post( '/save', [ User_subscriptionController::class, 'createSubscription' ] ) -> name( 'createSubscription' );
Route ::get( '/subscriptions', 'App\Http\Controllers\SubscriptionController@index' );

Auth ::routes();
Route ::get( '/home', [ App\Http\Controllers\HomeController::class, 'index' ] ) -> name( 'home' );
Route ::get( '/account', [ UserController::class, 'accountType' ] ) -> name( 'accountType' );
Route ::get( '/{schedule_id}', [ RecordController::class, 'createRecord' ] ) -> name( 'createRecord' );
Route ::get( '/tariffs/program/{tariff_id}', [ TariffController::class, 'programs' ] ) -> name( 'programs' );
Route ::get( '/tariffs/program/{tariff_id}/{dance_type_id}/{program_id}', [ProgramController::class,'createProgramRecord'] ) -> name( 'createProgramRecord' );
Route ::get( '/account/program/{program_id}', [LessonController::class,'showLessons'] ) -> name( 'showLessons' );
Route ::get( '/account/program/{program_id}/{lesson_id}', [LessonController::class,'startLesson'] ) -> name( 'startLesson' );
Route::post('/upload-video', [LessonController::class, 'uploadVideo'])->name('uploadVideo');
Route::get('/update_profile/{user_id}', [UserController::class, 'updateProfile'])->name('updateProfile');
Route::post('/change_password', [UserController::class, 'changePassword'])->name('changePassword');
Route::get('/check/{lesson_id}/{user_id}', [TeacherController::class, 'showTask'])->name('showTask');
Route::post('/check', [TeacherController::class, 'checkTask'])->name('checkTask');
