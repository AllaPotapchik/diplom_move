<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema ::create( 'users', function ( Blueprint $table ) {
            $table -> id();
            $table -> string( 'name' );
            $table -> string( 'email' ) -> unique();
            $table -> string( 'password' );
            $table -> string( 'phone' );
            $table -> bigInteger( 'user_type' ) -> unsigned();
            $table -> foreign( 'user_type' ) -> references( 'type_id' ) -> on( 'user_types' ) -> onDelete( 'cascade' );
            $table -> integer( 'point_balance' );
            $table -> rememberToken();
            $table -> timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
