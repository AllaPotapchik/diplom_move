<?php

namespace App\Http\Controllers;

use App\Models\User_subscription;
use App\Models\Users_tariff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User_subscriptionController extends Controller {
    public function createSubscription( Request $request ) {
        $id                = Auth ::id();
        $have_subscription = DB ::table( 'user_subscriptions' )
                                -> where( 'user_id', $id )
                                -> where( 'subscription_id', $request -> sub_id )
                                -> first();
        $count             = DB ::table( 'subscriptions' )
                                -> where( 'id', $request -> sub_id )
                                -> first();
//        dd($count->subscription_count);
        if ( $have_subscription ) {
            return redirect( '/success' ) -> withSuccess( 'У вас ужесть данный абонемент' );
        } else {
            DB ::table( 'user_subscriptions' ) -> insert( [
                [
                    'user_id'         => $id,
                    'subscription_id' => $request -> sub_id,
                    'dance_type_id'   => $request -> dance_type,
                    'level_id'        => $request -> level_id,
                    'available_count'       => $count->subscription_count

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

        return redirect( '/success' ) -> withSuccess( 'New student was added' );
    }
}
