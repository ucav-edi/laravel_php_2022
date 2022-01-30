<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    //
    //se crean los siguientes campos para este modelo
    //los campos se llaman de la base de datos
    //tabla empleado, la cual hay que referenciar
    protected $table = 'empleado';
    //campos de la tabla empleado
    protected $fillable = ['id','nombre','edad','puesto','activo','estado_residencia','sueldo','tipo_moneda'];

}
