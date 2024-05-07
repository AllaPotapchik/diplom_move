<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Translation\t;

class TeacherController extends Controller {

    public function index( $user ) {
        $teacher = DB ::table( 'teachers' ) -> where( 'user_id', $user )
                      -> join( 'dance_types', 'teachers.dance_type_id', 'dance_types.dance_type_id' )
                      -> get();
//        dd($teacher);

        $teacher_lessons = DB ::table( 'schedule' )
                              -> where( 'schedule.teacher_id', $teacher[ 0 ] -> teacher_id )
                              -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                              -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                              -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                              -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                              -> get();

        $user_tasks = DB ::table( 'user_lessons' )
                         -> join( 'lessons', 'user_lessons.lesson_id', 'lessons.lesson_id' )
                         -> join( 'users', 'user_lessons.user_id', 'users.id' )
                         -> where( 'lessons.dance_type_id', $teacher[ 0 ] -> dance_type_id )
                         -> where( 'status', 0 )
                         -> select( '*' )
                         -> get();

        return view( 'teacher_panel', [
            'teacher'         => $teacher,
            'teacher_lessons' => $teacher_lessons,
            'user_tasks'      => $user_tasks
        ] );
    }

    public function teachersList() {
        $teachers = DB ::table( 'teachers' )
                       -> join( 'dance_types', 'teachers.dance_type_id', 'dance_types.dance_type_id' )
                       -> get();

        return view( 'teachers', [ 'teachers' => $teachers ] );
    }

    public function showTeacher( $teacher_id ) {
        $teacher = DB ::table( 'teachers' ) -> where( 'teacher_id', $teacher_id )
                      -> join( 'dance_types', 'teachers.dance_type_id', 'dance_types.dance_type_id' )
                      -> first();
        $reviews = DB ::table( 'reviews' ) -> where( 'teacher_id', $teacher_id )
                      -> join( 'users', 'reviews.user_id', '=', 'users.id' )
                      -> get();

        return view( 'single_teacher', [
            'teacher' => $teacher,
            'reviews' => $reviews
        ] );
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
        $user = DB ::table( 'teachers' ) -> where( 'user_id', Auth ::id() ) -> first();

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
                   -> update( [
                       'point_balance' => $new_balance,
                   ] );
                DB ::table( 'user_lessons' ) -> where( 'lesson_id', $request -> lesson_id )
                   -> update( [
                       'teacher_comment' => $request -> teacher_comment
                   ] );
            }

//            return redirect() -> back() -> with( 'success', 'Задание проверено' );
//            return view('teacher_panel')->with('success', 'Задание проверено');
            return redirect() -> route( 'teacherIndex', $user->user_id)
                              -> with( 'success', 'Задание проверено' );
        } else {
            return redirect() -> back() -> with( 'error', 'Выберите отметку' );
        }

    }
}
