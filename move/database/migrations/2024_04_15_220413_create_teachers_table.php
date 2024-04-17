<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema ::create( 'teachers', function ( Blueprint $table ) {
            $table -> id( 'teacher_id' );
            $table -> string( 'teacher_name' );
            $table -> bigInteger( 'dance_type_id' )->unsigned();
            $table -> foreign( 'dance_type_id' ) -> references( 'dance_type_id' ) -> on( 'dance_types' ) -> onDelete( 'cascade' );
            $table -> bigInteger( 'user_id' )->unsigned();
            $table -> foreign( 'user_id' ) -> references( 'id' ) -> on( 'users' ) -> onDelete( 'cascade' );
            $table -> string( 'photo_path' );
            $table -> string( 'video_path' );
            $table -> text( 'experience' );
            $table -> text( 'specialisation' );
            $table -> timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema ::dropIfExists( 'teachers' );
    }
};
