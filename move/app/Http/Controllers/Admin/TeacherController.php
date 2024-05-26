<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dance_type;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;

class TeacherController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $teachers = DB ::table( 'teachers' )
                       -> join( 'dance_types', 'teachers.dance_type_id', 'dance_types.dance_type_id' )
                       -> get();

        return view( 'admin.teacher.index', compact( 'teachers' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $dance_types = Dance_type ::all();
        $users       = DB ::table( 'users' ) -> where( 'user_type', 3 ) -> get();

        return view( 'admin.teacher.create', [
            'dance_types' => $dance_types,
            'users'       => $users,
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
//        dd($request -> get('user_id'));
        $new_teacher                   = new Teachers();
        $new_teacher -> teacher_name   = $request -> name;
        $new_teacher -> dance_type_id  = $request -> get( 'dance_type' );
        $new_teacher -> experience     = $request -> experience;
        $new_teacher -> specialisation = $request -> specialisation;
        $new_teacher -> video_path     = $request -> video_path;
        $new_teacher -> user_id        = $request -> get( 'user_id' );
        $new_teacher -> photo_path     = 'teacher_' . $request -> get( 'user_id' ) . '.' . $request -> file( 'teacher_photo' ) -> getClientOriginalExtension();
        $path                          = $request -> file( 'teacher_photo' ) -> storeAs( 'teachers_photo', 'teacher_' . $request -> user_id . '.' . $request -> file( 'teacher_photo' ) -> getClientOriginalExtension() );

        $new_teacher -> save();

        return redirect() -> back() -> with( 'success', 'Преподаватель добавлен' );

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Teachers $teachers
     *
     * @return \Illuminate\Http\Response
     */
    public function show( Teachers $teachers ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Teachers $teachers
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( $teacher_id ) {
        $dance_types = Dance_type ::all();
        $users       = DB ::table( 'users' ) -> where( 'user_type', 3 ) -> get();
        $teacher     = DB ::table( 'teachers' ) -> where( 'teacher_id', $teacher_id ) -> first();

        return view( 'admin.teacher.update', [
            'dance_types' => $dance_types,
            'users'       => $users,
            'teacher'     => $teacher,
        ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Teachers $teachers
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $teacher_id ) {

        DB ::table( 'teachers' ) -> where( 'teacher_id', $teacher_id )
           -> update( [
               'teacher_name'          => $request -> name,
               'dance_type_id'         => $request -> get( 'dance_type' ),
               'experience'         => $request -> experience,
               'specialisation'     => $request -> specialisation,
               'video_path' => $request -> video_path,
               'user_id' => $request -> get( 'user_id' ),
               'photo_path' => 'teacher_' . $request -> get( 'user_id' ) . '.' . $request -> file( 'teacher_photo' ) -> getClientOriginalExtension()
               ] );
        $path                          = $request -> file( 'teacher_photo' ) -> storeAs( 'teachers_photo', 'teacher_' . $request -> get( 'user_id' ) . '.' . $request -> file( 'teacher_photo' ) -> getClientOriginalExtension() );

        return redirect() -> back() -> with( 'success', 'Запись обновлена' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Teachers $teachers
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $teacher_id ) {
        DB ::table( 'teachers' ) -> where( 'teacher_id', $teacher_id )
           -> delete();

        return redirect() -> back() -> with( 'success', 'Запись удалена' );
    }

}
