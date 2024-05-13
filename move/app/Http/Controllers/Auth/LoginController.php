<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this -> middleware( 'guest' ) -> except( 'logout' );
    }

    public function login( Request $request ) {
        $phone    = $request -> phone;
        $password = $request -> password;
        $user     = User ::where( 'phone', $phone ) -> first();

        if ( Hash ::check( $password,$user['password']) ) {
            if ( $user ) {
                if ( $user -> user_type == 2 ) {
                    Auth ::login( $user );

                    return redirect() -> route( 'adminMain' );
                } elseif ( $user -> user_type == 3 ) {
                    Auth ::login( $user );

                    return redirect() -> route( 'teacherIndex', $user );

                } else {
                    Auth ::login( $user );

                    return redirect() -> route( 'accountType', $user );
                }
            } else {
                return redirect() -> back() -> with( 'error', 'Неверный телефон' );
            }
        }
        else {
            return redirect() -> back() -> with( 'error', 'Неверный пароль' );
        }

    }
}
