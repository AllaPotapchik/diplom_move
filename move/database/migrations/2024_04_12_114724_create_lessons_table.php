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
        Schema ::create( 'lessons', function ( Blueprint $table ) {
            $table -> id( 'lesson_id' );
            $table->string('lesson_name');
            $table -> bigInteger( 'program_id' ) -> unsigned();
            $table -> foreign( 'program_id' ) -> references( 'program_id' ) -> on( 'programs' ) -> onDelete( 'cascade' );
            $table -> bigInteger( 'dance_type_id' ) -> unsigned();
            $table -> foreign( 'dance_type_id' ) -> references( 'dance_type_id' ) -> on( 'dance_types' ) -> onDelete( 'cascade' );
            $table -> integer( 'number' );
            $table->text('lesson_description');
            $table->string('video');
            $table->string('equipment');
            $table->time('duration');
            $table -> timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema ::dropIfExists( 'lessons' );
    }
};
