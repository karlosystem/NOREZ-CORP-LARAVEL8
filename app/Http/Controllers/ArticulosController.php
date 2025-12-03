<?php

namespace App\Http\Controllers;

use App\Models\Articulos;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArticulosController extends Controller
{
    private $perPage = 10;

    public function index(Request $request)
    {
        $statusSelected = in_array($request->get('status'), ['publish', 'draft']) ? $request->get('status') : 'publish';
        $destacadoSelected = in_array($request->get('destacado'), ['si', 'no']) ? $request->get('destacado') : 'si';
        $portadaSelected = in_array($request->get('portada'), ['si', 'no']) ? $request->get('portada') : 'si';

        $articulos = $statusSelected == "publish" ? Articulos::publish() : Articulos::draft();
        if ($request->get('keyword')) {
            $articulos->search($request->get('keyword'));
        }
        return view('articulos.index', [
            'articulos' => $articulos->paginate($this->perPage)->withQueryString(),
            'statuses' => $this->statuses(),
            'destacados' => $this->destacados(),
            'portadas' => $this->portadas(),
            'statusSelected' => $statusSelected,
            'destacadoSelected' => $destacadoSelected,
            'portadaSelected' => $portadaSelected,
        ]);
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

    private function portadas()
    {
        return [
            'si' => 'si',
            'no' => 'no',
        ];
    }

    public function create()
    {
        return view('articulos.create', [
            'statuses' => $this->statuses(),
            'destacados' => $this->destacados(),
            'portadas' => $this->portadas()
        ]);
    }

     
    public function store(Request $request)
    {
          $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:60',
                'slug' => 'required|string|unique:articulos,slug',
               // 'articulo_categoria' => 'required',
                'thumbnail' => 'required',
                'resumen' => 'required|string|max:60',
                'presentacion' => 'required',
                'contenido' => 'required',
                'status' => 'required',
                'destacado' => 'required',
                'portada' => 'required',
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
            Articulos::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'fk_servicio' => $request->articulo_categoria,
                'thumbnail' => parse_url($request->thumbnail)['path'],
                'resumen' => $request->resumen,
                'presentacion' => $request->presentacion,
                'contenido' => $request->contenido,
                'status' => $request->status,
                'destacado' => $request->destacado,
                'portada' => $request->portada,
                'user_id' => Auth::user()->id,
                'metatitle' => $request->metatitle,
                'metadescription' => $request->metadescription,
            ]);
            Alert::success('Mantenimiento de Articulos', 'Grabado con exito');
            return redirect()->route('articulos.index');
        } catch (\Throwable $th) {
            DB::rollBack();
             if ($request->has('articulo_categoria')) {
                $request['articulo_categoria'] = Articulos::select('id', 'title')->find($request->articulo_categoria);
            }
            Alert::error('Error Title', 'Error' . $th->getMessage());
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }

    }

    private function attributes()
    {
        return [
            'title' => 'nombre de articulo',
            'slug' => 'slug',
            'articulo_categoria' => 'Categoria',
            'thumbnail' => 'imagen',
            'resumen' => 'resumen',
            'presentacion' => 'presentacion',
            'contenido' => 'contenido',
            'status' => 'status',
            'destacado' => 'destacado',
            'portada' => 'portada',
            'metatitle' => 'metatitle',
            'metadescription' => 'metadescription',
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulo  $articulos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulos $articulo)
    {
        try {
            $articulo->delete();
            Alert::success('Mantenimiento de Articulos', 'Eliminado con exito');
        } catch (\Throwable $th) {
            Alert::success('Mantenimiento de Categorias', ['error' => $th->getMessage()]);
        }
        return redirect()->route('articulos.index');
        //return redirect()->back();
    }

    public function edit(Articulos $articulo)
    {
        return view('articulos.edit', [
            'articulo' => $articulo,
            'statuses' => $this->statuses(),
            'destacados' => $this->destacados(),
            'portadas' => $this->portadas(),
            'rowSelected' => $articulo->servicio,  // 👈 OBJETO
            
        ]);
    }

    public function update(Request $request, Articulos $articulo)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:69',
                'slug' => 'required|string|unique:articulos,slug,' . $articulo->id . ',id',
                'articulo_categoria' => 'required',
                'thumbnail' => 'required',
                'resumen' => 'required|string|min:20',
                'presentacion' => 'required',
                'contenido' => 'required',
                'status' => 'required',
                'destacado' => 'required',
                'portada' => 'required',
                'metatitle' => 'required|string|max:69',
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
            $articulo->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'thumbnail' => parse_url($request->thumbnail)['path'],
                'resumen' => $request->resumen,
                'presentacion' => $request->presentacion,
                'contenido' => $request->contenido,
                'status' => $request->status,
                'destacado' => $request->destacado,
                'portada' => $request->portada,
                'metatitle' => $request->metatitle,
                'metadescription' => $request->metadescription,
                'fk_servicio' => $request->articulo_categoria,
                'user_id' => Auth::id(),
            ]);
            //$articulo->tags()->sync($request->tag);
            //$articulo->categories()->sync($request->category);

            Alert::success('Mantenimiento de Articulos', 'Editado con exito');
            return redirect()->route('articulos.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Error Title', 'Error' . $th->getMessage());           
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }


    }


}