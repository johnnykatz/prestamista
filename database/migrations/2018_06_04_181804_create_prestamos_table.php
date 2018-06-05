<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePrestamosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->decimal('monto', 9, 2);
            $table->decimal('monto_pendiente', 9, 2);
            $table->string('cuotas', 5);
            $table->decimal('interes', 9, 2);
            $table->date('fecha_inicio')->nullable()->default(null);
            $table->integer('cliente_id')->unsigned();
            $table->integer('amortizacion_id')->unsigned();
            $table->integer('modalidad_pago_id')->unsigned();
            $table->integer('estado_prestamo_id')->unsigned();
            $table->integer('creado_por')->unsigned();
            $table->string('nombre_identificador')->nullable()->default(null);
            $table->text('observacion')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('amortizacion_id')->references('id')->on('amortizaciones');
            $table->foreign('modalidad_pago_id')->references('id')->on('modalidades_pagos');
            $table->foreign('estado_prestamo_id')->references('id')->on('estados_prestamos');
            $table->foreign('creado_por')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('prestamos');
    }
}
