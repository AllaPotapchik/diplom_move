<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Program;
use App\Models\Users_tariff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller {
    public function index() {

    }

    public function createProgramRecord( $dance_type, $tariff_type, $program_id ) {
        $id = Auth ::id();

        $users_tariffs = DB ::table( 'users_tariffs' ) -> where( 'user_id', $id )
                            -> select( '*' )
                            -> get();
        $check_tariff  = false;
        foreach ( $users_tariffs as $el ) {
            if ( $el -> user_dance_type == $tariff_type ) {
                $check_tariff = true;
            }
        }
        if ( $check_tariff ) {
            return redirect( '/success' ) -> withSuccess( 'У вас уже есть программы по данному направлению' );
        } else {
            DB ::table( 'users_tariffs' ) -> insert( [
                [
                    'user_id'         => $id,
                    'user_dance_type' => $dance_type,
                    'tariff_type'     => $tariff_type,
                    'start'           => null,
                    'end'             => null,
                    'is_check'        => false,
                    'program_id'      => $program_id
               ]
            ] );

            return redirect( '/success' ) -> withSuccess( 'Запись оформлена' );
        }

    }


}
