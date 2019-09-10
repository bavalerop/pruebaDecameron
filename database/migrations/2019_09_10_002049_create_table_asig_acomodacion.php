<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAsigAcomodacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asig_acomodacion', function (Blueprint $table) {
            $table->integer('cant_hab');
            $table->integer('thab_cod');
            $table->foreign('thab_cod')
            ->references('thab_id')->on('tipohab')
            ->onDelete('cascade');
            $table->integer('aco_cod');
            $table->foreign('aco_cod')
            ->references('aco_id')->on('acomodacion')
            ->onDelete('cascade');
            $table->integer('hot_cod');
            $table->foreign('hot_cod')
            ->references('hot_nit')->on('hotel')
            ->onDelete('cascade');
            $table->primary(['thab_cod', 'aco_cod']);
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
        Schema::dropIfExists('asig_acomodacion');
    }
}
