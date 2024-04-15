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
        Schema ::create( 'user_lessons', function ( Blueprint $table ) {
            $table -> id( 'user_lesson_id' );
            $table -> bigInteger( 'user_id' ) -> unsigned();
            $table -> foreign( 'user_id' ) -> references( 'id' ) -> on( 'users' ) -> onDelete( 'cascade' );
            $table -> bigInteger( 'lesson_id' ) -> unsigned();
            $table -> foreign( 'lesson_id' ) -> references( 'lesson_id' ) -> on( 'lessons' ) -> onDelete( 'cascade' );
            $table -> text( 'user_video' );
            $table -> boolean( 'status' );
            $table -> bigInteger( 'point_id' ) -> unsigned();
            $table -> foreign( 'point_id' ) -> references( 'point_id' ) -> on( 'points' ) -> onDelete( 'cascade' );
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
        Schema::dropIfExists('user_lesson');
    }
};
