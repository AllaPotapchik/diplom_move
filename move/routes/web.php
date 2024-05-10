<?php

use App\Http\Controllers\Admin\AcceptController;
use App\Http\Controllers\admin\Dance_typeController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\Admin\ProgramsController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ReviewController;
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
    return view( 'home' );
} );


Route ::get( '/success', function () {
    return view( 'success' );
} );
Route ::get( '/home', [ App\Http\Controllers\HomeController::class, 'index' ] ) -> name( 'home' );
Route ::get( '/account', [ UserController::class, 'accountType' ] ) -> name( 'accountType' );

Route ::get( '/admin_panel', [HomeController::class,'index'] ) -> name( 'adminMain' );
Route::get('/accepts', [AcceptController::class,'showRecords'] )->name('all_accepts');
Route::get('/accept{id}', [AcceptController::class,'accept'] )->name('accept');

Route ::get( '/teacher_panel{user}', [TeacherController::class,'index'] ) -> name( 'teacherIndex' );

Route::get('/all_types', [Dance_typeController::class,'index'] )->name('all_types');
Route::get('/all_schedules', [ScheduleController::class,'index'] )->name('all_schedules');
Route::get('/all_users', [\App\Http\Controllers\Admin\UserController::class,'index'] )->name('all_users');
Route::get('/all_programs', [ProgramsController::class,'index'] )->name('all_programs');
Route::get('/all_teachers', [\App\Http\Controllers\Admin\TeacherController::class,'index'] )->name('all_teachers');
Route::get('/all_lessons', [\App\Http\Controllers\Admin\LessonController::class,'index'] )->name('all_lessons');

Route ::get( '/dance_types', [\App\Http\Controllers\Dance_typeController::class, 'index'])->name('dance_typeList');
Route ::get( '/tariffs/{dance_type_id}','App\Http\Controllers\TariffController@index')->name('chooseTariff');


Route ::get( '/schedule', 'App\Http\Controllers\ScheduleController@index' );
Route ::get( '/tariffs', 'App\Http\Controllers\TariffController@index' );
Route ::get( '/tariffs/offline/create_sub', 'App\Http\Controllers\TariffController@index' ) -> name( 'createSubscription' );
Route ::get( '/tariffs/offline/{id}/{dance_type_id}', [SubscriptionController::class,'getSubscription'] ) -> name( 'getSubscription' );
Route ::post( '/save', [ User_subscriptionController::class, 'createSubscription' ] ) -> name( 'createSubscription' );
Route ::get( '/tariffs/offline/{id}/{dance_type_id}/usePoint/{sub_id}', [ User_subscriptionController::class, 'usePoint' ] ) -> name( 'usePoint' );
Route ::get( '/subscriptions/{tariff_id}/{dance_type_id}', 'App\Http\Controllers\SubscriptionController@index' )-> name( 'subscriptions' );;
Route ::get( '/teachers', [TeacherController::class, 'teachersList'])->name('teachersList');
Route ::get( '/teachers{teacher_id}', [TeacherController::class, 'showTeacher'])->name('showTeacher');

Auth ::routes();

Route ::get( '/tariffs/program/{tariff_id}/{dance_type_id}', [ TariffController::class, 'programs' ] ) -> name( 'programs' );
Route ::get( '/tariffs/program/{tariff_id}/{dance_type_id}/{program_id}', [ProgramController::class,'showDetails']) -> name( 'showDetails' );
Route ::get( '/tariffs/program/create/{tariff_id}/{dance_type_id}/{program_id}/{level_id}', [ProgramController::class,'createProgramRecord']) -> name( 'createProgramRecord' );
Route ::get( '/account/program/{program_id}', [LessonController::class,'showLessons'] ) -> name( 'showLessons' );
Route ::get( '/account/program/{program_id}/{lesson_id}', [LessonController::class,'startLesson'] ) -> name( 'startLesson' );
Route::get('/end/{lesson_id}', [LessonController::class, 'endLesson'])->name('endLesson');
Route::post('/upload-video', [LessonController::class, 'uploadVideo'])->name('uploadVideo');

Route ::get( '/{schedule_id}', [ RecordController::class, 'createRecord' ] ) -> name( 'createRecord' );
Route ::get( '/delete/{record_id}/{schedule_id}', [ RecordController::class, 'deleteRecord' ] ) -> name( 'deleteRecord' );

Route::get('/update_profile/{user_id}', [UserController::class, 'updateProfile'])->name('updateProfile');
Route::post('/change_password', [UserController::class, 'changePassword'])->name('changePassword');
Route::get('/check/{lesson_id}/{user_id}', [TeacherController::class, 'showTask'])->name('showTask');

Route::post('/check', [TeacherController::class, 'checkTask'])->name('checkTask');
Route::post('/review', [ReviewController::class, 'makeReview'])->name('makeReview');

Route::get('/dance_type/{dance_type_id}', [\App\Http\Controllers\Dance_typeController::class, 'singleType'])->name('singleType');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('teacher_admin', \App\Http\Controllers\Admin\TeacherController::class);
Route::resource('dance_type_admin', Dance_typeController::class);
Route::resource('schedule_admin', ScheduleController::class);
Route::resource('user_admin', \App\Http\Controllers\Admin\UserController::class);
Route::resource('program_admin', ProgramsController::class);
Route::resource('lesson_admin', \App\Http\Controllers\Admin\LessonController::class);
