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
            'usuario'       => 'admin',
        ]);

        SIGA\Menu::create([
            'tipo_usuario'  => 'admin',
            'orden'         => 99,
            'nombre'        => 'Menús',
            'icono'         => 'fa-bars',
            'url'           => 'menu',
            'usuario'       => 'admin',
        ]);

        SIGA\Menu::create([
            'tipo_usuario'  => 'admin',
            'orden'         => 100,
            'nombre'        => 'Cerrar Sesión',
            'icono'         => 'fa-sign-out',
            'url'           => 'logout',
            'usuario'       => 'admin',
        ]);

        /*Menus docentes*/
        SIGA\Menu::create([
            'tipo_usuario'  => 'docente',
            'orden'         => 1,
            'nombre'        => 'MENÚ PRINCIPAL',
            'icono'         => 'fa-envelope',
            'url'           => 'docente',
            'usuario'       => 'admin',
        ]);

        SIGA\Menu::create([
            'tipo_usuario'  => 'docente',
            'orden'         => 100,
            'nombre'        => 'Cerrar Sesión',
            'icono'         => 'fa-sign-out',
            'url'           => 'logout',
            'usuario'       => 'admin',
        ]);
        /*Menus docentes*/

        /*Menus Alumnos*/
        SIGA\Menu::create([
            'tipo_usuario'  => 'alumno',
            'orden'         => 1,
            'nombre'        => 'MENÚ PRINCIPAL',
            'icono'         => 'fa-envelope',
            'url'           => 'alumno',
            'usuario'       => 'admin',
        ]);

        SIGA\Menu::create([
            'tipo_usuario'  => 'alumno',
            'orden'         => 100,
            'nombre'        => 'Cerrar Sesión',
            'icono'         => 'fa-sign-out',
            'url'           => 'logout',
            'usuario'       => 'admin',
        ]);
        /*Menus Alumnos*/

        /*Menus padres*/
        SIGA\Menu::create([
            'tipo_usuario'  => 'padres',
            'orden'         => 1,
            'nombre'        => 'MENÚ PRINCIPAL',
            'icono'         => 'fa-envelope',
            'url'           => 'padres',
            'usuario'       => 'admin',
        ]);

        SIGA\Menu::create([
            'tipo_usuario'  => 'padres',
            'orden'         => 100,
            'nombre'        => 'Cerrar Sesión',
            'icono'         => 'fa-sign-out',
            'url'           => 'logout',
            'usuario'       => 'admin',
        ]);
        /*Menus padres*/

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
