<?php

namespace App\Http\Controllers;

use App\Models\Dance_type;
use App\Models\Level;
use App\Models\User_subscription;
use App\Models\Users_tariff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User_subscriptionController extends Controller {

    public function usePoint( Request $request ) {
        $user_points = DB ::table( 'users' ) -> where( 'id', Auth ::id() ) -> first();

        if ( $request -> cost ) {
            $new_balance = $user_points -> point_balance - $request -> cost;
            DB ::table( 'users' ) -> where( 'id', Auth ::id() ) -> update( [
                'point_balance' => $new_balance
            ] );
            $old_cost = DB ::table( 'subscriptions' ) -> where( 'id', $request -> sub_id ) -> first();
            $new_cost = $old_cost -> subscription_price - ( $old_cost -> subscription_price * ( $request -> percent * 0.01 ) );
        } elseif ( $request -> program_cost ) {

            $new_balance = $user_points -> point_balance - $request -> program_cost;
            DB ::table( 'users' ) -> where( 'id', Auth ::id() ) -> update( [
                'point_balance' => $new_balance
            ] );
            $old_cost = DB ::table( 'programs' ) -> where( 'program_id', $request -> sub_id ) -> first();
            $new_cost = $old_cost -> price - ( $old_cost -> price * ( $request -> percent * 0.01 ) );
        }

        return response() -> json( [ 'success' => true, 'new_cost' => $new_cost, 'new_balance' => $new_balance ] );
    }

    public function createSubscription( Request $request ) {
        $id = Auth ::id();

        $have_subscription = DB ::table( 'user_subscriptions' )
                                -> where( 'user_id', $id )
                                -> where( 'subscription_id', $request -> sub_id )
                                -> where( 'dance_type_id', '=', $request -> dance_type )
                                -> where( 'level_id', '=', $request -> level_id )
                                -> first();

        $have_dance_type_and_level = DB ::table( 'users_tariffs' )
                                        -> where( 'user_id', $id )
                                        -> where( 'user_dance_type', '=', $request -> dance_type )
                                        -> where( 'users_tariffs.level_id', '=', $request -> level_id )
                                        -> where( 'tariff_type', 1 )
                                        -> first();

        $count               = DB ::table( 'subscriptions' )
                                  -> where( 'id', $request -> sub_id )
                                  -> first();

        $have_online_program = DB ::table( 'users_tariffs' )
                                  -> join( 'programs', 'users_tariffs.program_id', 'programs.program_id' )
                                  -> where( 'user_id', Auth ::id() )
                                  -> where( 'tariff_type', 3 )
                                  -> where( 'user_dance_type', '=', $request -> dance_type )
                                  -> where( 'users_tariffs.level_id', '=', $request -> level_id )
                                  -> first();

        if ( $have_online_program ) {
            return redirect() -> back() -> with( 'error', 'У вас уже есть "Онлайн++" на данное направление и уровень' );
        } elseif ( $have_subscription ) {
            return redirect() -> back() -> with( 'error', 'У вас уже есть данный абонемент' );
        } elseif ($have_dance_type_and_level){
            return redirect() -> back() -> with( 'error', 'У вас уже есть абонемент с таким направлением и уровнем' );
        }
        else {
            DB ::table( 'user_subscriptions' ) -> insert( [
                [
                    'user_id'         => $id,
                    'subscription_id' => $request -> sub_id,
                    'dance_type_id'   => $request -> dance_type,
                    'level_id'        => $request -> level_id,
                    'available_count' => $count -> subscription_count

                ]
            ] );

            DB ::table( 'users_tariffs' ) -> insert( [
                [
                    'user_id'         => $id,
                    'user_dance_type' => $request -> dance_type,
                    'tariff_type'     => 1,
                    'start'           => null,
                    'end'             => null,
                    'is_check'        => false,
                    'level_id'        => $request -> level_id                ]
            ] );
        }

        return redirect() -> back() -> with( 'success', 'Абонемент приобретен' );
    }
}
