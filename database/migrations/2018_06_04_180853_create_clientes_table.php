<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('apellido', 50);
            $table->string('nombre', 80);
            $table->string('dni', 20)->nullable()->default(null);
            $table->string('direccion')->nullable()->default(null);
            $table->string('telefono', 50)->nullable()->default(null);
            $table->string('telefono_otro', 50)->nullable()->default(null);
            $table->text('observacion')->nullable()->default(null);
            $table->string('mail', 50)->nullable()->default(null);
            $table->integer('creado_por')->unsigned();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::drop('clientes');
    }
}
