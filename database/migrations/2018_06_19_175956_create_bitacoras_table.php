<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_equipo');
            $table->foreign('id_equipo')->references('id')->on('equipment');
            $table->unsignedInteger('id_tipo_servicio');
            $table->foreign('id_tipo_servicio')->references('id')->on('services');
            $table->string('descripcion',3000);
            $table->date('fecha');
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
        Schema::dropIfExists('bitacoras');
    }
}
