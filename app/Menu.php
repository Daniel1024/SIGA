<?php

namespace SIGA;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'tipo_usuario',
        'orden',
        'nombre',
        'icono',
        'url',
        'usuario',
    ];

    public function submenus()
    {
        return $this->hasMany(Submenu::class);
    }

    public static function padresportipousuario($id)
    {
        return Menu::where('tipo_usuario', $id)
            ->get();
    }
}
