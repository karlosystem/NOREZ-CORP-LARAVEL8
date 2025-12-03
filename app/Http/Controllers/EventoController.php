<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class EventoController extends Controller
{
    private $perPage = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statusSelected = in_array($request->get('status'), ['publish', 'draft']) ? $request->get('status') : 'publish';
        $eventos = $statusSelected == "publish" ? Evento::publish() : Evento::draft();
        if ($request->get('keyword')) {
            $eventos->search($request->get('keyword'));
        }
        return view('eventos.index', [
            'eventos' => $eventos->paginate($this->perPage)->withQueryString(),
            'statuses' => $this->statuses(),
            'statusSelected' => $statusSelected
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:60',
                'slug' => 'required|string|unique:eventos,slug',
                'cover_image' => 'required',
                'description' => 'required|string|max:240',
                'content' => 'required',
                'status' => 'required',
            ],
            [],
            $this->attributes()
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::beginTransaction();
        try {
            Evento::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'cover_image' => parse_url($request->cover_image)['path'],
                'description' => $request->description,
                'content' => $request->content,
                'status' => $request->status,
                'user_id' => Auth::user()->id,
            ]);
            Alert::success('Mantenimiento de Proyectos', 'Grabado con exito');
            return redirect()->route('eventos.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Error Title', 'Error' . $th->getMessage());
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        return view('eventos.details', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        return view('eventos.edit', [
            'evento' => $evento,
            'statuses' => $this->statuses()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:60',
                'slug' => 'required|string|unique:eventos,slug, ' . $evento->id,
                'cover_image' => 'required',
                'description' => 'required|string|max:240',
                'content' => 'required',
                'status' => 'required',
            ],
            [],
            $this->attributes()
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::beginTransaction();

        //editar
        try {
            $evento->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'cover_image' => parse_url($request->cover_image)['path'],
                'description' => $request->description,
                'content' => $request->content,
                'status' => $request->status,
                'user_id' => Auth::user()->id,
            ]);
            Alert::success('Mantenimiento de Proyectos', 'Editado con exito');
            return redirect()->route('eventos.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Error Title', 'Error' . $th->getMessage());
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        DB::beginTransaction();
        //eliminar
        try {
            $evento->delete();
            Alert::success('Mantenimiento de Proyectos', 'Eliminado con exito');
            return redirect()->route('eventos.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Error Title', 'Error' . $th->getMessage());
        } finally {
            DB::commit();
            return redirect()->back();
        }
    }

    private function statuses()
    {
        return [
            'draft' => 'draft',
            'publish' => 'publish',
        ];
    }

    private function attributes()
    {
        return [
            'name' => 'name',
            'slug' => 'slug',
            'cover_image' => 'image',
            'description' => 'description',
            'content' => 'content',
            'status' => 'status',
        ];
    }

    public function mostrar()
    {
        return view('eventos.mostrar', [
            'servicios_menu' => Servicios::where('status', 'publish')
                                        ->where('destacado', 'si')
                                        ->get(),   
            'proyectos' => Evento::where('status', 'publish')->paginate(6),    
        ]);
    }

}
