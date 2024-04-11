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
        Schema::create('dance_type', function (Blueprint $table) {
            $table->id('dance_type_id');
            $table->string('title');
            $table->text('description');
            $table->text('type_benefits');
            $table->timestamps();
        });

        Schema::create('teachers', function (Blueprint $table) {
            $table->id('teacher_id');
            $table->integer('dance_type_id');
            $table->string('photo');
            $table->string('video');
            $table->text('experience');
            $table->text('specialisation');
            $table->timestamps();
        });

        Schema::create('days_of_week', function (Blueprint $table) {
            $table->id('day_id');
            $table->string('name');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dance_type');
        Schema::dropIfExists('teachers');
        Schema::dropIfExists('days_of_week');
    }
};
