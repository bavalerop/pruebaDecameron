<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHotel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel', function (Blueprint $table) {
            $table->integer('hot_nit');
            $table->primary('hot_nit');
            $table->string('hot_nom');
            $table->string('hot_direc');
            $table->integer('num_hab');
            $table->integer('ciudad_cod');
            $table->foreign('ciudad_cod')
                  ->references('ciu_id')->on('ciudad')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('hotel');
    }
}
