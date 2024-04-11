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
        Schema::create('users_tariffs', function (Blueprint $table) {
            $table->id('users_tariff_id');
            $table->bigInteger('dance_type')->unsigned();
            $table->bigInteger('tariff_type')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->date('start');
            $table->date('end');
            $table->boolean('is_check');
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
        Schema::dropIfExists('users_tariffs');
    }
};
