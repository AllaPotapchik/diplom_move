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
        Schema ::create( 'reviews', function ( Blueprint $table ) {
            $table -> id();
            $table -> text( 'review_text' );
            $table -> bigInteger( 'teacher_id' ) -> unsigned();
            $table -> foreign( 'teacher_id' ) -> references( 'teacher_id' ) -> on( 'teachers' ) -> onDelete( 'cascade' );
            $table -> bigInteger( 'user_id' ) -> unsigned();
            $table -> foreign( 'user_id' ) -> references( 'id' ) -> on( 'users' ) -> onDelete( 'cascade' );
            $table -> date( 'date' );
            $table->time('time');
            $table -> timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema ::dropIfExists( 'reviews' );
    }
};
