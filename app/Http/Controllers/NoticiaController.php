<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Error\Notice;

class NoticiaController extends Controller
{
    private $perPage = 3;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statusSelected = in_array($request->get('status'), ['publish', 'draft']) ? $request->get('status') : 'publish';
        $noticias = $statusSelected == "publish" ? Noticia::publish() : Noticia::draft();
        if ($request->get('keyword')) {
            $noticias->search($request->get('keyword'));
        }
        return view('noticias.index', [
            'noticias' => $noticias->paginate($this->perPage)->withQueryString(),
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
        return view('noticias.create');
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
                'slug' => 'required|string|unique:noticias,slug',
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

        //grabar
        try {
            Noticia::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'cover_image' => parse_url($request->cover_image)['path'],
                'description' => $request->description,
                'content' => $request->content,
                'status' => $request->status,
                'user_id' => Auth::user()->id,
            ]);
            Alert::success('Mantenimiento de Noticias', 'Grabado con exito');
            return redirect()->route('noticias.index');
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
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        return view('noticias.details', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        return view('noticias.edit', [
            'noticia' => $noticia,
            'statuses' => $this->statuses()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:60',
                'slug' => 'required|string|unique:noticias,slug, ' . $noticia->id,
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
            $noticia->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'cover_image' => parse_url($request->cover_image)['path'],
                'description' => $request->description,
                'content' => $request->content,
                'status' => $request->status,
                'user_id' => Auth::user()->id,
            ]);
            Alert::success('Mantenimiento de Noticias', 'Editado con exito');
            return redirect()->route('noticias.index');
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
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        DB::beginTransaction();
        //eliminar
        try {
            $noticia->delete();
            Alert::success('Mantenimiento de Noticias', 'Eliminado con exito');
            return redirect()->route('noticias.index');
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
}
