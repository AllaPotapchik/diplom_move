<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Tariff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TariffController extends Controller {
    public function index() {
        $tariff = new Tariff();

        return view( 'tariffs', [ 'tariff' => $tariff -> all() ] );
    }
    public function programs($tariff_id) {
        $programs = Program::all();

        return view( 'programs', [
                'programs' => $programs,
                'tariff_id' =>   $tariff_id,
//                'users_tariffs'  =>  $users_tariffs,
//                'check_tariff'=> $check_tariff
            ]
        );
    }
}
