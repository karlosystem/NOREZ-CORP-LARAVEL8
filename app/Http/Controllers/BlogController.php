<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios;
use App\Models\Articulos;
use App\Models\Contenidos;
use App\Models\Evento;
use App\Models\Proyectos;
use App\Models\Slider;
use App\Models\Video;

class BlogController extends Controller
{
    public function home()
    {
        return view('blog.home', [
            'servicios_menu' => Servicios::where('status', 'publish')
                ->where('destacado', 'si')
                ->get(),
            'servicios_home' => Servicios::where('status', 'publish')
                ->where('destacado', 'si')
                ->take(6)          // o ->limit(6)
                ->get(),
            'sliders' => Slider::where('status', 'publish')
                ->get(),
            'clientes' => Video::where('status', 'publish')->get()
        ]);
    }

    public function searchCategoria(Request $request) {}

    public function showArticulosByServicios_old($slug)
    {
        $articulos = Articulos::publish()->whereHas('servicios', function ($query) use ($slug) {
            return $query->where('slug', $slug);
        })->paginate(6);

        $servicio = Servicios::where('slug', $slug)->first();

        return view('blog.articulo-categoria', [
            'articulos' => $articulos,
            'servicios' => $servicio
        ]);
    }

    public function showArticulosByServicios($slug)
    {
        // Obtener servicio o 404 si no existe
        $servicio = Servicios::where('slug', $slug)->firstOrFail();

        // Opción A: obtener artículos a través de la relación del servicio
        $articulos = $servicio->articulos()
            ->publish()      // si quieres sólo los publicados
            ->orderBy('created_at', 'desc')
            ->paginate(30);

        // Opción B (equivalente): Articulos::publish()->where('fk_servicio', $servicio->id)->paginate(6);

        return view('blog.articulo-categoria', [
            'articulos' => $articulos,
            'servicio'  => $servicio,
            'servicios_menu' => Servicios::where('status', 'publish')
                ->where('destacado', 'si')
                ->get()
        ]);
    }

    public function showArticuloDetail($slug)
    {
        $articulo = Articulos::where('slug', $slug)->first();

        if (!$articulo) {
            return redirect()->route('blog.home');
        }

        $articulosRelacionados = Articulos::where('fk_servicio', $articulo->fk_servicio)
            ->where('id', '!=', $articulo->id) // excluir el actual
            ->where('status', 'publish')
            ->orderBy('created_at', 'desc')
            ->limit(20)
            ->get();

        return view('blog.articulo_detalle', [
            'articulo' => $articulo,
            'articulosRelacionados' => $articulosRelacionados,
            'servicios_menu' => Servicios::where('status', 'publish')
                ->where('destacado', 'si')
                ->get()
        ]);
    }

    /*     public function showProyectoDetail($slug)
    {
        $proyecto = Evento::where('slug', $slug)->first();
        if (!$proyecto) {
            return redirect()->route('blog.home');
        }
        return view('blog.proyecto_detalle', [
            'proyecto' => $proyecto,
            'servicios_menu' => Servicios::where('status', 'publish')
                ->where('destacado', 'si')
                ->get()
        ]);
    } */

    public function showContenidoByPagina($slug){
        $pagina = Contenidos::where('slug', $slug)
            ->where('status', 'publish')
            ->first();
         return view('contenidos.pagina', [
            'pagina' => $pagina
         ]);
    }

    public function showProyectoDetail($slug)
    {
        $proyecto = Evento::where('slug', $slug)
            ->where('status', 'publish')
            ->first();

        if (!$proyecto) {
            return redirect()->route('blog.home');
        }

        $proyectosRelacionados = Evento::where('status', 'publish')
            ->where('id', '!=', $proyecto->id) // excluir el actual
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('blog.proyecto_detalle', [
            'proyecto' => $proyecto,
            'proyectosRelacionados' => $proyectosRelacionados,
            'servicios_menu' => Servicios::where('status', 'publish')
                ->where('destacado', 'si')
                ->get()
        ]);
    }
}
