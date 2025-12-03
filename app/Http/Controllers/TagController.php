<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TagController extends Controller
{
    private $perPage = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags = $request->get('keyword') ? Tag::search($request->keyword)->paginate($this->perPage)
            : Tag::paginate($this->perPage);
        return view('tags.index', ['tags' => $tags->appends(['keyword' => $request->keyword])]);
    }



    public function select(Request $request)
    {
        $tags = [];
        if ($request->has('q')) {
            $tags = Tag::select('id', 'title')->search($request->q)->get();
        } else {
            $tags = Tag::select('id', 'title')->limit(5)->get();
        }
        return response()->json($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
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
                'slug' => 'required|string|unique:tags,slug',
            ],
            [],
            $this->attributes()
        );
        try {
            Tag::create([
                'title' => $request->title,
                'slug' => $request->slug
            ]);
            Alert::success('Success Title', 'Success Message');
            return redirect()->route('tags.index');
        } catch (\Throwable $th) {
            Alert::error('Error Title', 'Error' . $th->getMessage());
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
    }

    private function attributes()
    {
        return [
            'title' => trans('tags.form_control.input.title.attribute'),
            'slug' => trans('tags.form_control.input.slug.attribute'),
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //dd($tag);
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        Validator::make(
            $request->all(),
            [
                'title' => 'required|string|max:25',
                'slug' => 'required|string|unique:tags,slug,' . $tag->id
            ],
            [],
            $this->attributes()
        )->validate();

        try {
            $tag->update([
                'title' => $request->title,
                'slug' => $request->slug
            ]);
            Alert::success('Success Title', 'Success Message');
            return redirect()->route('tags.index');
        } catch (\Throwable $th) {
            Alert::error('Error Title', 'Error' . $th->getMessage());
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        try {
            $tag->delete();
            Alert::success('Mantenimiento de Tags', 'Eliminado con exito');
        } catch (\Throwable $th) {
            Alert::success('Mantenimiento de Tags', ['error' => $th->getMessage()]);
        }
        //return redirect()->route('categories.index');
        return redirect()->back();
    }
}
