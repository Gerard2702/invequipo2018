<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = ['id_tipo_equipo','id_centro_costo','id_nivel','ubicacion','id_usuario','numero_inventario','id_marca','modelo','serie','id_estado_equipo','fecha_adquisicion','fecha_vencimiento','observaciones','updated_at'];
}
