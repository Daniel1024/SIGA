<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SIGA\Menu::create([
            'tipo_usuario'  => 'admin',
            'orden'         => 1,
            'nombre'        => 'MENÚ PRINCIPAL',
            'icono'         => 'fa-envelope',
            'url'           => 'admin',
            'usuario'       => 'daniel1024',
        ]);

        SIGA\Menu::create([
            'tipo_usuario'  => 'admin',
            'orden'         => 99,
            'nombre'        => 'Menús',
            'icono'         => 'fa-bars',
            'url'           => 'menu',
            'usuario'       => 'daniel1024',
        ]);

        SIGA\Menu::create([
            'tipo_usuario'  => 'admin',
            'orden'         => 100,
            'nombre'        => 'Cerrar Sesión',
            'icono'         => 'fa-sign-out',
            'url'           => 'logout',
            'usuario'       => 'daniel1024',
        ]);

        SIGA\Submenu::create([
            'menu_id'   => 2,
            'orden'     => 1,
            'nombre'    => 'Crear Menú',
            'icono'     => 'fa-plus',
            'url'       => 'crear_menu',
        ]);

        SIGA\Submenu::create([
            'menu_id'   => 2,
            'orden'     => 2,
            'nombre'    => 'Editar Menú',
            'icono'     => 'fa-pencil-square-o',
            'url'       => 'editar_menu',
        ]);

        SIGA\Submenu::create([
            'menu_id'   => 2,
            'orden'     => 3,
            'nombre'    => 'Eliminar Menú',
            'icono'     => 'fa-trash',
            'url'       => 'eliminar_menu',
        ]);
    }
}
