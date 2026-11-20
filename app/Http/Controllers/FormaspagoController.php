<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Video;
use App\Models\Servicios;
use Illuminate\Http\Request;

class FormaspagoController extends Controller
{
    public function index()
    {
        return view('formapago.index', [
            'servicios_menu' => Servicios::where('status', 'publish')->where('destacado', 'si')
            ]
        );
    }
}