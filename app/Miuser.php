<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Miuser extends Model
{
    protected $fillable = ['nombre','id_department','telefono','updated_at'];
}
