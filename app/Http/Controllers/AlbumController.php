<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
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
        $albums = $statusSelected == "publish" ? Album::publish() : Album::draft();
        //$albums = Album::all();
        if ($request->get('keyword')) {
            $albums->search($request->get('keyword'));
        }
        return view('albums.index', [
            'albums' => $albums->paginate($this->perPage)->withQueryString(),
            'statuses' => $this->statuses(),
            'statusSelected' => $statusSelected
        ]);
    }

    public function mostrar()
    {
        return view('albums.mostrar', [
            'servicios_menu' => Servicios::where('status', 'publish')
                                        ->where('destacado', 'si')
                                        ->get(),   
            'fotos' => Album::where('status', 'publish')->paginate(12),    
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
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
                'slug' => 'required|string|unique:albums,slug',
                'cover_image' => 'required',
                'description' => 'required|string|max:240',
                'status' => 'required',
            ],
            [],
            $this->attributes()
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        //grabar
        DB::beginTransaction();

        try {
            Album::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'cover_image' => parse_url($request->cover_image)['path'],
                'description' => $request->description,
                'status' => $request->status,
                'user_id' => Auth::user()->id,
            ]);
            Alert::success('Mantenimiento de Albums', 'Grabado con exito');
            return redirect()->route('albums.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Error Title', 'Error' . $th->getMessage());
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        } finally {
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return view('albums.details', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('albums.edit', [
            'album' => $album,
            'statuses' => $this->statuses()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:60',
                'slug' => 'required|string|unique:albums,slug, ' . $album->id,
                'cover_image' => 'required',
                'description' => 'required|string|max:240',
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
            $album->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'cover_image' => parse_url($request->cover_image)['path'],
                'description' => $request->description,
                'status' => $request->status,
                'user_id' => Auth::user()->id,
            ]);
            Alert::success('Mantenimiento de Albums', 'Editado con exito');
            return redirect()->route('albums.index');
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
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        DB::beginTransaction();
        //eliminar
        try {
            $album->delete();
            Alert::success('Mantenimiento de Albums', 'Eliminado con exito');
            return redirect()->route('albums.index');
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
            'status' => 'status',
        ];
    }
}
