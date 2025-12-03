<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class SliderController extends Controller
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
        $sliders = $statusSelected == "publish" ? Slider::publish() : Slider::draft();
        if ($request->get('keyword')) {
            $sliders->search($request->get('keyword'));
        }
        return view('sliders.index', [
            'sliders' => $sliders->paginate($this->perPage)->withQueryString(),
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
        return view('sliders.create');
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
                'slug' => 'required|string|unique:sliders,slug',
                'leyenda' => 'required',
                'descripcion' => 'required',
                'link' => 'required',
                'cover_image' => 'required',
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
            Slider::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'leyenda' => $request->leyenda,
                'descripcion' => $request->descripcion,                
                'cover_image' => parse_url($request->cover_image)['path'],
                'link' => $request->link,
                'status' => $request->status,
                'user_id' => Auth::user()->id,
            ]);
            Alert::success('Mantenimiento de Sliders', 'Grabado con exito');
            return redirect()->route('sliders.index');
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
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('sliders.details', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('sliders.edit', [
            'slider' => $slider,
            'statuses' => $this->statuses()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:60',
                'slug' => 'required|string|unique:sliders,slug, ' . $slider->id,
                'cover_image' => 'required',
                'leyenda' => 'required',
                'descripcion' => 'required',
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
            $slider->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'leyenda' => $request->leyenda,
                'descripcion' => $request->descripcion,
                'cover_image' => parse_url($request->cover_image)['path'],
                'link' => $request->link,
                'status' => $request->status,
                'user_id' => Auth::user()->id,
            ]);
            Alert::success('Mantenimiento de Sliders', 'Editado con exito');
            return redirect()->route('sliders.index');
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
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        DB::beginTransaction();
        //eliminar
        try {
            $slider->delete();
            Alert::success('Mantenimiento de Sliders', 'Eliminado con exito');
            return redirect()->route('sliders.index');
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
            'link' => 'link',
            'leyenda' => 'leyenda',
            'descripcion' => 'descripcion',
            'cover_image' => 'image',
            'status' => 'status',
        ];
    }
}
