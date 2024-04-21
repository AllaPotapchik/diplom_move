<?php

namespace App\Http\Controllers;

use App\Models\User_subscription;
use App\Models\Users_tariff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User_subscriptionController extends Controller {
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
                                  -> where( 'user_id', Auth ::id() )
                                  -> where( 'tariff_type', 3 )
                                  -> where( 'user_dance_type', '=', $request -> dance_type )
//                                  -> where( 'level_id', '=', $request -> level_id )
                                  -> first();
        if($have_online_program){
            return redirect() -> back() -> with( 'error','У вас уже есть "Онлайн++" на данное направление и уровень' );
        }
        elseif ( $have_subscription ) {
            return redirect() -> back() -> with( 'error','У вас уже есть данный абонемент' );
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
