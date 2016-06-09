<?php

namespace SIGA\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use SIGA\Http\Requests;
use SIGA\Menu;
use SIGA\Submenu;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(auth()->user());
        if (auth()->user()) {
            return redirect()->route(auth()->user()->role);
        }

        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $submenus = Submenu::where('menu_id',$menu->id)
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'usuario'   => 'required',
            'clave'     => 'required'
        ]);
        $array = array(
            'user'  => $request->get('usuario'),
            'password'  => $request->get('clave'),
            'active'    => true
        );
        if (!Auth::attempt($array)) {
            return redirect()
                ->route('login')
                ->withInput()
                ->withErrors('No encontramos al Usuario');
        }
        $role = auth()->user()->role;

        $this->_armar_menu($role);

        return redirect()->route($role);
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
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        auth()->logout();

        return redirect()->route('home');
    }
}
