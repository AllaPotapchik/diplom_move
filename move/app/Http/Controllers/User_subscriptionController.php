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
    public function changePrice( $id, $percent ) {
        $subscription = DB ::table( 'subscriptions' ) -> where( 'id', $id ) -> first();
        $new_price    = $subscription -> subscription_price * $percent * 0.1;

        $dance_types  = Dance_type ::all();
        $levels       = Level ::all();
        $user_id      = Auth ::id();
        $user         = DB ::table( 'users' ) -> find( $user_id );
        $subscription = DB ::table( 'subscriptions' ) -> where( 'id', $id ) -> first();


        if ( $subscription -> coefficient * $subscription -> subscription_price <= $user -> point_balance ) {
            $percent = 10;
            $cost    = $subscription -> coefficient * $subscription -> subscription_price;
        } elseif ( $subscription -> coefficient * $subscription -> subscription_price * 2 <= $user -> point_balance ) {
            $percent = 20;
            $cost    = $subscription -> coefficient * $subscription -> subscription_price * 2;

        } elseif ( $subscription -> coefficient * $subscription -> subscription_price * 3 <= $user -> point_balance ) {
            $percent = 30;
            $cost    = $subscription -> coefficient * $subscription -> subscription_price * 3;
        }

        return view( '/create_sub', [
            'dance_types'  => $dance_types,
            'levels'       => $levels,
            'user'         => $user,
            'user_id'      => $user_id,
            'id'           => $id,
            'subscription' => $subscription,
            'percent'      => $percent,
            'new_price'    => $new_price,
            'cost'         => $cost
        ] );

    }

    public function usePoint( Request $request ) {
        $user_points = DB ::table( 'users' ) -> where( 'id', Auth ::id() ) -> first();

        $new_balance = $user_points -> point_balance - $request -> cost;
        DB ::table( 'users' ) -> where( 'id', Auth ::id() ) -> update( [
            'point_balance' => $new_balance
        ] );
//        dd($new_balance);
        $old_cost = DB ::table( 'subscriptions' ) -> where( 'id', $request -> sub_id ) -> first();
        $new_cost = $old_cost -> subscription_price - ( $old_cost -> subscription_price * ( $request -> percent * 0.01 ) );

        return response() -> json( [ 'success' => true, 'new_cost' => $new_cost, 'new_balance' => $new_balance ] );
    }

    public function createSubscription( Request $request ) {
        $id                  = Auth ::id();
        $have_subscription   = DB ::table( 'user_subscriptions' )
                                  -> where( 'user_id', $id )
                                  -> where( 'subscription_id', $request -> sub_id )
                                  -> first();
        $count               = DB ::table( 'subscriptions' )
                                  -> where( 'id', $request -> sub_id )
                                  -> first();
        $have_online_program = DB ::table( 'users_tariffs' )
                                  -> join( 'programs', 'users_tariffs.program_id', 'programs.program_id' )
                                  -> where( 'user_id', Auth ::id() )
                                  -> where( 'tariff_type', 3 )
                                  -> where( 'user_dance_type', '=', $request -> dance_type )
                                  -> where( 'level_id', '=', $request -> level_id )
                                  -> first();
        if ( $have_online_program ) {
            return redirect() -> back() -> with( 'error', 'У вас уже есть "Онлайн++" на данное направление и уровень' );
        } elseif ( $have_subscription ) {
            return redirect() -> back() -> with( 'error', 'У вас уже есть данный абонемент' );
        } else {
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
                ]
            ] );
        }

        return redirect() -> back() -> with( 'success', 'Абонемент приобретен' );
    }
}
