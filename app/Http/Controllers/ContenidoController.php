<?php

namespace App\Http\Controllers;

use App\Models\Contenidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ContenidoController extends Controller
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
        $contenidos = $statusSelected == "publish" ? Contenidos::publish() : Contenidos::draft();
        if ($request->get('keyword')) {
            $contenidos->search($request->get('keyword'));
        }
        return view('contenidos.index', [
            'contenidos' => $contenidos->paginate($this->perPage)->withQueryString(),
            'statuses' => $this->statuses(),
            'statusSelected' => $statusSelected
        ]);
    }

    private function statuses()
    {
        return [
            'draft' => 'draft',
            'publish' => 'publish',
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contenidos.create');
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
                'title' => 'required|string|max:60',
                'slug' => 'required|string|unique:contenidos,slug',
                'thumbnail' => 'required',
                'description' => 'required',
                'content' => 'required',
                'status' => 'required',
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
            Contenidos::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'thumbnail' => parse_url($request->thumbnail)['path'],
                'description' => $request->description,
                'content' => $request->content,
                'status' => $request->status,
                'user_id' => Auth::user()->id,
                'metatitle' => $request->metatitle,
                'metadescription' => $request->metadescription,
            ]);
            Alert::success('Mantenimiento de Contenidos', 'Grabado con exito');
            return redirect()->route('contenidos.index');
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
            'title' => 'nombre de contenido',
            'slug' => 'slug',
            'thumbnail' => 'imagen',
            'description' => 'description',
            'content' => 'content',
            'status' => 'status',
            'metatitle' => 'metatitle',
            'metadescription' => 'metadescription',
        ];
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
    public function edit(Contenidos $contenido)
    {
         return view('contenidos.edit', [
            'contenido' => $contenido,
            'statuses' => $this->statuses()            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contenidos $contenido)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:300',                
                'slug' => 'required|string|unique:contenidos,slug,' . $contenido->id,
                'thumbnail' => 'required',
                'description' => 'required',
                'content' => 'required',
                'status' => 'required',
                'metatitle' => 'required|string|max:70',
                'metadescription' => 'required|string|max:169',
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
            $contenido->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'thumbnail' => parse_url($request->thumbnail)['path'],
                'description' => $request->description,
                'content' => $request->content,
                'status' => $request->status,
                'user_id' => Auth::user()->id,
                'metatitle' => $request->metatitle,
                'metadescription' => $request->metadescription,
            ]);
            Alert::success('Mantenimiento de Contenidos', 'Editado con exito');
            return redirect()->route('contenidos.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contenidos $contenido)
    {
        DB::beginTransaction();
        //eliminar
        try {
            $contenido->delete();
            Alert::success('Mantenimiento de Contenidos', 'Eliminado con exito');
            return redirect()->route('contenidos.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Error Title', 'Error' . $th->getMessage());
        } finally {
            DB::commit();
            return redirect()->back();
        }
    }
}
