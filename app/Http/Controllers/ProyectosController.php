<?php

namespace App\Http\Controllers;
use App\Models\Proyectos;
use App\Models\Servicios;
use App\Models\Slider;
use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    public function mostrar(){
        return view('proyectos.index', [
            'servicios_menu' => Servicios::where('status', 'publish')
                                        ->where('destacado', 'si')
                                        ->get(),          
        ]);
    }
}
