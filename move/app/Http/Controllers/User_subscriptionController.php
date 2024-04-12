<?php

namespace App\Http\Controllers;

use App\Models\User_subscription;
use App\Models\Users_tariff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User_subscriptionController extends Controller {
    public function createSubscription( Request $request ) {
        $id        = Auth ::id();
        DB ::table( 'user_subscriptions' ) -> insert( [
            [
                'user_id'         => $id,
                'subscription_id' => $request -> sub_id,
                'dance_type_id'   => $request -> dance_type,
            ]
        ] );

        DB ::table( 'users_tariffs' ) -> insert( [
            [
                'user_id'     => $id,
                'dance_type'  => $request -> dance_type,
                'tariff_type' => 0,
                'start'       => null,
                'end'         => null,
                'is_check'    => false,
            ]
        ] );


        return redirect( '/success' ) -> withSuccess( 'New student was added' );
    }
}
