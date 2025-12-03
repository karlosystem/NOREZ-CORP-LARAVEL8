<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArtistaController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:post_show", ['only' => 'index']);
        $this->middleware("permission:post_create", ['only' => ['create', 'store']]);
        $this->middleware("permission:post_update", ['only' => ['edit', 'update']]);
        $this->middleware("permission:post_detail", ['only' => 'show']);
        $this->middleware("permission:post_delete", ['only' => 'destroy']);
    }

    private $perPage = 3;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statusSelected = in_array($request->get('status'), ['publish', 'draft']) ? $request->get('status') : 'publish';
        $posts = $statusSelected == "publish" ? Artista::publish() : Artista::draft();
        if ($request->get('keyword')) {
            $posts->search($request->get('keyword'));
        }
        return view('artistas.index', [
            'posts' => $posts->paginate($this->perPage)->withQueryString(),
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
        return view('artistas.create', [
            'categories' => Category::with('descendants')->onlyParent()->get(),
            'statuses' => $this->statuses()
        ]);
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
                'slug' => 'required|string|unique:artistas,slug',
                'thumbnail' => 'required',
                'description' => 'required|string|max:240',
                'content' => 'required',
                'category' => 'required',
                'tag' => 'required',
                'status' => 'required',
            ],
            [],
            $this->attributes()
        );

        if ($validator->fails()) {
            if ($request['tag']) {
                $request['tag'] = Tag::select('id', 'title')->whereIn('id', $request->tag)->get();
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();

        //grabar
        try {
            $artista = Artista::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'thumbnail' => parse_url($request->thumbnail)['path'],
                'description' => $request->description,
                'content' => $request->content,
                'status' => $request->status,
                'user_id' => Auth::user()->id,
            ]);
            $artista->tags()->attach($request->tag);
            $artista->categories()->attach($request->category);
            Alert::success('Mantenimiento de Artistas', 'Grabado con exito');
            return redirect()->route('artistas.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Error Title', 'Error' . $th->getMessage());
            if ($request['tag']) {
                $request['tag'] = Tag::select('id', 'title')->whereIn('id', $request->tag)->get();
            }
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function show(Artista $artista)
    {
        $categories = $artista->categories;
        $tags = $artista->tags;
        return view('artistas.details', compact('artista', 'categories', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function edit(Artista $artista)
    {
        return view('artistas.edit', [
            'artista' => $artista,
            'categories' => Category::with('descendants')->onlyParent()->get(),
            'statuses' => $this->statuses()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artista $artista)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:60',
                'slug' => 'required|string|unique:artistas,slug, ' . $artista->id,
                'thumbnail' => 'required',
                'description' => 'required|string|max:240',
                'content' => 'required',
                'category' => 'required',
                'tag' => 'required',
                'status' => 'required',
            ],
            [],
            $this->attributes()
        );

        if ($validator->fails()) {
            if ($request['tag']) {
                $request['tag'] = Tag::select('id', 'title')->whereIn('id', $request->tag)->get();
            }
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();

        //editar
        try {
            $artista->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'thumbnail' => parse_url($request->thumbnail)['path'],
                'description' => $request->description,
                'content' => $request->content,
                'status' => $request->status,
                'user_id' => Auth::user()->id,
            ]);
            $artista->tags()->sync($request->tag);
            $artista->categories()->sync($request->category);

            Alert::success('Mantenimiento de Artistas', 'Editado con exito');
            return redirect()->route('artistas.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Error Title', 'Error' . $th->getMessage());
            if ($request['tag']) {
                $request['tag'] = Tag::select('id', 'title')->whereIn('id', $request->tag)->get();
            }
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artista  $artista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artista $artista)
    {
        DB::beginTransaction();
        //eliminar
        try {
            $artista->tags()->detach();
            $artista->categories()->detach();
            $artista->delete();

            Alert::success('Mantenimiento de Artistas', 'Eliminado con exito');
            return redirect()->route('artistas.index');
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
            'publish' => 'publish',
            'draft' => 'draft',            
        ];
    }

    private function attributes()
    {
        return [
            'title' => trans('posts.form_control.input.title.attribute'),
            'slug' => trans('posts.form_control.input.slug.attribute'),
            'thumbnail' => trans('posts.form_control.input.thumbnail.attribute'),
            'description' => trans('posts.form_control.textarea.description.attribute'),
            'content' => trans('posts.form_control.textarea.content.attribute'),
            'category' => trans('posts.form_control.input.category.attribute'),
            'tag' => trans('posts.form_control.select.tag.attribute'),
            'status' => trans('posts.form_control.select.status.attribute'),
        ];
    }
}
