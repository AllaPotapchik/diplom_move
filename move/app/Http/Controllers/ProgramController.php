<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller {
    public function index() {

    }

    public function createProgramRecord( $dance_type, $tariff_type ) {
        $id = Auth ::id();
        DB ::table( 'users_tariffs' ) -> insert( [
            [
                'user_id'     => $id,
                'dance_type'  => $dance_type,
                'tariff_type' => $tariff_type,
                'start'       => null,
                'end'         => null,
                'is_check'    => false,
            ]
        ] );

        return redirect( '/success' ) -> withSuccess( 'New student was added' );
    }


}
