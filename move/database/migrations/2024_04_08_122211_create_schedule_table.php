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
        Schema::create('schedule', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dance_type_id')->unsigned();
            $table->bigInteger('teacher_id')->unsigned();
            $table->bigInteger('day_id')->unsigned();
            $table->bigInteger('level_id')->unsigned();
            $table->foreign('dance_type_id')->references('dance_type_id')->on('dance_type')->onDelete('cascade');
            $table->foreign('teacher_id')->references('teacher_id')->on('teachers')->onDelete('cascade');
            $table->foreign('day_id')->references('day_id')->on('days_of_week')->onDelete('cascade');
            $table->foreign('level_id')->references('level_id')->on('levels')->onDelete('cascade');
            $table->time('time');
            $table->integer('available_count')->default(15);
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
        Schema::dropIfExists('schedule');
    }
};
