<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dance_type;
use App\Models\Level;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $programs = DB ::table( 'programs' )
                       -> join( 'dance_types', 'programs.dance_type_id', 'dance_types.dance_type_id' )
                       -> join( 'levels', 'programs.level_id', 'levels.level_id' )
                       -> get();

        return view( 'admin.program.index', compact( 'programs' ) );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $dance_types = Dance_type ::all();
        $levels      = Level ::all();

        return view( 'admin.program.create', [
            'dance_types' => $dance_types,
            'levels'      => $levels,
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
        $new_program                  = new Program();
        $new_program -> program_name  = $request -> name;
        $new_program -> dance_type_id = $request -> get( 'dance_type' );
        $new_program -> level_id      = $request -> get( 'level' );
        $new_program -> price      = $request -> get( 'price' );
        $new_program -> lesson_count  = $request -> count;

        $new_program -> save();

        return redirect() -> back() -> with( 'success', 'Программа добавлена' );


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Program $program
     *
     * @return \Illuminate\Http\Response
     */
    public function show( Program $program ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Program $program
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( $program_id ) {
        $dance_types = Dance_type ::all();
        $levels      = Level ::all();

        $program = DB ::table( 'programs' )->where('program_id',$program_id)
                       -> join( 'dance_types', 'programs.dance_type_id', 'dance_types.dance_type_id' )
                       -> join( 'levels', 'programs.level_id', 'levels.level_id' )
                       -> first();

        return view( 'admin.program.update', [
            'program'=>$program,
            'dance_types' => $dance_types,
            'levels'      => $levels,
        ] );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Program $program
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request,  $program_id ) {
        DB ::table( 'programs' ) -> where( 'program_id', $program_id )
           -> update( [
               'program_name'      => $request -> name,
               'dance_type_id'      => $request -> get( 'dance_type' ),
               'level_id'        => $request -> get( 'level' ),
               'lesson_count'          => $request -> count,
           ] );

        return redirect() -> back() -> with( 'success', 'Программа обновлена' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Program $program
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(  $program_id ) {
        DB ::table( 'programs' ) -> where( 'program_id', $program_id )
           -> delete();

        return redirect() -> back() -> with( 'success', 'Запись удалена' );
    }
}
