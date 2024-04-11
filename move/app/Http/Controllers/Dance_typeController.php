<?php

namespace App\Http\Controllers;

use App\Models\Dance_type;
use Illuminate\Http\Request;

class Dance_typeController extends Controller
{
    public function create() {
        $dance_type = new Dance_type();

        return view('create_sub', ['dance_type' => $dance_type -> all()]);
    }
}
