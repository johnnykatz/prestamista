<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCampos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->integer('forma_pago_id')->unsigned()->nullable()->default(null)->change();
            $table->date('fecha')->nullable()->default(null)->change();
            $table->date('fecha_vencimiento')->nullable()->default(null);
            $table->integer('numero_cuota')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
