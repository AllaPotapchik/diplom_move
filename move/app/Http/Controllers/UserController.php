<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {
    public function accountType() {

        $date = new DateTime();

        $user = DB ::table( 'users' )
                   -> where( 'id', Auth ::id() )
                   -> select( '*' )
                   -> first();

        $user_orders = DB ::table( 'records' ) -> where( 'user_id', Auth ::id() )
                          -> join( 'schedule', 'records.schedule_id', 'schedule.id' )
                          -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                          -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                          -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
//            -> where( 'time', '>', $date -> format( "H:i:s" ) )

                          -> where( 'date', '>', $date )
                          -> select( '*' )
                          -> get();

        $user_programs = DB ::table( 'users_tariffs' ) -> where( 'user_id', Auth ::id() )
                            -> join( 'programs', 'users_tariffs.program_id', 'programs.program_id' )
                            -> whereIn( 'users_tariffs.tariff_type', [ 2, 3 ] )
                            -> select( '*' )
                            -> get();

        $user_type = DB ::table( 'users' ) -> where( 'id', Auth ::id() )
                        -> select( 'users.user_type' )
                        -> get();

        $user_subscriptions = DB ::table( 'user_subscriptions' )
                                 -> where( 'user_id', Auth ::id() )
                                 -> join( 'subscriptions', 'user_subscriptions.subscription_id', 'subscriptions.id' )
                                 -> join( 'dance_types', 'user_subscriptions.dance_type_id', 'dance_types.dance_type_id' )
                                 -> join( 'levels', 'user_subscriptions.level_id', 'levels.level_id' )
                                 -> select( '*' ) -> get();


        foreach ( $user_type as $el ) {
            if ( $el -> user_type == 0 ) {
                return view( 'account', [
                    'user'               => $user,
                    'user_orders'        => $user_orders,
                    'user_programs'      => $user_programs,
                    'user_subscriptions' => $user_subscriptions
                ] );

            } else if ( $el -> user_type == 1 ) {
                return view( 'admin_panel', [
                    'user' => $user
                ] );

            } else if ( $el -> user_type == 2 ) {
                return view( 'teacher_panel', [
                    'user' => $user
                ] );
            }
        }
    }

    public function updateProfile( $user_id, Request $request ) {

        $validator = Validator ::make( $request -> all(), [
            'user_name'  => [ 'required', 'string', 'max:255', 'min:3', 'regex:/^[А-ЯЁA-Z][а-яёA-Za-z]+$/' ],
            'user_email' => [ 'required', 'string', 'email', 'max:255', 'unique:users', 'min:4' ],
            'user_phone' => [ 'required' ],
        ] );

        DB ::table( 'users' ) -> where( 'id', $user_id )
           -> update( [
               'name'  => $request -> user_name,
               'email' => $request -> user_email,
               'phone' => $request -> user_phone,
           ] );

        return redirect() -> back() -> with( 'success', 'Изменения внесены' );
    }

    public function changePassword( Request $request ) {
        $user = User ::find( Auth ::id() );
        if ( Hash ::make( $request -> old_user_password ) == $user->password){
            DB::table('users')->where('id', Auth::id())
                ->update(['password'=>Hash ::make( $request ->new_user_password )]);
        }

        return redirect() -> back() -> with( 'success', 'Пароль изменен' );
    }

}
