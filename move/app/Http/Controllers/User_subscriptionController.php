<?php

namespace App\Http\Controllers;

use App\Models\User_subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User_subscriptionController extends Controller {
    public function createSubscription( Request $request ) {
        $new_order = new User_subscription();

        $inputData                    = $request -> only( [ 'dance_type' ] );
        $id                           = Auth ::id();
        $new_order -> user_id         = $id;
        $new_order -> subscription_id = $request -> sub_id;
        $new_order -> dance_type_id   = isset( $inputData[ 'dance_type' ]);
        $new_order -> save();

        return redirect( '/success' ) -> withSuccess( 'New student was added' );
    }
}
