<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcceptController extends Controller {
    public function showRecords() {

        $records = DB ::table( 'users_tariffs' ) -> where( 'is_check', 0 )
                      -> join( 'programs', 'users_tariffs.program_id', 'programs.program_id' )
                      -> join( 'users', 'users_tariffs.user_id', 'users.id' )
                      -> join( 'tariffs', 'users_tariffs.tariff_type', 'tariffs.tariff_type' )
                      -> get();

        return view( 'admin.accepts.accepts', compact( 'records' ) );

    }

    public function accept($id){
        DB ::table( 'users_tariffs' ) -> where( 'users_tariff_id', $id )
           -> update( [
               'is_check'         => 1,
           ] );

        return redirect() -> back() -> with( 'success', 'Запись подтверждена' );

    }
}
