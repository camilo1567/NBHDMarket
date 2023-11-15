<?php

namespace App\Http\Controllers\Negocio;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NegocioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('negocio.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function settings()
    {
        $user = auth()->user();
        $settings = $user->settings;

        $data = compact('settings');

        return view('negocio.settings',$data);
    }

    public function updateSettings(Request $request)
    {

        if($request->hasFile('image')){

            $this->validate($request,[
                'image' => 'file',
            ]);

            //Storage::delete('img/fotos/' . Auth::user()->settings->foto_perfil);

            $image = $request->file('image');

            $name = time().$image->getClientOriginalName();

            $image->storeAs('img/fotos/',$name,'public');

            $path = 'img/fotos/'.$name;

            $request['foto_perfil'] = $path;

        }

        $user = auth()->user();
        $settings = $user->settings;

        $settings->update($request->all());

        return redirect()->route('negocio.ajustes')->with('success','Ajustes actualizados correctamente');
    }

    public function data_filled()
    {
        $user = Auth::user();

        $data = compact('user');

        return view('negocio.data',$data);

    }

    public function data_complete(Request $request,User $user)
    {

        $this->validate($request,[
            'nombre' => 'required',
            'direccion' => 'required',
            'descripcion' => 'required|max:255',
        ]);

        $user_settings = UserSetting::whereUserId($user->id)->first();

        $user_settings->update([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'contacto' => $request->contacto,
            'whatsapp' => $request->whatsapp,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'descripcion' => $request->descripcion,
        ]);

        $user->update(['data_filled' => 1]);


        return redirect()->route('dashboard');

    }
}
