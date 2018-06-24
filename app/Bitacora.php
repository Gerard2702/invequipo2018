<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $fillable = ['id_tipo_servicio','descripcion','updated_at'];
}
