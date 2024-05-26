<?php

namespace App\Http\Controllers;

use App\Models\Dance_type;
use App\Models\Level;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\String\s;

class SubscriptionController extends Controller {
    public function index( $tariff_id, $dance_type_id ) {
        $subscription = Subscription ::all();

        return view( 'subscriptions', [
                'subscription'  => $subscription,
                'dance_type_id' => $dance_type_id,
                'tariff_id'     => $tariff_id
            ]
        );
    }

    public function getSubscription( $id, $dance_type_id ) {
        $dance_types  = Dance_type ::all();
        $levels       = Level ::all();
        $user_id      = Auth ::id();
        $user         = DB ::table( 'users' ) -> find( $user_id );
        $subscription = DB ::table( 'subscriptions' ) -> where( 'id', $id ) -> first();

        if ( $subscription -> coefficient * $subscription -> subscription_price * 3 <= $user -> point_balance ) {
            $percent = 30;
            $cost    = $subscription -> coefficient * $subscription -> subscription_price * 3;
        } elseif ( $subscription -> coefficient * $subscription -> subscription_price * 2 <= $user -> point_balance ) {
            $percent = 20;
            $cost    = $subscription -> coefficient * $subscription -> subscription_price * 2;

        } elseif ( $subscription -> coefficient * $subscription -> subscription_price <= $user -> point_balance ) {
            $percent = 10;
            $cost    = $subscription -> coefficient * $subscription -> subscription_price;

        } else {
            $percent = 0;
            $cost    = 0;
        }
        $cost_ten    = $subscription -> coefficient * $subscription -> subscription_price;
        $cost_twenty = $subscription -> coefficient * $subscription -> subscription_price * 2;
        $cost_thirty = $subscription -> coefficient * $subscription -> subscription_price * 3;

        return view( '/create_sub', [
            'dance_types'   => $dance_types,
            'levels'        => $levels,
            'user'          => $user,
            'user_id'       => $user_id,
            'id'            => $id,
            'subscription'  => $subscription,
            'percent'       => $percent,
            'new_price'     => '',
            'cost'          => $cost,
            'cost_ten'      => $cost_ten,
            'cost_twenty'   => $cost_twenty,
            'cost_thirty'   => $cost_thirty,
            'dance_type_id' => $dance_type_id

        ] );
    }


}
