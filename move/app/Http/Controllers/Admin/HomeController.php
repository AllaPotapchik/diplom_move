<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Dance_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {
    public function index() {

        $dance_types_count = DB::table('dance_types')->count();
        $schedule_count = DB::table('schedule')->count();
        $user_count = DB::table('users')->count();
        $program_count = DB::table('programs')->count();
        $teacher_count = DB::table('teachers')->count();
        $lesson_count = DB::table('lessons')->count();
        return view( 'admin_index', [
            'dance_types_count' =>$dance_types_count,
            'schedule_count' =>$schedule_count,
            'user_count' =>$user_count,
            'program_count' =>$program_count,
            'teacher_count' =>$teacher_count,
            'lesson_count' =>$lesson_count,
        ] );
    }
}
