<?php

namespace App\Http\Controllers;

use App\Models\Dance_type;
use App\Models\Level;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller {
    public function index() {
        $subscription = Subscription ::all();

        return view( 'subscriptions', [
                'subscription' => $subscription,
            ]
        );
    }

    public function getSubscription($id) {
        $dance_types  = Dance_type ::all();
        $levels  = Level ::all();
        $user_id  = Auth::id();
        $user = DB::table('users')->find($user_id);

        return view( '/create_sub',[
            'dance_types'  => $dance_types,
            'levels'  => $levels,
            'user'  => $user,
            'user_id'  => $user_id,
            'id' => $id
        ] );
    }


}
