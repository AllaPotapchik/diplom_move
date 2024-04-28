<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Dance_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dance_typeController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $dance_types = Dance_type ::all();

        return view( 'admin.dance_type.index', compact( 'dance_types' ) );

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'admin.dance_type.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {

        $new_dance_type                  = new Dance_type();
        $new_dance_type -> title         = $request -> input( 'title' );
        $new_dance_type -> description   = $request -> input( 'description' );
        $new_dance_type -> type_benefits = $request -> input( 'benefits' );
        $new_dance_type -> save();

        return redirect() -> back() -> with( 'success', 'Направление добавлено' );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Dance_type $dance_type
     *
     * @return \Illuminate\Http\Response
     */
    public function show( Dance_type $dance_type ) {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Dance_type $dance_type
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( $dance_type_id ) {
        $dance_type = DB ::table( 'dance_types' )
                         -> where( 'dance_type_id', $dance_type_id )
                         -> first();

        return view( 'admin.dance_type.update', [
            'dance_type' => $dance_type
        ] );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dance_type $dance_type
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $dance_type ) {

        DB ::table( 'dance_types' ) -> where( 'dance_type_id', $dance_type )
           -> update( [
               'title'         => $request -> title,
               'description'   => $request -> description,
               'type_benefits' => $request -> benefits
           ] );

        return redirect() -> back() -> with( 'success', 'Запись обновлена' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Dance_type $dance_type
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $dance_type ) {
        DB ::table( 'dance_types' ) -> where( 'dance_type_id', $dance_type )
           -> delete();

        return redirect() -> back() -> with( 'success', 'Запись удалена' );
    }
}
