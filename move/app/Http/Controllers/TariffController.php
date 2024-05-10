<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Tariff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TariffController extends Controller {
    public function index( $dance_type_id = 0 ) {
        $tariff = new Tariff();

        return view( 'tariffs', [ 'tariff' => $tariff -> all(), 'dance_type_id' => $dance_type_id ] );
    }

    public function programs( $tariff_id, $dance_type_id ) {

        if($dance_type_id !=0 ){
            $programs = DB::table('programs')->where('dance_type_id', $dance_type_id)->get();
        }else{
            $programs = Program ::all();
        }
        return view( 'programs', [
                'programs'      => $programs,
                'tariff_id'     => $tariff_id,
                'dance_type_id' => $dance_type_id
            ]
        );
    }
}
