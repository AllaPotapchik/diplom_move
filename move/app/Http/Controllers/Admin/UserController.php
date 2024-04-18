<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User_types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = DB ::table( 'users' )
                    -> join( 'user_types', 'users.user_type', 'user_types.type_id' )
                    -> get();

        return view( 'admin.user.index', compact( 'users' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $user_types = User_types ::all();

        return view( 'admin.user.create', [
            'user_types' => $user_types,
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
        $new_user              = new User();
        $new_user -> name      = $request -> name;
        $new_user -> email     = $request -> email;
        $new_user -> password  = Hash ::make( $request -> password );
        $new_user -> phone     = $request -> phone;
        $new_user -> user_type = $request -> get( 'user_type' );
//dd($request->get('user_type'));
        $new_user -> save();

        return redirect() -> back() -> with( 'success', 'Пользователь добавлен' );

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show( User $user ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( $user_id ) {
        $user_types = User_types ::all();
        $user       = DB ::table( 'users' )
                         -> where( 'id', $user_id )
                         -> first();

        return view( 'admin.user.update', [
            'user'       => $user,
            'user_types' => $user_types,

        ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $user_id ) {
        DB ::table( 'users' ) -> where( 'id', $user_id )
           -> update( [
               'name'          => $request -> name,
               'email'         => $request -> email,
               'phone'         => $request -> phone,
               'user_type'     => $request -> get( 'user_type' ),
               'point_balance' => $request -> balance
           ] );

        return redirect() -> back() -> with( 'success', 'Запись обновлена' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(  $user_id ) {
        DB ::table( 'users' ) -> where( 'id', $user_id )
           -> delete();

        return redirect() -> back() -> with( 'success', 'Запись удалена' );    }
}
