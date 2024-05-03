<?php

namespace App\Http\Controllers;

use App\Models\Dance_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dance_typeController extends Controller
{
    public function create() {
        $dance_type = new Dance_type();

        return view('create_sub', ['dance_type' => $dance_type -> all()]);
    }

    public function index(){

        $dance_type = new Dance_type();

        return view('dance_types', ['dance_type' => $dance_type -> all()]);
    }

    public function singleType($dance_type_id){

        $dance_type = DB::table('dance_types')->where('dance_type_id', $dance_type_id)->first();

        return view('single_dance_type', ['dance_type' => $dance_type]);

    }
}
