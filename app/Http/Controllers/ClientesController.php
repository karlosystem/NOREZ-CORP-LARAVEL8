<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Video;
use App\Models\Servicios;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clientes.index', [
            'servicios_menu' => Servicios::where('status', 'publish')->where('destacado', 'si'),
            'clientes' => Video::where('status', 'publish')->get()
            ]
        );
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
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientes $contacto)
    {
        //
    }

    
    public function update(Request $request, Clientes $contacto)
    {
        //
    }

    public function destroy(Clientes $contacto)
    {
        //
    }
}
