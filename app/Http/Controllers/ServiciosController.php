<?php

namespace App\Http\Controllers;

use App\Models\Servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ServiciosController extends Controller
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
        $destacadosSelected = in_array($request->get('destacado'), ['si', 'no']) ? $request->get('destacado') : 'si';

        $servicios = ($statusSelected == "publish" ? Servicios::publish() : Servicios::draft()) &&  $destacadosSelected == "si" ? Servicios::Si() : Servicios::No();

        if ($request->get('keyword')) {
            $servicios->search($request->get('keyword'));
        }
        return view('servicios.index', [
            'servicios' => $servicios->paginate($this->perPage)->withQueryString(),
            'statuses' => $this->statuses(),
            'destacados' => $this->destacados(),
            'statusSelected' => $statusSelected,
            'destacadosSelected' => $destacadosSelected
        ]);
    }

    public function create()
    {
        return view('servicios.create', [
            'statuses' => $this->statuses()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:60',
                'slug' => 'required|string|unique:servicios,slug',
                'thumbnail' => 'required',
                'description' => 'required|string|max:240',
                'content' => 'required',
                'status' => 'required',
                'destacado' => 'required',
                'metatitle' => 'required|string|max:60',
                'metadescription' => 'required|string|max:160',
            ],
            [],
            $this->attributes()
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::beginTransaction();
        try {
            Servicios::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'thumbnail' => parse_url($request->cover_image)['path'],
                'description' => $request->description,
                'content' => $request->content,
                'status' => $request->status,
                'destacado' => $request->destacado,
                'user_id' => Auth::user()->id,
                'metatitle' => $request->metatitle,
                'metadescription' => $request->metadescription,
            ]);
            Alert::success('Mantenimiento de Servicios', 'Grabado con exito');
            return redirect()->route('servicios.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Error Title', 'Error' . $th->getMessage());
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    private function statuses()
    {
        return [
            'draft' => 'draft',
            'publish' => 'publish',
        ];
    }

    private function destacados()
    {
        return [
            'si' => 'si',
            'no' => 'no',
        ];
    }

    public function edit(Servicios $servicio)
    {
        return view('servicios.edit', [
            'servicio' => $servicio,
            'statuses' => $this->statuses(),
            'destacados' => $this->destacados()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Servicios $servicio)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:60',
                'slug' => 'required|string|unique:servicios,slug, ' . $servicio->id,
                'thumbnail' => 'required',
                'description' => 'required|string|max:1240',
                'content' => 'required',
                'status' => 'required',
                'destacado' => 'required',
                'metatitle' => 'required|string|max:60',
                'metadescription' => 'required|string|max:160',
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
            $servicio->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'thumbnail' => parse_url($request->thumbnail)['path'],
                'description' => $request->description,
                'content' => $request->content,
                'status' => $request->status,
                'destacado' => $request->destacado,
                'user_id' => Auth::user()->id,
                'metatitle' => $request->metatitle,
                'metadescription' => $request->metadescription,
            ]);
            Alert::success('Mantenimiento de Servicios', 'Editado con exito');
            return redirect()->route('servicios.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Error Title', 'Error' . $th->getMessage());
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    private function attributes()
    {
        return [
            'title' => 'title',
            'slug' => 'slug',
            'thumbnail' => 'image',
            'description' => 'description',
            'content' => 'content',
            'status' => 'status',
            'destacado' => 'destacado',
            'metatitle' => 'metatitle',
            'metadescription' => 'metadescription',
        ];
    }

    public function destroy(Servicios $servicio)
    {
        DB::beginTransaction();
        //eliminar
        try {
            $servicio->delete();
            Alert::success('Mantenimiento de Servicios', 'Eliminado con exito');
            return redirect()->route('servicios.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Error Title', 'Error' . $th->getMessage());
        } finally {
            DB::commit();
            return redirect()->back();
        }
    }


    public function mostrar()
    {
        return view('servicios.mostrar', [
            'servicios_menu' => Servicios::where('status', 'publish')
                                        ->where('destacado', 'si')
                                        ->get(),
            'servicios_listado' => Servicios::where('status', 'publish')->where('destacado', 'si')->get()
        ]);            
    }

    public function select(Request $request)
    {
        $servicios = [];
        if ($request->has('q')) {
            $search = $request->q;
            $servicios = Servicios::select('id', 'title')->where('title', 'LIKE', "%$search%")->limit(6)->get();
        } else {
            $servicios = Servicios::select('id', 'title')->where('destacado', 'si')->limit(8)->get();
        }
        return response()->json($servicios);
    }

}
