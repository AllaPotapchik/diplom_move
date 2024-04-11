<?php

namespace App\Http\Controllers;

use App\Models\Tariff;
use Illuminate\Http\Request;

class TariffController extends Controller {
    public function index() {
        $tariff = new Tariff();

        return view( 'tariffs', [ 'tariff' => $tariff -> all() ] );
    }
}
