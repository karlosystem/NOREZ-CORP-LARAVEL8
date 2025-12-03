<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Evento;
use App\Models\Noticia;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Video;

class FolkloreController extends Controller
{
    public function home()
    {
        return view('folklore.home', [
            'sliders' => Slider::where(['status' => "publish"])->get(),
            'noticias' => Noticia::where(['status' => "publish"])->limit(3)->get(),
            'eventos' => Evento::where(['status' => "publish"])->limit(4)->get(),
            'videoPortada' => Video::where(['status' => "publish"])->latest('created_at')->first(),
            'videoPortadaListado' => Video::where(['status' => "publish"])->limit(3)->get(),
            'artistas' => Artista::where(['status' => "publish"])->get(),
        ]);
    }

    public function showArtistas()
    {
        return view('folklore.artistas', [
            'artistas' => Artista::where(['status' => "publish"])->get()
        ]);
    }
}
