<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    private $perPage = 20;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statusSelected = in_array($request->get('status'), ['publish', 'draft']) ? $request->get('status') : 'publish';
        $videos = $statusSelected == "publish" ? Video::publish() : Video::draft();
        if ($request->get('keyword')) {
            $videos->search($request->get('keyword'));
        }
        return view('videos.index', [
            'videos' => $videos->paginate($this->perPage)->withQueryString(),
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
        return view('videos.create');
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
                'slug' => 'required|string|unique:videos,slug',
                'cover_image' => 'required',
                'link' => 'required',
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
            Video::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'cover_image' => parse_url($request->cover_image)['path'],
                'link' => $request->link,
                'status' => $request->status,
                'cliente' => $request->cliente,
                'cargo' => $request->cargo,
                'testimonio' => $request->testimonio,
                'foto' => parse_url($request->foto)['path'],
                'user_id' => Auth::user()->id,
            ]);
            Alert::success('Mantenimiento de Clientes', 'Grabado con exito');
            return redirect()->route('videos.index');
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
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('videos.edit', [
            'video' => $video,
            'statuses' => $this->statuses()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:60',
                'slug' => 'required|string|unique:videos,slug, ' . $video->id,
                'cover_image' => 'required',
                'link' => 'required',
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
            $video->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'cover_image' => parse_url($request->cover_image)['path'],
                'link' => $request->link,
                'status' => $request->status,
                'cliente' => $request->cliente,
                'cargo' => $request->cargo,
                'testimonio' => $request->testimonio,
                'foto' => parse_url($request->foto)['path'],
                'user_id' => Auth::user()->id,
            ]);
            Alert::success('Mantenimiento de Clientes', 'Editado con exito');
            return redirect()->route('videos.index');
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
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        DB::beginTransaction();
        //eliminar
        try {
            $video->delete();
            Alert::success('Mantenimiento de Clientes', 'Eliminado con exito');
            return redirect()->route('videos.index');
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
            'cliente' => 'cliente',
            'cargo' => 'cargo',
            'testimonio' => 'testimonio',
            'foto' => 'image',            
        ];
    }
}
