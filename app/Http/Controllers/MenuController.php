<?php

namespace SIGA\Http\Controllers;

use Illuminate\Http\Request;

use SIGA\Http\Requests;
use SIGA\Menu;
use SIGA\Submenu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $submenus = Submenu::where('menu_id', $id)
            ->orderBy('orden', 'asc')
            ->get();
        $items = array();
        foreach ($submenus as $submenu) {
            $item = array(
                'url'   => route($submenu->url),
                'icono' => $submenu->icono,
                'nombre'=> $submenu->nombre
            );
            array_push($items, $item);
        }
        $nombre = Menu::findOrFail($id)->nombre;
        $data = [
            'menu'      => session('menu'),
            'title'     => $nombre,
            'titulo'    => $nombre,
            'items'     => $items
        ];
        return view('menu.simple', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'menu'      => session('menu'),
            'title'     => 'Crear Menú',
            'titulo'    => 'Crear Menú',
        ];
        return view('menu.crear', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
