<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Tariff;
use Illuminate\Http\Request;

class TariffController extends Controller {
    public function index() {
        $tariff = new Tariff();

        return view( 'tariffs', [ 'tariff' => $tariff -> all() ] );
    }
    public function programs($tariff_id) {
        $programs = Program::all();

        return view( 'programs', [
                'programs' => $programs,
                'tariff_id' =>   $tariff_id
            ]
        );
    }
}
