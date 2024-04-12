<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller {
    public function createRecord( $schedule_id_for_record ) {

        $new_record                = new Record();
        $new_record -> user_id     = Auth ::id();
        $new_record -> schedule_id = $schedule_id_for_record;
        $new_record -> save();

        $current_available_count = DB ::table( 'schedule' )
                                      -> where( 'id', '=', $schedule_id_for_record )
                                      -> decrement( 'available_count' );


        return redirect( '/success' ) -> withSuccess( $current_available_count );

    }


}
