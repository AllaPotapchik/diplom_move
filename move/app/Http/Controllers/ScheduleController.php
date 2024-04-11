<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function index(){
        $schedule = new Schedule();
        return view( 'schedule', [ 'schedule' => $schedule -> all() ] );
    }
}
