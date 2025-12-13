<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Profile $profile)
    {
        $profile = Profile::first();
        return view('profiles.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'email'     => 'nullable|string|max:573',
            'whastapp'  => 'nullable|string|max:573',
            'facebook'  => 'nullable|string|max:573',
            'tiktok'    => 'nullable|string|max:573',
            'youtube'   => 'nullable|string|max:573',
            'web'       => 'nullable|string|max:573',
            'mobile'    => 'nullable|string|max:573',
            'direccion' => 'nullable|string|max:573',
            'city'      => 'nullable|string|max:573'
        ]);
        
        DB::beginTransaction();

        try {
            $profile->update([
                'email'     => $request->email,
                'whastapp'  => $request->whastapp,
                'facebook'  => $request->facebook,
                'tiktok'    => $request->tiktok,
                'youtube'   => $request->youtube,
                'web'       => $request->web,
                'mobile'    => $request->mobile,
                'direccion' => $request->direccion,
                'city'      => $request->city,
                'user_id'   => Auth::id(),
            ]);

            DB::commit();

            Alert::success('Mantenimiento de Profiles', 'Registro actualizado correctamente');
            return redirect()->route('profiles.index');
        } catch (\Throwable $e) {

            DB::rollBack();
            Alert::error('Error', 'Ocurrió un error: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
