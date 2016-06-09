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
        $rutas = Menu::all();
        $data = [
            'menu'      => session('menu'),
            'title'     => 'Crear Menú',
            'titulo'    => 'Crear Menú',
            'rutas'     => $rutas,
        ];
        return view('menu.crear', $data);
    }

    private function _armar_li($url, $icono, $nombre, $id)
    {
        if ($url==='menu') {
            $ruta = route($url, $id);
        } else {
            $ruta = route($url);
        }
        return '<a href="'.
        $ruta.
        '"><i class="fa '.
        $icono.
        '"></i>'.
        $nombre.
        '</a>';
    }

    private function _armar_menu($role)
    {

        $menus = Menu::where('tipo_usuario', $role)
            ->orderBy('orden', 'asc')
            ->get();

        $text = '<ul>';

        foreach ($menus as $menu) {
            $submenus = Submenu::where('menu_id', $menu->id)
                ->orderBy('orden', 'asc')
                ->get();
            if ($submenus->count() == 0) {
                $text .= '<li>';
                $text .= $this->_armar_li($menu->url, $menu->icono, $menu->nombre, $menu->id);
                $text .= '</li>';
            } else {
                $text .= '<li class="parent">';
                $text .= $this->_armar_li($menu->url, $menu->icono, $menu->nombre, $menu->id);
                $text .= '<ul>';
                foreach ($submenus as $submenu) {
                    $text .= '<li>';
                    $text .= $this->_armar_li($submenu->url, $submenu->icono, $submenu->nombre, $menu->id);
                    $text .= '</li>';
                }
                $text .= '</ul>';
                $text .= '</li>';
            }
        }

        $text .= '</ul>';
        session(['menu' => $text]);
    }

    public function crear(Request $request)
    {
        if ($request->get('recargar')) {

            $this->_armar_menu(auth()->user()->role);

            return redirect()
                ->route('crear_menu')
                ->withInput()
                ->with('correcto', 'Menú cargado correctamente');
        }

        if ($request->get('menu') == 0) {

            if ($request->get('orden') == 0) {
                return redirect()
                    ->route('crear_menu')
                    ->withInput()
                    ->withErrors('Debe seleccionar el orden del Menú');
            }

            $this->validate($request, [
                'nombre'   => 'required',
                'icono'     => 'required',
            ]);
            $menu = new Menu();
            $menu->tipo_usuario     = $request->get('usuario');
            $menu->orden            = $request->get('orden');
            $menu->nombre           = $request->get('nombre');
            $menu->icono            = $request->get('icono');
            $menu->url              = 'menu';
            $menu->usuario          = auth()->user()->user;
            $menu->save();

        } else {

            if (($request->get('padre') == 0) || ($request->get('orden') == 0)) {
                if ($request->get('padre') == 0) {
                    $msj = 'Debe elejir un Menú padre';
                } else {
                    $msj = 'Debe seleccionar el orden del Menú';
                }
                return redirect()
                    ->route('crear_menu')
                    ->withErrors($msj);
            }

            $this->validate($request, [
                'nombre'   => 'required',
                'icono'     => 'required',
                'url'   => 'required',
            ]);

            $submenu = new Submenu();
            $submenu->menu_id     = $request->get('padre');
            $submenu->orden       = $request->get('orden');
            $submenu->nombre      = $request->get('nombre');
            $submenu->icono       = $request->get('icono');
            $submenu->url         = $request->get('url');
            $submenu->save();
        }
        return redirect()
            ->route('crear_menu')
            ->with('correcto', 'Menú creado correctamente');
    }

    public function getPadres(Request $request, $id)
    {
        if ($request->ajax()) {
            $menus = Menu::padresportipousuario($id);
            return response()->json($menus);
        }
        return view('errors.404');
    }

    public function getOrden(Request $request, $usuario, $menu, $padre)
    {
        if ($request->ajax()) {

            if ($menu == 0) {
                $datos = Menu::where('tipo_usuario', $usuario)
                ->orderBy('orden', 'asc')
                ->get();
            } else {
                $datos = Submenu::where('menu_id', $padre)
                ->orderBy('orden', 'asc')
                ->get();
            }
            $orden = array();
            foreach ($datos as $dato) {
                array_push($orden, $dato->orden);
            }

            return response()->json($orden);
        }
        return view('errors.404');
    }

    public function relleno()
    {
        return 'Relleno';
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
