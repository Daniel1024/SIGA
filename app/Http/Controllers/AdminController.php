<?php

namespace SIGA\Http\Controllers;

use Illuminate\Http\Request;

use SIGA\Http\Requests;
use SIGA\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $items = array([
            'url'   => '#',
            'icono' =>'fa-university',
            'nombre'=>'Instituciones'
        ], [
            'url'   => '#',
            'icono' =>'fa-sitemap',
            'nombre'=>'Agrupar Instituciones'
        ], [
            'url'   => '#',
            'icono' =>'fa-sign-in',
            'nombre'=>'Acceder Instituciones'
        ]);
        $data = array(
            'title'     =>'Administrador',
            'titulo'    =>'Menú Prinicipal',
            'items'     => $items
        );
        return view('menu.simple', $data);
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
