<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dance_type;
use App\Models\Lesson;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $lesson = DB ::table( 'lessons' )
                     -> join( 'programs', 'lessons.program_id', '=', 'programs.program_id' )
                     -> join( 'dance_types', 'lessons.dance_type_id', '=', 'dance_types.dance_type_id' )
                     -> select( '*' )
                     -> get();

        return view( 'admin.lesson.index', compact( 'lesson' ) );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $dance_types = Dance_type ::all();
        $program     = Program ::all();

        return view( 'admin.lesson.create', [
            'dance_types' => $dance_types,
            'program'     => $program,
        ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $new_lesson                       = new Lesson();
        $new_lesson -> lesson_name        = $request -> name;
        $new_lesson -> program_id         = $request -> get( 'program' );
        $new_lesson -> dance_type_id      = $request -> get( 'dance_type' );
        $new_lesson -> number             = $request -> number;
        $new_lesson -> lesson_description = $request -> description;
        $new_lesson -> video              = $request -> file( 'lesson_video' );
        $new_lesson -> duration           = $request -> duration;
        $new_lesson -> equipment          = $request -> equipment;

        $path = $request -> file( 'lesson_video' ) -> storeAs( 'lesson_video', 'lesson_video_' . $request -> number . $request -> get( 'program' )
                                                                               . '.' . $request -> file( 'lesson_video' ) -> getClientOriginalExtension() );

        $new_lesson -> save();

        return redirect() -> back() -> with( 'success', 'Урок добавлен' );

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Lesson $lesson
     *
     * @return \Illuminate\Http\Response
     */
    public function show( Lesson $lesson ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Lesson $lesson
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( $lesson_id ) {
        $dance_types = Dance_type ::all();
        $program     = Program ::all();
        $lesson      = DB ::table( 'lessons' ) -> where( 'lesson_id', $lesson_id ) -> first();

        return view( 'admin.lesson.update', [
            'dance_types' => $dance_types,
            'program'     => $program,
            'lesson'      => $lesson,
        ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Lesson $lesson
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $lesson_id ) {
        DB ::table( 'lessons' ) -> where( 'lesson_id', $lesson_id )
           -> update( [
               'lesson_name'        => $request -> name,
               'program_id'         => $request -> get( 'program' ),
               'dance_type_id'      => $request -> get( 'dance_type' ),
               'number'             => $request -> number,
               'lesson_description' => $request -> description,
               'video'              => 'lesson_video_' . $request -> number . $request -> get( 'program' ).$request->file( 'lesson_video' ) -> getClientOriginalExtension(),
               'duration'           => $request -> duration,
               'equipment'          => $request -> equipment
           ] );

        $path = $request -> file( 'lesson_video' ) -> storeAs( 'lesson_video', 'lesson_video_' . $request -> number . $request -> get( 'program' ).'.'.$request->file( 'lesson_video' ) -> getClientOriginalExtension());

        return redirect() -> back() -> with( 'success', 'Урок обновлен' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Lesson $lesson
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(  $lesson_id ) {
        DB ::table( 'lessons' ) -> where( 'lesson_id', $lesson_id )
           -> delete();

        return redirect() -> back() -> with( 'success', 'Запись удалена' );
    }
}
