<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Program;
use App\Models\Users_tariff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller {
    public function showDetails( $dance_type, $tariff_type, $program_id ) {
        $user    = DB ::table( 'users' ) -> find( Auth ::id() );
        $program = DB ::table( 'programs' ) -> where( 'program_id', $program_id ) -> first();

        if ( $program -> price * 3 <= $user -> point_balance ) {
            $percent = 30;
            $cost    = $program -> price * 3;
        } elseif ( $program -> price * 2 <= $user -> point_balance ) {
            $percent = 20;
            $cost    = $program -> price * 2;

        } elseif ( $program -> price * 1.5 <= $user -> point_balance ) {
            $percent = 10;
            $cost    = $program -> price * 1.5;

        } else {
            $percent = 0;
            $cost    = 0;
        }

        return view( 'create_program', [
            'dance_type' => $dance_type,
            'tariff_id'  => $tariff_type,
            'program_id' => $program_id,
            'user'       => $user,
            'program'    => $program,
            'percent'    => $percent,
            'new_price'  => '',
            'cost'       => $cost
        ] );
    }

    public function createProgramRecord( $program_id, $dance_type, $tariff_id, $level_id ) {

        $id            = Auth ::id();
        $users_tariffs = DB ::table( 'users_tariffs' )
                            -> where( 'user_id', $id )
                            -> where( 'program_id', $program_id )
                            -> whereIn( 'tariff_type', [ 2, 3, 1 ] )
                            -> select( '*' )
                            -> get();

        $duration= DB ::table( 'programs' )
                    -> where( 'program_id', $program_id )
                    -> first();

        if ( sizeof( $users_tariffs ) != 0 ) {
            return redirect() -> back() -> with( 'error', 'У вас уже есть программы по данному направлению' );
        } else {
            DB ::table( 'users_tariffs' ) -> insert( [
                [
                    'user_id'         => $id,
                    'user_dance_type' => $dance_type,
                    'tariff_type'     => $tariff_id,
                    'start'           => date('Y-m-d H:i:s'),
                    'end'             => date('Y-m-d H:i:s', strtotime('+ '.$duration->duration. ' month')),
                    'is_check'        => false,
                    'program_id'      => $program_id,
                    'level_id'        => $level_id
                ]
            ] );

            return redirect() -> back() -> with( 'success', 'Доступ к урокам в личном кабинете появиться после подтверждения оплаты администратором' );
        }
    }
}
