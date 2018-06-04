<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->decimal('capital', 9, 2);
            $table->decimal('total_pago', 9, 2);
            $table->decimal('interes', 9, 2)->default(0);
            $table->decimal('descuento', 9, 2)->default(0);
            $table->decimal('mora', 9, 2)->default(0);
            $table->date('fecha');
            $table->boolean('estado')->default(true);
            $table->integer('forma_pago_id')->unsigned();
            $table->integer('creado_por')->unsigned();
            $table->integer('prestamo_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('forma_pago_id')->references('id')->on('formas_pagos');
            $table->foreign('creado_por')->references('id')->on('users');
            $table->foreign('prestamo_id')->references('id')->on('prestamos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pagos');
    }
}
