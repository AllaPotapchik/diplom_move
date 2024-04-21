<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller {
    public function index() {
        $programs = Program ::with( 'lessons' ) -> get();

        return view( 'programs', compact( 'programs' ) );
    }

    public function showLessons( $program_id ) {
        $program = DB ::table( 'programs' ) -> where( 'program_id', $program_id ) -> first();

        $lessons = DB ::table( 'lessons' )
                      -> where( 'program_id', $program_id )
                      -> select( '*' )
                      -> get();

        return view( 'lesson', [
            'lessons' => $lessons,
            'program' => $program,

        ] );
    }

    public function startLesson( $lesson_id, $program_id ) {

        $lesson = DB ::table( 'lessons' ) -> where( 'lesson_id', $lesson_id )
                     -> select( '*' )
                     -> get();

        $start_lesson = DB ::table( 'user_lessons' )
                           -> where( 'user_id', Auth ::id() )
                           -> where( 'lesson_id', $lesson_id )
                           -> get();

        if ( sizeof($start_lesson) == 0 ) {
//            dd($start_lesson);
            DB ::table( 'user_lessons' ) -> insert( [
                [
                    'user_id'    => Auth ::id(),
                    'lesson_id'  => $lesson_id,
                    'user_video' => null,
                ]
            ] );
        }

        return view( 'single_lesson', [
            'lesson'     => $lesson,
            'program_id' => $program_id,
        ] );
    }

    public function uploadVideo( Request $request ) {
        $this -> validate( $request, [
            'video' => 'required|file|mimetypes:video/mp4', // Проверка на тип файла (mp4)
        ] );

        DB ::table( 'user_lessons' ) -> where( 'user_id', Auth ::id() )
           -> where( 'lesson_id', $request -> lesson_id )
           -> update( [ 'user_video' => 'p_' . $request -> program_id . '_l_' . $request -> lesson_id . '_u_' . Auth ::id() . '.mp4' ] );

        if ( $request -> hasFile( 'video' ) ) {
            $videoPath = $request -> file( 'video' )
                                  -> storeAs( 'videos', 'p_' . $request -> program_id . '_l_' . $request -> lesson_id . '_u_' . Auth ::id() . '.' . $request -> file( 'video' )
                                                                                                                                                             -> getClientOriginalExtension() );
        }
        if ( $videoPath ) {
            return redirect() -> back() -> with( 'success', 'Видео успешно загружено!' );
        } else {
            return redirect() -> back() -> with( 'error', 'Видео не загружено!' );
        }
    }

    public function endLesson( $lesson_id ) {

        DB ::table( 'user_lessons' )
           -> where( 'lesson_id', $lesson_id )
           -> where( 'user_id', Auth ::id() )
           -> update( [ 'status' => 1 ] );

        return redirect() -> back() -> with( 'success', 'Статус изменен' );

    }
}
