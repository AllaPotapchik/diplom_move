<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller {

    public function index() {
        return view( 'teacher_panel' );
    }

    public function teachersList() {
        $teachers = DB ::table( 'teachers' )
                       -> join( 'dance_types', 'teachers.dance_type_id', 'dance_types.dance_type_id' )
                       -> get();

        return view( 'teachers', [ 'teachers' => $teachers ] );
    }

public function showTeacher($teacher_id){
        $teacher = DB::table('teachers')->where('teacher_id',$teacher_id)->first();

        return view('single_teacher', ['teacher'=>$teacher]);
}
    public function showTask( $lesson_id, $user_id ) {

        $task = DB ::table( 'user_lessons' )
                   -> where( 'lesson_id', $lesson_id )
                   -> where( 'user_id', $user_id )
                   -> first();

        $points = DB ::table( 'points' ) -> select( '*' ) -> get();

        return view( 'check_lesson', [
            'user'   => $user_id,
            'task'   => $task,
            'points' => $points
        ] );
    }

    public function checkTask( Request $request ) {

        if ( $request -> point_id ) {

            $user_task = DB ::table( 'user_lessons' )
                            -> where( 'user_id', $request -> user_id )
                            -> where( 'lesson_id', $request -> lesson_id )
                            -> update( [ 'point_id' => $request -> point_id, 'status' => 1 ] );

            if ( $user_task ) {

                $point_count     = DB ::table( 'points' ) -> where( 'point_id', $request -> point_id ) -> first();
                $current_balance = DB ::table( 'users' ) -> where( 'id', $request -> user_id ) -> first();
                $new_balance     = $current_balance -> point_balance + $point_count -> count;

                DB ::table( 'users' ) -> where( 'id', $request -> user_id )
                   -> update( [ 'point_balance' => $new_balance ] );
            }

            return redirect() -> back() -> with( 'success', 'Задание проверено' );
        } else {
            return redirect() -> back() -> with( 'error', 'Выберите отметку' );
        }

    }
}
