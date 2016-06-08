<?php

namespace SIGA;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $fillable = [
        'menu_id',
        'orden',
        'nombre',
        'icono',
        'url',
    ];
}
