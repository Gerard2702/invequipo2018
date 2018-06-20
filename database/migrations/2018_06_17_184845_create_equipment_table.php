<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_tipo_equipo');
            $table->foreign('id_tipo_equipo')->references('id')->on('equipmentypes');
            $table->unsignedInteger('id_nivel');
            $table->foreign('id_nivel')->references('id')->on('nivels');
            $table->string('ubicacion');
            $table->unsignedInteger('id_centro_costo');
            $table->foreign('id_centro_costo')->references('id')->on('departments');
            $table->unsignedInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('miusers');
            $table->string('numero_inventario');
            $table->unsignedInteger('id_marca');
            $table->foreign('id_marca')->references('id')->on('marcas');
            $table->string('modelo');
            $table->string('serie');
            $table->string('marca_modelo');
            $table->string('velocidad');
            $table->string('ram');
            $table->string('hdd');
            $table->unsignedInteger('id_cd');
            $table->foreign('id_cd')->references('id')->on('perifericos');
            $table->string('sistema_operativo');
            $table->string('licencia_sistema');
            $table->string('office');
            $table->string('licencia_office');
            $table->string('sistemas_institucionales');
            $table->string('otro_software');
            $table->string('nombre_equipo');
            $table->unsignedInteger('id_direccionip');
            $table->foreign('id_direccionip')->references('id')->on('direccions');
            $table->unsignedInteger('id_dominio');
            $table->foreign('id_dominio')->references('id')->on('domains');
            $table->date('fecha_adquisicion');
            $table->date('fecha_vencimiento');
            $table->unsignedInteger('id_estado_equipo');
            $table->foreign('id_estado_equipo')->references('id')->on('estates');
            $table->string('observaciones');
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
        Schema::dropIfExists('equipment');
    }
}
